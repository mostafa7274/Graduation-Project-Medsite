from flask import Flask, request, jsonify
import PyPDF2
from PIL import Image
import pytesseract
import os
import re
from dotenv import load_dotenv
from groq import Groq
import traceback

# Configure Tesseract OCR
TESSERACT_PATH = r'C:\Program Files\Tesseract-OCR\tesseract.exe'
if os.path.exists(TESSERACT_PATH):
    pytesseract.pytesseract.tesseract_cmd = TESSERACT_PATH
else:
    raise FileNotFoundError(f"Tesseract not found at {TESSERACT_PATH}")

# Load environment variables
load_dotenv()

app = Flask(__name__)
UPLOAD_FOLDER = 'uploads'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
os.makedirs(UPLOAD_FOLDER, exist_ok=True)

# Initialize Groq client
try:
    client = Groq(api_key=os.getenv("GROQ_API_KEY"))
except Exception as e:
    print(f"❌ Groq initialization failed: {str(e)}")
    client = None

def clean_output(text):
    """Remove markdown formatting and clean up text"""
    # Remove markdown bold (**text**)
    text = re.sub(r'\*\*(.*?)\*\*', r'\1', text)
    # Remove headers (### Header)
    text = re.sub(r'^#+\s*', '', text, flags=re.MULTILINE)
    # Remove excessive newlines
    text = re.sub(r'\n{3,}', '\n\n', text)
    return text.strip()

def generate_prompt_template(text, detail_level="detailed"):
    """Generate appropriate prompt based on detail level"""
    instructions = {
        "simple": "Provide a concise 3-4 sentence summary in plain text. Focus only on key findings and recommendations.",
        "detailed": "Give a complete but simple explanation in paragraph form. Include all important details but avoid medical jargon.",
        "visual": "Use bullet points and 1-2 relevant emojis per section. Structure as:\n- 🔍 Finding: [description]\n- 💡 Recommendation: [action]"
    }

    return f"""
    Convert this medical report into a patient-friendly version with {detail_level} detail:
    {text}

    Requirements:
    - Never use markdown formatting
    - Write in clear, simple English
    - Maintain all medical accuracy
    - {instructions.get(detail_level, instructions['detailed'])}
    """

def explain_medical_text_with_groq(text, detail_level="detailed"):
    if not client:
        return "Error: AI service unavailable"

    try:
        response = client.chat.completions.create(
            messages=[{
                "role": "user",
                "content": generate_prompt_template(text, detail_level)
            }],
            model="llama3-8b-8192",
            temperature=0.3,
            max_tokens=1000
        )
        return clean_output(response.choices[0].message.content)
    except Exception as e:
        print(f"AI Error: {str(e)}")
        return f"Error processing with AI: {str(e)}"

def extract_text_from_pdf(pdf_path):
    try:
        with open(pdf_path, "rb") as file:
            text = "\n".join(
                page.extract_text() or ''
                for page in PyPDF2.PdfReader(file).pages
            )
            return text if text.strip() else None
    except Exception as e:
        print(f"PDF Error: {str(e)}")
        return None

def extract_text_from_image(image_path):
    try:
        img = Image.open(image_path).convert('L')  # Convert to grayscale
        text = pytesseract.image_to_string(img, lang='eng')
        return text if text.strip() else None
    except Exception as e:
        print(f"OCR Error: {str(e)}")
        return None

@app.route("/", methods=["POST"])
def upload_file():
    if "file" not in request.files:
        return jsonify({"error": "No file uploaded"}), 400

    file = request.files["file"]
    if not file.filename:
        return jsonify({"error": "Empty filename"}), 400

    try:
        file_path = os.path.join(app.config['UPLOAD_FOLDER'], file.filename)
        file.save(file_path)
        detail_level = request.form.get('detail_level', 'detailed')

        # Extract text
        if file.filename.lower().endswith(".pdf"):
            raw_text = extract_text_from_pdf(file_path)
        elif file.filename.lower().endswith((".png", ".jpg", ".jpeg")):
            raw_text = extract_text_from_image(file_path)
        else:
            return jsonify({"error": "Unsupported file type"}), 400

        if not raw_text:
            return jsonify({"error": "Failed to extract text"}), 400

        simplified = explain_medical_text_with_groq(raw_text, detail_level)

        return jsonify({
            "original": raw_text,
            "simplified": simplified,
            "detail_level": detail_level,
            "filename": file.filename
        })

    except Exception as e:
        print(f"Upload Error: {str(e)}\n{traceback.format_exc()}")
        return jsonify({"error": f"Processing failed: {str(e)}"}), 500

if __name__ == "__main__":
    try:
        print(f"Tesseract version: {pytesseract.get_tesseract_version()}")
        app.run(host='0.0.0.0', port=5000, debug=True)
    except Exception as e:
        print(f"Fatal Error: {str(e)}")

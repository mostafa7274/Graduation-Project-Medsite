import pandas as pd
import json
import os

# المسار باستخدام forward slashes
file_path = 'O:/xampp/htdocs/GP/app/python_program/egyptian drugs contraindication.xlsx'

# تحقق من وجود الملف
if not os.path.exists(file_path):
    print(f"خطأ: الملف {file_path} غير موجود. تأكد من المسار أو الاسم.")
    exit()

# تحميل الداتا
df = pd.read_excel(file_path)

# تنظيف حقل drug_drug_interaction
def clean_interactions(interactions):
    if pd.isna(interactions):
        return []
    return [drug.strip() for drug in interactions.replace('\n', ',').split(',') if drug.strip()]

df['drug_drug_interaction'] = df['drug_drug_interaction'].apply(clean_interactions)

# تحويل الداتا لـ JSON
cleaned_data = df.to_dict(orient='records')
with open('cleaned_drug_interactions.json', 'w') as f:
    json.dump(cleaned_data, f, indent=2)

print("تم تنظيف الداتا وحفظها في cleaned_drug_interactions.json")

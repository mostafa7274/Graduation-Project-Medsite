from flask import Flask, request, jsonify
import pandas as pd
import json

app = Flask(__name__)

# Load the drug interaction data
df = pd.read_json('cleaned_drug_interactions.json')

@app.route('/drug-interactions', methods=['POST'])
def drug_interactions():
    data = request.get_json()
    if not data:
        return jsonify({'error': 'No data provided'}), 400

    patient_medications_input = data.get('medications', [])
    patient_conditions_input = data.get('chronic_conditions', [])
    pregnancy_status = data.get('pregnancy_status', 'No')

    def parse_input(input_data):
        if not input_data:
            return []
        if isinstance(input_data, list):
            return [str(item).strip() for item in input_data if item]
        if isinstance(input_data, str):
            try:
                parsed = json.loads(input_data)
                if isinstance(parsed, list):
                    return [str(item).strip() for item in parsed if item]
            except json.JSONDecodeError:
                if input_data.lower() in ["none", "no"]:
                    return []
                return [item.strip() for item in input_data.split(",") if item.strip()]
        elif isinstance(input_data, dict):
            return [str(v).strip() for v in input_data.values() if v and isinstance(v, str)]
        return []

    patient_medications = parse_input(patient_medications_input)
    patient_conditions = parse_input(patient_conditions_input)

    print(f"Received Data: {data}")
    print(f"Parsed Medications: {patient_medications}")
    print(f"Parsed Conditions: {patient_conditions}")
    print(f"Pregnancy Status: {pregnancy_status}")

    if not patient_medications:
        return jsonify({'error': 'No medications provided'}), 400

    warnings = []

    # Fixed drug-drug interaction logic
    for i in range(len(patient_medications)):
        for j in range(i + 1, len(patient_medications)):
            drug1 = patient_medications[i]
            drug2 = patient_medications[j]

            # Check drug1's interactions
            drug1_row = df[df['drug_name'].str.lower() == drug1.lower()]
            if not drug1_row.empty:
                interactions = [i.lower() for i in drug1_row.iloc[0]['drug_drug_interaction']]
                if drug2.lower() in interactions:
                    warnings.append({
                        'drugs': f"{drug1} + {drug2}",
                        'risk_description': drug1_row.iloc[0]['risk_description'],
                        'severity': drug1_row.iloc[0]['severity_level']
                    })

            # Check drug2's interactions
            drug2_row = df[df['drug_name'].str.lower() == drug2.lower()]
            if not drug2_row.empty:
                interactions = [i.lower() for i in drug2_row.iloc[0]['drug_drug_interaction']]
                if drug1.lower() in interactions:
                    warnings.append({
                        'drugs': f"{drug1} + {drug2}",
                        'risk_description': drug2_row.iloc[0]['risk_description'],
                        'severity': drug2_row.iloc[0]['severity_level']
                    })

    # Check contraindications and pregnancy safety
    for drug in patient_medications:
        drug_row = df[df['drug_name'].str.lower() == drug.lower()]
        if not drug_row.empty:
            contraindications = [c.strip().lower() for c in drug_row.iloc[0]['contraindications'].split(',')] if drug_row.iloc[0]['contraindications'] else []
            print(f"Drug: {drug}, Contraindications: {contraindications}")
            for condition in patient_conditions:
                if condition.lower() in contraindications:
                    warnings.append({
                        'drugs': drug,
                        'risk_description': f"Contraindicated for {condition}: {drug_row.iloc[0]['risk_description']}",
                        'severity': drug_row.iloc[0]['severity_level']
                    })

            if pregnancy_status.lower() == 'pregnant' and 'avoid in pregnancy' in drug_row.iloc[0]['pregnancy_and_lactation_safety'].lower():
                warnings.append({
                    'drugs': drug,
                    'risk_description': 'Contraindicated during pregnancy',
                    'severity': drug_row.iloc[0]['severity_level']
                })

    print(f"Warnings: {warnings}")
    return jsonify({'warnings': warnings})

if __name__ == '__main__':
    app.run(port=5001)

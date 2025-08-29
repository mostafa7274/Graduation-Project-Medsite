import pandas as pd
import numpy as np
from faker import Faker
import random
import json

# إعداد Faker
fake = Faker()

# قوائم لتقليد الداتا الطبية
chronic_conditions = ['Diabetes', 'Hypertension', 'Asthma', 'Heart Disease', 'None']
allergies = ['Penicillin', 'Nuts', 'Lactose', 'None']
medications = ['Metformin', 'Lisinopril', 'Aspirin', 'Ventolin', 'None']
blood_types = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']
pregnancy_status = ['Pregnant', 'Not pregnant', 'Not applicable']
genders = ['male', 'female', 'other']

# توليد 1000 بروفايل
n_profiles = 1000
profiles = []

for _ in range(n_profiles):
    gender = random.choice(genders)
    profile = {
        'full_name': fake.name(),
        'gender': gender,
        'date_of_birth': fake.date_of_birth(minimum_age=18, maximum_age=80).strftime('%Y-%m-%d'),
        'phone_number': fake.phone_number(),
        'blood_type': random.choice(blood_types),
        'allergies': json.dumps([random.choice(allergies)]),
        'chronic_conditions': json.dumps([random.choice(chronic_conditions)]),
        'medications': json.dumps([random.choice(medications)]),
        'prescription': json.dumps([random.choice(medications)] if random.random() > 0.5 else []),
        'Pregnancy_status': random.choice(pregnancy_status) if gender == 'female' else 'Not applicable',
        'weight': round(random.uniform(50, 120), 1),  # كجم
        'height': round(random.uniform(150, 200), 1),  # سم
        'notes': fake.text(max_nb_chars=100) if random.random() > 0.5 else ''
    }
    profiles.append(profile)

# تحويل لـ DataFrame وحفظ كـ CSV
df = pd.DataFrame(profiles)
df.to_csv('fake_profiles.csv', index=False)
print("تم توليد 1000 بروفايل وحفظها في fake_profiles.csv")

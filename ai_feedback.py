# app.py
import os
from flask import Flask, request, jsonify
import requests
from werkzeug.utils import secure_filename

app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = 'uploads'

# Your OpenRouter API key
OPENROUTER_API_KEY = "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"

# Ensure upload folder exists
os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)

def extract_text(file_path):
    if file_path.endswith('.pdf'):
        from PyPDF2 import PdfReader
        reader = PdfReader(file_path)
        return "\n".join(page.extract_text() for page in reader.pages if page.extract_text())
    else:
        with open(file_path, 'r', encoding='utf-8') as f:
            return f.read()

def get_feedback(track, user_text, username):
    prompt = f"""
You are a brutally honest and deeply caring career coach AI helping a student named "{username}" in the "{track}" field.

Here is what they submitted:
\"\"\"
{user_text}
\"\"\"

Your job:
1. Begin the feedback with their name. E.g., "{username}, this is a strong direction" or "{username}, how could you miss this? Let's fix it."
2. Be brutally honest about mistakes — point them out clearly and firmly. Don’t sugarcoat it. Make the student realize they must not repeat such mistakes.
3. When the approach is good but inefficient, explain what’s off and suggest a smarter or cleaner alternative.
4. If it's correct, praise it — but also push them to refine or level up.
5. Keep the tone like a real human mentor: part friend, part coach. It should feel personal — like someone truly wants to help them improve.
6. Finish with 1–2 practical steps they can take immediately.

Avoid robotic tone. Be clear, direct, bold, and helpful.

Your feedback:
"""

    headers = {
        "Authorization": f"Bearer {OPENROUTER_API_KEY}",
        "Content-Type": "application/json"
    }
    body = {
        "model": "openai/gpt-4",
        "messages": [{"role": "user", "content": prompt}],
        "temperature": 0.7
    }

    response = requests.post("https://openrouter.ai/api/v1/chat/completions", headers=headers, json=body)
    data = response.json()

    if response.status_code != 200:
        raise Exception(f"API Error {response.status_code}: {data}")

    return data['choices'][0]['message']['content'].strip()

@app.route('/upload', methods=['POST'])
def upload():
    try:
        file = request.files['file']
        track = request.form.get('track', 'General')
        username = request.form.get('username', 'Student')

        filename = secure_filename(file.filename)
        filepath = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        file.save(filepath)

        user_text = extract_text(filepath)
        if not user_text:
            return jsonify({"error": "File is empty or unreadable."}), 400

        feedback = get_feedback(track, user_text, username)
        return jsonify({"feedback": feedback})

    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)


from flask import Flask, render_template, request, jsonify
import os
import requests
import json

app = Flask(__name__)

UPLOAD_FOLDER = os.path.join(os.getcwd(), 'data')
if not os.path.exists(UPLOAD_FOLDER):
    os.makedirs(UPLOAD_FOLDER)

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# Predefined challenges list
challenges = [
    "Week 1: User Persona + Problem Discovery",
    "Personal Portfolio Website (Frontend Focus)"
]

# Home and page routes
@app.route('/')
def home():
    return render_template('index.html')

@app.route('/dashboard')
def dashboard():
    return render_template('dashboard.html')

@app.route('/upload_challenge')
def upload_challenge():
    return render_template('upload_challenge.html')

@app.route('/challenge')
def challenge():
    return render_template('challenge.html', challenges=challenges)

# Upload and feedback route
@app.route('/upload', methods=['GET', 'POST'])
def upload():
    if request.method == 'POST':
        if request.headers.get('X-Requested-With') == 'XMLHttpRequest':
            file = request.files.get('file')
            username = request.form.get('username', '').strip()
            title = request.form.get('title', '').strip()
            track = request.form.get('track', '').strip()

            if not file or not username or not title or not track:
                return jsonify({"error": "Missing required fields."}), 400

            filename = f"{username}_{title.replace(' ', '')}_{file.filename}"
            file_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
            file.save(file_path)

            try:
                try:
                    with open(file_path, 'r', encoding='utf-8') as f:
                        submission_text = f.read()
                except UnicodeDecodeError:
                    with open(file_path, 'r', encoding='ISO-8859-1') as f:
                        submission_text = f.read()
            except Exception as e:
                return jsonify({"error": f"Failed to read file: {str(e)}"}), 500

            # Call AI API with free model
            try:
                response = requests.post(
                    'https://openrouter.ai/api/v1/chat/completions',
                    headers={
                        "Authorization": "Bearer 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",
                        "Content-Type": "application/json"
                    },
                    json={
                        "model": "mistralai/mistral-7b-instruct:free",
                        "messages": [
                            {
                                "role": "system",
                                "content": f"""
You are a career coach reviewing a student submission by {username} in the {track} track.

- Start with their name: e.g., “{username}, this is off to a strong start” or “{username}, this is not quite there yet…”
- Mention the biggest flaw or improvement area.
- Give clear suggestions on what to fix or improve.
- If strong, suggest how they can level up further.
- Be friendly, motivating, and helpful.
"""
                            },
                            {
                                "role": "user",
                                "content": submission_text
                            }
                        ]
                    }
                )

                result = response.json()
                if response.status_code != 200:
                    return jsonify({"error": f"API error: {response.status_code}", "details": result}), 500

                if 'choices' in result and len(result['choices']) > 0:
                    feedback = result['choices'][0]['message']['content']
                else:
                    feedback = f"⚠ API response missing choices: {json.dumps(result, indent=2)}"

            except Exception as e:
                feedback = f"⚠ Error talking to AI: {str(e)}"

            return jsonify({"feedback": feedback})

    return render_template('upload_challenge.html', challenges=challenges)

# Review page
reviews = []

@app.route('/review', methods=['GET', 'POST'])
def review():
    global reviews
    if request.method == 'POST':
        name = request.form.get('name')
        message = request.form.get('message')
        if name and message:
            reviews.append({'name': name, 'message': message})
    return render_template('review.html', reviews=reviews)

# Static routes
@app.route('/leaderboard')
def leaderboard():
    return render_template('leaderboard.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

@app.route('/success')
def success():
    return render_template('success.html')

@app.route('/cs')
def cs():
    return render_template('cs.html')

@app.route('/management')
def management():
    return render_template('management.html')

# Run server
if __name__ == '__main__':
    app.run(debug=True)

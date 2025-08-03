@echo off
start cmd /k "ollama run mistral"
timeout /t 5
start cmd /k "python app.py"
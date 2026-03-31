#!/bin/bash
# Start the FastAPI backend server
cd "$(dirname "$0")"
python3 -m uvicorn app.main:app --host 0.0.0.0 --port 8000 --reload

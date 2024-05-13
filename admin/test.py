import requests
import json

def abc():
    # Dynamic text
    dynamic_text = 'Hi,I need a day off on 22nd April due to some personal work. Kindly approve my leave.Regards,Amjad Sayed  '
    dynamic_text += "given is my statement i want to find out  reason based on given statement like marriage, accident, xyz or any other response should be in maximum two words only"

    api_key = "AIzaSyDTdjProAkdaEBOtvErujuqQgr5c11OR5g"
    url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' + api_key

    # JSON payload with the dynamicText variable
    payload = {
        "contents": [
            {
                "parts": [
                    {
                        "text": dynamic_text
                    }
                ]
            }
        ]
    }

    headers = {
        'Content-Type': 'application/json',
    }

    response = requests.post(url, headers=headers, json=payload)

    if response.status_code == 200:
        decoded_response = response.json()
        if 'candidates' in decoded_response and decoded_response['candidates']:
            content = decoded_response['candidates'][0]['content']
            text = content['parts'][0]['text']
            # print(text)
            return text
        else:
            # print("No content found.")
            return "No Content Found"
    else:
        print("Error:", response.text)

# Call the function
print(abc())

from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
from nltk.stem import WordNetLemmatizer
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
import mysql.connector
import nltk
import requests
import json
# Download necessary NLTK resources
nltk.download('punkt')
nltk.download('stopwords')
nltk.download('wordnet')


def preprocess_text(text):
    # Tokenization
    words = word_tokenize(text.lower())

    # Stopword removal
    stop_words = set(stopwords.words('english'))
    words = [word for word in words if word.isalnum() and word not in stop_words]

    # Lemmatization
    lemmatizer = WordNetLemmatizer()
    words = [lemmatizer.lemmatize(word) for word in words]

    return words



def oneWordSentiment(dynamic_text):
    dynamic_text += "given is my statement i want to find out  reason based on given statement \
                    like marriage, accident, xyz or any other \
                    response should be in maximum two words only"
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

# Establish a connection to the MySQL database
try:
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="shivam@123",
        database="tmv"
    )

    if conn.is_connected():
        print("Connected to the MySQL database")

        # Create a cursor object to execute queries
        cursor = conn.cursor()

        # Example: Fetch data from the 'leave' table
        cursor.execute("SELECT id, reason FROM `leave` where is_updated_sent=0")
        rows = cursor.fetchall()

        # Perform sentiment analysis and update database
        for row in rows:
            id = row[0]
            sample_text = row[1]  # Extract text from the tuple

            # Preprocess the sample text
            preprocessed_text = preprocess_text(sample_text)
            # Join the preprocessed words back into a sentence
            preprocessed_sentence = ' '.join(preprocessed_text)
            # print(f"aaaa: {oneWordSentiment(preprocessed_sentence)}")
            oneWordSentimentVar = oneWordSentiment(preprocessed_sentence)
            analyzer = SentimentIntensityAnalyzer()
            score = analyzer.polarity_scores(preprocessed_sentence)
            compound_score = score['compound']

            # Determine sentiment based on compound scor e
            if compound_score >= 0.1:
                sentiment = "Positive"
            elif compound_score <= -0.1:
                sentiment = "Negative"
            else:
                sentiment = "Neutral"

            # Update the database with sentiment scores
            update_query = "UPDATE `leave` SET sentiment_score = %s, overall_sentiment = %s,one_word_sentiment = %s, is_updated_sent = 1 WHERE id = %s"
            # cursor.execute(update_query, (str(compound_score), sentiment, id))
            cursor.execute(update_query, (str(score), sentiment,oneWordSentimentVar, id))
            
            conn.commit()

            # Print the result
            print(f"ID: {id}")
            print(f"VADER analysis: {score}")
            print(f"Overall The sentiment is: {sentiment}")
            print("-" * 20)

except mysql.connector.Error as e:
    print("Error connecting to MySQL database:", e)

finally:
    # Close cursor and connection
    if 'cursor' in locals():
        cursor.close()
    if 'conn' in locals() and conn.is_connected():
        conn.close()
        print("MySQL connection is closed")





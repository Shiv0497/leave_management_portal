from flask import Flask
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
from nltk.stem import WordNetLemmatizer
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
import mysql.connector
import nltk
import logging

# Initialize Flask application
app = Flask(__name__)

# Download NLTK resources
nltk.download('punkt')
nltk.download('stopwords')
nltk.download('wordnet')

# Initialize NLTK components
stop_words = set(stopwords.words('english'))
lemmatizer = WordNetLemmatizer()
analyzer = SentimentIntensityAnalyzer()

# Configure the logger to output to the console
logging.basicConfig(level=logging.DEBUG)

def preprocess_text(text):
    # Tokenization
    words = word_tokenize(text.lower())

    # Stopword removal and lemmatization
    words = [lemmatizer.lemmatize(word) for word in words if word.isalnum() and word not in stop_words]

    return ' '.join(words)

def fetch_text_data():
    try:
        # Establish a connection to the MySQL database
        conn = mysql.connector.connect(
            host="localhost",
            user="root",
            password="shivam@123",
            database="tmv"
        )
        cursor = conn.cursor()

        # Query to select text data from the 'leave' table
        query = "SELECT reason FROM leave"

        cursor.execute(query)
        result = cursor.fetchall()

        # Log the fetched data
        logging.debug("Fetched text data: %s", result)

        # Close cursor and connection
        cursor.close()
        conn.close()

        return [row[0] for row in result]

    except mysql.connector.Error as error:
        logging.error("Error fetching data from MySQL table: %s", error)
        return []

@app.route('/')
def index():
    # Fetch text data from the 'leave' table
    text_data = fetch_text_data()

    # Preprocess the text data
    preprocessed_texts = [preprocess_text(text) for text in text_data]

    # Perform sentiment analysis
    sentiments = []
    for text in preprocessed_texts:
        score = analyzer.polarity_scores(text)
        compound_score = score['compound']

        # Determine sentiment
        if compound_score >= 0.1:
            sentiment = "Positive"
        elif compound_score <= -0.1:
            sentiment = "Negative"
        else:
            sentiment = "Neutral"

        sentiments.append(sentiment)

    # Zip text data with sentiments for printing
    result = list(zip(text_data, sentiments))

    # Print the result
    for text, sentiment in result:
        logging.info("Text: %s", text)
        logging.info("Sentiment: %s", sentiment)
        logging.info("-" * 20)

    return "Sentiment analysis printed in console"

if __name__ == '__main__':
    app.run(debug=True)

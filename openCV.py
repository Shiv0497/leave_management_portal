import cv2
import requests
import numpy as np

# Function to draw rectangle based on polygon coordinates
def draw_rectangle(image, polygon, color, thickness):
    # Extracting coordinates from the polygon data
    x_min = min(polygon, key=lambda point: point['x'])['x']
    x_max = max(polygon, key=lambda point: point['x'])['x']
    y_min = min(polygon, key=lambda point: point['y'])['y']
    y_max = max(polygon, key=lambda point: point['y'])['y']
    
    # Drawing rectangle on the image
    cv2.rectangle(image, (x_min, y_min), (x_max, y_max), color, thickness)

# URL of the image
url = "https://raw.githubusercontent.com/Azure-Samples/cognitive-services-REST-api-samples/master/curl/form-recognizer/rest-api/receipt.png"

# Download the image
response = requests.get(url)
img_array = np.array(bytearray(response.content), dtype=np.uint8)
img = cv2.imdecode(img_array, -1)  # Load the image as it is

# Polygon data
polygon_data = [
    { 'x': 1549, 'y': 2651 },
    { 'x': 1900, 'y': 2645 },
    { 'x': 1909, 'y': 2738 },
    { 'x': 1549, 'y': 2740 }
]

# Draw rectangle using polygon data
draw_rectangle(img, polygon_data, (0, 0, 255), 3)  # Red rectangle

# Output img with window name as 'image'
cv2.imshow('image', img)

# Save the modified image
cv2.imwrite('modified_image.png', img)

# Maintain output window until user presses a key
cv2.waitKey(0)

# Destroying present windows on screen
cv2.destroyAllWindows()

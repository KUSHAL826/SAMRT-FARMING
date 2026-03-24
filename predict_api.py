from flask import Flask, request, jsonify
import tensorflow as tf
import numpy as np
from PIL import Image

app = Flask(__name__)

model = tf.keras.models.load_model("plant_disease_model.h5")

classes = [
"Tomato Bacterial Spot",
"Early Blight",
"Healthy"
]

def predict(img_path):

    img = Image.open(img_path).resize((224,224))
    img = np.array(img)/255.0
    img = np.expand_dims(img,axis=0)

    pred = model.predict(img)

    return classes[np.argmax(pred)]


@app.route('/predict',methods=['POST'])
def predict_api():

    file = request.files['image']

    path = "temp.jpg"

    file.save(path)

    disease = predict(path)

    return jsonify({"disease":disease})


if __name__ == "__main__":
    import os
    port = int(os.environ.get("PORT", 8080))
    app.run(host="0.0.0.0", port=port)

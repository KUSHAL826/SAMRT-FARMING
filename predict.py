import sys
import os
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'

import numpy as np
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image

# load model
model = load_model("plant_disease_model.h5")

classes = [
"Early Blight",
"Late Blight",
"Healthy"
]

img_path = sys.argv[1]

img = image.load_img(img_path, target_size=(128,128))
img_array = image.img_to_array(img)

img_array = img_array/255.0
img_array = np.expand_dims(img_array, axis=0)

prediction = model.predict(img_array, verbose=0)

index = np.argmax(prediction)

disease = classes[index]

print(disease)
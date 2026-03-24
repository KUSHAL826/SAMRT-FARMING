<!DOCTYPE html>
<html>

<head>

<title>Crop Disease Detection</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>Crop Disease Detection</h1>

<p>
Upload a clear image of the crop leaf. The AI model will analyze the image and identify possible diseases along with recommended treatments.
</p>

<form action="detect-disease.php" method="POST" enctype="multipart/form-data">

<label>Upload Leaf Image</label>

<input type="file" name="leaf_image" accept="image/*" required>

<br><br>

<button type="submit">Detect Disease</button>

</form>

</div>

</body>

</html>
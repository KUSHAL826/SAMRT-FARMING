

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$result = "";
$imagePath = "";
$solution = "";

if(isset($_FILES['leaf_image']))
{

$uploadDir = "uploads/";

if(!is_dir($uploadDir))
{
mkdir($uploadDir,0777,true);
}

$fileName = time() . "_" . basename($_FILES["leaf_image"]["name"]);

$targetFile = $uploadDir . $fileName;

$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

$allowed = ["jpg","jpeg","png"];

if(in_array($imageFileType,$allowed))
{

if(move_uploaded_file($_FILES["leaf_image"]["tmp_name"],$targetFile))
{

$imagePath = $targetFile;


$url = "http://localhost:5000/predict";

$ch = curl_init();

$postData = [
'image' => new CURLFile($targetFile)
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if ($response === false || $data === null || !isset($data['disease'])) {
    $result = "API not reachable";
    $solution = "Server error: Disease detection service is not available.";
} else {
    $result = $data['disease'];
}

/* Disease Solution Recommendation */

if($result == "Tomato Early Blight" || $result == "Early Blight")
{
$solution = "Spray Mancozeb fungicide and remove infected leaves.";
}
elseif($result == "Tomato Bacterial Spot" || $result == "Bacterial Spot")
{
$solution = "Apply copper-based bactericide and avoid overhead watering.";
}
elseif($result == "Tomato Healthy" || $result == "Healthy")
{
$solution = "Plant is healthy. Maintain proper irrigation and nutrition.";
}
else
{
$solution = "Unable to detect disease. Please upload a clearer leaf image.";
}

}
else
{
$result = "Image upload failed.";
}

}
else
{
$result = "Only JPG, JPEG, PNG allowed.";
}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Disease Detection Result</title>

<link rel="stylesheet" href="style.css">

<style>

.result-box{
width:500px;
margin:auto;
margin-top:40px;
padding:30px;
border-radius:10px;
background:#f4fff4;
text-align:center;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.result-box img{
width:250px;
margin-top:15px;
border-radius:8px;
}

.result-title{
color:#2f7a2f;
font-size:22px;
margin-bottom:15px;
}

.detected{
font-size:20px;
font-weight:bold;
color:#d12f2f;
margin-top:10px;
}

.solution{
margin-top:15px;
font-size:16px;
color:#333;
}

.back-btn{
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#2f7a2f;
color:white;
text-decoration:none;
border-radius:5px;
}

.back-btn:hover{
background:#1f5a1f;
}

</style>

</head>

<body>

<div class="result-box">

<div class="result-title">Crop Disease Detection Result</div>

<?php if($imagePath!=""){ ?>

<img src="<?php echo $imagePath; ?>">

<div class="detected">
<?php echo "Detected Disease: " . htmlspecialchars($result ?? "No result"); ?>
</div>

<div class="solution">
<?php echo "Recommended Solution: " . htmlspecialchars($solution ?? "No solution"); ?>
</div>

<?php } ?>

<a href="crop-disease.php" class="back-btn">Try Another Image</a>

</div>

</body>

</html>
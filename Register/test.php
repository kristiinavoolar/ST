<?php

	$con = mysqli_connect("localhost","root","","studenttour");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

$target_dir = "documents/";
$target_file = uniqid();

$uploadOk = 1;
$imageFileType = "";
$myfile = "";

// Check if image file is a actual image or fake image
if(isset($_POST["lisa"])) {
	$imageFileType = pathinfo(basename($_FILES['fileToUpload']['name']),PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	echo "NIMI: ". $target_file;
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 90000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "pdf") {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	$myfile = "$target_dir" . "$target_file" . "." . "$imageFileType";
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $myfile)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

if (isset($_POST['lisa'])) {
	//include('auth.php');
	//$auth = 1;
	//$username = $_SESSION['username'];
		if (isset($_REQUEST['name'])) {
			$name = $_REQUEST['name'];
		}
		
		if (isset($_REQUEST['description'])) {
			$description = $_REQUEST['description'];
		}
		
		$query = "INSERT INTO test(id, name, description) " . "VALUES ('$myfile', '$name', '$description')";
		$result = mysqli_query($con,$query);
		
		header("Location:test.php");
	
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
<div class="ex">
<div class="container">
<form action="test.php" method="post" enctype="multipart/form-data">
<p>
Sisesta pildi nimi:
<input type="text" name="name"><br><br>
Sisesta pildi kirjeldus:
<input type="text" name="description">
</p>
Select image to upload:
<br><br>
<input type="file" class="btn btn-primary" name="fileToUpload" id="fileToUpload"><br>
<button type="submit" class="btn btn-primary" name="lisa">Upload image</button><br><br>
<input type="hidden" name="tagasi">
<button type="submit" class="btn btn-primary">Tagasi avalehele</button>
</form>
</div>
</div>

</body>
</html>


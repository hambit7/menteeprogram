<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
</head>
<body>
<div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='fileupl.html';">Main Page</button>
</div>

<div align="center">
<form action="" method="post" enctype="multipart/form-data">
   <br>
    <b>Select image : </b> 
    <input type="file" name="file" id="file" style="border: solid;">
    <input type="submit" value="Submit" name="submit">
</form>
</div>
<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    //original bug
//	$target_dir = "uploads/";
//	$target_file = $target_dir . basename($_FILES["file"]["name"]);
//
//    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//    echo "File uploaded /uploads/".$_FILES["file"]["name"];

    //fix

    if (!isset($_FILES["file"])) {
        die("There is no file to upload.");
    }

    $filepath = $_FILES['file']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);

    if ($fileSize === 0) {
        die("The file is empty.");
    }

    if ($fileSize > 3145728) {
        die("The file is too large");
    }

    $allowedTypes = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg'
    ];

    if (!in_array($filetype, array_keys($allowedTypes))) {
        die("File not allowed.");
    }

    $filename = basename($filepath);
    $extension = $allowedTypes[$filetype];
    $targetDirectory = __DIR__ . "/uploads";

    $newFilepath = $targetDirectory . "/" . $filename . "." . $extension;

    if (!copy($filepath, $newFilepath)) {
        die("Can't move file.");
    }
    unlink($filepath);

    echo "File uploaded successfully";

}
?>
</body>
</html>

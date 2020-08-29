<?php
/*
//Set upload directory based on type of picture upload.
if ($_POST['uploadType'] =="exco"){
	$target_dir = "images/excos/";
}
 elseif($_POST['uploadType'] =="banner"){
	$target_dir = "images/banner/";
} else {
		$target_dir = "images/carousel/";
}
*/

//$target_dir = "upload/";
$target_dir = "images/carousel/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
///echo "Target file = ".$target_file;

$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$FileType = strtoupper(pathinfo($target_file,PATHINFO_EXTENSION)); // convert to uppercase
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
$OKextensions = array("JPG","JPEG","GIF","PNG");

$found = array_search($FileType,$OKextensions);
//echo "Filetype-".$FileType,", Found - ".$OKextensions[$found];
//exit;
if($FileType != $OKextensions[$found]) {	
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
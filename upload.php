<?php
//print_r($_FILES);
$target_dir = "images/gallerypix/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//echo "File name = ".$target_file."<br>";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

/*
// test
//print_r(pathinfo($target_file));
$server =  $_SERVER['SERVER_NAME'];
$currentURL= 'http://'.$server . $_SERVER['REQUEST_URI'];
//echo "<br> Current path: ".getcwd();
//echo "<br> Server: ".$server ;

if ($server == 'localhost') {   // fix url based on server running upload
	$targetURL = 'http://'.$server.'/projects/radio/'.$target_file;
	echo $targetURL."<br>";
} else {
	$targetURL = 'http://'.$server.'/radio/'.$target_file;
	echo $targetURL."<br>";	
}
$_session['targetImageURL'] = $targetURL;

//exit;
/// end -test

*/

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<h2>Sorry, file already exists.</h2>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h2>Your file was not uploaded.</h2>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h2>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h2>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
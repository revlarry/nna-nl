<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include_once("analyticstracking.php"); ?>

<?php

if (!isset($_POST["submit"])) {
	echo "Upload failed!";
	exit;		
}


$target_dir = "docs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//echo "File name = ".$target_file."<br>";
$uploadOk = 1;
$docFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// test
//print_r(pathinfo($target_file));
if ($_SERVER['SERVER_NAME']=='localhost'){
	$server ='localhost' ; //$_SERVER['SERVER_NAME'];
} else {
	$server ='nnanl.org' ;
}

if ($server == 'localhost') {   // fix url based on server running upload
	$targetURL = 'http://'.$server.'/projects/nna-nl/'.$target_file;
	//echo "<br>".$targetURL." Target URL <br>";
	//exit;
} else {
	$targetURL = 'www.'.$server.'/'.$target_file;
	//$targetURL = 'http://'.$server.'/'.$target_file;
	//echo $targetURL."<br>";	
}


// Check if file already exists
//echo "<br><h1>".$target_file. " <--- Target File <h1>";
if (file_exists($target_file)) {
    echo "<b style='color:red;'>Sorry, this file already exists: </b>". $target_file;
	echo "<br>Try again.";
    $uploadOk = 0;
	exit;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	exit;
}
// Allow certain file formats
$pixTypes = array('doc','docx','pdf','DOC','DOCX');

if (!in_array($docFileType, $pixTypes)) {
    echo "<strong style='color:red;'>Sorry, only docunent files are allowed - 'doc','docx','pdf','DOC','DOCX'.</strong>";
    $uploadOk = 0;
} 


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
	exit;
	
// if everything is ok, try to upload file
} else {
	//echo "<h2>Target URL Now contains - ".$targetURL."</h2>";
	//echo "<h2>Target file Now contains - ".$target_file."</h2>";
	//echo "<h2>tmp_name - ".$_FILES["fileToUpload"]["tmp_name"]."</h2>";
	//exit;
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<b style='color:green;'>Success!</b> File '". basename( $_FILES["fileToUpload"]["name"]). "' uploaded.";
		
		//echo "Target URL = ".$targetURL;
		?>
		<script>
			parent.document.getElementById("url").value = "<?php echo $targetURL; ?>";
		</script>
		<?php
		

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




?>

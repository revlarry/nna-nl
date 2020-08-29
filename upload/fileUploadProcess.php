<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>


<?php
/*
// -test point
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
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
exit;
//----ENd test point ..


clearstatcache(); // clear cache
*/
//echo "Contents of session priorURL : ". $_SESSION['prior_url'];
//echo "COnten of S_FILES array <br>";
//echo "Type upload = ".$_POST['uploadType'];
//exit;

//if (isset($_GET["submit"])) {
if (isset($_POST["submit"])) {
	

	//echo "COntent of POST : ".$_POST["excoName"]."<br>";
/*
	echo "COntent of POST : ".$_POST["office"]."<br>";
	echo "COntent of POST : ".$_POST["start_tenure"]."<br>";
*/
// Escape quotatio marks
$_POST["excoName"] = addslashes($_POST["excoName"]);
$_POST["office"] = addslashes($_POST["office"]);
$start_tenure = $_POST["start_tenure"];
}
	else
{
	//print_r($_POST);
	//print_r($_POST);
	echo "Upload failed!";
	exit;		
}

//Set upload directory based on type of picture upload.
if ($_POST['uploadType'] =="exco"){
	$target_dir = "../images/excos/";
}
 elseif($_POST['uploadType'] =="banner"){
	$target_dir = "../images/banner/";
} else {
		$target_dir = "../images/carousel/";
}


$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//echo "File name = ".$target_file."<br>";
$uploadOk = 1;
$FileType = strtoupper(pathinfo($target_file,PATHINFO_EXTENSION)); // convert to uppercase

// test
//print_r(pathinfo($target_file));
$server =  $_SERVER['SERVER_NAME'];
$currentURL= 'http://'.$server . $_SERVER['REQUEST_URI'];
//echo "<br>".$currentURL;
//echo "<br>".$server ;
//exit;

if ($server == 'localhost') {   // fix url based on server running upload
	$targetURL = 'http://'.$server.'/projects/nna-nl/'.$target_file;
	//echo "<br>".$targetURL." Target URL <br>";
	//exit;
} else {
	$targetURL = 'http://'.$server.'/nnanl/'.$target_file;
	//echo $targetURL."<br>";	
}
//$_session['targetAudioURL'] = $targetURL;
/// end -test

// Check if audio file is real or fake 
if(isset($_POST["submit"])) {
 /* 
  $check = id3_get_tag( $_FILES["fileToUpload"]["tmp_name"]);  //getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an audio - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not audio.";
        $uploadOk = 0;
    }
*/	
}
// Check if file already exists
//echo "<br><h1>".$target_file. " <--- Target File <h1>";
if (file_exists($target_file)) {
    echo "<h3 style='color:red;'>Sorry, this file already exists:". $target_file."</h3>";
	echo "<br>Try again.";
    $uploadOk = 0;
	exit;
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
//if($FileType != "jpg" || "JPG") {	
    echo "Sorry, this file type $FileType NOT allowed.<br>";
	//echo "Sorry, only jpg files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

		//echo "<h1>Before I save!!</h1>";
		//echo "<h1>here now!!</h1>";
		//echo "Target file - ".$target_file;
		
		//clearstatcache();
		//echo $_FILES["fileToUpload"]["tmp_name"];
		//$tmpx = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		//echo " Error status  - ".$_FILES['uploadedfile']['error'];
		//var_dump($_FILES['uploadedfile']['error']);
		//var_dump($tmpx);
		//exit;

	
    //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "C:\Users\Radio\Documents")) {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		

	
        echo "<h3 style='color:green;'>Success! File '". basename( $_FILES["fileToUpload"]["name"]). "' uploaded.</h3>";
		
		//$_SESSION['targetAudioURL'] = $targetURL;
		
		//echo $_session['targetAudioURL'].": <-- Uploaded file";
		//exit;
		
		// Re-dimension photo of carousel or banner
		if ($target_dir = "images/carousel/"){
			$width= 640;
			$height = 420;
		}
		if ($target_dir = "images/exco/"){
			$width= 200;
			$height = 260;
		//	imgRescale($target_file,$width,$height,$target_dir);
		}
		if ($target_dir = "images/banner/"){
			$width= 960;
			$height = 640;
		}
		//imgRescale($target_file,$width,$height,$target_dir);	//Redimension image & save	
		
		//// save data in Executives table ------////
		$_SESSION['start_tenure']= $start_tenure; // save as default for next entry
		//echo "value start_tenure ".$_SESSION['start_tenure'];
		
		if ($_POST['uploadType'] =="exco"){
			$saved = saveExco ($target_file,$_POST["excoName"],$_POST["office"],$_POST["start_tenure"]); 
		}
		// Save redimensioned image ....
		//echo "Saved -- ".$saved;
		if ($_POST['uploadType'] !=="exco"){   // Set this falg to enable rescaling size of banner photos
			$saveOK=true;
		}
		if ($saved){
			imgRescale($target_file,$width,$height,$target_dir);	//Redimension image & save	
			echo "<h3 style='color:green;'>Success! File '". basename( $_FILES["fileToUpload"]["name"]). "' uploaded.</h3>";	
		}
    } else {
        echo "<h3 style='color:blue;'>Sorry, there was an error uploading your file. MysqlError - ".$_SESSION['error']."</h3>";
    }
}



/////////////////////////////////////////
	function imgRescale ($pixUrl,$new_width,$new_height,$savePath) {
	$filename = $pixUrl; // Pick up pix file -  e.g. "C:\Users\Radio\Pictures\panel-self-test.jpg";
	//$new_height = 420;  // this will be targeted image height (carousel)
	//$new_width = 640;
	//$savePath =  'images/carousel/';

	// Check if path exists.else create one

	if (!file_exists($savePath)){
		if (!mkdir($savePath, 0777, true)) {
			//exit;
			die('Failed to create path/folders...');
		} 
	}

	// Content type
	header('Content-Type: image/jpeg');

	// Get image dimensions
	list($width, $height) = getimagesize($filename);

	//Get aspect ratio 
/*	
	$aspectRatio = $width/$height;
	$new_width	 = $new_height *$aspectRatio;
*/
	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	// Output			
	//$saveFile = 'images/carousel/'.basename($filename); // compoae filename
	$saveFile = $savePath.basename($filename); // compose filename

	//imagejpeg($image_p, null, 100);  // output to browser
	imagejpeg($image_p,$saveFile , 100); // output to file
	//echo "File URL = ".$saveFile;
	//echo "<img src= '".$saveFile."' >";
	header('Content-Type: text/html');
	return $saveFile;
	}
	// End functiom imgRescale /
	
	
	
////////////////////////////////////////////////////////////////
	function saveExco($filepath,$Name,$office,$start_tenure){
////////////////////////////////////////////////////////////////
	
		include ('dbconnect.php');
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			die("Couldn't connect to database - ".$conn_connect_error);
		}
		
		
		//$sql = "INSERT INTO executives ( exconame, post, start_tenure, photourl) VALUES ('fgffhfhfh','hhhhhhhhhhhhhhhh',2011,'../images/excos/benefits of the kingdom.jpg')";
		//$sql = "INSERT INTO executives ( exconame, post, start_tenure, photourl) VALUES ('fgffhfhfh','hhhhhhhhhhhhhhhh',2011,'../images/excos/benefits of the kingdom.jpg')";
		   //$sql = "INSERT INTO executives ( exconame, post, start_tenure, photourl) VALUES ('hello','hello','2222','../images/excos/adam.jpg')"; ///test line
		   $sql =  " INSERT INTO executives ( exconame, post, start_tenure, photourl)";
		   $sql = $sql . " VALUES ('" .$Name."','". $office."'," . $start_tenure.",'" .$filepath."')";  
		   
		  echo $sql;  /// = $Name,$office, $start_tenure,$filepath;
		  exit;
		  
		  $results=$conn->query($sql);
		
		  if (!$results){
			  $saveOK=false;
			  $_SESSION['error']=$conn->query_error; // save error code
			  die("Could not save record! - ".$conn->query_error);	  
		  } else 
		  {$saveOK=true;}
		  
		//echo "<h1>WIll save exco data here!!!</h1>";
		//exit;
		
		
/*
	
		// Make connection to 'excos_schedule' table
		include ('dbconnect.php');
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			die("Couldn't connect to database - ".$conn_connect_error);
		}
		
		/*
		$sql = "select * from executives where trim(photourl) = '".trim($filepath) ;
		//echo $sql;
		//exit;
		
		$results = $conn->query($sql);
		if ($results){
		  die("Photo exists! ".$filepath);
		  }
		  */

		  
		  //echo "Will create new RECORD HERE!";
/*		  
		  $sql =  " INSERT INTO executives ( exconame, post, start_tenure, photourl)";
		   $sql = $sql . " VALUES ('" .$Name."','". $office."'," . $start_tenure.",'" .$filepath."')";
		   $sql = "INSERT INTO executives ( exconame, post, start_tenure, photourl) VALUES ('hello','hello','2011','../images/excos/adam.jpg')"; ///test line
		  echo $sql;  /// = $Name,$office, $start_tenure,$filepath;
		  //exit;
		  $results=$conn->query($sql);
		  //var_dump($results);
		  if (!$results){
			  $saveOK=false;
			  $_SESSION['error']=$conn->query_error; // save error code
			  die("Could not save record! - ".$conn->query_error);	  
		  } else 
		  {$saveOK=true;}
		  
	return  $saveOK;
	}
	
*/
}
		// End functiom saveExco /
?>
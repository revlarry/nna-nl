<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>


<?php
 $server=$_SERVER['HTTP_HOST'];
 $_SESSION['start_tenure']= $_POST['start_tenure']; // save current value to assist input
 //echo "start_tenure is - ".$_POST['start_tenure'];
 //echo "Session start_tenure contains - ".$_SESSION['start_tenure'];
//echo "<h1>HELLO!!!!</h1>";
  $main_dir = getcwd();

//echo "<br>Current main dir - ".$main_dir."<br>";

//Set upload directory based on type of picture upload.
if ($_POST['uploadType'] =="exco"){
	$sub_dir = "images/exco/";

}
 elseif($_POST['uploadType'] =="banner"){
	$sub_dir = "images/banner/";
} else {
		$sub_dir = "images/carousel/";
}


$target_file = $sub_dir . basename($_FILES["fileToUpload"]["name"]);


if ($server == 'localhost') {   // fix url based on server running upload
	$targetURL = 'http://'.$server.'/projects/nna-nl/'.$target_file;
	//echo "<br>".$targetURL." Target URL <br>";
	//exit;
} else {
	$targetURL = 'http://'.$server.'/nnanl.org/'.$target_file;
	//echo $targetURL."<br>";	
}
//echo "Target URL - ".$targetURL."<br>";	

if (isset($_POST["submit"])) {
		/*
		echo "COntent of POST : ".$_POST["excoName"]."<br>";
		echo "COntent of POST : ".$_POST["office"]."<br>";
		echo "COntent of POST : ".$_POST["start_tenure"]."<br>";
		*/
		// Escape quotatio marks
		$_POST["excoName"] = addslashes($_POST["excoName"]);
		$_POST["office"] = addslashes($_POST["office"]);
		$start_tenure = $_POST["start_tenure"];
		$deFile = $_FILES["fileToUpload"]["name"];
		// Validate upload before saving		;
		dovalidation($sub_dir,$deFile);
		
		$statusOk = saveExco ($target_file,$_POST["excoName"],$_POST["office"],$_POST["start_tenure"]); 
		//var_dump($statusOk);
		
		//imgRescale($target_file,$width,$height,$sub_dir);	//Redimension image & save	
		
		if ($statusOk){
			echo "Image details saved in database!";
			//echo "<br>Target dir variable now contains - ".$sub_dir;
			
			imgRescale($target_file,$width,$height,$sub_dir);	//Redimension image & save	
			echo "<h3 style='color:green;'>Success! File '". basename( $_FILES["fileToUpload"]["name"]). "' uploaded.</h3>";	
		}
     else 
		{
			echo "<h3 style='color:blue;'>Sorry, there was an error uploading your file. MysqlError - ".$_SESSION['error']."</h3>";
		}
		
		
} 
else
{exit;}	// endif 'submit 
	
///////////////////////////////////////////////////////////////
	function dovalidation($sub_dir,$fileToUpload){
////////////////////////////////////////////////////////////////	
//echo "Inside dovalidation!!";
	$target_file = $sub_dir . basename($fileToUpload);
	//echo "File name = ".$target_file."<br>";
	$uploadOk = 1;
	$FileType = strtoupper(pathinfo($target_file,PATHINFO_EXTENSION)); // convert to uppercase

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
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "<h3 style='color:green;'>Success! File '". basename( $_FILES["fileToUpload"]["name"]). "' uploaded.</h3>";
			$validOK = true;
		} else
		{	$validOK = false;}
	}
}
return $validOK;

///////////////
/////////////////////////////////////////////////
	function saveExco($filepath,$Name,$office,$start_tenure){
////////////////////////////////////////////////////////////////

		include ('dbconnect.php');
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			die("Couldn't connect to database - ".$conn_connect_error);
		}
		
		 $sql =  " INSERT INTO `executives` ( `exconame`, `post`, `start_tenure`, `photourl`)";
		   $sql = $sql . " VALUES ('" .$Name."','". $office."','" . $start_tenure."','" .$filepath."')";
	
		  //echo $sql."<br>";  /// = $Name,$office, $start_tenure,$filepath;
		  $results=$conn->query($sql);
		  //var_dump($results);
		
		  if (!$results){
			  $saveOK=false;
			  $_SESSION['error']=$conn->query_error; // save error code
			  die("Could not save record! - ".$conn->query_error);	  
		  } else 
		  {$saveOK=true;
			
		  return  $saveOK; }
	}
	/* End functiom saveExco */  
	
	
	/////////////////////////////////////////
	function imgRescale ($pixUrl,$new_width,$new_height,$sub_dir2) {
	$filename = $pixUrl; // Pick up pix file -  e.g. "C:\Users\Radio\Pictures\panel-self-test.jpg";
	  $main_dir = getcwd();
	//$new_height = 420;  // this will be targeted image height (carousel)
	//$new_width = 640;
	//$sub_dir2 =  'images/carousel/';
	//$sub_dir2 ='/'.$sub_dir2;
	
	echo "<br>Save path now is ---> ".$sub_dir2."<br>";
	//exit;
	//echo "Filename now is ---> ".$filename."<br>";
	
	// Check if path exists.else create one

/*
	if (!file_exists($sub_dir2)){
		if (!mkdir($sub_dir2, 0777, true)) {
			exit;
			die('Failed to create path/folders...');
		} 
	}
*/
	//echo "<h1>Inside imgRescale- </h1>";
	
	// Content type
	header('Content-Type: image/jpeg');

	// Get image dimensions
	list($width, $height) = getimagesize($filename);

	//Get aspect ratio 
	
	$aspectRatio = $width/$height;
	$new_width	 = $new_height *$aspectRatio;

	//var_dump(list($width, $height));
	$new_height = 260;  // temp image dimensions
	$new_width = $new_height *$aspectRatio;
	
	
	//echo "New width  ". $new_width. " & height - ".$new_height."<br>";
	//echo "Old width  ". $width. "& height ".$height."<br>";
	
	//exit;
		
	// Re-dimension photo of "exco", "carousel or banner"
	
	
		if ($sub_dir2 = "images/carousel/"){
			$new_width= 640;
			$new_height = 420;
			
			/*
			$aspectRatio = $width / $height;
			$new_width = $aspectRatio * $new_height;
			echo "New width =" . $aspectRatio * $new_height;
			*/
		}
		if ($sub_dir2 = "images/exco/"){
			$new_width= 200;
			$new_height = 260;
		//	imgRescale($target_file,$width,$height,$sub_dir2);
		}
		if ($sub_dir2 = "images/banner/"){
			$new_width= 960;
			$new_heightt = 640;
		}
		
	echo "<h1>Image for directory: ".$sub_dir2. ", new width: ".$new_width. ", new height ".$new_height."</h1>";	
	
	/*
	if ($sub_dir2 = "images/carousel/"){
		$width= 640;
		$height = 420;
	}
	*/
	//if ($sub_dir2 = "images/excos/"){
		//$width= 200;
		//$height = 260;
	
	//	imgRescale($target_file,$width,$height,$sub_dir);
	//}
	
	/*
	if ($sub_dir2 = "images/banner/"){
		$width= 960;
		$height = 640;
	}
*/
/*
// Test writeability of file
$filename1 = $main_dir.'/'.$filename;
chmod($filename1,0777);

if (is_writable($filename1)) {
    echo '<h1>The file is writable</h1>';
} else {
    echo '<h1>The file is not writable</h1>';
	//exit;
}
*/


	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	// Output			
	$saveFile = $sub_dir2.basename($filename); // compose filename
	//echo "Save path -- >".	$filename."<br>";
	//echo "Full path -- >".	$main_dir.'/'.$filename."<br>";

	
	//imagejpeg($image_p,$filename , 100); // output to file
	$statusOK = imagejpeg($image_p,$main_dir.'/'.$filename , 100); // output to file
	//var_dump($statusOK);
	
	//echo "File URL = ".$filename."<br>";
	//echo "<img src= '".$filename."' ><br>";
	
	header('Content-Type: text/html');
	return $saveFile;
	}
	// End functiom imgRescale /

?>
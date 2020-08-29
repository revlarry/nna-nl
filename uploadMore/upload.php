
<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include("/../functions.php") ?>
<?php
//echo "<h1>INSIDE Upload.php</h1>";
//exit;
/**
 * Multiple file upload with progress bar php and jQuery
 * 
 * @author Resalat Haque
 * @link http://www.w3bees.com
 * Adapted by L.Dorkenoo - 2-aug-2016
 */

$max_size = 1000000000; // 1G
//$max_size = 1024*200; // 200kb
$extensions = array('jpeg', 'jpg', 'png', 'JPG');
//$dir = 'uploads/';
//ECHo " Current directory : ".GETCWD();
//echo "<br>".$_SERVER['SERVER_NAME'];
//exit;
//if (trim($_SERVER['SERVER_NAME']) == 'www.nnanl.org'){
		$dir = '/var/www/vhosts/default/htdocs/images/gallerypix/';
//} else
//{
	$dir = '../images/gallerypix/';
//}

//echo "Path - > ".$dir;
//exit;
$count = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES['files']))
{
	// loop all files
	foreach ( $_FILES['files']['name'] as $i => $name )
	{

		// if file exist then skip it
		//if (file_exists($_FILES['files']['tmp_name'][$i])) 
		//	continue;
	
		// if file not uploaded then skip it
		if ( !is_uploaded_file($_FILES['files']['tmp_name'][$i]) )
			continue;

	    // skip large files
		if ( $_FILES['files']['size'][$i] >= $max_size )
			continue;

		// skip unprotected files
		if( !in_array(pathinfo($name, PATHINFO_EXTENSION), $extensions) )
			continue;

		// now we can move uploaded files
	    if( move_uploaded_file($_FILES["files"]["tmp_name"][$i], $dir . $name) )
	    	$count++;
	}
}

//echo json_encode(array('count' => $count));
echo "Done! Uploaded: ".$count." files";
//echo "http://".basename($_SESSION['url']);

//echo '<META http-equiv="refresh" content="3;URL=http://'.$_SESSION['url']. '">';
//header("Location: ../dashboard.php");
//pageRedirect();
?>
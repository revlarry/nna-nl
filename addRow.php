<?php session_start(); ?>
<?php
//echo "hello";
include ('dbconnect.php');
$conn= new mysqli($servername,$username,$password,$dbname);
if (!$conn){
die("Error connecting databse - ".$conn->connect_error);	
}
// else {
//	echo "Success - connected to databsse";
//}

// $sql = "INSERT INTO exco_schedule (`id`, `incumbent`, `col1_pix`, `col1_name`, `col1_post`, `col2_pix`, `col2_name`, `col2_post`, `col3_pix`, `col3_name`, `col3_post`, `start_tenure`, `end_tenure`, `order`) VALUES (NULL, '', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer ', 'Function', '', '', '')";

$sql = " INSERT INTO exco_schedule ( `col1_pix`, `col1_name`, `col1_post`, `col2_pix`, `col2_name`, `col2_post`, `col3_pix`, `col3_name`, `col3_post` ) VALUES ( 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer ', 'Function' )";
//echo $sql;

//exit;

$result = $conn->query($sql);
if (!$result){
	die("Error adding record - ".$conn->query_error);
}
//echo "<br>".$_SESSION['prior_url'];
echo '<meta http-equiv="refresh" content="0; URL='.$_SESSION['prior_url'].'" />';


//header('Location: $_SESSION['prior_url']');
//exit;
?>
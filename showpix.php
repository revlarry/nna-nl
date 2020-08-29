<?php session_start(); ?>
<?php
//echo $_POST['pix']."<br>";
//exit;
//print_r($_SESSION);
//echo $_SESSION["col"]."<br>";

//echo $_SESSION["id"]."<br>";
//echo "ColINdex = ".$_POST['colIndex']."<br>";
//echo "RecID = ".$_POST['recId']."<br>";

//print_r ($_POST);

//Update change
include ("dbconnect.php");
$conn = new mysqli($servername,$username,$password,$dbname);
if (!$conn){
	die("Connect failed - ".$conn->connect_error);
}
$sql = "update exco_schedule set ";
$sql = $sql. 'col'.$_POST['colIndex'].' = "'.$_POST['pix'].'" where id = '.$_POST['recId'];
echo $sql;

//exit;
$results = $conn->query($sql);
if (!$results){
	die("Update failed - ".$conn->connect_error);
}
//exit;
	header('Location: imagelist.php'); // Redirect to re-display list
?>
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
		/*
			$_SESSION['exconame']		= $files1[$i]["exconame"] ;
			$_SESSION['post']		    = $files1[$i]["post"];
			$_SESSION['start_tenure']	= $files1[$i]["start_tenure"];
			$_SESSION['end_tenure']		= $_SESSION['start_tenure']+2;
			*/
// Pull coresponding record from executives table 
$field = 'col'.$_POST['colIndex'].'_pix';

$sql = "select * from executives where  photourl ='".$_POST['pix']."'";

//echo $sql;
$results=$conn->query($sql);
if (!$results){
	die("Record not found - ".$conn->query_error);
} 
$row=$results->fetch_assoc();
//echo $row['post']."<br>";
//echo $row['exconame']."<br>";
//echo $row['start_tenure']."<br>";
$_SESSION['start_tenure']=$row['start_tenure'];
//exit;		
$sql = "update exco_schedule set ";
$sql = $sql . 'col'.$_POST['colIndex'].'_pix = "'.$_POST['pix'].'", ';
$sql = $sql . 'col'.$_POST['colIndex'].'_name = "'.$row['exconame'].'", ';

$sql = $sql . 'col'.$_POST['colIndex'].'_post = "'.$row['post'].'", ';
$sql = $sql . 'start_tenure = '.$_SESSION['start_tenure'].", ";

$sql = $sql . 'end_tenure = '.($row['start_tenure']+2);

$sql = $sql .' where id = '.$_POST['recId'];
//echo $sql;

//exit;
$results = $conn->query($sql);
if (!$results){
	die("Update failed - ".$conn->connect_error);
}
//exit;
/*
	$tmpfile=basename($_SESSION['prior_url']);
	header("Location:  $tmpfile");
	*/
	//header('Location: imagelist.php'); // Redirect to re-display list
	echo '<meta http-equiv="refresh" content="0; URL='.$_SESSION['prior_url'].'" />';
?>
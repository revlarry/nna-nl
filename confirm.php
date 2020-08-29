<?php session_start(); ?>

<?php
//echo "Record to be delated ". $_SESSION['recToDel']."<br>";
//echo $_POST['confirm'];
if (trim($_POST['confirm'])=="CONFIRM Delete"){
	//echo "Will cancel this operation";
//	echo '<meta http-equiv="refresh" content="0; URL='.$_SESSION['prior_url'].'" />'; // redirect to previous page
//} else
//{
	//echo "Will delete record HERE!!";
	include ('dbconnect.php');
	$conn= new mysqli($servername,$username,$password,$dbname);
	if (!$conn){
	die("Error connecting databse - ".$conn->connect_error);	
	}

	$sql = "DELETE FROM `exco_schedule`  where id =".$_SESSION['recToDel'] ;
	//echo $sql;
	//exit;
	
	$results = $conn->query($sql);
	if (!$results){
		die("Error: record NOT FOUND - ".$conn->query_error);
	}
}
echo '<meta http-equiv="refresh" content="0; URL='.$_SESSION['prior_url'].'" />'; // redirect to previous page
?>
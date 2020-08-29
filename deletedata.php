<?php

include("dbconnect.php");   // include settings for database connection

  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM members WHERE orgid="."'". $_POST['orgid']."'" ;

//echo "QUERY is = :".$sql;

if ($conn->query($sql) === TRUE) {
		//echo "Record deleted successfully";
		//header('Location: members.php'); // Redirect to re-display list
		include("members.php");   // Reload member list
	} else {
		echo "Error updating record: " . $conn->error;
	}

//$conn->close();
?>
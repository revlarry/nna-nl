<?php
 include("dbconnect.php");   // include settings for database connection
 include("functions.php"); 
  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

// Start composing SQL statement ...
		//$sql = "INSERT INTO members (orgname, contact, addressline1, adressline2, postalcode, city, country, mobile, phone, website, email, remarks) VALUES  ('"
 
		$sql = "INSERT INTO members (orgname, contact, addressline1, adressline2, postalcode, city, country, mobile, phone, website, email, remarks) VALUES  ('" .  $_POST['orgname'] . "'" .",   '"
		. $_POST['contact']     . "',  '"  
		. $_POST['addressline1']. "',  '"  				
		. $_POST['adressline2']. "',  '" 		
		. $_POST['postalcode']."',  '" 
		. $_POST['city']."',  '" 
		. $_POST['country']."',  '" 
		. $_POST['mobile']."',  '" 
		. $_POST['phone']."',  '" 
		. $_POST['website']."',  '" 
		. $_POST['email']."',  '" 
		. $_POST['remarks'].  "'  "
		
		. ")";  // Closing bracket of SQL statement


//		 echo $sql;
//		echo "<br>";

if (!empty(trim($_POST['orgname'])))
 {

		if ($conn->query($sql) === TRUE) {
			//echo "Record updated successfully";
			//header('Location: members.php'); // Redirect to re-display list
			include("members.php");
		} else {
			echo "Error updating record: " . $conn->error;
		}
 }
 else
	 {
		 echo "No blank blank fields";
		 pageRedirect();
	 }	 
	 
?>


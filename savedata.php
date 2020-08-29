<?php

include("dbconnect.php");   // include settings for database connection

  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

// Start composing SQL statement ...
$sql = "SELECT * FROM members WHERE orgid="."'". $_GET['orgid']."'" ;

$orgid = $_GET['orgid']; //save record id

$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<h4>Results : ".$result->num_rows." records</h4> <br>";
$row = $result->fetch_assoc();

}

if ($result->num_rows > 0) {
		// Save data here ....
		//echo "save data lines";
		$sql = "UPDATE members SET "; 
		$sql = $sql . "orgname ='". $_GET["orgname"]."',  "; 

		$sql = $sql . "contact = '" . $_GET["contact"] ."',  "; 
				
		$sql = $sql . "addressline1 ='". $_GET["addressline1"]."',  ";
		
	
		$sql = $sql . "adressline2 ='". $_GET["adressline2"]."',  "; 
		$sql = $sql . "postalcode ='". $_GET["postalcode"]."',  "; 
		
	
		$sql = $sql . "city ='". $_GET["city"]."',  "; 
		$sql = $sql . "country ='". $_GET["country"]."',  ";  
		$sql = $sql . "mobile ='". $_GET["mobile"]."',  "; 		
		$sql = $sql . "phone ='". $_GET["phone"]."',  "; 


		$sql = $sql . "website ='". $_GET["website"]."',  "; 		
		$sql = $sql . "email ='". $_GET["email"]."',  "; 			
		$sql = $sql . "remarks ='". $_GET["remarks"]."'  ";				


		$sql = $sql	. "    WHERE orgid= " . $_GET['orgid'];
				
		echo $sql;
		echo "<br>";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			header('Location: members.php'); // Redirect to re-display list
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();

} else {
		echo "0 results";
}

function reDisplayList() {
echo "Inside display function....";
}
  


<?php

include("dbconnect.php");   // include settings for database connection

  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

// Start composing SQL statement ...
$sql = "SELECT * FROM members WHERE orgid="."'". $_POST['orgid']."'" ;

$orgid = $_POST['orgid']; //save record id

$result = $conn->query($sql);

if ($result->num_rows > 0) {
//echo "<h4>Results : ".$result->num_rows." records</h4> <br>";
$row = $result->fetch_assoc();

}

if ($result->num_rows > 0) {
		// Save data here ....
		//echo "save data lines";
		$sql = "UPDATE members SET "; 
		$sql = $sql . "orgname ='". $_POST["orgname"]."',  "; 

		$sql = $sql . "contact = '" . $_POST["contact"] ."',  "; 
				
		$sql = $sql . "addressline1 ='". $_POST["addressline1"]."',  ";
		
	
		$sql = $sql . "adressline2 ='". $_POST["adressline2"]."',  "; 
		$sql = $sql . "postalcode ='". $_POST["postalcode"]."',  "; 
		
	
		$sql = $sql . "city ='". $_POST["city"]."',  "; 
		$sql = $sql . "country ='". $_POST["country"]."',  ";  
		$sql = $sql . "mobile ='". $_POST["mobile"]."',  "; 		
		$sql = $sql . "phone ='". $_POST["phone"]."',  "; 


		$sql = $sql . "website ='". $_POST["website"]."',  "; 		
		$sql = $sql . "email ='". $_POST["email"]."',  "; 			
		$sql = $sql . "remarks ='". $_POST["remarks"]."'  ";				


		$sql = $sql	. "    WHERE orgid= " . $_POST['orgid'];
				
		//echo $sql;
		//echo "<br>";

		if ($conn->query($sql) === TRUE) {
			//echo "Record updated successfully";
			header('Location: members.php'); // Redirect to re-display list
			//include("members.php");
		} else {
			echo "Error updating record: " . $conn->error;
		}

	//	$conn->close();

} else {
		echo "0 results";
}

?>
  


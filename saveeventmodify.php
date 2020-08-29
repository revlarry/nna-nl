<?php

include("dbconnect.php");   // include settings for database connection

  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

// Start composing SQL statement ...
$sql = "SELECT * FROM notices WHERE id="."'". $_POST['id']."'" ;

$id = $_POST['id']; //save record id

$result = $conn->query($sql);

if ($result->num_rows > 0) {
//echo "<h4>Results : ".$result->num_rows." records</h4> <br>";
$row = $result->fetch_assoc();

}

if ($result->num_rows > 0) {
		// Save data here ....
		//echo "save data lines";
		$sql = "UPDATE notices SET "; 
		$sql = $sql . "eventdate ='". $_POST["eventdate"]."',  "; 

		$sql = $sql . "eventdescrip = '" . $_POST["eventdescrip"] . "',  "; 
				
		if (trim($_POST["url"])!=''){
			if ($_SERVER['SERVER_NAME'] == 'nnanl.org'){
				$sql = $sql . "url ='http://". trim($_POST["url"])."'  ";
			}else {
				$sql = $sql . "url ='". trim($_POST["url"])."'  ";
			}
		}else {
			$sql = $sql . "url =''  ";
		}

		$sql = $sql	. "    WHERE id= " . $_POST['id'];
				
		//echo $sql;
	/*
		echo "<br>".getcwd()."<br>";
		echo $_SERVER['SERVER_NAME'];
		echo "<br>";
		echo dirname(getcwd())."<br>";
		print_r(pathinfo(getcwd()));
	*/
		//exit;
		
		if ($conn->query($sql) === TRUE) {
			//echo "Record updated successfully";
			header('Location: index.php'); // Redirect to re-display list
			//include("index.php");
		} else {
			echo "Error updating record: " . $conn->error;
		}

		
echo "CHANGED URL IS-->".$_POST["url"];
exit;		
	//	$conn->close();

} else {
		echo "0 results";
}

?>
  


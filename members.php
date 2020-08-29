<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include_once("analyticstracking.php") ?>
<?php include("header.php") ?>

<?php

  $_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
 // echo $_SESSION['url'];
  $redirectedurl = $_SESSION['url'];
?> 
 
 <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

 

    <!-- Page Content -->
    <div class="container">

       <div class="well well-sm">Member Profiles</div>

        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="images/member2.png" alt="">
            </div>
        </div>
        <!-- /.row -->

       


<?php

//if (!isset($_SESSION["userid"])) {
    if (!$_SESSION["loggedin"]) {
	//echo "Not logged in yet!!!";
	$loggedin=false;     // Temporary indicator for 'logged in' status
} else 
{
	//echo "Logged in as:". $_SESSION["userid"];
	$loggedin=true;     // Temporary indicator for 'logged in' status
}

 include("dbconnect.php");   // include settings for database connection
 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM members";

 	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<h4>Results : ".$result->num_rows." records</h4> ";
}


if ($result->num_rows > 0) {

	// Set up counter to itemise listing
		$ctr=1;
	
		// Table results
		echo   "<div class='table-responsive'>"; 
		echo '<table class="table table-striped">';
		echo "<thead>";
		echo "<tr>";
		
		//if ($loggedin) {   // Activate only when user logged in
        if ($_SESSION["loggedin"]) {   // Activate only when user logged in
			echo "<th bgcolor='gray'>". '&#43'. "</th>";
			echo "<th bgcolor='gray'>". '&#9998'. "</th>";
			echo "<th bgcolor='gray'>". '&#10008'. "</th>";			
		}	// end section Activate only when user logged in
			echo "<th bgcolor='gray'>Organisation Name</th>";
			echo "<th bgcolor='gray'>Contact Person</th>";
			echo "<th bgcolor='gray'>Address line 1</th>";
			echo "<th bgcolor='gray'>Address line 2</th>";
			echo "<th bgcolor='gray'>Postal code</th>";
			echo "<th bgcolor='gray'>City</th>";
			echo "<th bgcolor='gray'>Country</th>";
			echo "<th bgcolor='gray'>Mobile</th>";
			echo "<th bgcolor='gray'>Phone</th>";
			echo "<th bgcolor='gray'>Website</th>";
			echo "<th bgcolor='gray'>Email</th>";
			echo "<th bgcolor='gray'>Remarks</th>";

/*			echo "<th>". '&#9998'. "</th>";
			echo "<th>". '&#43'. "</th>";
			echo "<th>". '&#10008'. "</th>";
*/
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		
		
		while($row = $result->fetch_assoc()) {

			echo "<tr>";
		if ($_SESSION["loggedin"]) {   // Activate this section only when user logged in
        //if ($loggedin) {   // Activate this section only when user logged in
		
			////  -- adding a pop over link
			echo "<div class='container'>";
		
			echo "<td>";
					echo '<form action="add.php" method="POST">';
					echo "<input type='hidden' name='link' value=" ."'" . $row["orgid"]. "'>"; 
					echo "<input type='submit' value='&#43'>";  // Add (Plus) button 
					echo "</form>";  // Each buttons as a form element
			echo "</td>";
			echo "<td>";		
					//echo "<form action='response.php' method='POST'>";
					echo "<form action='modify.php' method='POST'>";
					echo "<input type='hidden' name='link' value=" ."'" . $row["orgid"]. "'>"; 
					echo "<input type='submit' value='&#9998'>";  // Edit (pencil) button 
					echo "</form>";  // Each buttons as a form element			
			echo "</td>";	
			echo "<td>";				
					echo '<form action="delete.php" method="POST">';
					echo "<input type='hidden' name='link' value=" ."'" . $row["orgid"]. "'>"; 
					echo "<input type='submit' value='&#10008'>";  // Delete (X) button 
					echo "</form>";  // Each buttons as a form element						
			echo "</td>";	
		}	// End: Section to check whether user logged in
		
		echo "<td><a href='#' title='". $row["orgname"] ."' data-toggle='popover' data-placement='bottom' data-content='"   // compose content for display here ...
		///. $row["orgname"].
		.  $row["contact"] . "\n ".
		  $row["addressline1"] . "\n" .
		  $row["adressline2"] . "\n ".
		  $row["postalcode"] . "\n ".
		  $row["city"] . "\n ".
		  $row["country"] . "\n ".
		  $row["mobile"] . " \n".
		  $row["phone"] . "\n ".
		  $row["website"] . "\n ".
		  $row["email"] . "\n" .
		  trim($row["remarks"]) .	
		
		 "'>". $ctr ." ". $row["orgname"]. "</a></td>"; // end: popover line item	
	

		 
		//echo "<td>". $ctr." ".$row["orgname"]."</td>" 
		echo "<td>". $row["contact"] ."</td>" 
			. "<td>". $row["addressline1"] ."</td>" 
			. "<td>". $row["adressline2"] ."</td>" 
			. "<td>". $row["postalcode"] ."</td>" 
			. "<td>". $row["city"] ."</td>" 
			. "<td>". $row["country"] ."</td>" 
			. "<td>". $row["mobile"] ."</td>" 
			. "<td>". $row["phone"] ."</td>" 
			. "<td>". $row["website"] ."</td>" 
			. "<td>". $row["email"] ."</td>" 
			. "<td>". trim($row["remarks"]) ."</td>"; 
		echo "</tr>";

		  $ctr=$ctr +1;
		} // end while loop
}
else 
{
		echo "0 results";
}

// Close up table after last entry

			echo "</div>";     // end pop-over code
		
	echo "</tbody>";
  echo "</table>";
  	echo "</div>";

 // end: well enclosure

$conn->close();
?>
<?php include("footer.php") ?>
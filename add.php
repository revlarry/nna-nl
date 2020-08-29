<?php include_once("analyticstracking.php") ?>
<?php include("header.php") ?>


		

<?php
include("dbconnect.php");   // include settings for database connection
$_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

addrecord();   // Add new record


function addrecord() {

echo '<div class="container">';
echo '<h2>Enter New Member Data</h2>';
//echo '<div class="well">Adding New Member';
  


	echo "<form action='saveadddata.php' method='POST'>"; 
	//echo "<form action='saveadddata.php' method='GET'>"; 
			echo "Organisation name:". "<br>";
			echo 	"<input type='text' name= 'orgname'  size='100' placeholder='Enter Organisation's name'>". "<br>";
			echo "Contact person:<br>";
			echo 	"<input type='text' name= 'contact'  size='100' placeholder='Enter contact person'>". "<br>";
			echo "Address line 1:". "<br>";
			echo 	"<input type='text' name= 'addressline1'  size='100' placeholder='Enter address line 1'>". "<br>";
			echo "&nbsp&nbspline 2:". "<br>";
			echo 	"<input type='text' name= 'adressline2'  size='100' placeholder='Enter address line 2'>". "<br>";
			echo "Postal code:". "<br>";
			echo 	"<input type='text' name= 'postalcode'  size='100' placeholder='Enter Postal code'>". "<br>";
			echo "City:". "<br>";
			echo 	"<input type='text' name= 'city'  size='100' placeholder='Enter city'>". "<br>";
			echo "Country:". "<br>";
			echo 	"<input type='text' name= 'country'  size='100' placeholder='Enter country'>". "<br>";
			echo "Mobile:". "<br>";
			echo 	"<input type='text' name= 'mobile'  size='100' placeholder='Enter mobile phone'>". "<br>";
			echo "Phone:". "<br>";
			echo 	"<input type='text' name= 'phone'  size='100'  placeholder='Enter phone'>". "<br>";
			echo "Website:". "<br>";
			echo 	"<input type='text' name= 'website'  size='100'  placeholder='Enter website'>". "<br>";
			echo "Email:". "<br>";
			echo 	"<input type='email' name= 'email'  size='100'  placeholder='Enter email address'>". "<br>";
			echo "Remarks:". "<br>";			
			echo 	"<input type='text' name= 'remarks'  size='100'  placeholder='Enter Remarks'>". "<br>";			
	echo  "<br><input type='submit' value='Save Changes'>";
	echo  "</form>";

//echo '</div>';  // end Well container
//echo '</div>';
	
}



?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


	<?php include("footer.php") ?>
	</div>
</div>
</body>

</html>
<?php include_once("analyticstracking.php") ?>
<?php include("header.php") ?>


		

<?php
 include("dbconnect.php");   // include settings for database connection



$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 


// Start composing SQL statement ...
$sql = "SELECT * FROM members WHERE orgid="."'". $_POST['link']."'" ;
//$sql = "SELECT * FROM members WHERE orgid = 1";

$orgid = $_POST['link']; //save record id

///echo "QUERY is = :".$sql;
 
//$sql = "SELECT * FROM broadcasts WHERE trim(url) ="."'". $_POST['link']."'" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
//echo "<h4>Found : ".$result->num_rows." record(s)</h4> <br>";
//echo "<h4>Found record of : ".$row["orgname"]."</h4> <br>";

}

if ($result->num_rows > 0) {
 //echo $row["orgname"];
editrecord($row);

} else {
    echo "0 results";
}



$conn->close();



function editrecord($param) {

echo '<div class="container">';
//echo "<h4>Found record of : ".$param["orgname"]."</h4> <br>";
echo '<h2>Change Member Data</h2>';
//echo '<div class="well">Changing Member data';


	echo "<form action='savemodifydata.php' method='POST'>"; 
			echo "Organisation name:<br>";
			echo 	"<input type='text' name= 'orgname'  size='100' value='".$param["orgname"]."'><br>";
			echo "Contact person:<br>";
			echo 	"<input type='text' name= 'contact'  size='100' value='".$param["contact"]."'><br>";
			echo "Address line 1:<br>";
			echo 	"<input type='text' name= 'addressline1'  size='100' value='".$param["addressline1"]."'><br>";
			echo "&nbsp&nbsp&nbspline 2:<br>";
			echo 	"<input type='text' name= 'adressline2'  size='100' value='".$param["adressline2"]."'><br>";
			echo "Postal code:<br>";
			echo 	"<input type='text' name= 'postalcode'  size='100' value='".$param["postalcode"]."'><br>";
			echo "City:<br>";
			echo 	"<input type='text' name= 'city'  size='100' value='".$param["city"]."'><br>";
			echo "Country:<br>";
			echo 	"<input type='text' name= 'country'  size='100' value='".$param["country"]."'><br>";
			echo "Mobile:<br>";
			echo 	"<input type='text' name= 'mobile'  size='100' value='".$param["mobile"]."'><br>";
			echo "Phone:<br>";
			echo 	"<input type='text' name= 'phone'  size='100' value='".$param["phone"]."'><br>";
			echo "Website:<br>";
			echo 	"<input type='text' name= 'website'  size='100' value='".$param["website"]."'><br>";
			echo "Email:<br>";
			echo 	"<input type='email' name= 'email'  size='100' value='".$param["email"]."'><br>";
			echo "Remarks:<br>";
			echo 	"<input type='text' name= 'remarks'  size='100' value='".$param["remarks"]."'><br>";
			echo "<input type='hidden' name= 'orgid'   value='".$param["orgid"]."'><br>";
			
	echo  "<input type='submit' value='Save Changes'>";
	echo  "</form>";

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
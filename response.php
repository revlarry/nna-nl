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
$sql = "SELECT * FROM members WHERE orgid="."'". $_GET['link']."'" ;
//$sql = "SELECT * FROM members WHERE orgid = 1";

$orgid = $_GET['link']; //save record id

///echo "QUERY is = :".$sql;
 
//$sql = "SELECT * FROM broadcasts WHERE trim(url) ="."'". $_POST['link']."'" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<h4>Results : ".$result->num_rows." record(s)</h4> <br>";
$row = $result->fetch_assoc();

}

if ($result->num_rows > 0) {
 //echo $row["orgname"];
editrecord($row);

} else {
    echo "0 results";
}



$conn->close();



function editrecord($param) {

	echo "<form action='savedata.php'method='GET'>"; 
			echo "Organisation name: <input type='text' name= 'orgname'  size='100' value='".$param["orgname"]."'><br>";
			echo "   Contact person: <input type='text' name= 'contact'  size='100' value='".$param["contact"]."'><br>";
			
			echo "    Address line 1: <input type='text' name= 'addr1'  size='100' value='".$param["addressline1"]."'><br>";
			echo "            line 2: <input type='text' name= 'addr2'  size='100' value='".$param["adressline2"]."'><br>";
			echo "       Postal code: <input type='text' name= 'postalcode'  size='100' value='".$param["postalcode"]."'><br>";
			echo "              City: <input type='text' name= 'city'  size='100' value='".$param["city"]."'><br>";
			echo "           Country: <input type='text' name= 'contact'  size='100' value='".$param["country"]."'><br>";
			echo "            Mobile: <input type='text' name= 'mobile'  size='100' value='".$param["mobile"]."'><br>";
			echo "             Phone: <input type='text' name= 'phone'  size='100' value='".$param["phone"]."'><br>";
			echo "           Website: <input type='text' name= 'website'  size='100' value='".$param["website"]."'><br>";
			echo "             Email: <input type='text' name= 'email'  size='100' value='".$param["email"]."'><br>";
			echo "           Remarks: <input type='text' name= 'remarks'  size='100' value='".$param["remarks"]."'><br>";
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

</body>

</html>
<?php include("footer.php") ?>
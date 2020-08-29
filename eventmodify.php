<?php session_start(); ?>
<?php


include_once("analyticstracking.php");
error_reporting(E_ERROR | E_PARSE);
include("header.php");

 include("dbconnect.php");   // include settings for database connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 

//echo " Post link = " . $_POST['link'];

// Start composing SQL statement ...
$sql = "SELECT * FROM notices WHERE id="."'". $_POST['link']."'" ;

$id = $_POST['link']; //save record id

//echo "QUERY is = :".$sql;
 
 
///$sql = "SELECT * FROM notices WHERE trim(url) ="."'". $_POST['link']."'" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
//echo "<h4>Found : ".$result->num_rows." record(s)</h4> <br>";
//echo "<h4>Found record of : ".$row['eventdescrip']."</h4> <br>";

}

if ($result->num_rows > 0) {
 //echo $row['eventdescrip'];
 editrecord($row);

} else {
    echo "0 results";
}


$conn->close();


function editrecord($param) {
	
	
	
 //echo '<h1 id="demo"></h1>';


echo '<div class="container">';
//echo "<h4>Found record of : ".$param["eventdescrip"]."</h4> <br>";
echo '<h2>Changing Event data</h2>';
echo '<div class="well">Changing Event data';

	echo "<form action='saveeventmodify.php' method='POST'>"; 
			echo "Event Date:<br>";
			echo "<input type='date' name= 'eventdate'  size='100' value='".$param["eventdate"]."'><br>";
			echo " Event description:<br>";
			echo "<input type='text' name= 'eventdescrip'  size='100' value='".$param["eventdescrip"]."'><br>";
			echo "    More info (enter a URL or link):<br>";

			echo "<input type='text' name= 'url'  id='url' size='100' >";
			//echo "<input type='text' name= 'demo' id= 'demo' size='100' >";
			echo "<a href='docUpload.htm' target='photobox' class='btn btn-default btn-xs' role='button'>Upload docment</a>";
			echo "<iframe  name='photobox' style='border:none;scroll:no;'>";
			echo    "<p>Your browser does not support iframes.</p>";
			echo "</iframe></td>";
			//echo "<p id='demo'> </p>";
			//echo "<table><tr><td><input type='text' name= 'url' id= 'url' size='87' ></td><td>".process()." </td></tr></table>";
	
		/*	
			echo "<table>";
			echo "<tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>xx&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>yyy&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".process()."</td></tr>"; // row 2
			echo "</table>";
			//echo "<div><div>xx</div><div>xx</div><div>".process()."</div></div>"; // row 1
			//echo "<table><tr><td><input type='text' name= 'url' id='myText' size='87' value='".$param["url"]."'></td></tr>";
			//echo '<tr><td><br>'.process().'</td></tr></table>';
			//echo '<tr><td><br><iframe src="docslist.php" id="eventbox" name="eventbox" style="border:2px solid grey;" onchange="myAction"></iframe></td></tr></table>';
			
		*/	
			echo "<input type='hidden' name= 'id'   value='".$param["id"]."'><br>";
			
			echo  "<input type='submit' value='Save Changes'>";
	echo  "</form></div>";


}
$_SESSION['prior_url'] = $_SERVER['SCRIPT_NAME'];

	// Section to refreshen page ....
	$completeURL = $_SERVER['SERVER_NAME'] . $_SESSION['prior_url'];
	

	// echo 'Server name: '.$_SERVER['SERVER_NAME'].'<br>';
	echo $completeURL;
	//exit;
	//echo '<META http-equiv="refresh" content="0;URL=http://'. $completeURL. '">';


//exit;
?>
<script>
function myAction() {
    var x = document.getElementById("eventbox").value;
    document.getElementById("url").innerHTML = "You selected: " + x;
}
</script>

<?php
function process(){
	echo '<iframe src="docslist.php" id="eventbox" name="eventbox" style="border:2px solid grey;" height="100" width="200"></iframe>';
	//echo '<iframe src="docslist.php" id="eventbox" name="eventbox" style="border:2px solid grey;" height="100" width="200" onchange="myAction"></iframe>';
	return $_SESSION['item'];
}
?>



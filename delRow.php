<?php session_start(); ?>


<?php
//echo $_POST['recToDel'];
$_SESSION['recToDel'] = $_POST['recToDel'];  // save record number to session variable
//exit;

include ('dbconnect.php');
$conn= new mysqli($servername,$username,$password,$dbname);
if (!$conn){
die("Error connecting databse - ".$conn->connect_error);	
}
// else {
//	echo "Success - connected to databsse";
//}

$sql = "SELECT * FROM `exco_schedule`  where id =".$_POST['recToDel'] ;
//echo $sql;
//exit;
$results = $conn->query($sql);
if (!$results){
	die("Error: record NOT FOUND - ".$conn->query_error);
}

//exit;

//echo "RECORD FOUND!!!";
while ($row = $results->fetch_assoc()){
	//echo '<img src="'.$row['col1'].'" width = "50" height ="50" alt ="xxxx">';
// Start of row 
echo showRow($row);	
}

exit;

//echo "<br>".$_SESSION['prior_url'];
echo '<meta http-equiv="refresh" content="0; URL='.$_SESSION['prior_url'].'" />';


//header('Location: $_SESSION['prior_url']');
//exit;

function showRow($rowx){
	?>
	<h2>Confirm deletion of record:</h2>
	 <div class="row">
		<div class="col-sm-3">
		<?php
		echo "<table><tr><td>";
		echo '<div class="thumbnail">';            
			echo '<img class="img-responsive" src="'.$rowx['col1_pix']. '" width="200" height="265" alt="'.$rowx['col1_name'].'">';
		echo '</div>';
		echo "</td>";
		?>
		</div>
		
		<div class="col-sm-3">
		<?php
		echo "<td>";
		echo '<div class="thumbnail">';
			echo '<img class="img-responsive" src="'.$rowx['col2_pix']. '" width="200" height="265" alt="'.$rowx['col2_name'].'">';
		echo '</div>';
		echo "</td>";
		?>	
		</div>
		
		<div class="col-sm-3">
		<?php
		echo "<td>";
		echo '<div class="thumbnail">';                   
			echo '<img class="img-responsive" src="'.$rowx['col3_pix']. '" width="200" height="265" alt="'.$rowx['col3_name'].'">';
        echo '</div>';
		echo "</td></tr>";		
		?>	
		</div>
		
	</div>
	<tr><td><form method="POST" action="confirm.php">
	<input type="submit" class="btn btn-danger btn-lg" name="confirm" value="CONFIRM Delete">
	</form></td><td></td>
	<td><form method="POST" action="confirm.php">
	<input type="submit" class="btn btn-info btn-lg" name="confirm" value="CANCEL">
	</form></td</tr>
	</table>
	
<?php

//return "yes!";
}
?>
<html lang="en">
<head>
  <title>NNA-NL Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
 
  
  <link rel="icon" 
      type="image/jpeg" 
      href="nna-nl-logo.png">
 
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>	  
	  
</head>
<?php
echo "<h4 style=color:red;>DELETE? - <strong>".$_POST['pix']."</strong></h4>";
//echo "<br>".$_POST['imageCategory'];

$image =$_POST['pix'];	
if($_POST['imageCategory']=='exco'){ // Check whether or not image is in use in the database
	
	if (!excoCheck($image)){  // Run a quick check on image to be deleted.
		echo "<h4 style=color:red;>Image above is in use - Sorry Cannot DELETE!</h4>";
		exit;
	} 
	
}


	// Compose SAVE and CANCEL option buttons	

echo '<form method="POST" action="deleteNow.php">';	
echo 	'<div class="container">';
echo 		'<input type="submit" name= "choice" class="btn btn-danger" value="DELETE">';
echo 		'<input type="hidden" name= "file"  value="'.$image.'">';
//echo 		'<input type="hidden" name= "file"  value="'.$_POST['pix'].'">';
echo 		'<input type="hidden" name= "imageCategory"  value="'.$_POST['imageCategory'].'">';
echo 		'<button type="button" class="btn btn-link"></button>'; 
echo 		'<input type="submit" name= "choice" class="btn btn-success" value="Cancel">';
//echo 		'<input type="submit" name= "cancel-save"class="btn btn-success" value="Cancel">';
echo 	'</div>';		
echo "</form>";


////////////////////////////////////////////
function excoCheck($image){              //
//// Check whether or not image is in use /
////////////////////////////////////////////
	//echo "I will now check .....";
	//exit;
	//$deleteImage = true;
	//-- Start test
	
	 // Section for database connection
	 // Make connection to 'excos_schedule' table
		include ('dbconnect.php');
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			die("Couldn't connect to database - ".$conn_connect_error);
		}

		//$sql = "select * from exco_schedule where col1_pix like '%".$image."'" ;
		$sql= "select * from exco_schedule where col1_pix like '%".$image."' or col2_pix like '%".$image."' or col3_pix like '%".$image."'";
		//echo "<br>".$sql;
		//exit;
		
		$results = $conn->query($sql);
		if ($results->num_rows>0){
			$deleteImage = false;
		 } else
		 {
			 $deleteImage = true;
		 }


		 $i=0;
		 $files1=array();
		while ($row = $results->fetch_assoc()){  // load recordset
			$files1[$i]=$row;
			$i++;
		}
		//echo $files1[0]['photourl'];
		//echo $files1[1]['photourl'];
		$filesCnt = count($files1);
		//echo "Aray size = ".$filesCnt;
		//exit;
		
	
	 
	
	//--- end test
	return $deleteImage;
}

  ?>
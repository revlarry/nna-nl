<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$_SESSION['prior_url']= $_SERVER['REQUEST_URI'];

//imgResize("images/excos/apostle_helen.jpg");  // testing
//exit;

// Make connection to 'excos_schedule' table
include ('dbconnect.php');
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("Couldn't connect to database - ".$conn_connect_error);
}

$sql = "select * from exco_schedule order by end_tenure desc" ;
$results = $conn->query($sql);
if (!$results){
  die("Query failed! ".$conn->connect_error);
  }



echo '<div class="container-fluid">';
while ($row = $results->fetch_assoc()){
	//echo '<img src="'.$row['col1'].'" width = "50" height ="50" alt ="xxxx">';
// Start of row 	



?>
<!--div class="container-fluid"-->
	 <div class="row">
		<div class="col-sm-3">
		<?php
		echo '<div class="thumbnail">';            
			echo '<img class="img-responsive" src="'.$row['col1_pix']. '" width="200" height="265" alt="'.$row['col1_name'].'">';
		   echo '<div class="caption" style="text-align: center;">';
					echo '<h3>'.$row['col1_name'].'<br>';
					
					// activate diting button
					//echo " ". '&#9998'. "(edit)<br> ";   // pencil (edit) sign
					// editing button
					
					echo '<small>'.$row['col1_post'].' '.$row['start_tenure'].'-'.$row['end_tenure']. '</small>';
					echo '</h3>'; 
					$_SESSION["col1"]="col1";
					$_SESSION["id"]=$row['id'];
					//$_SESSION["rec1"]=$row['id'];
					//echo "RecId - ".$row['id']."<br>";
					photochange(1,$row['id'],$_SESSION["col1"]);  // Change office pix here
		   echo '</div>';
		echo '</div>';
		
		?>
		</div>
		
		<div class="col-sm-3">
		<?php
		echo '<div class="thumbnail">';
			echo '<img class="img-responsive" src="'.$row['col2_pix']. '" width="200" height="265" alt="'.$row['col2_name'].'">';
			echo '<div class="caption" style="text-align: center;">';
					echo '<h3>'.$row['col2_name'].'<br>';
					
					// activate diting button
					//echo " ". '&#9998'. "(edit)<br> ";   // pencil (edit) sign
					// editing button
					
					echo '<small>'.$row['col2_post'].' '.$row['start_tenure'].'-'.$row['end_tenure']. '</small>';
					echo '</h3>';    
					$_SESSION["col2"]="col2";
					//$_SESSION["id"]=$row['id'];
					photochange(2,$_SESSION["id"],$_SESSION["col2"]);  // Change office pix here					
			echo '</div>';
		echo '</div>';
		?>	
		</div>
		
		<div class="col-sm-3">
		<?php
		echo '<div class="thumbnail">';                   
			echo '<img class="img-responsive" src="'.$row['col3_pix']. '" width="200" height="265" alt="'.$row['col3_name'].'">';
			echo '<div class="caption"  style="text-align: center;">';
				echo '<h3>'.$row['col3_name'].'<br>';
				
					// activate diting button
					//echo " ". '&#9998'. "(edit)<br> ";   // pencil (edit) sign
					// editing button
					
					echo '<small>'.$row['col3_post'].' '.$row['start_tenure'].'-'.$row['end_tenure']. '</small>';
				echo '</h3>';  
				$_SESSION["col3"]="col3";
				//$_SESSION["id"]=$row['id'];					
				photochange(3,$_SESSION["id"],$_SESSION["col3"]);  // Change office pix here				
			echo '</div>';
        echo '</div>';
		
		?>	
		</div>
		
		<div class="col-sm-3" >
		<?php
		echo '<br><br><br><br><br><br><h1 style="text-align:center;"> '. '<form method="POST" action="delRow.php"> <input type="submit" class="btn btn-danger" btn-lg value="'.'&#10008 - Delete This Row!"'.'> <input type="hidden" name="recToDel" value="'.$row['id'].'">  </form> '. '<a href="addRow.php" class="btn btn-info" btn-lg> &#43 - Add New Row </a></h1>';	 // X (cross)del & + add signs
		//echo "<br>".date('Y');
		?>

		</div>
	</div>
</div>



<?php
//echo '</div>';  // End container tag

}


///////////////////////////
function photochange($colIndex,$recId,$colname){
///////////////////////////
// Section for Drop-down menu for pictures      

//echo $colname. " <--- Colname<br>";
//echo $recId. " <--- recId<br>";
//exit;
                    
  echo '<div class="dropdown">';
   echo ' <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Select/Change photo ';
    echo '<span class="caret"></span></button>';
    echo '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';

	 // Loop through pix
	 //---
	 // Load picture & data from executives table

	 // Make connection to 'excos_schedule' table
		include ('dbconnect.php');
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			die("Couldn't connect to database - ".$conn_connect_error);
		}

		$sql = "select * from executives" ;
		$results = $conn->query($sql);
		if (!$results){
		  die("Query failed! ".$conn->connect_error);
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
		
	 // End pics & data extraction section
	 /////
	 $dir    = 'images/excos';
	//$files1 = scandir($dir);

	echo "<h2>Executives</h2>";
	for($i=0;$i<$filesCnt;$i++){
			$image=$files1[$i]['photourl'];
			echo '<form method ="POST"action="updateExcoList.php">';
			$end_tenure = $files1[$i]['start_tenure']+2;
				//echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><input type="hidden" name="recId" value="'.$recId.'"><input type="hidden" name="colIndex" value="'.$colIndex.'"><input type="hidden" name="pix" value="'. $image.'"> <input type="image" src="'. $image.'" width="80" height="80" alt="'.$files1[$i]['exconame'].'"><br>'.$files1[$i]['exconame'].'<br><small>'.$files1[$i]['post'].''.$files1[$i]['start_tenure'].' - '.$end_tenure.'</small></a></li>';

				$line ='<li role="presentation"><a role="menuitem" tabindex="-1" href="#">';
				$line .= '<input type="hidden" name="recId" value="'.$recId.'">';
				$line .= '<input type="hidden" name="colIndex" value="'.$colIndex.'">';
				$line .= '<input type="hidden" name="pix" value="'. $image.'">'; 
				$line .= '<input type="image" src="'. $image.'" width="80" height="80" alt="'.$files1[$i]["exconame"].'"><br>';
				$line .=  $files1[$i]['exconame'].'<br>';
				$line .= "<small>".$files1[$i]['post'].'<br>'.$files1[$i]['start_tenure'].' - '.$end_tenure.'</small>';
				$line .= '</a></li>';
			echo $line;		
			echo '</form>';	
	}	  
      echo '<li role="presentation" class="divider"></li>';
      echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><h3>End Photo List</h3></a></li>';
    echo '</ul>';
  echo '</div>';

  /*
  		// store session values for later use
			$_SESSION['exconame']		= $files1[$i]["exconame"] ;
			$_SESSION['post']		    = $files1[$i]["post"];
			$_SESSION['start_tenure']	= $files1[$i]["start_tenure"];
			$_SESSION['end_tenure']		= $_SESSION['start_tenure']+2;
			
			echo "session variables to save - ", $_SESSION['exconame'],$_SESSION['post'],$_SESSION['start_tenure'],$_SESSION['end_tenure'];
			exit;
  
  */
// End-dropdown menu section	
}

function imgResize($filename){
	// Content type
	header('Content-Type: image/jpeg');

	// Get new dimensions
	list($width, $height) = getimagesize($filename);

	//Get aspect ratio 
	//$aspectRatio = $width/$height;
	//$new_width	 = $new_height *$aspectRatio;
	$new_width  = 200;
	$new_height = 265;

	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


	// Output
	$saveFile = 'images/excos/'.basename($filename); // compoae filename

	imagejpeg($image_p, null, 100);  // output to browser
	imagejpeg($image_p,$saveFile , 75); // output to file
	// End test //////////////////////////////////	
}

?>

<div class="container">
  <h2>Past Executives</h2>
  <p>Click on the button to showing and hiding content below.</p>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>  
  

</body>
</html>

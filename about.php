<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include_once("analyticstracking.php") ?>
<?php include("header.php") ?>
<?php

  $_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
  //echo $_SESSION['url'];
  //exit;
?> 

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

$sql = "select * from exco_schedule order by id ASC" ;
$results = $conn->query($sql);
if (!$results){
  die("Query failed! ".$conn->connect_error);
  }
 

//echo '<div class="container-fluid">';
?>
<div class="container-fluid">
	  <div class="jumbotron">
      <!-- Intro Content -->
        <div class="row" >
            <div class="col-md-6" >
                <img class="img-responsive" src="images/nna-nl-logo.png" width="300" height="150" alt="NNA-NL logo">
				
				<h3>About NNA-NL</h3>
				<p style="font-family:verdana;font-size:120%;"</p>
				The Nigerian National Association - The Netherlands (NNA-NL) is the umbrella body for all Nigerian associations/organisations
				in the Netherlands. It is governed by a National Representative Council (NRC) whose members are Nigerians resident in the Netherlands,
				belongto an association under the NNA-NL umbrella and are elected by representatives of such associations. 
				The NRC is the policy making and managing body of NNA-NL and it oversees all NNA-NL's units. 
				The NRC is also responsible for setting NNA-NL objectives, determining strategy and selecting committes to perform any tasks
				the it deems necessary in the in the interestes of Nigerians.
				</p>
				
              <h3>AIMS AND OBJECTIVES</h3>
			<p style="font-family:verdana;font-size:120%;"</p>
    			The purpose of the NNA-NL unite all Nigerian associations/organisations with the common interest of:

				Having a credible and formal Nigerian umbrella body that enjoys the support and recognition of the vast majority of Nigerians in the Netherlands, eschewing nepotism, favoritism, tribalism, marginalisation of special favours for any segment of the Nigerian community.
				Positively advancing the Nigerian community in the Netherlands by any legitimate means, be it political, economic, social or technological.
				Protecting the interests of Nigerians living in the Netherlands by establishing in key locations in the Netherlands Nigerian community centres that will provide:
				Immigration help; 
				</p>
            </div>
            
            
             <div class="col-md-6">
			<p style="font-family:verdana;font-size:120%;"</p>
				Training and employment help;
				Information and awareness services;
                Emergency help and humanitarian services;
                Help in preventing human rights abuses against Nigerians in the Netherlands; and
				Encouragement to Nigerians to make a positive contribution to the social, economic and cultural development of society.
				Fostering harmonious relations within the Nigerian community on the one hand, and with the Dutch society and its institutions on the other by promoting dialogue through:
                
                
				Effective consultations between NNA-NL and the Nigerian community before major decisions affecting Nigerians are taken; and
				Effective consultations and communication with policy organs whose decisions affect and influence Nigerians.
				Being constructive in promoting the good image, and serve as good ambassadors of, Nigeria in the Diaspora, as well as help Nigerians integrate and be good citizens in the Netherlands. Inasmuch as we will support the governments of the Netherlands and Nigeria we will speak out against the ills of our society ranging from corruption and lack of good governance in Nigeria to discrimination against, and marginalisation of, Nigerians in the Netherlands.
				Helping Nigerians experiencing hardship in Nigeria and the Netherlands to help themselves by identifying sustainable development projects and pursuing avenues of participation by the Nigerians community in the Netherlands.
				The promotion of traditional Nigerian values.
				</p>
             
                <h3>MEMBERSHIP</h3>
    			<h4>General Requirements:</h4>

			<p style="font-family:verdana;font-size:120%;"</p>
				Membership is open to all legally registered Nigerian associations/organisations in the Netherlands. Every member association shall appoint two of its members to represent it in NNA-NL.
				Individual membership is not allowed; any person wishing to associate with NNA-NL is advised to join a member association.
				A representative of the Nigerian Embassy will serve as an honorary member.
				</p>
				
				<h4>Qualification:</h4>
			<p style="font-family:verdana;font-size:120%;"</p>
				A member association must be registered with its local Dutch Chamber of Commerce (KvK).
				The majority of the membership of member associations must be Nigerian.
				Member associations must be in good standing as defined by the laws of the Netherlands and Nigeria.
				</p>
            </div>
            
           
        </div>
		
		<div class="row">
			<h2 style="text-indent: 10px;">Executives + Executive Working Committee</h2>
		</div>

<?php

//var_dump($results);
if ($results->num_rows==null){
	//echo "<h1>Executive schedule table is empty</h1>";
	addBlankRow(); // add a blank row
}



while ($row = $results->fetch_assoc()){
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
					
					echo '<small>'.$row['col1_post'].', '.$row['start_tenure'].'-'.$row['end_tenure']. '</small>';
					echo '</h3>'; 
					$_SESSION["col1"]="col1";
					$_SESSION["id"]=$row['id'];
					//$_SESSION["rec1"]=$row['id'];
					//echo "RecId - ".$row['id']."<br>";
					if($_SESSION["loggedin"]){
						photochange(1,$row['id'],$_SESSION["col1"]);  // Change office pix here
					}
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
					
					echo '<small>'.$row['col2_post'].', '.$row['start_tenure'].'-'.$row['end_tenure']. '</small>';
					echo '</h3>';    
					$_SESSION["col2"]="col2";
					//$_SESSION["id"]=$row['id'];
					if($_SESSION["loggedin"]){
						photochange(2,$_SESSION["id"],$_SESSION["col2"]);  // Change office pix here					
					}
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
					
					echo '<small>'.$row['col3_post'].', '.$row['start_tenure'].'-'.$row['end_tenure']. '</small>';
				echo '</h3>';  
				$_SESSION["col3"]="col3";
				//$_SESSION["id"]=$row['id'];	
				if($_SESSION["loggedin"]){				
					photochange(3,$_SESSION["id"],$_SESSION["col3"]);  // Change office pix here				
				}
			echo '</div>';
		echo '</div>';

		?>	
		</div>

		<div class="col-sm-3" >
		<?php
		if($_SESSION["loggedin"]){
		echo '<br><br><br><br><br><br><h1 style="text-align:center;"> '. '<form method="POST" action="delRow.php"> <input type="submit" class="btn btn-danger" btn-lg value="'.'&#10008 - Delete This Row!"'.'> <input type="hidden" name="recToDel" value="'.$row['id'].'">  </form> '. '<a href="addRow.php" class="btn btn-info" btn-lg> &#43 - Add New Row </a></h1>';	 // X (cross)del & + add signs
		//echo "<br>".date('Y');
		}
		?>


			</div>
		</div>
		</div>
		</div>
		</div>

		<?php
		// End container tag
}



function addBlankRow(){
	include ('dbconnect.php');
	$conn= new mysqli($servername,$username,$password,$dbname);
	if (!$conn){
	die("Error connecting databse - ".$conn->connect_error);	
	}
	// else {
	//	echo "Success - connected to databsse";
	//}

	// $sql = "INSERT INTO exco_schedule (`id`, `incumbent`, `col1_pix`, `col1_name`, `col1_post`, `col2_pix`, `col2_name`, `col2_post`, `col3_pix`, `col3_name`, `col3_post`, `start_tenure`, `end_tenure`, `order`) VALUES (NULL, '', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer ', 'Function', '', '', '')";

	$sql = "INSERT INTO exco_schedule ( `col1_pix`, `col1_name`, `col1_post`, `col2_pix`, `col2_name`, `col2_post`, `col3_pix`, `col3_name`, `col3_post` ) VALUES ( 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer ', 'Function' )";
	 
	//echo $sql;
	$result = $conn->query($sql);
	if (!$result){
		die("Error adding record - ".$conn->query_error);
	}
	echo '<meta http-equiv="refresh" content="0; URL='.$_SESSION['prior_url'].'" />';
}
// end function addBlankRow


///////////////////////////
function photochange($colIndex,$recId,$colname){
///////////////////////////
// Section for Drop-down menu for pictures      

                    
  echo '<div class="dropdown">';
   echo ' <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Select/Change Executive ';
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
	
		//$filesCnt = count($files1);
		//echo "Aray size = ".$filesCnt;
		//exit;
		
	 // End pics & data extraction section
	 /////
	 
	 $dir    = 'images/exco';
	//$files1 = scandir($dir);
	 //var_dump($files1);
	// exit;


	$filesCnt = count($files1);

	echo "<h2>Executives</h2>";
	for($i=0;$i<$filesCnt;$i++){
			$image=$files1[$i]['photourl'];
			echo '<form method ="POST"action="updateExcoList.php">';
			$end_tenure = $files1[$i]['start_tenure']+2;

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

 <?php include("footer.php") ?>

</body>
</html>

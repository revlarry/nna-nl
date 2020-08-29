<?php include_once("analyticstracking.php") ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php session_start(); ?>
<?php
  $_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
  //echo $_SESSION['url'];
?> 

<?php include("header.php") ?>


 <?php
 date_default_timezone_set("Europe/Amsterdam");
 ////
 

echo '<!---class="container"--->';
echo '<div class="container">';
echo '	<div class="jumbotron">';
		
 $dir    = 'images/carousel';
$files1 = scandir($dir);  // Scan carouselimages directory
$arrSize = count($files1);
//echo $arrSize;
//exit;

//echo " Array size - ".$arrSize;
//exit;

if ($arrSize> 2) {  // when directory is empty
	array_shift($files1); // delete 1st dir entry
	array_shift($files1); // delete 2nd dir entry		
}


echo '	<!---SLider--->';
echo '	<div class="container">';
echo '		<div id="myCarousel" class="carousel slide" data-ride="carousel">';

// Fix no. of slide indicators
echo '	<!-- Indicators -->';
echo '	<ol class="carousel-indicators">';

if ($arrSize> 2) {  // when directory is empty
	$arrSize = count($files1);  //new array size
	$limit = $arrSize;
} else
{
	$arrSize = 1;  //new array size
	$limit = $arrSize;	
}
echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>'; // 1st element
for ($i=1;$i<$limit;$i++){
	echo ' <li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
}
echo '	</ol>';


///-- Wrapper for slides -->';
echo '	<div class="carousel-inner" role="listbox">';


//echo "First array element - ".$files1[0];
//echo "<br>2nd array element - ".$files1[1];
//exit;

 // Loop through Carousel pictures
echo '<!-- Wrapper for slides -->';
		if ($arrSize> 2) {  // when directory is empty
			$image=$dir.'/'.$files1[1];      // Get 1st element
		}else {
			$image='http://via.placeholder.com/640x420';      // Use thus placeholder element
		}
echo '<div class="carousel-inner" role="listbox">';
  echo '<div class="item active">';

  	///echo "<h1>".$image."</h1>"; /// test

	echo '<img src="'.$image.'" alt="" width="640" height="420">';
  echo '</div>';

  if ($arrSize> 2) {  // when directory is empty
	for ($i=2;$i<$arrSize;$i++){
		$image=$dir.'/'.$files1[$i];
	  echo '<div class="item">';
		   echo '<img src="'.$image.'" alt="" width="640" height="420">';
	  echo '</div>';
	}
  }
  
  
echo '			</div>';
//- End: Wrapper for slides -->';

echo '			<!-- Left and right controls -->';
echo '			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">';
echo '			  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
echo '			  <span class="sr-only">Previous</span>';
echo '			</a>';
echo '			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">';
echo '			  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
echo '			  <span class="sr-only">Next</span>';
echo '			</a>';
echo '		</div>	';
///	<!---End carousel div ------>';
echo '	</div>';
echo '	<!----Slide ends--->	';
echo '	</div>';
echo '	<!----End Jumbtron class--->';
echo '-<!-----/div------->	';

echo '<!-----Main greeting------->	';
 //<?php
echo '<div class="container">';      
echo '		<div class="col-lg-12">';
echo '			<h2 style="text-align:center;"> Welcome to The Nigerian National Association - The Netherlands (NNA-NL) </h2>';
echo '		</div>';
echo '</div>		';
 
 
    echo '<div class="row">';
    echo '       <div class="col-md-4">';
    echo '            <div class="panel panel-default">';
    echo '                <div class="panel-heading">';
                       echo ' <h4><i class="fa fa-fw fa-check"></i> About NNA-NL</h4>';
                   echo ' </div>';
                   echo ' <div class="panel-body">';
                     echo '   <p style="font-family:verdana;font-size:120%;">The Nigerian National Association - The Netherlands (NNA-NL) is the umbrella body for all Nigerian associations/organisations in the Netherlands.</p>';
                     echo '   <a href="about.php" class="btn btn-primary">Learn More</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="col-md-4">';
                echo '<div class="panel panel-default">';
                echo '    <div class="panel-heading">';
                echo '        <h4><i class="fa fa-fw fa-gift"></i> Business Directory</h4>';
                echo '    </div>';
                 echo '   <div class="panel-body">';
                 echo '       <p style="font-family:verdana;font-size:120%;">This page lists registered organisations and association of Nigerians in the Netherlands. Any Nigerian business or service provider that would like to be included in the directory should please contact NNA-NL with information about their business or service.</p>';
                   ?>    
					   <a href="javascript:alert('List unavailable!');" class="btn btn-primary">Learn More</a>
				<?php		
                 echo '   </div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="col-md-4">';
            echo '    <div class="panel panel-default">';
            echo '        <div class="panel-heading">';
            echo '            <h4><i class="fa fa-fw fa-compass"></i> Member Associations</h4>';
            echo '        </div>';
            echo '        <div class="panel-body" style="font-family:verdana;font-size:120%;">';
            echo '            <ol>';
			echo '			  <li>Abia Union The Netherlands </li>';
			echo '			  <li>Abiriba Communal Improvement Union The Netherlands</li>';
			echo '			  <li>Accord Club of Holland</li>';
			echo '			</ol>';
            echo '            <a href="members.php" class="btn btn-primary">Learn More</a>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
    echo '</div>';
    echo '    <!-- /.row -->';
 
 
			echo '<!-- Page Content -->';
	
	
			echo '<div class="col-lg-12">';
			echo '<h2 class="text-primary" align="center">Featured Events / News / Announcements</h2>';
			echo '</div>';
			echo '<div class="container-fluid">';
			echo '<div class="row">				';
			echo '<!-----Part 1-------->';			
			echo '<div class="col-sm-6">';
						
						 include("dbconnect.php");   // include settings for database connection

						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error)
						 {
							die("Connection failed: " . $conn->connect_error);
						} 

						// Start composing SQL statement ...
						if (!$_SESSION["loggedin"]) { 
							$sql = "select * from notices where eventdescrip<>'' order by eventdate desc"; 
						}
						else {
							$sql = "select * from notices order by eventdate desc"; 
						}
						$result = $conn->query($sql);
						$cnt=$result->num_rows;    // save row count

						//if ($result->num_rows > 0) {
						echo "<h4>Upcoming Events</h4> ";
						
						//Start table settings
						
						echo "<table style='width:100%'>";
								echo "<thead>";
								echo "<tr>";

							// Start activating editing button	
							  if ($_SESSION["loggedin"]) {   // Activate only when user logged in
									echo "<th bgcolor='gray'>". '&#9998'. "</th>";
								}	// end section Activate only when user logged in
								
							// End activating editing button	
								echo  "<th bgcolor='gray'> Event Date </th>";
								echo  "<th bgcolor='gray'> Description </th>";
								echo  "<th bgcolor='gray'> More Info </th>";
								echo "</tr>";						
						echo "</thead>";						
							echo "<tbody>";
							

							while($row = $result->fetch_assoc()) {
								
								echo "<tr>";
							  if ($_SESSION["loggedin"]==1) {   // Activate only when user logged in							
						// Section activate editing
								echo "<td><form action='eventmodify.php' method='POST'>";
								echo "<input type='hidden' name='link' value=" ."'" . $row["id"]. "'>"; 
								echo "<input type='submit' value='&#9998'>";  // Edit (pencil) button 
								echo "</form> </td>";  // Each buttons as a form element		
								}
						// End activate editing section		
								
								$date=date_create($row['eventdate']);
								//echo date_format($date,"d-M-Y");
								
								echo "<td>".date_format($date,"d-M-Y"). "</td> ";	
								//echo "<td>".$date->format('d-M-Y'). "</td> ";									
								echo  "<td>".$row['eventdescrip'] . "</td>"; 
							//	echo  "<td>" .$row['url'] . "</td>";	
								echo  "<td><a href='" .$row['url'] . "' target='_blank'>click for more info</td>";								
								echo "</tr>";				
							}							
								echo "</tbody>";
							echo "</table>";					
							
						$conn->close();   // close database
		
					echo '</div>';
					echo '<!-- end 1st column -->';
		
					echo '<div class="col-sm-6" style="background-color:lavenderblush;">';
					/////
					$dir    = 'images/banner';
					$files1 = scandir($dir);  // Scan banner images directory
					$arrSize = count($files1);
					
					// Remove dir (./..) entries from array
					if ($files1[0]=='.' && $files1[1]=='..'){
						//echo "will delete  1st two entries of array - ".$files1[0],$files1[1];
						array_shift($files1); // delete 1st dir entry
						array_shift($files1); // delete 2nd dir entry
						//print_r ($files1);
						//exit;
						
					}
					
					//print_r($files1);
					//exit;
					
					/*
					if (($arrSize-2) >5){
						//echo "Array size is MORE THAN 5 elements";
						$tempArray = $files1;
						$files1 = array_slice($tempArray,$arrSize-5); // take only last 5 array elements
						//print_r($files1);
						//exit;
					}
					*/
					
					echo '	<!---SLider--->';
					//echo '	<div class="container">';
					echo '		<div id="myCarousel" class="carousel slide" data-ride="carousel">';

					// Fix no. of slide indicators
					echo '	<!-- Indicators -->';
					echo '	<ol class="carousel-indicators">';
					// $arrSize = count($files1);  //new array size
					// $limit = $arrSize;

					// Testing
					if ($arrSize> 2) {  // when directory is empty
						$arrSize = count($files1);  //new array size
						$limit = $arrSize;
					} else
					{
						$arrSize = 1;  //new array size
						$limit = $arrSize;	
					}

					// --end of testing

					echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>'; // 1st element
					//for ($i=1;$i<$limit;$i++){
					for ($i=$limit;$i<=0;$i--){
						echo ' <li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
					}
					echo '	</ol>';

					///-- Wrapper for slides -->';
					echo '	<div class="carousel-inner" role="listbox">';

					 // Loop through pix
					echo '<!-- Wrapper for slides -->';
							
							$image=$dir.'/'.$files1[0];      // Get 1st element
							$imageCheckOK = getimagesize($image);
							// if($imageCheckOK){
							// 	echo $image." is a valid image";
							// } else 
							// {
							// 	echo $image." is NOT a valid image";
							// }
							// //exit;


					echo '<div class="carousel-inner" role="listbox">';
					  echo '<div class="item active">';
					  if (!$imageCheckOK){
					  		$image='http://via.placeholder.com/960x640';
					  		echo '<img src="'.$image.'" alt="" width="960" height="640">';
					  } else
					  {
					  		echo '<img src="'.$image.'" alt="" width="960" height="640">';
					  }
						
					  echo '</div>';

					  // -- Get rest of banner images ...
					for ($i=1;$i<$arrSize;$i++){
						$image=$dir.'/'.$files1[$i];
					  echo '<div class="item">';
						   echo '<img src="'.$image.'" alt="" width="960" height="640">';
					  echo '</div>';
					}
					echo '			</div>';
					//- End: Wrapper for slides -->';						
					echo '</div>';
					echo '<!-- End Carousel ..-->	';
			echo '</div>';
					echo '<!--- end 2nd column ---------->';
				echo '</div>';
			echo '</div>';
			?>				
			<!---End container-fluid --->
<!---------------->
    
		 
        <!-- Marketing Icons Section -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>
<?php include("footer.php") ?>
</div>
</html>

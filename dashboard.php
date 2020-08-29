<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include_once("analyticstracking.php"); ?>
<?php include("header.php"); ?>
<?php 

include("functions.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes

  if (!$_SESSION["loggedin"]and $_SERVER['SERVER_NAME']!='localhost'){
	  //redirect user to homepage
	  if ($_SERVER['SERVER_NAME'] == 'localhost') {
		 $completeURL = $_SERVER['SERVER_NAME'] . '/projects/nna-nl/index.php';
		}
	  if ($_SERVER['SERVER_NAME'] == 'nnanl.org'){
		$completeURL = $_SERVER['SERVER_NAME'] . '/index.php';
		}
		//echo $completeURL."<br>";
		echo '<META http-equiv="refresh" content="0;URL=http://'. $completeURL. '">';
  }


ReconcileExco();  // Reconcile & Sanitize Executives table
 
////////////////////////////////
/// Display Dashboard menu here
////////////////////////////////

   echo ' <!-- Page Content -->';
    echo '<div class="container">';

    echo   '<div class="well well-sm">Dashboard</div>';

     echo   '<!-- Image Header -->';
    echo    '<div class="row">';
    echo        '<div class="col-lg-12">';
    echo            '<img class="img-responsive" src="images/dashboard1.JPG"  width="150" height="50" alt="">';
    echo        '</div>';
    echo    '</div>';
    echo    '<!-- /.row -->';

     echo   '<!-- Service Panels -->';
     echo   "<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->";
     echo   '<div class="row">';
     echo       '<div class="col-lg-12">';
     echo           '<h2 class="page-header">Dashboard Panel</h2>';
     echo       '</div>';
     echo   '</div>';

     echo   '<!-- Service Tabs -->';
     echo   '<div class="row">';
            
    echo        '<div class="col-lg-12">';

    echo            '<ul id="myTab" class="nav nav-tabs nav-justified">';
    echo                '<li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Featured Events +</a>';
    echo                '</li>';
	echo                '<li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-tree"></i> Delete Photos</a>';
    echo                '</li>';
   
    echo                '<li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-support"></i> Membership</a>';
    echo                '</li>';
    echo                '<li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> Email address</a>';
	echo				'</li>';
	echo				'<li class=""><a href="#service-five" data-toggle="tab"><i class="fa fa-database"></i> Uploads</a>';
    echo                '</li>';
    echo            '</ul>';

	//------Featured Events/News /Announcements tab -----
    echo            '<div id="myTabContent" class="tab-content">';
    echo                '<div class="tab-pane fade active in" id="service-one">';
    echo                    '<h4>Featured Events / News / Announcements</h4>';
	echo					'<div class="container">';
					?>    
							   <a href="javascript:alert('Go to Home page');" class="btn btn-primary">Add Info</a>
							   <a href="javascript:alert('Go to Home page!');" class="btn btn-success">Display Info</a>
					<?php	
	echo					    '<a href="fileUploadBanner2.htm" class="btn btn-warning" role="button" target="box2">Upload Banner Photos</a>';
	echo                        '<div><iframe name="box2"  frameborder="0"> </iframe></div>';
	echo					'</div> ';
	echo				'</div>';


//- test start
	//------Delete photos tab -----				
    echo                '<div class="tab-pane fade" id="service-two">';
    echo                    '<h4>Delete Photos</h4>';
    echo                     '<div class="container">';
	echo					     '<a href="" class="btn btn-info" role="button"  target="delpics">Gallery</a>';
	echo					     '<a href="photoDeleteCarousel.php" class="btn btn-success" role="button" target="delpics">Carousel</a>';
	echo					     '<a href="photoDeleteBanner.php" class="btn btn-warning role="button" target="delpics">Banner</a>';
	echo					     '<a href="photoDeleteExCo.php" class="btn btn-primary role="button" target="delpics">Executives</a>';
	echo                         '<div><iframe name="delpics"  frameborder="0"  height="300"> </iframe></div>';
	echo					'</div> ';
	echo				'</div>';	
	
///- test end	
	//------Manage Membership tab -----
    echo                '<div class="tab-pane fade" id="service-three" align="center">';
    echo                    '<h4>Manage Membership data</h4>';
    echo                   '<div class="container">';
	echo					 ' <a href="members.php" class="btn btn-info" role="button">Click to Manage Membership data</a>';
	echo					'</div>';
	echo				'</div>';
	echo				'<div class="tab-pane fade" id="service-four" align="right">';
    echo                    '<h4>Set/Change Correspondence Email</h4>';
    echo                     '<div class="container">';
	
	echo				 '<a href="changeEmail.php" class="btn btn-info" role="button">'. $_SESSION["emailAddress"].'</a>';

	echo					'</div> ';
	echo				'</div>';
				
	//------Upload photos tab -----				
    echo                '<div class="tab-pane fade" id="service-five" align="right">';
    echo                    '<h4>Upload Photos</h4>';
    echo                     '<div class="container">';
//	echo                         '<div><iframe name="box"  frameborder="0"  height="300"> </iframe></div>';
	echo					     '<a href="uploadMore/index.php" class="btn btn-info" role="button"  target="box">Gallery</a>';
	echo					     '<a href="fileUploadCarousel.htm" class="btn btn-success" role="button" target="box">Carousel</a>';
	echo					     '<a href="fileUploadBanner.htm" class="btn btn-warning role="button" target="box">Banner</a>';
	echo					     '<a href="fileUploadExCo.htm" class="btn btn-primary role="button" target="box">Executives</a>';
	echo                         '<div><iframe name="box"  frameborder="0"  height="300"> </iframe></div>';
	echo					'</div> ';
	echo				'</div>';
    echo            '</div>';

    echo        '</div>';
    echo    '</div>';

    

    echo    '<hr>';
	
	
	
/////////////////////////////////////	
	function ReconcileExco(){
////////////////////////////////////
//	echo "Inside Reconcile function";
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

	 // Locate Executives images
	 $dir = 'images/exco';
	 $files=scandir($dir);
	 array_shift($files); // remove dir entry 1
	 array_shift($files); // remove dir entry 2
	 //print_r($files);
	 //exit;
	 
	 $cnt = count($files);
	while ($row = $results->fetch_assoc()){  
		//echo basename($row['photourl'])."<br>";	
		$image=basename($row['photourl']);
		
		if (!in_array($image, $files))
			/*
		  {
		  echo " Match found";
		  }
		else
			*/
		 {
		  //echo  "<br>Image - ".$image." Match not found<br>";
		 $sql = "delete from executives where photourl like '%". $image."'";
		 //echo $sql."<br>";
		
		 $answer = $conn->query($sql);  // Delete missing image from table
		if (!$answer){
		  die("Query failed! ".$conn->connect_error);
		 }
		  //exit;
		
		 }

	}
	/*
	 for($i=0;$i<$cnt;$i++){  // Loop through image array and compare with ExCo table
		echo $files[$i]."<br>";
		$sql = "select * from executives where photourl like '%". $files[$i]."'";
		echo $sql;
		//exit;
		
		$results = $conn->query($sql);
		if (!$results){
		  die("Query failed! ".$conn->connect_error);
		 }
	 }
	 
	 */

}
	


?>
      <!-- Footer -->
	 
      <?php include("footer.php") ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

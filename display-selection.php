<?php include_once("analyticstracking.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Radio Naija - A Pan-African Media</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 35%;
      margin: auto;
  }
  </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" class="äctive" href="index.php">Radio Naija</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.html">About</a>
                    </li>                  
					
				<!---Drop-down menu 1--->
					 <li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Extra
					  <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#">Newsletter Archives</a></li>
						<li><a href="#">Special Events</a></li>
						<li><a href="#">YouTube Videos</a></li>
						 <li><a href="#">Services</a> </li>
						<li><a href="#">Page 1-3</a></li> 
					  </ul>
					</li>
					
					<!-----end drop-down-menu--->
					
					
				<!---Drop-down menu 2----->
				<li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
				  <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Health</a></li>
					<li><a href="#">Social Issues</a></li>
					<li><a href="#">Politics</a></li> 
					<li><a href="#">Education</a></li> 
					<li><a href="#">Pastoral Forum</a></li> 
					<li><a href="#">Business</a></li> 
					<li><a href="#">Legal Issues</a></li> 
					<li><a href="#">Youth & Society</a></li> 
					<li><a href="#">More...</a></li> 
				  </ul>
				</li>
					
					<!-----end drop-down-menu--->
					
                    <li><a href="#"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search" ></span> Search</a></li>
					<li><a href="photogallery.html">Photo Gallery</a></li>
					<li><a href="contact.php">Contact</a></li>		
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="sign-up.php">Sign Up</a></li>		
					<li><a href="dashboard.html">Dashboad </a></li> 
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <div class="container">
		<div class="well well-sm">Search Results</div>

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
				<h3>Search Results</h3> 
				<img class="img-responsive" src="../radio/images/search3.png" width="150" height="100" alt="Search icon">
				
            </div>
                   
         </div>
        <!-- /.row -->



<?php

if (($_GET["searchterms"])=="") {
	echo "No search term provided!";
	exit;
}

/*
if (($_POST["searchterms"])=="") {
echo "No search term provided!";
exit;
}
*/

// Collect form input
//$searchstring=$_POST["searchterms"]; // Obtain search string via form textbox
$searchstring=$_GET["searchterms"]; // Obtain search string via form textbox
 //echo $_POST["searchterms"]; 

/* 
 // Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "radionaija";

*/

// Determine on which server you are working to proceed.
if ($_SERVER['SERVER_NAME'] == 'localhost') {
 //@ $db = new mysqli('localhost', 'root', 'root', 'blog');
 //@ $db = new mysqli('localhost', '', '', 'blog');
 @ $db = new mysqli('localhost', 'blog');
 
  // Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "radionaija";
 
}
else {
 @ $db = new mysqli('blogpodcast.db.8687452.hostedresource.com', 'radionaija', 'ifYlkd1966@', 'radionaija');
  // Create connection
$servername = "radionaija.db.8687452.hostedresource.com";
$username = "radionaija";
$password = "ifYlkd1966@";
$dbname = "radionaija";
 
  }

///




$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/* Compose SQL search string ///// */
$pieces = explode(" ", $searchstring);   // break up search items into array elements for further use

// Start composing SQL statement ...
//echo "Count of array elements ". count($pieces). "<br>";
$sql = "SELECT * FROM broadcasts  WHERE ";

for ($x = 0; $x< count($pieces); $x++) {
 	
 $sql .= "descrip LIKE '%".$pieces[$x]."%'";	
//	echo "The array key $x: contains $sql <br><br>";

	if (($x+1) != count($pieces)) {
			$sql .= ' or ';
	}
	
}  // End of FOR loop


$result = $conn->query($sql);
echo "<h3>You have searched with terms: '".$searchstring ."'"; // Display provided search terms
echo "</h3><br>";

if ($result->num_rows > 0) {
echo "<h4>Results : ".$result->num_rows." records</h4> <br>";
}

if ($result->num_rows > 0) {

// Tabled results


echo '<table class="table table-striped">';
    echo "<thead>";
    echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Description</th>";
        echo "<th>Guest(s)</th>";
		echo "<th>Action</th>";
      echo "</tr>";
    echo "</thead>";
	echo "<tbody>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["title"]."</td><td>" . stripslashes(substr($row["descrip"],0,300))."...  "."</td><td>" . $row["guests"]. "</td>";
		// Add clickable part of selection from here ..
		
	// echo '<img src="'.$row["photo"].'" alt="HTML5 Icon" style="width:128px;height:128px">'; //--- Display photo

	echo "<td>";
	echo "<form action='response.php' method='GET'>";
	//echo "<form action='response.php' method='POST'>";
	//echo $row["title"];
	echo "<input type='hidden' name='link' value=" ."'" . $row["url"]. "'>"; 

	echo "<input type='submit' value='Select & Play'>";
	echo "</form>";
		echo "</td></tr><br>";
    }
} else {
    echo "0 results";
}

// Close up table after last entry
	echo "</tbody>";
  echo "</table>";


$conn->close();
?>


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Copyright &copy; Radio Voice of Naija
					<script language="javascript" type="text/javascript">
						var today = new Date()
						var year = today.getFullYear()
						document.write(year)
					</script></strong> </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NNA-NL Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 50%;
      margin: auto;
  }
  
body {
    background-image: url("../images/bkgrnd.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
} 
 
th{
    padding: 5px;
    color:white;
}
th {
    text-align: left;
	bgcolor: black;
}
 
  </style>
  
  <link rel="icon" 
      type="image/jpeg" 
      href="nna-nl-logo.png">
</head>
<body>



<nav class="navbar navbar-inverse">


  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../nna-nl/index.php">NNA-NL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../nna-nl/index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="members.php">Member Profiles </a></li>
        <!--li><a href="photogallery.html">Photo Gallery</a></li-->
		<li><a href="../images/gallerypix/index.php"  target="_blank">Photo Gallery</a></li>
        <li><a href="contact.php">Contact</a></li>
		
		<?php
			if ($_SESSION["loggedin"]){   // Display option ONLY when user logged in
            //if (isset($_SESSION["loggedin"])){   // Display option ONLY when user logged in
				echo "<li><a href='dashboard.php'>Dashboard </a></li>";
			}
		?>
		
		 <li><a href="#"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"   target="_blank"></span> Search</a></li>
		 <!--li><a href="../nna-nl/search/search.php"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"   target="_blank"></span> Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">	   
		<!--li><a href="../nna-nl/search-nnanl/search2.php"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"   target="_blank"></span> Search</a></li-->
       <?php
    	   if (!$_SESSION["loggedin"]){
               //if (!isset($_SESSION["userid"])){
       //        echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
	   
				////  ---login form starts here
				echo "<li>";
				 echo "<form class='form-inline' role='form' action='logincheck.php' method='POST'>";
				 echo  " <div class='form-group'>";
				 echo   "  <label for='email'>Email:</label>";
				 echo     "<input type='email' class='form-control' name='email' placeholder='Enter email'>";
				 echo   "</div>";
				 echo   "<div class='form-group'>";
				 echo     "<label for='pwd'>Password:</label>";
				 echo     "<input type='password' class='form-control' name='pwd' placeholder='Enter password'>";
				 echo   "</div>";
				// echo   "<div class='checkbox'>";
				// echo     "<label><input type='checkbox'> Remember me</label>";
				//echo    "</div>";
				echo    "<button type='submit' class='btn btn-default'>Submit</button>";
				echo  "</form>";
				echo "</li>";
				////  /// End login form section			   
	
    		    }
    		else {
    	    	echo "<li><a href='logout.php'>". "Logged in as:". $_SESSION["userid"]. " <span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
	    	}
		?>
	</ul>
    </div>
  </div>
</nav>
  
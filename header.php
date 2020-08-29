<?php session_start(); ?>
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
	background-image: url("..s/images/bkgrnd.jpg");
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
 
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>	  
	  
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
      <a class="navbar-brand" href="index.php">NNA-NL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="members.php">Member Profiles </a></li>
        <!--li><a href="photogallery.html">Photo Gallery</a></li-->
		<li><a href="JavaScript:newPopup('images/gallerypix/index.php');"  target="_blank">Photo Gallery</a></li>
		<!--li><a href="../images/gallerypix/index.php"  target="_blank">Photo Gallery</a></li-->
        <li><a href="contact.php">Contact</a></li>
		
		<?php
			if ($_SESSION["loggedin"]){   // Display option ONLY when user logged in
            //if (isset($_SESSION["loggedin"])){   // Display option ONLY when user logged in
				echo "<li><a href='dashboard.php' class='btn btn-default'>Dashboard </a></li>";
			}
		?>
		
		 <!--li><a href="#"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"   target="_blank"></span> Search</a></li-->
		 <!--li><a href="../nna-nl/search/search.php"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"   target="_blank"></span> Search</a></li-->
      <!--/ul-->
      <!--ul class="nav navbar-nav navbar-right"--->	   
		<!--li><a href="../nna-nl/search-nnanl/search2.php"><span class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"   target="_blank"></span> Search</a></li-->
       <?php
    	   if (!$_SESSION["loggedin"]){
               //if (!isset($_SESSION["userid"])){
               echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
			   //echo "<li><a href='login-temp.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
    		    }
    		else {
    	    	echo "<li><a href='logout.php'>". "Logged in as:". $_SESSION["userid"]. " <span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
	    	}
		?>
	</ul>
    </div>
  </div>
</nav>
  
  
  <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=300,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
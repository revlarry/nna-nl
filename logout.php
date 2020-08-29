<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
	 //echo "Currently visiting this link:". $_SERVER['REQUEST_URI'];
	// echo "<br>Prior link visited was :". $_SESSION['url'];
	//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
/*	 
	if ($_SERVER['REQUEST_URI']== $_SESSION['url']) {
		echo "<br>Been On the same page";
		}
	else 
	{
	 		echo "<br>Been to different pages";
	}
*/	 
	 if (basename($_SESSION['url'])== 'login.php') {
	 	// exit;
		header("Location: index.php");
	 }

	  if (basename($_SESSION['url'])== 'dashboard.php') {
	 	// exit;
		header("Location: index.php");
	 }
	 /*
	 else {
		echo " WIll be going to a different link: ". $_SESSION['url']."<br>";
		$tmpfile=basename($_SESSION['url']);
		//echo  $tmpfile;
		//exit;
	 header("Location:  $tmpfile");

	 }
	 */
	 //$_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
	 $completeURL = $_SERVER['SERVER_NAME'] . $_SESSION['url'];
	 	echo '<META http-equiv="refresh" content="0;URL=http://'. $completeURL. '">';
	
    $_SESSION['loggedin']= false;
?>

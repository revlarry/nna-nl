<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include("header.php") ?>
<?php include_once("analyticstracking.php") ?>
<?php include("functions.php") ?>

<?php

//echo "<br>Current path --> ". getcwd();
//exit;


if (is_writable(getcwd())) {

	if (!file_exists("defaultData.txt")){
		echo "No default data; one has been created!";
		$myfile = fopen("defaultData.txt", "r+") or die("Unable to open file!");
		$txt = "info@nnanl.org\n";
		fwrite($myfile, $txt);
	}
	else
	{
	//	retrieve and/or modify stored email.
	//$_SESSION['emailAddress']
	getEmailaddress();
	echo "<p>Current <b>default email address</b>  from which emails will be send. Change by entering a new one.</p>";
	echo '<form action="save_email.php" method="POST">';
	echo	'<p>Current email: <input type="email" value ="'.$_SESSION['emailAddress'].'" name="usremail"></p>';
	echo	'<p><input type="submit"></p>';
	echo '</form>';
	
	
	}
	} 
else
	{
	//echo "session email address = ". $_SESSION["emailAddress"];	
	
	//echo "<br>Current path --> ". getcwd()." is NOT Writable!";
	echo "<p>Current <b>default email address</b>  from which emails will be send. Change by entering a new one.</p>";
	echo '<form action="save_email.php" method="POST">';
	echo	'<p>Current email: <input type="email" value ="'.$_SESSION["emailAddress"].'" name="usremail"></p>';
	//echo	'<p>Current email: <input type="email" value ="'.$email.'" name="usremail"></p>';
	echo	'<p><input type="submit"></p>';
	echo '</form>';
	
	}	
	




?>
<?php include("footer.php") ?>
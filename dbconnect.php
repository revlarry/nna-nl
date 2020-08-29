<?php
// Settings for a database connection on an online server or localhost
// Determine on which server you are working to proceed.

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	//@ $db = new mysqli('localhost', 'blog');
 
  // Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nna";
 
}
elseif ($_SERVER['SERVER_NAME'] == 'nnanl.org'){
 
$servername = "localhost";
$username = "ewc";
$password = "~Kn47C!6Y[";
$dbname = "nna";
 } else
  
  //$servername = "nnanl.db.8687452.hostedresource.com";
{
$servername = "nnanl.db.8687452.hostedresource.com";;
$username = "nnanl";
$password = "naijA2015!";
$dbname = "nnanl";
}
  
  ?>
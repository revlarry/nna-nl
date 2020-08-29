<?php
 session_start(); 
error_reporting(E_ERROR | E_PARSE);
 
include("functions.php");
//echo trim($_POST["usremail"]);

// test
	if (!is_writable(getcwd())) {
//		echo 'The file is writable';
		//echo 'The path is not writable - a default will be value- info@nnanl.org- will be used.';
		$_SESSION['emailAddress'] = trim($_POST["usremail"]);
		echo $_SESSION['emailAddress'];
	} else {
		$myfile = fopen("defaultData.txt", "w+") or die("Unable to open file!");
		$txt =  trim($_POST["usremail"])."\n";
		echo "Writing new email address: ",$txt;
		fwrite($myfile, $txt);

		fclose($myfile);
	
	//	echo 'The path is not writable - a default will be value- info@nnanl.org- will be used.';
	//	$_SESSION['emailAddress'] = 'info@nnanl.org';
	//	echo $_SESSION['emailAddress'];
	}
	//  exit;

// end test

//echo "Previous URL  ->".$_SESSION['url'] ;  
//$_SERVER['SERVER_NAME']

$completeURL = $_SERVER['SERVER_NAME'] . $_SESSION['url'];
echo '<META http-equiv="refresh" content="0;URL=http://'. $completeURL. '">';

?>
<!--?php session_start(); ?-->
<!--?php error_reporting(E_ERROR | E_PARSE); ?-->
<!--?php include("header.php") ?-->
<!--?php include_once("analyticstracking.php") ?-->
<!--?php include("functions.php") ?-->

<?php
/*
session_start();
error_reporting(E_ERROR | E_PARSE);
include("header.php");
include_once("analyticstracking.php");
include("functions.php");
*/
echo "Current path --> ". getcwd();
exit;

if (is_writable(getcwd())) {

	if (!file_exists("defaultData.txt")){
		echo "No default data; one has been created!";
		$myfile = fopen("defaultData.txt", "r+") or die("Unable to open file!");
		$txt = "info@nnanl.org\n";
		fwrite($myfile, $txt);
		}
	else 
		{
		$myfile = fopen("defaultData.txt", "r+") or die("Unable to open file!");
		
		$email = trim(fgets($myfile));
		//$email = strstr($email, "'");  // extract only address part
		//echo $email."<br>";	
		//exit;
		
		$domain = strstr($email, '@');
		$len=(strlen($domain));
		//echo $len;
		$domain = substr($domain,0,$len);

		$pre = strstr($email, '@',true);
		$pre = substr($pre,0,strlen($pre));

		$email = $pre.$domain;
		//echo "<br> Complete address -> ".$email;
		fclose($myfile);
		}
}
else
{
	echo "This path is NOT writable!!";
	$email ='';
	//exit;
}
	echo "<p>Current <b>default email address</b>  from which emails will be send. Change by entering a new one.</p>";
	echo '<form action="save_email.php" method="POST">';
	echo	'<p>Current email: <input type="email" value ="'.$email.'" name="usremail"></p>';
	echo	'<p><input type="submit"></p>';
	echo '</form>';
	




?>
<?php include("footer.php") ?>
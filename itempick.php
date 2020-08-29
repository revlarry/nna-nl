<?php session_start(); ?>
<?php
echo $_POST['item'];
//exit;

$_SESSION['item']=$_POST['item'];

// Refreshen 'eventmodify' page to reflect changed data

	// Section to refreshen page ....
	$completeURL = $_SERVER['SERVER_NAME'] . $_SESSION['prior_url'];

	// echo 'Server name: '.$_SERVER['SERVER_NAME'].'<br>';
	//echo $completeURL.'<br>';
	//exit;
	//echo '<META http-equiv="refresh" content="0;URL=http://'. $completeURL. '">';


?>

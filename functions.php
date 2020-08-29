	<?php session_start(); ?>
	<?php
	///////////////////////////////////////////////////////////////
	// Function obtains email address to receiving contact mailings
	function getEmailaddress(){
	///////////////////////////////////////////////////////////////	
		//echo "<h1>INSIDE Function</h1>";
		//exit;
		
	unset($_SESSION['emailAddress']);
	//$_SESSION['emailAddress'] ="";
	//$path = getcwd()."/defaultdata.txt";
	$path = "defaultdata.txt";
	
	// Check whether this default file exists
	if (!file_exists($path)) {
		$email = "info@nnanl.org";  // set this email as default
	} else
	{
		//$myfile = fopen("defaultData.txt", "r+") or die("Unable to open file!");
		$myfile = fopen($path, "r+") or die("Unable to open file!"); // Open new file for default.
		
		$email = fgets($myfile);
		//$email = strstr($email, "'");  // extract only address part
		//echo "<br>email raw -> ".$email."<br>";	

		
		$domain = strstr($email, '@');
		$len=(strlen($domain));
		//echo $len;
		$domain = substr($domain,0,$len);

		//echo 
		//exit;
		$pre = strstr($email, '@',true);
		$pre = substr($pre,0,strlen($pre));

		$email = $pre.$domain;	
		//echo "Fetched email address is : ".$email;
	}
	
/*	
	//$myfile = fopen("defaultData.txt", "r+") or die("Unable to open file!");
	$myfile = fopen($path, "r+") or die("Unable to open file!"); // Open new file for default.
	
	$email = fgets($myfile);
	//$email = strstr($email, "'");  // extract only address part
	//echo "<br>email raw -> ".$email."<br>";	

	
	$domain = strstr($email, '@');
	$len=(strlen($domain));
	//echo $len;
	$domain = substr($domain,0,$len);

	//echo 
	//exit;
	$pre = strstr($email, '@',true);
	$pre = substr($pre,0,strlen($pre));

	$email = $pre.$domain;
*/
	$_SESSION['emailAddress'] =$email;
	//echo "<br>SSSSSS ".$email;
	//exit;
	return $_SESSION['emailAddress'];
	}
	
	// Function to test when on mobile device
	function isMobile() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	
	function pageRedirect(){
		 $completeURL = $_SERVER['SERVER_NAME'] . $_SESSION['url'];
	 	echo '<META http-equiv="refresh" content="3;URL=http://'. $completeURL. '">';
	}
		?>
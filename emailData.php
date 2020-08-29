<?php

if (!file_exists("defaultData.txt")){
	echo "No default data; one will be created!";
	$myfile = fopen("defaultData.txt", "w") or die("Unable to open file!");
	$txt = "emailAddress = 'info@nnanl.org'\n";
	fwrite($myfile, $txt);
	}
	else {
		$myfile = fopen("defaultData.txt", "a+") or die("Unable to open file!");
		echo fgets($myfile);	
	}

fclose($myfile);
?>
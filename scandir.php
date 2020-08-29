<?php
echo $_SERVER['SERVER_NAME'].'/projects/nna-nl/images';
$dir    = 'images';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
echo "<hr>";
print_r($files2);

foreach($files1 as $x){
	$ext = substr($x,-3);
	
	$pix = array("jpg", "png", "gif");
	if (in_array(strtolower($ext), $pix)) {
		//echo "Got picture here!! - ".$x;
		echo '<img src="images/'.$x.'"  alt = "'. $x.'"  height="100" width="100">'.$x.'<br>';
		}
}
?>
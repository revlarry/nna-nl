<!DOCTYPE html>
<html lang="en">
<head>
  <title>NNA-NL Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  
  <link rel="icon" 
      type="image/jpeg" 
      href="nna-nl-logo.png">
 
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>	  
	  
</head>
<?php
///////////////////////////
// photoDelete - delete module 
///////////////////////////
// Section for Drop-down menu for pictures  

                    
	echo '<div class="dropdown">';
	echo "<br>";
	echo ' <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Click Selection';
    echo '<span class="caret"></span></button>';
    echo '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';

	 // Load & Loop through pix

	 $dir    = 'images/banner';
	$files1 = scandir($dir);
	array_shift($files1); //remove 1st dir entry
	array_shift($files1); //remove 2nd dir entry
	
	//print_r($files1);
	//exit;

	echo "<h4>Banner Photos</h4>";
	for($i=0;$i<count($files1);$i++){
			$image=$files1[$i];
		echo '<form method ="POST"action="photoDeleteAction.php">';
					$line ='<li role="presentation"><a role="menuitem" tabindex="-1" href="#">';
					$line .= '<input type="hidden" name="pix" value="'.$dir.'/'. $image.'">'; 
					$line .= '<input type="hidden" name="imageCategory" value="banner">'; 
					$line .= '<input type="image" src="'.$dir.'/'. $image.'" width="80" height="80" alt="'.$files1[$i].'"><br>';
					$line .=  $files1[$i].'<br>';
					$line .= '</a></li>';
		echo 		$line;		
		echo '</form>';	
	}	  
      echo '<li role="presentation" class="divider"></li>';
      echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><h4>End Photo List</h4></a></li>';
    echo '</ul>';
  echo '</div>';

 
// End-dropdown menu section	
?>
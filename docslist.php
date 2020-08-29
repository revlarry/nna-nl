 <?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include_once("analyticstracking.php") ?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

 $dir    = 'docs/';
 $dir    = 'images/';
	$files1 = scandir($dir);
	//$files1=array_shift($files1);
	array_shift($files1); // delete 1st dir entry
	array_shift($files1); // delete 2nd dir entry
	//print_r($files1);
	//echo "Array size = ".count($files1);
	
	// Create a down list
	 echo '<div class="container">';
	 echo  '<h5>Select File or Document</h5>';
	  echo '<div class="dropdown">';
	   echo '<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Make a choice';
		echo '<span class="caret"></span></button>';
		echo '<ul class="dropdown-menu">';
		
		$ctr=count($files1);
		for ($i=0;$i<$ctr;$i++){
		  echo '<li><form action="itempick.php" method="POST"><input type="hidden" name="item" value="'.$files1[$i].'"> <button type="submit" class="btn btn-link" onclick="myFunction()">'.$files1[$i].'</button> </form>     </li>';
		}
		  
		echo '</ul>';
	  echo '</div>';
	echo '</div>';

?>

<!--button onclick="myFunction()">Try it</button-->
<!--button onclick="myFunction()">Try it</button-->

<script>
function myFunction() {
    <?php echo 'document.getElementById("myText").value = "'.$_SESSION['item'].'";';
	 ?>
	//document.getElementById("myText").value = "Johnny Bravo";
}
</script>

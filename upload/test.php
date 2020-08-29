<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>


<?php
echo "<h1>Here NOW!</h1>";
		include ('dbconnect.php');
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			die("Couldn't connect to database - ".$conn_connect_error);
		}
		
		$sql = "INSERT INTO executives ( exconame, post, start_tenure, photourl) VALUES ('fgffhfhfh','PPPPPPPPPPPPPP',2011,'../images/excos/benefits of the kingdom.jpg')";
		   //$sql = "INSERT INTO executives ( exconame, post, start_tenure, photourl) VALUES ('hello','hello','2222','../images/excos/adam.jpg')"; ///test line
		  echo $sql;  /// = $Name,$office, $start_tenure,$filepath;
		  $results=$conn->query($sql);
		
		  if (!$results){
			  $saveOK=false;
			  $_SESSION['error']=$conn->query_error; // save error code
			  die("Could not save record! - ".$conn->query_error);	  
		  } else 
		  {$saveOK=true;}
		  

?>
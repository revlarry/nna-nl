<?php
//echo $_POST['choice']."<br>";
//echo $_POST['imageCategory']."<br>";
//exit;
$file = $_POST['file'];	


if($_POST['choice']=='Cancel'){
	echo ("<h4> Delete Cancelled</h4>");
	exit;
} else
{
	 $deleted = unlink($file);
}


if (!$deleted)
  {
  echo ("<br>Error deleting $file");
  }
else
  {
  echo "<h4>Deleted ".$_POST['file']."</h4>";
  }
  

// Redirect based on image category deleted
switch ($_POST['imageCategory']) {
    case "banner":
        echo $_POST['imageCategory'];
		header('Location: photoDeleteBanner.php');
        break;
    case "carousel":
        echo $_POST['imageCategory'];
		header('Location: photoDeleteCarousel.php');
        break;
    case "exco":
        echo $_POST['imageCategory'];
        break;
    default:
        echo "No selection!";
}
  
?>
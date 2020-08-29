<?php
session_start(); 
error_reporting(E_ERROR | E_PARSE);
include_once("analyticstracking.php");
include_once("functions.php");


/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
        
		$_SESSION['captcha']="";
        $captcha_message = "Invalid captcha";
        $style = "background-color: #FF606C";
    } else {
        $captcha_message = "Valid captcha";
        $style = "background-color: #CCFF99";
		
		// set header
		include("header.php");  // load header
		$request_captcha = htmlspecialchars($_REQUEST['captcha']);
		
	// Confirm CAPTCHA
		echo <<<HTML
        <div id="result" style="$style">
        <h2>$captcha_message</h2>
        </div> 
HTML;
		

		sendmail();  // send email through
    }

//	include("header.php");  // load header
	
//    $request_captcha = htmlspecialchars($_REQUEST['captcha']);


	
/*  
  echo <<<HTML
        <div id="result" style="$style">
        <h2>$captcha_message</h2>
        <table>
        <tr>
            <td>Session CAPTCHA:</td>
            <td>{$_SESSION['captcha']}</td>
        </tr>
        <tr>
            <td>Form CAPTCHA:</td>
            <td>$request_captcha</td>
        </tr>
        </table>
        </div>
HTML;
*/
    unset($_SESSION['captcha']);
	//echo '<META http-equiv="refresh" content="5;URL=http://www.nnanl.org/">';
	 //$_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
	 $completeURL = $_SERVER['SERVER_NAME'] . $_SESSION['url'];
	 	echo '<META http-equiv="refresh" content="5;URL=http://'. $completeURL. '">';

}

function sendmail()
{

$to = 'info@nnanl.org';  // Obtain stored default NNA-NL email address
//$to = getEmailaddress();  // Obtain stored default NNA-NL email address
$subject = "NNA-NL Contact Message";

$message = 'Message:<br>'.$_POST['message'];
$message .= '<br><br> Sender Name: '.$_POST['fullname']; // add full name
$message .= '<br> Email: '.$_POST['email'];  // add email
$message .= '<br> Tel. '.$_POST['phone'];  // add phone

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers

$headers .= 'From: <'. $_POST['email'].'>' . "\r\n";



if (mail($to,$subject,$message,$headers)) {
echo "<h2 class='bg-success'>Mail sent successfully!</h2>";
}
else
{
echo "Failure: Couldn't send mail";
exit;
}

}
//include("footer.php"); 
?>
 
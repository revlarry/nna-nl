<?php
session_start(); 
/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		$_SESSION['captcha']="";
        $captcha_message = "Invalid captcha";
        $style = "background-color: #FF606C";
    } else {
        $captcha_message = "Valid captcha";
        $style = "background-color: #CCFF99";
		
		echo "YEah, Got through!!!";
		sendmail();  // send email through
    }

    $request_captcha = htmlspecialchars($_REQUEST['captcha']);

	
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
    unset($_SESSION['captcha']);
}

function sendmail()
{
echo "Will send mail here";
$to = "voiceofnaija@live.com";
$subject = "NNA Contact Message";

$message = $_POST['message'];
$message .= '<br><br> Sender Name: '.$_POST['fullname']; // add full name
$message .= '<br> Email: '.$_POST['email'];  // add email
$message .= '<br> Tel. '.$_POST['phone'];  // add phone

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: <majestytv@gmail.com>' . "\r\n";
$headers .= 'From: <'. $_POST['email'].'>' . "\r\n";
//$headers .= 'Cc: dorkenool@msn.com' . "\r\n";

if (mail($to,$subject,$message,$headers)) {
echo "Mail sent successfully!";
}
else
{
echo "Failure: Couldn't send mail";
}

}
?>
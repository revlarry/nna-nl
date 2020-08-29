<?php 
echo "Captured fields are: ". "<br>";
echo $_POST["fullname"]. "<br>";
echo $_POST["email"]. "<br>";

if ($_POST["email"]<>'') { 
$ToEmail = 'voiceofnaija@live.com'; 
$EmailSubject = 'NNA-NL Contact form'; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Name: ".$_POST["fullname"].""; 
$MESSAGE_BODY .= "Email: ".$_POST["email"].""; 
$MESSAGE_BODY .= "Message: ".nl2br($_POST["message"]).""; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

}

?>
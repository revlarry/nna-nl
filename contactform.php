
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>

<div class="container">
  <h2>Horizontal form</h2>
  <!--form class="form-horizontal" role="form" action="contactfrmact.php" method="POST"-->
  <form class="form-horizontal" role="form" action="mailtest.php" method="POST">
 <?
require_once('recaptchalib.php');
  $publickey = "6LdWnAgTAAAAAD-1eAu5xfgp2XtXC-R9BBCVNMiY"; // You got this from the signup page.
  echo recaptcha_get_html($publickey);
?>

  
  
     <div class="form-group">
      <label class="control-label col-sm-2" for="fullname">Full Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name">
      </div>
    </div>
  

	
   <div class="form-group">
      <label class="control-label col-sm-2" for="email">Phone Number</label>
      <div class="col-sm-10">
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Please enter your phone number">
      </div>
    </div>	
	
  
  
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Your Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="message">Message:</label>
      <div class="col-sm-10">          

           <textarea rows="7" cols="70" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="70" style="resize:none"></textarea>
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
	<div class="g-recaptcha" data-sitekey="6LdWnAgTAAAAAD-1eAu5xfgp2XtXC-R9BBCVNMiY"></div>
  </form>
</div>

</body>
</html>

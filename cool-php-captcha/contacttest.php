<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include("header.php") ?>
<?php include_once("analyticstracking.php") ?>

<?php

  $_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
  echo "Where I'm I?";
?> 
<body>
   <!-- Page Content -->
    <div class="container">
	<div class="well well-sm">Contact / Form</div>
  
     <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="../nna-nl/images/contact1.png" alt="">
            </div>
        </div>
        <!-- /.row -->
	
    </div>


<!--body onload="document.getElementById('captcha-form').focus()"--->
        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Send us a Message</h3>
                <!---form name="sentMessage" id="contactForm" novalidate--OLD-LINE---->
				 <!---form name="sentMessage" id="contactForm" action="contactcheck.php" method="post"-->
				 <!--form class="form-horizontal" role="form" action="mail.php" method="POST"--->

				<form method="POST" action="verify.php">
				<!--form method="GET" action="verify.php"--->
				<!--form class="form-horizontal" role="form" action="mail.php" method="POST"--->
			 
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
					  <label class="control-label col-sm-2" for="email">Email:</label>
					  <div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="control-label col-sm-2" for="message">Message:</label>
					  <div class="col-sm-10">          

						   <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
					  </div>
					</div>
			
					</div>
	
							</div>

        </div>
        <!-- /.row -->




<!------Captcha Section ------>
<img src="captcha.php" id="captcha" /><br/>
<p><strong>CAPTCHA: Please write the following word:</strong></p>

<!-- CHANGE TEXT LINK -->
<a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>

<input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
<input type="submit" class="btn btn-default" value="Submit"/>

</form>



<?php

/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
        $captcha_message = "Invalid captcha";
        $style = "background-color: #FF606C";
    } else {
        $captcha_message = "Valid captcha";
        $style = "background-color: #CCFF99";
		
		echo "YEah, Got through!!!";
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


?>






</body>
</html>

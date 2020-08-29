<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include("header.php") ?>
<?php include_once("analyticstracking.php") ?>

<?php

  $_SESSION['url'] = $_SERVER['REQUEST_URI'];  // Save current URL for redirecting purposes
 
?> 

   <!-- Page Content -->
    <div class="container">
	<div class="well well-sm">Contact / Form</div>
  
     <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="images/contact1.png" alt="">
            </div>
		</div>
        <!-- /.row -->

		<!--body onload="document.getElementById('captcha-form').focus()"--->
        <div class="row">

                <h3>Send us a Message</h3>

			<!--- Testing  new CONTACT FORM ---->
			<form method="POST" action="verify.php">

			  <div class="form-group">
			    <label for="fullname">Full Name:</label>
			    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name">
			  </div>
			  <div class="form-group">
			    <label for="phone">Phone Number</label>
			    <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
			  </div>
			  <div class="form-group">
			    <label for="message">My Message</label>
			    <textarea rows="5" cols="70" class="form-control" name="message" id="message" name="message" data-validation-required-message="Please enter your message" maxlength="500" style="resize:none" required></textarea>
			  </div>

			<div>
				<!---Captcha Section ---->
				<img src="cool-php-captcha/captcha.php" id="captcha" /><br/>
				<p><strong>CAPTCHA: Please write the following word:</strong></p>

				<!-- CHANGE TEXT LINK -->
				<a href="#" onclick="
					document.getElementById('captcha').src='captcha.php?'+Math.random();
					document.getElementById('captcha-form').focus();"
					id="change-image">Not readable? Change text.</a><br/><br/>

				<input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
				<input type="submit" class="btn btn-primary" value="Submit"/>
			</div>									
			</form>

			<!---End Testing  new CONTACT FORM ---->


		


 <?php include("footer.php") ?>

	

<!-- /.container -->


   
	   

</body>

</html>

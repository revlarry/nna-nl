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
                <img class="img-responsive" src="../nna-nl/images/contact1.png" alt="">
            </div>
		</div>
        <!-- /.row -->

		<!--body onload="document.getElementById('captcha-form').focus()"--->
        <div class="row">

                <h3>Send us a Message</h3>

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
					  <label class="control-label col-sm-2" for="email">Email</label>
					  <div class="col-sm-10">
						<input type="tel" class="form-control" id="email" name="email" placeholder="Enter email">
					  </div>
					</div>	
					  
					  
					
					<div class="form-group">
					  <label class="control-label col-sm-2" for="message">Message:</label>
					  <div class="col-sm-10">          
						   <textarea rows="5" cols="70" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="500" style="resize:none"></textarea>
					  </div>
					</div>
				</div>					

	   
<!------Captcha Section ------>
			<img src="cool-php-captcha/captcha.php" id="captcha" /><br/>
			<p><strong>CAPTCHA: Please write the following word:</strong></p>

			<!-- CHANGE TEXT LINK -->
			<a href="#" onclick="
				document.getElementById('captcha').src='captcha.php?'+Math.random();
				document.getElementById('captcha-form').focus();"
				id="change-image">Not readable? Change text.</a><br/><br/>

			<input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
			<input type="submit" class="btn btn-default" value="Submit"/>

			</form>
	   
 <?php include("footer.php") ?>



	   
	</div>
  
     	
</div>
<!-- /.container -->

</body>

</html>

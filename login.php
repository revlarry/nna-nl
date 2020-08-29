<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include("header.php") ?>




</body>
</html>
		
		
		
		<?php
			if ($_SESSION["loggedin"]){   // Display option ONLY when user logged in
            //if (isset($_SESSION["loggedin"])){   // Display option ONLY when user logged in
				echo "<li><a href='dashboard.php'>Dashboard </a></li>";
			}
		?>
		
	
       <?php
    	   if (!$_SESSION["loggedin"]){
               //if (!isset($_SESSION["userid"])){
       //        echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
	   
				////  ---login form starts here
				//echo "<div>";
				//echo "<table><tr><td>";
				 echo "<form class='form-inline' role='form' action='logincheck.php' method='POST'>";
				 echo  " <div class='form-group'>";
				 echo   "  <label for='email'>Email:</label>";
				 echo     "<input type='email' class='form-control' name='email' placeholder='Enter email'>";
				 echo   "</div>";
				 echo   "<div class='form-group'>";
				 echo     "<label for='pwd'>Password:</label>";
				 echo     "<input type='password' class='form-control' name='pwd' placeholder='Enter password'>";
				 echo   "</div>";
				// echo   "<div class='checkbox'>";
				// echo     "<label><input type='checkbox'> Remember me</label>";
				//echo    "</div>";
				echo    "<button type='submit' class='btn btn-default'>Submit</button>";
				echo  "</form>";
				//echo "</td></tr></table>";
				//echo "</div>";
				////  /// End login form section			   
	
    		    }
    		else {
    	    	echo "<li><a href='logout.php'>". "Logged in as:". $_SESSION["userid"]. " <span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
	    	}
		?>
	</ul>
    </div>
  </div>
</nav>
  
<?php
echo "Captured fields are: ". "<br>";
echo $_POST["fullname"]. "<br>";
echo $_POST["email"]. "<br>";


mail(
     'majestytv@gmail.com',
     'Works!',
     'An email has been generated from your localhost, congratulations!');
	 
	 ?>
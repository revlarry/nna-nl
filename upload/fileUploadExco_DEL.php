<?php session_start(); ?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php include_once("analyticstracking.php"); ?>


<!--form action="audioUpload.php" method="GET" enctype="multipart/form-data"-->
<form action="fileUploadProcess.php" method="post" target="box" enctype="multipart/form-data">
    <table><tr><td>
	Select file to upload:
	<br><input type="file" name="fileToUpload" id="fileToUpload"><br>
		<input type="hidden" name="uploadType" value="exco">
	</td></tr>
	
	<tr><td>
		Name of exec.:
		<input type="text" name="excoName"  size="30" placeholder="Name of executive" required><br>
		Title/post:
		<input type="text" name="office" size="30"  placeholder="Title/post"  required><br>
		Start tenure (Year):
		<input type="number" name="start_tenure" size="4" value="<?php echo $_SESSION['start_tenure'];?>" required><br>
		<input type="submit" value="Submit data" name="submit">
   	</td></tr>
	</table>
</form>

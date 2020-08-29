<?php include_once("analyticstracking.php") ?>
<?php include("header.php") ?>


<html>
<body>

<form action="uploadtest.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php include("footer.php") ?>
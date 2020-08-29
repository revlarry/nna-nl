<?php include_once("analyticstracking.php") ?>
<?php include("header.php") ?>

<div class="container">
  <h2>Past Programmes</h2>
  <div class="well well-sm">Search past programmes
		<form role="form" action="display-selection.php" method="GET">
			<div class="form-group">		
			<input type="text" class="form-control" name="searchterms" placeholder="Enter search terms" >
			</div> 
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

    </div>
    <!-- /.container -->
	
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include("footer.php") ?>
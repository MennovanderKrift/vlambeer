<?php
 	include '../includes/header.php';
	include '../includes/profile.php';
?>
	<div class="index-header">
		<img class="displayed" src="../assets/img/logo.png" alt="">
		<p class="sloganscript" id="slogan"></p>
	</div>
<?php
	include '../includes/menu.php';
?>

<div class="container">
	<div class="index-slogan">
		<p>"Also, I freaking love Vlambeer" - Markus `Notch` Persson</p>
	</div>

	<div class="index-games">
		<h2><center>New product</center></h2>

		<form class="form-horizontal" role="form">
		  <div class="form-group">

		   <label for="name" class="col-sm-4 control-label">Name:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" placeholder="Product name" name="name" id="name">
		    </div>

		    <label for="price" class="col-sm-4 control-label">Price:</label>
			<div class="col-md-2">
				<input type="number" class="form-control" placeholder="$9.99" name="price" id="price">
		    </div>

		 	<label for="description" class="col-md-2 control-label">Description:</label>
		    <div class="col-md-10">
		    	<textarea class="form-control" rows="3" placeholder="Product description" name="description" id="description"></textarea>
		    </div>

		  </div>
		</form>


	</div>
</div>
<?php
	include '../includes/footer.php';
?>
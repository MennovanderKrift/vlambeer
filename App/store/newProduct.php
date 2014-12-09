<?php
 	require '../includes/header.php';
	require '../includes/profile.php';
?>
	<div class="index-header">
		<img class="displayed" src="../assets/img/logo.png" alt="logo.png">
		<p class="sloganscript" id="slogan"></p>
	</div>
<?php

if(!isset($_POST['new-product'])){
?>

<div class="container">
	<div class="index-slogan">
		<p>"Also, I freaking love Vlambeer" - Markus `Notch` Person</p>
	</div>

	<div class="index-games">
		<h2><center>New product</center></h2>
		<form class="form-horizontal" role="form" action="newProduct.php" method="POST">
		  <div class="form-group">

		  <span class="col-sm2 col-md-2"></span>
			<p class="col-sm-10 col-md-10" style="color:red"><b><?php if(!empty($_GET['msg'])){
			echo "- " .$_GET['msg'];
			}?></b></p>

		   	<label for="name" class="col-sm-2 col-md-2 control-label">Name:</label>
			<div class="col-sm-10 col-md-10">
				<input type="text" class="form-control" placeholder="Product name" name="name" id="name">
		    </div>

		    <label for="description" class="col-sm-2 col-md-2 control-label">Description:</label>
		    <div class="col-sm-10 col-md-10">
		    	<textarea class="form-control" rows="3" placeholder="Product description" name="description" id="description"></textarea>
		    </div>

		    <label for="price" class="col-sm-2 col-md-2 control-label">Price:</label>
			<div class="col-sm-10 col-md-10">
				<input type="number" step="0.01" class="form-control" placeholder="$9.99" name="price" id="price" min="0.00" max="9999.99">
		    </div>

		    <label for="stock" class="col-sm-2 col-md-2 control-label">Stock:</label>
			<div class="col-sm-10 col-md-10">
				<input type="number" class="form-control" placeholder="0-9999" name="stock" id="stock" min="0" max="9999">
		    </div>

		 	<label for="tags" class="col-sm-2 col-md-2 control-label">Tags:</label>
		    <div class="col-sm-10 col-md-10">
		    	<textarea class="form-control" rows="3" placeholder="ex. Shoot, RPG, Bazooka, Mario, plumber" name="tags" id="tags"></textarea>
		    </div>

		 	<label for="category" class="col-sm-2 col-md-2 control-label">Category:</label>
		    <div class="col-sm-10 col-md-10">
		    	<select class="form-control" name="category" id="category">
		    		<option value="undefined">Undefined</option>
			    	<option value="shooter">Shooter</option>
			    	<option value="rpg">RPG</option>
		    	</select>
		    </div>

		    <span class="col-md-12" align="center">
				<button type="submit" class="btn btn-primary" name="new-product" align="center">Add product</button>
				<a type="button" href="index.php" class="btn btn-danger">Cancel</a>
			</span>
		  </div>
		</form>

	</div>
</div>
<?php
}else{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$tags = $_POST['tags'];
	$category = $_POST['category'];


        $stmt = $db->prepare("INSERT INTO tbl_products (name, description, price, stock, tags, category) VALUES (:name, :description, :price, :stock, :tags, :category)");

        $stmt->bindParam("name", $_POST['name'], PDO::PARAM_STR);

        $stmt->bindParam("description", $_POST['description'], PDO::PARAM_STR);
        $stmt->bindParam("price", $_POST['price'], PDO::PARAM_STR);
        $stmt->bindParam("stock", $_POST['stock'], PDO::PARAM_STR);
        $stmt->bindParam("tags", $_POST['tags'], PDO::PARAM_STR);
        $stmt->bindParam("category", $_POST['category'], PDO::PARAM_STR);

		if( empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['stock']) || empty($_POST['tags']) || empty($_POST['category']) ){
			$msg = urlencode("All fields are required");
			header("location: newProduct.php?msg=$msg");
		} else {
			if (! $stmt->execute()) {
	        $msg = urlencode("Cannot add new product");
	        header('location: ../newProduct.php?msg=' .$msg);
	    } else {
	        $msg = urlencode("New product added");
	        header('location: ../store/newProduct.php?msg=' .$msg);
    }

		}
        
        

	?>

<div class="container">
	<div class="index-slogan">
		<p>"Also, I freaking love Vlambeer" - Markus `Notch` Persson</p>
	</div>

	<div class="index-games">
		<h2><center>New product has been added</center></h2>
		<div class="col-sm-12 col-md-12">
			<p>Name: <?php echo $_POST['name']; ?></p>
			<p>Description: <?php echo $_POST['description']; ?></p>
			<p>Price: <?php echo $_POST['price']; ?></p>
			<p>Stock: <?php echo $_POST['stock']; ?></p>
			<p>Tags: <?php echo $_POST['tags']; ?></p>
			<p>Category: <?php echo $_POST['category']; ?></p>
		</div>
	</div>
</div>
<?php
}

include '../includes/footer.php';
?>
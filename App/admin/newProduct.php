<?php require '../includes/adminMenu.php';
if ($_SESSION['role'] == 'admin') {
	$sessionId = $_SESSION['id'];
} else {
  	header("location: ../store/index.php");
}

if(!isset($_POST['new-product'])){
?>

<div class="admin-container">
	<div class="index-games">
	<div class="admin-title">New product</div>
		<form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<div style="height: 40px;" class="admin-table-head"></div>

		  <div class="form-group">
			<?php if(!empty($_GET['msg'])){
			echo "<p class='col-sm-10 col-md-10 bg-success'><b>" .$_GET['msg']. "</b></p>";
			}?>

		   	<label for="name" class="col-sm-2 col-md-2 control-label">Name:</label>
			<div class="col-sm-10 col-md-10">
				<input type="text" class="form-control" placeholder="Product name" name="name" id="name">
		    </div>

		    <label for="image" class="col-sm-2 col-md-2 control-label">Image link: </label>
		    <div class="col-sm-10 col-md-10">
		    	<input type="text" class="form-control" placeholder="http://www.vlambeer.com/logo.png" name="image" id="image">
		    </div>

		    <label for="description" class="col-sm-2 col-md-2 control-label">Description:</label>
		    <div class="col-sm-10 col-md-10">
		    	<textarea class="form-control" rows="3" placeholder="Product description" name="description" id="description"></textarea>
		    </div>

		    <label for="price" class="col-sm-2 col-md-2 control-label">Price:</label>
			<div class="col-sm-10 col-md-10">
				<input type="number" step="0.01" class="form-control" placeholder="9.99" name="price" id="price" min="0.00" max="9999.99">
		    </div>

		    <label for="size" class="col-sm-2 col-md-2 control-label">Size:</label>
			<div class="col-sm-10 col-md-10">
				<select type="text" class="form-control" name="size" id="size" max-length="10">
					<option value="">n/a</option>
					<option value="S">S</option>
					<option value="L">L</option>
					<option value="XL">XL</option>
					<option value="XXL">XXL</option>
				</select>
		    </div>

		    <label for="stock" class="col-sm-2 col-md-2 control-label">Stock:</label>
			<div class="col-sm-10 col-md-10">
				<input type="number" class="form-control" placeholder="0-9999" name="stock" id="stock" min="0" max="9999">
		    </div>

		 	<label for="tags" class="col-sm-2 col-md-2 control-label">Tags:</label>
		    <div class="col-sm-10 col-md-10">
		    	<textarea class="form-control" rows="3" placeholder="ex. Mario, Luigi, Yoshi, Peach, Toad, Bowser, Koopa, Kart, etc." name="tags" id="tags"></textarea>
		    </div>

		 	<label for="category" class="col-sm-2 col-md-2 control-label">Category:</label>
		    <div class="col-sm-10 col-md-10">
		    	<select class="form-control" name="category" id="category">
		    		<option value="Clothes">Clothes</option>
			    	<option value="Bundles">Bundles</option>
			    	<option value="Music">Music</option>
		    	</select>
		    </div>

		    <span class="col-md-12">
		    	&nbsp;
		    </span>

		    <span class="col-md-12" align="right">
				<button type="submit" class="btn btn-success" name="new-product">Add</button>
				<a type="button" href="index.php" class="btn btn-danger">Cancel</a>
			</span>
		  </div>
		</form>
	</div>
</div>
<?php

} else {

        $stmt = $db->prepare("INSERT INTO tbl_products (name, image, description, price, size, stock, category) VALUES (:name, :image, :description, :price, :size, :stock, :category)");
        $stmt->bindParam("name", $_POST['name'], 				PDO::PARAM_STR);
        $stmt->bindParam("image", $_POST['image'], 				PDO::PARAM_STR);
        $stmt->bindParam("description", $_POST['description'], 	PDO::PARAM_STR);
        $stmt->bindParam("price", $_POST['price'], 				PDO::PARAM_STR);
        $stmt->bindParam("size", $_POST['size'], 				PDO::PARAM_STR);
        $stmt->bindParam("stock", $_POST['stock'], 				PDO::PARAM_STR);
        $stmt->bindParam("category", $_POST['category'], 		PDO::PARAM_STR);

		if( empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['stock']) || empty($_POST['category'] || empty($_POST['image'])) ){
			$msg = urlencode("All fields are required");
			header('location: newProduct.php?msg=' .$msg);
		} else {

			if (! $stmt->execute()) {
	        $msg = urlencode("Cannot add new product");
	        header('location: ../newProduct.php?msg=' .$msg);

		    } else {
		        $msg = urlencode("New product added");
		        header('location: ../store/newProduct.php?msg=' .$msg. '&new-product=true');
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
?>
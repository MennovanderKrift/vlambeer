<?php
	require '../includes/header.php';

	if(!is_numeric($_GET['product_id'])){
		// if product_id is not a number, redirect back to index.php
		header('location: index.php');
	}else{
		$productId = $_GET['product_id'];
	}

	$countRows = $db-> prepare ("SELECT count(*) FROM tbl_products WHERE product_id=:product_id");
	$countRows->bindParam(':product_id', $productId, PDO::PARAM_STR);
	$countRows->execute();
	$result = $countRows->fetchColumn();

	if(!$result == 1){
		// if no product is found, redirect to index.php
		echo header("location: index.php");
	}

	$query = $db->prepare("SELECT * FROM tbl_products WHERE product_id= :productID");
	$query -> bindParam(":productID", $_GET['product_id'], PDO::PARAM_STR);

	$query->execute();

	foreach($query as $row){
		if($row['category'] == 'Music'){
		header("location: vlambeerMusic.php?product_id=" .$_GET['product_id']);
	}
?>

<div class="container merchandise">
	<div class="col-md-9 shirt-img"><img src="<?php if(empty($row['image'])){echo "../assets/img/no-product-image.jpg";}else{echo $row['image']; } ?>" alt="<?php // echo $row['thumbnail']; ?>"></div>
	<div class="col-md-3 shirt-info">
		<p><?php echo $row['description']; ?></p>
		<hr>
		<span class="merchandise-price">Price
		<p class="amount">€<?php echo $row['item_price']; ?></p></span>
	</div>
	<div class="col-md-3 shirt-maat">
		<?php if($row['category'] == 'Clothes'):
			?>
			<div class="select-size">
			<label for="selectMaat">Size</label>
			<select id="selectMaat" name="selectMaat">
	  			<option>XS</option>
	  			<option>S</option>
	  			<option>M</option>
	  			<option>L</option>
	  			<option>XL</option>
	  			<option>XXL</option>
			</select>			
		</div>
		
		<div class="select-geslacht">
			<label for="Geslacht">Gender</label>
			<select name="Geslacht">
				<option>Men</option>
	  			<option>Women</option>
			</select>		
		</div>

		<?php endif; ?>

		<div class="insert-cart-btn">
			<a href="addproduct.php"><img class="cart-btn" src="../assets/img/Bestelknop.gif"></a>
		</div>
	</div>

	<div class="clear"></div>
	
	<div class="related">
		<h1 class="related-products">Related products</h1>
		<div class="related-products-wrapper">
		<?php
		
		// Info current t-shirt. Normally from database
		$description = $row['description'];
		$description1 = explode(" ", $description);
		$searchQuery = array();

		foreach($description1 as $word) {
			if(empty($searchQuery)) {
				array_push($searchQuery, " description LIKE '%" . $word . "%'");
			} else {
				array_push($searchQuery, " OR description LIKE '%" . $word . "%'");
			}
		}

		$searchQuery = implode($searchQuery);
		$sql = "SELECT * FROM tbl_products WHERE" . $searchQuery . "LIMIT 4";

		// Query which searches for related items
		$query = $db->prepare($sql);

		if($query -> execute()){
			while($related = $query->fetch(PDO::FETCH_OBJ)) 
			{
				echo "<div class='related-product'><a href='merchandise.php?product_id=" .$related->product_id. "'><img src=" .$related->image. "></a></div>";
			}
		}
		?>
		</div>
	</div>
</div>
<?php
//endforeach product from database;
};

require '../includes/footer.php'; ?>
<!-- 		

<a href="addproduct.php?id=<?php echo $_GET['id'] ?>">In winkelwagen</a> -->
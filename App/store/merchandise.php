<?php
	require '../includes/header.php';

	if(!isset($_GET['product_id'])){
		header("location: index.php");
	}

	$query = $db->prepare("SELECT * FROM tbl_products WHERE product_id= :productID");
	$query -> bindParam(":productID", $_GET['product_id'], PDO::PARAM_STR);

	$query->execute();
?>

<style>
.related-product {
	margin-right: 13px;
	width: 150px;
	height: 150px;
	border: 1px solid #63676a;
	display: inline;
	background-color: #63676a;
	float: left;

	position: relative;
	top: 0;
}

.related-product p {
	font-family:'Arimo', sans-serif;
	color: white;
	font-size: 14px;
	line-height: 1.42857143;
}

.related-product img{
	width: 100%;
}

.related-product img:hover{
	opacity: 0.7;
}

.related-products {
	color: #6d6a61;
	font-size:20px;
	margin-left: 14px;
	padding-top: 20px;
	font-family:'Arimo', sans-serif;
}

.shirt-info{
	padding-top: 20px;
}

.merhcandise-price{
	font-size: 20px;
	text-align: left;
}

.amount{
	font-size: 24px;
	text-align: center;
}

.related-products-wrapper {
	margin-left:16px;
}

</style>
<?php 
	foreach($query as $row)
		if($row['category'] == 'Music'){
		header("location: vlambeerMusic.php?product_id=" .$_GET['product_id']);
		}
	{ 
?>

<div class="container merchandise">
	<div class="col-md-9 shirt-img"><img src="<?php if(empty($row['image'])){echo "../assets/img/no-product-image.jpg";}else{echo $row['image']; } ?>" alt="<?php // echo $row['thumbnail']; ?>"></div>
	<div class="col-md-3 shirt-info">
		<p><?php echo $row['description']; ?></p>
		<hr>
		<span class="merchandise-price">Price
		<p class="amount">€<?php echo $row['item_price'] ?></p></span>
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
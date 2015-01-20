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

	$music = $db->prepare("SELECT * FROM tbl_products WHERE product_id= :productID");
	$music -> bindParam(":productID", $productId, PDO::PARAM_STR);

	$music->execute();

		foreach($music as $album)
			if($album['category'] !== 'Music'){
				header("location: merchandise.php?product_id=" .$productId);
			}
	{ 
?>
<style>
.album-amount{
	font-weight: bold;
	font-style: italic;
	text-align: center !important;
	color: #63676a !important;
	padding-top: 0 !important;
}
</style>

<div class="container">
	<div class="music-photos-wrapper">
		<img class="music-photos" src="<?= $album['image'];?>" alt="Primary album image">

		<img class="music-photos" src="<?php if(empty($album['image2'])){ echo $album['image'];}else{ echo $album['image2'];}?>" alt="Secondary album image">
	</div>

	<div class="bestel">
	<div class="product-info"><p><a href="addproduct.php?id=<?php echo $album['product_id']; ?>">Bestel</a></p></div>
	<div class="arrow-down"></div>
	</div>


	<div class="musicInfo">
		<div class="musicInfo-header"><h2 class="musicInfo-title"><?= $album['name']; ?></h2></div>
		<p><?= $album['description'];?></p>
		<div class="musicInfo-footer"><p class="album-amount">Price: €<?php echo $album['item_price'] ?></p></div>
	</div>
</div>

<?php 
}
require '../includes/footer.php' ?>
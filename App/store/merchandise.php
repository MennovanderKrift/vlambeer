<?php require '../includes/header.php'; ?>

<style>

.related-product:first-child {
	background: black;
}
.related-product {
	margin-right: 13px;
	width: 150px;
	height: 150px;
	border: 1px solid #63676a;
	float: left;
	background-color: #63676a;
}

.related-product:nth-child(2) {
	margin-left:16px;
}

.related-product p {
	font-family:'Arimo', sans-serif;
	color: white;
	font-size: 14px;
	line-height: 1.42857143;
}

.related-products {
	color:#6d6a61;
	font-size:20px;
	margin-left:16px;
	padding-top:20px;
	font-family:'Arimo', sans-serif;
}


</style>
<div class="container merchandise">
	<div class="col-md-9 shirt-img"><img src="../assets/img/TShirt-Vlambeer.png" alt=""></div>
	<div class="col-md-3 shirt-info">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
		<hr>
		<p><h3>prijzen</h3><br>mannen: 19.95 <br>vrouwen: 17.95</p>
	</div>
	<div class="col-md-3 shirt-maat">
		<div class="select-size">
			<p>selecteer uw maat</p>
			<label for="selectMaat"></label>
			<select name="selectMaat">
	  			<option>s</option>
	  			<option>m</option>
	  			<option>l</option>
			</select>			
		</div>
		
		<div class="select-geslacht">
			<p>Man/vrouw</p>
			<label for="Geslacht"></label>
			<select name="Geslacht">
				<option>Man</option>
	  			<option>Vrouw</option>
			</select>		
		</div>

		<form name="_xclick" target="paypal" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="business" value="info@vlambeer.com">
			<input type="hidden" name="currency_code" value="EUR">
			<input type="hidden" name="item_name" value="<?= $name; ?>">
			<input type="hidden" name="amount" value="<?= $item_price; ?>">
			<input type="hidden" name="quantity" value="<?= $quantity; ?>">
			<input type="hidden" name="tax" value="<?= $item_price * $quantity * 0.21; ?>">
			<input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_xpressCheckout.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
			<input type="hidden" name="add" value="1">
		</form>
	</div>
	
	<div class="related">
		<p class="related-products">Related products</p>
		<?php
		
		// Info current t-shirt. Normally from database
		$description = "Stylish LUFTRAUSERS T-shirt designed by Amon26";
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

		$sql = "SELECT * FROM tbl_products WHERE" . $searchQuery . " LIMIT 4";

		// Query which searches for related items
		$query = $db->prepare($sql);

		if($query -> execute()){
			while($related = $query->fetch(PDO::FETCH_OBJ)) {
				echo "<div class='related-product'><p>" . $related->description . "</p></div>";

			}
		}


		?>
	</div>
</div>
<?php require '../includes/footer.php'; ?>
<!-- 		

		<div class="insert-cart">
			<!-- <a href="addproduct.php?id=<?php echo $_GET['id'] ?>" class="btn">In winkelwagen</a> -->


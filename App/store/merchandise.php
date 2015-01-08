<?php require '../includes/header.php'; ?>
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
		

		<div class="insert-cart">
			<a href="addproduct.php?id=<?php echo $_GET['id'] ?>" class="btn">In winkelwagen</a>
		</div>
	</div>
	
	<div class="related">
		<p style="color:black;">Related products</p>
		<?php
		// Info current t-shirt. Normally from database
		$name = "T-shirt";
		$description = "Stylish LUFTRAUSERS T-shirt designed by Amon26.";
		$relatedSearch = $name . " " . $description;
		echo $relatedSearch;

		// Query which searches for related items
		$query = $db->prepare("SELECT * FROM tbl_products WHERE description LIKE '% :relatedSearch %' OR name LIKE '% :relatedSearch %' LIMIT 5");
		$query -> bindParam("relatedSearch", $relatedSearch, PDO::PARAM_STR);
		if($query -> execute()){
			while($related = $query->fetch(PDO::FETCH_OBJ)) {
				echo "<p style='color:black;'>" . $related->description . "</p></br>";

			}
		}


		?>
	</div>
</div>
<?php require '../includes/footer.php'; ?>
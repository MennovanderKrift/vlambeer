<?php 
require '../includes/header.php';
?>

<div class="index-slider">
	<img src="../assets/img/slider1.png" alt="">
</div>

<div class="index-slogan">
	<p>"Also, I freaking love Vlambeer" - Markus `Notch` Persson</p>
</div>
<div class="backgroundcolor1-index">
	<div class="container">
		<div class="index-items col-md-12">
			<h2>Games</h2>
			<div class="col-md-3">
				<a href="serious-sam.php"><div class="product-img"><img src="../assets/img/serious-sam.jpg" alt=""></div></a>	
				<div class="product-info"><p>Serious Sam: <br>The Random Encounter <br>(PC, Steam)</p></div>
				<div class="arrow-down"></div>
			</div>
			<div class="col-md-3">
				<a href="SuperCrateBox.php"><div class="product-img"><img src="../assets/img/supercratebox.png" alt=""></div></a>
				<div class="product-info"><p>Super Crate Box <br> (PC, Mac)</p></div>
				<div class="arrow-down"></div>
			</div>

			<div class="col-md-3">
				<div class="product-img"><img src="../assets/img/supercratebox.png" alt=""></div>	
				<div class="product-info"><p>Super Crate Box <br> (iOS)</p></div>
				<div class="arrow-down"></div>
			</div>

			<div class="col-md-3">
				<div class="product-img"><img src="../assets/img/supercratebox.png" alt=""></div>	
				<div class="product-info"><p>Super Crate Box <br> (Vita)</p></div>
				<div class="arrow-down"></div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="index-items col-md-12">
		<h2>Bundles</h2>
		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/puppy.png" alt=""></div>	
			<div class="product-info"><p>Vlambeer’s <br> Crate Box Bundle</p></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/puppy.png" alt=""></div>	
			<div class="product-info"><p>Luftrausers <br> Limited Edition</p></div>
			<div class="arrow-down"></div>
		</div>
	</div>
</div>
<div class="backgroundcolor1-index">
	<div class="container">
		<div class="index-items col-md-12">
		<h2>Clothes</h2>

		<?php 
			$clothes = $db->query ("SELECT * FROM tbl_products WHERE category='Clothes' LIMIT 4");
			$clothes ->execute();
			while($singleClothe = $clothes->fetch(PDO::FETCH_OBJ)):
		?>
			<div class="col-md-3">
				<a href="merchandise.php?product_id=<?= $singleClothe->product_id ?>"><div class="product-img"><img src="<?= $singleClothe->image; ?>" alt=""></div></a>	
				<div class="product-info"><a href="merchandise.php?product_id=<?= $singleClothe->product_id; ?>"<p><?= $singleClothe->name; ?><br> <?= $singleClothe->category; ?></p></a></div>
				<div class="arrow-down"></div>
			</div>

		<?php endwhile; ?>

		</div>
	</div>
</div>
<div class="container">
	<div class="index-items col-md-12">
		<h2>Miscellaneous</h2>
		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/puppy.png" alt=""></div>
			<div class="product-info"><p>Vlambeer <br> Enemies Poster</p></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/puppy.png" alt=""></div>	
			<div class="product-info"><p>Super Crate Box <br> Plushie</p></div>
			<div class="arrow-down"></div>
		</div>
	</div>
</div>
<div class="backgroundcolor1-index">
	<div class="container">
		<div class="index-items col-md-12">
			<h2>Music</h2>

			<?php 
				$music = $db->query ("SELECT * FROM tbl_products WHERE category='Music' LIMIT 4");
				$music ->execute();
				while($musicItem = $music->fetch(PDO::FETCH_OBJ)):
			?>

			<div class="col-md-3">
				<a href="merchandise.php?product_id=<?= $musicItem->product_id; ?>">
					<div class="product-img"><img src="<?= $musicItem->image; ?>" alt=""></div>
				</a>
				<div class="product-info"><a href="merchandise.php?product_id=<?= $musicItem->product_id; ?>"><p><?= $musicItem->name; ?></p></a></div>
				<div class="arrow-down"></div>
			</div>

			<?php endwhile;?>

		</div>
	</div>
</div>
<div class="container">
	<div class="index-items col-md-12">
		<h2>Non-Vlambeer games</h2>
		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/radicalfishing.png" alt=""></div>	
			<div class="product-info"><p>Radical Fishing <br> via bored.com</p></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/puppy.png" alt=""></div>	
			<div class="product-info"><p>Dinosaur Zookeeper <br> via Adult Swim</p></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/karate.png" alt=""></div>	
			<div class="product-info"><p>Karate <br> (PC) <br> via Not Vlambeer</p></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><img src="../assets/img/puppy.png" alt=""></div>	
			<div class="product-info"><p>Super Puppy Boy <br> (PC) <br> via Not Vlambeer</p></div>
			<div class="arrow-down"></div>
		</div>
	</div>
</div>	
<?php
	require '../includes/footer.php';
?>
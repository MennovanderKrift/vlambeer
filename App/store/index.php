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
				<a href="serious-sam.php"><div class="product-img"><img src="../assets/img/serious-sam.jpg" alt="serious-sam.jpg"></div></a>	
				<div class="product-info"><a href="serious-sam.php"><p>Serious Sam: The Random Encounter (PC, Steam)</p></a></div>
				<div class="arrow-down"></div>
			</div>
			<div class="col-md-3">
				<a href="SuperCrateBox.php"><div class="product-img"><img src="../assets/img/supercratebox.png" alt="supercratebox.png"></div></a>
				<div class="product-info"><a href="SuperCrateBox.php"><p>Super Crate Box <br> (PC, Mac)</p></a></div>
				<div class="arrow-down"></div>
			</div>

			<div class="col-md-3">
				<div class="product-img"><img src="../assets/img/supercratebox.png" alt="supercratebox.png"></div>	
				<div class="product-info"><a href="#"><p>Super Crate Box <br> (iOS)</p></a></div>
				<div class="arrow-down"></div>
			</div>

			<div class="col-md-3">
				<div class="product-img"><img src="../assets/img/supercratebox.png" alt="supercratebox.png"></div>	
				<div class="product-info"><a href="#"><p>Super Crate Box <br> (Vita)</p></a></div>
				<div class="arrow-down"></div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="index-items col-md-12">
		<h2>Bundles</h2>

		<?php 
			$bundles = $db->query ("SELECT * FROM tbl_products WHERE category='Bundles' ORDER BY product_id DESC LIMIT 4");
			$bundles ->execute();
			while($singleBundle = $bundles->fetch(PDO::FETCH_OBJ)):
		?>

		<div class="col-md-3">
			<div class="product-img"><a href="merchandise.php?product_id=<?= $singleBundle->product_id; ?>"><img src="<?= $singleBundle->image; ?>" alt="Bundle image"></a></div>	
			<div class="product-info"><a href="merchandise.php?product_id=<?= $singleBundle->product_id; ?>"><p><?= $singleBundle->name; ?></p></a></div>
			<div class="arrow-down"></div>
		</div>

		<?php endwhile; //end bundles ?>

	</div>
</div>
<div class="backgroundcolor1-index">
	<div class="container">
		<div class="index-items col-md-12">
		<h2>Clothes</h2>

		<?php 
			$clothes = $db->query ("SELECT * FROM tbl_products WHERE category='Clothes' ORDER BY product_id DESC LIMIT 4");
			$clothes ->execute();
			while($singleClothe = $clothes->fetch(PDO::FETCH_OBJ)):
		?>
			<div class="col-md-3">
				<a href="merchandise.php?product_id=<?= $singleClothe->product_id ?>"><div class="product-img"><img src="<?= $singleClothe->image; ?>" alt=""></div></a>	
				<div class="product-info"><a href="merchandise.php?product_id=<?= $singleClothe->product_id; ?>"<p><?= $singleClothe->name; ?><br> <?= $singleClothe->category; ?></p></a></div>
				<div class="arrow-down"></div>
			</div>

		<?php endwhile; //end clothes ?>

		</div>
	</div>
</div>
<div class="container">
	<div class="index-items col-md-12">
		<h2>Miscellaneous</h2>
		<div class="col-md-3">
			<div class="product-img"><a href="#"><img src="../assets/img/vlambeer-enemies-poster.png" alt="Vlambeer enemies poster"></a></div>
			<div class="product-info"><a href="#"><p>Vlambeer <br> Enemies Poster</p></a></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><a href="#"><img src="../assets/img/super-crate-box-pluche.jpg" alt="Super crate box pluche"></a></div>	
			<div class="product-info"><a href="#"><p>Super Crate Box <br> Plushie</p></a></div>
			<div class="arrow-down"></div>
		</div>
	</div>
</div>
<div class="backgroundcolor1-index">
	<div class="container">
		<div class="index-items col-md-12">
			<h2>Music</h2>

			<?php 
				$music = $db->query ("SELECT * FROM tbl_products WHERE category='Music' ORDER BY product_id DESC LIMIT 4");
				$music ->execute();
				while($musicItem = $music->fetch(PDO::FETCH_OBJ)):
			?>

			<div class="col-md-3">
				<a href="merchandise.php?product_id=<?= $musicItem->product_id; ?>">
					<div class="product-img"><img src="<?= $musicItem->image; ?>" alt="Music product image"></div>
				</a>
				<div class="product-info"><a href="merchandise.php?product_id=<?= $musicItem->product_id; ?>"><p><?= $musicItem->name; ?></p></a></div>
				<div class="arrow-down"></div>
			</div>

			<?php endwhile; //end music ?>

		</div>
	</div>
</div>
<div class="container">
	<div class="index-items col-md-12">
		<h2>Non-Vlambeer games</h2>
		<div class="col-md-3">
			<div class="product-img"><a href="http://www.bored.com/games/radical-fishing" target="_blank"><img src="../assets/img/radicalfishing.png" alt="radicalfishing.png"></a></div>	
			<div class="product-info"><a href="http://www.bored.com/games/radical-fishing" target="_blank"><p>Radical Fishing <br> via bored.com</p></a></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><a href="http://games.adultswim.com/dinosaur-zookeeper-simulation-online-game.html" target="_blank"><img src="../assets/img/puppy.png" alt="puppy.png"></a></div>	
			<div class="product-info"><a href="http://games.adultswim.com/dinosaur-zookeeper-simulation-online-game.html" target="_blank"><p>Dinosaur Zookeeper <br> via Adult Swim</p></a></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><a href="http://www.vlambeer.com/downloads/misc/karatesim" target="_blank"><img src="../assets/img/karate.png" alt="karate.png"></a></div>	
			<div class="product-info"><a href="http://www.vlambeer.com/downloads/misc/karatesim" target="_blank"><p>Karate <br> via Not Vlambeer</p></a></div>
			<div class="arrow-down"></div>
		</div>

		<div class="col-md-3">
			<div class="product-img"><a href="http://www.vlambeer.com/downloads/misc/superpuppyboy" target="_blank"><img src="../assets/img/puppy.png" alt="puppy.png"></a></div>	
			<div class="product-info"><a href="http://www.vlambeer.com/downloads/misc/superpuppyboy" target="_blank"><p>Super Puppy Boy <br> via Not Vlambeer</p></a></div>
			<div class="arrow-down"></div>
		</div>
	</div>
</div>	
<?php
	require '../includes/footer.php';
?>
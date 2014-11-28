<?php
  include '../includes/header.php';
?>
	<header>
		<div class="header-top">
			<a href="../store/index.php"><button>click to store</button></a> 

			<!-- <form method="POST" action=""> -->
				<input type="search">
				<input type="submit" value="Zoeken">
			</form>

		</div>
		<div class="header-calltoaction">
			<div class="logo-slogan">
				<img src="../assets/img/vlambeer-logo.png">
				<h1 class="header-title">Vlambeer</h1>
				<p id="slogan" class="slogantext"></p>
			</div>
		</div>
		<div class="header-menu">
			<div class="navibar">
				<ul class="navi navibar-nav">
					<li class="active"><a href="">Home</a></li>
					<li><a href="">menu2</a></li>
					<li><a href="">menu3</a></li>
					<li><a href="">menu4</a></li>
					<li><a href="../store/store-product.php">regilio</a></li>
				</ul>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="newsitem">

			</div>
			<div class="slider">
				<h1>slider | gameinfo (linksonder)</h1>
			</div>
			<div class="info">
				<h1>info bedrijf</h1>
			</div>
			
		</div>
	</section>
	<footer>
		<div class="footer">
			Vlambeer is a Dutch independent Game Studio | twitter | info / Friends of Vlambeer
		</div>
	</footer>
<?php
	require '../includes/footer.php';
?>
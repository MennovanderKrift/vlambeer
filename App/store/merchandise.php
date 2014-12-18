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
		<p><a href="addproduct.php?id=<?php echo $_GET['id'] ?>" class="btn">In winkelwagen</a></p>
	</div>
</div>
<?php require '../includes/footer.php'; ?>
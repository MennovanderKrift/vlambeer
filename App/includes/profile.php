<?php
	if (isset($_SESSION['email_address'])) {
?>
	<div class='profile-wrapper'>
		<div class='header-profile'>
			<p><?php echo $_SESSION['username']; ?></p>
<?php
		if ($_SESSION['gender'] == 'male') {
			echo "<img src='../assets/img/profile-male.png'>";
		} elseif ($_SESSION['gender'] == 'female') {
			echo "<img src='../assets/img/profile-female.png'>";
		}
?>
	</div>
	
	<div class='header-profile-menu'>
		<div class='header-profile-menu-top'>
			<div class='arrow-up'></div>
		</div>
		<div class='header-profile-menu-content'>
			<a href='index.php'>
				<div class='header-profile-menu-item'>
					<img src='../assets/img/shopping_trolley.png'>
					Store
				</div>
			</a>
<?php
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	}
?>
			<a href="profile-info.php?id=<?php echo $id;?>">
				<div class='header-profile-menu-item'>
					<img src='../assets/img/settings.png'>
					Settings
				</div>
			</a>
			<a href="invoiceOverview.php?customer_id=<?php echo $_SESSION['id']; ?>">
				<div class='header-profile-menu-item'>
					<img src='../assets/img/invoices.png'>
					Invoices
				</div>
			</a>
			<a href='../controllers/authController.php?logout'>
				<div class='header-profile-menu-item'>
					<img src='../assets/img/logout.png'>
					Logout
				</div>
			</a>
		</div>
	</div>
<?php
	} else {
?>
		<div class='header-profile-bar'>
	 		<a href='login.php'><button class='login-index-button'>Log in</button></a>
	 	</div>
<?php
	}
?>
</div>
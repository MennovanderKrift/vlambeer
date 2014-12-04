<div class="header-top">
<?php

	session_start();

	if (isset($_SESSION['email'])) {
	echo "
		<div class='header-profile-bar'>
			<div class='profile-wrapper'>
				<div class='header-profile'>
					<p>" . $_SESSION['username'] . "</p>";
				if ($_SESSION['gender'] == 'male') {
					echo "<img src='../assets/img/profile-male.png'>";
				} elseif ($_SESSION['gender'] == 'female') {
					echo "<img src='../assets/img/profile-female.png'>";
				}
	echo		"</div>
				<div class='header-profile-menu'>
					<div class='header-profile-menu-top'>
						<div class='arrow-up'>
						</div>
					</div>
					<div class='header-profile-menu-content'>
						<a href='index.php'>
						<div class='header-profile-menu-item'>
							<img src='../assets/img/shopping_trolley.png'>
							Store
						</div>
						</a>
						<a href='profile-info.php'>
						<div class='header-profile-menu-item'>
							<img src='../assets/img/settings.png'>
							Settings
						</div>
						</a>
						<div class='header-profile-menu-item'>
							<img src='../assets/img/invoices.png'>
							Invoices
						</div>
						<a href='../controllers/authController.php?logout'>
						<div class='header-profile-menu-item'>
							<img src='../assets/img/logout.png'>
							Logout
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	";
	} else {
	echo "	<div class='header-profile-bar'>
	 			<a href='login.php'><button class='login-index-button'>Log in</button></a>
	 		</div>

	";
	}
?>
	
</div>
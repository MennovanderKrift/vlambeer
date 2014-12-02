<div class="header-top">
<?php
	session_start();
	if (isset($_GET['username'])) {
		$username = $_GET['username'];
	}
	// <a href='../controllers/authController.php?logout=true'><button>logoutjonge</button></a>
	if (isset($_SESSION['email'])) {
	echo "
		
		<div class='profile-wrapper'>
			<div class='header-profile-bar'>
				<div class='header-profile'>
					<p>" . $_SESSION['username'] . "</p>
					<img src='../assets/img/profile.png'>
					
				</div>
			</div>
			<div class='header-profile-menu'>
			</div>
		</div>
	";
	} else {
	 	echo "<h1><a href='login.php'>login</a></h1>";
	}
?>
	
</div>
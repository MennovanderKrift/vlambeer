<?php
 	include '../includes/header.php';
?>
	<header>
		<div class="header-calltoaction">
			<div class="logo-slogan">
				<img src="../assets/img/vlambeer-logo.png">
				<h1 class="header-title">Vlambeer</h1>
				<p id="slogan" class="slogantext"></p>
			</div>
		</div>
<?php
	include '../includes/menu.php';
?>
	</header>
	<section>
		<div class="container">	
			<div class="login-screen">
				<form class="login-form" action="../controllers/authController.php" method="POST">
					<h1 class="login-title">Inloggen</h1>
<?php 
					if (isset($_GET['msg'])) {
						echo '<li class="login-error-msg"><b>' .  htmlspecialchars($_GET['msg']) . '</b></li>';
					}
?>
					<label for="username">Email</label>
					<input type="email" class="login-input" name="email" id="email" required>
					<label for="username">Password</label>
					<input type="password" class="login-input" name="password" id="password" required>
					<input type="submit" name="loginUser" class="login-submit-button" value="Login">
				</form>
			</div>
		</div>
	</section>
<?php
	require '../includes/footer.php';
?>

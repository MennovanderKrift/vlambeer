<?php
 	require '../includes/header.php';
?>
	<header>
		<div class="header-calltoaction">
			<div class="logo-slogan">
				<img src="../assets/img/vlambeer-logo.png">
				<h1 class="header-title">Vlambeer</h1>
				<p id="slogan" class="slogantext"></p>
			</div>
		</div>
<<<<<<< HEAD

=======
<?php
	require '../includes/menu.php';
?>
>>>>>>> origin/master
	</header>
	<section>
		<div class="container">	
			<div class="login-screen">
				<form class="login-form" action="../controllers/authController.php" method="POST">
					<h1 class="login-title">Log in</h1>
<?php 
					if (isset($_GET['error'])) {
						echo '<li class="login-error-msg"><b>' .  htmlspecialchars($_GET['error']) . '</b></li>';
					}
					if (isset($_GET['msg'])) {
						echo '<li class="login-msg"><b>' .  htmlspecialchars($_GET['msg']) . '</b></li>';
					}
?>
					<label for="email">Email</label>
					<input type="email" class="login-input" name="email_address" id="email_address" required>
					<label for="password">Password</label>
					<input type="password" class="login-input" name="password" id="password" required>
					<input type="submit" name="loginUser" class="login-submit-button" value="Login">
				</form>
					<a href="register.php"><button class="login-submit-button">Register</button></a>
			</div>
		</div>
	</section>
<?php
	require '../includes/footer.php';
?>

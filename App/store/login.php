<?php
 	require '../includes/header.php';
?>
	<section>
		<div class="container">	
			<div class="login-screen">
				<form class="login-form" action="../controllers/authController.php" method="POST">
					<h1 class="login-title">Log in</h1>
<?php 
					if (isset($_GET['error'])) {
						echo '<li class="login-error-msg"><b>' .  htmlspecialchars($_GET['error']) . '</b></li><br><br>';
					}
					if (isset($_GET['msg'])) {
						echo '<li class="login-msg"><b>' .  htmlspecialchars($_GET['msg']) . '</b></li><br><br>';
					}
?>
					<label for="email">Email</label>
					<input type="email" class="login-input" name="email_address" id="email_address" required>
					<label for="password">Password</label>
					<input type="password" class="login-input" name="password" id="password" required>
					<input type="submit" name="loginUser" class="btn btn-warning login-form-button" value="Login">
				</form>
					<a href="register.php"><button class="btn btn-warning">Register</button></a>
			</div>
		</div>
	</section>
<?php
	require '../includes/footer.php';
?>
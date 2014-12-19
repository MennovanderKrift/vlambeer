<?php
  session_start();
  require '../config/Database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vlambeer | Admin</title>
  <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">  
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/js/jquery-1.11.0.min.js"></script>
  <meta charset="UTF-8">
</head>
<body>

<nav>
	<div class="admin-login-screen-top">
		<h1>Login</h1>
	</div>
	<div class="admin-login-screen">
<?php 
		if (isset($_SESSION['wrongCredentials'])) {
			echo '<li class="login-error-msg">' . $_SESSION['wrongCredentials'] . '</li>';
			session_destroy();
		}
		if (isset($_SESSION['noRights'])) {
			echo '<li class="login-error-msg">' . $_SESSION['noRights'] . '</li>';
			session_destroy();
		}
		if (isset($_SESSION['logoutSucces'])) {
			echo '<li class="login-msg">' . $_SESSION['logoutSucces'] . '</li>';
			session_destroy();
		}
?>
		<form class="admin-login-form" action="../controllers/adminController.php" method="POST">
			<label for="text">Username</label><br>
				<input type="text" name="username" id="username"><br>
			<label for="password">password</label><br>
				<input type="password" name="password" id="password">
				<input type="submit" class="btn btn-primary admin-btn-login" value="Login" name="loginAdmin">
		</form>
	</div>
</nav>
  
</body>
</html>
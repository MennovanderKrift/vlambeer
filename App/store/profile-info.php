<?php
 	include '../includes/header.php';

	$stmt = $db->prepare("SELECT * FROM users");
	$stmt->execute();

	include '../includes/head.php';
?>
	<div class="header-calltoaction">
		<div class="logo-slogan">
			<img src="../assets/img/vlambeer-logo.png">
			<h1 class="header-title">Vlambeer</h1>
			<p id="slogan" class="slogantext"></p>
		</div>
	</div>
	<div class="container">
<?php
	if (isset($_GET['error'])) {
		echo '<li class="login-error-msg"><b>' .  htmlspecialchars($_GET['error']) . '</b></li>';
	}
	if (isset($_GET['msg'])) {
		echo '<li class="login-msg"><b>' .  htmlspecialchars($_GET['msg']) . '</b></li>';
	}
?>
		<div class="profile-info">
			<form class="profile-info-form" method="POST" action="../controllers/profileController.php">
				<label for="email">Email</label>
					<input type="email" class="profile-info-input" value="<?php echo $_SESSION['email']; ?>" placeholder="example@hotmail.com">
				<label for="username">Username</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['username']; ?>">
				<label for="username">Password</label>
					<input type="password" class="profile-info-input" placeholder="********">
<?php
			if ($_SESSION['gender'] === 'male') {
			echo 	"<label for='gender'>Gender</label>
						<select>
							<option class='profile-info-input' value='male'>Male</option>
							<option class='profile-info-input' value='female'>Female</option>
						</select>
			";
			} elseif ($_SESSION['gender'] === 'female') {
			echo 	"<label for='gender'>Gender</label>
						<select>
							<option class='profile-info-input' value='Female'>Female</option>
							<option class='profile-info-input' value='Male'>Male</option>
						</select>
			";
			}
?>
				<label for="username">Zip code</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['zip_code']; ?>" placeholder="0000XX">
				<label for="username">Address</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['address']; ?>">
				<input type="submit" value="Edit" name="editProfile">
			</form>
		</div>
	</div>
<?php
	include '../includes/footer.php';
?>
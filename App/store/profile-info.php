<?php
 	include '../includes/header.php';

	$stmt = $db->prepare("SELECT * FROM tbl_users");
	$stmt->execute();

	include '../includes/profile.php';
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

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
?>
		<div class="profile-info">
			<form class="profile-info-form" method="post" action="../controllers/profileController.php?id=<?php echo $id; ?>">
				<label for="email_address">Email</label>
					<input type="email" class="profile-info-input" value="<?php echo $_SESSION['email_address']; ?>" placeholder="example@hotmail.com" name="email_address">
				<label for="username">Username</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['username']; ?>" name="username">
				<label for="password">Password</label>
					<input type="password" class="profile-info-input" value="<?php echo $_SESSION['password']; ?>" name="password">
<?php
			if ($_SESSION['gender'] == 'male') {
			echo 	"<label for='gender'>Gender</label>
						<select name='gender'>
							<option value='male' class='profile-info-input'>Male</option>
							<option value='female' class='profile-info-input'>Female</option>
						</select>
			";
			} elseif ($_SESSION['gender'] == 'female') {
			echo 	"<label for='gender'>Gender</label>
						<select name='gender'>
							<option value='female' class='profile-info-input'>Female</option>
							<option value='male' class='profile-info-input'>Male</option>
						</select>
			";
			} else {
			echo 	"Please select your <label for='gender'>Gender</label>
						<select name='gender'>
							<option value='male' class='profile-info-input'>Male</option>
							<option value='female' class='profile-info-input'>Female</option>
						</select>
			";
			}

?>
				<label for="zipcode">Zip code</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['zip_code']; ?>" placeholder="0000XX" name="zip_code">
				<label for="address">Address</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['address']; ?>" name="address">
				<input type="submit" value="Edit" name="editProfile">
			</form>
		</div>
	</div>
<?php
	include '../includes/footer.php';
?>
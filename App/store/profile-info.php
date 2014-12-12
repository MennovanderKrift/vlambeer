<?php
 	include '../includes/header.php';

 	$urlid = $_GET['id'];
 	$session_id = $_SESSION['id'];

	if ($session_id == $urlid) {
	} else {
		header("location: profile-info.php?id=$session_id");
	}

	$stmt = $db->prepare("SELECT * FROM tbl_customers WHERE customer_id = :customer_id");
	$stmt->bindParam("customer_id", $_SESSION['id'], PDO::PARAM_STR);
	$stmt->execute();

?>
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
					<input type="password" class="profile-info-input" placeholder="*******" name="password">
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
				<label for="name">First name</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['name']; ?>" name="name">
				<label for="last_name">Last name</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['last_name']; ?>" name="last_name">
				<label for="phone_number">Phone number</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['phone_number']; ?>" placeholder="06 0000000" name="phone_number">
				<label for="address">Address</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['address']; ?>" name="address">
				<label for="zipcode">Zip code</label>
					<input type="text" class="profile-info-input" value="<?php echo $_SESSION['zipcode']; ?>" placeholder="0000XX" name="zipcode">
<?php
			if ($_SESSION['news_letter'] == 1) {
				echo 	"<label for='news_letter'>Newsletter</label>
							<select name='news_letter'>
								<option value='1' class='profile-info-input'>Subscribed</option>
								<option value='0' class='profile-info-input'>unsubscribe</option>
							</select>
			";
			} elseif ($_SESSION['news_letter'] == 0) {
			echo 	"<label for='news_letter'>Newsletter</label>
							<select name='news_letter'>
								<option value='0' class='profile-info-input'>unsubscribed</option>
								<option value='1' class='profile-info-input'>subscribe</option>
							</select>
			";
			}
?>
				<input type="submit" value="Edit" name="editProfile">
			</form>
		</div>
	</div>
<?php
	include '../includes/footer.php';
?>
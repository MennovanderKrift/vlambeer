<?php require '../includes/adminMenu.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>

<div class="admin-container">
	<div class="admin-title">Settings</div>
		<form action="../controllers/authController.php" method="POST">
		    Subscribe to our newsletter:
		    <input type="checkbox" name="subscribeToNewsletter" id="subscribeToNewsletter" value="Yes" />
		    <input type="submit" name="subscribeToNewsletterSubmit" value="Submit" />
		</form>
</div>
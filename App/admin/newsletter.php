<?php require '../includes/adminMenu.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>

<div class="admin-container">
	<div class="admin-title">Write A New Newsletter</div>

		<form action="../controllers/adminController.php" class="newsletter-form" method="POST">
			<label for="title">Title</label>
				<input type="text" name="newsletter_title" id="newsletter_title">
			<label for="content">Content</label>
				<textarea name="newsletter_content" id="newsletter_content" cols="30" rows="10"></textarea>
				<input type="submit" name="sendNewsletter" value="Send" class="btn sendNewsletter-button">
		</form>
	<br>
	<br>
</div>
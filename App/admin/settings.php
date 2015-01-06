<?php require '../includes/adminMenu.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>

<div class="admin-container">
	<div class="admin-title">Settings</div>
	
</div>
<?php 
session_start();
	if (isset($_SESSION['id'])) {
		header('location: admin.php?id=' . $_SESSION['id']);
	} else {
		header('location: login.php');
	}
?>
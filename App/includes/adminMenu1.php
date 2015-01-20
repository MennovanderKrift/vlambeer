<?php
  session_start();
  require '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vlambeer | Admin</title>
  <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">  
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="stylesheet" href="../assets/css/sortable.css">
  <script src="../assets/js/jquery-1.11.0.min.js"></script>

  <script src="../assets/js/jquery.simplePagination.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../assets/css/simplePagination.css">
  <meta charset="UTF-8">
</head>
<body>
	<aside>
			<div class="admin-nav-menu">
				<div class="admin-nav-profile">
					<img src="../assets/img/profile-male.png" alt=""><br>
					
					<span class="admin-nav-profile-name">
					<?php
						$query = $db->query("SELECT name, last_name FROM tbl_users WHERE user_id = :session_id");
						$query -> bindParam(":session_id", $_SESSION['id'], PDO::PARAM_STR);
						$result = $user->fetch();

						$result['firstname'];
						$result['lastname'];
					
					 echo $_SESSION['name'] . ' ' . $_SESSION['last_name'];
					 ?>
					 </span>

				</div>
			<nav>
				<ul class="admin-nav-menu-items">
					<a href="admin.php"><li>Admins</li></a>
					<a href="customers.php"><li>Customers</li></a>
					<a href="newProduct.php"><li>Add product</li></a>
					<a href="changeStatus.php"><li>Invoices</li></a>
					<a href="newsletter.php"><li>Newsletter</li></a>
					<a href="settings.php"><li>Settings</li></a>
					<a href="inventory.php"><li>Inventory Items</li></a>
					<a href="../controllers/adminController.php?logout" name="logout"><li>Logout</li></a>
				</ul>
			</div>
		</nav>
	</aside>
	<section class="setNewScreen">
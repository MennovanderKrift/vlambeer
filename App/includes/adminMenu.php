<?php
  session_start();
  require '../config/Database.php';

  if ($_SESSION['id'] == $_GET['id']) {
  } else {
  	session_start();
    $_SESSION['noRights'] = "You are not allowed to come here, Please login again";
    header("location: ../admin/admin.php?id=" . $_SESSION['id']);
  }

  	if (isset($_SESSION['noRights'])) {
		echo '<li class="login-error-msg">' . $_SESSION['noRights'] . '</li>';
		unset($_SESSION['noRights']);
	}
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
					<span class="admin-nav-profile-name"><?php echo $_SESSION['name'] . ' ' . $_SESSION['last_name']; ?></span>
				</div>
			<nav>
				<ul class="admin-nav-menu-items">
					<li><form action=""><input type="search" name="search" id="search" placeholder="Search.." class="admin-search"><input type="submit" name="submit" value="" class="admin-search-button"></form></li>
					<a href="admin.php?id=<?php echo $_SESSION['id']; ?>"><li>Admins</li></a>
					<a href="customers.php?id=<?php echo $_SESSION['id']; ?>"><li>Customers</li></a>
					<a href="newProduct.php?id=<?php echo $_SESSION['id']; ?>"><li>Add product</li></a>
					<a href="changeStatus.php?id=<?php echo $_SESSION['id']; ?>"><li>Invoices</li></a>
					<a href="newsletter.php?id=<?php echo $_SESSION['id']; ?>"><li>Newsletter</li></a>
					<a href="settings.php?id=<?php echo $_SESSION['id']; ?>"><li>Settings</li></a>
					<a href="inventory.php?id=<?php echo $_SESSION['id']; ?>"><li>Inventory Items</li></a>
					<a href="../controllers/adminController.php?logout" name="logout"><li>Logout</li></a>
				</ul>
			</div>
		</nav>
	</aside>
	<section class="setNewScreen">
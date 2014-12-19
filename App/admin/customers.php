<?php require '../includes/adminMenu.php'; ?>

	<div class="admin-container">
		<div class="admin-title">Customer Accounts</div>
<?php
//////////////////////////////ERROR AFHANDELINGEN /////////////////////////////////////
		if (isset($_SESSION['editSuccesfull'])) {
			echo "<li class='login-msg'>" . $_SESSION['editSuccesfull'] . "</li>";
			unset($_SESSION['editSuccesfull']);
		}
		if (isset($_SESSION['deleteSuccesfull'])) {
			echo "<li class='login-msg'>" . $_SESSION['deleteSuccesfull'] . "</li>";
			unset($_SESSION['deleteSuccesfull']);
		}
///////////////////////////////////////////////////////////////////////////////////////
?>
		<table class="admin-table-content">
			<tr class="admin-table-head">
				<td>Id</td>
				<td>Username</td>
				<td>Email address</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Address</td>
				<td>Zipcode</td>
				<td>Phone Number</td>
				<td>News letter</td>
				<td></td>
				<td></td>
			</tr>
<?php
	$stmt = $db->prepare("SELECT * FROM tbl_customers");
	$stmt->execute();
///////////////////////// CHECKT HOEVEEL USERS ER ZIJN ////////////////////////////
	$result = $db->prepare("SELECT count(*) FROM tbl_customers"); 
	$result->execute(); 
	$number_of_rows = $result->fetchColumn();
///////////////////////////////////////////////////////////////////////////////////

	$users = $stmt->fetchAll(PDO::FETCH_OBJ);

	if ($number_of_rows == 0) {
		echo 	"<tr>
					<td>No users found</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>"; 
	} else {
		foreach ($users as $user) {
			$customerid = $user->customer_id;
?>
			<form action="../controllers/adminController.php?customer_id=<?php echo $customerid; ?>" method="POST">
			<tr>
				<td><?php echo $user->customer_id; ?></td>
				<td><input type="text" 	 name="username" 		value="<?php echo $user->username; ?>"></td>
				<td><input type="text" 	 name="email_address" 	value="<?php echo $user->email_address; ?>"></td>
				<td><input type="text" 	 name="name" 			value="<?php echo $user->name; ?>"></td>
				<td><input type="text" 	 name="last_name" 		value="<?php echo $user->last_name; ?>"></td>
				<td><input type="text" 	 name="address" 		value="<?php echo $user->address; ?>"></td>
				<td><input type="text" 	 name="zipcode" 		value="<?php echo $user->zipcode; ?>"></td>
				<td><input type="int" 	 name="phone_number" 	value="<?php echo $user->phone_number; ?>"></td>
				<td><input type="int" 	 name="news_letter" 	value="<?php echo $user->news_letter; ?>"></td>
				<td><input type="submit" value="Edit" name="editCustomerAccounts" class="btn btn-danger"></td>
				<td><input type="submit" value="Delete" name="deleteCustomerAccounts" class="btn btn-danger"></td>
			</tr>
			</form>
<?php
		}
	}
?>
		</table>
	<!-- <div style="admin-new-button"><a href="../controllers/adminController.php?newAdminAccount" class="btn btn-danger">New admin</a></td> -->
	</div>
</section>

		<!-- 	<form method="POST" action="../controllers/adminController.php?user_id=<?php echo $userid;?>">
				<tr>
					<td><?php echo $user->user_id; ?></td>
					<td><input type="text" name="username" 	id="username" 	value="<?php echo $user->username; ?>"></td>
					<td><input type="text" name="password" 	id="password" 	value="<?php echo $user->password; ?>"></td>
					<td><input type="text" name="name" 		id="name" 		value="<?php echo $user->name; ?>"></td>
					<td><input type="text" name="last_name" id="last_name" 	value="<?php echo $user->last_name; ?>"></td>
					<td><input type="submit" value="Edit" name="editAdminAccounts" class="btn btn-danger"></td>
					<td><input type="submit" value="Delete" name="deleteAdminAccounts" class="btn btn-danger"></td>
				</tr>
			</form> -->
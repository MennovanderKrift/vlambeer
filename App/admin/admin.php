<?php require '../includes/adminMenu.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>

	<div class="admin-container">
		<div class="admin-title">Admin Accounts</div>
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
		if (isset($_SESSION['cantDelete'])) {
			echo "<li class='login-error-msg'>" . $_SESSION['cantDelete'] . "</li>";
			unset($_SESSION['cantDelete']);
		}
///////////////////////////////////////////////////////////////////////////////////////
?>
		<table class="admin-table-content">
			<tr class="admin-table-head">
				<td>User Id</td>
				<td>Username</td>
				<td>Password</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td></td>
				<td></td>
			</tr>
		
<?php
	$stmt = $db->prepare("SELECT * FROM tbl_users");
	$stmt->execute();
///////////////////////// CHECKT HOEVEEL USERS ER ZIJN ////////////////////////////
	$result = $db->prepare("SELECT count(*) FROM tbl_users"); 
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
					</tr>"; 
	} else {
		foreach ($users as $user) {
			$userid = $user->user_id;
?>
			<form method="POST" action="../controllers/adminController.php?user_id=<?php echo $userid;?>">
				<tr>
					<td><?php echo $user->user_id; ?></td>
					<td><?php echo $user->username; ?></td>
					<td><?php echo $user->password; ?></td>
					<td><?php echo $user->name; ?></td>
					<td><?php echo $user->last_name; ?></td>
					<td><input type="submit" value="Edit" name="editAdminAccounts" class="btn btn-danger"></td>
					<td><input type="submit" value="Delete" name="deleteAdminAccounts" class="btn btn-danger"></td>
				</tr>

				<!-- <tr>
					<td><?php echo $user->user_id; ?></td>
					<td><input type="text" name="username" 	id="username" 	value="<?php echo $user->username; ?>"></td>
					<td><input type="text" name="password" 	id="password" 	value="<?php echo $user->password; ?>"></td>
					<td><input type="text" name="name" 		id="name" 		value="<?php echo $user->name; ?>"></td>
					<td><input type="text" name="last_name" id="last_name" 	value="<?php echo $user->last_name; ?>"></td>
					<td><input type="submit" value="Edit" name="editAdminAccounts" class="btn btn-danger"></td>
					<td><input type="submit" value="Delete" name="deleteAdminAccounts" class="btn btn-danger"></td>
				</tr> -->
			</form>
<?php
		}
	}
?>
		</table>
	<!-- <div style="admin-new-button"><a href="../controllers/adminController.php?newAdminAccount" class="btn btn-danger">New admin</a></td> -->
	</div>
</section>
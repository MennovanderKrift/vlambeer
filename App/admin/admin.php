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
		<table id="myTable" class="table table-hover tablesorter admin-table-content">
			<thead>
				<tr class="admin-table-head">
					<th>User Id</th>
					<th>Username</th>
					<th>Password</th>
					<th>First Name</th>
					<th>Last Name</th>
					<td></td>
					<td></td>
				</tr>
			</thead>
		
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
			echo "<tr>
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
				<tbody>
					<tr>
						<td><?= $user->user_id; ?></td>
						<td><?= $user->username; ?></td>
						<td><?= $user->password; ?></td>
						<td><?= $user->name; ?></td>
						<td><?= $user->last_name; ?></td>
						<td><input type="submit" value="Edit" name="editAdminAccounts" class="btn btn-danger"></td>
						<td><input type="submit" value="Delete" name="deleteAdminAccounts" class="btn btn-danger"></td>
					</tr>
				</tbody>

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
		<div class="pagination-page"></div>
	<!-- <div style="admin-new-button"><a href="../controllers/adminController.php?newAdminAccount" class="btn btn-danger">New admin</a></td> -->
	</div>
</section>
<script src="../assets/js/change-status-pagination.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/js/jquery.tablesorter.js"></script>
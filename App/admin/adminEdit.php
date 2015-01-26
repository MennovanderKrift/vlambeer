<?php require '../includes/adminMenu.php'; ?>

<div class="admin-container">

<?php
	$stmt = $db->prepare("SELECT * FROM tbl_users WHERE user_id = :id");
	$stmt->bindParam("id", $_GET['user']);
	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_OBJ);

	foreach ($users as $user) {
?>

	<div class="admin-title">Change <?php echo $user->name . ' ' . $user->last_name; ?></div>
		<table id="myTable" class="table table-hover tablesorter admin-table-content">
			<thead>
				<tr class="admin-table-head">
					<th>User Id</th>
					<th>Username</th>
					<th>Password</th>
					<th>First Name</th>
					<th>Last Name</th>
					<td></td>
				</tr>
			</thead>
		
			<form method="POST" action="../controllers/adminController.php?user_id=<?php echo $user->user_id;?>">
				<tbody>
					<tr>
						<td><?= $user->user_id; ?></td>
						<td><input type="text" name="username" 	id="username" 	value="<?php echo $user->username; ?>"></td>
						<td><input type="text" name="password" 	id="password" 	value="<?php echo $user->password; ?>"></td>
						<td><input type="text" name="name" 		id="name" 		value="<?php echo $user->name; ?>"></td>
						<td><input type="text" name="last_name" id="last_name" 	value="<?php echo $user->last_name; ?>"></td>
						<td><input type="submit" value="Edit" name="editAdminAccounts" class="btn btn-danger"></td>
					</tr>
				</tbody>
			</form>
<?php
	}
?>
		</table>
		<div class="pagination-page"></div>
</div>
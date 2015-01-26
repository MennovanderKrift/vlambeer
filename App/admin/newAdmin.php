<?php require "../includes/adminMenu.php" ?>

<div class="admin-container">
	<div class="admin-title">Create admin</div>
		<table id="myTable" class="table table-hover tablesorter admin-table-content">
			<thead>
				<tr class="admin-table-head">
					<th>Email</th>
					<th>Username</th>
					<th>Password</th>
					<th>First Name</th>
					<th>Last Name</th>
					<td></td>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<form action="../controllers/adminController.php?newAdminAccount" method="POST">
						<td><input type="email"		name="email" 		id="email"></td>
						<td><input type="text" 		name="username" 	id="username"></td>
						<td><input type="password" 	name="password" 	id="password"></td>
						<td><input type="text" 		name="name" 		id="name"></td>
						<td><input type="text" 		name="last_name" 	id="last_name"></td>
						<td><input type="submit" class="btn btn-danger" name="newAdminAccount" id="newAdminAccount" Value="Add">
					</form>
				</tr>
			</tbody>
</div>
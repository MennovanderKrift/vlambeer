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
///////////////////////// CHECKT HOEVEEL USERS ER ZIJN ////////////////////////////
	$query = $db->query("SELECT * FROM tbl_customers"); 

	foreach ($query as $row) 
	{
	 		echo "<tr>";
				echo	"<td>" . $row->customer_id . "</td>";
				echo	"<td>" . $row->username . "</td>";
				echo	"<td>" . $row->email_address . "</td>";
				echo	"<td>" . $row->name . "</td>";
				echo 	"<td>" . $row->last_name . "</td>";
				echo "<td>" . $row->address . "</td>";
				echo "<td>" . $row->zipcode . "</td>";
				echo "<td>" . $row->phone_number . "</td>";
				echo "<td>" . $row->news_letter . "</td>";	
			echo "</tr>";
	 }

 // 	if ($number_of_rows == 0) {
// 		echo 	"<tr>
// 					<td>No users found</td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 					<td></td>
// 				</tr>"; 
// 	 -->
		
?>
<!-- // 			<form action="../controllers/adminController.php?customer_id=<?php echo $customerid; ?>" method="POST">
// 			<tr>

// 				<td><input type="submit" name="editCustomerAccounts" class="btn btn-danger"></td>
// 				<td><input type="submit" name="deleteCustomerAccounts" class="btn btn-danger"></td>
// 			</tr>
// 			</form>
// 		</table>
// 	</div>
// </section> -->
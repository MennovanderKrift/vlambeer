<?php require '../includes/adminMenu.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>

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
		<table id="myTable" class="table table-hover tablesorter admin-table-content">
			<thead>
				<tr class="admin-table-head">
					<th>Id</th>
					<th>Username</th>
					<th>Email address</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>Zipcode</th>
					<th>Phone Number</th>
					<th>Newsletter</th>
					<td></td>
				</tr>
			</thead>

			<tbody>
<?php
///////////////////////// CHECKT HOEVEEL USERS ER ZIJN ////////////////////////////
	$query = $db->query("SELECT * FROM tbl_customers"); 

	foreach ($query as $row) 
	{		echo "<form action='changeStatus.php' method='POST'>";
	 		echo "<tr>";
				echo "<td>" . $row['customer_id'] . "</td>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['email_address'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['last_name'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['zipcode'] . "</td>";
				echo "<td>" . $row['phone_number'] . "</td>";
				echo "<td>";
				if($row['news_letter'] == 1){
					echo "Yes";

				}else{
					echo "No";
				};

				echo "</td>";
				echo "<input type='hidden' value='".$row['customer_id']."'>";
				echo "<td><input type='submit' class='btn btn-danger' value='Invoices'></td>";
			echo "</tr>";
			echo "</form>";
	 };

		 echo "</tbody>";
	 echo "</table>";

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
	<div class="pagination-page"></div>
<script src="../assets/js/change-status-pagination.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/js/jquery.tablesorter.js"></script>
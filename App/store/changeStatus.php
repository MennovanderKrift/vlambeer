<?php require '../includes/header.php';  

$con = mysqli_connect('localhost','root','','vlambeer')
	or die('Could not connect to the database. Please contact the web developer.');

$query = ("SELECT * FROM tbl_invoices");
$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_assoc($result)){

}

var_dump($result);
?>

<div class="container">
	<div class="index-games">
		<h2><center>Change order status</center></h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Order No.</th>
					<th>Customer No.</th>
					<th>Name</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>99</td>
					<td>88</td>
					<td>Test name</td>
					<td>
						<select>
							<option value="<?php echo '';?>"><?php echo 'status'; ?>  (unchanged) </option>
							<option value="returned">Returned</option>
							<option value="send">Send</option>
							<option value="awaiting payment">Awaiting payment</option>
							<option value="canceled">Canceled</option>
							<option value="unknown">Unknown</option>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php include '../includes/footer.php'; ?>
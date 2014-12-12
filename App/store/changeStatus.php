<?php require '../includes/header.php';  

$con = mysqli_connect('localhost','root','','vlambeer')
	or die('Could not connect to the database. Please contact the web developer.');

$query = ("SELECT * FROM tbl_invoice");
$result = mysqli_query($con, $query);
?>

<div class="container">
	<div class="index-games">
		<h2><center>Change order status</center></h2>
		<p style='color: green'><b><?php
			if(isset($_GET['msg'])){
				echo $_GET['msg'];
			}
			?>
		</b></p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Invoice ID</th>
					<th>Product ID</th>
					<th>Customer ID</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($row = mysqli_fetch_assoc($result)){
					$msg = $row['invoice_id'];
					echo "<form role='form' action='changeStatus.php?invoice_id=" .$row['invoice_id']. "' method='POST'>";
						echo "<tr>";

						echo "<td>" .$row['invoice_id']. '</td>';
						echo "<td>" .$row['product_id']. '</td>';
						echo "<td>" .$row['customer_id']. '</td>';
						echo "<td>";
							echo "<select class='form-control' name='status'>";
								echo "<option name ='invoice_id'>" .ucfirst($row['order_status']). "</option>";

								if($row['order_status'] = 'send'){
									echo "<option value='paid'>Paid</option>";
									echo "<option value='canceled'>Canceled</option>";

								}else if ($row['order_status'] = 'paid'){
									echo "<option value='send'>Send</option>";
									echo "<option value='canceled'>Canceled</option>";								
								}else if ($row['order_status'] = 'canceled'){
									echo "<option value='send'>Send</option>";
									echo "<option value='paid'>Paid</option>";
								}

							echo "</select>";

						echo '</td>';
						echo "<td><input type='submit' value='Update' class='btn btn-primary' name='order-status'></td>";

						echo "</tr>";
					echo "</form>";
					}

					if(isset($_POST['order-status'])){
						$invoice_id = $_GET['invoice_id'];
						$status = $_POST['status'];

						$query = mysqli_query($con, "UPDATE tbl_invoice SET order_status = '$status' WHERE invoice_id = $invoice_id ")
						or die ('Could not update the order status. Please contact the web developer.');

						$msg = urlencode('- Order status has been updated');
						header('location: changeStatus.php?msg=' .$msg);
					}
					?>
			</tbody>
		</table>
	</div>
</div>

<?php include '../includes/footer.php'; ?>
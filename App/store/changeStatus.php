<?php require '../includes/header.php';  

$con = mysqli_connect('localhost','root','','vlambeer')
	or die('Could not connect to the database. Please contact the web developer.');

if(isset($_POST['order-status'])){
	$invoice_id = $_GET['invoice_id'];
	$order_status = $_POST['order_status'];

	$query = mysqli_query($con, "UPDATE tbl_invoice SET order_status = '$order_status' WHERE invoice_id = $invoice_id ")
	or die ('Could not update the order status. Please contact the web developer.');

	$msg = urlencode('Order status has been updated');
	header('location: changeStatus.php?msg=' .$msg);
}
?>

<div class="container">
	<div class="index-games">
		<h2><center>Change order status</center></h2>

		<?php
			if(isset($_GET['msg'])){
				echo "<p class='bg-success'>" .$_GET['msg']. "</p>";
			}

			if(isset($_POST['search-order'])){
				$searchTerm 	= trim($_POST['search-term']);
				$searchOption 	= trim($_POST['search-option']);

				if(empty($searchTerm)){
					header('location: changeStatus.php');
				}

				if($searchOption == 'customer-id'){
					$stmt = $db -> prepare("SELECT * FROM tbl_invoice WHERE customer_id = :searchTerm");
					$stmt -> bindParam(":searchTerm", $searchTerm, PDO::PARAM_STR);
					$stmt->execute();

					$result = $db->prepare("SELECT count(*) FROM tbl_invoice WHERE customer_id = :searchTerm");
       				$result->bindParam(":searchTerm", $searchTerm, PDO::PARAM_STR);
					$result->execute(); 
					$countRows = $result->fetchColumn();

				}else if ($searchOption == 'order-id'){
					$stmt = $db -> prepare("SELECT * FROM tbl_invoice WHERE invoice_id = :searchTerm");
					$stmt -> bindParam(":searchTerm", $searchTerm, PDO::PARAM_STR);
					$stmt->execute();

					$result = $db->prepare("SELECT count(*) FROM tbl_invoice WHERE invoice_id = :searchTerm");
					$result -> bindParam("searchTerm", $searchTerm, PDO::PARAM_STR);
					$result->execute(); 
					$countRows = $result->fetchColumn();

				}else{
					$stmt = $db -> prepare("SELECT * FROM tbl_invoice");
					$stmt->execute();

					$result = $db->prepare("SELECT count(*) FROM tbl_invoice");
					$result->execute(); 
					$countRows = $result->fetchColumn();
				}

			}else{
				$stmt = $db -> prepare ("SELECT * FROM tbl_invoice");
				$stmt->execute();

				$result = $db-> prepare ("SELECT count(*) FROM tbl_invoice");
				$result->execute(); 
				$countRows = $result->fetchColumn();
			} // if (isset($_POST['search-order'])) --end

			$invoices = $stmt->fetchAll(PDO::FETCH_OBJ);
			?>

		</b></p>

			<?php
				echo "<p class='bg-success col-md-12'>Number of orders found: " .$countRows. "</p>";
			?>

			<!-- search form start -->
			<form class="form-horizontal col-md-12 search-order" role="form" action="changeStatus.php" method="POST">
			   	<label for="search-term" class="col-sm-4 col-md-2 control-label">Search order:</label>

				<div class="col-sm-11 col-md-6">
					<input type="text" class="form-control" placeholder="Customer name, customer id or order id"
						<?php if (isset($_POST['search-term'])){
							echo "value='" .$searchTerm. "'";
						};
					?>name="search-term" id="search-term">
			    </div>

			    <div class="col-sm-8 col-md-3">
					<select type="text" class="form-control" name="search-option" id="size" max-length="10">
				   		<option value="order-id">Order id</option>
				   		<option value="customer-id">Customer id</option>
			   		</select>
			   	</div>	

				<button type="submit" class="btn btn-warning" name="search-order">Search</button>
		    </form>
			<!-- search form end -->

		<!-- results table start -->
		<table id='myTable' class="table table-hover tablesorter">
			<thead>
				<tr>
					<th>Invoice ID</th>
					<th>Customer ID</th>
					<th>Status</th>
					<th>Payment status</th>
					<th>Order date</th>
				</tr>
			</thead>

			<tbody>
				<?php

			foreach ($invoices as $invoice){
				$msg = $invoice ->invoice_id;
				echo "<form role='form' action='changeStatus.php?invoice_id=" .$invoice ->invoice_id. "' method='POST'>";
					echo "<tr>";
						echo "<td>" .$invoice ->invoice_id. "</td>";
						echo "<td>" .$invoice ->customer_id. "</td>";

						echo "<td>";
							echo "<select class='form-control' name='order_status'>";
								switch($invoice ->order_status){
								case 'send':
										echo "<option value='send'>Send</option>";
										echo "<option value='paid'>Paid</option>";
										echo "<option value='canceled'>Canceled</option>";
										echo "<option value='backorder'>Backorder</option>";
									break;
								case 'paid':
										echo "<option value='paid'>Paid</option>";
										echo "<option value='send'>Send</option>";
										echo "<option value='canceled'>Canceled</option>";
										echo "<option value='backorder'>Backorder</option>";
										break;
								case 'canceled':
										echo "<option value='canceled'>Canceled</option>";
										echo "<option value='send'>Send</option>";
										echo "<option value='paid'>Paid</option>";
										echo "<option value='backorder'>Backorder</option>";
										break;
								case 'backorder':
										echo "<option value='backorder'>Backorder</option>";
										echo "<option value='send'>Send</option>";
										echo "<option value='paid'>Paid</option>";
										echo "<option value='canceled'>Canceled</option>";
										break;
								default:
										echo "<option value='-'>-</option>";			
										echo "<option value='send'>Send</option>";
										echo "<option value='paid'>Paid</option>";
										echo "<option value='canceled'>Canceled</option>";
										echo "<option value='backorder'>Backorder</option>";
										break;
								}

							echo "</select>";
						echo '</td>';

						echo '<td>' .ucfirst($invoice ->payment_status). '</td>';
						echo '<td>' .$invoice ->date. '<td>';
						echo "<td><input type='submit' value='Update' class='btn btn-warning' name='order-status'></td>";
					echo "</tr>";
				echo "</form>";
				}
				?>
			</tbody>
		</table>
		<div class="pagination-page"></div>
		<!-- results table end -->
	</div>
</div>
<script src="../assets/js/change-status-pagination.js" type="text/javascript"></script>
<?php include '../includes/footer.php'; ?>
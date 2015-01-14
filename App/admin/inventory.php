<?php require '../includes/adminMenu1.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>
<div class="admin-container">
	<div class="admin-title">Inventory Items</div>

		<table id="myTable" class="table table-hover tablesorter admin-table-content">
		<thead>
		<tr class="admin-table-head">
			<th>Product Name</th>
			<th>Category</th>
			<th>Number of Stock</th>
		</tr>
		</thead>
		
		<tbody>
			<?php

			$query = $db->query("SELECT name, category, stock FROM tbl_products");
			
			foreach ($query as $row) 
			{
				echo '<tr>';
					echo '<td>' . $row->name . '</td>';
					echo '<td>' . $row->category . '</td>';
					echo '<td>' . $row->stock . '</td>';					
				echo '</tr>';		
			}	
			?>				
		</tbody>
	</table>
	<div class="pagination-page"></div>
</div>
<script src="../assets/js/change-status-pagination.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/js/jquery.tablesorter.js"></script>
</body>
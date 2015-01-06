<?php require '../includes/adminMenu.php';

if ($_SESSION['role'] == 'admin') {
  $sessionId = $_SESSION['id'];
} else {
  header("location: ../store/index.php");
}
?>
<div class="admin-container">
	<div class="admin-title">Inventory Items</div>

	<table class="admin-table-content">
		<thead>
		<tr class="admin-table-head">
			<td>Product Name</td>
			<td>Category</td>
			<td>Number of Stock</td>
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
</div>
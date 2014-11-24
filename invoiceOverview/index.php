<?php 

// include to header file goes here

$con = mysqli_connect('localhost', 'root', '', 'vlambeer');
$query = mysqli_query($con, "SELECT * FROM invoices");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoice overview</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="sorttable.js"></script>
</head>
<body>

<div class="container">
	
<h2>Invoice overview</h2>

	<table class="table table-striped sortable">
		<thead>
			<tr>
				<td>Invoice #</td>
				<td>Invoice date</td>
				<td>Download</td>
			</tr>
		</thead>
		<tbody>
	<?php
	while($row = mysqli_fetch_assoc($query)) {
		$invoiceNr 	= $row['invoice_nr'];
		$date		= $row['invoice_date'];
		$dl 		= $row['invoice_dl'];

	echo "<tr>
			<td>#" . $invoiceNr . "</td>
			<td>" . $date . "</td>
			<td><a href='" . $dl . "'>x</a></td>
			</tr>"; 
	}

	?>
		</tbody>
	</table>

</div>

</body>
</html>
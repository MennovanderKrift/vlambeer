<?php

// require '../includes/header.php';
require '../config/config.php';
require '../libs/Shoppingcart.php';

$sc = new Shoppingcart();

$cart->addToCart("product ID", "Amount", "Price");



/*
if(isset($_GET['name'])) 
{
	$name = $_GET['name'];
}

if(isset($_GET['action'])) 
{
	$action = $_GET['action'];
	if($action ==  'removed') 
	{
		echo $name . " was removed from shoppingcart";
	}
	else if($action == 'quantity_updated') 
	{
		echo $name . " quantity was updated";
	}	
}

if(!isset($_SESSION['cart_items'])) 
{
	echo "There are no items in your shopping cart";
} 
elseif(count($_SESSION['cart_items'])>0) 
{
	$pids = "";
	foreach($_SESSION['cart_items'] as $id=>$value) 
	{
		$pids = $pids . $id . ",";
	}

	$pids = rtrim($pids, ',');

	echo "<table>";
	echo "<tr>";
	echo "<thead>";
	echo "<td>Product name</td>";
	echo "<td>Price</td>";
	echo "<td>Quantity</td>";
	echo "<td>Sub total</td>";
	echo "<td>BTW</td>";
	echo "<td>Action</td>";
	echo "</tr>";

	$stmt = $db->prepare("SELECT product_id, name, item_price FROM tbl_products WHERE product_id IN ({$pids}) ORDER BY name");
	$stmt->execute();

	$total_price = 0;
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
	{
		extract($row);

		if(!isset($_SESSION['cart_items'][$id]['quantity'])) 
		{
			$quantity = 1;
		} 
		else 
		{
			$quantity = $_SESSION['cart_items'][$id]['quantity'];
		}
		$sub_total = $item_price * $quantity;
		$BTW = $sub_total * 0.21;

		echo "<tr>";
		echo "<td>{$name}</td>";
		echo "<td>&euro;{$item_price}</td>";
		echo "<td><input type='text' name='quantity' value='{$quantity}' class='form-control'>";
		echo "<span class='input-group-btn'>";
		echo "<button class='btn btn-default update-quantity' type='button'>Update</button>";
		echo "</span></td>";
		echo "<td>&euro;{$sub_total}</td>";

		echo "<td>&euro;{$BTW}</td>";

		echo "<td>";
		echo "<a href='removefromcart.php?id={$id}&&name={$row['name']}'>";
		echo "Remove from cart";
		echo "</a>";
		echo "</td>";
		echo "</tr>";

		$total_price += $item_price * $quantity * 1.21;
	}

	echo "<tr>";
	echo "<td><b>Total</b></td>";
	echo "<td>&euro;{$total_price}</td>";
	echo "<td>";
	?>
*/
?>
<html>
<head>
</head>
<body>
	<table>
		<thead>
			<tr>
				<td>Product Name</td>
				<td>Item Price</td>
				<td>Quantity</td>
				<td>Sub Total</td>
				<td>BTW</td>
			</tr>			
		</thead>
		<tbody>

			
		</tbody>
	</table>
</body>


<form name="_xclick" target="paypal" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="business" value="info@vlambeer.com">
	<input type="hidden" name="currency_code" value="EUR">
	<input type="hidden" name="item_name" value="<?= $name?>">
	<input type="hidden" name="amount" value="<?= $item_price ?>">
	<input type="hidden" name="quantity" value="<?= $quantity?>">
	<input type="hidden" name="tax" value="<?= $item_price * $quantity * 0.21; ?>">
	<input type="image" src="https://www.paypalobjects.com/nl_NL/NL/i/btn/btn_xpressCheckout.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	<input type="hidden" name="return" value="http://www.radiusdev.nl?id=<?=$id ?>">
	<input type="hidden" name="add" value="1">
</form>



<?php
// 	echo "</td>";
// 	echo "</tr>";
// 	echo "</table>";
// } 
// else 
// {
// 	echo "There are no items in your shoppingcart.";
// }



require '../includes/footer.php';
require '../assets/js/shoppingcart.js';
?>
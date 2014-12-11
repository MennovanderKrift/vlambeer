<?php
session_start();
session_destroy();
require '../config/Database.php';

session_start();

if(isset($_GET['name'])) {
	$name = $_GET['name'];
}


if(isset($_GET['action'])) {
	$action = $_GET['action'];
	if($action ==  'removed') {
	echo $name . " was removed from shoppingcart";
}else if($action == 'quantity_updated') {
	echo $name . " quantity was updated";
}
}

if(!isset($_SESSION['cart_items'])) {
	echo "There are no items in your shopping cart";
} elseif(count($_SESSION['cart_items'])>0) {
	$pids = "";
	foreach($_SESSION['cart_items'] as $id=>$value) {
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
	echo "<td>Action</td>";
	echo "</tr>";
 

	$stmt = $db->prepare("SELECT product_id, name, price FROM tbl_products WHERE product_id IN ({$pids}) ORDER BY name");
	$stmt->execute();

	$total_price=0;
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);

		if(!isset($_SESSION['cart_items'][$id]['quantity'])) {
			$quantity = 1;
		} else {
					$quantity=$_SESSION['cart_items'][$id]['quantity'];
		}


		$sub_total=$price*$quantity;

		echo "<tr>";
		echo "<td>{$name}</td>";
		echo "<td>&euro;{$price}</td>";
		echo "<td><input type='text' name='quantity' value='{$quantity}' class='form-control'>";
		echo "<span class='input-group-btn'>";
		echo "<button class='btn btn-default update-quantity' type='button'>Update</button>";
		echo "</span></td>";
		echo "<td>&euro;{$sub_total}</td>";
		echo "<td>";
		echo "<a href='removefromcart.php?id={$id}&&name={$row['name']}'>";
		echo "Remove from cart";
		echo "</a>";
		echo "</td>";
		echo "</tr>";

		$total_price+=$price;
	}

	echo "<tr>";
	echo "<td><b>Total</b></td>";
	echo "<td>&euro;{$total_price}</td>";
	echo "<td>";
	echo "<a href='#'>Checkout</a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
} else {
	echo "There are no items in your shoppingcart.";
}

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
	$('.add-to-cart').click(function(){
		var id = $(this).closest('tr').find('.product-id').text();
		var name = $(this).closest('tr').find('.product-name').text();
		var quantity = $(this).closest('tr').find('input').val();
		window.location.href = "add_to_cart.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
	});
	
	$('.update-quantity').click(function(){
		var id = $(this).closest('tr').find('.product-id').text();
		var name = $(this).closest('tr').find('.product-name').text();
		var quantity = $(this).closest('tr').find('input').val();
		window.location.href = "update_quantity.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
	});
});
</script>


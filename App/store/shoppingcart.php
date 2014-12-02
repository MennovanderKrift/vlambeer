<?php

 require '../config/Database.php';
session_start();

if(isset($_GET['action'])) {
	$action = $_GET['action'];
}

if(isset($_GET['name'])) {
	$name = $_GET['name'];
}

if($action ==  'removed') {
	echo $name . "was removed from shoppingcart";
}else if($action == 'quantity_updated') {
	echo $name . "quantity was updated";
}

if(count($_SESSION['cart_items'])>0) {
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
	echo "<td>Action</td>";
	echo "</tr>";
 

	$stmt = $db->prepare("SELECT product_id, name, price FROM products WHERE product_id IN ({$pids}) ORDER BY name");
	$stmt->execute();

	$total_price=0;
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);

		echo "<tr>";
		echo "<td>{$name}</td>";
		echo "<td>&euro;{$price}</td>";
		echo "<td>";
		echo "<a href='removefromcart.php?id={$id}&&name={$name}'>";
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
}else {
	echo "No products found in your cart";
}

echo "<a href='emptycart.php'>Remove all items from shoppingcart</a>";

?>
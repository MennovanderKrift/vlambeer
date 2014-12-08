<?php
session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

// remove the item from the array
unset($_SESSION['cart_items'][$id]);

// add the item with updated quantity
$_SESSION['cart_items'][$id]=array(
	'name'=>$name,
	'quantity'=>$quantity
);

// redirect to product list and tell the user it was added to cart
header('Location: shoppingcart.php?action=quantity_updated&id=' . $id . '&name=' . $name);
?>
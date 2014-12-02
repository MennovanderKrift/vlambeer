<?php

session_start();

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

if(isset($_GET['name'])) {
	$name = $_GET['name'];
}

unset($_SESSION['cart_items'][$id]);

header("location: shoppingcart.php?action=removed&id=" . $id . "&&name=" . $name);
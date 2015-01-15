<?php

session_start();
session_destroy();

require '../config/Database.php';
session_start();

if(isset($_GET['id'])) 
{
	$id = $_GET['id'];
}

$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

$cart_item = array(
	'name' 		=> $name,
	'quantity'	=> $quantity
);

if(!isset($_SESSION['cart_items'])) 
{
	$_SESSION['cart_items'] = array();
}

if(array_key_exists($id, $_SESSION['cart_items'])) 
{
	header("location: cartView.php?action=exists&id=" . $id);
}
else 
{
	$_SESSION['cart_items'][$id] = $name;
	header("location: cartView.php?action=added&id=" . $id);
}?>
<?php

session_start();
unset($_SESSION['cart_items']);

header('location: shoppingcart.php');

?>
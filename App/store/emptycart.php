<?php

session_start();
unset($_SESSION['cart_items']);


session_destroy();
header('location: shoppingcart.php');



?>
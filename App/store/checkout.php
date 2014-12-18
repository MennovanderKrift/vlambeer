<?php

require_once '../mollie/src/Mollie/API/Autoloader.php';




$mollie = new Mollie_API_Client;
$mollie->setApiKey('test_jMjGtjLRSSr9GhNjifWtbEmfkz7WmP');


$methods = $mollie->methods->all();

foreach ($methods as $method)
{
	echo '<div style="line-height:40px; vertical-align:top">';
	echo '<img src="' . htmlspecialchars($method->image->normal) . '"> ';
	echo htmlspecialchars($method->description) . ' (' .  htmlspecialchars($method->id) . ')';
	echo '</div>';
}

try
{
	$payment = $mollie->payments->create(
		array(
			'amount'      => '10.00',
			'description' => 'My first API payment',
			'method'	  => 'paypal',
			'locale'	  => 'en',
			'redirectUrl' => 'https://webshop.example.org/order/12345/',
			'metadata'    => array(
			'order_id' => '12345'
			)
		)
	);

	/*
	 * Send the customer off to complete the payment.
	 */
	header("Location: " . $payment->getPaymentUrl());
	exit;
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage()) . " on field " + htmlspecialchars($e->getField());
}

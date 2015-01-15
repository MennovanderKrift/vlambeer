<?php

require '../../config/config.php';

Class inventoryStock
{
	private $id;
	private $name;
	private $stock;

	$query = $db->query("SELECT product_id, name, stock FROM tbl_products WHERE product_id = '$id'");

	$id = $_GET['product_id'];
	$name = $_GET['name'];
	$stock = $_GET['stock'];

	public function getStock()
	{
		if($stock->name == 0)
		{
			echo "product is out of stock ";
		}

		if ($stock->name <= 3) 
		{
			echo "Er zijn nog maar minder dan 3 producten beschikbaar";
		}

		if ($stock->name >= 5) 
		{
			echo "Er zijn op dit moment nog 5 of meer producten aanwezig";
		}
	}

	public function updateStock()
	{
		//als betaling voltooid is:
		//1. check welke items er in winkelmandje zaten.
		//2. check hoeveel items er in winkelmandje zaten
		//3. update de item stock

	}
}?>
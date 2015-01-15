<?php

require '../config/config.php';

Class inventoryStock
{
	private $id;
	private $name;
	private $stock;
	private $quantity;

	public function __construct($project_id, $name, $quantity, $stock)
	{
		$this->id = $project_id;
		$this->name = $name;
		$this->quantity = $quantity;
		$this->stock = $stock;
	}

	public function getStock()
	{
		$query = $db->query("SELECT product_id, name, stock FROM tbl_products WHERE product_id = '$id'");

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

	public function updateStock($id, $quantity)
	{
		$currentStock = $db->query("SELECT product_id, stock FROM tbl_products WHERE product_id = $id");
		$updateStock = $currentStock - $quantity;

		if ($quantity > $stock)
		{		
			echo "De voorraad is bijgewerkt.";
		}
	}

	

		//als betaling voltooid is:
		//1. check alle items op id welke er in winkelmandje zaten.
		//2. check hoeveel items er in winkelmandje zaten
		//3. update de item stock
}?>
<?php

Class Shoppingcart
{
	private $cart_id;

	public function __construct($db)
	{
		$this->db = $db;

		if (isset($_SESSION['id'])) 
		{
			$this->cart_id = $_SESSION['id'];
			
			if(isset($_SESSION['cid']))
			{
				$this->cid = $_SESSION['cid'];
			}
			else
			{
			 	$this->cid = GenerateRandomId(10);
			}
		}
	}

	public function addToCart($product_id, $name, $item_price)
	{
		if($this->db->query("SELECT customer_id FROM tbl_customers WHERE customer_id = :cid", ["cid" => $this->cart_id]))
		{
			$bind = [
				"cid"	=> $this->cart_id,
				"id" 	=> $this->cid,
				"pid" 	=> $product_id,
				"qu"	=> $quantity,
				"ip"	=> $item_price	
				];
			$this->db->query("INSERT INTO tbl_carts SET customer_id = :cid, cart_id = :id, product_id = :pid, quantity = :qu, item_price = :pr", $bind);
		} 
		elseif ($this->db->query("SELECT tempcart_id FROM link_products_tempcarts WHERE tempcart_id = :tid", ["tid" => $this->cart_id])) 
		{
			$bind = [
				"tid" 	=> $this->cart_id,
				"pid" 	=> $product_id,
				"qu"	=> $quantity,
				"ip"	=> $item_price	
			];
			$this->db->query("INSERT INTO tbl_tempcarts SET tempcart_id = :tid, product_id = :pid, quantity = :qu, item_price = :ip", $bind);
		}
	}

	public function removeFromCart($product_id)
	{
		if($this->db->query("SELECT customer_id FROM tbl_customers WHERE customer_id = :cid", $bind))
			$bind = [
						"id" 	=> $this->cart_id,
						"pid" 	=> $product_id
					];
			$this->db->query("DELETE FROM tbl_carts WHERE cart_id = :id AND product_id = :pid")	
			$bind = [
						"tid" => $this->cart_id,
						"pid" => $this->product_id
					];
		else
		{
			$db->query("DELETE FROM tbl_tempcarts WHERE tempcart_id = :tid AND product_id = :pid", $bind);
		}
	}

	public function changeQuantity($quantity)
	{
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		$name = isset($_GET['name']) ? $_GET['name'] : "";
		$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

		// remove the item from the array
		unset($_SESSION['cart_items'][$id]);

		// add the item with updated quantity
		$_SESSION['cart_items'][$id] = array(
		'name'		=>	$name,
		'quantity'	=>	$quantity);

		// redirect to product list and tell the user it was added to cart
		header('Location: cartView.php?action=quantity_updated&id=' . $id . '&name=' . $name);
	}

	public function checkIfProductIsTshirt()
	{
		$query->db->query("SELECT * FROM tbl_products WHERE product_id = :id ");
		$checkProduct_id = $_GET['product_id'];

		$query1->db->query("SELECT * FROM customers WHERE customer_id = :cid");
		$getCustomerId = $_GET['customer_id'];

		// if($checkProduct_id <= 4, $getCustomerId)
		// {
		// 	$insertInto->db->query("INSERT INTO tbl_carts SET customer_id =: cid, cart_id = :id, product_id = :pid, quantity = :qu, item_price = :ip", $bind)
		// 	$bind = [
		// 				"cid"	=> $this->cart_id,
		// 				"id" 	=> $this->cid,
		// 				"pid" 	=> $product_id,
		// 				"qu"	=> $quantity,
		// 				"ip"	=> $item_price	
		// 			];
		// }
		// else
		// {

		// }
	}
	
	/*Method to get all the items in the shoppingcart*/
	public function getStock()
	{
		$query = $db->query("SELECT product_id, name, stock FROM tbl_products WHERE product_id = '$product_id'");

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
		//check of betaling voltooid is:
		//1. check alle items op id welke er in winkelmandje zaten.
		//2. check hoeveel items er per id in het winkelmandje zaten
		//3. haal de huidige inventory op en haal de gekochte producten van die inventory af
}?>
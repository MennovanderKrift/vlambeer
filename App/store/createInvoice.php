<?php

require '../config/Database.php';
require 'fpdf17/fpdf.php';
require 'PHPMailer/class.phpmailer.php';

$invoiceId = $_GET['id'];

$sql		 = 		"SELECT * 
					FROM tbl_invoice INNER JOIN tbl_customers
					ON tbl_invoice.customer_id = tbl_customers.customer_id 
					WHERE tbl_invoice.invoice_id = :invoiceId";

$query 		=		$db->prepare($sql);
$query 		-> 		bindParam("invoiceId", $invoiceId, PDO::PARAM_STR);

if($query->execute()) {
	while($pdfinfo = $query->fetch(PDO::FETCH_OBJ)) {
		$invoice_id 	= $pdfinfo->invoice_id;
		$product_id 	= $pdfinfo->product_id;
		$customer_id 	= $pdfinfo->customer_id;
		$order_status 	= $pdfinfo->order_status;
		$amount 		= $pdfinfo->amount;
		$payment_status = $pdfinfo->payment_status;
		$date			= $pdfinfo->date;
		$name			= $pdfinfo->name;
		$last_name		= $pdfinfo->last_name;
		$address		= $pdfinfo->address;
		$zipcode 		= $pdfinfo->zipcode;
		$email 			= $pdfinfo->email_address;

		$productSql 	= "SELECT * FROM tbl_products WHERE product_id = :product_id";
		$productQuery 	= $db->prepare($productSql);
		$productQuery 	-> bindParam("product_id", $product_id, PDO::PARAM_STR);

		if($productQuery->execute()) {
			while($product = $productQuery->fetch(PDO::FETCH_OBJ)) {
				$product_name 			= $product->name;
				$product_description 	= $product->description;
				$item_price				= $product->item_price;
				$item_image 			= $product->image;
			}
		}
	}
}


// PDF BESTAND AANMAKEN
define('EURO',chr(128));

$euro = iconv('utf-8', 'cp1252', '€');

$pdf = new FPDF(); 
$pdf->Addpage();
$pdf->Image('../assets/img/slider1.png');
$pdf->SetFont("Arial", "B", "20");
$pdf->Cell(0,10,"Vlambeer Invoice",1,1,"C");

//Barroc IT informatie
$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"Vlambeer", 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"Neude 5", 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"3512 AD, Utrecht", 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"The Netherlands", 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"+31621206363", 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"info@vlambeer.com", 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont("Arial", "", "12");
$pdf->Cell(0,5,"Rekeningnummer: NL 04 RABO 0197608098", 0, 0, 'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


//Klant informatie
// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"$CompanyName", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"$ContactPerson", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"$Address1", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"$Zipcode1", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"$TelephoneNumber1", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"$Email", 0, 0, 'L');
// $pdf->Ln();

// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"Pay before: $InvoiceDuration", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"Current remaining credit: $euro$Credit,-", 0, 0, 'L');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"Limit amount: $euro$Limit,-", 0, 0, 'L');
// $pdf->Ln();

// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"Description: $Description", 0, 0, 'R');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"Price: $euro$Price,-", 0, 0, 'R');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"BTW: $BTW%", 0, 0, 'R');
// $pdf->Ln();

// $pdf->SetFont("Arial", "", "12");
// $pdf->Cell(0,5,"________________________________________________________________", 0, 0, 'R');
// $pdf->Ln();

// $pdf->SetFont("Arial", "B", "12");
// $pdf->Cell(0,5,"Amount to pay: $euro$Amount,-", 0, 0, 'R');
// $pdf->Ln();







$pdf->output('invoices/' . $invoice_id . '_Customer-' . $customer_id . '_VLAMBEER.pdf');


	header("location: invoices/" . $invoice_id . "_Customer-" . $customer_id . "_VLAMBEER.pdf")

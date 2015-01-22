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
		$date 			= $pdfinfo->date;

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

$company = "Vlambeer";
$address1 = "Neude 5";
$zipcode1 = "3512 AD, Utrecht";
$email1 = "info@vlambeer.com";
$telephone = "+316-2120-6363";

$btw = (0.21*$item_price);
$price = ($item_price-$btw);
$total = ($btw+$price);

// PDF BESTAND AANMAKEN
class PDF extends FPDF
{
function Header()
{
if(!empty($_FILES["file"]))
  {
$uploaddir = "logo/";
$nm = $_FILES["file"]["name"];
$random = rand(1,99);
move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
$this->Image($uploaddir.$random.$nm,10,10,20);
unlink($uploaddir.$random.$nm);
}
$this->SetFont('Arial','B',12);
$this->Ln(1);
}
function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function ChapterTitle($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}
$euro = iconv('utf-8', 'cp1252', '€');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../assets/img/logo.png');
$pdf->SetFont('Times','',24);
$pdf->SetTextColor(32);
$pdf->Cell(0,0,"Vlambeer",0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Cell(5,5,$company,0,1,'L');
$pdf->Cell(0,5,$address1,0,1,'L');
$pdf->Cell(0,5,$zipcode1,0,1,'L');
$pdf->Cell(0,5,$email1,0,1,'L');
$pdf->Cell(0,5,'Tel: '.$telephone,0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Cell(0,5,$name . " " . $last_name,0,1,'R');
$pdf->Cell(0,5,$address,0,1,'R');
$pdf->Cell(0,5,$zipcode,0,1,'R');
$pdf->Cell(0,5,$email,0,1,'R');
$pdf->Cell(0,30,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
$pdf->ChapterTitle('Invoice Number ',$invoice_id);
$pdf->ChapterTitle('Invoice Date ',$date);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(170,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Price',1,1,'C');
$pdf->Cell(170,7,$product_name,1,0,'L',0);
$pdf->Cell(20,7,$euro . " " . $price,1,1,'C',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'BTW 21%',1,0,'R',0);
$pdf->Cell(20,7,$euro . " " . $btw,1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
$pdf->Cell(20,7,$euro . " " . $total,1,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,"Payment information",0,1,'L');
$pdf->Cell(0,5,"Rabobank",0,1,'L');
$pdf->Cell(0,5,"NL 04 RABO 0197608098",0,1,'L');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'PayPal:',0,1,'L');
$pdf->Cell(0,5,"info@vlambeer.com",0,1,'L');
$pdf->Cell(190,40,"Please pay within 14 days after invoice date",0,0,'C');

$pdf->output('invoices/' . $invoice_id . '_Customer-' . $customer_id . '_VLAMBEER.pdf');
header("location: invoices/" . $invoice_id . "_Customer-" . $customer_id . "_VLAMBEER.pdf");
// $filename="invoice.pdf";
// $pdf->Output($filename,'F');

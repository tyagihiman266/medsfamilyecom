<?php
require('fpdf.php');
require '../include/User.php';
require_once ("../include/DBclass.php");
$order_no=$_REQUEST['cat_id'];

    $user = new User();
// $cartcountpackage=$objU->getResult('select * from order_data where order_no="'.$uid.'" and package_id="'.$_REQUEST['packageid'].'" ');

$cartcountpackage=$user->getResult('select * from order_data where order_no="'.$order_no.'"');
$product_order_data=$user->getResult('select * from product_order_data where order_no="'.$order_no.'"');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'Complete Meds Online',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'203 Woodland Road',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Hinckley, United kingdom, NE101JG',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,date("d/m/Y"),0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$cartcountpackage[0]['billing_fname'].' '.$cartcountpackage[0]['billing_lname'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$cartcountpackage[0]['billing_email'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$cartcountpackage[0]['billing_mobile'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$cartcountpackage[0]['billing_address'].' '.$cartcountpackage[0]['billing_address2'].' '.$cartcountpackage[0]['billing_city'].' '.$cartcountpackage[0]['billing_state'].' '.$cartcountpackage[0]['billing_country'].' '.$cartcountpackage[0]['billing_zip'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
foreach($product_order_data as $value){
$pdf->Cell(130 ,5,$value['product_name'],1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,$value['product_price'],1,1,'R');//end of line
}


//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line
$pdf->Output();
?>
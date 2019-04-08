<?php
error_reporting(0);
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');






//$baseurl="http://www.tailormeup.com/demo/";

   $uid = session_id();
   $user_id = $_SESSION['user_id'];

  
                     if($_REQUEST['orderid'] >0) { 
                     
        $queryorder = "SELECT * FROM order_data where id='".$_REQUEST['orderid']."'";
		$resultorder = $objU->getResult($queryorder); 

    $order_no=$resultorder[0]['order_no'];

		 $country= "SELECT country FROM countries where id='".$resultorder[0]['billing_country'] ."'";
		$resulcountry = $objU->getResult($country); 
		 $state = "SELECT state FROM state where state_id='".$resultorder[0]['billing_state']."'";
		$resultstate = $objU->getResult($state); 
		 $city = "SELECT city FROM city where city_id='".$resultorder[0]['billing_city']."'";
		$resultcity = $objU->getResult($city); 

$cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$uid.'"  ');
           $countcart=count($cartcountpackage);

  
          ?>
            <?php 
          


$to=$resultorder[0]['billing_email'];
$subject="Order receipt from Medsfamily";
$enq_message="Dear User,<br/>";
$enq_message.="Thank you for your purchasing on Medsfamily.<br/>";
$enq_message.="Your order details are below:<br/><br/>";
$enq_message.="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%'><table width='100%' border='0' cellspacing='0'
cellpadding='0'>
      <tr style='background:#f6ebcd;' >
        <td width='25%' height='30'><h3 style='padding-left:15px;'>Product Purchased</h3></td>
         <td width='20%' height='30'><h3 style='padding-left:15px;'>Package</h3></td>
        <td width='20%'><h3 style='padding-left:15px;'>Qty</h3></td>
      
         <td width='22%'><h3 style='padding-left:15px;'>Unit Price(". $_SESSION['currencySymbol'].")</h3></td>
        <td width='23%'><h3 style='padding-left:15px;'>Price (". $_SESSION['currencySymbol'].")</h3></td>
        </tr>
      <tr>
        <td><strong>&nbsp;</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>";
        $grand_total='';
    $subtotal = '';
            foreach($cartcountpackage as $keycart => $valcart) {






               $packagedetail=$objU->getResult("SELECT *, tbl_product.id as pid,tbl_product_package.id as packageid FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id where tbl_product_package.id='".$valcart['package_id']."'");
           
       
                $subtotal += $valcart['quantity']*($_SESSION['currencyConverter']*$packagedetail[0]['price']);
 
		        	$product_id = $packagedetail[0]['pid'];
		        $product_price=$_SESSION['currencyConverter']*$packagedetail[0]['price'];

                      
	 		$product_name =$packagedetail[0]['name'];
	 		//$product_tax_id = $result['product_tax'];
	 		//$result2 = $objU->getResultById('product_tax',$product_tax_id);
	 		//$tax_per = $result2['tax_per'];
	 		$total_tax = 0;
	 	//	$subtotal = ($price*$valcart['quantity'])+$total_tax;
	 	$grand_total += $product_price*$valcart['quantity'];


      $colArrayitem = array(
          'order_no' => $order_no,
           'product_id' => $product_id,
          'package_id' => $packagedetail[0]['packageid'],
          'product_name' => $product_name,
          'product_qty' =>$valcart['quantity'],
           'product_price' => $packagedetail[0]['price'],
           'product_currency_price' => ($_SESSION['currencyConverter']*$packagedetail[0]['price'])
         
          );
          $objU->insertQuery($colArrayitem,'product_order_data');


		        	
		        	//$date = $value['date'];
            $enq_message.="<tr>
        <td><strong>".$product_name."</strong></td>

         <td><strong>".$packagedetail[0]['varient']." ".$packagedetail[0]['varient_unit']. "x ".$packagedetail[0]['no_pills']." pills";

 
					                 


        $enq_message.="    
        </td>
        <td>".$valcart['quantity']."</td>
     
        <td>".$_SESSION['currencySymbol']." ".number_format($product_price,2)."</td>
        <td>".$_SESSION['currencySymbol']." ".number_format($product_price*$valcart['quantity'],2)."</td>
        </tr>";
      }
      $enq_message.=" 
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>Total Amount:</strong></td>
        <td>".$_SESSION['currencySymbol']." ".number_format($grand_total,2)."</td>
        </tr>

  </table></td>
  </tr>
</table>";
	$email_from = 'info@nationproducts.in';
  $headers = 'From: '.$email_from."\r\n".

						'MIME-Version: 1.0' . "\r\n".

						'Content-type: text/html; charset=iso-8859-1' . "\r\n".

						'Reply-To: '.$email_from."\r\n" .

						'X-Mailer: PHP/' . phpversion();


					$mail= @mail($to, $subject, $enq_message, $headers); 
          
      

	}


$objU->QueryUpdateorder("update order_data set shoping_currency='".$_SESSION['current_symbol']."',grand_total='".$_REQUEST['grandtotal']."' where id='".$_REQUEST['orderid']."'");

$cartcountpackagedel=$objU->getResult('select * from cart where user_temp_id="'.$user_id.'"  ');
           $countcartdel=count($cartcountpackagedel);
           if($countcartdel >0) {
 foreach($cartcountpackagedel as $keycartdel => $valcartdel) {
            $tblcart='cart';
            $wherecart="where id='".$valcartdel['id']."'";

            $result = $objU->QueryDeleteWithField($tblcart,$wherecart);
          }
         }
		?>



											
											
               


			

		

		





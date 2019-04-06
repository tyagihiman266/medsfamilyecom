<section class="header-top-main">
<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
$id=$_REQUEST['order_no'];
$resultorder=$objU->getResult("select * from order_data WHERE id='".$id."'");


$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://free.currencyconverterapi.com/api/v5/convert?q=".$resultorder[0]['shoping_currency']."&compact=y");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch); // string
    curl_close($ch);

    $ip_data = json_decode($ip_data_in,true);
   
$currencyConverter= $ip_data[$resultorder[0]['shoping_currency']]['val'];


  $orderid=$resultorder[0]['order_no'];
if(isset($_SESSION['user_id'])){
      $uid = $_SESSION['user_id'] ;
         }else{
      $uid = session_id() ;
        }
  $userdata=$objU->getResult("select * from user_data join addressbook_data on user_data.id=addressbook_data.user_id WHERE user_data.id='".$uid."'");
$statusid=$resultorder[0]['status'];
  

  $Orderstatus=$user->getResult("select * from order_status WHERE id='".$statusid."'");



?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row">
      <div class="col-md-2 my-account-left" style="padding-top: 60px">
              <ul>
                <li class="active"><a href="my-account"><i class="fa fa-user-o"></i> Account Details</a></li>

                <li><a href="my-order"><i class="fa fa-list-ul"></i> My Order</a></li>
                <li><a href="my-wishlist"><i class="fa fa-heart-o"></i> Wishlist</a></li>

              </ul>
            </div>
			<div class="col-md-10 login-padding regis-sec">
				<h3 class="login-sec-top">Order Details</h3>
          <form action="" method="POST" id="signupform" role="form" class="custom-form">
				<div class="login-warp clearfix">
					<div class="col-md-6 col-xs-12 login-sec">
						<h3>Order</h3>
				<table>
					<tr>
					<td><strong>Order Date: </strong></td>
					<td> <?php echo $resultorder[0]['order_date']; ?></td>
					
					</tr>
					<tr>
						<td><strong>Order Status: </strong></td>
						<td><?php echo $Orderstatus[0]['status']; ?></td>
					</tr>
					<tr>
						<td><strong>Placed from IP: </strong></td>
						<td><?php echo $resultorder[0]['system_ip']; ?></td>
					</tr>
				
				</table>
					
					
					</div>
			<div class="col-md-6 col-xs-12">
				<h3>Customer Details</h3>
				<table>
					<tr>
					<td><strong>Customer Name: </strong></td>
					<td> <?php echo $userdata[0]['fname']." ".$userdata[0]['lname']; ?></td>
					
					</tr>
					<tr>
					<td><strong>Customer Mobile No.: </strong></td>	
						<td> <?php echo $userdata[0]['mobile']; ?></td>
					</tr>
					<tr>
					<td><strong>Customer Email: </strong></td>
					
					<td> <?php echo $userdata[0]['email']; ?></td>
					
					</tr>
					
					
					
				</table>
				</div>
				<div class="col-md-6 col-xs-12">
				<h3>Billind Address</h3>
				<div class="v-o-address">
				<p><?php echo $resultorder[0]['billing_fname'].' '.$resultorder[0]['billing_lname']; ?></br>
           <?php echo $resultorder[0]['billing_email']; ?></br>
           <?php echo $resultorder[0]['billing_address']; ?></br>
           <?php echo $resultorder[0]['billing_city'].", ".$resultorder[0]['billing_state'].", ".$resultorder[0]['billing_zip']; ?></br>
           <?php echo "T : ".$resultorder[0]['billing_mobile']; ?></br>
           </span></br>
           </p>	
					
				</div>
				</div>
				<div class="col-md-6 col-xs-12">
				<h3>Shipping Address</h3>
				<div class="v-o-address">
				<p><?php echo $resultorder[0]['shipping_fname'].' '.$resultorder[0]['shipping_lname']; ?></br>
           <?php echo $resultorder[0]['shipping_email']; ?></br>
           <?php echo $resultorder[0]['shipping_address']; ?></br>
           <?php echo $resultorder[0]['shipping_city'].", ".$resultorder[0]['shipping_state'].", ".$resultorder[0]['shipping_zip']; ?></br>
           <?php echo "T : " .$resultorder[0]['shipping_mobile']; ?></br>
           </span></br>
           </p>	
					
				</div>
				</div>
					<div class="col-md-12 col-xs-12" style="margin-top:30px;">
						
					<table class="table">
        
            <tr>
                <th>
Product Name</th>
                <th>Quantity	</th>
                <th>Unit Price</th>
                <th>	Total</th>
            </tr>
        
                   
        
            <?php
         
         
         $sql = "select * from product_order_data where order_no = '".$resultorder[0]['order_no']."'"; 
         $row = $objU->getResult($sql);
          
         $grand_total = '';
         $subtotal='';
         foreach ($row as $value) {

         $packagedetail=$objU->getResult("SELECT * FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id where tbl_product_package.id='".$value['package_id']."'");
               $currencyConverter=1;
                $subtotal += $value['product_qty']*( $value['product_price']*$currencyConverter);
                

          $product_price = $value['product_price']*$currencyConverter;
      $product_id = $value['product_id'];
      $result = $user->getResultById('tbl_product',$product_id);
      $product_name = $result['name'];
      //$product_tax_id = $result['product_tax'];
      //$result2 = $objU->getResultById('product_tax',$product_tax_id);
      //$tax_per = $result2['tax_per'];
     
     
      $grand_total += $product_price*$value['product_qty'];

    $currencydata=array("USD_INR"=>"₹","USD_EUR"=>"€","USD_USD"=>"$","USD_GBP"=>"£" );
                $cuurencysymbol= $currencydata[$resultorder[0]['shoping_currency']];
        //print_r($customrecord);
     ?>
      <tr>
        <td style="padding: 10px"><?php echo $packagedetail[0]['name'];?><br/><?php echo $packagedetail[0]['varient']; ?> <?php echo $packagedetail[0]['varient_unit']; ?> x <?php echo $packagedetail[0]['no_pills']; ?> pills</td>
        
          <td style="padding: 10px"><?php echo $value['product_qty']; ?></td>
        <td style="padding: 10px;"><?php echo $cuurencysymbol; ?> <?php echo number_format($product_price,2); ?></td>
        <td style="padding: 10px"> <?php echo $cuurencysymbol; ?> <?php echo number_format($product_price*$value['product_qty'],2);?></td>
      </tr> 
     <?php
     }
    ?>
              
              
          <tr>
          	<td></td>
          	<td></td>
          	<td>Grand Total</td>
          	<td><?php echo $cuurencysymbol;?> <?php echo number_format($grand_total,2); ?></td>
          	
          </tr>
       
    </table>
	
						
						
						
					</div>
					
					
					<!--<div class="col-md-12 col-xs-12 create-m-b">
						<button class="create-account" type="submit" name="submit">Create an account</button>
					
					</div>-->
					
				</div>
      </form>
			</div>
		</div>
	</div>
</section>



<?php include "include/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script>
$("#signupform").validate({
    rules:{
      firstName: 'required',
      lastName: 'required',
      email:{
        required: true,
        email: true
      },
      password:{
        required: true,
        minlength: 6
      },
      password_confirm : {
                    minlength : 6,
                    equalTo : "#pass"
                }
    },
    messages: {
      firstName: 'This field is required',
      lastName: 'This field is required',       
      email: {
        equired: "Please enter email",
        email: "Please enter email type"
      },
      password: {
        required: "Please enter Current Password",
        minlength: "Please enter atleast 6 Charecter"
      },
      password_confirm:'Password and confirm password should same.'
    }

  });
</script>

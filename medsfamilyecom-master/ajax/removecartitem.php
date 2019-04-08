<?php
@session_start();
error_reporting(0);
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();


   
if($_REQUEST['cartid']) 
                {
if($_REQUEST['action']=='removecart') {

 $row = $objU->QueryDelete('cart',$_REQUEST['cartid']) ;

} else if($_REQUEST['action']=='updatecart')
             {
  
 
    $objU->QueryUpdateorder("update cart set quantity='".$_REQUEST['qty']."' where id='".$_REQUEST['cartid']."'");


             }

?>

				<div class="col-md-7 cart-tbl ">
				<div class="table-responsive">
					<table class="table">
        
            <tr>
                <th>Prodcut</th>
                <th>package</th>
                <th>per price</th>
                  <th>price</th>
                <th>qty</th>
                <th>subtotal</th>
            </tr>
             <?php 
             if(isset($_SESSION['user_id'])){
		  $uid = $_SESSION['user_id'] ;
	       }else{
		  $uid = session_id() ;
	      }
          $cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$uid.'"  ');
           $countcart=count($cartcountpackage);

           if($countcart >0) {
                    ?>
            <?php 
           $subtotal = '';
            foreach($cartcountpackage as $keycart => $valcart) {


               $packagedetail=$objU->getResult("SELECT * FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join
               product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id 
               where tbl_product_package.id='".$valcart['package_id']."'");
                $discounted=$packagedetail[0]['price']-$packagedetail[0]['discount'];
               $subtotal += $valcart['quantity']*($discounted);
             ?>
            <tr>
                <td><div class="p-0-7">
						<a href="products.php"><div class="cart-p-img">
							<img src="images/product.jpg" class="img-responsive" height="100" width="70">
							<p><?php echo $packagedetail[0]['name'];?></p>
						</div></a>
					</div>
               
               </td>
               <td><?php echo $packagedetail[0]['varient']; ?> <?php echo $packagedetail[0]['varient_unit']; ?> x <?php echo $packagedetail[0]['no_pills']; ?> pills</td>
                         <td><?php echo $_SESSION['currencySymbol']; ?><?php echo number_format($packagedetail[0]['per_pill_price'],2); ?> </td>
                <td><?php echo $_SESSION['currencySymbol']; ?><?php $discounted=$packagedetail[0]['price']-$packagedetail[0]['discount'];
                echo number_format($discounted,2); ?></td>
                <td>
                 <div class="quantity">
                                <input type="text" id="quantity<?php echo $valcart['id']; ?>" class="item-quantity" name="quantity" min="1" value="<?php echo $valcart['quantity']; ?>" disabled=""> <span class="qty-wrapper">
                             <span class="qty-inner">
                                <span class="qty-up" title="Increase" data-src="#quantity" onclick="updateqty(<?php echo $valcart['id']; ?>,'up')">
                                  <i class="fa fa-plus"></i>
                                </span> <span class="qty-down" title="Decrease" onclick="updateqty(<?php echo $valcart['id']; ?>,'down')" data-src="#quantity">
                                  <i class="fa fa-minus"></i>
                                </span> </span>
                                </span>
                            </div></td>
                <td class="c-edit"><?php echo $_SESSION['currencySymbol'] ?><?php $pprice=($discounted)*$valcart['quantity'];
                echo number_format($pprice,2);
                     
                 ?>
                <div class="cart-edit">
                	
                
                	<a href="javascript:void(0)" onclick="removecartitem(<?php echo $valcart['id']; ?>)"><img src="images/cross.png"></a>
					
                </div>
                
                </td>
            </tr>
             <?php } } else { ?>
             	<tr>
             		<td colspan="6"><b>No record found</b></td>
             	</tr>
             <?php } ?>


          <tr>
          	<td colspan="4"> <a href="#" class="pull-right btn upadte-btn">Update Cart</a></td>
          </tr>
          
        
    </table>
<div class="cupon">
		 <div class="panel-heading">
                        <label>Apply Discount Code</label>
                        <div class="input-group">
                          
                            <input type="hidden" name="search_param" value="name" id="search_param">
                            <input id="searchText"type="text" class="form-control" name="q" placeholder="Enter Discount-code" id="search_key" value="">
                            <span class="input-group-btn">
                                <a  id="x" class="btn btn-default hide" href="#" title="Clear"><i class="glyphicon glyphicon-remove"></i> </a>
                                <button class="btn btn-info" type="submit">  Apply Discount </button>
                            </span>
                        </div>
                    </div>
			
					
				</div>	
					
				</div>	
				</div>
				<div class="col-md-5">
				<div class="table-responsive summery-wrap">
				<table class="table">
					<tr>
						<td colspan="2" class="border-none summ"><b>Summery</b></td>
						
					</tr>
					<tr>
						<td colspan="2">Estimate Shipping And Text</td>
						
					</tr>
					<tr>
						<td>Sub Total</td>
						<td><?php echo $_SESSION['currencySymbol'] ?><?php echo number_format($subtotal,2); ?></td>
						
					</tr>
					<tr>
						<td class="border-none">Shipping (Flat Rate-Fixed)</td>
						<td class="border-none">0.00</td>
						
					</tr>
					<tr>
						<td><b>Order Total </b></td>
						<td><b><?php echo $_SESSION['currencySymbol'] ?><?php echo number_format($subtotal,2); ?></b></td>
						
					</tr>
					<tr>
						
						<td colspan="2" class="goto-c border-none">

                          <?php   if(isset($_SESSION['user_id'])){ ?>
							<a href="checkout"><span>Go to Checkout</span></a>
						<?php } else { ?>
	           <a href="signincheckout"><span>Go to Checkout</span></a>
							 <?php } ?>


						</td>
						
					</tr>
					
					
					
				</table>	
					
					
					
				</div>	
					
					
				</div>
				
			<?php } ?>

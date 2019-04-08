<section class="header-top-main">
	<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php"
?>
</section>
<!--<section class="clearfix bearcrumb-back">
	<div class="container">
		<div class="row">
			<div class="beardcrumb">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">cart</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>-->
<section class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12 shop-by-alp">
				<div class="s-cart-heading">
					<h3>Shopping Cart </h3>
				</div>
				<div class="col-md-12 p-0">
				<div class="col-md-7 cart-tbl ">
				<div class="table-responsive">
					<table class="table">
        
            <tr>
                <th>iteam</th>
                <th>price</th>
                <th>qty</th>
                <th>subtotal</th>
            </tr>
        
                   
       
            <tr>
                <td><div class="p-0-7">
						<a href="products.php"><div class="cart-p-img">
							<img src="images/cart-img1.png" class="img-responsive">
							<p>Anti Sunspot</p>
						</div></a>
					</div>
               
               </td>
                <td>$24.0</td>
                <td>
                 <div class="quantity">
                                <input type="text" id="quantity" class="item-quantity" name="quantity" min="1" value="1" disabled=""> <span class="qty-wrapper">
                              <span class="qty-inner">
                                <span class="qty-up" title="Increase" data-src="#quantity">
                                  <i class="fa fa-plus"></i>
                                </span> <span class="qty-down" title="Decrease" data-src="#quantity">
                                  <i class="fa fa-minus"></i>
                                </span> </span>
                                </span>
                            </div></td>
                <td class="c-edit">$24.0
                <div class="cart-edit">
                	
                	<a href="#"><img src="images/edit.png"></a>
                	<a href="#"><img src="images/cross.png"></a>
					
                </div>
                
                </td>
            </tr>
                <tr>
                <td><div class="p-0-7">
						<a href="products.php"><div class="cart-p-img">
							<img src="images/cart-img2.png" class="img-responsive">
							<p>Sensodyne pronamel</p>
						</div></a>
					</div>
               
               </td>
                <td>$24.0</td>
                <td>
                 <div class="quantity">
                                <input type="text" id="quantity" class="item-quantity" name="quantity" min="1" value="1" disabled=""> <span class="qty-wrapper">
                              <span class="qty-inner">
                                <span class="qty-up" title="Increase" data-src="#quantity">
                                  <i class="fa fa-plus"></i>
                                </span> <span class="qty-down" title="Decrease" data-src="#quantity">
                                  <i class="fa fa-minus"></i>
                                </span> </span>
                                </span>
                            </div></td>
                <td class="c-edit">$24.0
                <div class="cart-edit">
                	
                	<a href="#"><img src="images/edit.png"></a>
                	<a href="#"><img src="images/cross.png"></a>
					
                </div>
                
                </td>
            </tr>
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
						<td>$35.00</td>
						
					</tr>
					<tr>
						<td class="border-none">Shipping (Flat Rate-Fixed)</td>
						<td class="border-none">$10.00</td>
						
					</tr>
					<tr>
						<td><b>Order Total </b></td>
						<td><b>$10.00</b></td>
						
					</tr>
					<tr>
						
						<td colspan="2" class="goto-c border-none"><a href="#"><span>Go to Checkout</span></a></td>
						
					</tr>
					
					
					
				</table>	
					
					
					
				</div>	
					
					
				</div>
				</div>
			</div>
			
			
		</div>
	</div>
</section>
<?php include "include/footer.php" ?>
<script>
    $(document).ready(function() {
        $('#quantity').prop('disabled', true);
        $(document).on('click', '.qty-up', function() {
            $('#quantity').val(parseInt($('#quantity').val()) + 1);
        });
        $(document).on('click', '.qty-down', function() {
            $('#quantity').val(parseInt($('#quantity').val()) - 1);
            if ($('#quantity').val() == 0) {
                $('#quantity').val(1);
            }
        });
    });
</script>
  

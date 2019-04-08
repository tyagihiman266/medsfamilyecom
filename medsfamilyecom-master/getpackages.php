<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if($_REQUEST['companyid'])
                {



$productsingle=$objU->getResult('select * from tbl_product where id="'.$_REQUEST['pid'].'"');
             
              

?>

          <div role="tabpanel" class="f-tab clearfix">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <?php 
                 $productsinglevarient=$objU->getResult('select * from product_varient where product_id="'.$_REQUEST['pid'].'" order by varient asc ');
                  $i=0;
                 foreach($productsinglevarient as $varientkey => $varientval) {

                ?>
              <li role="presentation"  <?php if($i==0) { ?>class="active"<?php } ?>>
                <a href="#varient<?php echo $varientval['id']; ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $productsingle[0]['name'] ?> <?php echo $varientval['varient']; ?> <?php echo $varientval['varient_unit']; ?> </a>
              </li>
            <?php $i++;
          } ?>
              
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">

                         <?php  
                            $j=0;
                         foreach($productsinglevarient as $varientkey => $varientval) { 

                        $productsinglepackage=$objU->getResult('select * from tbl_product_package where product_id="'.$varientval['product_id'].'" and varient_id="'.$varientval['id'].'" and company_id="'.$_REQUEST['companyid'].'" order by no_pills asc');

                        if(count($productsinglepackage) >0) {

                          ?>

              <div role="tabpanel" class="tab-pane <?php if($j==0) { ?>active<?php } ?>" id="varient<?php echo $varientval['id']; ?>">
                <div class="col-md-12 p-0 mp-0>">
                  <div><img src="./TBXadmin/upload/product/varient/big/<?php echo $varientval['varient_img']; ?>"></div>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Package</th>
                        <th>Per Pills</th>
                        <th>Price</th>
                        <th>Savings</th>
                        <th>Bonus</th>
                        <th>order</th>
                      </tr>


                      <?php 
        
                         
                     

                      foreach($productsinglepackage as $keypackage => $valpackage)
                      {
                      ?>
                      <tr>
                        <td><?php echo $varientval['varient']; ?> <?php echo $varientval['varient_unit']; ?> x <?php echo $valpackage['no_pills']; ?> pills</td>
                        <td><?php echo $_SESSION['currencySymbol']; ?><?php echo number_format($_SESSION['currencyConverter']*$valpackage['per_pill_price'],2); ?> </td>
                        <td><?php echo $_SESSION['currencySymbol']; ?><?php echo number_format($_SESSION['currencyConverter']*$valpackage['price'],2); ?></td>
                        <td><?php $pprice=$valpackage['no_pills']*$valpackage['per_pill_price'];

                            $saving=$pprice-$valpackage['price'];
                            if($saving <0) {
                              $saving=0;
                            } else {
                           $saving=$saving;

                          }
                          echo $_SESSION['currencySymbol'].$saving;
                         /* echo $discountmout=number_format(($valpackage['price']*$valpackage['discount'])/100,2);  */?></td>
                        <td>+<?php echo $valpackage['bonus']; ?></td>
                        <td>
                            <?php if(isset($_SESSION['user_id'])){
                 $uid = $_SESSION['user_id'] ;
                 }else{
                 $uid = session_id() ;
                 }

                 $cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$uid.'" and package_id="'.$valpackage['id'].'" ');
                 //print_r($cartcountpackage);

                $numcartpackage=count($cartcountpackage);

                if($numcartpackage==0) {
        ?>

                          <div class="addcart_<?php echo $valpackage['id']; ?>"><?php if($valpackage['qty']>0)  {?><a href="javascript:void(0)" onclick="addcart(<?php echo $valpackage['id']; ?>,1)" class="tab-add-to-cart"><img src="images/shopping-cart.png"> <span>Add to Cart</span></a> <?php } else {  ?><img src="images/outofstock.jpeg" width="50" height="30">  <?php } ?> </div> <div class="cartloader_<?php echo $valpackage['id']; ?>" style="display: none;"><img src="images/loader.gif" height="100" width="100"></div><div class="removecart_<?php echo $valpackage['id']; ?>" style="display: none;"><a  href="javascript:void(0)" onclick="removecart(<?php echo $valpackage['id']; ?>,<?php echo $valpackage['product_id']; ?>,<?php echo $valpackage['company_id']; ?>);">Remove cart</a></div>
                        <?php } else { ?>
                          <div class="removecart_<?php echo $valpackage['id']; ?>" ><a href="javascript:void(0)" onclick="removecart(<?php echo $valpackage['id']; ?>,<?php echo $valpackage['product_id']; ?>,<?php echo $valpackage['company_id']; ?>)">Remove cart</a></div>
                        <?php } ?>

                        </td>
                      </tr>

                    <?php } ?>
                    
                      
                    </table>
                  </div>
                </div>
              </div>
                             <?php } $j ++ ;} ?>

             
            </div>
          </div>
        

        <?php } ?>
<section class="header-top-main">
	<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
//print_r($_SESSION);
    $userid = $_SESSION['user_id'] ;
     $uid = session_id() ;
     
            $cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$userid.'"  ');
          $countcart=count($cartcountpackage);
      // print_r($cartcountpackage);
           if($countcart==0) {
           	header('location:signup');

           	}

           	$userdata=$objU->getResult('select * from user_data where id="'.$userid.'"  ');
            // print_r($userdata);

     $queryorder = "SELECT * FROM order_data where id='".$_SESSION['order_id']."'";
		$resultorder = $objU->getResult($queryorder); 


?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row checkout-main">
			<input type="hidden" name="order_idmain" id="orderid">
			<div class="col-md-12 login-padding regis-sec checkout-top">
				<div role="tabpanel" class="f-tab">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs checkout-t" role="tablist">
						<li role="presentation" class="active">
							<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Shipping</a>
							<span>1</span>
						</li>
						<li role="presentation">
							<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Review & Payments</a>
							<span>2</span>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							<div class="login-warp clearfix">
								<div class="col-md-7 login-sec pl-0">
									<div class="sbb text-light-green">
										<h3>shipping details</h3>
									</div>
									<form action="" id="frmcheckout" method="POST" role="form" class="custom-form">
										<div class="form-group">
											<label for="">Email Address <span class="color-red">*</span></label>
											<input type="email" class="form-control" name="billing_email" id="" placeholder="" value="<?php 
											if(isset($userdata) && !empty($userdata)){
											echo $userdata[0]['email'];
											}else{
											echo $resultorder[0]['billing_email'];
											} ?>" required>
										</div>
										<div class="form-group">
											<label for="">First Name <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="billing_fname" name="billing_fname" placeholder="" value="<?php 
												if(isset($userdata) && !empty($userdata)){
											echo $userdata[0]['fname'];
											}else{
											echo $resultorder[0]['billing_fname'];
											}
											 ?>" required>
										</div>
										<div class="form-group">
											<label for="">Last Name <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="billing_lname" name="billing_lname" placeholder="" required value="<?php 
												if(isset($userdata) && !empty($userdata)){
											echo $userdata[0]['lname'];
											}else{
										echo $resultorder[0]['billing_lname'];
											}
											 ?>" >
										</div>
										<!--<div class="form-group">
											<label for="">Company <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" name="billing_lname" placeholder="" required>
										</div> -->
										<div class="form-group">
											<label for="">Street Address <span class="color-red">*</span></label>
											<input type="text" name="billing_address1" class="form-control" id="billing_address1" placeholder="" required value="<?php echo $resultorder[0]['billing_address'] ?>" >
											<p></p>
											<input type="text" name="billing_address2"  class="form-control" id="billing_address2" placeholder="" required  value="<?php echo $resultorder[0]['billing_address2'] ?>">
										</div>
										<div class="form-group custom-select">
											<label for="">country <span class="color-red">*</span></label>
											
											  <select name="billing_country" class="form-control" id="country">
                                          <?php   
                                            $query = "Select * from countries";
                                            $queryCn = $objU->getResult($query);
                                              foreach ($queryCn as $value) {
                                            ?>  
                                            <option value="<?php echo $value['id'];?>" <?php if($resultorder[0]['billing_country']==$value['id']) { ?>selected <?php } ?> ><?php echo $value['country'];?></option>              
                                            <?php }
                                          ?>                                   
                                   </select>
                                   <i class="fa fa-angle-down" aria-hidden="true"></i>
										</div>
										<div class="form-group custom-select">
											<label for="">State/proviance<span class="color-red">*</span></label>
											 <select name="billing_state" class="form-control" id="state">
                                      <option value="">Select State</option>                                       
                                   </select>
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</div>

											<div class="form-group custom-select">
											<label for="">City<span class="color-red">*</span></label>
											<!-- <select name="billing_city" class="form-control" id="city">
                                      <option value="">Select City</option>                                       
                                   </select>	<i class="fa fa-angle-down" aria-hidden="true"></i>-->
                           			<input type="text" name="billing_city" class="form-control"  placeholder="City" required  value="">
						
										
										</div>
										<div class="form-group">
											<label for="">Zip/Postal Code <span class="color-red">*</span></label>
											<input type="text" name="billing_zip" class="form-control" id="billing_zip" placeholder="" required  value="<?php echo $resultorder[0]['billing_zip'] ?>">
										</div>
									
										<div class="form-group">
											<label for="">Phone Number <span class="color-red">*</span></label>
											<input type="text" name="billing_mobile" class="form-control" id="billing_mobile" placeholder="" required value="<?php echo $resultorder[0]['billing_mobile'] ?>">
										</div>
									

                                    <!--
									<div class="col-md-12 p-0">
										<div class="sbb text-light-green">
											<h3>shipping Medhod</h3>
										</div>
										<div class="table-responsive">
											<table class="table">
												<tr>
													<th class="border-none">Select Method</th>
													<th class="border-none">Price</th>
													<th class="border-none">Method Title</th>
													<th class="border-none">Career Title</th>
												</tr>
												<tr>
													<td class="border-none">
														<div class="form-group">
															<input type="radio" name="selet-one">
														</div>
													</td>
													<td class="border-none">$5.00</td>
													<td class="border-none">Fixed</td>
													<td class="border-none">Flat Rate</td>
												</tr>
											</table>
										</div>
									</div>

									 -->
									<div class="col-md-12 p-0">
										<div class="sbb text-light-green">
											<h3>Acknowledgements</h3>
										</div>
										
											<table class="table">
												<tr>
													<td class="custom-check border-none">
														<ul>
															<li>
																<div class="checkbox new-check">
																	<input id="acknowledge" name="acknowledge" type="checkbox">
																	<label for="acknowledge"> </label>
																</div>
															</li>
														</ul>
													</td>
													<td class="border-none">
														<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,</p>
													</td>
												</tr>
											</table>
										
									</div>

								</form>
									<div class="col-md-12 p-0">
										<div class="col-md-3">
										   
										    	<a  onclick="addorder()" class="create-account1 btn btn-success" >continue</a>
										<!--	<a href="javascript:void(0)" class="create-account1" >continue</a>
								<a href="#myModal" class="create-account precfile" data-toggle="modal" data-target="#myModal" style="visibility: hidden;">continue</a>-->
										</div>
										<div class="col-md-3">
											<!--<a href="#" class="create-account">Contineu</a>-->
										</div>
										<div class="col-md-6">
										</div>
									</div>
								</div>
								<div class="col-md-5 create-acc-sec">
									<div class="table-responsive summery-wrap">
										<table class="table">
											<tr>
												<td colspan="3" class="border-none summ"><b>Order Summery</b></td>
											</tr>
											<tr>
												<td colspan="3" class="border-none"><?php echo $countcart; ?> Item In Cart</td>
											</tr>


                                          <?php 
                                        

                                       $subtotal = '';
                                          foreach($cartcountpackage as $keycheckout => $keycheckouval) {

                                          	 $packagedetail=$objU->getResult("SELECT * FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id where tbl_product_package.id='".$keycheckouval['package_id']."'");


                                              $subtotal += $keycheckouval['quantity']*$packagedetail[0]['price'];

                                          	?>
                                          
											<tr>
												<td width="10%"><img src="images/product.jpg" height="50" width="30"></td>
												<td>
													<p><?php echo $packagedetail['name']; ?></p>
													<font>Qty:<?php echo $keycheckouval['quantity']; ?></font>
												</td>
												<td><?php echo $_SESSION['currency_symbol']; ?><?php echo $packagedetail[0]['price']; ?></td>
											</tr>
                                           <?php } ?>

										<input type="hidden" id="grandtotal" value="<?php echo $subtotal;?>">
											<tr>
												<td colspan="3"></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					<div role="tabpanel" class="tab-pane" id="tab">
							<div class="login-warp clearfix">
								<div class="col-md-7 login-sec pl-0">
									<div class="sbb text-light-green">
										<h3>Payment Method</h3>
									</div>
									<div class="col-md-12 p-0 check-2 clearfix">
										<p>Check / My Order</p>
										<!--<table class="table">
											<tr>
												<td class="custom-check border-none">
													<ul>
														<li>
															<div class="checkbox new-check">
																<input id="checkbox1" type="checkbox">
																<label for="checkbox1">My billing and shipping address are the same </label>
															</div>
														</li>
													</ul>
												</td>
											</tr>
										</table> -->

                 

										<div class="col-md-12 addr p-0" id="getbilling">

										</div>
								
									</div>
									<div class="col-md-12 border-bottom padd-btm clearfix p-0">
										<div class="col-md-6 p-0">
											<a href="#" class="create-account backtosh">Back to shipping</a>
										</div>
										<div class="col-md-6 p-0">
											<div class="pull-right">
												<a href="javascript:void(0)" id="placeorder" class="create-account" >Place Order</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 create-acc-sec">
									<div class="table-responsive summery-wrap">
										<table class="table">
											<tr>
												<td colspan="3" class="border-none summ"><b>Order Summery</b></td>
											</tr>
											<tr>
												<td colspan="2">Cart Sub Total</td>
												<td><?php echo $_SESSION['currency_symbol']; ?><?php echo number_format($subtotal,2); ?></td>
											</tr>
											<!--<tr>
												<td class="border-none" colspan="2">Shipping (Flat Rate-Fixed)</td>
												<td class="border-none">$10.00</td>
											</tr> -->
											<tr>
												<td class="2" colspan="2"><b>Order Total </b></td>
												<td><b><?php echo $_SESSION['currency_symbol']; ?><?php echo number_format($subtotal,2); ?></b></td>
											</tr>
											<tr>
												<td colspan="3" class="border-none"><?php echo $countcart; ?> Item In Cart</td>
											</tr>


                                          <?php 
                                        

                                       $subtotal1 = '';
                                          foreach($cartcountpackage as $keycheckout => $keycheckouval) {

                                          	 $packagedetail=$objU->getResult("SELECT * FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id where tbl_product_package.id='".$keycheckouval['package_id']."'");


                                              $subtotal1 += $keycheckouval['quantity']*$packagedetail[0]['price'];

                                          	?>
                                          
											<tr>
												<td width="10%"><img src="images/product.jpg" height="50" width="30"></td>
												<td>
													<p><?php echo $packagedetail['name']; ?></p>
													<font>Qty:<?php echo $keycheckouval['quantity']; ?></font>
												</td>
												<td><?php echo $_SESSION['currency_symbol']; ?><?php echo $packagedetail[0]['price']; ?></td>
											</tr>
                                           <?php } ?>

										
											<tr>
												<td colspan="3"></td>
											</tr>
										</table>
									</div>
									<!--
									<div class="col-md-12 ship-t p-0">
										<div class="sbb text-light-green">
											<h3>Ship to <a href="#" class="pull-right"><img src="images/edit.png" width="17px"></a></h3>
										</div>
										<p>
											Aditya Kumar<br>
											k-185 lajpat nagar part-1<br>
											delhi alaska 110045<br>
											india<br>
											00000000000
										</p>
									</div> -->
									<div class="col-md-12 p-0">
										<div class="sbb text-light-green">
											<h3>Shipping Method <a href="#" class="pull-right"><img src="images/edit.png" width="17px"></a></h3>
										</div>
										<p>
											Flat rate-fixed
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "include/footer.php" ?>
<!-- Local bootstrap CSS & JS -->
<!-- Local bootstrap CSS & JS -->

	<div id="myModal" class="modal fade in new-model">
        <div class="modal-dialog">
        	<form name="frmmodal" id="frmmodal" method="POST" role="form" enctype="multipart/form-data">
            <div class="modal-content">
 
                <div class="modal-header">
                    <a class="btn pull-right" onclick="closemodal()"><span class="glyphicon glyphicon-remove"></span></a>
                   
                </div>
                <div class="modal-body clearfix">
                 <div class="col-md-12 buton-m load-m-o-r-e text-center" id="addprecpcont">
				<a href="javascript:void(0)" id="addprecp">+ Add Prescription</a>
			</div> 
                   <div class="col-md-12 buton-m load-m-o-r-e text-center" id="precloader" style="display:none;">
				<img src="images/loader.gif">
			</div> 
			
				  <div class="col-md-12 buton-m load-m-o-r-e text-center" id="showprecp" style="display:none;">
				<input type="file" name="Prescription_file" id="Prescription_file">
			</div> 

			
			<div class="col-md-12 button-m load-m-o-r-e text-center">
				<a href="javascript:void(0)" class="save">Send Later</a>
			</div>
                  
                </div>
                <div class="modal-footer">
                  
                </div>
 
            </div><!-- /.modal-content -->
        </form>
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->



<input type="hidden" value="<?php if(!empty($resultorder[0]['billing_country'])){
    echo  $resultorder[0]['billing_country'];
    }else{
    echo 1;
    }?>" id="finalcountry"> 
  



<script>
    var $tabs = $('.checkout-t li');
    $('.create-account').on('click', function() {
        $tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
        $tabs.filter('.active').prev('li').addClass('active-warning');
    }); 
    $('.contineu-s').on('click', function() {
        $tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
        $tabs.filter('.active').next('li').addClass('active-warning');
    });

/////
var country=$("#finalcountry").val();
$.ajax({
    type: "post",
    url: "ajax/getstate.php",
    data: {"country_id":country},
    success: function(result){
     $("#state").html(result);
   
}});
/////

     $(document).on('change','#country',function(){

      var country=$('#country').val();
     $.ajax({
            type: "post",
            url: "ajax/getstate.php",
            data: {"country_id":country},
            success: function(result){
             $("#state").html(result);
           
        }});


    });


      $(document).on('change','#state',function(){

      var state=$('#state').val();
     $.ajax({
            type: "post",
            url: "ajax/getcity.php",
            data: {"state_id":state},
            success: function(result){
             $("#city").html(result);
           
        }

    });


    });


      $(document).on('click','#addprecp',function(){

         $('#showprecp').show();
          $('#addprecpcont').hide();
});


      function savecontent(){

     

     }






 
function addorder(){
//alert("hi");
 var billfname=$('#billing_fname').val();
    var billlname=$('#billing_lname').val();
     var billlemail=$('#billing_email').val();
      var billladdress1=$('#billing_address1').val();
       var billladdress2=$('#billing_address2').val();
       var country=$('#country').val();
       var state=$('#state').val();
       var city=$('#city').val();
       var postcode=$('#billing_zip').val();
        var mobile=$('#billing_mobile').val();


        if($('#acknowledge:checked').length==0) {

        //  alert('Please Acknowledge');
          return false;

        }

        if(billfname=='' || billlname=='' || billlemail=='' || billladdress1=='' || country=='' ||  state=='' || city=='' || postcode==''  || mobile=='' ) {
           //  alert('Please Fill all required fields.');
          return false;


        } else {
        //alert("else");
        /*document.getElementById('myModal').style.visibility = "visible";
		document.getElementById('myModal').style.display='block';
*/
	$('#myModal').modal('show');

    $('#precloader').show();
   
    $.ajax({
    type : 'POST',
    url : 'ajax/add_order.php',
    data : $('#frmcheckout').serialize(),
    success: function(result){
    $('#orderid').val(result);
    //var orderid=result;
    // $("#city").html(result);
    
    }
    });
      $('#precloader').hide();
//	getallbillingdetail();

        }




/*	*/
}


        function getallbillingdetail(){
        
            var orderid=$('#orderid').val();
           // alert(orderid);
            $.ajax({
            type : 'POST',
            url : 'ajax/get_order.php',
            data : {"orderid":orderid} ,
            success: function(result){
            //alert(result);
            $("#getbilling").html(result);
             $("#home").css("display","none");
              $("#tab").css("display","block");
        $tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
        $tabs.filter('.active').prev('li').addClass('active-warning');
            }
            });
        }
        
function closemodal(){
	$('#myModal').modal('hide');
    getallbillingdetail();
}
       	//savecontent();
 $(document).on('change','#Prescription_file',function(){
       uplaodfile($('#orderid').val());
     
});

       function uplaodfile(orderid){
        //alert(orderid);
       // $('#precloader').hide();
    var file_data = $('#Prescription_file').prop('files')[0];   
    var form_data = new FormData();   
    form_data.append('orderid', orderid);               
    form_data.append('file', file_data);
     
    
       $.ajax({
url: "ajax/ajax_prescription_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{

	$('#myModal').modal('hide');


	getallbillingdetail();
//$('#loading').hide();
//$("#message").html(data);
}
})

       }


</script>


<script>

	$(document).on('click','.create-account1',function(){
     
   var billfname=$('#billing_fname').val();
    var billlname=$('#billing_lname').val();
     var billlemail=$('#billing_email').val();
      var billladdress1=$('#billing_address1').val();
       var billladdress2=$('#billing_address2').val();
       var country=$('#country').val();
       var state=$('#state').val();
       var city=$('#city').val();
       var postcode=$('#billing_zip').val();
        var mobile=$('#billing_mobile').val();


        if($('#acknowledge:checked').length==0) {

          alert('Please Acknowledge');
          return false;

        }

        if(billfname=='' || billlname=='' || billlemail=='' || billladdress1=='' || country=='' ||  state=='' || city=='' || postcode==''  || mobile=='' ) {
 alert('Please Fill all require filed');
          return false;


        } else {



$( ".precfile" ).trigger( "click" );
 <?php
if($resultorder[0]['prescription_file']!='')
{
	?>
	  var orderid=$('#orderid').val();

getallbillingdetail();
$('#myModal').modal('hide');
<?php } ?>

        }

       
  }); 



  $(document).on('click','#placeorder',function(){
   var orderid=$('#orderid').val();
     var grandtotal=$('#grandtotal').val();
      $.ajax({
    type : 'POST',
    url : 'ajax/send_order_email.php',
    data : {"orderid":orderid,"grandtotal":grandtotal} ,
     success: function(result){
     //	alert(result);
     	window.location.href='thankyou';
         //  $("#getbilling").html(result);
           
        }
})


  });



</script>
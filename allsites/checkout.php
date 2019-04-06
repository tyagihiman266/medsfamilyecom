<section class="header-top-main">
	<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php"
?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row checkout-main">
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
									<form action="" method="POST" role="form" class="custom-form">
										<div class="form-group">
											<label for="">Email Address <span class="color-red">*</span></label>
											<input type="email" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group">
											<label for="">First Name <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group">
											<label for="">Last Name <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group">
											<label for="">Company <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group">
											<label for="">Street Address <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
											<p></p>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group">
											<label for="">City <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group custom-select">
											<label for="">State/proviance<span class="color-red">*</span></label>
											<select class="form-control">
												<option>
													Please Select a region,State or Provience
												</option>
												<option>
													Please Select a region,State or Provience
												</option>
												<option>
													Please Select a region,State or Provience
												</option>
												<option>
													Please Select a region,State or Provience
												</option>
											</select>
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</div>
										<div class="form-group">
											<label for="">Zip/Postal Code <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
										<div class="form-group custom-select">
											<label for="">Country<span class="color-red">*</span></label>
											<select class="form-control">
												<option>
													India
												</option>
												<option>
													United State
												</option>
												<option>
													Please Select a
												</option>
												<option>
													Please Select a
												</option>
											</select>
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</div>
										<div class="form-group">
											<label for="">Phone Number <span class="color-red">*</span></label>
											<input type="text" class="form-control" id="" placeholder="" required>
										</div>
									</form>
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
									<div class="col-md-12 p-0">
										<div class="sbb text-light-green">
											<h3>Acknowledgements</h3>
										</div>
										<div class="table-responsive">
											<table class="table">
												<tr>
													<td class="custom-check border-none">
														<ul>
															<li>
																<div class="checkbox new-check">
																	<input id="checkbox9" type="checkbox">
																	<label for="checkbox9"> </label>
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
									</div>
									<div class="col-md-12 p-0">
										<div class="col-md-3">
								<a href="#myModal" class="create-account" data-toggle="modal" data-target="#myModal">Contineu</a>
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
												<td colspan="3" class="border-none">2 Item In Cart</td>
											</tr>
											<tr>
												<td width="10%"><img src="images/checkout.png"></td>
												<td>
													<p>antisunsopt</p>
													<font>Qty:1</font>
												</td>
												<td>$24.00</td>
											</tr>
											<tr>
												<td width="10%"><img src="images/checkout.png"></td>
												<td>
													<p>antisunsopt</p>
													<font>Qty:1</font>
												</td>
												<td class="">$34.00</td>
											</tr>
											<tr>
												<td colspan="3"></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab">
							
							
							
							
							
							
							
							
							
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
            <div class="modal-content">
 
                <div class="modal-header">
                    <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                   
                </div>
                <div class="modal-body clearfix">
                 <div class="col-md-12 buton-m load-m-o-r-e text-center">
				<a href="javascript:void(0)">+ Add Prescription</a>
			</div> 
			<div class="col-md-12 button-m load-m-o-r-e text-center">
				<a href="javascript:void(0)">Send Later</a>
			</div>
                  
                </div>
                <div class="modal-footer">
                  
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->






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
</script>
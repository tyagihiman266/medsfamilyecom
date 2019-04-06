<section class="header-top-main">
	<?php 
	session_start();
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
if(isset($_SESSION['user_id'])){
		  $user_id = $_SESSION['user_id'] ;
	       }else{
		  $user_id = session_id() ;
	      }
  $query1 = "SELECT * FROM order_data where user_id='".$user_id."' order by id desc";
    $result1 = $objU->getResult($query1);
   

    $row1 = count($result1);
?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row">
			<section class="my-account">
				<div class="container">
					<div class="row">

						<div class="col-md-12" style="border-bottom: 1px solid #ccc;
    margin-bottom: 20px;">
							<h3>My Account</h3>

						</div>


						<?php include('accout-leftsidebar.php'); ?>
						<div class="col-md-10 my-account-right">
							<div class="col-md-12 pr-0">

								<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<div class="row">
										<div class="col-sm-6">
											<div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="form-control input-sm">
														<option value="10">10</option>
														<option value="25">25</option>
														<option value="50">50</option>
														<option value="100">100</option>
													</select> entries</label></div>
										</div>
										<div class="col-sm-6">
											<div id="example_filter" class="dataTables_filter pull-right"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example"></label></div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table id="example" class="table table-striped table-bordered dataTable no-footer" style="width:100%" role="grid" aria-describedby="example_info">
												<thead>
													<tr role="row">
														<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order Date: activate to sort column descending" style="width: 159px;">Order Date</th>
														<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order No: activate to sort column ascending" style="width: 138px;">Order No</th>
														<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Total Amount: activate to sort column ascending" style="width: 181px;">Total Amount</th>
														<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 102px;">Status</th>
														<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Option: activate to sort column ascending" style="width: 169px;">Option</th>
													</tr>
												</thead>
												<tbody>
                                                   
 								<?php
 								
 								$currencydata=array("USD_INR"=>"₹","USD_EUR"=>"€","USD_USD"=>"$","USD_GBP"=>"£" );
 								$cuurencysymbol= $currencydata[$result1[0]['shoping_currency']];
        					if($row1>0) {
           					 $total_price = '';
            			foreach ($result1 as $value) {
               $order_no = $value['order_no'];
               $query2 = "SELECT sum(product_price) as product_price from product_order_data where order_no='".$order_no."'";
               $result2 = $objU->getResult($query2);

               $order_date = $value['order_date'];
               $order_no = $value['order_no'];
               $product_price = $result2[0]['product_price'];
               $status = $value['status'];
               $total_price += $product_price;
               ?>
                <tr class="odd">
                    <td><?php echo $order_date; ?></td>
                    <td><?php echo $order_no; ?></td>
                    <td><?php echo $cuurencysymbol; ?><?php echo number_format($total_price,2); ?></td>
                    <td><?php echo $status; ?></td>
                    <td><a href="view-order?order_no=<?php echo $value['id']; ?>" class="btn btn-info">View Detail</a></td>
                   
                </tr>
               <?php
            }
        }
    ?>
												</tbody>
											</table>
										</div>
									</div>
									<!--
									<div class="row">
										<div class="col-sm-5">
											<div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 75 entries</div>
										</div>
										<div class="col-sm-7">
											<div class="dataTables_paginate paging_simple_numbers pull-right" id="example_paginate">
												<ul class="pagination">
													<li class="paginate_button previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0">Previous</a></li>
													<li class="paginate_button active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0">1</a></li>
													<li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0">2</a></li>
													<li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0">3</a></li>
													<li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0">4</a></li>
													<li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0">5</a></li>
													<li class="paginate_button disabled" id="example_ellipsis"><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0">…</a></li>
													<li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0">8</a></li>
													<li class="paginate_button next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="8" tabindex="0">Next</a></li>

												</ul>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


		</div>
	</div>
</section>
<?php include "include/footer.php" ?>

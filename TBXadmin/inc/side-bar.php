<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
			
				<img src="<?php echo $admin['photo'];?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
				<p><?php echo $admin['name']; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li  class="treeview <?php  if($side=='dashboard'){ ?> active <?php } ?>">
				<a href="dashboard">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span> 
				</a>
            </li>
						<li  class="treeview <?php  if($side=='dashboard'){ ?> active <?php } ?>">
				<a href="manufacturer.php">
					<i class="fa fa-dashboard"></i>
					<span>Manufacturer List</span> 
				</a>
            </li>
            <li class="treeview <?php  if($side=='banner'){ ?> active <?php } ?>">
              <a href="javascript:void(0)">
                <i class="fa fa-edit"></i> <span>Manage Website Slider/Banner</span> 
              </a>			  </li>
			  
			   <li class="treeview <?php  if($side=='website-page'){ ?> active <?php } ?>">
              <a href="javascript:void(0)">
                <i class="fa fa-edit"></i> <span>Manage Website Pages</span>
               </a>
            </li>
            <?php /*
                <li class="treeview <?php  if($side=='catalog'){ ?> active <?php } ?>">
          <a href="">
            <i class="fa fa-edit"></i> <span>Catalog
            </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <!--
            <li class="<?php  if($p1side=='attribute-list'){ ?> active <?php } ?>" ><a href="attribute_list.php"><i class="fa fa-circle-o"></i> Attribute List</a></li>
            <li class="<?php  if($p1side=='attribute-set'){ ?> active <?php } ?>" ><a href="attribute_set.php"><i class="fa fa-circle-o"></i> Attribute Set</a></li>
       <!--<li class="<?php  if($p1side=='auction'){ ?> active <?php } ?>"><a href="#"><i class="fa fa-circle-o"></i> Auction Product</a></li> -->
           

          </ul>
        </li> */?>
        <li class="treeview <?php  if($side=='customer'){ ?> active <?php } ?>">    
			<a href="#">            <i class="fa fa-user"></i> <span>Customer</span>            <span class="pull-right-container">              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>          <ul class="treeview-menu">            <li class="<?php  if($side=='customer'){ ?> active <?php } ?>"><a href="user_list"><i class="fa fa-circle-o"></i>Manage Customer</a></li>            <li><a class="<?php  if($side=='customer'){ ?> active <?php } ?>" href="add_user"><i class="fa fa-circle-o"></i> Add Customer</a></li>          </ul>        </li>

			


            <li  class="treeview <?php  if($side=='manage_category'){ ?> active <?php } ?>">
				<a href="manage_category">
					<i class="fa fa-dashboard"></i>
					<span>Manage Category</span> 
				</a>
            </li>
			
			<li  class="treeview <?php  if($side=='manage_product_salt'){ ?> active <?php } ?>">
				<a href="manage_product_salt">
					<i class="fa fa-dashboard"></i>
					<span>Manage Product Salt</span> 
				</a>
            </li>
        <li  class="treeview <?php  if($side=='view_product'){ ?> active <?php } ?>">
				<a href="view_product">
					<i class="fa fa-dashboard"></i>
					<span>Manage Product</span> 
				</a>
            </li>


              <li  class="treeview <?php  if($side=='manage_order'){ ?> active <?php } ?>">
				<a href="manage_order">
					<i class="fa fa-dashboard"></i>
					<span>Manage Order</span> 
				</a>
            </li>

			<li  class="treeview <?php  if($side=='manage_number'){ ?> active <?php } ?>">
				<a href="manage_number">
					<i class="fa fa-dashboard"></i>
					<span>Manage Number</span> 

					
				</a>
            </li>

			<li  class="treeview <?php  if($side=='add_product_image'){ ?> active <?php } ?>">
				<a href="add_product_image">
					<i class="fa fa-dashboard"></i>
					<span>Add Product Image</span> 

					
				</a>
            </li>

			<li  class="treeview <?php  if($side=='add_product_packaging_image'){ ?> active <?php } ?>">
				<a href="add_product_packaging_image">
					<i class="fa fa-dashboard"></i>
					<span>Add Product Packaging Image</span> 

					
				</a>
            </li>

            
            <?php /*<li  class="treeview <?php  if($side=='manage_shipping_country'){ ?> active <?php } ?>">
				<a href="manage_shipping_country.php">
					<i class="fa fa-dashboard"></i>
					<span>Manage Shipping Price</span> 
				</a>
            </li> 
            <!--<li  class="treeview <?php  if($side=='manage_product'){ ?> active <?php } ?>">
				<a href="manage_category.php">
					<i class="fa fa-dashboard"></i>
					<span>Manage Category</span> 
				</a>
            </li>-->
            <li class="<?php  if($side=='edit_profile'){ ?> active <?php } ?> treeview">
				<a href="manage_color.php">
					<i class="fa fa-edit"></i> <span>Manage Color</span>
				</a>
			</li>
			  <li class="<?php  if($side=='edit_profile'){ ?> active <?php } ?> treeview">
				<a href="manage_tag.php">
					<i class="fa fa-edit"></i> <span>Manage tag</span>
				</a>
			</li>
			*/?>
            
			
		<li class="<?php  if($p1side=='sales'){ ?> active <?php } ?> treeview">			
			<a href="#">    <i class="fa fa-user"></i> <span>Sales</span>            <span class="pull-right-container">              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>		  		 
			<ul class="treeview-menu">           
			<li class="<?php  if($side=='order'){ ?> active <?php } ?>">		
			<a href="manage_order">         
			<i class="fa fa-credit-card"></i> <span>Order</span>          
			</a></li>           
			<li class="<?php  if($side=='shipping'){ ?> active <?php } ?>">		
			<a  href="manage_shipping"><i class="fa fa-circle-o"></i> Shipping Method</a>		
			</li>	
			<li class="<?php  if($side=='coupon'){ ?> active <?php } ?>">		
			<a  href="manage_coupon"><i class="fa fa-circle-o"></i> Coupon</a>		
			</li>	
			<!--<li class="<?php  if($p2side=='tax'){ ?> active <?php } ?>">             
			<a href="#"><i class="fa fa-circle-o"></i> Tax                <span class="pull-right-container">                  <i class="fa fa-angle-left pull-right"></i>                </span>              </a>            
			<ul class="treeview-menu menu-open" style="display: block;">               
			<li class="<?php  if($side=='product_tax'){ ?> active <?php } ?>">
			<a href="manage_product_tax"><i class="fa fa-circle-o"></i> Product Tax</a></li>		
			<li class="<?php  if($side=='gt_tax'){ ?> active <?php } ?>">
			<a href="manage_gt_tax"><i class="fa fa-circle-o"></i> G.T. Tax</a></li>                       
			</ul>            </li> -->
			
			</ul>                        
			</li>
			<!--<li <?php if($side=='building' || $side=='light' || $side=='hoarding' || $side=='traffic'){?>class="active"<?php }?>><a href="#"> <i class="fa fa-circle"></i><span>Survey</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span> </a>
				<ul class="treeview-menu">
					<li class="treeview  <?php  if($side=='building'){ ?> active <?php } ?>">
						<a href="building_survey.php">
							<i class="fa fa-circle-o"></i> <span>Building/Plot Survey</span>
						</a>
					</li>
					<li class="treeview  <?php  if($side=='light'){ ?> active <?php } ?>">
						<a href="light_survey.php">
							<i class="fa fa-circle-o"></i> <span>Street Light Survey</span>
						</a>
					</li>
					<li class="treeview  <?php  if($side=='hoarding'){ ?> active <?php } ?>">
						<a href="hoarding_survey.php">
							<i class="fa fa-circle-o"></i> <span>Hoarding Survey</span>
						</a>
					</li>
					<li class="treeview  <?php  if($side=='traffic'){ ?> active <?php } ?>">
						<a href="traffic_survey.php">
							<i class="fa fa-circle-o"></i> <span>Traffic Survey</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="<?php  if($side=='user'){ ?> active <?php } ?> treeview">
				<a href="user_list.php">
					<i class="fa fa-edit"></i> <span>User List</span>
				</a>
			</li>-->
			<li class="<?php  if($side=='edit_profile'){ ?> active <?php } ?> treeview">
				<a href="edit_profile">
					<i class="fa fa-edit"></i> <span>Edit Profile</span>
				</a>
			</li>
		
		
		<!--<li class="<?php  if($side=='giftidea'){ ?> active <?php } ?> treeview">
          <a href="manage_giftidea.php">
            <i class="fa fa-edit"></i> <span>Gift Idea</span>
          </a>
        </li>-->
		
			<li class="<?php  if($side=='change_password'){ ?> active <?php } ?> treeview">
				<a href="changepass">
					<i class="fa fa-edit"></i> <span>Change Password</span>
				</a>
			</li>
	</ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php 
@session_start();
require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
    $objT = new User();
    $p1side = "view_product";
  $side = "view_product";
   
 ?>
 <?php
if(isset($_GET['ids'])){
   $deleteid = $_GET['ids'];

  $sql = $objT->QueryDelete('tbl_product_package',$deleteid);
  
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Package deleted successfully</p>"; 
    header("refresh:1;url=manage_package?p_id=".$_REQUEST['p_id']);
  
  }

}

if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; 
    $id_count = count($_POST['data']); 
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
         $row1 = $objT->getResultById('tbl_product_package',$id);

  
  
    
        $sql = $objT->QueryDelete('tbl_product_package',$id);
    }
    header("refresh:1;url=manage_package?p_id=".$_REQUEST['p_id']); 
}
?>
<?php 

if($_GET['tag']=='ProgarmActivateDeactivate')
{
  $query= $objT->updateStatus('user_data',"status",$_GET['active'],$_GET['id']);
} 
?>

  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include"inc/header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
     <?php include"inc/side-bar.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Package
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Package</li>
          </ol>
    </section>
     <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
        <form id="tab" name="form1" method="post" action="">
          <input type="hidden" name="p_id" value="<?php echo $_REQUEST['p_id'];?>">
                <div class="box-header">
                  <!--<a href="manage-customer.php"><span class="btn btn-primary btn-small">All</span></a>
                  <a href="manage-customer.php?status=1"><span class="btn btn-success btn-small">Active</span></a>
       <a href="manage-customer.php?status=0"><span class="btn btn-danger btn-small">Deactive</span></a>
      <a href="manage-customer.php?status=2"><span class="btn btn-warning btn-small">Blacklist</span></a> -->
          <div style="float:right;">
          <a href="add_product_package?p_id=<?php echo $_REQUEST['p_id'] ?>"><span class="btn btn-success btn-small">Add Package</span></a>
      
          <input type="submit" name="delete" id="submit" onClick="return confirmdelete()" value="Delete Selected" class="btn btn-danger btn-small">
          <!--<a href="import-export/customer-export.php"><span class="btn btn-info btn-small">Export</span></a> -->
          </div>
                </div><!-- /.box-header -->
                
                
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            <th><input type="checkbox" id="check_all" value=""></th> 
                        <th>S.No</th>
                      
            <th>Company Name</th>
            <th>Package Name</th>
            <th>Per Pill Price</th>
            <th>Price</th>
             <th>Discount</th>
            <th>Status</th>
         
            <th>Action</th>
            
                      </tr>
                    </thead>
                    <tbody>
          <?php
          
          
          
          
            
                 $row=$objT->getResult('select * from tbl_product_package where product_id="'.$_REQUEST['p_id'].'" order by id desc');
               
                $count = count($row);
             
                      $i=1;
                     $j=0;
                     while($count > 0){ 
         
                 ?>
                      <tr>
        <td> <input type="checkbox" value="<?php echo $row[$j]['id']; ?>" name="data[]" id="data" title="Select All" /></td> 
                        <td><?php echo $i; ?></td>
                         <td><?php echo $row[$j]['company_name']; ?></td>


                        <?php
                        //echo 'select * from product_varient where id="'.$row[$j]['varient_id'].'"';
                         $rowvarient=$objT->getResult('select * from product_varient where id="'.$row[$j]['varient_id'].'"');
                     

                        ?>
                    
             <td><?php echo $rowvarient[0]['varient']; ?> <?php echo $rowvarient[0]['varient_unit']; ?> ×  <?php echo $row[$j]['no_pills']; ?> pills</td>
             <td><?php echo $row[$j]['per_pill_price']; ?></td>
              <td><?php echo $row[$j]['price']; ?></td>
              <td><?php echo $row[$j]['discount']; ?></td>
          
             <td>
             <?php if($row[$j]['status']==1){ ?>
            <a href="manage_package?tag=ProgarmActivateDeactivate&active=0&id=<?php echo $row[$j]['id'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">Active</span></a>
            <?php } elseif($row[$j]['status']==0) {?>
            
                       <a href="manage_package?tag=ProgarmActivateDeactivate&active=1&id=<?php echo $row[$j]['id'];?>"  onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service">
                        <span class="label label-danger">DeActive</span></a>
            <?php }elseif($row[$j]['status']==2) {?>
            
                        <span class="label label-warning">Blacklist</span>
            <?php } ?></td>
                        
            <td><a href="add_product_package?p_id=<?php echo $_REQUEST['p_id']; ?>&edit=<?php echo $row[$j]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a><a href="/add_product_package?p_id=<?php echo $_REQUEST['p_id']; ?>&ids=<?php echo $row[$j]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a></td>
            
                      </tr>
                     <?php 
                     $i++; 
                      $j++;
                     $count--;
                     } ?>
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div></form><!-- /.box -->
        
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>

    
    
        
      </div><!-- /.content-wrapper -->
     <?php 
      include"inc/footer.php";
      ?>
       <div class="control-sidebar-bg"></div>
    </div>
      <!-- page script -->
       <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	 <script type="text/javascript">
		function checkAll()
		{

			len = document.getElementsByClassName('check').length;
			//alert("Please Select Ok to Send All");
			if (document.getElementById('check_all').checked == true)
			{
				for (i = 1; i <= len; i++)
				{
					//alert("I : "+i)
					document.getElementById('check' + i).checked = true;
				}
			}
			else
			{
				for (i = 1; i <= len; i++)
				{
					document.getElementById('check' + i).checked = false;
				}
			}
		}
        </script>
  </body>
 

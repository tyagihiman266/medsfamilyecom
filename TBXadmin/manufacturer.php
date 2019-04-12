<?php 
@session_start();
require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
    $objT = new User();
   
 ?>
 <?php
if(isset($_GET['ids'])){
   $deleteid = $_GET['ids'];

   $row1 = $objT->getResultById('manage_category',$deleteid);

    $path = "upload/category/" ;
           if(file_exists($path.$row1['category_image'])) {
            unlink($path.$row1['category_image']);
          }
  
  $sql = $objT->QueryDelete('manage_category',$deleteid);
  
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Category deleted successfully</p>"; 
    header("refresh:1;url=manage_category");
  
  }

}

if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; 
    $id_count = count($_POST['data']); 
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
         $row1 = $objT->getResultById('manage_category',$id);

    $path = "upload/category/" ;
           if(file_exists($path.$row1['category_image'])) {
            unlink($path.$row1['category_image']);
          }
  
    
        $sql = $objT->QueryDelete('manage_category',$id);
    }
    header("refresh:1;url=manage_category"); 
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
            Manufacturer
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manufacturer</li>
          </ol>
    </section>
     <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
        <form id="tab" name="form1" method="post" action="">
                <div class="box-header">
                  <!--<a href="manage-customer.php"><span class="btn btn-primary btn-small">All</span></a>
                  <a href="manage-customer.php?status=1"><span class="btn btn-success btn-small">Active</span></a>
       <a href="manage-customer.php?status=0"><span class="btn btn-danger btn-small">Deactive</span></a>
      <a href="manage-customer.php?status=2"><span class="btn btn-warning btn-small">Blacklist</span></a> -->
          <div style="float:right;">
          
          <!--<a href="import-export/customer-export.php"><span class="btn btn-info btn-small">Export</span></a> -->
          </div>
                </div><!-- /.box-header -->
                
                
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            
                        <th>S.No</th>
                      
            <th>Manufacturer</th>
            <th></th>
            <!-- <th>Status</th>
         
            <th>Action</th> -->
            
                      </tr>
                    </thead>
                    <tbody>
          <?php
          
          
          
          
            
                 $row=$objT->getResult('select * from tbl_product order by id desc');
               
                $count = count($row);
             
                      $i=1;
                     $j=0;
                     while($count > 0){ 
         
                 ?>
                      <tr>
         
                        <td><?php echo $i; ?></td>
                        <?php $rowparent=$objT->getResult('select category_name from manage_category where parent_id="'.$row[$j]['parent_id'].'"');
                       

                        ?>
                    
 <td><?php echo $row[$j]['name']; ?></td>
             <td><img src="../upload/category/<?php echo $row[$j]['category_image']; ?>" alt="" height="100" width="100"></td>
          
             
            
            
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
 

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

   $row1 = $objT->getResultById('manage_user',$deleteid);

    $path = "upload/category/" ;
           if(file_exists($path.$row1['category_image'])) {
            unlink($path.$row1['category_image']);
          }
  
  $sql = $objT->QueryDelete('manage_user',$deleteid);
  
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Category deleted successfully</p>"; 
    header("refresh:1;url=manage_user.php");
  
  }

}

if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; 
    $id_count = count($_POST['data']); 
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
         $row1 = $objT->getResultById('manage_user',$id);

    $path = "upload/category/" ;
           if(file_exists($path.$row1['category_image'])) {
            unlink($path.$row1['category_image']);
          }
  
    
        $sql = $objT->QueryDelete('manage_user',$id);
    }
    header("refresh:1;url=manage_user.php"); 
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
            Manage User
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage User</li>
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
          <a href="add_userwithrole.php"><span class="btn btn-success btn-small">Add User</span></a>
      
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
                      
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Status</th>
         
            <th>Action</th>
            
                      </tr>
                    </thead>
                    <tbody>
          <?php
          
          
          
          
            
                 $row=$objT->getResult('select * from manage_user order by name desc');
               
                $count = count($row);
             
                      $i=1;
                     $j=0;
                     while($count > 0){ 
         
                 ?>
                      <tr>
        <td> <input type="checkbox" value="<?php echo $row[$j]['id']; ?>" name="data[]" id="data" title="Select All" /></td> 
                        <td><?php echo $i; ?></td>
                        <?php $rowparent=$objT->getResult('select name,role from manage_user ');
                       

                        ?>
                    
 <td><?php echo $row[$j]['name']; ?></td>
             <td><?php echo $row[$j]['role']; ?></td>
          
             <td>
             <?php if($row[$j]['status']==1){ ?>
            <a href="manage_user?tag=ProgarmActivateDeactivate&active=0&id=<?php echo $row[$j]['id'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">Active</span></a>
            <?php } elseif($row[$j]['status']==0) {?>
            
                       <a href="manage_user?tag=ProgarmActivateDeactivate&active=1&id=<?php echo $row[$j]['id'];?>"  onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service">
                        <span class="label label-danger">DeActive</span></a>
            <?php }elseif($row[$j]['status']==2) {?>
            
                        <span class="label label-warning">Blacklist</span>
            <?php } ?></td>
                        
            <td><a href="add_userwithrole.php?edit=<?php echo $row[$j]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a></td>
            
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
 

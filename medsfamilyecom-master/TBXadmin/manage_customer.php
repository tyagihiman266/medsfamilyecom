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
  
  $sql = $objT->QueryDelete('addressbook_data',$deleteid);
  
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Progarm deleted successfully</p>"; 
     header("refresh:2;url=manage_customer.php"); 
  
  }

}
if(isset($_POST['delete'])) {
    $id_array = $_POST['data'];
    $id_count = count($_POST['data']); 
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
    
        $sql = $objT->QueryDelete('addressbook_data',$id);
    }
     header("refresh:2;url=manage_customer.php"); 
}

?>
<?php

if($_GET['tag']=='ProgarmActivateDeactivate')
{
  $query= $objT->updateStatus('user_data',"status",$_GET['active'],$_GET['id']);
} 
?>
<?php 
$objT = new User();
$queryL = $objT->getResult('select * from attribute_list order by id desc');
$count = count($queryL);


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
            Manage Customer
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Customer</li>
          </ol>
    </section>
    <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
        <form id="tab" name="form1" method="post" action="">
                <div class="box-header">
                  <a href="manage-customer.php"><span class="btn btn-primary btn-small">All</span></a>
                  <a href="manage-customer.php?status=1"><span class="btn btn-success btn-small">Active</span></a>
       <a href="manage-customer.php?status=0"><span class="btn btn-danger btn-small">Deactive</span></a>
      <a href="manage-customer.php?status=2"><span class="btn btn-warning btn-small">Blacklist</span></a>
          <div style="float:right;"><!---<a href="add-customer.php"><span class="btn btn-success btn-small">Add</span></a>--->
          <input type="submit" name="delete" id="submit" onClick="return confirmdelete()" value="Delete Selected" class="btn btn-danger btn-small">
          <a href="import-export/customer-export.php"><span class="btn btn-info btn-small">Export</span></a>
          </div>
                </div><!-- /.box-header -->
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            <th><input type="checkbox" id="check_all" value=""></th> 
                        <th>S.No</th>
                        <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone No</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
            
                      </tr>
                    </thead>
                    <tbody>
          <?php
            
             
                $query=$objT->getResult('SELECT * FROM user_data INNER JOIN addressbook_data ON user_data.addressbook_id = addressbook_data.user_id');
                $count = count($query);
                     $i=1;
                      $j=0;
                     while($count > 0){ 
                      
                 ?>

                      <tr>
        <td> <input type="checkbox" value="<?php echo $query[$j]['id']; ?>" name="data[]" id="data" title="Select All" /></td> 
                        <td><?php echo $i; ?></td>
                        <td><?php echo $query[$j]['title']." ".$query[$j]['fname']." ".$query[$j]['lname']; ?></td>
             <td><?php echo $query[$j]['email']; ?></td>
             <td><?php echo $query[$j]['country_code']." ".$query[$j]['mobile']; ?></td>
             <td>
             <?php if($query[$j]['status']==1){ ?>
            <span class="label label-success">Active</span>
            <?php } elseif($query[$j]['status']==0) {?>
            
                        <span class="label label-danger">Deactivate</span>
            <?php }elseif($query[$j]['status']==2) {?>
            
                        <span class="label label-warning">Blacklist</span>
            <?php } ?></td>
                        <td><?php echo $query[$j]['created_data'] ; ?></td>
            <td><a href="add_customer.php?edit=<?php echo $query[$j]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a><a href="manage_customer.php?ids=<?php echo $query[$j]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a></td>
            
                      </tr>
                     <?php 
                     $i++; 
                     $count--;
                     $j++;
                     } 
                     ?>
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div></form><!-- /.box -->
        
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
    
    
        <!-- Main content -->
      
      </div><!-- /.content-wrapper -->
     <?php 
      include"inc/footer.php";
      ?>
      </div>
  </body>
</html>

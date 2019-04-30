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
  
  $sql = $objT->QueryDelete('order_data',$deleteid);
  
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Order deleted successfully</p>"; 
    header("refresh:1;url=manage_order");
  
  }

}


if(isset($_POST['delete'])) {
    $id_array = $_POST['data'];
    $id_count = count($_POST['data']); 
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
    
        $sql = $objT->QueryDelete('order_data',$id);
    }
    header("Location:manage_order");
}

?>
<?php

if($_GET['tag']=='ProgarmActivateDeactivate')
{
  $query= $objT->updateStatus('order_data',"status",$_GET['active'],$_GET['id']);
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
            Attritube List
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Attritube List</li>
          </ol>
    </section>
    
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
        <form id="tab" name="form1" method="post" action="">
                <div class="box-header">
                  <a href="manage_order"><span class="btn btn-primary btn-small">All</span></a>
                  <a href="manage_order?status=1"><span class="btn btn-danger btn-small">Pending</span></a>
       <a href="manage_order?status=2"><span class="btn btn-warning btn-small">On Hold</span></a>
      <a href="manage_order?status=3"><span class="btn btn-danger btn-small">Canceled</span></a>
      <a href="manage_order?status=5"><span class="btn btn-success btn-small">Processing</span></a>
      <a href="manage_order?status=4"><span class="btn btn-info btn-small">Complete</span></a>
          <div style="float:right;">
         
       <!-- <a href="order-export.php"><span class="btn btn-info btn-small">Export</span></a> -->  
          </div>
                </div><!-- /.box-header -->
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            <th><input type="checkbox" id="check_all" value=""></th> 
                        <th>S.No</th>
                        <th>Order No.</th>
            <th>Billing Name</th>
            <th>Billing Email</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>Action</th>
            
                      </tr>
                    </thead>
                    <tbody>
          <?php
             if(isset($_REQUEST['status']))
              {
              $status = $_REQUEST['status'];  
              


              $query=$objT->getTableByStatus('order_data',$status);
              } else{
                
                $row=$objT->getResult('select * from order_data order by id desc');
               
               
                $count = count($row);

              }
                     $i=1;
                     $j=0;
                     while($count >0){ 
                 ?>
                      <tr>
        <td> <input type="checkbox" value="<?php echo $row[$j]['id']; ?>" name="data[]" id="data" title="Select All" /></td> 
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row[$j]['order_no']; ?></td>
             <td><?php echo $row[$j]['billing_fname'].' '.$row[$j]['billing_lname']; ?></td>
             <td><?php echo $row[$j]['billing_email']; ?></td>
             <td>
             <?php if($row[$j]['status']==1){ ?>
            <span class="label label-danger">Pending</span>
            <?php } elseif($row[$j]['status']==2) {?>
            
                        <span class="label label-warning">On Hold</span>
            <?php }elseif($row[$j]['status']==3) {?>
            
                        <span class="label label-danger">Canceled</span>
            <?php } elseif($row[$j]['status']==4) {?>
            
                        <span class="label label-info">Complete</span>
            <?php } elseif($row[$j]['status']==5) {?>
            
                        <span class="label label-success">Processing</span>
            <?php } ?></td>
                        <td><?php echo date('d M, Y',strtotime($row[$j]['order_date'])); ?></td>
            <td><a href="view_order?edit=<?php echo $row[$j]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-eye"></i>View Order</span></a><a href="manage_order?ids=<?php echo $row[$j]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a> <a href="re_order?edit=<?php echo $row[$j]['order_no'];?>" class="btn btn-danger btn-small">Reorder</a> </td>
            
            
                      </tr>
                     <?php 
                     $i++;
                     $j++;
                     $count--; } ?>
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
      
  </body>
</html>

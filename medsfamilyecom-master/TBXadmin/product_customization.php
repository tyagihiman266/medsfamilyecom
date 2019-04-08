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

   
  $sql =$objT->QueryDelete('product_customization',$deleteid);
  
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Product Customization deleted successfully</p>"; 
    header("refresh:1;url=product_customization.php");
  
  }
}



?>
<?php 
$objT = new User();
$queryL = $objT->getResult('SELECT * FROM product_customization ');
$count = count($queryL);


 ?>
 <?php 
if($_GET['tag']=='ProgarmActivateDeactivate')
{
  $query= $objT->updateStatus('product_customization',"status",$_GET['active'],$_GET['id']);
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
            Product Customization 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Customization</li>
          </ol>
    </section>
    
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
              
        <form id="tab" name="form1" method="post" action="">
                <div class="box-header">
                 <!-- <h3 class="box-title">Manage Product</h3>-->
                 <div style="float:lift;">
                
                
                 </div>
                 <div style="float:right;">
                 <a href="add_customization.php"><span class="btn btn-success btn-small">Add</span></a>
         
                 </div>
         

                </div><!-- /.box-header -->
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                      <tbody>

                    <?php
                    $no = 1;
                    $i = 0;
                      while ($count > 0) {
                      
                     ?>
                  
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $queryL[$i]['name']; ?></td>
                        <td>    <?php if($queryL[$i]['status']==1){ ?>
            <a href="product_customization.php?tag=ProgarmActivateDeactivate&active=0&id=<?php echo $queryL[$i]['id'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">Active</span></a>
            <?php } elseif($queryL[$i]['status']==0) {?>
            
                       <a href="product_customization.php?tag=ProgarmActivateDeactivate&active=1&id=<?php echo $queryL[$i]['id'];?>"  onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service">
                        <span class="label label-danger">DeActive</span></a>
            <?php }?></td>
                        <td>
            
          <a href="product_customization_list.php?id=<?php echo $queryL[$i]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Manage Option</span></a>
          <a href="add_customization.php?edit=<?php echo $queryL[$i]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
            <a href="product_customization.php?ids=<?php echo $queryL[$i]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a>
          </td>



                      </tr>
                  
                     <?php
                     $no++;
                     $i++;
                     $count--;

                      } 
                    ?>
                      </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>  </form><!-- /.box -->
        
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
</html>

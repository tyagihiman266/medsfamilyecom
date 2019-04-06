<?php 
@session_start();
require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
 ?>
 <?php
if(isset($_GET['ids'])){
  $deleteid = $_GET['ids'];
     $imagename = mysqli_query("SELECT * FROM tbl_pro_img WHERE p_id = '".$deleteid."'");
     while($proimage = mysqli_fetch_array($imagename)){
       $product_image = $proimage['image'];
        unlink('../upload/product/$product_image'); 
     }
  $sql = mysqli_query("delete from tbl_product where id = '". $deleteid ."'") or die(mysqli_error());
  $sql = mysqli_query("delete from tbl_pro_img where p_id = '".$deleteid."'");
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Product deleted successfully</p>"; 
    header("refresh:1;url=attribute_set.php");
  
  }

}

if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; // return array
    $id_count = count($_POST['data']); // count array
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
        $query = mysqli_query("DELETE FROM tbl_product WHERE id = '". $id ."'");
    $query = mysqli_query("delete from tbl_pro_img where p_id = '".$id."'");

        if(!$query) { die(mysqli_error()); }
    }
    header("Location:attribute_set.php"); 
}



?>
<?php 
$objT = new User();
$queryL = $objT->getResult('select * from attribute_set order by id desc');
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
            Manage Attritube Set
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mange Attritube Set</li>
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
                 <a href="new_attribute_set.php"><span class="btn btn-success btn-small">Add New Set</span></a>
         
                 </div>
         

                </div><!-- /.box-header -->
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            
                        <th>S.No</th>
                        <th>Set Name</th>
                        <th>Manage Attribute </th>
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
                        <td><?php echo $queryL[$i]['attribute_set_name']; ?></td>
                        <td>
                        <a href="catalog_product_attribute.php?set_id=<?php echo $queryL[$i]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Manage Option</span></a>
             </td>
                        <td>
             <?php if(($queryL[$i]['attribute_type'] == 'select') or ($queryL[$i]['attribute_type'] == 'multipleselect')){?>
             
              | 
          <?php }  ?>
                      <a href="new_attribute_set.php?edit=<?php echo $queryL[$i]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span>
                      <!--<a href="attribute_set.php?ids=<?php echo $queryL[$i]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a>-->
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
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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

<?php 
@session_start();
require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
 ?>
 <?php
if(isset($_GET['ids'])){
  echo $deleteid = $_GET['ids'];
     $imagename = mysqli_query("SELECT * FROM tbl_pro_img WHERE p_id = '".$deleteid."'");
     while($proimage = mysqli_fetch_array($imagename)){
       $product_image = $proimage['image'];
        unlink('../upload/product/$product_image'); 
     }
  $sql = mysqli_query("delete from tbl_product where id = '". $deleteid ."'") or die(mysqli_error());
  $sql = mysqli_query("delete from tbl_pro_img where p_id = '".$deleteid."'");
  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Product deleted successfully</p>"; 
    header("refresh:1;url=attribute_list.php");
  
  }

}


if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; 
    $id_count = count($_POST['data']); 
 
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
        $id_array = $_POST['data']; 
        $query = mysqli_query("DELETE FROM tbl_product WHERE id = '". $id ."'");
    $query = mysqli_query("delete from tbl_pro_img where p_id = '".$id."'");

        if(!$query) { die(mysqli_error()); }
    }
    header("refresh:1;url=attribute_list.php");
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
                 <!-- <h3 class="box-title">Manage Product</h3>-->
                 <div style="float:lift;">
                
                
                 </div>
                 <div style="float:right;">
                 <a href="product_attribute.php"><span class="btn btn-success btn-small">Add</span></a>
         
                 </div>
         

                </div><!-- /.box-header -->
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            
                        <th>S.No</th>
                        <th>Attribute Lable</th>
                        <th>Attribute Code </th>
                        <th>Required</th>
                        <th>Use in Front </th>
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
                        <td><?php echo $queryL[$i]['attribute_lable']; ?></td>
                        <td><?php echo $queryL[$i]['attribute_code']; ?></td>
                        <td><?php echo $queryL[$i]['attribute_required']; ?></td>
                        <td><?php echo $queryL[$i]['show_in_front']; ?></td>
                        <td>
             <?php if(($query[$i]['attribute_type'] == 'select') or ($query[$i]['attribute_type'] == 'multipleselect')){?>
             
             
              | 
          <?php }  ?>
          <a href="manage_option.php?id=<?php echo $queryL[$i]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Manage Option</span></a>
          <a href="product_attribute.php?edit=<?php echo $queryL[$i]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a>
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

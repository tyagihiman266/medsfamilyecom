<?php 
@session_start();
require_once ("inc/main.php");
  require_once ("include/DBclass.php");
  include_once("include/User.php");
  include 'inc/head.php';

  $objT = new User();

//Single Delete
if(isset($_GET['ids'])){
   $deleteid = $_GET['ids'];
    $sql = $objT->QueryDelete('tbl_product',$deleteid);
    $objT->QueryCommonDelete("delete from product_varient where product_id='".$deleteid."'");
    $objT->QueryCommonDelete("delete from related_product where product_id='".$deleteid."'");
           $row = $objT->getResult('select * from tbl_pro_img where p_id="'.$deleteid.'"');
       foreach($row as $keydel => $valdel)
	   {
              $path = "upload/product/big/";
               $path2 = "upload/product/medium/";
                $path3 = "upload/product/thumbs/";
           if(file_exists($path.$valdel['image']))
			    {
					unlink($path.$valdel['image']);
					unlink($path2.$valdel['image']);
					unlink($path3.$valdel['image']);
				}
       }
$objT->QueryCommonDelete("delete from tbl_pro_img where p_id='".$deleteid."'");
$objT->QueryCommonDelete("delete from tbl_company where product_id ='".$deleteid."'");
$objT->QueryCommonDelete("delete from tbl_product_package where product_id='".$deleteid."'");
   
   

  if($sql){
    $sms = "<p style='text-align:center;color:green;'>Product deleted successfully</p>"; 
    header("Location:view_product.php"); 
  }

}


 //Multiple Delete

if(isset($_POST['delete'])) {
    $id_array = $_POST['data']; // return array
    $id_count = count($_POST['data']); // count array
 //console.log($id_count);
    for($i=0; $i < $id_count; $i++) {
        $id = $id_array[$i];
    
        $sql = $objT->QueryDelete('tbl_product',$id);
    }
     header("refresh:1;url=view_product");  // redirect after deleting
}


//Status active/deactive

if($_GET['tag']=='ProgarmActivateDeactivate')
{
 $query= $objT->updateStatus('tbl_product','status',$_GET['active'],$_GET['id']);
  header("Location:view_product.php"); 
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
            Manage Product
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Product</li>
          </ol>
        </section>
         <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
<?php //echo $_SERVER['PHP_SELF']; ?>
              <div class="box">
        <form id="tab" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="box-header">
                  <h3 class="box-title">Manage Product</h3>
          <div style="float:right;">

            <a href="export.php"><span class="btn btn-success btn-small">Export Product</span></a>
            

          	<a href="add_product"><span class="btn btn-success btn-small">Add Product</span></a>
          <input type="submit" name="delete" id="submit" onClick="return confirmdelete()" value="Delete Selected" class="btn btn-danger btn-small">
            <!--<a href="import-export/product-export.php"><span class="btn btn-info btn-small">Export</span></a>  
            <a href="import-export/product-import.php"><span class="btn btn-info btn-small">Import</span></a>  -->
          </div>

                </div><!-- /.box-header -->
                <div class="box-body">
        
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            <th><input type="checkbox" id="check_all" value=""></th> 
                        <th>S.No</th>
                        <th>Name</th>
            <!--<th>Stock</th> 
            <th>Quntity</th>
            <th>Price</th>-->
            <th>Sku Number</th>
            <th>Manufacturer</th>
              <th>Varient</th>
             <th>Company</th>
            <th>Action</th>
            
                      </tr>
                    </thead>
                    <tbody>
  
          <?php
            $i=1;
            $j=0;    
            $row = $objT->getResult("select * from tbl_product order by id desc");
            $count = count($row);
            echo "Total No. of Products - ".$count;
            $img=array();
            while($count > 0) { 
          ?>
        <tr>
        <td> <input type="checkbox" value="<?php echo $row[$j]['id']; ?>" name="data[]" id="data" title="Select All" /></td> 
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row[$j]['name']; ?></td>
             <!--<td><//?php if($row[$j]['stock_availablity'] == 1){
              echo  $stock = "In Stock";
             }else{
              echo  $stock = "Out of Stock";
             }
             ?></td> 
             <td><//?php echo $row[$j]['qty']; ?></td>
             <td><//?php echo $row[$j]['price']; ?></td>-->
             <td><?php echo $row[$j]['sku_number']; ?></td>
          
                         <td>
                         <a href="add_product_package?p_id=<?php echo $row[$j]['id'];?>" title="Activate/Deactivate Service"><span class="label label-success">Add Manufacturer</span></a>

                         <a href="manage_package?p_id=<?php echo $row[$j]['id'];?>" title="Activate/Deactivate Service"><span class="label label-success">View Manufacturer</span></a>
                       </td>
                       <td>
                            <a href="add_product_varient?p_id=<?php echo $row[$j]['id'];?>" title="Activate/Deactivate Service"><span class="label label-success">Add Varient</span></a>
                            
                              <a href="manage_varient?p_id=<?php echo $row[$j]['id'];?>" title="Activate/Deactivate Service"><span class="label label-success">View Varient</span></a>
                          </td>
                           <td>
                            <a href="add_product_company?p_id=<?php echo $row[$j]['id'];?>" title="Activate/Deactivate Service"><span class="label label-success">Add Company</span></a>

                              <a href="manage_company?p_id=<?php echo $row[$j]['id'];?>" title="Activate/Deactivate Service"><span class="label label-success">View Company</span></a>
                          </td>
                            <td><a href="edit_product?edit=<?php echo $row[$j]['id'];?>"><span class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</span></a><a href="view_product?ids=<?php echo $row[$j]['id'];?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete')">Delete</a>
            <?php if($row[$j]['status']==1){ ?>
            <a href="view_product?tag=ProgarmActivateDeactivate&active=0&id=<?php echo $row[$j]['id'];?>" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service"><span class="label label-success">Active</span></a><?php } else {?>
            
                        <a href="view_product?tag=ProgarmActivateDeactivate&active=1&id=<?php echo $row[$j]['id'];?>"  onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Service">
                        <span class="label label-danger">DeActive</span></a></td><?php } ?>
                      </tr>
             
                      
                     <?php
                      $i++;
                     $j++;
                     $count--;
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
        </section><!-- /.content -->
    
    
        <!-- Main content -->
        
      </div><!-- /.content-wrapper -->
     <?php 
      include "inc/footer.php";
      ?>
      <div class="control-sidebar-bg"></div>
    </div>

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
       <script>
  $(document).ready(function () {
  $('#tblAttachAttributes').find('div.sortable').sortable({
    connectWith: 'div.sortable'
        });
});

$.fn.extend({ 
  getMaxHeight: function() {  
          var maxHeight = -1;
          this.each(function() {     
                  var height = $(this).height();
                  maxHeight = maxHeight > height ? maxHeight : height;   
                }); 
                return maxHeight;
  }
});

function setMenusDivHeight($attributeDivs) {
        return $attributeDivs.css('min-height', $attributeDivs.getMaxHeight());
}

setMenusDivHeight($('#tblAttachAttributes').find('div.sortable')).sortable({
  connectWith: 'div.sortable',
  start: function( event, ui ) {
    setMenusDivHeight(ui.item.closest('#tblAttachAttributes').find('div.sortable'))
                  .css('box-shadow', '0 0 10px blue');
  },
  stop: function( event, ui ) {
    setMenusDivHeight(ui.item.closest('#tblAttachAttributes').find('div.sortable'))
            .css('box-shadow', '');
  }
});
</script>

<style>
#short{
        background-color: #b4b3b3;
    background-image: url(drag.png);
    background-repeat: no-repeat;
    background-position: center;
    width: 30px;
    height: 22px;
    display: inline-block;
    float: left;
    cursor: pointer;
    padding: 15px;
    margin-top: 7px;
}
</style>
  </body>
</html>
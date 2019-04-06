<?php 
@session_start();
require_once ("inc/main.php");
    require_once ("include/DBclass.php");
    include_once("include/User.php");
    include 'inc/head.php';
    $objT = new User();
 ?>
 
<?php
if(isset($_POST['save'])){
      $attribute_set_id = $_REQUEST['set_id'] ;
      $attribute_list_id  = $_POST['attribute_list_id'];

      $count = count($attribute_list_id);
      for($x=0; $x < $count; $x++ ){
          $attribute_set_id = $_REQUEST['set_id'] ;
      $attribute_list_id  = $_POST[$x]['attribute_list_id'];

      $row1 = $objT->getResult( "Select * from attribute_customise_list where attribute_set_id = '".$attribute_set_id."' AND attribute_list_id = '".$attribute_list_id[$x]."'  ");
       $no1 = count($row1);
      if($no1 == 0){
        
        $queryC =  $objT->QueryInsert("INSERT INTO `attribute_customise_list`(`attribute_set_id`, `attribute_list_id`) VALUES ('$attribute_set_id','$attribute_list_id ')");
      }
      
                    }
  
            }

if(isset($_REQUEST['set_id'])){
      $id = $_REQUEST['set_id'] ;
      $rowL = $objT->getResultById('attribute_set',$id);
      
        }
        
  /// delete Attribute      
    if(isset($_POST['remove_attribute_id'])){
      
      $remove_attribute_id = $_POST['remove_attribute_id'] ;
      foreach($remove_attribute_id as $remove_id){

    $rowDL =$objT->QueryDelete3('attribute_customise_list',$remove_id);

      }
      
        }
              
$rowAL=$objT->getResult('select * from attribute_list order by id desc');
$count = count($rowAL);

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
            "<?php echo $rowL['attribute_set_name'] ?>" Product Attribute
            <?php echo $sms ;  ?>
          </h1>
          
    </section>
    <section class="invoice">
      <!-- title row -->
      

      
      
      <div class="row">
         <div class="col-xs-12">
                   
    <div id="attribute_attachment_section" class="postbox">

      <div id="tblAttachAttributes" class="postbox">
        
    <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Unassigned Attributes List</h3>
          
                </div><!-- /.box-header -->
         <div class="box-body">
              <div id="unassigned_attributes" class="sortable ">
                
            <?php $set_id = $_REQUEST['set_id'] ; 
            $i=0;
          while($count > 0){
           $list_id = $rowAL[$i]['id'] ;
          
                   $noAL1 = $objT->getResult("Select * from attribute_customise_list where attribute_list_id = '".$list_id."' AND attribute_set_id = '".$set_id."'  ");
                    
          if(count($noAL1) == 0){
          ?>      
           <div class="form-group">
          <div class="col-xs-1">
          <span id="short"></span>
          </div>
          <div class="col-xs-11">
           <label class="form-control" name="attributes1" id="5150"><?php echo $rowAL[$i]['attribute_lable'] ; ?></label>
          <input  value="<?php echo $rowAL[$i]['id'] ; ?>"  type="hidden" name="attribute_list_id[]">
          </div>
          </div>
          
          <?php } 
          $count--;
          $i++;
          } ?>
              </div>
              </div>
              </div>
              </div>
           
      <form action="" method="post" >
      
      <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title"> "<?php echo $rowL['attribute_set_name'] ?>" Group List</h3>
          
                </div><!-- /.box-header -->
         <div class="box-body">
              <div id="assigned_attributes" class="sortable">
               <label name="attributes1">&nbsp;</label>
         
              </div>
        
        <?php  
          $rowGL = $objT->getResult("Select * from attribute_customise_list where attribute_set_id = '".$set_id."' ");
          $count1= count($rowGL);
          $j=0;
          while($count1 >0){
             $attribute_list_id = $rowGL[$j]['attribute_list_id'];
            
  
            $rowGL1 = $objT->getResult("Select * from attribute_list where id = '".$attribute_list_id."'");
          ?>      
           <div class="form-group">
          <div class="col-xs-1">
          <input value="<?php echo $rowGL[$j]['attribute_list_id'] ; ?>"  type="checkbox" name="remove_attribute_id[]">
          </div>
          <div class="col-xs-11">
           <label class="form-control" name="attributes1" id="5150"><?php echo $rowGL1[$j]['attribute_lable'] ; ?></label>
          <input  value="<?php echo $rowGL[$j]['attribute_list_id'] ; ?>"  type="hidden" name="attribute_list_id[]">
          </div>
          
          </div>
          
          <?php 
          $count1--;
          $j++;
          } ?>
              </div>
          </div>
          </div>
      
      <div  class="row">
     
      
         <div class="form-group col-xs-12">
          <input type="submit" name="save" value="save" style="float:right;" class="btn btn-primary btn-small" />
      </div>
     
       </div>
     
      </form>
          </div>


     
     
        </div>
        
       </div>
 </div>

         
        
            </section>
    
    
        <!-- Main content -->
        
      </div><!-- /.content-wrapper -->
     <?php 
      include"inc/footer.php";
      ?>
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

<?php
require_once ("inc/main.php");
$side = "building"; 
$id=$_REQUEST['edit'];
$resultorder=$user->getResult("select * from order_data WHERE id='".$id."'");
$orderid=$resultorder[0]['order_no'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://free.currencyconverterapi.com/api/v5/convert?q=".$resultorder[0]['shoping_currency']."&compact=y");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$ip_data_in = curl_exec($ch); // string
curl_close($ch);
$ip_data = json_decode($ip_data_in,true);
$currencyConverter= $ip_data[$resultorder[0]['shoping_currency']]['val'];
//print_r($result);
$statusid=$resultorder[0]['status'];
$uid=$resultorder[0]['user_id'];
$Orderstatus=$user->getResult("select * from order_status WHERE id='".$statusid."'");
$userdata=$user->getResult("select * from user_data  WHERE id='".$uid."'");
//print_r($userdata);
if(isset($_REQUEST['status']))
    { 
$colArray = array(
'status' => $_REQUEST['status']
                 );
$query = $user->updateQuery($colArray,'order_data',$_GET['edit']);
//$query= $objT->ActivateDeactiveRowProgarm('order_data',"status",$_GET['status'],$_GET['edit']);
header("location:view_order.php?edit=".$_GET['edit']);
     }
if(isset($_REQUEST['submitno'])){
  $colArray = array(
  $tracking_no = $_POST['tracking_no']
  );
  $abc = $user->queryinsert('UPDATE order_data SET tracking_no="'.$tracking_no.'" WHERE id="'.$_GET['edit'].'"');
 
     $sms="<p style='text-align:center;color:green;'>Tracking Number Added Successfully.</p>";
      header("refresh:2;url=view_order.php?edit=".$_GET['edit']);  
 } 


if(isset($_REQUEST['submiturl'])){
  $colArray = array(
    $tracking_url = $_POST['tracking_url']
    );
    $abc = $user->queryinsert('UPDATE order_data SET tracking_url="'.$tracking_url.'" WHERE id="'.$_GET['edit'].'"');
 
     $sms="<p style='text-align:center;color:green;'>Tracking Url Added Successfully.</p>";
      header("refresh:2;url=view_order.php?edit=".$_GET['edit']);
  
  }

if($_REQUEST['mailcopy']){

}


if($_REQUEST['send']) { 
$to=$userdata[0]['email'];
$subject="Order receipt from Tailormeup";
$enq_message="Dear User,<br/>";
$enq_message.="Thank you for your purchasing on Tailormeup<br/>";
$enq_message.="Your order details are below:<br/><br/>";
$enq_message.='<table cellspacing="0" id="view_order" class="tablesorter" border="1"> 
      <thead> 
        <tr align="left">
                <th width="600" height="40" align="left" valign="middle" class="details header">Product Name</th>
        <th width="50" height="40" align="left" valign="middle" class="details header">Quantity</th>
                <th width="200" height="40" align="left" valign="middle" class="details header">Unit Price</th>
                <th width="200" height="40" align="left" valign="middle" class="details header">Total</th>
                </tr>
      </thead> 
            <tbody>';
 $sql = "select * from product_order_data where order_no = '".$resultorder[0]['order_no']."'"; 
 $row = $user->getResult($sql);      
 $grand_total = '';
 $subtotal='';
 foreach ($row as $value) {
 $packagedetail=$user->getResult("SELECT * FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id where tbl_product_package.id='".$value['package_id']."'");
 $subtotal += $value['product_qty']*( $value['product_price']*$currencyConverter);
 $product_price = $value['product_price']*$currencyConverter;
 $product_id = $value['product_id'];
 $result = $user->getResultById('tbl_product',$product_id);$file = $path.$filename;
 $file_size = filesize($file);
 $handle = fopen($file, "r");
 $content = fread($handle, $file_size);
 fclose($handle);
 $content = chunk_split(base64_encode($content));
 $uid = md5(uniqid(time()));
 $header = "From: ".$from_name." <".$email_from.">\r\n";
 $header .= "Reply-To: ".$email_from."\r\n";
 $header .= "MIME-Version: 1.0\r\n";
 $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
 $header .= "This is a multi-part message in MIME format.\r\n";
 $header .= "--".$uid."\r\n";
 $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
 $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
 $header .= $message."\r\n\r\n";
 $header .= "--".$uid."\r\n";
 $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
 $header .= "Content-Transfer-Encoding: base64\r\n";
 $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
 $header .= $content."\r\n\r\n";
 $header .= "--".$uid."--";
 if (mail($mailto, $subject, "", $header)) {
 echo "mail send ... OK"; // or use booleans here
 } else {
 echo "mail send ... ERROR!";
 }
      $product_name = $result['name'];
      //$product_tax_id = $result['product_tax'];
      //$result2 = $objU->getResultById('product_tax',$product_tax_id);
      //$tax_per = $result2['tax_per'];
      $total_tax =0;
    $grand_total += $product_price*$value['product_qty'];


 
        //print_r($customrecord);
     $enq_message.='
      <tr>
        <td style="padding: 10px">'.$product_name.'<br/> '.$packagedetail[0]['varient'].$packagedetail[0]['varient_unit'].'x'.$packagedetail[0]['no_pills'].' pills';
          
      $enq_message.= ' </td>
        
          <td style="padding: 10px">'.$value['product_qty'].'</td>
        <td style="padding: 10px;">$ '.$product_price.'</td>
        <td style="padding: 10px"> $'.number_format($product_price*$value['product_qty'],2).'</td>
      </tr>';
    
     }
 
    $enq_message.= '<tr>
      <td style="padding: 10px">&nbsp;</td>
      <td style="padding: 10px">&nbsp;</td>
      
      <td style="padding: 10px"><b>Grand Total</b></td>
      <td style="padding: 10px"><b>$'.number_format($grand_total,2).'</b></td>
    </tr>

   

            </tbody>


      </table>';
     

  $email_from = 'tyagihiman26@examstube.in';
  $headers = 'From: '.$email_from."\r\n".

            'MIME-Version: 1.0' . "\r\n".

            'Content-type: text/html; charset=iso-8859-1' . "\r\n".

            'Reply-To: '.$email_from."\r\n" .

            'X-Mailer: PHP/' . phpversion();




          $mail= @mail($to, $subject, $enq_message, $headers); 
 
 
     

  }

   


  include 'inc/head.php';
  ?>

   <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include"inc/header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include"inc/side-bar.php";?>








<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo "Order #".$resultorder[0]['order_no']." | ".$resultorder[0]['order_date'] ?>
      
          
       <?php if(isset($sms)){
            echo $sms;
          } ?> 
       <div style="float:right;">
            
     <a href="view_order.php?edit=<?php echo $id ; ?>&send=email"><span class="btn btn-primary btn-small">Send Email</span></a>
     <a href="view_order.php?edit=<?php echo $id ; ?>&status=3" class="btn btn-danger btn-small" onClick="return confirm('Are you sure want to Cancel')">Cancel</a>
      <a href="view_order.php?edit=<?php echo $id ; ?>&status=3" class="btn btn-danger btn-small" onClick="return confirm('Are you sure want to Cancel')">Invoice</a>
    <a href="view_order.php?edit=<?php echo $id ; ?>&status=2" class="btn btn-warning btn-small" onClick="return confirm('Are you sure want to Hold')">Hold</a>
    <?php if($resultorder[0]['status'] =='5'){?>
      <a href="view_order.php?edit=<?php echo $id ; ?>&status=4"><span class="btn btn-success btn-small">Received by Customer</span></a>
    
    <?php }elseif($resultorder[0]['status'] =='4'){ ?>
      <span class="btn btn-success btn-small">Order Completed</span>
    
    <?php }else{ ?>
      <a  href="view_order.php?edit=<?php echo $id ; ?>&status=5"><span class="btn btn-success btn-small">Ship</span></a>
    <?php } ?>
  
          </div></h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
      
      <!---order tracking code start-->
              <div class="col-xs-12">
                  <div class="box box-warning" style="width=200px">
                    <div class="box-header with-border">       
                    </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <?php if($resultorder[0]['status'] =='5'){?>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tracking No.</label>
        <form action="" method="POST">
        
        <input type="hidden" value="<?php echo $resultorder[0]['id'] ; ?>" name="id" />
                    <div class="col-sm-8"><input type="text" value="<?php echo $resultorder[0]['tracking_no'] ; ?>" name="tracking_no" class="form-control" placeholder="Traking No..." />
                </div>
        
          <div style="margen-left:140px;">
                         
          <input type="submit" class="btn btn-success" name="submitno" id="submit" value="Submit">                                                       
                                                     
                      </div>
        </form>
                </div>
                
      
    
     
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tracking Url</label>
                <form action="" method="POST">
              <input type="hidden" value="<?php echo $resultorder[0]['id'] ; ?>" name="id" />
                    <div class="col-sm-8"><input type="text" value="<?php echo $resultorder[0]['tracking_url'] ; ?>" name="tracking_url" class="form-control" placeholder="Traking Url" />
                </div>
        
          <div style="margen-left:140px;">
                         
          <input type="submit" class="btn btn-success" name="submiturl" id="submit" value="Submit">                                                       
                                                     
                      </div>
        </form>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Shippment Comment</label>
                <form action="" method="POST">
              <input type="hidden" value="<?php echo $resultorder[0]['id'] ; ?>" name="id" />
                    <div class="col-sm-8"><input type="text" value="<?php echo $resultorder[0]['tracking_url'] ; ?>" name="tracking_url" class="form-control" placeholder="Traking Url" />
                </div>
        
          <div style="margen-left:140px;">
          <input type="checkbox" name="mailcopy" value="Bike"> Send a copy on mail<br>              
          <input type="submit" class="btn btn-success" name="submiturl" id="submit" value="Add Shipment">                                                       
                                                     
                      </div>
        </form>
                </div>
                
                <?php }?>
        
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
        <!-----order tracking code end------>
      <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo "Order #".$resultorder[0]['order_no']; ?></h3>
          
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Order Date</label>

                  <div class="col-sm-8">
                     <span class="border-none form-control"><?php echo $resultorder[0]['order_date']; ?></span>
                  </div>
                </div>
        
        
        
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Order Status</label>

                  <div class="col-sm-8">
                     <span class="border-none form-control"><?php echo $Orderstatus[0]['status']; if($status == 6){ ?></br><?php echo $canl_msg ;  }?></span>
                  </div>
                </div>
        
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Placed from IP</label>

                  <div class="col-sm-8">
                   <span class="border-none form-control"><?php echo $resultorder[0]['system_ip']; ?></span>
                  </div>
                </div>
          
          
        
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
       
      <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Customer Details</h3>
          
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Customer Name</label>

                  <div class="col-sm-8">
                     <span class="border-none form-control"><?php echo $userdata[0]['fname']." ".$userdata[0]['lname']; ?></span>
                  </div>
                </div>
        
        
        
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Customer Email</label>

                  <div class="col-sm-8">
                     <span class="border-none form-control"><?php echo $userdata[0]['email']; ?></span>
                  </div>
                </div>
        
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Customer Mobile No.</label>

                  <div class="col-sm-8">
                   <span class="border-none form-control"><?php echo $userdata[0]['mobile']; ?></span>
                  </div>
                </div>
          
        
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
     
     <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Billing Address</h3>
          
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <div class="col-sm-12">
                     <span class="border-none form-control"><?php echo $resultorder[0]['billing_fname'].' '.$resultorder[0]['billing_lname']; ?></br>
           <?php echo $resultorder[0]['billing_email']; ?></br>
           <?php echo $resultorder[0]['billing_address']; ?></br>
           <?php echo $resultorder[0]['billing_city'].", ".$resultorder[0]['billing_state'].", ".$resultorder[0]['billing_zip']; ?></br>
           <?php echo "T : ".$resultorder[0]['billing_mobile']; ?></br>
           </span></br>
           
                  </div>
                </div>
        
        <div class="form-group">
                </div>
        <div class="form-group">
                </div>
        <div class="form-group">
                </div>
        <div class="form-group">
                </div>
          
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
     <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Shipping Address</h3>
          
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <div class="col-sm-12">
                     <span class="border-none form-control"><?php echo $resultorder[0]['shipping_fname'].' '.$resultorder[0]['shipping_lname']; ?></br>
           <?php echo $resultorder[0]['shipping_email']; ?></br>
           <?php echo $resultorder[0]['shipping_address']; ?></br>
           <?php echo $resultorder[0]['shipping_city'].", ".$resultorder[0]['shipping_state'].", ".$resultorder[0]['shipping_zip']; ?></br>
           <?php echo "T : " .$resultorder[0]['shipping_mobile']; ?></br>
           </span></br>
           
                  </div>
                </div>
        
        <div class="form-group">
                </div>
        <div class="form-group">
                </div>
        <div class="form-group">
                </div>
        <div class="form-group">
                </div>
          
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
     <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Payment Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <div class="col-sm-12">
                     <span class="border-none form-control"><?php if($resultorder[0]['payment_method']==1) {
                       echo "COD";  } ?>

                     </br>
           Order was placed using <?php echo $resultorder[0]['cur_symbol']; ?> ( <?php echo $resultorder[0]['cur_price']; ?> ) </br>
           </span></br>
                  </div>
                </div>
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
     
     
      <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Shipping & Handling Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <div class="col-sm-12">
                     <span class="border-none form-control"><?php echo $resultorder[0]['shipping_lable']; ?> : 
           <?php echo $resultorder[0]['shipping_value']; ?>
           </span></br>
                  </div>
                </div>
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     

     <?php/*
     <!---schudule instruction start--->
      <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Delivery Schedule</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <div class="col-sm-12">
                     <span class="border-none form-control"><?php echo $resultorder[0]['delivery_schedule']; ?></br>
          
           </span></br>
                  </div>
                </div>
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
      <div class="col-xs-6">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Special Delivery Instructions</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
        <div class="form-horizontal">
        <div class="form-group">
                  <div class="col-sm-12">
                     <span class="border-none form-control"><?php echo $resultorder[0]['special_delivery_instructions']; ?></br>
           </span></br>
                  </div>
                </div>
       </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
      */?>
     
     <!---schudule instruction end--->
     
     <div class="col-xs-12">
              <div class="box box-warning" style="width=200px">
                <div class="box-header with-border">
                  <h3 class="box-title">Items Ordered</h3>
                   <?php if($resultorder[0]['invoice_file']!='') { ?>
                  <a href="../upload/invoice/<?php echo $resultorder[0]['invoice_file']; ?>" target="_blank">Download Invoice</a>
                       <?php } ?>
                </div><!-- /.box-header -->

                <div class="box-body">
        
         <table cellspacing="0" id="view_order" class="tablesorter" border="1"> 

      <thead> 

        <tr align="left">
                <th width="600" height="40" align="left" valign="middle" class="details header">Product Name</th>
    
        <th width="50" height="40" align="left" valign="middle" class="details header">Quantity</th>
                <th width="200" height="40" align="left" valign="middle" class="details header">Unit Price</th>
                <th width="200" height="40" align="left" valign="middle" class="details header">Total</th>
                
                </tr>
                 
      </thead> 
            
            <tbody>
      
        <?php
         
         
         $sql = "select * from product_order_data where order_no = '".$resultorder[0]['order_no']."'"; 
         $row = $user->getResult($sql);
          $subtotal='';
         $grand_total = '';
         foreach ($row as $value) {

         $packagedetail=$user->getResult("SELECT * FROM `tbl_product_package` join tbl_product on tbl_product.id=tbl_product_package.product_id join product_varient on product_varient.id=tbl_product_package.varient_id join tbl_company on tbl_company.id=tbl_product_package.company_id where tbl_product_package.id='".$value['package_id']."'");

                 $subtotal += $value['product_qty']*( $value['product_price']*$currencyConverter);


          $product_price = $value['product_price']*$currencyConverter;
      $product_id = $value['product_id'];
      $result = $user->getResultById('tbl_product',$product_id);
      $product_name = $result['name'];
      //$product_tax_id = $result['product_tax'];
      //$result2 = $objU->getResultById('product_tax',$product_tax_id);
      //$tax_per = $result2['tax_per'];
      $total_tax =0;
      $subtotal = ($product_price*$value['product_qty'])+$total_tax;
      $grand_total += $product_price*$value['product_qty'];
 $currencydata=array("USD_INR"=>"₹","USD_EUR"=>"€","USD_USD"=>"$","USD_GBP"=>"£" );
                $cuurencysymbol= $currencydata[$resultorder[0]['shoping_currency']];
    
        //print_r($customrecord);
     ?>
      <tr>
        <td style="padding: 10px"><?php echo $packagedetail[0]['name'];?><br/><?php echo $packagedetail[0]['varient']; ?> <?php echo $packagedetail[0]['varient_unit']; ?> x <?php echo $packagedetail[0]['no_pills']; ?> pills</td>
        
          <td style="padding: 10px"><?php echo $value['product_qty']; ?></td>
        <td style="padding: 10px;"><?php echo $cuurencysymbol; ?> <?php echo number_format($product_price,2); ?></td>
        <td style="padding: 10px"> <?php echo $cuurencysymbol; ?> <?php echo number_format($subtotal,2);?></td>
      </tr> 
     <?php
     }
    ?>
    <tr>
      <td style="padding: 10px">&nbsp;</td>
      <td style="padding: 10px">&nbsp;</td>
      
      <td style="padding: 10px"><b>Grand Total</b></td>
      <td style="padding: 10px"><b><?php echo $cuurencysymbol; ?> <?php echo number_format($grand_total,2); ?></b></td>
    </tr>

    <!-- from this -->
      
       

       <!-- till this -->

            </tbody>


      </table>
        
          
          
          
          
          
                </div><!-- /.box-body -->
              </div><!-- /.box -->
     </div><!-- /.col-xs-6 -->
     
     
     
     
        
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include"inc/footer.php"; ?>
    <!-- page script -->
<style>
  .required{
    color:red;
  }
</style>
  
  <script>
  function validateFileExtension1(fld) {
      if(!/(\.PNG|\.JPG|\.JPEG|\.BMP)$/i.test(fld.value)) {
        alert("Invalid Image file type.");
        $("#photo_file").val("");
        fld.focus();        
        return false;   
      }   
      return true; 
    }
    $(document).ready(function(){

    });
  </script>
  </body>
</html>

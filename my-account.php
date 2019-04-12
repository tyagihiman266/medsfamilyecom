<section class="header-top-main">
<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";
      $userid = $_SESSION['user_id'] ;
      $uid = session_id() ;
         

          $cartcountpackage=$objU->getResult('select * from cart where user_temp_id="'.$uid.'"  ');
          $countcart=count($cartcountpackage);
      //  print_r(session_id());
    
         $usrsdt=$objU->getResult('select * from user_data where email="'.$userid.'"');
          $userdetail=$objU->getResult('select * from user_data,addressbook_data where user_data.id=addressbook_data.user_id and user_data.id="'.$userid.'"');

         if($_REQUEST['updateprofile']=='yes' && isset($_REQUEST['first']))
         {

           $fname=$_REQUEST['fname'];
            $lname=$_REQUEST['lname'];
            $name=$fname.' '.$lname;
             $mobile=$_REQUEST['mobile'];
             $address1=$_REQUEST['address1'];
             $address2=$_REQUEST['address2'];
             $country=$_REQUEST['country'];
             $state=$_REQUEST['state'];
             $city=$_REQUEST['city'];
             $post_code=$_REQUEST['post_code'];
             $id=$usrsdt[0]['id'];
 
 //update in addressbook_data
$check_data=$objU->getResult('select * from addressbook_data where user_id="'.$id.'"');
if(!empty($check_data)){
  $objU->QueryUpdateorder("update user_data set fname ='".$fname."',lname='".$lname."',name='".$name."',mobile='".$mobile."' where id='".$id."' ");   
  $objU->QueryUpdateorder("update addressbook_data set fname='".$fname."',lname='".$lname."',mobile='".$mobile."',address1='".$address1."',address2='".$address2."',country='".$country."'
  ,state='".$state."',city='".$city."',post_code='".$post_code."' where user_id='".$id."' ");   

    
}else{
       $colArray = array('fname'=>$fname,'lname'=>$lname,'user_id'=>$id,'mobile'=>$mobile,'address1'=>$address1,'address2'=>$address2,'country'=>$country,'state'=>$state,'city'=>$city,'post_code'=>$post_code);
       $resultU = $objU->insertQuery($colArray,'addressbook_data');
        $last_id = $resultU;
      $objU->QueryUpdateorder("update user_data set fname ='".$fname."',lname='".$lname."',name='".$name."',mobile='".$mobile."',addressbook_id='".$last_id."' where id='".$id."' ");   

                 
}
 
  $_SESSION['sess_success_msg_signup']="Profile Updated Successfully";
 ///update in user_data
  //$objU->QueryUpdateorder("update user_data set fname ='".$fname."',lname='".$lname."',name='".$name."',mobile='".$mobile."' where id='".$id."' ");
     echo "<META http-equiv='refresh' content='0;URL=my-account'>";
        }


        if($_REQUEST['walletsubmit']=='yes')
        {
         $currdate=date("Y-m-d H:i:s");
         $colArrayitem = array(
           'created_date' =>$currdate,
           'debit_ammount' =>0,
           'credit_ammount' => $_REQUEST['amount'],
           'user_id' =>$uid 
          );
          $objU->insertQuery($colArrayitem,'tbl_wallet');
        }

        if($_REQUEST['changepass']=='yes')
        {
         $pass=base64_encode($_REQUEST['verify_password']);
 $objU->QueryUpdateorder("update user_data set password='".$pass."' where id='".$uid."' ");

echo "<META http-equiv='refresh' content='0;URL=logout'>";
        }

                
   //print_r($usrsdt);
?>
</section>
<section class="clearfix">
	<div class="container">
	    <?php if(isset($_SESSION['sess_success_msg_signup'])){?>
	    	<div class="row bg-success" style="margin-top:10px;height:30px;padding:10px"><center><b><?php echo $_SESSION['sess_success_msg_signup'];?></b></center></div>
	    	<?php } ?>
		<div class="row">
			<section class="my-account">
  <div class="container">
    <div class="row">
        
<div class="col-md-12" style="border-bottom: 1px solid #ccc;
    margin-bottom: 20px;">
			<h3>My Account</h3>
			
		</div>


<?php include('accout-leftsidebar.php'); ?>


      <div class="col-md-10 my-account-right">
           <div class="col-md-12 pr-0">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#personalInfo">Personal Information</a></li>
    <li><a data-toggle="tab" href="#changePass">Change Password</a></li>
     <li><a data-toggle="tab" href="#mywallet">My Wallet</a></li>
  </ul>

  <div class="tab-content col-md-12">
    <div id="personalInfo" class="tab-pane fade in active">
      <div class="col-md-7 p-0">
    <form action="" method="post" id="first_form">
      <input type="hidden" name="updateprofile" value="yes">
    <table class="table">   
    <tbody><tr>
    </tr>
    <tr>
    <td width="30%">Fisrt Name</td>
    <td><div class="form-group"><input type="text" name="fname" id="" value="<?php echo $usrsdt[0]['fname'] ?>" placeholder="First Name" class="form-control"></div></td>
    </tr>
       <tr>
    <td width="30%">Last Name</td>
    <td><div class="form-group"><input type="text" name="lname" id="" value="<?php echo $usrsdt[0]['lname'] ?>" placeholder="Last Name" class="form-control"></div></td>
    </tr>
    <tr>
    <td>Mobile No</td>
    <td><div class="form-group"><input type="text" name="mobile" id="" value="<?php echo $userdetail[0]['mobile'] ?>" placeholder="Enter Mobile No" class="form-control"></div></td>
    </tr>
 
    <tr>
    <td>Address Line1</td>
    <td><div class="form-group"><input type="text" name="address1" id="" value="<?php echo $userdetail[0]['address1'] ?>" placeholder="Enter Address" class="form-control" ></div></td>
    </tr>
     <tr>
    <td>Address Line2</td>
    <td><div class="form-group"><input type="text" name="address2" id="" value="<?php echo $userdetail[0]['address2'] ?>" placeholder="Enter Address" class="form-control" ></div></td>
    </tr>
      <tr>
    <td>Country</td>
    <td>
      <div class="form-group custom-select">
                      
                        <select name="country" class="form-control" id="country">
                                          <?php   
                                            $query = "Select * from countries";
                                            $queryCn = $objU->getResult($query);
                                              foreach ($queryCn as $value) {
                                                   if(isset($_SESSION['sess_success_msg_signup'])){
                                                       $matchcountry=231;
                                                      
                                                   }else{
                                                       $matchcountry=$userdetail[0]['country'];
                                                   }
                                                
                                            ?>  
                                            <option value="<?php echo $value['id']; ?>" <?php if($matchcountry==$value['id']) { ?>selected <?php } ?> ><? echo $value['country']; ;?></option>              
                                            <?php }
                                          ?>                                   
                                   </select>
                                 
                    </div>
    </td>
    </tr>

     <tr>
    <td>State</td>
    <td>
        
   <input type="hidden" value="<?php if(isset($_SESSION['sess_success_msg_signup'])){
    echo 231;
    }elseif(!empty($userdetail[0]['country'])){
    echo  $userdetail[0]['country'];
    }else{
    echo 1;
    }?>" id="finalcountry"> 
      <div class="form-group custom-select">

                      
                        <select name="state" class="form-control" id="state"> 

                                          <!--  <?php                        
                                            $querystate = "Select * from state where country_id='".$userdetail[0]['country']."'";
                                            $querySt = $objU->getResult($querystate);
                                              foreach ($querySt as $valuest) {
                                            ?>  
                                            <option value="<?php echo $valuest['state_id']; ?>" <?php if($userdetail[0]['state']==$valuest['state_id']) { ?>selected <?php } ?> ><? echo $valuest['state']; ;?></option>              
                                            <?php }
                                          ?>      
-->
                                                                   
                                   </select>
                                  
                    </div>

    </td>
    </tr>
     <tr>
    <td>City</td>
    <td>     <div class="form-group custom-select">
                      
       <input type="text" name="city" value="<?php echo $userdetail[0]['city'] ?>"  placeholder="Enter City" class="form-control" >  
                        <select name="" class="form-control" id="city" style="display:none"> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                 <?php                        
                                            $querycity = "Select * from city where state_id='".$userdetail[0]['state']."'";
                                            $queryCt = $objU->getResult($querycity);
                                              foreach ($queryCt as $valuect) {
                                            ?>  
                                            <option value="<?php echo $valuect['city_id']; ?>" <?php if($userdetail[0]['city']==$valuect['city_id']) { ?>selected <?php } ?> ><? echo $valuect['city']; ;?></option>              
                                            <?php }
                                          ?>                                           
                                   </select>
             
                                   
                    </div></td>
    </tr>
     <tr>
    <td>Pincode</td>
    <td><div class="form-group"><input type="text" name="post_code" id="" value="<?php echo $userdetail[0]['post_code'] ?>" placeholder="Enter Pincode" class="form-control" ></div></td>
    </tr>
    <tr>

    <td colspan="2"><input type="submit" name="first" class="btn-default" value="UPDATE"></td>
    </tr>
    </tbody></table>
    </form>
    
    
      
      </div>
    </div>
    <div id="changePass" class="tab-pane fade">
    <div class="col-md-7 p-0">
    <form action="" method="post" id="password_form">
      <input type="hidden" name="changepass" value="yes">
      <table class="table">
      <tbody><tr>
      <td width="40%">Current Password</td>
      <td width="60%"><div class="form-group"><input type="password" name="c_password" id="c_password" placeholder="Current Password" class="form-control"></div></td>
      </tr>
      <tr>
      <td>New Password</td>
      <td><div class="form-group"><input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control"></div></td>
      </tr>
      <tr>
      <td>Verify Password</td>
      <td><div class="form-group"><input type="password" name="verify_password" id="verify_password" placeholder="Verify Password" class="form-control"></div></td>
      </tr>
      <tr>
      <td colspan="2"><input type="submit" class="btn-default" name="second" id="changepass" value="Change Password"></td>
      </tr>
      </tbody></table>
    </form>
    
      
      </div>
    </div>


     <div id="mywallet" class="tab-pane fade">
    <div class="col-md-7 p-0">
    <form action="" method="post" id="wallet_form">
      <input type="hidden" name="walletsubmit" value="yes">
      <table class="table">
      <tbody><tr>
      <td width="40%">Wallet Amount</td>
      <td width="60%"><div class="form-group"><input type="password" name="amount" id="amount" placeholder="Amount" class="form-control"></div></td>
      </tr>
   
     
      <tr>
      <td colspan="2"><input type="submit" class="btn-default" name="second" id="addamount" value="Add Amount"></td>
      </tr>
      </tbody></table>
    </form>
    
      
      </div>
    </div>
    
    
  </div>

           </div>
        </div>
    </div>  
  </div>  
</section>
			
			
		</div>
	</div>
</section>
  <input type="hidden" value="<?php if(!empty($userdetail)){ echo $userdetail[0]['state']; }else{echo "NA";} ?>" id="select_state">  
<?php include "include/footer.php" ?>
<script type="text/javascript">

   var country=$("#finalcountry").val();
   var select_state=$("#select_state").val();
   //  alert(select_state);
  
     $.ajax({
            type: "post",
            url: "ajax/getstate.php",
            data: {"country_id":country,"select_state":select_state},
            success: function(result){
             $("#state").html(result);
           
        }});
 $(document).on('change','#country',function(){

      var country=$('#country').val();
     $.ajax({
            type: "post",
            url: "ajax/getstate.php",
            data: {"country_id":country},
            success: function(result){
             $("#state").html(result);
           
        }});


    });

      $(document).on('change','#state',function(){

      var state=$('#state').val();
     $.ajax({
            type: "post",
            url: "ajax/getcity.php",
            data: {"state_id":state},
            success: function(result){
             $("#city").html(result);
           
        }

    });


    });

      $(document).on('submit','#password_form',function(){

       var currentpass=$('#c_password').val();
       var newpass=$('#new_password').val();
       var verifypass=$('#verify_password').val();
       if(currentpass=='' || newpass=='' || verifypass=='' )
       {
        alert('Please fill all require filed');
         return false;

       } 

       if(newpass!=verifypass )
       {
         alert('new password and verify password should same');
         return false;

       }

        if(currentpass!='')
       {
              $.ajax({
    type : 'POST',
    url : 'ajax/check_user_pass.php',
    data : {"currentpass":currentpass} ,
     success: function(result){
      if(result==0){

       alert('please enter correct curent password');
       return false;
      }
     // window.location.href='thankyou';
         //  $("#getbilling").html(result);
           
        }
})
               return false;

       }




      });


</script>
<?php  if(isset($_SESSION['sess_success_msg_signup'])){ unset($_SESSION['sess_success_msg_signup']);   }?>

<section class="header-top-main">
<?php 
$pagetitle="pharmacy";
$keyword="All medicin available";
$description="pharmacy Website";
include "include/header.php";

               if($_REQUEST['submitsignup']=='yes') 
                     {

                        $fname = $_POST['firstname'];
                        $lname = $_POST['lastname'];
                        $name= $fname.' '.$lname;
                        $email = $_POST['email'];   
                // $password = $_POST['password'];
                  $password = base64_encode($_POST['password']);
                  $is_allergies = $_POST['allergies'];
                  $allergieproduct = $_POST['allergen'];
                  $is_medication = $_POST['is_medication'];
                  $allmedicationproduct = $_POST['allmedication'];
                  $is_condition = $_POST['is_condition'];
                  $allconditionproduct = $_POST['allcondition'];
                  $is_smoke = $_POST['smoke'];
                  $is_drink=$_POST['drink'];
                  $height_in_ft=$_POST['height_in_ft'];
                  $height_in_in=$_POST['height_in_in'];
                  $weight=$_POST['weight'];
                  $weight_unit=$_POST['weight_unit'];
                // $result = mysql_query("SELECT * FROM user_data where email ='".$email."'");
                // $num_rows = mysql_num_rows($result);

                   $query = "SELECT * FROM user_data where email ='".$email."' ";
                   $result = $objU->getResult($query);
                   $num_rows = count($result);

                if($num_rows > 0){
                   $_SESSION['sess_msg_signup']='You are already registerd please login';  
                    }

                    else{
                        
                    $colArray = array('password'=>$password,'name'=>$name,'email'=>$email,'fname'=>$fname,'lname'=>$lname,'status'=>1,'is_allergies'=>$is_allergies,'allergieproduct'=>$allergieproduct,'is_medication'=>$is_medication,'allmedicationproduct'=>$allmedicationproduct,'is_condition'=>$is_condition,'allconditionproduct'=>$allconditionproduct,'is_smoke'=>$is_smoke,'is_drink'=>$is_drink,'height_in_ft'=>$height_in_ft,'height_in_in'=>$height_in_in,'weight'=>$weight,'weight_unit'=>$weight_unit);
                    $resultU = $objU->insertQuery($colArray,'user_data');
                    $last_id = $resultU;

                    if ($resultU!=true) {
                        die();
                    }

                    



                      $_SESSION['fname'] = $fname;
                    $_SESSION['lname'] = $lname;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_id'] = $last_id;

                    //$resultU = mysql_query($sqlU);
                                    
                                $str = base64_encode($email);

                                $email_message = "\n Welcome to Medsfamily.";
                        $email_subject = 'Medsfamily';

                        $email_from = 'info@medsfamily.com';

                        $email_to = $email;

                    
                        $headers = 'From: '.$email_from."\r\n".

                        'MIME-Version: 1.0' . "\r\n".

                        'Content-type: text/html; charset=iso-8859-1' . "\r\n".

                        'Reply-To: '.$email_from."\r\n" .

                        'X-Mailer: PHP/' . phpversion();

                     $mail= @mail($email_to, $email_subject, $email_message, $headers); 

                     if ($mail == TRUE) {                

               
                      
                    echo "<META http-equiv='refresh' content='0;URL=my-account'>";

                   // header('Location:index.php');

                   

                     } else {

                    $_SESSION['msg'] = '
                        <script>
                            alert("You are not Ragistered");
                        </script>';

                    // header('Location:index.php');

                  echo "<META http-equiv='refresh' content='0;URL=my-account'>";

                 // header('Location:register.php?status=fail');

                  

                    }

        

                    }


                      }




?>
</section>
<section class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12 login-padding regis-sec">
				<h3 class="login-sec-top">Create New Customer Account</h3>
          <form action="" method="POST" id="signupform" role="form" class="custom-form">
				<div class="login-warp clearfix">
					<div class="col-md-6 col-xs-12 login-sec">
						<h3>Personal Information</h3>
				
							<input type="hidden" name="submitsignup" value="yes">
							<div class="form-group">
								<label for="">First Name <span class="color-red">*</span></label>
							<input type="text" name="firstname" class="form-control" id="fname" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Last Name <span class="color-red">*</span></label>
								<input type="text" name="lastname" class="form-control" id="lname" placeholder="" required>
							</div>
						<div class="form-group">
								<label for="">Email <span class="color-red">*</span></label>
								<input type="text" name="email" class="form-control" id="email" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Password <span class="color-red">*</span></label>
								<input type="password" name="password" class="form-control" id="pass" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="">Confirm Password <span class="color-red">*</span></label>
								<input type="password" name="password_confirm" class="form-control" id="confirm_pass" placeholder="" required>
							</div>
					
					</div>
					<div class="col-md-6 col-xs-12 create-acc-sec right-med-reg">
						<h3>Medical Conditions</h3>
					<p>Please go on to fill in your medical conditions</p>
					<div>
					<table class="table">
							<tbody><tr>
							<td class="border-none" width="20%">Allergies:<sup class="color-red">*</sup></td>
							<td class="custom-check border-none" width="10%">
							<ul>
							<li>
							<div class="checkbox new-check">
							<input id="allergies" name="allergies" type="checkbox" value="0">
							<label for="allergies"> </label>
								 </div>
								</li>
							</ul>
							</td>
							<td class="border-none">
							<span>No known Allergies</span>
							</td>
							</tr>
							</tbody>
							</table>
						</div>
						<div >
							<div id="allergen">
								<label for="">Allergen <span class="color-red">*</span></label>
                             <div class="totalallergen"></div>
                             <input type="hidden" name="allergen" id="allergenval">

							<input type="text" name="" id="autocomplete" class="form-control" placeholder="">
						</div>
							
						<table class="table">
							<tbody><tr>
							<td class="border-none" width="20%"><sup class="color-red">*</sup>Medications:</td>
							<td class="custom-check border-none" width="10%">
							<ul>
							<li>
							<div class="checkbox new-check">
							<input id="medication" name="is_medication" type="checkbox" value="0">
							<label for="medication"> </label>
								 </div>
								</li>
							</ul>
							</td>
							<td class="border-none">
							<span>No Current medications</span>
							</td>
							</tr>
							</tbody>
							</table>
					</div>
								<div>
									<div id="medicationproduct">
								<label for="">Medication <span class="color-red">*</span></label>
								   <div class="totalmedication"></div>
								      <input type="hidden" name="allmedication" id="allmedication">
							<input type="text" name="" class="form-control" id="autocomplete2" placeholder="" >
							 </div>
						<table class="table">
							<tbody><tr>
							<td class="border-none" width="20%"><sup class="color-red">*</sup>Medications:</td>
							<td class="custom-check border-none" width="10%">
							<ul>
							<li>
							<div class="checkbox new-check">
							<input id="medication2" name="is_condition" type="checkbox" value="0">
							<label for="medication2"> </label>
								 </div>
								</li>
							</ul>
							</td>
							<td class="border-none">
							<span>No Conditions</span>
							</td>
							</tr>
							</tbody>
							</table>
					</div>
					<div class="form-group" id="condition">
							<label for="">Condition <span class="color-red">*</span></label>
							<div class="totalcondition"></div>
							  <input type="hidden" name="allcondition" id="allcondition">
							<input type="text" name="" class="form-control" id="autocomplete3" placeholder="">
						
					</div>
					
						<div class="form-group">
						<p>Other Conditions:</p>
						
						<label>Do you Smoke</label>
						<div>
						<input type="radio" name="smoke" value="No">No	
						<input type="radio" name="smoke" value="Yes">Yes	
							</div>	
										
						</div>
						<div class="form-group">
							
						
						<label>Do you Drink</label>
						<div>
						<input type="radio" name="drink" value="No">No	
						<input type="radio" name="drink" value="Yes">Yes	
							</div>	
										
						</div>
						<div class="form-group">
							
						
						
						<div class="col-md-6 p-0">
						<label>Height<span class="color-red">*</span></label>
						<div>
						<select name="height_in_ft">
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
							
							</select>Ft
							
							<select name="height_in_in">
					    <option value="1">1</option>
						<option value="2">2</option>
					    <option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
							
							</select>In
							</div>
							</div>
							
							<div class="col-md-6 p-0">
							<div class="pull-right">
							<label>Weight<span class="color-red">*</span></label>
							<input type="text" class="form-control form-weight" name="weight" id="weight">
						<select name="weight_unit">
						<option value="Lbs">Lbs</option>
						<option value="Kg">Kg</option>
						
							
							</select>
							</div>
							</div>	
										
						</div>
						
					</div>
					<div class="col-md-12 col-xs-12 create-m-b">
						<button class="create-account" type="submit" name="submit">Create an account</button>
					
					</div>
					
				</div>
      </form>
			</div>
		</div>
	</div>
</section>



<?php include "include/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

    <link href='css/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='js/jquery-ui.min.js' type='text/javascript'></script>
<script>
$("#signupform").validate({
    rules:{
      firstName: 'required',
      lastName: 'required',
      email:{
        required: true,
        email: true
      },
      password:{
        required: true,
        minlength: 6
      },
      password_confirm : {
                    minlength : 6,
                    equalTo : "#pass"
                }
    },
    messages: {
      firstName: 'This field is required',
      lastName: 'This field is required',       
      email: {
        equired: "Please enter email",
        email: "Please enter email type"
      },
      password: {
        required: "Please enter Current Password",
        minlength: "Please enter atleast 6 Charecter"
      },
      password_confirm:'Password and confirm password should same.'
    }

  });



$(document).on('submit','#signupform',function(){
 

  if($('#allergies').is(':checked')){ 

  // $('#allergies').prop('value',1);
  	$('#allergies').val(1);
  	//alert('hello');
  }  else {

  		$('#allergies').val(0);
  }

var allge=[];
$('.totalallergen').find('span').each(function(){

var pidall=$(this).find('a').attr('id');
allge.push(pidall);
})
var strallge = allge.toString();
var strallge2 = String(allge);
$('#allergenval').val(strallge2);







  if($('#medication').is(':checked')){

  	$('#medication').val(1);
  } else {
$('#medication').val(0);

  }
var allmedication=[];
$('.totalmedication').find('span').each(function(){

var pidmed=$(this).find('a').attr('id');
allmedication.push(pidmed);
})
var strmedi = allmedication.toString();
var strmedi2 = String(strmedi);
$('#allmedication').val(strmedi2);



if($('#medication2').is(':checked')){

  	$('#medication2').val(1);
  }  else {
	$('#medication2').val(0);

  }
var allcondition=[];
$('.totalcondition').find('span').each(function(){

var pidcondition=$(this).find('a').attr('id');
allcondition.push(pidcondition);
})
var strcondition = allcondition.toString();
var strcondition2 = String(strcondition);
$('#allcondition').val(strcondition2);





var drink=$('input[name=drink]:checked').val();
var smoke=$('input[name=smoke]:checked').val();
var allalergy=$('#allergenval').val();
var weight=$('#weight').val();
var aller=$('#allergies').val();
var med=$('#medication').val();
var cond=$('#medication2').val();
var allmedic=$('#allmedication').val();
var allmed=$('#medication').val();
var allmed2=$('#medication2').val();
var allcondi=$('#allcondition').val();
if(aller==0 && allalergy==''){
   alert('Please select any Allergies');
   return false;

}

if(allmed==0 && allmedic==''){
   alert('Please select any Medication');
   return false;

}

if(allmed2==0 && allcondi==''){
   alert('Please select any condition');
   return false;

}
if(weight==''){
  alert('Please enter weight');
   return false;

}




});


$(document).on('click','#allergies',function(){


 if($(this).is(':checked')){

 	$('#allergen').hide();
   

} else {
$('#allergen').show();

}



});

$(document).on('click','#medication',function(){
	


 if($(this).is(':checked')){

 	$('#medicationproduct').hide();
   

} else {
$('#medicationproduct').show();

}
 


});

$(document).on('click','#medication2',function(){
	


 if($(this).is(':checked')){

 	$('#condition').hide();
   

} else {
$('#condition').show();

}


 


});


$(document).ready(function(){



        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "ajax/getproductlist.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {

            	$('#allergies').attr('disabled',true);
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('.totalallergen').append('<span id="pall_'+ui.item.value+'">'+ ui.item.label+'&nbsp;<a onclick="removeitemall('+ui.item.value+')" id="'+ui.item.value+ '">DEL</a><br/></span>'); // save selected id to input
                 $('#autocomplete').val('');

                return false;
            }
        });



    $( "#autocomplete2" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "ajax/getproductlist.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {

            	$('#medication').attr('disabled',true);
                $('#autocomplete2').val(ui.item.label); // display the selected text
                $('.totalmedication').append('<span id="pmedi_'+ui.item.value+'">'+ ui.item.label+'&nbsp;<a onclick="removeitemmed('+ui.item.value+')" id="'+ui.item.value+ '">DEL</a><br/></span>'); // save selected id to input
                 $('#autocomplete2').val('');

                return false;
            }
        });


    $( "#autocomplete3" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "ajax/getproductlist.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {

            	$('#medication2').attr('disabled',true);
                $('#autocomplete3').val(ui.item.label); // display the selected text
                $('.totalcondition').append('<span id="pcondition_'+ui.item.value+'">'+ ui.item.label+'&nbsp;<a onclick="removeitemcondition('+ui.item.value+')" id="'+ui.item.value+ '">DEL</a><br/></span>'); // save selected id to input
                 $('#autocomplete3').val('');

                return false;
            }
        });









});

function removeitemall(id){

	$('#pall_'+id).remove();
	var lent=$('.totalallergen').find('span').length
	if(lent==0){
$('#allergies').prop('disabled',false);

}
/*
var a=[];
$('.totalallergen').find('span').each(function(){

var pid=$(this).find('a').attr('id');
a.push(pid);
})
var str1 = a.toString(); // Gives you "42,55"
var str2 = String(a); // Ditto
console.log(str2);
*/

}

function removeitemmed(id){

	$('#pmedi_'+id).remove();
	var lent=$('.totalmedication').find('span').length
	if(lent==0){
$('#medication').prop('disabled',false);

}
}

function removeitemcondition(id){

	$('#pcondition_'+id).remove();
	var lent=$('.totalcondition').find('span').length
	if(lent==0){
$('#medication2').prop('disabled',false);

}
}

</script>

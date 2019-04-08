<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

  
if($_REQUEST['country_id'])
                {


                     

                
$currencydata=array("USD_INR"=>"₹","USD_EUR"=>"€","USD_USD"=>"$","USD_GBP"=>"£" );
              
                 
                $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://free.currencyconverterapi.com/api/v5/convert?q=".$_REQUEST['country_id']."&compact=y");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch); // string
    curl_close($ch);

    $ip_data = json_decode($ip_data_in,true);
  

    
      $ip_data = json_decode($ip_data_in,true);
	  
	  
   
      $_SESSION['current_symbol']= $_REQUEST['country_id'];
   $_SESSION['currencySymbol']= $currencydata[$_REQUEST['country_id']];
    $_SESSION['currencyConverter']= $ip_data[$_REQUEST['country_id']]['val'];

         

}
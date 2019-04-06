<?php
@session_start();
include '../controls/Users.php';
include '../medsfamily_function.php' ;
$objU = new User();

   
if(isset($_POST['search'])){
    $search = $_POST['search'];
    
                ///salt search

                $query = "SELECT * FROM tbl_product WHERE salt_name like'%".$search."%' group by salt_name ";
                $result = $objU->getResult($query);
                $num_rows = count($result);

                if($num_rows >0){ 
                
                foreach($result as $key => $val){
                
                $catname=$objU->getResult("select category_name from manage_category where id='".$val['cat_id']."'");
                
                
                $response[] = array("value"=>$val['id'],"label"=>buildReverseURL($val['salt_name']),"full_name"=>$val['salt_name']
                ,"cat_name"=>buildReverseURL($catname[0]['category_name']),"check"=>"category");
                
                
                } 
                
                
                }
                
                ///product search
                
                    $query = "SELECT * FROM tbl_product WHERE name like'%".$search."%' ";
                    $result = $objU->getResult($query);
                    $num_rows = count($result);
                    
                    if($num_rows >0){ 
                    
                    foreach($result as $key => $val){
                    
                $catname=$objU->getResult("select category_name from manage_category where id='".$val['cat_id']."'");
                
                
                $response[] = array("value"=>$val['id'],"label"=>buildReverseURL($val['name']),"full_name"=>$val['name']
                ,"cat_name"=>buildReverseURL($catname[0]['category_name']),"check"=>"product");
                    
                    
                    } 
                    
                    
                    }
                
                ///tags search
                
               $query = "SELECT * FROM product_tags WHERE tag_name like'%".$search."%' group by product_id,tag_name ";
                $result = $objU->getResult($query);
                $num_rows = count($result);
                if($num_rows >0){ 
                
                        foreach($result as $key => $val){
                        
                                  $query1 = "SELECT * FROM tbl_product WHERE id='".$val['product_id']."' group by salt_name ";
                                  $result1 = $objU->getResult($query1);
                                   $num_rows1 = count($result1);
           
                                if($num_rows1 >0){ 
                                     foreach($result1 as $key1 => $val1){
                                    
                                               $catname1=$objU->getResult("select category_name from manage_category where id='".$val1['cat_id']."' group by category_name");
             
                                            //print_r($catname1);
                                            
                                           $response[] = array("value"=>$val1['id'],"labelname"=>buildReverseURL($val1['salt_name']),
                                           "label"=>buildReverseURL($val['tag_name']),"full_name"=>$val1['salt_name']
                                              ,"cat_name"=>buildReverseURL($catname1[0]['category_name']),"check"=>"tags");
                                      }
                                }
                        
                        } 
                }
                
  echo json_encode($response);

              }

              


<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/TicketsResponse.class.php");
include("../model/Status.class.php");
$tr =new TicketsResponse(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$st =new Status(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$error = "";
$is_admin=0;
$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
  if(count($_POST) > 0){
         	   

	   		// if errors
		if($error != ""){
		   echo $error;
            }
                 else{
                     
                 
                     
                       $is=($_POST['tickets_status_trt']=="Pending") ? '2' : '1';  
                            
             
                    $res=$tr->createNewTicketsResponse(
                    $_POST['id'],
                    $_POST['tickets_no_tat'],
                    $_POST['tickets_status_trt'],
                    $_POST['response_date_trt'],
                    $_POST['response_details_trt'],
                    $_POST['required_time_trt'],
                    $_POST['hardware_required_trt'],
                    0,
                    $_POST['item01_trt'],
                    $_POST['item02_trt'],
                    $_POST['item03_trt'],
                    $_POST['item04_trt'],
                    $_POST['item05_trt'],
                    $_POST['org_name_trt'],
                     getServerDate(),
                       getServerTime()
                        );
                    
                    
                   
                    
                    $res=$st->updateStatusTwo(
                    $_POST['id'],
                    $_POST['tickets_no_tat'],
                    '0',
                    '0',
                    $is,
                    $_POST['st04_st'],
                    $_POST['st05_st'],
                    $_POST['st06_st'],
                    $_POST['st07_st'],
                    $_POST['st08_st'],
                    $_POST['st09_st'],
                    $_POST['st10_st'],
                    $assign_name_tat,
                      getServerDate(),
                       getServerTime()
                     );
                    
                    
                    
                    
                    
                                      if($res==true){         
					  echo("1");
					  }
					  else
					  {
						  echo("<b>Add operation is fail.</b>");
					  }
				
    
	     }		
		}
		else{
			echo(false);
			}

 
?>
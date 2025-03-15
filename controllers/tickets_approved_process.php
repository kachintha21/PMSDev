<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/TicketsApproved.class.php");
include("../model/Status.class.php");
$tip =new TicketsApproved(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
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
                     
                                           $is=($_POST['possibility_tat']=="Approved") ? '1' : '2';  
                                           $assign_name_tat=($_POST['possibility_tat']=="Approved") ? $_POST['assign_name_tat'] : '-';
             
                    $res=$tip->createNewTicketsApproved(
                    $$_POST['id'],
                    $_POST['tickets_no_tat'],
                    $assign_name_tat,
                    getServerDate(),
                    $_POST['possibility_tat'],
                    0,
                    $_POST['item01_tat'],
                    $_POST['item02_tat'],
                    $_POST['item03_tat'],
                    $_POST['item04_tat'],
                    $_POST['item05_tat'],
                    $_POST['org_name_tat'],        
                      getServerDate(),
                       getServerTime()
                        );
                    
                    
                    $res=$st->updateStatus(
                    $_POST['id'],
                    $_POST['tickets_no_tat'],
                    '0',
                    $is,
                    $_POST['st03_st'],
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
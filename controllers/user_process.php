<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/User.class.php");
$user =new User(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

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
                     
      
                    
                                $res=$user->createNewUser(
                                $_POST['id'],	
                                $_POST['emp_no'],	
                                $_POST['user_name'],	
                                $_POST['password'],	
                                $_POST['fname'],	
                                $_POST['lname'],	
                                $_POST['section'],	
                                $_POST['is_admin'],	
                                $_POST['is_data'],	
                                $_POST['is_edit'],	
                                $_POST['is_report'],	
                                $_POST['log_ip'],	
                                $_POST['log_date'],	
                                $_POST['log_time'],	
                                $_POST['item01'],	
                                $_POST['item02'],	
                                $_POST['item03'],	
                                $_POST['item04'],	
                                $_POST['item05'],	
                                $_POST['item06'],	
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
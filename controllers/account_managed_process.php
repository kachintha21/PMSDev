<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/Skill.class.php");
$st =new Skill(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


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
        
                     
            
                                                 $products = array();
                                                foreach ($_POST['pro_name_st'] as $key => $id) {
                              
                                                  $products = array(
                                                        'code' => $id,
                                                       'pro_name_st' => $_POST['pro_name_st'][$key],
                                              
                                                   
);         

                   

                                                  
                                                  
                                 $res=$st->createNewSkill(
                                 $_POST['id'], $_POST['emp_no_st'], $_POST['pro_name_st'][$key], 0, $_POST['org_name_st'], getServerDate(), getServerTime()
                                  );
                    
                                      
                                          
                                          
                                          
                                                }  
                                                
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
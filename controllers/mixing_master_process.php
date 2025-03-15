<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/OilData.class.php");
$tip = new OilData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
        
                                     list($part1, $part2) = explode('-', $_POST['colours_code_ct']);
            
                                                 $products = array();
                                                foreach ($_POST['oil_name_odt'] as $key => $id) {
                              
                                                         $products = array(
                                                        'code' => $id,
                                                       'oil_name_odt' => $_POST['oil_name_odt'][$key],
                                                       'oil_qty_odt' => $_POST['oil_qty_odt'][$key]
                                        
                                                   
);         

                                        $res=$tip->createNewOilData(
                                        $_POST['id'],
                                        $_POST['ref_no_odt'],
                                        $_POST['pattern_no_ct'],
                                        $part1,
                                         $part2,
                                        $_POST['oil_name_odt'][$key],
                                        $_POST['oil_qty_odt'][$key],
                                        $_POST['mixing_oil_odt'],
                                        0,
                                        $_POST['item01_odt'],
                                        $_POST['item02_odt'],
                                        $_POST['item03_odt'],
                                        $_POST['item04_odt'],
                                        $_POST['item05_odt'],
                                        $_POST['org_name_odt'],                          
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
		}
		else{
			echo(false);
			}

 
?>
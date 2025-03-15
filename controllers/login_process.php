<?php
 session_start();
 error_reporting(E_PARSE|E_WARNING|E_ERROR);
 include("../include/conn.php");
$error = "";
$is_admin=0;


$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;

	 if(count($_POST) > 0){


      if(trim($_POST['username']) == ""){
			$error .= "Please enter user name <br>";
	   }

      if(trim($_POST['password']) == ""){
			$error .= "Please enter password <br>";
	   }
	   
		// if errors
		if($error != ""){
		   echo $error;
       }
           else{
               
              
               
                    $res = "SELECT *FROM user_tbl u WHERE u.user_name = '".$_POST['username']."' AND  u.password = PASSWORD('".$_POST['password']."') ";
                    $result = $conn->query($res); 

                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $resultset[] = $row;                                                             
                              $_SESSION['logged_usr_id']=$row['user_name'];
                              $_SESSION['logged_usr_depat']=$row['section'];
                              
                              echo("1");
                               
                            }

                        }
                            else{
                                   echo("Username and Password are incorrect");


                            }

                  
                 


              
                   
                   
               }
         
                      
                    
              
               

	     		
		}
		else{
			echo(false);
			}


?>
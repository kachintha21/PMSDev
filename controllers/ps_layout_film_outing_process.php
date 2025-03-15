<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
session_start();
include("../include/db.php");
date_default_timezone_set("Asia/Colombo");
$error = "";

$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;




	 if(count($_POST) > 0){
	
		if(trim($_POST['pname']) == ""){
			$error .= "Please enter modle name.<br>";
	  }
		// if errors
		if($error != ""){
		   echo $error;
       }
              else{
		$_SESSION['pname']=trim($_POST['pname']);
                echo("1");
				
		}
				
		}
		else{
			echo(false);
                        
                        
		 }
				
		   
		    				
		   
		




?>
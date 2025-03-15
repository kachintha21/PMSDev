<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/DecalInsCycletime.class.php");


$lt = new DecalInsCycletime(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


$error = "";
$is_admin = 0;
$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
if (count($_POST) > 0) {


    // if errors
    if ($error != "") {
        echo $error;
    } else {
         $work_time_mlt=($_POST['number_shift_mlt']=="2") ? '1040' : '520'; 
          if ($_POST['id']) {
         
               
              $res = $lt->updateMachineCalendar(
                $_POST['id'], $_POST['date_mlt'], $_POST['machine_no_mlt'], $_POST['number_shift_mlt'], $work_time_mlt,$_POST['is_edit_mlt'], $_POST['item01_mlt'], $_POST['item02_mlt'], $_POST['item03_mlt'], $_POST['item04_mlt'], $_POST['item05_mlt'], $_POST['org_name_mlt'], getServerDate(), getServerTime()
        );
   
          }        
          
          else{  	
	  
        $res = $lt->createNewMachineCalendar(
                $_POST['id'],  $_POST['arrange'], $_POST['ins'], $_POST['seal'], $_POST['datain'], 0, $_POST['item01_mlt'], $_POST['item02_mlt'], $_POST['item03_mlt'], $_POST['item04_mlt'], $_POST['item05_mlt'], $_POST['org_name_mlt'], getServerDate(), getServerTime()
        );

   }

        echo("1");
    }
} else {
    echo(false);
}
?>
<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/LeadTime.class.php");



$lt = new LeadTime(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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


  if ($_POST['id']) {
        $res = $lt->updateLeadTime(
            $_POST['id'],
            $_POST['design_ltt'],
            $_POST['pro_name_ltt'],
            $_POST['pattern_no_ltt'],
            $_POST['is_edi_ltt'],
            $_POST['item01_llt'],
            $_POST['item02_llt'],
            $_POST['item03_llt'],
            $_POST['item04_llt'],
            $_POST['item05_llt'],
            $_POST['org_name_llt'],
           getServerDate(), getServerTime()
        );
     } else {
         
             $res = $lt->createNewLeadTime(
            $_POST['id'],
            $_POST['pattern_name'],
            $_POST['pro_name_ltt'],
            $_POST['pattern_no_ltt'],
          0,
            $_POST['item01_llt'],
            $_POST['item02_llt'],
            $_POST['item03_llt'],
            $_POST['item04_llt'],
            $_POST['item05_llt'],
            $_POST['org_name_llt'],
           getServerDate(), getServerTime()
        );
     }


        echo("1");









    }
} else {
    echo(false);
}
?>
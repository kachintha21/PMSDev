<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/ColorCode.class.php");
$dc = new ColoursCode(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
        $res = $dc->updateColoursCode(
                $_POST['id'], $_POST['pattten_no_cct'], $_POST['color_code_cct'], $_POST['color_name_cct'], $_POST['item01_cct'], $_POST['item02_cct'], $_POST['item03_cct'], $_POST['org_name_cct'],  getServerDate(), getServerTime()
        );
             } else {
                 
                  $res = $dc->createNewColoursCode(
                $_POST['id'], $_POST['pattten_no_cct'], $_POST['color_code_cct'], $_POST['color_name_cct'], $_POST['item01_cct'], $_POST['item02_cct'], 0, $_POST['org_name_cct'],  getServerDate(), getServerTime()
        );  
             }



        echo("1");
    }
} else {
    echo(false);
}
?>
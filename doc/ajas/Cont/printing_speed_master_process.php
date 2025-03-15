<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PrintingSpeedMaster.class.php");
$pm = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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
        $res = $pm->createNewPrintingSpeedMaster(
                    $_POST['id'], $_POST['pattern_no_psmt'], $_POST['color_index_psmt'], $_POST['printing_speed_psmt'],$_POST['is_edit_psmt'], $_POST['item01_psmt'], $_POST['item02_psmt'], $_POST['item03_psmt'], $_POST['item04_psmt'], $_POST['item05_psmt'], $_POST['org_name_psmt'], getServerDate(), getServerTime()
            );
        } else {
            
              $products = array();
        foreach ($_POST['color_index_psmt'] as $key => $id) {

            $products = array(
                'code' => $id,
                'color_index_psmt' => $_POST['color_index_psmt'][$key],
                'printing_speed_psmt' => $_POST['printing_speed_psmt'][$key]
            );


            $res = $pm->createNewPrintingSpeedMaster(
                    $_POST['id'], $_POST['pattern_no_psmt'], $_POST['color_index_psmt'][$key], $_POST['printing_speed_psmt'][$key],0, $_POST['item01_psmt'], $_POST['item02_psmt'], $_POST['item03_psmt'], $_POST['item04_psmt'], $_POST['item05_psmt'], $_POST['org_name_psmt'], getServerDate(), getServerTime()
            );
        }
            
            
        }
      
        echo("1");



     
    }
} else {
    echo(false);
}
?>
<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/Defect.class.php");
$def = new Defect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

        $res = $def->updateDefect(
            $_POST['id'],
            $_POST['defect_name_dt'],
            $_POST['item01_dt'],
            $_POST['item02_dt'],
            $_POST['item03_dt'],
            $_POST['item04_dt'],
            $_POST['item05_dt'],
            $_POST['is_edit_dt'],
            $_POST['org_name_dt'],
            getServerDate(),
            getServerTime()
        );
    } else {

          $res = $def->createNewDefect(
            $_POST['id'],
            $_POST['defect_name_dt'],
            $_POST['item01_dt'],
            $_POST['item02_dt'],
            $_POST['item03_dt'],
            $_POST['item04_dt'],
            $_POST['item05_dt'],
            0,
            $_POST['org_name_dt'],
            getServerDate(),
            getServerTime()
        ); 

    }
              
                echo("1");
        

    }
} else {
    echo(false);
}
?>
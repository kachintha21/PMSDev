<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/YieldMaster.class.php");
$dc = new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
            $res = $dc->updateYieldMaster(
                    $_POST['id'], $_POST['fg_design_no_ymt'], $_POST['curve_no_ymt'], $_POST['decal_design_no_ymt'], $_POST['yield_value_ymt'], $_POST['is_edit_ymt'], getServerDate(), getServerTime()
            );
        } else {
            $res = $dc->createNewYieldMaster(
                    $_POST['id'], $_POST['fg_design_no_ymt'], $_POST['curve_no_ymt'], $_POST['decal_design_no_ymt'], $_POST['yield_value_ymt'], 0, getServerDate(), getServerTime()
            );
        }
        echo("1");
    }
} else {
    echo(false);
}
?>
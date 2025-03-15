<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/CurveMaster.class.php");
$dc = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
            $res = $dc->updateCurveMaster(
                    $_POST['id'], $_POST['decal_design_no_cmt'], $_POST['curve_no_cmt'], $_POST['fg_design_no_cmt'], $_POST['curve_area_cmt'], $_POST['is_edit_cmt'], getServerDate(), getServerTime()
            );
        } else {
            $res = $dc->createNewCurveMaster(
                    $_POST['id'], $_POST['decal_design_no_cmt'], $_POST['curve_no_cmt'], $_POST['fg_design_no_cmt'], $_POST['curve_area_cmt'], '0', getServerDate(), getServerTime()
            );
        }
        echo("1");
    }
} else {
    echo(false);
}
?>
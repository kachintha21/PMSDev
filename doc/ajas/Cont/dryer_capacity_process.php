<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/DryerCapacity.class.php");
$dc = new DryerCapacity(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
            $res = $dc->updateDryerCapacity(
                    $_POST['id'], $_POST['machine_no_dct'], $_POST['capacity_dct'], $_POST['is_edit_dct'], $_POST['org_name_dct'], getServerDate(), getServerTime()
            );
        } else {
            $res = $dc->createNewDryerCapacity(
                    $_POST['id'], $_POST['machine_no_dct'], $_POST['capacity_dct'], 0, $_POST['org_name_dct'], getServerDate(), getServerTime()
            );
        }

        echo("1");
    }
} else {
    echo(false);
}
?>
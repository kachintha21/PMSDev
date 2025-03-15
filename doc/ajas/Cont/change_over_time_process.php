<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/ChangeOverTime.class.php");
$co = new ChangeOverTime(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
            $res = $co->updateChangeOverTime(
                    $_POST['id'], $_POST['time_cott'], $_POST['machine_no_cott'], $_POST['is_edit_cott'], $_POST['item01_cott'], $_POST['item02_cott'], $_POST['item03_cott'], $_POST['item04_cott'], $_POST['item05_cott'], $_POST['org_name_cott'], getServerDate(), getServerTime()
            );
        } else {
            $res = $co->createNewChangeOverTime(
                    $_POST['id'], $_POST['time_cott'], $_POST['machine_no_cott'], 0, $_POST['item01_cott'], $_POST['item02_cott'], $_POST['item03_cott'], $_POST['item04_cott'], $_POST['item05_cott'], $_POST['org_name_cott'], getServerDate(), getServerTime()
            );
        }
        echo("1");
    }
} else {
    echo(false);
}
?>
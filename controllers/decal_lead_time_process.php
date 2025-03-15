<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/DecalLeadTime.class.php");
$dlt = new DecalLeadTime(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

            $res = $dlt->updateDecalLeadTimel(
                    $_POST['id'], $_POST['pattern_no_dltt'], $_POST['item_no_dltt'], $_POST['type_name_dltt'], $_POST['decal_store_dltt'], $_POST['decal_cutting_dltt'], $_POST['qc_apporaval_dltt'], $_POST['top_coat_dltt'], $_POST['recovery_dltt'], $_POST['printing_dltt'], $_POST['item01_dltt'], $_POST['item02_dltt'], $_POST['item03_dltt'], $_POST['item04_dltt'], $_POST['item05_dltt'], $_POST['is_edit_dltt'], $$_POST['org_name_dltt'], getServerDate(), getServerTime()
            );
        } else {

            $res = $dlt->createNewDecalLeadTimel(
                    $_POST['id'], $_POST['pattern_no_dltt'], $_POST['item_no_dltt'], $_POST['type_name_dltt'], $_POST['decal_store_dltt'], $_POST['decal_cutting_dltt'], $_POST['qc_apporaval_dltt'], $_POST['top_coat_dltt'], $_POST['recovery_dltt'], $_POST['printing_dltt'], $_POST['item01_dltt'], $_POST['item02_dltt'], $_POST['item03_dltt'], $_POST['item04_dltt'], $_POST['item05_dltt'], 0, $_POST['org_name_dltt'], getServerDate(), getServerTime()
            );
        }

        echo("1");
    }
} else {
    echo(false);
}
?>
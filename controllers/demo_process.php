<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PrintingDynamicStatus.class.php");
$pds = new PrintingDynamicStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



$error = "";
$is_admin = 0;
$_POST_params = array();
parse_str($_GET['form_data'], $_POST_params);
$_POST = $_POST_params;
if (count($_GET) > 0) {


    // if errors
    if ($error != "") {
        echo $error;
    } else {

        echo($_GET['id']);
        
        $data=$pds->getPrintingDynamicStatusByPrintingId($_GET['id']);
        
        $res = $pds->updatePrintingDynamicStatus(
                $_GET['id'], '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', getServerDate(), getServerTime(), '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '1', $loge_user, getServerDate(), getServerTime()
        );



        header("location:../view/demo.php?id=$data[2]");
        exit;
    }
} else {
    echo(false);
}
?>
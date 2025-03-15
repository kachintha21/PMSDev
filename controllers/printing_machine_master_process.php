<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PrintingMachineMaster.class.php");



$lt = new PrintingMachineMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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

        $res = $lt->updatePrintingMachineMaster(
                $_POST['id'], $_POST['pattern_name'], $_POST['machine_no_pmmt'], $_POST['priority_pmmt'], $_POST['is_edit_pmmt'], $_POST['item01_pmmt'], $_POST['item02_pmmt'], $_POST['item03_pmmt'], $_POST['item04_pmmt'], $_POST['item05_pmmt'], $_POST['org_name_pmmt'], getServerDate(), getServerTime()
        );

          } else {
              
             $res = $lt->createNewPrintingMachineMaster(
                $_POST['id'], $_POST['pattern_name'], $_POST['machine_no_pmmt'], $_POST['priority_pmmt'], 0, $_POST['item01_pmmt'], $_POST['item02_pmmt'], $_POST['item03_pmmt'], $_POST['item04_pmmt'], $_POST['item05_pmmt'], $_POST['org_name_pmmt'], getServerDate(), getServerTime()
        );   
              
          }

        echo("1");
    }
} else {
    echo(false);
}
?>
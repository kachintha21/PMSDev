<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");


include("../model/Process.class.php");
$pr = new Process(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
        $res = $pr->updateProcess($_POST['id'], $_POST['ref_no_pt'], $_POST['process_name_pt'], $_POST['is_edit_pt'], $_POST['org_name_pt'], getServerDate(), getServerTime());
        }
        else{
        $res = $pr->createNewProcess($_POST['id'], $_POST['ref_no_pt'], $_POST['process_name_pt'], 0, $_POST['org_name_pt'], getServerDate(), getServerTime());   
            
        }


        if ($res == true) {
            echo("1");
        } else {
            echo("<b>Add operation is fail.</b>");
        }
    }
} else {
    echo(false);
}
?>
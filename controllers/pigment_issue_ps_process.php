<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
session_start();
include("../include/common.php");
include("../include/db_config.php");

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


        $_SESSION['design_number_pidt'] =$_POST['pattern_name'];
        echo("1");
  
    }
} else {
    echo(false);
}
?>
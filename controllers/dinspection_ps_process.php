<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
session_start();

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




        $_SESSION['session_pro_no_dt'] = $_POST['pro_no_dt'];
        echo("1");
    }
} else {
    echo(false);
}
?>
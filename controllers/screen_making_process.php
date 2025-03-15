<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PrintingStatus.class.php");
include("../model/ScreenMaking.class.php");



$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sm = new ScreenMaking(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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



        $res = $sm->createNewScreenMaking(
            $_POST['id'],
            $_POST['pro_no_sm'],
            $_POST['pattern_no_sm'],
            $_POST['lot_no_sm'],
            $_POST['screen_mesh_sm'],
            $_POST['judgment_sm'],
            0,
            $_POST['item01_sm'],
            $_POST['item02_sm'],
            $_POST['item03_sm'],
            $_POST['item04_sm'],
            $_POST['item05_sm'],
            $_POST['org_name_sm'],
            getServerDate(), getServerTime()
        );



  
                $upadte=$ps->updatePrintingStatusById($_POST['pro_no_sm'],$_POST['pattern_no_sm'],$_POST['screen_mesh_sm'],3);
                $arry=$sm->getScreenMakingByRefNo($_POST['pro_no_sm'],$_POST['screen_mesh_sm']);
                $_SESSION['pro_no_sm']= $_POST['pro_no_sm'];  
                $_SESSION['id']= $arry[0];              
                echo("1");
        

    }
} else {
    echo(false);
}
?>
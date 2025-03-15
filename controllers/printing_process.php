<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PrintingStatus.class.php");
include("../model/Printing.class.php");



$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sm = new Printing(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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



        $res = $sm->createNewPrinting(
            $_POST['id'],
            $_POST['pro_no_pt'],
            $_POST['pattern_no_pt'],
            $_POST['lot_no_pt'],
            $_POST['screen_mesh_pt'],
            $_POST['colours_index_pt'],
            $_POST['machine_no_pt'],
            $_POST['judgment_pt'],
            0,
            $_POST['item01_pt'],
            $_POST['item02_pt'],
            $_POST['item03_pt'],
            $_POST['item04_pt'],
            $_POST['item05_pt'],
            $_POST['org_name_pt'],        
            getServerDate(), getServerTime()
        );



  
                $upadte=$ps->updatePrintingStatusById($_POST['pro_no_pt'],$_POST['pattern_no_pt'],$_POST['colours_index_pt'],4);                             
                echo("1");
        

    }
} else {
    echo(false);
}
?>
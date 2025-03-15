<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PreparingLayout.class.php");
include("../model/PrintingStatus.class.php");
include("../model/PigmentPreparation.class.php");
include("../model/PigmentStock.class.php");


$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pp = new PigmentPreparation(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pis = new PigmentStock(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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


        $res = $pp->createNewPigmentPreparation(
            $_POST['id'],
            $_POST['pro_no_pp'],
            $_POST['lot_no_pp'],
            $_POST['pattern_no_pp'],
            $_POST['printing_qty_pp'],
            $_POST['colour_index'],
            $_POST['color_name_pp'],
            $_POST['pigment_contents_pp'],
            0,
            $_POST['item01_pp'],
            $_POST['item02_pp'],
            $_POST['item03_pp'],
            $_POST['item04_pp'],
            $_POST['item05_pp'],
            $_POST['org_name_pp'],        
             getServerDate(), getServerTime()
        );


        
        $res = $pis->createNewPigmentStock(
            $_POST['id'],
            $_POST['pattern_no_pp'],
            $_POST['colour_index'],
            '',
            $_POST['pigment_contents_pp'],
            0,
            $_POST['pro_no_pp'],
            $_POST['item02_ps'],
            $_POST['item03_ps'],
            $_POST['item04_ps'],
            $_POST['item05_ps'],
            $_POST['org_name_pp'],                          
             getServerDate(), 
             getServerTime()
        );

        $upadte=$ps->updatePrintingStatusById($_POST['pro_no_pp'],$_POST['pattern_no_pp'],$_POST['colour_index'],1);
      echo("1");

} 
}
else {
    echo(false);
}
?>
<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PastCurvesDetails.class.php");


$prl = new PastCurvesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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




        foreach ($_POST['curves_pcdt'] as $key => $id) {
            $dd = array('curves_pcdt' => $_POST['curves_pcdt'][$key],
                'qty_pcdt' => $_POST['qty_pcdt'][$key],
            );

            $res3 = $prl->createNewPastCurvesDetails(
                    $_POST['id'], 
                    $_POST['pro_no_pcdt'],
                    $_POST['lot_no_pcdt'], 
                    $_POST['pattern_name'],
                    $_POST['curves_pcdt'][$key]."-".$_POST['qty_pcdt'][$key], 
                    $_POST['curves_pcdt'][$key], 
                    $_POST['qty_pcdt'][$key], 
                    $_POST['first_color_print_pcdt'], 
                    $_POST['print_date_pcdt'],
                    $_POST['org_name_pcdt']
                    ,getServerDate(),
                    getServerTime()
            );
        }






        if ($res = true) {
            echo("1");
        } else {

            echo("Add operation is fail");
        }
    }
} else {
    echo(false);
}
?>
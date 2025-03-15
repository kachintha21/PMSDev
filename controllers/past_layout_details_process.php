<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PastLayoutDetails.class.php");
include("../model/PastCurvesDetails.class.php");


$pld = new PastLayoutDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pcd = new PastCurvesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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


        $products = array();
        foreach ($_POST['curves_no_pldt'] as $key => $id) {

            $products = array(
                'curves_no_pldt' => $_POST['curves_no_pldt'][$key],
                'qty_pldt' => $_POST['qty_pldt'][$key],
            );


            $res = $pcd->createNewPastCurvesDetails(
                    $_POST['id'], $_POST['pro_no_pldt'], $_POST['lot_no_pldt'], $_POST['design_no_pldt'], $_POST['curves_no_pldt'][$key], $_POST['qty_pldt'][$key], $_POST['org_name_pcdt'], getServerDate(), getServerTime()
            );
        }




        $res = $pld->createNewPastLayoutDetails(
                $_POST['id'], $_POST['pro_no_pldt'], $_POST['design_no_pldt'], $_POST['lot_no_pldt'], $_POST['sheet_pldt'], $_POST['factory_pldt'], $_POST['layout_finish_date_pldt'], $_POST['first_color_print_date_pldt'], $_POST['layout_maker_pldt'], $_POST['layout_check_pldt'], $_POST['print_date_pldt'], $_POST['curves_no_pldt'], $_POST['qty_pldt'], $_POST['item01_pldt'], $_POST['item02_pldt'], $_POST['item03_pldt'], $_POST['item04_pldt'], $_POST['item05_pldt'], $_POST['org_name_pldt'], getServerDate(), getServerTime()
        );




        echo("1");
    }
} else {
    echo(false);
}
?>
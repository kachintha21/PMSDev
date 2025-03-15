<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PreparingLayout.class.php");
include("../model/PlanningDetails.class.php");
include("../model/PrintingTime.class.php");
include("../model/ProductStatus.class.php");

$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pd = new PlanningDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pt = new PrintingTime(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new ProductStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);




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



        $res = $pl->createNewPreparingLayout(
                $_POST['id'], $_POST['ref_no_plt'], $_POST['pro_no_plt'], $_POST['lot_no_plt'], $_POST['pattern_no_plt'], $_POST['shipment_request_plt'], $_POST['printing_lines_plt'], $_POST['date_plt'], $_POST['printing_way_plt'], $_POST['paper_size_plt'], $_POST['body_plt'], $_POST['factory_plt'], $_POST['market_plt'], $_POST['decoration_plt'], $_POST['number_sheet_plt'], $_POST['printing_plt'], $_POST['is_remarks_plt'], $_POST['item01_plt'], 'OK', $_POST['item03_plt'], $_POST['item04_plt'], $_POST['item05_plt'], $_POST['item06_plt'], $_POST['item07_plt'], $_POST['item08_plt'], $_POST['item09_plt'], $_POST['item10_plt'], $_POST['item11_plt'], $_POST['item12_plt'], $_POST['item13_plt'], $_POST['item14_plt'], $_POST['item15_plt'], 0, $_POST['org_name_plt'], getServerDate(), getServerTime()
        );






        $res = $ps->createNewProductStatus(
                $_POST['id'], $_POST['ref_no_plt'], $_POST['pattern_no_plt'], $_POST['pro_no_plt'],$_POST['lot_no_plt'], $_POST['shipment_request_plt'], 1, $_POST['pro02_pt'], $_POST['pro03_pt'], $_POST['pro04_pt'], $_POST['pro05_pt'], $_POST['pro06_pt'], $_POST['pro07_pt'], $_POST['pro08_pt'], $_POST['pro09_pt'], $_POST['pro10_pt'], $_POST['pro11_pt'], $_POST['pro12_pt'], $_POST['pro13_pt'], $_POST['pro14_pt'], $_POST['pro15_pt'], $_POST['pro16_pt'], $_POST['pro17_pt'], $_POST['pro18_pt'], $_POST['pro19_pt'], 0, $_POST['org_name_plt'], getServerDate(), getServerTime()
        );










        $products = array();
        foreach ($_POST['decol_pattern_no_pdt'] as $key => $id) {

            $products = array(
                'code' => $id,
                'decol_pattern_no_pdt' => $_POST['decol_pattern_no_pdt'][$key],
                'curve_no_pdt' => $_POST['curve_no_pdt'][$key],
                'plan_pcs_pdt' => $_POST['plan_pcs_pdt'][$key],
                'pcs_per_sheet_pdt' => $_POST['pcs_per_sheet_pdt'][$key],
                'actual_pdt' => $_POST['actual_pdt'][$key],
            );
            $res = $pd->createNewPlanningDetails(
                    $_POST['id'], $_POST['ref_no_plt'], $_POST['pro_no_plt'], $_POST['pattern_no_plt'], $_POST['decol_pattern_no_pdt'][$key], $_POST['curve_no_pdt'][$key], $_POST['plan_pcs_pdt'][$key], $_POST['pcs_per_sheet_pdt'][$key], $_POST['actual_pdt'][$key], 0, $_POST['remarks_pdt'], $_POST['item01_pdt'], $_POST['item02_pdt'], $_POST['item03_pdt'], $_POST['item04_pdt'], $_POST['item05_pdt'], $_POST['org_name_pdt'], getServerDate(), getServerTime()
            );
        }



        $products_ct = array();
        foreach ($_POST['color_ptt'] as $key => $id) {

            $products_ct = array(
                'code' => $id,
                'color_ptt' => $_POST['color_ptt'][$key],
                'print_date_ptt' => $_POST['print_date_ptt'][$key],
            );
            $res = $pt->createNewPrintingTime(
                    $_POST['id'], $_POST['ref_no_plt'], $_POST['pattern_no_plt'] ,$_POST['pro_no_plt'], $_POST['lot_no_plt'],$_POST['color_ptt'][$key], $_POST['print_date_ptt'][$key], 0, $_POST['item01_ptt'], $_POST['item02_ptt'], $_POST['item03_ptt'], $_POST['item04_ptt'], $_POST['item05_ptt'], $_POST['org_name_ptt'], getServerDate(), getServerTime()
            );
        }


        echo("1");
    }
} else {
    echo(false);
}
?>
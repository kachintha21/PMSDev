<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PrintingStatus.class.php");
include("../model/DecalInspection.class.php");
include("../model/DecalInspectionData.class.php");
include("../model/DecalDefectiveData.class.php");


$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$di = new DecalInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$did = new DecalInspectionData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ddd = new DecalDefectiveData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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

        $res = $di->createNewDecalInspection(
                $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], $_POST['printing_qty_dt'], $_POST['printing_lines_dt'], $_POST['paper_size_dt'], $_POST['delivery_date_dt'], $_POST['no_of_box_dt'], $_POST['top_coat_thickness_dt'], $_POST['offset_dt'], $_POST['screen_dt'], $_POST['inspection_sheets_dt'], $_POST['first_class_qt_dt'], $_POST['second_class_qty_dt'], $_POST['defective_sheets_dt'], $_POST['converted_1st_class_qty_qt'], $_POST['order_sheet_qty_dt'], 0, $_POST['judgment_dt'], $_POST['remarks_dt'], $_POST['item01_dt'], $_POST['item02_dt'], $_POST['item03_dt'], $_POST['item04_dt'], $_POST['item05_dt'], $_POST['item06_dt'], $_POST['item07_dt'], $_POST['item08_dt'], $_POST['item09_dt'], $_POST['item10_dt'], $_POST['org_name_dt'], getServerDate(), getServerTime()
        );
        $data = array();
        foreach ($_POST['pa_no_didt'] as $key => $id) {

            $data = array(
                'pa_no_didt' => $_POST['pa_no_didt'][$key],
                'curve_no_didt' => $_POST['curve_no_didt'][$key],
                'pc_sheet_didt' => $_POST['pc_sheet_didt'][$key],
                'defective_pcs_didt' => $_POST['defective_pcs_didt'][$key],
                'passed_pcs_didt' => $_POST['passed_pcs_didt'][$key],
                'order_pcs_didt' => $_POST['order_pcs_didt'][$key],
                'shortage_pcs_didt' => $_POST['shortage_pcs_didt'][$key],
                'note_didt' => $_POST['note_didt'][$key],
            );
            $res = $did->createNewDecalInspectionData(
                    $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], $_POST['pa_no_didt'][$key], $_POST['curve_no_didt'][$key], $_POST['pc_sheet_didt'][$key], $_POST['planed_pcs_didt'][$key], $_POST['defective_pcs_didt'][$key], $_POST['passed_pcs_didt'][$key], $_POST['order_pcs_didt'][$key], $_POST['shortage_pcs_didt'][$key], $_POST['note_didt'][$key], 0, $_POST['item01_didt'], $_POST['item02_didt'], $_POST['item03_didt'], $_POST['item04_didt'], $_POST['item05_didt'], $_POST['org_name_dt'], getServerDate(), getServerTime()
            );
        }

        $ddata = array();
        foreach ($_POST['defective_name_dddt'] as $key => $id) {

            $ddata = array(
                'defective_name_dddt' => $_POST['defective_name_dddt'][$key],
                'qty_dddt' => $_POST['qty_dddt'][$key],
            );
            $res = $ddd->createNewDecalDefectiveData(
                    $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], $_POST['defective_name_dddt'][$key], $_POST['qty_dddt'][$key], 0, $_POST['item01_dddt'], $_POST['item02_dddt'], $_POST['item03_dddt'], $_POST['item04_dddt'], $_POST['item05_dddt'], $_POST['org_name_dt'], getServerDate(), getServerTime()
            );
        }


        $upadte = $ps->updatePrintingStatusBymultiple($_POST['pro_no_dt'], $_POST['pattern_no_dt'], 1, 4);
        echo("1");
    }
} else {
    echo(false);
}
?>
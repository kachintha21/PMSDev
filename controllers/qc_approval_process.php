<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/QcApproval.class.php");
include("../model/PrintingStatus.class.php");

$qc = new QcApproval(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

        $INDEX=($_POST['reject_items_qc']=="Pass" ) ? '1' : '2';
       $judgment_qc=($_POST['reject_items_qc']=="Pass" ) ? 'OK' : 'NG';

        $res = $qc->createNewQcApproval(
            $_POST['id'],
            $_POST['pro_no_qc'],
            $_POST['pattern_no_qc'],
            $_POST['lot_no_qc'],
            $_POST['printing_qty_qc'],
            $_POST['actual_qty_qc'],
            $_POST['check_date_qc'],
            $judgment_qc,
            $_POST['reject_items_qc'],
            $_POST['re_marks_qc'],
            0,
            $_POST['item01_qc'],
            $_POST['item02_qc'],
            $_POST['item03_qc'],
            $_POST['item04_qc'],
            $_POST['item05_qc'],
            $_POST['org_name_qc'],
            getServerDate(),
            getServerTime()
        );





  
        $upadte=$ps->updatePrintingStatusBymultiple($_POST['pro_no_qc'],$_POST['pattern_no_qc'],$INDEX,2);
        echo("1");
        




    }
} else {
    echo(false);
}
?>
<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PigmentPlan.class.php");
$pds = new PigmentPlan(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



$error = "";
$is_admin = 0;
$_POST_params = array();
parse_str($_GET['form_data'], $_POST_params);
$_POST = $_POST_params;
if (count($_GET) > 0) {


    // if errors
    if ($error != "") {
        echo $error;
    } else {


        
        $data=$pds->getPigmentPlanByPrintingId($_GET['id']);

        
        $res = $pds->updatePigmentPlan(
                $_GET['id'], $ref_no_ppt, $changeover_ppt, $required_date_ppt, $pro_no_ppt, $design_ppt, $lot_ppt, $total_sheets_ppt, $colors_ppt, $plan_colors_ppt, '1', $actual_ppt, $item01_ppt, $item02_ppt, $item03_ppt, $item04_ppt, $item05_ppt, $loge_user, getServerDate(), getServerTime()
        );



        header("location:../view/pigment_plan.php?id=$data[16]");
        exit;
    }
} else {
    echo(false);
}
?>
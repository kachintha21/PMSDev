<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/Planning.class.php");
include("../model/PlanningAuto.class.php");
include("../model/PlanedQty.class.php");
include("../model/SavedLayoutplans.class.php");
include("../model/LayoutPlans.class.php");
include("../model/PreparingLayout.class.php");
include("../model/PlanningDetails.class.php");
include("../model/PrintingSchedule.class.php");
include("../model/ProductStatus.class.php");
include("../model/PrintingStatus.class.php");
include("../model/YieldMaster.class.php");

$prl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pd = new PlanningDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new ProductStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$prs = new PrintingSchedule(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pst = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$yield = new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

        foreach ($_POST['desing_no_lpt'] as $key => $id) {
            $fd = array('id' => $_POST['id'][$key],
                'desing_no_lpt' => $_POST['desing_no_lpt'][$key],
                'curve_no_lpt' => $_POST['curve_no_lpt'][$key],
                'planned_qty_lpt' => $_POST['planned_qty_lpt'][$key],
                'decal_no_lpt' => $_POST['decal_no_lpt'][$key],
                'no_of_curves_lpt' => $_POST['no_of_curves_lpt'][$key],
                'no_of_sheets_lpt' => $_POST['no_of_sheets_lpt'][$key],
                'close_curve_after_lpt' => $_POST['close_curve_after_lpt'][$key],
                'total_sheets_needed_lpt' => $_POST['total_sheets_needed_lpt'][$key],
            );


                $res = $lp->createNewLayoutplans(
                        $_POST['id'], $_POST['pro_no_lpt'], $_POST['layout'], $_POST['status'], $_POST['desing_no_lpt'][$key], $_POST['curve_no_lpt'][$key], $_POST['decal_no_lpt'][$key], $_POST['planned_qty_lpt'][$key], $_POST['no_of_curves_lpt'][$key], $_POST['no_of_sheets_lpt'][$key], $_POST['close_curve_after_lpt'][$key], $_POST['total_sheets_needed_lpt'][$key], 1, $_POST['status_lpt'], $_POST['item01_lpt'], $_POST['item02_lpt'], $_POST['item03_lpt'], $_POST['item04_lpt'], $_POST['item05_lpt'], $_POST['org_name_lpt'], getServerDate(), getServerTime()
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
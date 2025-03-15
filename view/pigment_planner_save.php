<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");

include("../include/common.php");
include("../model/PreparingLayout.class.php");
include("../model/PigmentModel.class.php");
include("../model/PigmentMaster.class.php");
include("../model/Colours.class.php");
include("../model/MachineCalendar.class.php");
include("../model/PrintingMachineMaster.class.php");
include("../model/PrintingSpeedMaster.class.php");
include("../model/VirtualPlannerDetails.class.php");
include("../model/VirtualPlanner.class.php");
include("../model/PrintingDynamicStatus.class.php");
include("../model/PigmentConsumptionMaster.class.php");
include("../model/PigmentPlan.class.php");




$change_over = 17;

$vpd = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vp = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pip = new PigmentPlan(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$cl = new MachineCalendar(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mm = new PrintingMachineMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pds = new PrintingDynamicStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pcm = new PigmentConsumptionMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$vp_data = $vp->getVirtualPlannerByNo($_GET['id']);


if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pattern_no'];
    $loge_depart = $_SESSION['logged_usr_depat'];
    $Model = $pm->getPigmentModelByNo($session_pattern_no);
} else {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    header("location:../index.php");
    exit();
}



$od = $pl->getPreparingLayoutByNo($_GET['id']);
 $id=$_GET['id'];

$query = "SELECT * FROM printing_dynamic_status_tbl WHERE production_no_pdst!='N/A' AND process_name_pdst='".$_GET['id']."' ORDER BY id ASC

 ";


if ($result = $conn->query($query)) {
    $index = 0;

    while ($row = $result->fetch_assoc()) {

        $pigmentConsumption = $pcm->getPigmentConsumptionMasterCodeByPatternNo($row["pattern_no_pdst"], $row["colour_index_pdst"]);
        $totalConsumption = $pigmentConsumption[6] + $pigmentConsumption[5];


        $index ++;

        $date = new DateTime($row['plan_date_pdst']);
        $date->modify('-3 day');


        $ttt = $pigm->getNumberPigmentMasterByNo($row['pattern_no_pdst']);
        $ref_no_pdst = $row['production_no_pdst'] . $index;

        $res = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $row['pattern_no_pdst'] . "'   AND  colours_code_ct='" . $row['colour_index_pdst'] . "'    ";
        if ($resc = $conn->query($res)) {
            $total_pigment = 0;
            while ($rowsc = $resc->fetch_assoc()) {
                $pigment_name_ct = $rowsc['pigment_name_ct'];
                $colours_name_ct = $rowsc['colours_name_ct'];

                $qty_ct = $rowsc['qty_ct'];

                $Required = ($rowsc['item02_ct'] * $row['num_sheets']) * $qty_ct / 100;

                $total_pigment += $Required;
            }
        }

        $res = $pip->createNewPigmentPlan(
                $_POST['id'], $ref_no_pdst, $index, $date->format('Y-m-d'), $row['production_no_pdst'], $row['pattern_no_pdst'], $row['lot_no_pdst'], $row['num_sheets'], $ttt, $row['colour_index_pdst'], '0', $_POST['actual_ppt'], $colours_name_ct, $_POST['item02_ppt'], $_POST['item03_ppt'], $_POST['item04_ppt'],$id, $loge_user, getServerDate(), getServerTime()
        );
        
        $pds->updatePrintingDynamicStatusByNew($row['id'],'1');
        
        
        
    }
}

    header("location:pigment_planner.php?id=$id ");
?>




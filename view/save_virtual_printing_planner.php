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
include("../model/LeadTimeRelationship.class.php");
$change_over = 17;
$vpd = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vp = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new MachineCalendar(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mm = new PrintingMachineMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pds = new PrintingDynamicStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ltm = new LeadTimeRelationship(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vp_data = $vp->getVirtualPlannerByNo($_GET['id']);
$ID = $_GET['id'];
if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pattern_no'];
    $loge_depart = $_SESSION['logged_usr_depat'];
    $Model = $pm->getPigmentModelByNo($session_pattern_no);
}

$od = $pl->getPreparingLayoutByNo($_GET['id']);
$leadTime = $ltm->getLeadTimeRelationshipByPattern('12', '44');
$machine_no_pdst = "M01";
$Operator = $vp_data[3];
$dryer_capacity = 1200;
$process_name_pdst = $vp_data[1];
$shift_start_time = " 2000-01-01 06:30:00";
$prepare_time = "0:15";
$prepareTime = "15";
$change_over = "0:17";
$changeOver = "17";
$firstPrinting = $ps->getFirstPrintingSpeedMasterByColorIndex($_GET['id']);
$time_fp = round($firstPrinting / 20, 0);
$time_duration_fp = "0:" . $time_fp;

$res = $pds->createNewPrintingDynamicStatus(
        $id, $_GET['id'] . '_M/P', $ID, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', date("H:i", strtotime($shift_start_time)), 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', $loge_user, getServerDate(), getServerTime()
);


$first_ptime = appendTime($shift_start_time, 15);
$three_time = appendTime($first_ptime, $time_fp);

$res = $pds->createNewPrintingDynamicStatus(
        $id, $_GET['id'] . '_P/P', $ID, 'N/A', 'N/A', 'N/A', 'N/A', $firstPrinting, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', date("H:i", strtotime($first_ptime)), 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', $loge_user, getServerDate(), getServerTime()
);






$query = "SELECT * 
FROM virtual_planner_details_tbl 
LEFT JOIN pigment_master_tbl ON pigment_master_tbl.pattern_pm = virtual_planner_details_tbl.item01_vpt AND pigment_master_tbl.colours_pm!='T01'
WHERE virtual_planner_details_tbl.ref_no_vpt='" . $_GET['id'] . "'
ORDER BY pigment_master_tbl.colours_pm ASC LIMIT  1000";





if ($result = $conn->query($query)) {
    $index = 0;

    $sheetBreak = 0;
    $prevColor = '';
    $data = [];
    $getTime = $three_time;
    $isTeaTimeSet = false;
    $isEveTeaTimeSet = false;
    $dayCount = 1;
    while ($row = $result->fetch_assoc()) {

        $newDate = strtotime($row['ship_scheduled_date_vpt'] . '- ' . $leadTime . 'days');
        $caldate = Date('Y-m-d', $newDate);

        $time_speed = $ps->getPrintingSpeedMasterByColorIndex($row['item01_vpt'], $row['colours_pm'], $row['qty_vpt']);

        $index ++;

        if ($prevColor != $row['colours_pm']) {
            $sheetBreak = 0;
        }
        $prevColor = $row['colours_pm'];
        $total = 0;
        $s = 0;
        $sheetBreak += $row['qty_vpt'];
        $total += $row['qty_vpt'];
        $total_time = $time_speed + $changeOver;
        $total_time_sum = "0:" . $total_time;
        array_push($data, $total_time_sum);

        $oldtime = $getTime;

        $oneSheetPerTime = $row['qty_vpt'] / $total_time;
        $oldsheet = $row['qty_vpt'];

        if (
                strtotime($getTime) >= strtotime("2000-01-0$dayCount 09:30:00") &&
                $isTeaTimeSet == false
        ) {
            $isTeaTimeSet = true;


            $res = $pds->createNewPrintingDynamicStatus(
                    $id, $_GET['id'] . 'Morning Tea Time', $ID, 'N/A', 'Morning Tea Time', 'N/A', 'N/A', "09:30:00", 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '30', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0', $loge_user, getServerDate(), getServerTime()
            );

            // echo dayPrint($dayCount);/Moning Time Time/

            $getTime = appendTime($getTime, 20);
        }



        if (
                strtotime($getTime) >= strtotime("2000-01-0$dayCount 15:00:00") &&
                $isEveTeaTimeSet == false
        ) {
            $isEveTeaTimeSet = true;

            $res = $pds->createNewPrintingDynamicStatus(
                    $id, $_GET['id'] . 'Evening Tea Time', $ID, 'N/A', 'Evening Tea Time', 'N/A', 'N/A', "15:00:00", 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '30', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0', $loge_user, getServerDate(), getServerTime()
            );

            $getTime = appendTime($getTime, 20);
        }




        if (strtotime($getTime) >= strtotime("2000-01-0$dayCount 23:59:59")) {
            $isTeaTimeSet = $isEveTeaTimeSet = false;
            $dayCount++;
        }

        
         // echo(date("H:i", strtotime($getTime))."</br>");
          
             $ref_no_pdst = $machine_no_pdst . "_" . $row['pro_no_vpt'] . "_" . $row['colours_pm'];

        $res = $pds->createNewPrintingDynamicStatus(
                $id, $ref_no_pdst, $process_name_pdst, $machine_no_pdst, $row['item01_vpt'], $row['pro_no_vpt'], $row['lot_no_vpt'], $row['qty_vpt'], $screen_mesh_pdst, $row['colours_pm'], $row['colours_pm'], $row['qty_vpt'], $caldate, date("H:i", strtotime($getTime)), $actual_qty_pdst, $actual_date_pdst, $actual_time_pdst, $revised_pland_pdst, $item01_pdst, $item02_pdst, $item03_pdst, $item04_pdst, $item05_pdst, $item06_pdst, $item07_pdst, $row['ship_scheduled_date_vpt'], $pigm->getNumberPigmentMasterByNo($row['item01_vpt']), '0', $loge_user, getServerDate(), getServerTime()
        );


        $getTime = appendTime($getTime, $total_time);
    }
    
}

header("location:virtual_printing_planner.php?id=$ID");
?>












?>
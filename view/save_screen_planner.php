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
include("../model/ScreenPlanner.class.php");


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
$pcm = new PigmentConsumptionMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sp = new ScreenPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$vp_data = $vp->getVirtualPlannerByNo($_GET['id']);
$ID = $_GET['id'];


if ($_SESSION['logged_usr_id']) {
    $loge_user = $_SESSION['logged_usr_id'];
    $session_pattern_no = $_SESSION['session_pattern_no'];
    $loge_depart = $_SESSION['logged_usr_depat'];
    $Model = $pm->getPigmentModelByNo($session_pattern_no);
}

$od = $pl->getPreparingLayoutByNo($_GET['id']);
$query = "SELECT * FROM printing_dynamic_status_tbl WHERE production_no_pdst!='N/A' AND process_name_pdst='" . $_GET['id'] . "'  ORDER BY id  ASC

 ";

if ($result = $conn->query($query)) {
    $index = 0;

    while ($row = $result->fetch_assoc()) {

        $pigmentConsumption = $pcm->getPigmentConsumptionMasterCodeByPatternNo($row["pattern_no_pdst"], $row["colour_index_pdst"]);
        $totalConsumption = $pigmentConsumption[6] + $pigmentConsumption[5];

        $index ++;


        $i = 0;
        if (($index) % 4 == 0) {
            $color = "#0033FF";
            $result_ptint = $index / 4;
            $index . "  Topcoat" . $result_ptint;
        } else {
            $index = $index;
        }


        $date = new DateTime($row['plan_date_pdst']);
       $date->modify('-2 day');


        $res = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $row['pattern_no_pdst'] . "'   AND  colours_code_ct='" . $row['colour_index_pdst'] . "'   group by  item04_ct ";
        if ($resc = $conn->query($res)) {

            while ($rowsc = $resc->fetch_assoc()) {

                if ($rowsc['item04_ct'] == "") {
                    $mesh_type_spt = '-';
                    echo("-");
                } else {
                    $mesh_type_spt = $rowsc['item04_ct'];
                }
            }
        }
  //echo($mesh_type_spt );

  $res = $sp->createNewScreenPlanner(
               $id,$ID, $row['production_no_pdst'].$index, $index, $row['production_no_pdst'], $row['pattern_no_pdst'], $row['lot_no_pdst'], $row['num_sheets'], $pigm->getNumberPigmentMasterByNo($row['pattern_no_pdst']), $mesh_type_spt, $row['colour_index_pdst'], $date->format('Y-m-d'), $row['plan_time_pdst'], $actual_date_spt, $actual_time_spt, $actual_qty_spt, '0', $remarks, $item01_spt, $item02_spt, $item03_spt, $item04_spt, $item05_spt, $loge_user, getServerDate(), getServerTime()
        );
    
    }
    
   
}
header("location:new_screen_planner.php?id=$ID");
?>

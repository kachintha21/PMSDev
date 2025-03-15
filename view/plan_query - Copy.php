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
include("../model/VirtualTempDetails.class.php");
include("../model/VirtualTimeStore.class.php");
$change_over = 17;
$vpd = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vp = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mc = new MachineCalendar(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mm = new PrintingMachineMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingSpeedMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pds = new PrintingDynamicStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ltm = new LeadTimeRelationship(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vt = new VirtualTempDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vts = new VirtualTimeStore(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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
?>

<?php

function recursiveTimecalculation($design_no_vtdt, $colours_vtdt, $qty_vtdt, $machine_no_pmmt, $date_vtdt, $ps, $vts, $mc) {
    $changeOver = 17;
    $getTime = $changeOver + $ps->getPrintingSpeedMasterByColorIndex($design_no_vtdt, $colours_vtdt, $qty_vtdt);
    $cons = $mc->getMachineTimeCheck($machine_no_pmmt, $date_vtdt, ""); 
    $tea_time = ($cons == "1040") ? '75' : '15';
    $total = $vts->getFirstPrintingVirtualTimeStoreByIndex($machine_no_pmmt, $date_vtdt) + $vts->getPrintingVirtualTimeStoreByIndex($machine_no_pmmt, $date_vtdt) + 15 + $tea_time;
    $remaing_time = $cons - $total;

    if ($getTime < $remaing_time) {
        return true;
    } else {
        return false;
    }
}

function recursiveTimecalculationSecond($design_no_vtdt, $colours_vtdt, $qty_vtdt, $machine_no_pmmt, $date_vtdt, $ps, $vts, $mc) {
    $changeOver = 17;
    $getTime = $changeOver + $ps->getPrintingSpeedMasterByColorIndex($design_no_vtdt, $colours_vtdt, $qty_vtdt);
    $cons = $mc->getMachineTimeCheck($machine_no_pmmt, $date_vtdt, "");
    $total = $vts->getFirstPrintingVirtualTimeStoreByIndex($machine_no_pmmt, $date_vtdt) + $vts->getPrintingVirtualTimeStoreByIndex($machine_no_pmmt, $date_vtdt);
    $remaing_time = $cons - $total;
    if ($getTime < $remaing_time) {
        return true;
    } else {
        return false;
    }
}
$index = 0;

//print("SELECT*FROM virtual_temp_details_tbl Where ref_no_vtdt='" . $_GET['id'] . "'   ORDER BY priority_vtdt,lot_no_vtdt,colours_vtdt ASC");exit;

$query = "SELECT*FROM virtual_temp_details_tbl Where ref_no_vtdt='" . $_GET['id'] . "'   ORDER BY priority_vtdt,lot_no_vtdt,colours_vtdt ASC";

if ($result = $conn->query($query)) {
   
    while ($row = $result->fetch_assoc()) {
     
        $status = $vt->getVirtualTempDetailsCloneByById($row['id']);
        if ($status == "0") {
            $index ++;
			//print("SELECT*FROM printing_machine_master_tbl Where pattern_no_pmmt='" . $row['design_no_vtdt'] . "'  ORDER BY priority_pmmt ASC");exit;
            $sql = "SELECT*FROM printing_machine_master_tbl Where pattern_no_pmmt='" . $row['design_no_vtdt'] . "'  ORDER BY priority_pmmt ASC";

            if ($res = $conn->query($sql)) {

                while ($rowt = $res->fetch_assoc()) {
                   // print($ps);exit;
                    if (1)
					{
                       // print(123);exit;
						$uui = $row['design_no_vtdt'] . $row['colours_vtdt'] . $row['qty_vtdt'];                     
              
                        
                        $changeOver = 17;
                        $getTime = $changeOver + $ps->getPrintingSpeedMasterByColorIndex($row['design_no_vtdt'], $row['colours_vtdt'], $row['qty_vtdt']);
                        
                    // print($row['date_vtdt']);exit;
                        $vts->createNewvirtualTimeStore($id, $row['ref_no_vtdt'], $row['pro_no_vtdt'], $row['lot_no_vtdt'], $row['number_colour_vtdt'], $row['colours_vtdt'], $rowt['machine_no_pmmt'], $row['item03_vtdt'], $getTime, $row['qty_vtdt'], '1', $uui, $row['design_no_vtdt'], $item03_vtst, $item04_vtst, $item05_vtst, $is_edit_vtst, $org_name_vtst, $org_date_vtst, $org_time_vtst);
                        $vt->updateVirtualTempDetailsById($row['id'], '1',$row['item03_vtdt']);
                      
                        
                        if ($row['colours_vtdt'] == "S01"){                       
                            $tempDetailsClone = $vt->getVirtualTempDetailsCloneByColor($row['lot_no_vtdt'], $row['design_no_vtdt'], "S02");                            
                            $id = $tempDetailsClone[0];
                            $ref_no_vtdt = $tempDetailsClone[1];
                            $pro_no_vtdt = $tempDetailsClone[2];
                            $lot_no_vtdt = $tempDetailsClone[4];
                            $number_colour_vtdt = $tempDetailsClone[6];
                            $colours_vtdt = $tempDetailsClone[5];
                            $machine_no_pmmt = $rowt['machine_no_pmmt'];
                            $date_vtdt = $tempDetailsClone[14];
                            $qty_vtdt = $tempDetailsClone[7];
                            $design_no_vtdt = $tempDetailsClone[3];
                            $uui = $row['design_no_vtdt'] . $colours_vtdt . $row['qty_vtdt'];   
                         
                            if (recursiveTimecalculation($design_no_vtdt, $colours_vtdt, $qty_vtdt, $machine_no_pmmt, $date_vtdt, $ps, $vts, $mc) == true) {
                            $changeOver = 17;
                            $getTime = $changeOver + $ps->getPrintingSpeedMasterByColorIndex($design_no_vtdt, $colours_vtdt, $qty_vtdt);
                             $vts->createNewvirtualTimeStore($id, $ref_no_vtdt, $pro_no_vtdt, $lot_no_vtdt, $number_colour_vtdt, $colours_vtdt, $machine_no_pmmt, $date_vtdt, $getTime, $qty_vtdt, '1', $uui, $design_no_vtdt, $item03_vtst, $item04_vtst, $item05_vtst, $is_edit_vtst, $org_name_vtst, $org_date_vtst, $org_time_vtst);
                            $vt->updateVirtualTempDetailsById($id, '1',$date_vtdt);
                             
                             }
                            
                        }
                    }

                   // break;
                }
            }
        }
    }
}
//header("location:virtual_printing_planne_view.php?id='" . $_GET['id'] . "'");
header("location:virtual_planner_beta_view.php");
exit;

?>









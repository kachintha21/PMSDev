<?php

include("../include/db_config.php");
include("../model/VirtualPlanner.class.php");
include("../model/PreparingLayout.class.php");
include("../model/VirtualTempDetails.class.php");
include("../model/VirtualTimeStore.class.php");
include("../model/VirtualPlannerDetails.class.php");
include("../model/VirtualPlannerFinal.class.php");
include("../model/PigmentPlannerFinal.class.php");
include("../model/ScreenPlannerFinal.class.php");
include("../include/conn.php");

$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vt = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vtd = new VirtualTempDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vs = new VirtualTimeStore(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vpt = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vpf = new VirtualPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ppf = new PigmentPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$spf = new ScreenPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if (isset($_GET['id'])) {
    $query = "SELECT * FROM virtual_planner_details_tbl WHERE ref_no_vpt='" . $_GET['id'] . "'";

    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $res_update = $pl->updatePreparingLayoutByRefNo($row['pro_no_vpt'], '0', '');
        }
    }

    $vtd->deleteVirtualTempDetails($_GET['id']);
    $vs->deletevirtualTimeStore($_GET['id']);
    $vt->deleteVirtualPlanner($_GET['id']);
    $vpt->deleteVirtualPlannerDetails($_GET['id']);
    $vpf->deleteVirtualPlannerFinal($_GET['id']);
    $ppf->deletePigmentPlannerFinald($_GET['id']);
    $spf->deleteScreenPlannerFinal($_GET['id']);   
    
    header("location:virtual_planner_beta_view.php");
    exit();
}
?>



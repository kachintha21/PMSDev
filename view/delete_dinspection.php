<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/DInspection.class.php");
include("../model/LayoutPlans.class.php");
$di = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ID = $_GET['id'];

$res=$di->getDInspectionById($ID);
$update=$lp->resetLayoutplansByID($res[13],0,0);


if (isset($_GET['id'])) {
    $di->deleteDInspection($_GET['id']);
    header("location:dinspection_view.php");
    exit();
}
?>

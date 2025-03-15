<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/VirtualPlannerFinal.class.php");
$pds = new VirtualPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ID=$_GET['id'];

if (isset($_GET['id'])) {
    $pds->deleteVirtualPlannerFinal($_GET['id']);
    header("location:virtual_printing_planne_view.php?id=$ID");
    exit();
}





?>
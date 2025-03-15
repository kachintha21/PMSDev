<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/ScreenPlannerFinal.class.php");
$sp = new ScreenPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ID = $_GET['id'];

if (isset($_GET['id'])) {
    $sp->deleteScreenPlannerFinal($_GET['id']);
    header("location:new_screen_planner.php?id=$ID");
    exit();
}
?>

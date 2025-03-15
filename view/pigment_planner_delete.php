<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/db_config.php");
include("../model/PigmentPlannerFinal.class.php");
$pl = new PigmentPlannerFinal(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ID = $_GET['id'];

if (isset($_GET['id'])) {
    $pl->deletePigmentPlannerFinal($_GET['id']);
     header("location:pigment_planner.php?id=$ID");
     exit();
}



?>




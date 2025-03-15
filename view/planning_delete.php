<?php
include("../include/db_config.php");
include("../model/PlanedQty.class.php");
$plt = new PlanedQty(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (isset($_GET['id'])) {
    $plt->deletePlanedQty($_GET['id']);
    header("location:planning_data.php");
    exit();
}
?>


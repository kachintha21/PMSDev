<?php
include("../include/db_config.php");
include("../model/PreparingLayout.class.php");
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if (isset($_GET['id'])) {
    $pl->updatePreparingLayoutById($_GET['id'],'1','');
     header("location:virtual_planner_beta.php");
     exit();
}
 
?>


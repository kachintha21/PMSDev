<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PrintingStatus.class.php");

$pl = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$PrintingStatus=$pl->getPrintingStatusByPrintingId($_GET['id']);


if (isset($_GET['id'])) {
       $pl->getPrintingStatusEnableById($_GET['id']);
       header("location:decal_printing.php?id=$PrintingStatus[1]");
    exit();
}
?>

<?php

include("../include/common.php");
include("../include/db_config.php");
include("../model/Planning.class.php");
include("../model/PlanningAuto.class.php");
include("../model/PlanedQty.class.php");
include("../model/SavedLayoutplans.class.php");
include("../model/LayoutPlans.class.php");
include("../model/PreparingLayout.class.php");
include("../model/PlanningDetails.class.php");
include("../model/PrintingSchedule.class.php");
include("../model/ProductStatus.class.php");
include("../model/PrintingStatus.class.php");



$prl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pd = new PlanningDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new ProductStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$prs = new PrintingSchedule(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pst = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$res = $prl->getPreparingLayoutByNo($_GET['id']);
$multiple = $pl->updateMultipleSavedLayoutplans($res[3]);

$prl->deletePreparingLayoutByProNo($_GET['id']);
$lp->deleteLayoutplansByProNo($_GET['id']);
$prs->deletePrintingScheduleByProNo($_GET['id']);
$pst->deletePrintingStatusByProNo($_GET['id']);
$ps->deleteProductStatusbyProNo($_GET['id']);
header("location:printing_order_details.php");
exit();
?>
<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/Planning.class.php");
include("../model/PlanningAuto.class.php");
include("../model/PlanedQty.class.php");
include("../model/MinusReport.class.php");
include("../model/YieldMaster.class.php");
include("../model/CurveMaster.class.php");
$pl = new Planning(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pa = new PlanningAuto(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$plt = new PlanedQty(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$minis = new MinusReport(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ym = new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cm = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$error = "";
$is_admin = 0;

$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;

if (count($_POST) > 0) {

    // if errors
    if ($error != "") {
        echo $error;
    } else {

        



        foreach ($_POST['design_fdt'] as $key => $id) {
            $fd = array('design_fdt' => $_POST['design_fdt'][$key],
                'curve_fdt' => $_POST['curve_fdt'][$key],
                'item03_fdt' => $_POST['item03_fdt'][$key],
                'total_fdt' => $_POST['total_fdt'][$key]
      
            );
          



               

         $res = $pl->createNewPlanning(
                  $_POST['id'], $_POST['ref_no_fdt'], $_POST['design_fdt'][$key], $_POST['curve_fdt'][$key], $_POST['total_fdt'][$key], '0', $_POST['item'][$key], $_POST['item02_fdt'], $_POST['item03_fdt'][$key], $_POST['item04_fdt'],  $_POST['item04_fdt'], $_POST['org_name_fdt'], getServerDate(), getServerTime()
            );
            
            
            }
            
            

        
        
      $_SESSION['ref_no_no'] = $_POST['ref_no_fdt'];


    if ($res = true) {
        echo("1");
    } else {

        echo("Add operation is fail");
    }
        
        
    }



  
} else {
    echo(false);
}
?>
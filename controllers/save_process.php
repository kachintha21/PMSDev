<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/remote_db_config.php");
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
$minis = new MinusReport(RDB_SERVER, RDB_USERNAME, RDB_PASSWORD, RDB_DATABASE);
$ym = new YieldMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cm = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$error = "";
$is_admin = 0;

$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;

if (count($_POST) > 0) {
//print(123);exit;
    // if errors
    if ($error != "") {
        echo $error;
    } else {


        foreach ($_POST['checkboxt'] as $nkey => $nid) {
            $fd = array('ORNYDATE' => $_POST['ORNYDATE'][$nkey],
                'ORDEST' => $_POST['ORDEST'][$nkey],
                'ORNYDATE' => $_POST['ORNYDATE'][$nkey],
                'checkboxt' => $_POST['checkboxt'][$nkey],
            );

            if (!empty($_POST['checkboxt'][$nkey])) {
                foreach ($_POST['t'] as $key => $id) {
                    $fd = array('org_name_prt' => $_POST['org_name_prt'][$key],
                        'dec_patt' => $_POST['dec_patt'][$key],
                        'dec_curve' => $_POST['dec_curve'][$key],
                        'item' => $_POST['item'][$key],
                        'id' => $_POST['idtt'][$key],
                        't' => $_POST['t'][$key],
                    );

                    $select_qty = $minis->getMinusReportByUnique($_POST['dec_patt'][$key], $_POST['dec_curve'][$key], $_POST['item'][$key], $_POST['ORNYDATE'][$nkey], $_POST['ORDEST'][$nkey]);
                    $select_qty =$ym->getYieldByRefNo($_POST['dec_patt'][$key],$_POST['dec_curve'][$key],$select_qty);



                    $res = $plt->createNewPlanedQty(
                            $_POST['id'], $_POST['ref_no_fdt'], $_POST['dec_patt'][$key], $_POST['dec_curve'][$key], $_POST['item'][$key], $select_qty, $_POST['ORNYDATE'][$nkey], $_POST['ORDEST'][$nkey], $_POST['item02_pqt'], $_POST['item03_pqt'], $_POST['item04_pqt'], $_POST['item05_pqt'], $_POST['org_name_pqt'], getServerDate(), getServerTime()
                    );
                }
            }
        }


        foreach ($_POST['t'] as $key => $id) {
            $fd = array('org_name_prt' => $_POST['org_name_prt'][$key],
                'dec_patt' => $_POST['dec_patt'][$key],
                'dec_curve' => $_POST['dec_curve'][$key],
                'item' => $_POST['item'][$key],
                'id' => $_POST['idtt'][$key]
            );
          
            if($_POST['t'][$key]>0){

                 $res_schedule_date = $plt->getScheduleDate($_POST['ref_no_fdt']);
               $DecalNumber=$cm->getDecalNumberByRefNo($_POST['dec_patt'][$key],$_POST['dec_curve'][$key]);  

            $res = $pl->createNewPlanning(
                    $_POST['id'], $_POST['ref_no_fdt'], $_POST['dec_patt'][$key], $_POST['dec_curve'][$key], $_POST['t'][$key], '0', $_POST['item'][$key], $_POST['item02_fdt'], $DecalNumber, $_POST['item04_fdt'],  $res_schedule_date, $_POST['org_name_fdt'], getServerDate(), getServerTime()
            );
            }
            
            
        }
        
           $res = $pa->createNewPlanningAuto(
                $_POST['id'], $_POST['ref_no_fdt'], $_POST['item01_pat'], $_POST['item02_pat'], $_POST['item03_pat'], $_POST['item04_pat'], $_POST['item05_pat'], $_POST['org_name_fdt'], getServerDate(), getServerTime()
        );
 
        
        
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
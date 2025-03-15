<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/VirtualPlannerDetails.class.php");
include("../model/VirtualPlanner.class.php");
include("../model/PreparingLayout.class.php");
include("../model/PigmentMaster.class.php");

$vpd = new VirtualPlannerDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$vp = new VirtualPlanner(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pigm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

        $products = array();

        foreach ($_POST['pro_no_vpt'] as $key => $id) {

            $products = array(
                'ID' => $_POST['ID'][$key],
                'code' => $id,
                'pro_no_vpt' => $_POST['pro_no_vpt'][$key],
                'lot_no_vpt' => $_POST['lot_no_vpt'][$key],
                'qty_vpt' => $_POST['qty_vpt'][$key],
                'ship_scheduled_date_vpt' => $_POST['ship_scheduled_date_vpt'][$key],
                'item01_vpt' => $_POST['item01_vpt'][$key],
            );

            if (isset($_POST['ID'][$key])) {

                $is = (isset($_POST['ID'][$key])) ? 0 : 0;

                $res_update = $pl->updatePreparingLayoutByRefNo($_POST['pro_no_vpt'][$key], '2', '');


                $res = $vpd->createNewVirtualPlannerDetails(
                        $_POST['id'], $_POST['ref_no_vpt'], $_POST['date_vpt'], $_POST['pro_no_vpt'][$key], $_POST['lot_no_vpt'][$key], $_POST['qty_vpt'][$key], $_POST['ship_scheduled_date_vpt'][$key], 0, $_POST['item01_vpt'][$key], $_POST['item02_vpt'], $_POST['item03_vpt'], $_POST['item04_vpt'], $is, $_POST['org_name_vpt'], getServerDate(), getServerTime()
                );
            }
        }


        $res = $vp->createNewVirtualPlanner(
                $_POST['id'], $_POST['ref_no_vpt'], $_POST['date_vpt'], $_POST['org_name_vpt'], getServerDate(), getServerTime()
        );


        $query = "SELECT * 
FROM virtual_planner_details_tbl 
LEFT JOIN pigment_master_tbl ON pigment_master_tbl.pattern_pm = virtual_planner_details_tbl.item01_vpt AND pigment_master_tbl.colours_pm NOT IN ('T01','T02')
WHERE virtual_planner_details_tbl.ref_no_vpt='" . $_POST['ref_no_vpt'] . "'
ORDER BY pigment_master_tbl.colours_pm ASC ";



        if ($result = $conn->query($query)) {
            while ($row = $result->fetch_assoc()) {
                //$priority_color = ($row['colours_pm'] == 'S01' || $row['colours_pm'] == 'S02') ? 1 : 0;
                $res = "INSERT INTO virtual_temp_details_tbl  SET              
                ref_no_vtdt='" . $_POST['ref_no_vpt'] . "',      
                pro_no_vtdt='" . $row['pro_no_vpt'] . "',
                design_no_vtdt='4166L',
                lot_no_vtdt='" . $row['lot_no_vpt'] . "',
                colours_vtdt='" . $row['colours_pm'] . "',
                number_colour_vtdt='" . $pigm->getNumberPigmentMasterByNo($row['item01_vpt']) . "',
                qty_vtdt='" . $row['qty_vpt'] . "',
                ship_scheduled_date_vtdt='" . $row['ship_scheduled_date_vpt'] . "',
                machine_vtdt='-',
                priority_vtdt='1',
                is_edit_vtdt='0',
                item01_vtdt='-',
                item02_vtdt='0',
                item03_vtdt='" . $_POST['date_vpt'] . "', 
                item04_vtdt='" . $item04_vtdt . "',
                item05_vtdt='" . $item05_vtdt . "',
                org_name_vtdt='" . $org_name_vtdt . "',
                date_vtdt='" . getServerDate() . "',
                time_vtdt='" . getServerTime() . "'
		";
                $yy = $conn->query($res);
            }
        }



        echo("1");
    }
} else {
    echo(false);
}
?>
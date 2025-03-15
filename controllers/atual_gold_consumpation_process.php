<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/GoldConsumpation.class.php");
include("../model/CurveMaster.class.php");
include("../model/PreparingLayout.class.php");
$ms = new CurveMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$gc = new GoldConsumpation(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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

        foreach ($_POST['pro_no_gct'] as $key => $id) {
            $fd = array('pro_no_gct' => $_POST['pro_no_gct'][$key],
                'lot_no_gct' => $_POST['lot_no_gct'][$key],
                'pattern_no_gct' => $_POST['pattern_no_gct'][$key],
                'printing_gc' => $_POST['printing_gc'][$key],
                'color_gct' => $_POST['color_gct'][$key],
                'consumption_gct' => $_POST['consumption_gct'][$key],
                   'atual_sheet' => $_POST['atual_sheet'][$key],
                'org_name_gct' => $_POST['org_name_gct'][$key],            );
            $fg_deign_gct = $ms->getFgDesignByDecalDesign($_POST['pattern_no_gct'][$key]);
            $res = $gc->createNewGoldConsumpation($_POST['id'], $_POST['pro_no_gct'][$key], $_POST['lot_no_gct'][$key], $_POST['pattern_no_gct'][$key], $fg_deign_gct, $_POST['printing_gct'][$key], $_POST['color_gct'][$key], $_POST['consumption_gct'][$key], 0, $_POST['atual_sheet'][$key], $_POST['item02_gct'], $_POST['item03_gct'], $_POST['item04_gct'], $_POST['org_name_gct'], getServerDate(), getServerTime()
            );
            
            
            $pl->updateGoldconsumpationPreparingLayoutByRePro($_POST['pro_no_gct'][$key]);


            if ($res = true) {
                echo("1");
            } else {

                echo("Add operation is fail");
            }
        }
    }
} else {
    echo(false);
}
?>
<?php

session_start();
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/DInspection.class.php");
include("../model/DefectsCategories.class.php");
include("../model/LayoutPlans.class.php");


$dis = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$lp = new LayoutPlans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$dc = new DefectsCategories(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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

      //echo "<pre>";
       //print_r($_POST);
		//echo "</pre>";

		//$ins_qty_2nd=$_POST['rem_qty_qc']-$_POST['ins_qty_1st'];
		$ins_qty_2nd=0;
			
		$res4 = $dis->insDataWith2nd(
			
			
                    $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], 
					$_POST['ins_qty_1st'],$ins_qty_2nd, $_POST['epf_no'], getServerDate(), getServerTime(),'with 2nd', $_POST['p_date'] );
			
			
	
		


       
//        $res4 = $dc->createNewDefectsCategories(
//                $_POST['id'], $_POST['item02_dt'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], $_POST['printing_qty_dt'], $_POST['register_dct'], $_POST['line_dct'], $_POST['pinhole_dct'], $_POST['emboss_dct'], $_POST['topcoat_dct'], $_POST['dust_dct'], $_POST['other_dct'], $_POST['color_dct'], $_POST['pinhole_repair_dct'], $_POST['topcoat_repair_dct'], $_POST['item01_dct'], $_POST['item02_dct'], $_POST['item03_dct'], $_POST['item04_dct'], $_POST['item05_dct'], $_POST['org_name_dt'], getServerDate(), getServerTime()
//        );


        $_SESSION['id'] = $_POST['item02_dt'];
        echo("1");
    }
} else {
    echo(false);
}
?>
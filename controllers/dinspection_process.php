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

//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";


        foreach ($_POST['curve_no_dt'] as $key => $id) {
            $fd = array('id' => $_POST['id'][$key],
                'printing_pattern_dt' => $_POST['printing_pattern_dt'][$key],
                'curve_no_dt' => $_POST['curve_no_dt'][$key],
                'decal_pattern_dt' => $_POST['decal_pattern_dt'][$key],
                'planned_qty_dt' => $_POST['planned_qty_dt'][$key],
                'item01_dt' => $_POST['item01_dt'][$key],
                'item03_dt' => $_POST['item03_dt'][$key],
                'remain_qty_dt' => $_POST['remain_qty_dt'][$key],
                'register_dt' => $_POST['register_dt'][$key],
                'line_dct' => $_POST['line_dct'][$key],
                'pinhole_dt' => $_POST['pinhole_dt'][$key],
                'emboss_dt' => $_POST['emboss_dt'][$key],
                'topcoat_dt' => $_POST['topcoat_dt'][$key],
                'dust_dt' => $_POST['dust_dt'][$key],
                'other_dt' => $_POST['other_dt'][$key],
                'color_dt' => $_POST['color_dt'][$key],
                'pinhole_repair_dt' => $_POST['pinhole_repair_dt'][$key],
                'topcoat_repair_dt' => $_POST['topcoat_repair_dt'][$key],
            );



            $res2 = $lp->updateLayoutplansByID(
                    $_POST['id'][$key], $_POST['pro_no_lpt'], $_POST['layout'], '3', $_POST['desing_no_lpt'][$key], $_POST['curve_no_lpt'][$key], $_POST['decal_no_lpt'][$key], $_POST['planned_qty_lpt'][$key], $_POST['no_of_curves_lpt'][$key], $_POST['no_of_sheets_lpt'][$key], $_POST['close_curve_after_lpt'][$key], $_POST['total_sheets_needed_lpt'][$key], 0, '2', $_POST['item01_dt'][$key], $_POST['remain_qty'][$key], $_POST['item03_lpt'], $_POST['item04_lpt'], $_POST['item05_lpt'], $_POST['org_name_dt'], getServerDate(), getServerTime()
            );



            $res3 = $dis->createNewDInspection(
			
			
                    $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], $_POST['printing_qty_dt'], $_POST['printing_lines_dt'], 
					$_POST['paper_size_dt'], $_POST['printing_pattern_dt'][$key], $_POST['delivery_date_dt'], $_POST['curve_no_dt'][$key], 
					$_POST['decal_pattern_dt'][$key], $_POST['planned_qty_dt'][$key], $_POST['remain_qty_dt'][$key], $_POST['id'][$key], 
					$_POST['register_dt'][$key], $_POST['line_dt'][$key], $_POST['pinhole_dt'][$key], $_POST['emboss_dt'][$key], 
					$_POST['topcoat_dt'][$key], $_POST['dust_dt'][$key], $_POST['other_dt'][$key], $_POST['color_dt'][$key], $_POST['pinhole_repair_dt'][$key], 
					$_POST['topcoat_repair_dt'][$key], 0, $_POST['judgment_dt'], $_POST['remarks_dt'], $_POST['item01_dt'][$key], $_POST['item02_dt'], 
					$_POST['item03_dt'][$key], $_POST['item04_dt'], $_POST['item05_dt'], $_POST['item06_dt'], $_POST['item07_dt'], $_POST['item08_dt'], 
					$_POST['item09_dt'], $_POST['item10_dt'], $_POST['org_name_dt'], getServerDate(), getServerTime(), $_POST['is_bs']
            );
			
			
			if($_POST['is_fin'] == 'isFIN'){
				
				$res4 = $dis->lotFinished(
			
			
                    $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], 
					$_POST['received_qty'], $_POST['good_qty'], getServerDate(), getServerTime() );
			
			
				$res5 = $dis->completelot($_POST['pro_no_dt'] );
			
		
			}
			
			
			
			
			
        }

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
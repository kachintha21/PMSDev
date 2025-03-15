<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/QcQcApproval.class.php");
include("../model/PrintingStatus.class.php");
include("../model/DInspection.class.php");


$qc = new QcQcApproval(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$dis = new DInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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
		//rint_r($_POST);
        //echo "</pre>";
		
		foreach ($_POST['curve_no_dt'] as $key => $id) {
           
		   
			 $res = $dis->defectData(
            $_POST['id'],
			$_POST['decal_no_dt'][$key],
            $_POST['pattern_no_dt'],
            $_POST['pro_no_dt'],
            $_POST['lot_no_dt'],
            $_POST['curve_no_dt'][$key],
            $_POST['Good'][$key],
            $_POST['Register'][$key],
           $_POST['Top'][$key],
		   $_POST['Dust'][$key],
		   $_POST['Line'][$key],
		   $_POST['Embose'][$key],
		   $_POST['Pin'][$key],
		   $_POST['Others'][$key],
            getServerDate(),
            getServerTime()
			
			
			
			
        );
		if($_POST['Good'][$key] > 0){
		$res3 = $dis->createNewDInspection(
			
			
                    $_POST['id'], $_POST['pattern_no_dt'], $_POST['pro_no_dt'], $_POST['lot_no_dt'], $_POST['Good'][$key], $_POST['printing_lines_dt'], 
					$_POST['paper_size_dt'], $_POST['pattern_no_dt'], $_POST['delivery_date_dt'], $_POST['curve_no_dt'][$key], 
					$_POST['pattern_no_dt'], $_POST['planned_qty_dt'][$key], $_POST['remain_qty_dt'][$key], $_POST['id'][$key], 
					$_POST['register_dt'][$key], $_POST['line_dt'][$key], $_POST['pinhole_dt'][$key], $_POST['emboss_dt'][$key], 
					$_POST['topcoat_dt'][$key], $_POST['dust_dt'][$key], $_POST['other_dt'][$key], $_POST['color_dt'][$key], $_POST['pinhole_repair_dt'][$key], 
					$_POST['topcoat_repair_dt'][$key], 0, $_POST['judgment_dt'], $_POST['remarks_dt'], $_POST['Good'][$key], $_POST['item02_dt'], 
					$_POST['item03_dt'][$key], $_POST['item04_dt'], $_POST['item05_dt'], $_POST['item06_dt'], $_POST['item07_dt'], $_POST['item08_dt'], 
					$_POST['item09_dt'], $_POST['item10_dt'], $_POST['org_name_dt'], getServerDate(), getServerTime(), $_POST['is_bs']
            );
		
		}
		
		
		
		
		        

        }
		echo("1");

    }
} else {
    echo(false);
}
?>
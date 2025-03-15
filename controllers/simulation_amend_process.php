<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
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


        foreach ($_POST['id'] as $key => $id) {
            $fd = array('id' => $_POST['id'][$key],
                'design' => $_POST['design'][$key],
                'schedule' => $_POST['schedule'][$key],
                'curve_no' => $_POST['curve_no'][$key],
                'decal_design' => $_POST['decal_design'][$key],
                'planned_qty' => $_POST['planned_qty'][$key],
                'no_of_curves' => $_POST['no_of_curves'][$key],
                'no_of_sheets' => $_POST['no_of_sheets'][$key],
                'close_curve_after' => $_POST['close_curve_after'][$key],
                'total_sheets_needed' => $_POST['total_sheets_needed'][$key]
            );

    

            

          $res = $pl->updateSavedLayoutplans(
                    $_POST['id'][$key], $_POST['ref_id'], $_POST['layout'], $_POST['design'][$key],$_POST['schedule'][$key], $_POST['curve_no'][$key],$_POST['decal_design'][$key], $_POST['curve_area'][$key], $_POST['planned_qty'][$key], $_POST['no_of_curves'][$key], $_POST['no_of_sheets'][$key], $_POST['close_curve_after'][$key], $_POST['total_sheets_needed'][$key], $_POST['created_date'][$key], $_POST['status'], getServerDate()
            );




            $res = $lp->createNewLayoutplans(
                    $_POST['id'], $_POST['pro_no_lpt'], $_POST['layout'], $_POST['status'], $_POST['design'][$key], $_POST['curve_no'][$key], $_POST['decal_design'][$key], $_POST['planned_qty'][$key], $_POST['no_of_curves'][$key], $_POST['no_of_sheets'][$key], $_POST['close_curve_after'][$key], $_POST['total_sheets_needed'][$key], 0, $_POST['status_lpt'], $_POST['decal_design'][$key], $_POST['item02_lpt'], $_POST['item03_lpt'], $_POST['item04_lpt'], $_POST['item05_lpt'], $_POST['org_name_lpt'], getServerDate(), getServerTime()
            );
        }
    }


     foreach ($_POST['desing_no_lpt'] as $key => $id) {
        $fd = array('id' => $_POST['id'][$key],
            'desing_no_lpt' => $_POST['desing_no_lpt'][$key],
            'curve_no_lpt' => $_POST['curve_no_lpt'][$key],
            'planned_qty' => $_POST['planned_qty'][$key],
            'decal_no_lpt' => $_POST['decal_no_lpt'][$key],
            'no_of_curves_lpt' => $_POST['no_of_curves_lpt'][$key],
            'no_of_sheets_lpt' => $_POST['no_of_sheets_lpt'][$key],
            'close_curve_after_lpt' => $_POST['close_curve_after_lpt'][$key],
            'total_sheets_needed_lpt' => $_POST['total_sheets_needed_lpt'][$key],
        );

        if ($_POST['desing_no_lpt'][$key] !== "") {

            $res2 = $lp->createNewLayoutplans(
                    $_POST['id'], $_POST['pro_no_lpt'], $_POST['layout'], $_POST['status'], $_POST['desing_no_lpt'][$key], $_POST['curve_no_lpt'][$key], $_POST['decal_no_lpt'], $_POST['planned_qty_lpt'][$key], $_POST['no_of_curves_lpt'][$key], $_POST['no_of_sheets_lpt'][$key], $_POST['close_curve_after_lpt'][$key], $_POST['total_sheets_needed_lpt'][$key], 0, $_POST['status_lpt'], $_POST['item01_lpt'], $_POST['item02_lpt'], $_POST['item03_lpt'], $_POST['item04_lpt'], $_POST['item05_lpt'], $_POST['org_name_lpt'], getServerDate(), getServerTime()
            );
        }
    }





    foreach ($_POST['pattern_no_pst'] as $key => $id) {
        $dd = array('ref_no_pst' => $_POST['ref_no_pst'][$key],
            'pattern_no_pst' => $_POST['pattern_no_pst'][$key],
            'pro_no_pst' => $_POST['pro_no_pst'][$key],
            'lot_no_pst' => $_POST['lot_no_pst'][$key],
            'plan_date_pst' => $_POST['plan_date_pst'][$key],
        );

        $res3 = $prs->createNewPrintingSchedule(
                $_POST['id'], $_POST['ref_no_pst'][$key], $_POST['pattern_no_pst'][$key], $_POST['ref_no_pst'][$key], $_POST['lot_no_pst'][$key], $_POST['color_pst'][$key], $_POST['plan_date_pst'][$key], $_POST['actual_date_pst'][$key], $_POST['is_edit_pst'], $_POST['item01_pst'], $_POST['item02_pst'], $_POST['item03_pst'], $_POST['item04_pst'], $_POST['item05_pst'], $_POST['org_name_pst'], getServerDate(), getServerTime()
        );
    }




     foreach ($_POST['npattern_no_pst'] as $key => $id) {
        $dd = array('nproduction_no_pst' => $_POST['nproduction_no_pst'][$key],
            'npattern_no_pst' => $_POST['npattern_no_pst'][$key],
            'nlot_no_pst' => $_POST['nlot_no_pst'][$key],
            'nscreen_mesh_pst' => $_POST['nscreen_mesh_pst'][$key],
            'ncolour_index_pst' => $_POST['ncolour_index_pst'][$key],
            'ncolour_name_pst' => $_POST['ncolour_name_pst'][$key], 
        );

        $res4 = $pst->createNewPrintingStatus(
            $_POST['id'],
            $_POST['ref_no_pst'][$key],
            $_POST['npattern_no_pst'][$key],
            $_POST['nproduction_no_pst'][$key],
            $_POST['nlot_no_pst'][$key],
            $_POST['nscreen_mesh_pst'][$key],
            $_POST['ncolour_index_pst'][$key],
            $_POST['ncolour_name_pst'][$key],
            1,
            $_POST['pro02_pst'],
            $_POST['pro03_pst'],
            $_POST['pro04_pst'],
            $_POST['pro05_pst'],
            $_POST['pro06_pst'],
            $_POST['pro07_pst'],
            $_POST['pro08_pst'],
            $_POST['pro09_pst'],
            $_POST['pro10_pst'],
            0,
            $_POST['org_name_ct'],
            getServerDate(), getServerTime()
            
        );
    }

    $res = $prl->createNewPreparingLayout(
            $_POST['id'], $_POST['pro_no_lpt'], $_POST['pro_no_lpt'], $_POST['layout'], $_POST['desing'], $_POST['shipment_request_plt'], $_POST['printing_lines_plt'], $_POST['date_plt'], $_POST['printing_way_plt'], $_POST['paper_size_plt'], $_POST['body_plt'], $_POST['factory_plt'], $_POST['market_plt'], $_POST['decoration_plt'], $_POST['number_sheet_plt'], $_POST['printing_plt'], $_POST['is_remarks_plt'], $_POST['item01_plt'], 'OK', $_POST['item03_plt'], $_POST['item04_plt'], $_POST['item05_plt'], $_POST['item06_plt'], $_POST['item07_plt'], $_POST['item08_plt'], $_POST['item09_plt'], $_POST['item10_plt'], $_POST['item11_plt'], $_POST['item12_plt'], $_POST['item13_plt'], $_POST['item14_plt'], $_POST['item15_plt'], 0, $_POST['org_name_plt'], getServerDate(), getServerTime()
    );

    $res = $ps->createNewProductStatus(
            $_POST['id'], $_POST['pro_no_lpt'], $_POST['desing'], $_POST['pro_no_lpt'], $_POST['layout'], $_POST['shipment_request_plt'], 1, $_POST['pro02_pt'], $_POST['pro03_pt'], $_POST['pro04_pt'], $_POST['pro05_pt'], $_POST['pro06_pt'], $_POST['pro07_pt'], $_POST['pro08_pt'], $_POST['pro09_pt'], $_POST['pro10_pt'], $_POST['pro11_pt'], $_POST['pro12_pt'], $_POST['pro13_pt'], $_POST['pro14_pt'], $_POST['pro15_pt'], $_POST['pro16_pt'], $_POST['pro17_pt'], $_POST['pro18_pt'], $_POST['pro19_pt'], 0, $_POST['org_name_plt'], getServerDate(), getServerTime()
    );


    if ($res = true) {
        echo("1");
    } else {

        echo("Add operation is fail");
    }
    
  
    
    
    
    
    
} else {
    echo(false);
}
?>
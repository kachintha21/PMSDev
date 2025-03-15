<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PigmentMaster.class.php");
include("../model/PigmentModel.class.php");
include("../model/Colours.class.php");
include("../model/OilData.class.php");



$tip = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentModel(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cm = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$om = new OilData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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



    if (empty($_POST['id'])) {

        $sheets=($_POST['item01_pmt']=="1") ? '6' : '7';  

        $res = $pm->createNewPigmentModel(
                $_POST['id'], $_POST['ref_no_pmt'], $_POST['pattern_pm'], $_POST['paper_size_pm'], $_POST['st_proof_pape_pm'], $_POST['printing_way_pm'], $_POST['body_pm'], $_POST['decoration_pm'], $_POST['market_pm'], $_POST['layout_pm'], 0, $sheets, $_POST['item02_pmt'], $_POST['item03_pmt'], $_POST['item04_pmt'], $_POST['item05_pmt'], $_POST['org_name_pmt'], getServerDate(), getServerTime()
        );





        foreach ($_POST['rows'] as $mdaKey => $mdaData) {

            if ($mdaKey !== "xxx") {




                $res = $tip->createNewPigmentMaster(
                        $_POST['id'], $_POST['ref_no_pm'], $_POST['pattern_pm'], $mdaData['colours_pm'], $mdaData['colours_name_pm'], $mdaData['screen_mesh_pm'], $mdaData['colour_code_pm'], $_POST['paper_size_pm'], $_POST['print_paper_pm'], $_POST['printing_way_pm'], $_POST['body_pm'], $_POST['decoration_pm'], $_POST['market_pm'], $_POST['layout_pm'], $_POST['st_proof_pape_pm'], $_POST['colour_qty_pm'][$key], 0, $_POST['item01_pm'], $_POST['item02_pm'], $_POST['item03_pm'], $_POST['item04_pm'], $_POST['item05_pm'], $_POST['org_name_pm'], getServerDate(), getServerTime()
                );





                $pigment = array();
                $oil = array();
                foreach ($mdaData['pigment_name_ct'] as $pKey => $pData) {




                    $pigment = array(
                        'pigment_name_ct' => $mdaData['pigment_name_ct'][$pKey],
                        'qty_ct' => $mdaData['qty_ct'][$pKey]
                    );


                    $res = $cm->createNewColours(
                            $_POST['id'], $_POST['ref_no_ct'], $_POST['pattern_pm'], $mdaData['colours_pm'], $mdaData['colours_name_pm'], $mdaData['pigment_name_ct'][$pKey], $mdaData['qty_ct'][$pKey], $_POST['item01_ct'], $_POST['item02_ct'], $_POST['item03_ct'], $_POST['item04_ct'], $_POST['item05_ct'], 0, $_POST['org_name_ct'], getServerDate(), getServerTime()
                    );
                }





                foreach ($mdaData['oil_name_odt'] as $oKey => $oData) {

                    $pigment = array(
                        'oil_name_odt' => $mdaData['oil_name_odt'][$oKey],
                        'oil_qty_odt' => $mdaData['oil_qty_odt'][$oKey]
                    );



                    $res = $om->createNewOilData(
                            $_POST['id'], $_POST['ref_no_ct'], $_POST['pattern_pm'], $mdaData['colours_pm'], $mdaData['colours_name_pm'], $mdaData['oil_name_odt'][$oKey], $mdaData['oil_qty_odt'][$oKey], $_POST['mixing_oil_odt'], 0, $_POST['item01_odt'], $_POST['item02_odt'], $_POST['item03_odt'], $_POST['item04_odt'], $_POST['item05_odt'], $_POST['org_name_odt'], getServerDate(), getServerTime()
                    );
                }
            }
    }}
        else{
                 $res = $tip->updatePigmentMaster(
                        $_POST['id'], $_POST['ref_no_pm'], $_POST['pattern_pm'], '', '', '', '', $_POST['paper_size_pm'], $_POST['print_paper_pm'], $_POST['printing_way_pm'], $_POST['body_pm'], $_POST['decoration_pm'], $_POST['market_pm'], $_POST['layout_pm'], $_POST['st_proof_pape_pm'], '',  $_POST['is_edit_pm'], $_POST['item01_pm'], $_POST['item02_pm'], $_POST['item03_pm'], $_POST['item04_pm'], $_POST['item05_pm'], $_POST['org_name_pm'], getServerDate(), getServerTime()
                );

            
        }




        echo("1");
    }
} else {
    echo(false);
}
?>
<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/PreparingLayout.class.php");
include("../model/PlanningDetails.class.php");
include("../model/PrintingTime.class.php");
include("../model/ProductStatus.class.php");
include("../model/FilmOuting.class.php");
include("../model/FilmOutingDetails.class.php");
include("../model/PrintingStatus.class.php");



$fo = new FilmOuting(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$fod = new FilmOutingDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$ps = new PrintingStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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



        $res = $fo->createNewFilmOuting(
                $_POST['id'], $_POST['pattern_no_fot'], $_POST['pro_no_fot'], $_POST['lot_fot'], $_POST['sheets_fot'], $_POST['judgment_fot'], $_POST['ffinish_date_fot'], $_POST['colour_print_date_fot'], $_POST['print_plan_date_fot'], $_POST['layout_maker_fot'], $_POST['layout_Check_fot'], $_POST['is_edit_fot'], $_POST['item01_fot'], $_POST['item02_fot'], $_POST['item03_fot'], $_POST['item04_fot'], $_POST['item05_fot'], $_POST['item06_fot'], $_POST['item07_fot'], $_POST['item08_fot'], $_POST['item09_fot'], $_POST['item10_fot'], $_POST['org_name_fot'], getServerDate(), getServerTime()
        );







  
        $upadte=$ps->updatePrintingStatusBymultiple($_POST['pro_no_fot'],$_POST['pattern_no_fot'],$_POST['sheets_fot'],1);
        echo("1");
        




    }
} else {
    echo(false);
}
?>
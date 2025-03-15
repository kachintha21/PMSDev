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
include("../model/ColorSeparation.class.php");


$ps = new ProductStatus(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$fo = new FilmOuting(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$fod = new FilmOutingDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cs = new ColorSeparation(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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



        $res = $cs->createNewColorSeparation(
                $_POST['id'], $_POST['pro_no_sc'], $_POST['pattern_no_sc'], $_POST['lot_no_sc'], $_POST['judgment_sc'], $_POST['is_edit_sc'], $_POST['item01_sc'], $_POST['item02_sc'], $_POST['item03_sc'], $_POST['item04_sc'], $_POST['item05_sc'], $_POST['org_name_sc'], getServerDate(), getServerTime()
        );







        $ps->updateProductStatusById($_POST['pattern_no_sc'], $_POST['pro_no_sc'], $_POST['lot_no_sc'], $id, 2);
        echo("1");
    }
} else {
    echo(false);
}
?>
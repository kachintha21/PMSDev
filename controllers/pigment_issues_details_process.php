<?php

error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PigmentIssuesDetails.class.php");
include("../model/Colours.class.php");
include("../model/PigmentTransaction.class.php");


$pid = new PigmentIssuesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pt = new PigmentTransaction(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$error = "";
$is_admin = 0;
$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
if(count($_POST) > 0){


// if errors
if($error != ""){
echo $error;
}
else

$res = $pid->createNewPigmentIssuesDetails(
$_POST['id'],
 $_POST['barcode_ref_no_pidt'],
 $_POST['standard_color_no_pidt'],
 $_POST['weight_pidt'],
 $_POST['design_number_pidt'],
 $_POST['colour_index'],
 $_POST['color_name_pidt'],
 $_POST['pigment_pidt'],
 $_POST['content_pidt'],
 $_POST['oil_pidt'],
 $_POST['re_mixing_date_pidt'],
 $_POST['is_edit_pidt'],
 $_POST['remarks_pidt'],
 $_POST['item01_pidt'],
 $_POST['item02_pidt'],
 $_POST['item03_pidt'],
 $_POST['item04_pidt'],
 $_POST['item05_pidt'],
 $_POST['item06_pidt'],
 $_POST['item07_pidt'],
 $_POST['item08_pidt'],
 $_POST['item09_pidt'],
 $_POST['item10_pidt'],
 $_POST['org_name_pidt'],
 getServerDate(),
 getServerTime()
);



 $resp = $pt->createNewPigmentTransaction(
 $_POST['id'],
 $_POST['barcode_ref_no_pidt'],
 $_POST['design_number_pidt'],
 '1',
 $_POST['loc02_ptt'],
 $_POST['loc03_ptt'],
 $_POST['weight_pidt'],
 $_POST['re_mixing_date_pidt'],
 $_POST['org_name_pidt'],
 getServerDate(),
 getServerTime()



);






$_SESSION['barcode'] = $_POST['barcode_ref_no_pidt'];
echo("1");









}








else{
echo(false);
}
?>
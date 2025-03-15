<?php

error_reporting(E_PARSE|E_WARNING|E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/conn.php");
include("../model/PigmentStore.class.php");
include("../model/Colours.class.php");
include("../model/PigmentTransaction.class.php");
include("../model/PigmentIssuesDetails.class.php");

$ps = new PigmentStore(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cl = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pt = new PigmentTransaction(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pi = new PigmentIssuesDetails(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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

        $res = $ps->createNewPigmentStore(
        $_POST['id'],
        $_POST['barcode_ref_no_pidt'],
        $_POST['printing_pattern_pst'],
        $_POST['weight_pst'],
        $_POST['comment_pst'],
        $_POST['mix_date_pst'],
        $_POST['item01_pst'],
        $_POST['item02_pst'],
        $_POST['item03_pst'],
        $_POST['item04_pst'],
        $_POST['item05_pst'],
        $_POST['org_name_pst'],
         getServerDate(),
         getServerTime()
        );
    
    
    $resp = $pt->updatePigmentTransactionById($_POST['barcode_ref_no_pidt'],$_POST['printing_pattern_pst'],1);
 
echo("1");









}








else{
echo(false);
}
?>
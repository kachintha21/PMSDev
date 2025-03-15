<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/ColorRelationships.class.php");
$cr = new ColorRrelationships(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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



        foreach ($_POST['ndesign_no_crt'] as $pKey => $pData) {
            $rt = array(
                'ndesign_no_crt' => $_POST['ndesign_no_crt'][$pKey],
                'ncol_no_crt' => $_POST['ncol_no_crt'][$pKey],
                'ncol_name_crt' => $_POST['ncol_name_crt'][$pKey]
            );


            $res = $cr->createNewColorRrelationships(
                    $_POST['id'], $_POST['pattern_name'], $_POST['col_no_crt'], $_POST['col_name_crt'], $_POST['ndesign_no_crt'][$pKey], $_POST['ncol_no_crt'][$pKey], $_POST['ncol_name_crt'][$pKey], '0', $_POST['org_name_crt'], getServerDate(), getServerTime()
            );
        }
        
        
        echo("1");
    }
} else {
    echo(false);
}
?>
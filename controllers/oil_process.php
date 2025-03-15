<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/OilData.class.php");
$dis = new OilData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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




        $res2 = $dis->updateOilData(
            $_POST['id'],	
            $_POST['ref_no_odt'],	
            $_POST['pattern_no_odt'],	
            $_POST['colours_code_odt'],	
            $_POST['colours_name_odt'],	
            $_POST['oil_name_odt'],	
            $_POST['oil_qty_odt'],	
            $_POST['mixing_oil_odt'],	
            $_POST['is_edit_odt'],	
            $_POST['item01_odt'],	
            $_POST['item02_odt'],	
            $_POST['item03_odt'],	
            $_POST['item04_odt'],	
            $_POST['item05_odt'],	
            $_POST['org_name_odt'],
                getServerDate(), getServerTime()
        );

        if($res2=true){
           echo("1"); 
            
        }




    }
} else {
    echo(false);
}
?>
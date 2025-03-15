<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/Colours.class.php");
$tip = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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





        list($part1, $part2) = explode('-', $_POST['colours_code_ct']);




        $products = array();
        foreach ($_POST['pigment_name_ct'] as $key => $id) {

            $products = array(
                'code' => $id,
                'pigment_name_ct' => $_POST['pigment_name_ct'][$key],
                'name' => $_POST['name'][$key],
                'qty_ct' => $_POST['qty_ct'][$key],
            );



            $res = $tip->createNewColours(
                    $_POST['id'], $_POST['ref_no_ct'], $_POST['pattern_no_ct'], $part1, $part2, $_POST['pigment_name_ct'][$key], $_POST['qty_ct'][$key], $_POST['item01_ct'], $_POST['item02_ct'], $_POST['item03_ct'], $_POST['item04_ct'], $_POST['item05_ct'], 0, $_POST['org_name_ct'], getServerDate(), getServerTime()
            );
        }

        if ($res == true) {
            echo("1");
        } else {
            echo("<b>Add operation is fail.</b>");
        }
    }
} else {
    echo(false);
}
?>
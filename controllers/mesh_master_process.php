<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../model/MeshMaster.class.php");
$dis = new MeshMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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




        $res2 = $dis->createNewMeshMaster(
                $_POST['id'], $_POST['mesh_name_mmt'], $_POST['item01_mmt'], $_POST['item02_mmt'], $_POST['item03_mmt'], $_POST['item04_mmt'], $_POST['item05_mmt'], 0, $_POST['org_name_mmt'], getServerDate(), getServerTime()
        );

        if ($res2 = true) {
            echo("1");
        }
    }
} else {
    echo(false);
}
?>
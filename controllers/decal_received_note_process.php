<?php

error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/common.php");
include("../include/db_config.php");
include("../include/remote_db_config.php");
include("../include/conn.php");
include("../model/DecalReceivedNote.class.php");
include("../model/DecalReceivedNoteRemote.class.php");
include("../model/DInspection.class.php");

$drn = new DecalReceivedNote(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$drnR = new DecalReceivedNoteRemote(RDB_SERVER, RDB_USERNAME, RDB_PASSWORD, RDB_DATABASE);
;
$error = "";
$is_admin = 0;
$_POST_params = array();
parse_str($_POST['form_data'], $_POST_params);
$_POST = $_POST_params;
if (count($_POST) > 0) {


// if errors
    if ($error != "") {
        echo $error;
    } else
        $res = $drn->createNewDecalReceivedNote(
                $_POST['id'], $_POST['ref_no_drn'], $_POST['item01_drt'], $_POST['item02_drt'], $_POST['item03_drt'], $_POST['item04_drt'], $_POST['item05_drt'], $_POST['item06_drt'], $_POST['item07_drt'], $_POST['item08_drt'], $_POST['item09_drt'], $_POST['item10_drt'], $_POST['remakes_drt'],0, $_POST['org_name_drt'], getServerDate(), getServerTime()
        );
		
		
		$res_data = $drn->getDrndata( $_POST['ref_no_drn'] );

           // print($res_data[1]);exit;
		
		
		
		
		
		$respR = $drnR->updateDecalStock($_POST['ref_no_drn'],$res_data, 1);
      $resp = $drn->updateDecalReceivedNoteById($_POST['ref_no_drn'],'', 1);

    echo("1");
}








else {
    echo(false);
}
?>
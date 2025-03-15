<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include("../include/db_config.php");
include("../include/conn.php");
include("../include/common.php");
include("../model/SavedLayoutplans.class.php");

$id = $_GET['id'];
$slp = new SavedLayoutplans(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$res=$slp->getSavedLayoutplansById($id);
$lot_no=$res[2];

  $delete=$slp->deleteSavedLayoutplans($id);
  if($delete==true){
    header("location:../view/simulation_amend.php?id=$lot_no");
    exit();


  }



?>

<?php

include("../include/db_config.php");
include("../include/conn.php");
include("../model/Colours.class.php");
include("../model/PigmentMaster.class.php");

$tip = new Colours(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$pm = new PigmentMaster(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

/*
  $Ae = "12.4";

  $array = array(
  'Ae' => $Ae,
  );

 */

$query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $_POST['pattern_no_ct'] . "' ";



$array = array();
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        array_push($array, $row["colours_pm"] . "-" . $row["colours_name_pm"]);
    }
}

die(json_encode($array));
?>
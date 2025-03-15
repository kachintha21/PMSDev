<?php

include("../include/db_config.php");
include("../include/conn.php");



/*
  $Ae = "12.4";

  $array = array(
  'Ae' => $Ae,
  );

 */

/*$query = "SELECT * FROM product_status_tbl WHERE production_no_pt='" . $_POST['pro_no_ct'] . "' ";



$array = array();
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        array_push($array, $row["lot_no_pt"]);
    }
}*/

  
  $Ae = "12.4";

  $array = array(
  'x' => $Ae,
  );

die(json_encode($array));
?>
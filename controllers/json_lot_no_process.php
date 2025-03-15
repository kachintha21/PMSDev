<?php
include("../include/db_config.php");
include("../include/conn.php");



$query = "SELECT * FROM product_status_tbl WHERE production_no_pt='" . $_POST['pro_no_fot'] . "' ";







$array = array();
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        array_push($array, $row["lot_no_pt"]);
    }
}



die(json_encode($array));
?>
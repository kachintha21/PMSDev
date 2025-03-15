<?php
include("../include/conn.php");


if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from curve_master_tbl group by curve_no_cmt limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from curve_master_tbl where curve_no_cmt like '%".$search."%' limit 5");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['curve_no_cmt'], "text"=>$row['curve_no_cmt']);
}

echo json_encode($data);

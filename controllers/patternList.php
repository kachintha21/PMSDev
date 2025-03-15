<?php
include("../include/conn.php");


if(!isset($_POST['design_no_crt'])){
	$fetchData = mysqli_query($conn,"select * from pigment_model_tbl order by pattern_no_pmt limit 10");
}else{
	$search = $_POST['design_no_crt'];
	$fetchData = mysqli_query($conn,"select * from pigment_model_tbl where pattern_no_pmt like '%".$search."%' limit 5");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['pattern_no_pmt'], "text"=>$row['pattern_no_pmt']);
}

echo json_encode($data);

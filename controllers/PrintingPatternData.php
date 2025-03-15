<?php
include("../include/conn.php");
if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from pigment_model_tbl order by pattern_no_pmt limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from pigment_model_tbl WHERE pattern_no_pmt like '%".$search."%' order by pattern_no_pmt limit  20");
}
	
$data = array();
while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['pattern_no_pmt'], "text"=>$row['pattern_no_pmt']);
}

echo json_encode($data);




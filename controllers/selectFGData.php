<?php
include("../include/conn.php");

if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from pigment_master_tbl group by pattern_pm limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from pigment_master_tbl where pattern_pm like '%".$search."%'   group by pattern_pm limit 20");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['pattern_pm'], "text"=>$row['pattern_pm']);
}

echo json_encode($data);

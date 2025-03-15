<?php
include("../include/conn.php");
if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from curve_master_tbl order by decal_design_no_cmt limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from curve_master_tbl WHERE decal_design_no_cmt like '%".$search."%' order by decal_design_no_cmt limit  20");
}
	
$data = array();
while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['decal_design_no_cmt'], "text"=>$row['decal_design_no_cmt']);
}

echo json_encode($data);




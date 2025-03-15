<?php
include("../include/conn.php");

if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from preparing_layout_tbl group by pattern_no_plt limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from preparing_layout_tbl where pattern_no_plt like '%".$search."%' group by pattern_no_plt  limit 20");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['pattern_no_plt'], "text"=>$row['pattern_no_plt']);
}

echo json_encode($data);

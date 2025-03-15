<?php
include("../include/conn.php");
if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from preparing_layout_tbl WHERE item15_plt!='1' order by pro_no_plt limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from preparing_layout_tbl where item15_plt!='1' AND pro_no_plt like '%".$search."%' order by pro_no_plt limit  20");
}
	
$data = array();
while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['pro_no_plt'], "text"=>$row['pro_no_plt']);
}

echo json_encode($data);




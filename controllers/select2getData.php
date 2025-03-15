<?php
include("../include/conn.php");
//include("../include/remote_conn.php");

if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($conn,"select * from pigment_model_tbl order by pattern_no_pmt limit 20");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($conn,"select * from pigment_model_tbl where pattern_no_pmt like '%".$search."%' limit 20");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['pattern_no_pmt'], "text"=>$row['pattern_no_pmt']);
}

echo json_encode($data);


//if(!isset($_POST['searchTerm'])){
//	$fetchData = mysqli_query($conn,"select * from tbl_minus_report_dec_final group by dec_patt limit 20");
//}else{
//	$search = $_POST['searchTerm'];
//	$fetchData = mysqli_query($conn,"select * from tbl_minus_report_dec_final where dec_patt like '%".$search."%' limit 20");
//}
//	
//$data = array();
//
//while ($row = mysqli_fetch_array($fetchData)) {
//    $data[] = array("id"=>$row['dec_patt'], "text"=>$row['dec_patt']);
//}
//
//echo json_encode($data);

<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);



include("../include/db_config.php");
include("../include/conn.php");




if (isset($_POST['pro_no_pp'])){ 
    $pro_no=$_POST['pro_no_pp'];

    $ar = array();


$query = "SELECT * FROM printing_status_tbl WHERE production_no_pst='" . $pro_no. "' 	 ";





$t05=4545;
$t1=55454;



$ar= array('t05' => $t05,'t1' => $pro_no);
   
die(json_encode($ar));






}

?>
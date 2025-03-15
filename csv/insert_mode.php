<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
$server = "localhost";
$username = "root";
$password = "";
$db = "nlpl";
$con = mysqli_connect($server, $username, $password, $db);
$query = "SELECT DISTINCT pattern_pm  FROM pigment_master_tbl";
    if ($result = $con->query($query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
           
        
        
           $res = "INSERT INTO pigment_model_tbl  SET
		        ref_no_pmt='" . $ref_no_pmt . "',
                        pattern_no_pmt='" . $row['pattern_pm'] . "',
                        paper_size_pmt='Transfer Paper',
                        stproof_paper_pmt='Tissue-L',
                        printing_way_pmt='Transfer Paper',
                        body_pmt='Bone China',
                        decoration_pmt='S',
                        market_pmt='USA',
                        layout_pmt='S',
                        is_edit_pmt='0',
                        item01_pmt='6',
                        item02_pmt='" . $item02_pmt . "',
                        item03_pmt='" . $item03_pmt . "',
                        item04_pmt='" . $item04_pmt . "',
                        item05_pmt='" . $item05_pmt . "',
                        org_name_pmt='vijitha',
                        org_date_pmt='2021-02-27',
                        org_time_pmt='11:00:00'



		       ";


                
                
        $resultt = $con->query($res);
                
                
            }
        } 
    }
?>
 

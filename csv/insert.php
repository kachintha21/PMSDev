<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
$server = "localhost";
$username = "root";
$password = "";
$db = "nlpl";
$con = mysqli_connect($server, $username, $password, $db);
$query = "SELECT *  FROM `colours_tbl`  GROUP by colours_code_ct,pattern_no_ct ORDER BY `pattern_no_ct` ASC";
    if ($result = $con->query($query)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
           
                
                
                
        $res = "INSERT INTO pigment_master_tbl  SET
                ref_no_pm='" . $ref_no_pm . "',
                pattern_pm='" . $row['pattern_no_ct'] . "',
                colours_pm='" . $row['colours_code_ct']. "',
                colours_name_pm='" . $row['colours_name_ct'] . "', 
                screen_mesh_pm='" . $row['item04_ct'] . "',
                colour_code_pm='" . $row['item01_ct']. "', 
                paper_size_pm='Transfer Paper',
                print_paper_pm='S',
                printing_way_pm='S',
                body_pm='" . $body_pm . "',
                decoration_pm='NLPL',
                market_pm='USA',
                layout_pm='S',
                st_proof_pape_pm='Tissue-L',
                colour_qty_pm='" . $row['item02_ct']. "',
                is_edit_pm='0',
                item01_pm='" . $item01_pm . "',
                item02_pm='" . $item02_pm . "',
                item03_pm='" . $item03_pm . "',
                item04_pm='" . $item04_pm . "',
                item05_pm='" . $item05_pm . "',
                org_name_pm='vijitha',
                org_date_pm='2021-02-27',
                org_time_pm='11:00:00'


		       ";

                
                
        $resultt = $con->query($res);
                
                
            }
        } 
    }
?>
 

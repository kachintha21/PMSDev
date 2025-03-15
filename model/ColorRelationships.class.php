<?php

class ColorRrelationships {

    public $mysqli;
    public $data;

    public function __construct($host, $username, $password, $db_name) {

        $this->mysqli = new mysqli($host, $username, $password, $db_name);

        if (mysqli_connect_errno()) {

            echo "Error: Could not connect to database.";

            exit;
        }
    }

    public function __destruct() {
        $this->mysqli->close();
    }

    public function getColorRrelationshipsByNo($id) {
        $la = array();
        $query = "SELECT*FROM color_relationships_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['design_no_crt'], $rows['col_no_crt'], $rows['col_name_crt'], $rows['ndesign_no_crt'], $rows['ncol_no_crt'], $rows['ncol_name_crt'], $rows['is_edit_crt'], $rows['org_name_crt'], $rows['org_date_crt'], $rows['org_time_crt']
                );
            }
            return $la;
        }
    }

    public function getWipColorRrelationships($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function createNewColorRrelationships(
    $id, $design_no_crt, $col_no_crt, $col_name_crt, $ndesign_no_crt, $ncol_no_crt, $ncol_name_crt, $is_edit_crt, $org_name_crt, $org_date_crt, $org_time_crt
    ) {



        $res = "INSERT INTO color_relationships_tbl  SET
id='" . $id . "',
design_no_crt='" . $design_no_crt . "',
col_no_crt='" . $col_no_crt . "',
col_name_crt='" . $col_name_crt . "',
ndesign_no_crt='" . $ndesign_no_crt . "',
ncol_no_crt='" . $ncol_no_crt . "',
ncol_name_crt='" . $ncol_name_crt . "',
is_edit_crt='" . $is_edit_crt . "',
org_name_crt='" . $org_name_crt . "',
org_date_crt='" . $org_date_crt . "',
org_time_crt='" . $org_time_crt . "'



            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateColorRrelationships(
    $id, $design_no_crt, $col_no_crt, $col_name_crt, $ndesign_no_crt, $ncol_no_crt, $ncol_name_crt, $is_edit_crt, $org_name_crt, $org_date_crt, $org_time_crt
    ) {

        $res = "UPDATE color_relationships_tbl SET   	    
id='" . $id . "',
design_no_crt='" . $design_no_crt . "',
col_no_crt='" . $col_no_crt . "',
col_name_crt='" . $col_name_crt . "',
ndesign_no_crt='" . $ndesign_no_crt . "',
ncol_no_crt='" . $ncol_no_crt . "',
ncol_name_crt='" . $ncol_name_crt . "',
is_edit_crt='" . $is_edit_crt . "',
org_name_crt='" . $org_name_crt . "',
org_date_crt='" . $org_date_crt . "',
org_time_crt='" . $org_time_crt . "'


	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteColorRrelationships($id) {
        $query = "DELETE FROM color_relationships_tbl WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:color_relationships_view.php');
        }
    }

    public function getColoursCode() {
        $query = "SELECT colours_code_ct FROM colours_tbl   group by colours_code_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_code_ct'] . "' >" . $rows['colours_code_ct'] . "</option>");
            }
        }
    }

    public function getColoursName() {
        $query = "SELECT colours_name_ct FROM colours_tbl   group by colours_name_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_name_ct'] . "' >" . $rows['colours_name_ct'] . "</option>");
            }
        }
    }
    
    
    
    public function getColoursPattern() {
        $query = "SELECT pattern_no_ct FROM colours_tbl group by pattern_no_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pattern_no_ct'] . "' >" . $rows['pattern_no_ct'] . "</option>");
            }
        }
    }
    
    

}

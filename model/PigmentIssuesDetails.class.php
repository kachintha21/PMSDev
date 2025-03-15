<?php

class PigmentIssuesDetails {

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

    public function getAllPigmentIssuesDetails() {
            $query = "SELECT COUNT(barcode_ref_no_pidt) AS t FROM pigment_issues_details_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        $num_result = $result->num_rows;                
         if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {        
           return $rows['t'];
         }
         return 0;
         
            }
         
    }
    
    
    
    

    public function gePigmentIssuesByNo($barcode_ref_no_pidt) {
        $la = array();
        $query = "SELECT * FROM pigment_issues_details_tbl WHERE barcode_ref_no_pidt='" . $barcode_ref_no_pidt . "'    ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['id'], $rows['barcode_ref_no_pidt'], $rows['standard_color_no_pidt'], $rows['weight_pidt'], $rows['design_number_pidt'], $rows['color_number_pidt'], $rows['color_name_pidt'], $rows['pigment_pidt'], $rows['content_pidt'], $rows['oil_pidt'], $rows['re_mixing_date_pidt'], $rows['is_edit_pidt'], $rows['remarks_pidt'], $rows['item01_pidt'], $rows['item02_pidt'], $rows['item03_pidt'], $rows['item04_pidt'], $rows['item05_pidt'], $rows['item06_pidt'], $rows['item07_pidt'], $rows['item08_pidt'], $rows['item09_pidt'], $rows['item10_pidt'], $rows['org_name_pidt'], $rows['org_date_pidt']
                );
            }
            return $la;
        }
    }
    
        public function gePigmentIssuesById($id) {
        $la = array();
        $query = "SELECT * FROM pigment_issues_details_tbl WHERE id='" . $id . "'    ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['id'], $rows['barcode_ref_no_pidt'], $rows['standard_color_no_pidt'], $rows['weight_pidt'], $rows['design_number_pidt'], $rows['color_number_pidt'], $rows['color_name_pidt'], $rows['pigment_pidt'], $rows['content_pidt'], $rows['oil_pidt'], $rows['re_mixing_date_pidt'], $rows['is_edit_pidt'], $rows['remarks_pidt'], $rows['item01_pidt'], $rows['item02_pidt'], $rows['item03_pidt'], $rows['item04_pidt'], $rows['item05_pidt'], $rows['item06_pidt'], $rows['item07_pidt'], $rows['item08_pidt'], $rows['item09_pidt'], $rows['item10_pidt'], $rows['org_name_pidt'], $rows['org_date_pidt']
                );
            }
            return $la;
        }
    }
    
    
    
    
    

    public function getPigmentIssuesDetailsByNo($ref_no_plt) {
        $query = "SELECT * FROM pigment_issues_details_tbl WHERE ref_no_plt='" . $ref_no_plt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPigmentIssuesDetailsEntity($ref_no_plt) {
        $res = "SELECT*FROM pigment_issues_details_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentIssuesDetails(
    $id, $barcode_ref_no_pidt, $standard_color_no_pidt, $weight_pidt, $design_number_pidt, $color_number_pidt, $color_name_pidt, $pigment_pidt, $content_pidt, $oil_pidt, $re_mixing_date_pidt, $is_edit_pidt, $remarks_pidt, $item01_pidt, $item02_pidt, $item03_pidt, $item04_pidt, $item05_pidt, $item06_pidt, $item07_pidt, $item08_pidt, $item09_pidt, $item10_pidt, $org_name_pidt, $org_date_pidt, $org_time_pidt
    ) {


        $res = "INSERT INTO pigment_issues_details_tbl  SET
                id='" . $id . "',
                barcode_ref_no_pidt='" . $barcode_ref_no_pidt . "',
                standard_color_no_pidt='" . $standard_color_no_pidt . "',
                weight_pidt='" . $weight_pidt . "',
                design_number_pidt='" . $design_number_pidt . "',
                color_number_pidt='" . $color_number_pidt . "',
                color_name_pidt='" . $color_name_pidt . "',
                pigment_pidt='" . $pigment_pidt . "',
                content_pidt='" . $content_pidt . "',
                oil_pidt='" . $oil_pidt . "',
                re_mixing_date_pidt='" . $re_mixing_date_pidt . "',
                is_edit_pidt='" . $is_edit_pidt . "',
                remarks_pidt='" . $remarks_pidt . "',
                item01_pidt='" . $item01_pidt . "',
                item02_pidt='" . $item02_pidt . "',
                item03_pidt='" . $item03_pidt . "',
                item04_pidt='" . $item04_pidt . "',
                item05_pidt='" . $item05_pidt . "',
                item06_pidt='" . $item06_pidt . "',
                item07_pidt='" . $item07_pidt . "',
                item08_pidt='" . $item08_pidt . "',
                item09_pidt='" . $item09_pidt . "',
                item10_pidt='" . $item10_pidt . "',
                org_name_pidt='" . $org_name_pidt . "',
                org_date_pidt='" . $org_date_pidt . "',
                org_time_pidt='" . $org_time_pidt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentIssuesDetails(
    $id, $barcode_ref_no_pidt, $standard_color_no_pidt, $weight_pidt, $design_number_pidt, $color_number_pidt, $color_name_pidt, $pigment_pidt, $content_pidt, $oil_pidt, $re_mixing_date_pidt, $is_edit_pidt, $remarks_pidt, $item01_pidt, $item02_pidt, $item03_pidt, $item04_pidt, $item05_pidt, $item06_pidt, $item07_pidt, $item08_pidt, $item09_pidt, $item10_pidt, $org_name_pidt, $org_date_pidt, $org_time_pidt
    ) {

        $res = mysql_query("UPDATE pigment_issues_details_tbl SET
                id='" . $id . "',
                barcode_ref_no_pidt='" . $barcode_ref_no_pidt . "',
                standard_color_no_pidt='" . $standard_color_no_pidt . "',
                weight_pidt='" . $weight_pidt . "',
                design_number_pidt='" . $design_number_pidt . "',
                color_number_pidt='" . $color_number_pidt . "',
                color_name_pidt='" . $color_name_pidt . "',
                pigment_pidt='" . $pigment_pidt . "',
                content_pidt='" . $content_pidt . "',
                oil_pidt='" . $oil_pidt . "',
                re_mixing_date_pidt='" . $re_mixing_date_pidt . "',
                is_edit_pidt='" . $is_edit_pidt . "',
                remarks_pidt='" . $remarks_pidt . "',
                item01_pidt='" . $item01_pidt . "',
                item02_pidt='" . $item02_pidt . "',
                item03_pidt='" . $item03_pidt . "',
                item04_pidt='" . $item04_pidt . "',
                item05_pidt='" . $item05_pidt . "',
                item06_pidt='" . $item06_pidt . "',
                item07_pidt='" . $item07_pidt . "',
                item08_pidt='" . $item08_pidt . "',
                item09_pidt='" . $item09_pidt . "',
                item10_pidt='" . $item10_pidt . "',
                org_name_pidt='" . $org_name_pidt . "',
                org_date_pidt='" . $org_date_pidt . "',
                org_time_pidt='" . $org_time_pidt . "'


	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentIssuesDetails($id) {
        $query = "DELETE FROM pigment_issues_details_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:pigment_issues_details_data.php');
        }
    }

    public function getNextPigmentIssuesDetailsRefNo($table, $suffix) {
        $sql = "SELECT id FROM " . $table . " ORDER BY id DESC";
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $previous = $row['id'];

            //$previous = substr($previous, 5, strlen($previous));

            if (strlen("" . $previous + 1) == 1) {
                $previous = "000" . ($previous + 1);
            } else if (strlen("" . $previous + 1) == 2) {
                $previous = "0" . ($previous + 1);
            }
        } else {
            $previous = "0001";
        }
        return $suffix . $previous;
    }

}

<?php

class OilIssuesDetails {
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

    public function getAllOilIssuesDetails() {
        $query = "SELECT * FROM oil_issues_details_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getOilIssuesDetailsByNo($ref_no_plt) {
        $query = "SELECT * FROM oil_issues_details_tbl WHERE ref_no_plt='" . $ref_no_plt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmOilIssuesDetailsEntity($ref_no_plt) {
        $res = "SELECT*FROM oil_issues_details_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

        public function createNewOilIssuesDetails(
        $id,	
        $barcode_ref_no_oidt,	
        $standard_color_no_oidt,	
        $weight_oidt,	
        $re_mixing_date_oidt,	
        $pigment_oidt,	
        $content_oidt,	
        $oil_oidt,	
        $is_edit_oidt,	
        $item01_oidt,	
        $item02_oidt,	
        $item03_oidt,	
        $item04_oidt,	
        $item05_oidt,	
        $org_name_oidt,	
        $org_date_oidt,	
        $org_time_oidt

        ) {

          $res = "INSERT INTO oil_issues_details_tbl SET
                id='".$id."',
             
                 barcode_ref_no_oidt='".$barcode_ref_no_oidt."',
                standard_color_no_oidt='".$standard_color_no_oidt."',
                weight_oidt='".$weight_oidt."',
                re_mixing_date_oidt='".$re_mixing_date_oidt."',
                pigment_oidt='".$pigment_oidt."',
                content_oidt='".$content_oidt."',
                oil_oidt='".$oil_oidt."',
                is_edit_oidt='".$is_edit_oidt."',
                item01_oidt='".$item01_oidt."',
                item02_oidt='".$item02_oidt."',
                item03_oidt='".$item03_oidt."',
                item04_oidt='".$item04_oidt."',
                item05_oidt='".$item05_oidt."',
                org_name_oidt='".$org_name_oidt."',
                org_date_oidt='".$org_date_oidt."',
                org_time_oidt='".$org_time_oidt."'
	
          ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateOilIssuesDetails(
     $id,	
    $barcode_ref_no_oidt,	
    $standard_color_no_oidt,	
    $weight_oidt,	
    $re_mixing_date_oidt,	
    $pigment_oidt,	
    $content_oidt,	
    $oil_oidt,	
    $is_edit_oidt,	
    $item01_oidt,	
    $item02_oidt,	
    $item03_oidt,	
    $item04_oidt,	
    $item05_oidt,	
    $org_name_oidt,	
    $org_date_oidt,	
    $org_time_oidt
	

    ) {

        $res = mysql_query("UPDATE oil_issues_details_tbl SET
              
                 barcode_ref_no_oidt='".$barcode_ref_no_oidt."',
                standard_color_no_oidt='".$standard_color_no_oidt."',
                weight_oidt='".$weight_oidt."',
                re_mixing_date_oidt='".$re_mixing_date_oidt."',
                pigment_oidt='".$pigment_oidt."',
                content_oidt='".$content_oidt."',
                oil_oidt='".$oil_oidt."',
                is_edit_oidt='".$is_edit_oidt."',
                item01_oidt='".$item01_oidt."',
                item02_oidt='".$item02_oidt."',
                item03_oidt='".$item03_oidt."',
                item04_oidt='".$item04_oidt."',
                item05_oidt='".$item05_oidt."',
                org_name_oidt='".$org_name_oidt."',
                org_date_oidt='".$org_date_oidt."',
                org_time_oidt='".$org_time_oidt."'



	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteOilIssuesDetails($id) {
        $query = "DELETE FROM oil_issues_details_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }
    
    

    

    public function getNextOilIssuesDetailsRefNo($table, $suffix) {
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

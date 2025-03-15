<?php

class PigmentModel {

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

    public function getAllPigmentModel() {

        $query = "SELECT * FROM pigment_model_tbl";

        $result = $this->mysqli->query($query);

        $num_result = $result->num_rows;


        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }

            return $this->data;
        }
    }

    public function getPigmentModelByNo($pattern_no_pmt) {
        $la = array();
        $query = "SELECT * FROM pigment_model_tbl WHERE pattern_no_pmt='" . $pattern_no_pmt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pmt'], $rows['pattern_no_pmt'], $rows['paper_size_pmt'], $rows['stproof_paper_pmt'], $rows['printing_way_pmt'], $rows['body_pmt'], $rows['decoration_pmt'], $rows['market_pmt'], $rows['layout_pmt'], $rows['is_edit_pmt'], $rows['item01_pmt'], $rows['item02_pmt'], $rows['item03_pmt'], $rows['item04_pmt'], $rows['item05_pmt'], $rows['org_name_pmt'], $rows['org_date_pmt'], $rows['org_time_pmt']
                );


              
            }
            return $la;
        }
    }
    
    
     public function getPigmentModelById($id) {
        $la = array();
        $query = "SELECT * FROM pigment_model_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_pmt'], $rows['pattern_no_pmt'], $rows['paper_size_pmt'], $rows['stproof_paper_pmt'], $rows['printing_way_pmt'], $rows['body_pmt'], $rows['decoration_pmt'], $rows['market_pmt'], $rows['layout_pmt'], $rows['is_edit_pmt'], $rows['item01_pmt'], $rows['item02_pmt'], $rows['item03_pmt'], $rows['item04_pmt'], $rows['item05_pmt'], $rows['org_name_pmt'], $rows['org_date_pmt'], $rows['org_time_pmt']
                );


              
            }
            return $la;
        }
    }

    public function confirmPigmentModelEntity($pattern_no_pmt) {
        $res = "SELECT*FROM pigment_model_tbl WHERE pattern_no_pmt = '" . $pattern_no_pmt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentModel(
    $id, $ref_no_pmt, $pattern_no_pmt, $paper_size_pmt, $stproof_paper_pmt, $printing_way_pmt, $body_pmt, $decoration_pmt, $market_pmt, $layout_pmt, $is_edit_pmt, $item01_pmt, $item02_pmt, $item03_pmt, $item04_pmt, $item05_pmt, $org_name_pmt, $org_date_pmt, $org_time_pmt
    ) {



        $res = "INSERT INTO pigment_model_tbl  SET
		        ref_no_pmt='" . $ref_no_pmt . "',
                        pattern_no_pmt='" . $pattern_no_pmt . "',
                        paper_size_pmt='" . $paper_size_pmt . "',
                        stproof_paper_pmt='" . $stproof_paper_pmt . "',
                        printing_way_pmt='" . $printing_way_pmt . "',
                        body_pmt='" . $body_pmt . "',
                        decoration_pmt='" . $decoration_pmt . "',
                        market_pmt='" . $market_pmt . "',
                        layout_pmt='" . $layout_pmt . "',
                        is_edit_pmt='" . $is_edit_pmt . "',
                        item01_pmt='" . $item01_pmt . "',
                        item02_pmt='" . $item02_pmt . "',
                        item03_pmt='" . $item03_pmt . "',
                        item04_pmt='" . $item04_pmt . "',
                        item05_pmt='" . $item05_pmt . "',
                        org_name_pmt='" . $org_name_pmt . "',
                        org_date_pmt='" . $org_date_pmt . "',
                        org_time_pmt='" . $org_time_pmt . "'



		       ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentModel(
    $id, $ref_no_pmt, $pattern_no_pmt, $paper_size_pmt, $stproof_paper_pmt, $printing_way_pmt, $body_pmt, $decoration_pmt, $market_pmt, $layout_pmt, $is_edit_pmt, $item01_pmt, $item02_pmt, $item03_pmt, $item04_pmt, $item05_pmt, $org_name_pmt, $org_date_pmt, $org_time_pmt
    ) {

        $res = "UPDATE pigment_model_tbl SET
		        ref_no_pmt='" . $ref_no_pmt . "',
                        pattern_no_pmt='" . $pattern_no_pmt . "',
                        paper_size_pmt='" . $paper_size_pmt . "',
                        stproof_paper_pmt='" . $stproof_paper_pmt . "',
                        printing_way_pmt='" . $printing_way_pmt . "',
                        body_pmt='" . $body_pmt . "',
                        decoration_pmt='" . $decoration_pmt . "',
                        market_pmt='" . $market_pmt . "',
                        layout_pmt='" . $layout_pmt . "',
                        is_edit_pmt='" . $is_edit_pmt . "',                 
                        item02_pmt='" . $item02_pmt . "',
                        item03_pmt='" . $item03_pmt . "',
                        item04_pmt='" . $item04_pmt . "',
                        item05_pmt='" . $item05_pmt . "',
                        org_name_pmt='" . $org_name_pmt . "',
                        org_date_pmt='" . $org_date_pmt . "',
                        org_time_pmt='" . $org_time_pmt . "'



		        WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentModel($id) {
        $query = "DELETE FROM pigment_model_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getNextPigmentModelRefNo($table, $suffix) {
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

    public function getPigmentModelName() {
        $query = "SELECT pattern_no_pmt FROM pigment_model_tbl ORDER BY pattern_no_pmt DESC ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pattern_no_pmt'] . "' >" . $rows['pattern_no_pmt'] . "</option>");
            }
        }
    }

}

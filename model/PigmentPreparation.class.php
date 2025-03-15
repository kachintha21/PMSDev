<?php

class PigmentPreparation {

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

    public function getAllPigmentPreparation() {
        $query = "SELECT * FROM pigment_preparation_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPigmentPreparationByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM pigment_preparation_tbl WHERE pro_no_pp='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pro_no_pp'], $rows['lot_no_pp'], $rows['pattern_no_pp'], $rows['printing_qty_pp'], $rows['colour_index_pp'], $rows['color_name_pp'], $rows['pigment_contents_pp'], $rows['is_edit_pp'], $rows['item01_pp'], $rows['item02_pp'], $rows['item03_pp'], $rows['item04_pp'], $rows['item05_pp'], $rows['org_name_pp'], $rows['org_date_pp'], $rows['org_time_pp']
                );
            }
            return $la;
        }
    }

    public function getWipPigmentPreparation() {
        $query = "SELECT pro01_pst FROM printing_status_tbl WHERE pro01_pst='1'   GROUP BY  ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyPigmentPreparation($date) {
        $query = "SELECT lot_no_pp FROM pigment_preparation_tbl WHERE org_date_pp='" . $date . "'  GROUP BY  lot_no_pp   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getPigmentPreparationGroupByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM pigment_preparation_tbl WHERE pro_no_pp='" . $id . "' GROUP BY  pro_no_pp ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pro_no_pp'], $rows['lot_no_pp'], $rows['pattern_no_pp'], $rows['printing_qty_pp'], $rows['colour_index_pp'], $rows['color_name_pp'], $rows['pigment_contents_pp'], $rows['is_edit_pp'], $rows['item01_pp'], $rows['item02_pp'], $rows['item03_pp'], $rows['item04_pp'], $rows['item05_pp'], $rows['org_name_pp'], $rows['org_date_pp'], $rows['org_time_pp']
                );
            }
            return $la;
        }
    }

    public function getPigmentPreparationById($id) {
        $la = array();
        $query = "SELECT * FROM pigment_preparation_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pro_no_pp'], $rows['lot_no_pp'], $rows['pattern_no_pp'], $rows['printing_qty_pp'], $rows['colour_index_pp'], $rows['color_name_pp'], $rows['pigment_contents_pp'], $rows['is_edit_pp'], $rows['item01_pp'], $rows['item02_pp'], $rows['item03_pp'], $rows['item04_pp'], $rows['item05_pp'], $rows['org_name_pp'], $rows['org_date_pp'], $rows['org_time_pp']
                );
            }
            return $la;
        }
    }

    public function getPigmentPreparationByNo($pro_no_pp) {
        $query = "SELECT * FROM pigment_preparation_tbl WHERE pro_no_pp='" . $pro_no_pp . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPigmentPreparationEntity($pro_no_pp) {
        $res = "SELECT*FROM pigment_preparation_tbl WHERE pro_no_pp = '" . $pro_no_pp . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentPreparation(
    $id, $pro_no_pp, $lot_no_pp, $pattern_no_pp, $printing_qty_pp, $colour_index_pp, $color_name_pp, $pigment_contents_pp, $is_edit_pp, $item01_pp, $item02_pp, $item03_pp, $item04_pp, $item05_pp, $org_name_pp, $org_date_pp, $org_time_pp
    ) {



        $res = "INSERT INTO pigment_preparation_tbl  SET
	     pro_no_pp='" . $pro_no_pp . "',
        lot_no_pp='" . $lot_no_pp . "',
        pattern_no_pp='" . $pattern_no_pp . "',
        printing_qty_pp='" . $printing_qty_pp . "',
        colour_index_pp='" . $colour_index_pp . "',
        color_name_pp='" . $color_name_pp . "',
        pigment_contents_pp='" . $pigment_contents_pp . "',
        is_edit_pp='" . $is_edit_pp . "',
        item01_pp='" . $item01_pp . "',
        item02_pp='" . $item02_pp . "',
        item03_pp='" . $item03_pp . "',
        item04_pp='" . $item04_pp . "',
        item05_pp='" . $item05_pp . "',
        org_name_pp='" . $org_name_pp . "',
        org_date_pp='" . $org_date_pp . "',
        org_time_pp='" . $org_time_pp . "'     
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentPreparation(
    $id, $pro_no_pp, $lot_no_pp, $pattern_no_pp, $printing_qty_pp, $colour_index_pp, $color_name_pp, $pigment_contents_pp, $is_edit_pp, $item01_pp, $item02_pp, $item03_pp, $item04_pp, $item05_pp, $org_name_pp, $org_date_pp, $org_time_pp
    ) {



        $res = "UPDATE pigment_preparation_tbl SET
	               pro_no_pp='" . $pro_no_pp . "',
        lot_no_pp='" . $lot_no_pp . "',
        pattern_no_pp='" . $pattern_no_pp . "',
        printing_qty_pp='" . $printing_qty_pp . "',
        colour_index_pp='" . $colour_index_pp . "',
        color_name_pp='" . $color_name_pp . "',
        pigment_contents_pp='" . $pigment_contents_pp . "',
        is_edit_pp='" . $is_edit_pp . "',
        item01_pp='" . $item01_pp . "',
        item02_pp='" . $item02_pp . "',
        item03_pp='" . $item03_pp . "',
        item04_pp='" . $item04_pp . "',
        item05_pp='" . $item05_pp . "',
        org_name_pp='" . $org_name_pp . "',
        org_date_pp='" . $org_date_pp . "',
        org_time_pp='" . $org_time_pp . "'  '   
		    WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentPreparation($id) {
        $query = "DELETE FROM pigment_preparation_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getPigmentPreparationByLotNumber() {
        $query = "SELECT DISTINCT pro_no_pp FROM pigment_preparation_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pro_no_pp'] . "' >" . $rows['pro_no_pp'] . "</option>");
            }
        }
    }

}

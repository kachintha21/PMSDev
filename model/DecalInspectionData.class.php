<?php

class DecalInspectionData {

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

    public function getAllDecalInspectionData() {
        $query = "SELECT * FROM decal_inspection_data_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getWipDecalInspectionData() {
        $query = "SELECT pro06_pst FROM printing_status_tbl WHERE pro07_pst='1'   GROUP BY   ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyOutPutQtyDecalInspectionData($date) {
        $query = "SELECT org_date_tcpt FROM decal_inspection_data_tbl WHERE org_date_tcpt='" . $date . "'  GROUP BY  lot_no_dt   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getPlanedQtyByNo($id) {
        $la = array();
        $query = "SELECT*FROM planed_qty_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_didt'], $rows['pro_no_didt'], $rows['lot_no_didt'], $rows['pa_no_didt'], $rows['curve_no_didt'], $rows['pc_sheet_didt'], $rows['planed_pcs_didt'], $rows['defective_pcs_didt'], $rows['passed_pcs_didt'], $rows['order_pcs_didt'], $rows['shortage_pcs_didt'], $rows['note_didt'], $rows['is_edit_didt'], $rows['item01_didt'], $rows['item02_didt'], $rows['item03_didt'], $rows['item04_didt'], $rows['item05_didt'], $rows['org_name_didt'], $rows['org_date_didt'], $rows['org_time_didt']
                );
            }
            return $la;
        }
    }

    public function confirmDecalInspectionDataEntity($curve_no_ymt) {
        $res = "SELECT*FROM decal_inspection_data_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewDecalInspectionData(
    $id, $pattern_no_didt, $pro_no_didt, $lot_no_didt, $pa_no_didt, $curve_no_didt, $pc_sheet_didt, $planed_pcs_didt, $defective_pcs_didt, $passed_pcs_didt, $order_pcs_didt, $shortage_pcs_didt, $note_didt, $is_edit_didt, $item01_didt, $item02_didt, $item03_didt, $item04_didt, $item05_didt, $org_name_didt, $org_date_didt, $org_time_didt
    ) {



        $res = "INSERT INTO decal_inspection_data_tbl  SET
                pattern_no_didt='" . $pattern_no_didt . "',
                pro_no_didt='" . $pro_no_didt . "',
                lot_no_didt='" . $lot_no_didt . "',
                pa_no_didt='" . $pa_no_didt . "',
                curve_no_didt='" . $curve_no_didt . "',
                pc_sheet_didt='" . $pc_sheet_didt . "',
                planed_pcs_didt='" . $planed_pcs_didt . "',
                defective_pcs_didt='" . $defective_pcs_didt . "',
                passed_pcs_didt='" . $passed_pcs_didt . "',
                order_pcs_didt='" . $order_pcs_didt . "',
                shortage_pcs_didt='" . $shortage_pcs_didt . "',
                note_didt='" . $note_didt . "',
                is_edit_didt='" . $is_edit_didt . "',
                item01_didt='" . $item01_didt . "',
                item02_didt='" . $item02_didt . "',
                item03_didt='" . $item03_didt . "',
                item04_didt='" . $item04_didt . "',
                item05_didt='" . $item05_didt . "',
                org_name_didt='" . $org_name_didt . "',
                org_date_didt='" . $org_date_didt . "',
                org_time_didt='" . $org_time_didt . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDecalInspectionData(
    $id, $pattern_no_didt, $pro_no_didt, $lot_no_didt, $pa_no_didt, $curve_no_didt, $pc_sheet_didt, $planed_pcs_didt, $defective_pcs_didt, $passed_pcs_didt, $order_pcs_didt, $shortage_pcs_didt, $note_didt, $is_edit_didt, $item01_didt, $item02_didt, $item03_didt, $item04_didt, $item05_didt, $org_name_didt, $org_date_didt, $org_time_didt
    ) {

        $res = mysql_query("UPDATE decal_inspection_data_tbl SET
        	id='" . $id . "',
                pattern_no_didt='" . $pattern_no_didt . "',
                pro_no_didt='" . $pro_no_didt . "',
                lot_no_didt='" . $lot_no_didt . "',
                pa_no_didt='" . $pa_no_didt . "',
                curve_no_didt='" . $curve_no_didt . "',
                pc_sheet_didt='" . $pc_sheet_didt . "',
                planed_pcs_didt='" . $planed_pcs_didt . "',
                defective_pcs_didt='" . $defective_pcs_didt . "',
                passed_pcs_didt='" . $passed_pcs_didt . "',
                order_pcs_didt='" . $order_pcs_didt . "',
                shortage_pcs_didt='" . $shortage_pcs_didt . "',
                note_didt='" . $note_didt . "',
                is_edit_didt='" . $is_edit_didt . "',
                item01_didt='" . $item01_didt . "',
                item02_didt='" . $item02_didt . "',
                item03_didt='" . $item03_didt . "',
                item04_didt='" . $item04_didt . "',
                item05_didt='" . $item05_didt . "',
                org_name_didt='" . $org_name_didt . "',
                org_date_didt='" . $org_date_didt . "',
                org_time_didt='" . $org_time_didt . "'
		WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteDecalInspectionData($id) {
        $query = "DELETE FROM decal_inspection_data_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getDecalInspectionDataAeraById($id) {
        $query = "SELECT silver_area_dt FROM decal_inspection_data_tbl WHERE curve_no_ymt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextDecalInspectionDataRefNo($table, $suffix) {
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

<?php

class SimulationResult {

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

    public function getAllSimulationResult() {
        $query = "SELECT * FROM simulation_result_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getSimulationResultByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM simulation_result_tbl WHERE ref_no_st='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_st'], $rows['curve_no_st'], $rows['desing_no_st'], $rows['qty_st'], $rows['aera_st'], $rows['sheet_per_curve_st'], $rows['number_of_sheet_st'], $rows['waste_per_sheet_st'], $rows['total_waste_st'], $rows['item01_st'], $rows['item02_st'], $rows['item03_st'], $rows['item04_st'], $rows['item05_st'], $rows['org_name_st'], $rows['org_date_st'], $rows['org_time_st']
                );
            }
            return $la;
        }
    }

    public function getSimulationResultByNo($ref_no_st) {
        $query = "SELECT * FROM simulation_result_tbl WHERE ref_no_st='" . $ref_no_st . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmSimulationResultEntity($ref_no_st) {
        $res = "SELECT*FROM simulation_result_tbl WHERE ref_no_st = '" . $ref_no_st . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewSimulationResult(
    $id, $ref_no_st, $curve_no_st, $desing_no_st, $qty_st, $aera_st, $sheet_per_curve_st, $number_of_sheet_st, $waste_per_sheet_st, $total_waste_st, $item01_st, $item02_st, $item03_st, $item04_st, $item05_st, $org_name_st, $org_date_st, $org_time_st
    ) {



        $res = "INSERT INTO simulation_result_tbl  SET
		     ref_no_st ='" . $ref_no_st . "',
                    curve_no_st ='" . $curve_no_st . "',
                    desing_no_st ='" . $desing_no_st . "',
                    qty_st ='" . $qty_st . "',
                    aera_st ='" . $aera_st . "',
                    sheet_per_curve_st ='" . $sheet_per_curve_st . "',
                    number_of_sheet_st ='" . $number_of_sheet_st . "',
                    waste_per_sheet_st ='" . $waste_per_sheet_st . "',
                    total_waste_st ='" . $total_waste_st . "',
                    item01_st ='" . $item01_st . "',
                    item02_st ='" . $item02_st . "',
                    item03_st ='" . $item03_st . "',
                    item04_st ='" . $item04_st . "',
                    item05_st ='" . $item05_st . "',
                    org_name_st ='" . $org_name_st . "',
                    org_date_st ='" . $org_date_st . "',
                    org_time_st='" . $org_time_st . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateSimulationResult(
    $id, $ref_no_st, $curve_no_st, $desing_no_st, $qty_st, $aera_st, $sheet_per_curve_st, $number_of_sheet_st, $waste_per_sheet_st, $total_waste_st, $item01_st, $item02_st, $item03_st, $item04_st, $item05_st, $org_name_st, $org_date_st, $org_time_st
    ) {

        $res = mysql_query("UPDATE simulation_result_tbl SET
	             ref_no_st ='" . $ref_no_st . "',
                    curve_no_st ='" . $curve_no_st . "',
                    desing_no_st ='" . $desing_no_st . "',
                    qty_st ='" . $qty_st . "',
                    aera_st ='" . $aera_st . "',
                    sheet_per_curve_st ='" . $sheet_per_curve_st . "',
                    number_of_sheet_st ='" . $number_of_sheet_st . "',
                    waste_per_sheet_st ='" . $waste_per_sheet_st . "',
                    total_waste_st ='" . $total_waste_st . "',
                    item01_st ='" . $item01_st . "',
                    item02_st ='" . $item02_st . "',
                    item03_st ='" . $item03_st . "',
                    item04_st ='" . $item04_st . "',
                    item05_st ='" . $item05_st . "',
                    org_name_st ='" . $org_name_st . "',
                    org_date_st ='" . $org_date_st . "',
                    org_time_st='" . $org_time_st . "'
		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteSimulationResult($id) {
        $query = "DELETE FROM simulation_result_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getSimulationResultByLotNumber() {
        $query = "SELECT ref_no_st FROM simulation_result_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['ref_no_st'] . "' >" . $rows['ref_no_st'] . "</option>");
            }
        }
    }

    public function getAera($id) {
        $query = "SELECT FROM data_tbl WHERE curve_no_dt='" . $id . "'";
        $result = $this->mysqli->query($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row = $result->fetch_assoc();
                return $row["silver_area_dt"];
            }
        } else {
            return 1;
        }
    }

    public function getNextSimulationResultRefNo($table, $suffix) {
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

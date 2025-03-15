<?php

class PlanningDate {

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

    public function getAllPlanningDate() {
        $query = "SELECT * FROM planning_date_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPlanningDateByNo($decol_pattern_pdt) {
        $query = "SELECT * FROM planning_date_tbl WHERE decol_pattern_pdt='" . $decol_pattern_pdt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPlanningDateEntity($decol_pattern_pdt) {
        $res = "SELECT*FROM planning_date_tbl WHERE decol_pattern_pdt = '" . $decol_pattern_pdt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPlanningDate(
    $id, $ref_no_pdt, $lot_no_pdt, $pattern_no_pdt, $color_index_pdt, $plan_date_pdt, $is_edit_pdt, $item01_pdt, $item02_pdt, $item03_pdt, $item04_pdt, $item05_pdt, $org_name_pdt, $org_date_pdt, $org_time_pdt
    ) {



        $res = "INSERT INTO planning_date_tbl  SET
		        ref_no_pdt ='" . $ref_no_pdt . "',
                lot_no_pdt ='" . $lot_no_pdt . "',
                pattern_no_pdt ='" . $pattern_no_pdt . "',
                color_index_pdt ='" . $color_index_pdt . "',
                plan_date_pdt ='" . $plan_date_pdt . "',
                is_edit_pdt ='" . $is_edit_pdt . "',
                item01_pdt ='" . $item01_pdt . "',
                item02_pdt ='" . $item02_pdt . "',
                item03_pdt ='" . $item03_pdt . "',
                item04_pdt ='" . $item04_pdt . "',
                item05_pdt ='" . $item05_pdt . "',
                org_name_pdt ='" . $org_name_pdt . "',
                org_date_pdt ='" . $org_date_pdt . "',
                org_time_pdt ='" . $org_time_pdt . "'
		       ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePlanningDate(
    $id, $ref_no_pdt, $lot_no_pdt, $pattern_no_pdt, $color_index_pdt, $plan_date_pdt, $is_edit_pdt, $item01_pdt, $item02_pdt, $item03_pdt, $item04_pdt, $item05_pdt, $org_name_pdt, $org_date_pdt, $org_time_pdt
    ) {

        $res = mysql_query("UPDATE planning_date_tbl SET
			    ref_no_pdt ='" . $ref_no_pdt . "',
                lot_no_pdt ='" . $lot_no_pdt . "',
                pattern_no_pdt ='" . $pattern_no_pdt . "',
                color_index_pdt ='" . $color_index_pdt . "',
                plan_date_pdt ='" . $plan_date_pdt . "',
                is_edit_pdt ='" . $is_edit_pdt . "',
                item01_pdt ='" . $item01_pdt . "',
                item02_pdt ='" . $item02_pdt . "',
                item03_pdt ='" . $item03_pdt . "',
                item04_pdt ='" . $item04_pdt . "',
                item05_pdt ='" . $item05_pdt . "',
                org_name_pdt ='" . $org_name_pdt . "',
                org_date_pdt ='" . $org_date_pdt . "',
                org_time_pdt ='" . $org_time_pdt . "'
                 WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePlanningDate($id) {
        $query = "DELETE FROM planning_date_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getNextPlanningDateRefNo($table, $suffix) {
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

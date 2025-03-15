<?php

class PrintingSchedule {

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

    public function getAllPrintingSchedule() {
        $query = "SELECT * FROM printing_schedule_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPrintingScheduleByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM printing_schedule_tbl WHERE pattern_no_pst='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pst'], $rows['pattern_no_pst'], $rows['pro_no_pst'], $rows['lot_no_pst'], $rows['color_pst'], $rows['plan_date_pst'], $rows['actual_date_pst'], $rows['is_edit_pst'], $rows['item01_pst'], $rows['item02_pst'], $rows['item03_pst'], $rows['item04_pst'], $rows['item05_pst'], $rows['org_name_pst'], $rows['org_date_pst'], $rows['org_time_pst']
                );
            }
            return $la;
        }
    }

    public function getPrintingScheduleGroupByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM printing_schedule_tbl WHERE pattern_no_pst='" . $id . "' GROUP BY  pattern_no_pst ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pst'], $rows['pattern_no_pst'], $rows['pro_no_pst'], $rows['lot_no_pst'], $rows['color_pst'], $rows['plan_date_pst'], $rows['actual_date_pst'], $rows['is_edit_pst'], $rows['item01_pst'], $rows['item02_pst'], $rows['item03_pst'], $rows['item04_pst'], $rows['item05_pst'], $rows['org_name_pst'], $rows['org_date_pst'], $rows['org_time_pst']
                );
            }
            return $la;
        }
    }

    public function getPrintingScheduleById($id) {
        $la = array();
        $query = "SELECT * FROM printing_schedule_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pst'], $rows['pattern_no_pst'], $rows['pro_no_pst'], $rows['lot_no_pst'], $rows['color_pst'], $rows['plan_date_pst'], $rows['actual_date_pst'], $rows['is_edit_pst'], $rows['item01_pst'], $rows['item02_pst'], $rows['item03_pst'], $rows['item04_pst'], $rows['item05_pst'], $rows['org_name_pst'], $rows['org_date_pst'], $rows['org_time_pst']
                );
            }
            return $la;
        }
    }

    public function getPrintingScheduleByNo($pattern_no_pst) {
        $query = "SELECT * FROM printing_schedule_tbl WHERE pattern_no_pst='" . $pattern_no_pst . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPrintingScheduleEntity($pattern_no_pst) {
        $res = "SELECT*FROM printing_schedule_tbl WHERE pattern_no_pst = '" . $pattern_no_pst . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPrintingSchedule(
    $id, $ref_no_pst, $pattern_no_pst, $pro_no_pst, $lot_no_pst, $color_pst, $plan_date_pst, $actual_date_pst, $is_edit_pst, $item01_pst, $item02_pst, $item03_pst, $item04_pst, $item05_pst, $org_name_pst, $org_date_pst, $org_time_pst
    ) {



        $res = "INSERT INTO printing_schedule_tbl  SET	 
            ref_no_pst='" . $ref_no_pst . "',
            pattern_no_pst='" . $pattern_no_pst . "',
            pro_no_pst='" . $pro_no_pst . "',
            lot_no_pst='" . $lot_no_pst . "',
            color_pst='" . $color_pst . "',
            plan_date_pst='" . $plan_date_pst . "',
            actual_date_pst='" . $actual_date_pst . "',
            is_edit_pst='" . $is_edit_pst . "',
            item01_pst='" . $item01_pst . "',
            item02_pst='" . $item02_pst . "',
            item03_pst='" . $item03_pst . "',
            item04_pst='" . $item04_pst . "',
            item05_pst='" . $item05_pst . "',
            org_name_pst='" . $org_name_pst . "',
            org_date_pst='" . $org_date_pst . "',
            org_time_pst='".$org_time_pst. "'    
		       ";
        
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrintingSchedule(
    $id, $ref_no_pst, $pattern_no_pst, $pro_no_pst, $lot_no_pst, $color_pst, $plan_date_pst, $actual_date_pst, $is_edit_pst, $item01_pst, $item02_pst, $item03_pst, $item04_pst, $item05_pst, $org_name_pst, $org_date_pst, $org_time_pst
    ) {


        $res = "UPDATE printing_schedule_tbl SET
	  id='" . $id . "',
            ref_no_pst='" . $ref_no_pst . "',
            pattern_no_pst='" . $pattern_no_pst . "',
            pro_no_pst='" . $pro_no_pst . "',
            lot_no_pst='" . $lot_no_pst . "',
            color_pst='" . $color_pst . "',
            plan_date_pst='" . $plan_date_pst . "',
            actual_date_pst='" . $actual_date_pst . "',
            is_edit_pst='" . $is_edit_pst . "',
            item01_pst='" . $item01_pst . "',
            item02_pst='" . $item02_pst . "',
            item03_pst='" . $item03_pst . "',
            item04_pst='" . $item04_pst . "',
            item05_pst='" . $item05_pst . "',
            org_name_pst='" . $org_name_pst . "',
            org_date_pst='" . $org_date_pst . "',
            org_time_pst='" . $org_time_pst . "'

		    WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePrintingSchedule($id) {
        $query = "DELETE FROM printing_schedule_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }
    
        public function deletePrintingScheduleByProNo($id) {
        $query = "DELETE FROM printing_schedule_tbl WHERE pro_no_pst='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }
    

    public function getPrintingScheduleByLotNumber() {
        $query = "SELECT DISTINCT pattern_no_pst FROM printing_schedule_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pattern_no_pst'] . "' >" . $rows['pattern_no_pst'] . "</option>");
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

    public function getNextPrintingScheduleRefNo($table, $suffix) {
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

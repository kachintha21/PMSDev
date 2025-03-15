<?php

class PrintingMachineMaster {

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
    
    
        public function getPrintingMachineMasterById($id) {
        $la = array();
        $query = "SELECT*FROM printing_machine_master_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_pmmt'], $rows['machine_no_pmmt'], $rows['priority_pmmt'], $rows['is_edit_pmmt'], $rows['item01_pmmt'], $rows['item02_pmmt'], $rows['item03_pmmt'], $rows['item04_pmmt'], $rows['item05_pmmt'], $rows['org_name_pmmt'], $rows['org_date_pmmt'], $rows['org_time_pmmt']
                );
            }
            return $la;
        }
    }

    public function getPrintingMachineMasterByNo($id) {
        $la = array();
        $query = "SELECT*FROM printing_machine_master_tbl WHERE pattern_no_pmmt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_pmmt'], $rows['machine_no_pmmt'], $rows['priority_pmmt'], $rows['is_edit_pmmt'], $rows['item01_pmmt'], $rows['item02_pmmt'], $rows['item03_pmmt'], $rows['item04_pmmt'], $rows['item05_pmmt'], $rows['org_name_pmmt'], $rows['org_date_pmmt'], $rows['org_time_pmmt']
                );
            }
            return $la;
        }
    }


    public function getWipPrintingMachineMaster($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function getDailyOutPutQtyPrintingMachineMaster($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM printing_machine_master_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function createNewPrintingMachineMaster(
    $id, $pattern_no_pmmt, $machine_no_pmmt, $priority_pmmt, $is_edit_pmmt, $item01_pmmt, $item02_pmmt, $item03_pmmt, $item04_pmmt, $item05_pmmt, $org_name_pmmt, $org_date_pmmt, $org_time_pmmt
    ) {



        $res = "INSERT INTO printing_machine_master_tbl  SET
        id='" . $id . "',
        pattern_no_pmmt='" . $pattern_no_pmmt . "',
        machine_no_pmmt='" . $machine_no_pmmt . "',
        priority_pmmt='" . $priority_pmmt . "',
        is_edit_pmmt='" . $is_edit_pmmt . "',
        item01_pmmt='" . $item01_pmmt . "',
        item02_pmmt='" . $item02_pmmt . "',
        item03_pmmt='" . $item03_pmmt . "',
        item04_pmmt='" . $item04_pmmt . "',
        item05_pmmt='" . $item05_pmmt . "',
        org_name_pmmt='" . $org_name_pmmt . "',
        org_date_pmmt='" . $org_date_pmmt . "',
        org_time_pmmt='" . $org_time_pmmt . "'

            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrintingMachineMaster(
    $id, $pattern_no_pmmt, $machine_no_pmmt, $priority_pmmt, $is_edit_pmmt, $item01_pmmt, $item02_pmmt, $item03_pmmt, $item04_pmmt, $item05_pmmt, $org_name_pmmt, $org_date_pmmt, $org_time_pmmt
    ) {

        $res = "UPDATE printing_machine_master_tbl SET   	    
         id='" . $id . "',
        pattern_no_pmmt='" . $pattern_no_pmmt . "',
        machine_no_pmmt='" . $machine_no_pmmt . "',
        priority_pmmt='" . $priority_pmmt . "',
        is_edit_pmmt='" . $is_edit_pmmt . "',
        item01_pmmt='" . $item01_pmmt . "',
        item02_pmmt='" . $item02_pmmt . "',
        item03_pmmt='" . $item03_pmmt . "',
        item04_pmmt='" . $item04_pmmt . "',
        item05_pmmt='" . $item05_pmmt . "',
        org_name_pmmt='" . $org_name_pmmt . "',
        org_date_pmmt='" . $org_date_pmmt . "',
        org_time_pmmt='" . $org_time_pmmt . "'
	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePrintingMachineMaster($id) {
        $query = "DELETE FROM printing_machine_master_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:printing_machine_master_view.php');
        }
    }

}

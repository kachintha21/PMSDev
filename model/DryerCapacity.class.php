<?php

class DryerCapacity {

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

    public function getDryerCapacityById($id) {
        $la = array();
        $query = "SELECT*FROM dryer_capacity_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'],
                $rows['machine_no_dct'],
                $rows['capacity_dct'],
                $rows['is_edit_dct'],
                $rows['org_name_dct'],
                $rows['org_date_dct'],
                $rows['org_time_dct']
                );
            }
            return $la;
        }
    }
    public function getDryerCapacityByNo($id) {
        $la = array();
        $query = "SELECT*FROM dryer_capacity_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'],
                $rows['machine_no_dct'],
                $rows['capacity_dct'],
                $rows['is_edit_dct'],
                $rows['org_name_dct'],
                $rows['org_date_dct'],
                $rows['org_time_dct']
                );
            }
            return $la;
        }
    }

    public function getWipDryerCapacity($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function getDailyOutPutQtyDryerCapacity($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM dryer_capacity_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function createNewDryerCapacity(
    $id, $machine_no_dct, $capacity_dct, $is_edit_dct, $org_name_dct, $org_date_dct, $org_time_dct
    ) {



        $res = "INSERT INTO dryer_capacity_tbl  SET
                 id='" . $id . "',
                machine_no_dct='" . $machine_no_dct . "',
                capacity_dct='" . $capacity_dct . "',
                is_edit_dct='" . $is_edit_dct . "',
                org_name_dct='" . $org_name_dct . "',
                org_date_dct='" . $org_date_dct . "',
                org_time_dct='" . $org_time_dct . "'


            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDryerCapacity(
    $id, $machine_no_dct, $capacity_dct, $is_edit_dct, $org_name_dct, $org_date_dct, $org_time_dct
    ) {

        $res = "UPDATE dryer_capacity_tbl SET   	    
            id='" . $id . "',
            machine_no_dct='" . $machine_no_dct . "',
            capacity_dct='" . $capacity_dct . "',
            is_edit_dct='" . $is_edit_dct . "',
            org_name_dct='" . $org_name_dct . "',
            org_date_dct='" . $org_date_dct . "',
            org_time_dct='" . $org_time_dct . "'

	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteDryerCapacity($id) {
        $query = "DELETE FROM dryer_capacity_tbl WHERE id='".$id."' ";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:dryer_capacity_view.php');
        }
    }

}

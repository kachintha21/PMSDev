<?php

class Process {

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

    public function getAllProcess() {
        $query = "SELECT * FROM process_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getProcessByNo($process_name_pt) {
        $query = "SELECT * FROM process_tbl WHERE colours_code_ct='" . $process_name_pt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getProcessById($id) {
        $la = array();
        $query = "SELECT*FROM process_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'],
                $rows['ref_no_pt'],
                $rows['process_name_pt'],
                $rows['is_edit_pt'],
                $rows['org_name_pt'],
                $rows['org_date_pt'],
                $rows['org_time_pt']
                
                );
            }
            return $la;
        }
    }

    public function confirmProcessEntity($process_name_pt) {
        $res = "SELECT*FROM process_tbl WHERE colours_code_ct = '" . $process_name_pt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewProcess(
    $id, $ref_no_pt, $process_name_pt, $is_edit_pt, $org_name_pt, $org_date_pt, $org_time_pt
    ) {


        $res = "INSERT INTO process_tbl  SET
             ref_no_pt='" . $ref_no_pt . "',
            process_name_pt='" . $process_name_pt . "',
            is_edit_pt='" . $is_edit_pt . "',
            org_name_pt='" . $org_name_pt . "',
            org_date_pt='" . $org_date_pt . "',
            org_time_pt='" . $org_time_pt . "'
		 ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateProcess(
    $id, $ref_no_pt, $process_name_pt, $is_edit_pt, $org_name_pt, $org_date_pt, $org_time_pt
    ) {

        $res = "UPDATE process_tbl SET
            ref_no_pt='" . $ref_no_pt . "',
            process_name_pt='" . $process_name_pt . "',
            is_edit_pt='" . $is_edit_pt . "',
            org_name_pt='" . $org_name_pt . "',
            org_date_pt='" . $org_date_pt . "',
            org_time_pt='" . $org_time_pt . "'
            WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteProcess($id) {
        $query = "DELETE FROM process_tbl WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:process_view.php');
        }
    }

    public function getNextProcessRefNo($table, $suffix) {
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

    public function getProcessByName() {
        $query = "SELECT process_name_pt FROM process_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['process_name_pt'] . "' >" . $rows['process_name_pt'] . "</option>");
            }
        }
    }

}

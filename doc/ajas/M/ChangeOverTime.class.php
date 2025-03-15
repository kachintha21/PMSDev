<?php

class ChangeOverTime {

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

    public function getAllChangeOverTime() {
        $query = "SELECT * FROM change_over_time_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getChangeOverTimeById($id) {
        $la = array();
        $query = "SELECT*FROM change_over_time_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['time_cott'], $rows['machine_no_cott'], $rows['is_edit_cott'], $rows['item01_cott'], $rows['item02_cott'], $rows['item03_cott'], $rows['item04_cott'], $rows['item05_cott'], $rows['org_name_cott'], $rows['org_date_cott'], $rows['org_time_cott']
                );
            }
            return $la;
        }
    }

    public function createNewChangeOverTime(
    $id, $time_cott, $machine_no_cott, $is_edit_cott, $item01_cott, $item02_cott, $item03_cott, $item04_cott, $item05_cott, $org_name_cott, $org_date_cott, $org_time_cott
    ) {


        $res = "INSERT INTO change_over_time_tbl  SET
                    id='" . $id . "',
time_cott='" . $time_cott . "',
machine_no_cott='" . $machine_no_cott . "',
is_edit_cott='" . $is_edit_cott . "',
item01_cott='" . $item01_cott . "',
item02_cott='" . $item02_cott . "',
item03_cott='" . $item03_cott . "',
item04_cott='" . $item04_cott . "',
item05_cott='" . $item05_cott . "',
org_name_cott='" . $org_name_cott . "',
org_date_cott='" . $org_date_cott . "',
org_time_cott='" . $org_time_cott . "'
		 ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateChangeOverTime(
    $id, $time_cott, $machine_no_cott, $is_edit_cott, $item01_cott, $item02_cott, $item03_cott, $item04_cott, $item05_cott, $org_name_cott, $org_date_cott, $org_time_cott
    ) {
        $res = "UPDATE change_over_time_tbl SET
            time_cott='" . $time_cott . "',
            machine_no_cott='" . $machine_no_cott . "',
            is_edit_cott='" . $is_edit_cott . "',
            item01_cott='" . $item01_cott . "',
            item02_cott='" . $item02_cott . "',
            item03_cott='" . $item03_cott . "',
            item04_cott='" . $item04_cott . "',
            item05_cott='" . $item05_cott . "',
            org_name_cott='" . $org_name_cott . "',
            org_date_cott='" . $org_date_cott . "',
            org_time_cott='" . $org_time_cott . "'
            WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteChangeOverTime($id) {
        $query = "DELETE FROM change_over_time_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:section_view.php');
        }
    }

    public function getNextChangeOverTimeRefNo($table, $suffix) {
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

    public function getChangeOverTimeByName() {
        $query = "SELECT section_name_st FROM change_over_time_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['section_name_st'] . "' >" . $rows['section_name_st'] . "</option>");
            }
        }
    }

}

<?php
class Status {
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

    public function getAllStatus() {
        $query = "SELECT * FROM status_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getStatusCounty() {
        $query = "SELECT * FROM status_tbl WHERE st01_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function getStatusTwo() {


        $query = "SELECT * FROM status_tbl WHERE st02_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }
    
    
    public function getStatusThree() {


        $query = "SELECT * FROM status_tbl WHERE st03_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function confirmStatusEntity($tickets_no_st) {
        $res = "SELECT*FROM status_tbl WHERE tickets_no_st = '" . $tickets_no_st . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewStatus(
    $id, $tickets_no_st, $st01_st, $st02_st, $st03_st, $st04_st, $st05_st, $st06_st, $st07_st, $st08_st, $st09_st, $st10_st, $org_name_st, $org_date_st, $org_time_st
    ) {

        $res = "INSERT INTO status_tbl  SET
                    tickets_no_st='" . $tickets_no_st . "',
                    st01_st='" . $st01_st . "',
                    st02_st='" . $st02_st . "',
                    st03_st='" . $st03_st . "',
                    st04_st='" . $st04_st . "',
                    st05_st='" . $st05_st . "',
                    st06_st='" . $st06_st . "',
                    st07_st='" . $st07_st . "',
                    st08_st='" . $st08_st . "',
                    st09_st='" . $st09_st . "',
                    st10_st='" . $st10_st . "',
                    org_name_st='" . $org_name_st . "',
                    org_date_st='" . $org_date_st . "',
                    org_time_st='" . $org_time_st . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateStatus(
    $id, $tickets_no_st, $st01_st, $st02_st, $st03_st, $st04_st, $st05_st, $st06_st, $st07_st, $st08_st, $st09_st, $st10_st, $org_name_st, $org_date_st, $org_time_st
    ) {
      $res = "UPDATE status_tbl SET
			st01_st='" . $st01_st . "',
                        st02_st='" . $st02_st . "',
                        org_name_st='" . $org_name_st . "'
		        WHERE tickets_no_st='" . $tickets_no_st . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateStatusTwo(
    $id, $tickets_no_st, $st01_st, $st02_st, $st03_st, $st04_st, $st05_st, $st06_st, $st07_st, $st08_st, $st09_st, $st10_st, $org_name_st, $org_date_st, $org_time_st
    ) {

        $res = "UPDATE status_tbl SET
			st02_st='" . $st02_st . "',
                        st03_st='" . $st03_st . "'
                        WHERE tickets_no_st='" . $tickets_no_st . "' ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteStatus($id) {
        $query = "DELETE FROM status_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getNextStatusRefNo($table, $suffix) {
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

    public function getStatusByTicketsNo() {
        $query = "SELECT tickets_no_st FROM status_tbl WHERE st01_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['tickets_no_st'] . "' >" . $rows['tickets_no_st'] . "</option>");
            }
        }
    }

    public function getStatusByTicketsTwo() {
        $query = "SELECT tickets_no_st FROM status_tbl WHERE st02_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['tickets_no_st'] . "' >" . $rows['tickets_no_st'] . "</option>");
            }
        }
    }

}

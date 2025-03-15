<?php

//date_default_timezone_set("Asia/Colombo");
class Format {

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

    public function getAllFormatt() {
        $today = date("Ym");
        return substr($today, 2, 9);

     
    }

    public function getFormatByNo($id) {
        $la = array();
        $query = "SELECT code_ft FROM format_tbl WHERE ref_no_ft='" . $id . "'  AND is_ft='0' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['code_ft'];
            }
        }
    }
    
    
      public function getFormatByMonth($id) {
        $la = array();
        $query = "SELECT code_ft FROM format_tbl WHERE ref_no_ft='" . $id . "'  AND is_ft='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['code_ft'];
            }
        }
    }

    public function confirmFormatEntity($ref_no_plt) {
        $res = "SELECT*FROM format_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewFormat(
    $id, $ref_no_ft, $code_ft
    ) {

        $res = "INSERT INTO format_tbl  SET
        id='" . $id . "',
        ref_no_ft='" . $ref_no_ft . "',
        code_ft='" . $code_ft . "'
		  ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateFormat(
    $id, $ref_no_vt, $date_vt, $org_name_vt, $org_date_vt, $org_time_vt
    ) {
        $res = mysql_query("UPDATE format_tbl SET
            id='" . $id . "',
            ref_no_ft='" . $ref_no_ft . "',
            code_ft='" . $code_ft . "',
	    WHERE id='" . $id . "' ");
        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteFormat($id) {
        $query_vtp = "DELETE FROM format_tbl WHERE ref_no_vtdt='$id'";
        $result = $this->mysqli->query($query_vpd);
        if ($result) {
            header('location:virtual_planner_beta_view.php');
        }
    }

    public function getNextFormatRefNo($table, $suffix) {
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

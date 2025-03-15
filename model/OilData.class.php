<?php

class OilData {

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

    public function getAllOilData() {
        $query = "SELECT * FROM oil_data_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getOilDataByNo($colours_code_odt) {
        $query = "SELECT * FROM oil_data_tbl WHERE colours_code_odt='" . $colours_code_odt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

     public function getOilDatabyId($id) {
        $la = array();
        
        $query = "SELECT * FROM oil_data_tbl WHERE   id='" . $id . "'     ";



        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_odt'], $rows['pattern_no_odt'], $rows['colours_code_odt'], $rows['colours_name_odt'], $rows['oil_name_odt'], $rows['oil_qty_odt'], $rows['mixing_oil_odt'], $rows['is_edit_odt'], $rows['item01_odt'], $rows['item02_odt'], $rows['item03_odt'], $rows['item04_odt'], $rows['item05_odt'], $rows['org_name_odt'], $rows['org_date_odt'], $rows['org_time_odt']
                );
            }
            return $la;
        }
    }
    
    
    
    
    public function getOilDataCusumpationPatternNo($pattern_no_ct, $colours_code_ct) {
        $la = array();
        //  $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='000M218'   AND  colours_code_ct='S01'  LIMIT 1  ";
        $query = "SELECT * FROM oil_data_tbl WHERE pattern_no_odt='" . $pattern_no_ct . "'   AND  colours_code_odt='" . $colours_code_ct . "'    LIMIT 1 ";



        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_odt'], $rows['pattern_no_odt'], $rows['colours_code_odt'], $rows['colours_name_odt'], $rows['oil_name_odt'], $rows['oil_qty_odt'], $rows['mixing_oil_odt'], $rows['is_edit_odt'], $rows['item01_odt'], $rows['item02_odt'], $rows['item03_odt'], $rows['item04_odt'], $rows['item05_odt'], $rows['org_name_odt'], $rows['org_date_odt'], $rows['org_time_odt']
                );
            }
            return $la;
        }
    }

    public function confirmOilDataEntity($colours_code_odt) {
        $res = "SELECT*FROM oil_data_tbl WHERE colours_code_odt = '" . $colours_code_odt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewOilData(
    $id, $ref_no_odt, $pattern_no_odt, $colours_code_odt, $colours_name_odt, $oil_name_odt, $oil_qty_odt, $mixing_oil_odt, $is_edit_odt, $item01_odt, $item02_odt, $item03_odt, $item04_odt, $item05_odt, $org_name_odt, $org_date_odt, $org_time_odt
    ) {



        $res = "INSERT INTO oil_data_tbl  SET
                ref_no_odt='" . $ref_no_odt . "',
                pattern_no_odt='" . $pattern_no_odt . "',
                colours_code_odt='" . $colours_code_odt . "',
                colours_name_odt='" . $colours_name_odt . "',
                oil_name_odt='" . $oil_name_odt . "',
                oil_qty_odt='" . $oil_qty_odt . "',
                mixing_oil_odt='" . $mixing_oil_odt . "',
                is_edit_odt='" . $is_edit_odt . "',
                item01_odt='" . $item01_odt . "',
                item02_odt='" . $item02_odt . "',
                item03_odt='" . $item03_odt . "',
                item04_odt='" . $item04_odt . "',
                item05_odt='" . $item05_odt . "',
                org_name_odt='" . $org_name_odt . "',
                org_date_odt='" . $org_date_odt . "',
                org_time_odt='" . $org_time_odt . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateOilData(
    $id, $ref_no_odt, $pattern_no_odt, $colours_code_odt, $colours_name_odt, $oil_name_odt, $oil_qty_odt, $mixing_oil_odt, $is_edit_odt, $item01_odt, $item02_odt, $item03_odt, $item04_odt, $item05_odt, $org_name_odt, $org_date_odt, $org_time_odt
    ) {

        $res = "UPDATE oil_data_tbl SET
               ref_no_odt='" . $ref_no_odt . "',
                pattern_no_odt='" . $pattern_no_odt . "',
                colours_code_odt='" . $colours_code_odt . "',
                colours_name_odt='" . $colours_name_odt . "',
                oil_name_odt='" . $oil_name_odt . "',
                oil_qty_odt='" . $oil_qty_odt . "',
                mixing_oil_odt='" . $mixing_oil_odt . "',
                is_edit_odt='" . $is_edit_odt . "',
                item01_odt='" . $item01_odt . "',
                item02_odt='" . $item02_odt . "',
                item03_odt='" . $item03_odt . "',
                item04_odt='" . $item04_odt . "',
                item05_odt='" . $item05_odt . "',
                org_name_odt='" . $org_name_odt . "',
                org_date_odt='" . $org_date_odt . "',
                org_time_odt='" . $org_time_odt . "'
	           WHERE id='" . $id . "' ";

       $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteOilData($id) {
        $query = "DELETE FROM oil_data_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location::oil_data.php');
        }
    }
    
    
             public function getMeshList() {
        $query = "SELECT item02_odt FROM oil_data_tbl  group by item02_odt";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['item02_odt'] . "' >" . $rows['item02_odt'] . "</option>");
            }
        }
    }
    
    
     
             public function getOillList() {
        $query = "SELECT oil_name_odt FROM oil_data_tbl  group by oil_name_odt";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['oil_name_odt'] . "' >" . $rows['oil_name_odt'] . "</option>");
            }
        }
    }

    public function getNextOilDataRefNo($table, $suffix) {
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

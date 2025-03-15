<?php
class DecalDefectiveData {
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

    public function getAllDecalDefectiveData() {
        $query = "SELECT * FROM decal_defective_data_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getWipDecalDefectiveData() {
        $query = "SELECT pro06_pst FROM printing_status_tbl WHERE pro07_pst='1'   GROUP BY   ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyOutPutQtyDecalDefectiveData($date) {
        $query = "SELECT org_date_tcpt FROM decal_defective_data_tbl WHERE org_date_tcpt='" . $date . "'  GROUP BY  lot_no_dt   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getPlanedQtyByNo($id) {
        $la = array();
        $query = "SELECT*FROM planed_qty_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_dddt'], $rows['pro_no_dddt'], $rows['lot_no_dddt'], $rows['defective_name_dddt'], $rows['qty_dddt'], $rows['is_edit_dddt'], $rows['item01_dddt'], $rows['item02_dddt'], $rows['item03_dddt'], $rows['item04_dddt'], $rows['item05_dddt'], $rows['org_name_dddt'], $rows['org_date_dddt'], $rows['org_time_dddt']
                );
            }
            return $la;
        }
    }

    public function confirmDecalDefectiveDataEntity($curve_no_ymt) {
        $res = "SELECT*FROM decal_defective_data_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewDecalDefectiveData(
    $id, $pattern_no_dddt, $pro_no_dddt, $lot_no_dddt, $defective_name_dddt, $qty_dddt, $is_edit_dddt, $item01_dddt, $item02_dddt, $item03_dddt, $item04_dddt, $item05_dddt, $org_name_dddt, $org_date_dddt, $org_time_dddt
    ) {



        $res = "INSERT INTO decal_defective_data_tbl  SET
                 id='" . $id . "',
                pattern_no_dddt='" . $pattern_no_dddt . "',
                pro_no_dddt='" . $pro_no_dddt . "',
                lot_no_dddt='" . $lot_no_dddt . "',
                defective_name_dddt='" . $defective_name_dddt . "',
                qty_dddt='" . $qty_dddt . "',
                is_edit_dddt='" . $is_edit_dddt . "',
                item01_dddt='" . $item01_dddt . "',
                item02_dddt='" . $item02_dddt . "',
                item03_dddt='" . $item03_dddt . "',
                item04_dddt='" . $item04_dddt . "',
                item05_dddt='" . $item05_dddt . "',
                org_name_dddt='" . $org_name_dddt . "',
                org_date_dddt='" . $org_date_dddt . "',
                org_time_dddt='" . $org_time_dddt . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDecalDefectiveData(
    $id, $pattern_no_dddt, $pro_no_dddt, $lot_no_dddt, $defective_name_dddt, $qty_dddt, $is_edit_dddt, $item01_dddt, $item02_dddt, $item03_dddt, $item04_dddt, $item05_dddt, $org_name_dddt, $org_date_dddt, $org_time_dddt
    ) {

        $res = mysql_query("UPDATE decal_defective_data_tbl SET
        	id='" . $id . "',
                pattern_no_dddt='" . $pattern_no_dddt . "',
                pro_no_dddt='" . $pro_no_dddt . "',
                lot_no_dddt='" . $lot_no_dddt . "',
                defective_name_dddt='" . $defective_name_dddt . "',
                qty_dddt='" . $qty_dddt . "',
                is_edit_dddt='" . $is_edit_dddt . "',
                item01_dddt='" . $item01_dddt . "',
                item02_dddt='" . $item02_dddt . "',
                item03_dddt='" . $item03_dddt . "',
                item04_dddt='" . $item04_dddt . "',
                item05_dddt='" . $item05_dddt . "',
                org_name_dddt='" . $org_name_dddt . "',
                org_date_dddt='" . $org_date_dddt . "',
                org_time_dddt='" . $org_time_dddt . "'
		WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteDecalDefectiveData($id) {
        $query = "DELETE FROM decal_defective_data_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getDecalDefectiveDataAeraById($id) {
        $query = "SELECT silver_area_dt FROM decal_defective_data_tbl WHERE curve_no_ymt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextDecalDefectiveDataRefNo($table, $suffix) {
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

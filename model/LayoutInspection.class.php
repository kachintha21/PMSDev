<?php

class LayoutInspection {

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

    public function getAllLayoutInspection() {
        $query = "SELECT * FROM layout_inspection_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getLayoutInspectionByNo($id) {
        $la = array();
        $query = "SELECT*FROM layout_inspection_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_lit'], $rows['pattern_no_lit'], $rows['lot_no_lit'], $rows['judgment_lit'], $rows['is_edit_lit'], $rows['item01_lit'], $rows['item02_lit'], $rows['item03_lit'], $rows['item04_lit'], $rows['item05_lit'], $rows['org_name_lit'], $rows['org_date_lit'], $rows['org_time_lit']
                );
            }
            return $la;
        }
    }

    public function getDailyOutPutQtyLayoutInspection($date, $mname) {
        $query = "SELECT org_date_lit,COUNT(*) AS t FROM layout_inspection_tbl WHERE org_date_lit='" . $date . "' AND judgment_lit='OK'  AND  pattern_no_lit='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function getWipLayoutInspection($mname) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro03_pt='1' AND  pattern_no_pt='" . $mname . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function confirmLayoutInspectionEntity($ref_no_plt) {
        $res = "SELECT*FROM layout_inspection_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewLayoutInspection(
    $id, $pro_no_lit, $pattern_no_lit, $lot_no_lit, $judgment_lit, $is_edit_lit, $item01_lit, $item02_lit, $item03_lit, $item04_lit, $item05_lit, $org_name_lit, $org_date_lit, $org_time_lit
    ) {



        $res = "INSERT INTO layout_inspection_tbl  SET
                        id='" . $id . "',
                        pro_no_lit='" . $pro_no_lit . "',
                        pattern_no_lit='" . $pattern_no_lit . "',
                        lot_no_lit='" . $lot_no_lit . "',
                        judgment_lit='" . $judgment_lit . "',
                        is_edit_lit='" . $is_edit_lit . "',
                        item01_lit='" . $item01_lit . "',
                        item02_lit='" . $item02_lit . "',
                        item03_lit='" . $item03_lit . "',
                        item04_lit='" . $item04_lit . "',
                        item05_lit='" . $item05_lit . "',
                        org_name_lit='" . $org_name_lit . "',
                        org_date_lit='" . $org_date_lit . "',
                        org_time_lit='" . $org_time_lit . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateLayoutInspection(
    $id, $pro_no_lit, $pattern_no_lit, $lot_no_lit, $judgment_lit, $is_edit_lit, $item01_lit, $item02_lit, $item03_lit, $item04_lit, $item05_lit, $org_name_lit, $org_date_lit, $org_time_lit
    ) {

        $res = mysql_query("UPDATE layout_inspection_tbl SET
                       id='" . $id . "',
                        pro_no_lit='" . $pro_no_lit . "',
                        pattern_no_lit='" . $pattern_no_lit . "',
                        lot_no_lit='" . $lot_no_lit . "',
                        judgment_lit='" . $judgment_lit . "',
                        is_edit_lit='" . $is_edit_lit . "',
                        item01_lit='" . $item01_lit . "',
                        item02_lit='" . $item02_lit . "',
                        item03_lit='" . $item03_lit . "',
                        item04_lit='" . $item04_lit . "',
                        item05_lit='" . $item05_lit . "',
                        org_name_lit='" . $org_name_lit . "',
                        org_date_lit='" . $org_date_lit . "',
                        org_time_lit='" . $org_time_lit . "',

	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteLayoutInspection($id) {
        $query = "DELETE FROM layout_inspection_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextLayoutInspectionRefNo($table, $suffix) {
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

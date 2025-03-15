<?php

class MinusReport {

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

    public function getAllMinusReport() {
        $query = "SELECT * FROM tbl_minus_report_dec_final";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getMinusReportByNo($id) {
        $la = array();
        $query = "SELECT*FROM tbl_minus_report_dec_final WHERE pro_no_plt='" . $id . "'  ";
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

    public function getMinusReportByNoT($id) {
        $la = array();
        $query = "SELECT*FROM tbl_minus_report_dec_final WHERE pro_no_plt='" . $id . "'  ";
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

    public function getMinusReportByUnique($dec_patt, $dec_curve,$item, $ORNYDATE, $ORDEST) {
        $query = "SELECT qty FROM tbl_minus_report_dec_final WHERE dec_patt='" . $dec_patt . "' AND dec_curve='" . $dec_curve . "'  AND item='" . $item . "'      AND ORNYDATE='" . $ORNYDATE . "'  AND  ORDEST='" . $ORDEST . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();

            return $rows['qty'];
        } else {
            return 0;
        }
    }

    public function getWipMinusReport($mname) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro03_pt='1' AND  pattern_no_pt='" . $mname . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function confirmMinusReportEntity($ref_no_plt) {
        $res = "SELECT*FROM tbl_minus_report_dec_final WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewMinusReport(
    $id, $dec_patt, $dec_curve, $item, $ORDEST, $ORNYDATE, $qty
    ) {



        $res = "INSERT INTO tbl_minus_report_dec_final  SET
                id='" . $id . "',
                dec_patt='" . $dec_patt . "',
                dec_curve='" . $dec_curve . "',
                item='" . $item . "',
                ORDEST='" . $ORDEST . "',
                ORNYDATE='" . $ORNYDATE . "',
                qty='" . $qty . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateMinusReport(
    $id, $dec_patt, $dec_curve, $item, $ORDEST, $ORNYDATE, $qty
    ) {

        $res = mysql_query("UPDATE tbl_minus_report_dec_final SET
                          id='" . $id . "',
                dec_patt='" . $dec_patt . "',
                dec_curve='" . $dec_curve . "',
                item='" . $item . "',
                ORDEST='" . $ORDEST . "',
                ORNYDATE='" . $ORNYDATE . "',
                qty='" . $qty . "'


	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteMinusReport($id) {
        $query = "DELETE FROM tbl_minus_report_dec_final WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextMinusReportRefNo($table, $suffix) {
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

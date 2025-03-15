<?php

class PlanedQty {

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

    public function getAllPlanedQty() {
        $query = "SELECT * FROM planed_qty_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPlanedQtyByNo($id) {
        $la = array();
        $query = "SELECT*FROM planed_qty_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_fot'], $rows['pro_no_fot'], $rows['lot_fot'], $rows['sheets_fot'], $rows['judgment_fot'], $rows['ffinish_date_fot'], $rows['colour_print_date_fot'], $rows['print_plan_date_fot'], $rows['layout_maker_fot'], $rows['layout_Check_fot'], $rows['is_edit_fot'], $rows['item01_fot'], $rows['item02_fot'], $rows['item03_fot'], $rows['item04_fot'], $rows['item05_fot'], $rows['item06_fot'], $rows['item07_fot'], $rows['item08_fot'], $rows['item09_fot'], $rows['item10_fot'], $rows['org_name_fot'], $rows['org_date_fot'], $rows['org_time_fot']
                );
            }
            return $la;
        }
    }

    public function getScheduleDate($id) {
        $query = "SELECT MIN(date_pqt)as t FROM planed_qty_tbl where ref_id_pqt='" . $id . "' and qty_pqt!='0'   ";
        $result = $this->mysqli->query($query);


        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function getDailyOutPutQtyPlanedQty($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM planed_qty_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function getPlanedQtyByUnique($dec_patt, $dec_curve, $ORNYDATE, $ORDEST) {
		//print("SELECT*FROM  planed_qty_tbl WHERE design_name_pqt='" . $dec_patt . "' AND curve_pqt='" . $dec_curve . "'  AND date_pqt='" . $ORNYDATE . "'  AND  ship_pqt='" . $ORDEST . "'  ");exit;
        $query = "SELECT*FROM  planed_qty_tbl WHERE design_name_pqt='" . $dec_patt . "' AND curve_pqt='" . $dec_curve . "'  AND date_pqt='" . $ORNYDATE . "'  AND  ship_pqt='" . $ORDEST . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();

            return $rows['qty_pqt'];
        } else {
            return 0;
        }
    }

    public function confirmPlanedQtyEntity($ref_no_plt) {
        $res = "SELECT*FROM planed_qty_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPlanedQty(
    $id, $ref_id_pqt, $design_name_pqt, $curve_pqt, $item_pqt, $qty_pqt, $date_pqt, $ship_pqt, $item02_pqt, $item03_pqt, $item04_pqt, $item05_pqt, $org_name_pqt, $org_date_pqt, $org_time_pqt
    ) {



        $res = "INSERT INTO planed_qty_tbl  SET
            ref_id_pqt='" . $ref_id_pqt . "',
            design_name_pqt='" . $design_name_pqt . "',
            curve_pqt='" . $curve_pqt . "',
            item_pqt='" . $item_pqt . "',
            qty_pqt='" . $qty_pqt . "',
            date_pqt='" . $date_pqt . "',
            ship_pqt='" . $ship_pqt . "',
            item02_pqt='" . $item02_pqt . "',
            item03_pqt='" . $item03_pqt . "',
            item04_pqt='" . $item04_pqt . "',
            item05_pqt='" . $item05_pqt . "',
            org_name_pqt='" . $org_name_pqt . "',
            org_date_pqt='" . $org_date_pqt . "',
            org_time_pqt='" . $org_time_pqt . "'



		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePlanedQty(
    $id, $ref_id_pqt, $design_name_pqt, $curve_pqt, $item_pqt, $qty_pqt, $date_pqt, $ship_pqt, $item02_pqt, $item03_pqt, $item04_pqt, $item05_pqt, $org_name_pqt, $org_date_pqt, $org_time_pqt
    ) {

        $res = mysql_query("UPDATE planed_qty_tbl SET
                       ref_id_pqt='" . $ref_id_pqt . "',
design_name_pqt='" . $design_name_pqt . "',
curve_pqt='" . $curve_pqt . "',
item_pqt='" . $item_pqt . "',
qty_pqt='" . $qty_pqt . "',
date_pqt='" . $date_pqt . "',
ship_pqt='" . $ship_pqt . "',
item02_pqt='" . $item02_pqt . "',
item03_pqt='" . $item03_pqt . "',
item04_pqt='" . $item04_pqt . "',
item05_pqt='" . $item05_pqt . "',
org_name_pqt='" . $org_name_pqt . "',
org_date_pqt='" . $org_date_pqt . "',
org_time_pqt='" . $org_time_pqt . "'

	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePlanedQty($id) {
        $query_qt = "DELETE FROM planed_qty_tbl WHERE ref_id_pqt='" . $id . "'";
        $query_pl = "DELETE FROM planning_tbl WHERE ref_no_fdt='" . $id . "'";
        $query_pa = "DELETE FROM planning_auto_tbl WHERE ref_no_pat='" . $id . "'";
        $query_sl = "DELETE FROM saved_layout_plans_tbl WHERE ref_id='" . $id . "'";
        $result_qt = $this->mysqli->query($query_qt);
        $result_pl = $this->mysqli->query($query_pl);
        $result_pa = $this->mysqli->query($query_pa);
        $result_pa = $this->mysqli->query($query_sl);
        if ($result_pa) {
            header('location:planning_data.php');
        }
    }

    public function getNextPlanedQtyRefNo($table, $suffix) {
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

<?php

class PlanningDecol {

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

    public function getAllPlanningDecol() {
        $query = "SELECT * FROM planning_decol_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPlanningDecolByNo($decol_pattern_pdt) {
        $query = "SELECT * FROM planning_decol_tbl WHERE decol_pattern_pdt='" . $decol_pattern_pdt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }
        
    

    public function confirmPlanningDecolEntity($decol_pattern_pdt) {
        $res = "SELECT*FROM planning_decol_tbl WHERE decol_pattern_pdt = '" . $decol_pattern_pdt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPlanningDecol(
        $id,	
        $ref_no_pdt,	
        $decol_pattern_pdt,	
        $pro_no_pdt,	
        $lot_no_pdt,	
        $pattern_no_pdf,	
        $curve_no_pdf,	
        $plan_pcs_pdf,	
        $pcs_per_sheet_pdf,	
        $actual_pdf,	
        $is_edit_pdf,	
        $item01_pdf,	
        $item02_pdf,	
        $item03_pdf,	
        $item04_pdf,	
        $item05_pdf,	
        $org_name_pdf,	
        $org_date_pdf,	
        $org_time_pdf
        


    ) {



        $res = "INSERT INTO planning_decol_tbl  SET
		       ref_no_pdt ='".$ref_no_pdt ."',
                decol_pattern_pdt ='".$decol_pattern_pdt ."',
                pro_no_pdt ='".$pro_no_pdt ."',
                lot_no_pdt ='".$lot_no_pdt ."',
                pattern_no_pdf ='".$pattern_no_pdf ."',
                curve_no_pdf ='".$curve_no_pdf ."',
                plan_pcs_pdf ='".$plan_pcs_pdf ."',
                pcs_per_sheet_pdf ='".$pcs_per_sheet_pdf ."',
                actual_pdf ='".$actual_pdf ."',
                is_edit_pdf ='".$is_edit_pdf ."',
                item01_pdf ='".$item01_pdf ."',
                item02_pdf ='".$item02_pdf ."',
                item03_pdf ='".$item03_pdf ."',
                item04_pdf ='".$item04_pdf ."',
                item05_pdf ='".$item05_pdf ."',
                org_name_pdf ='".$org_name_pdf ."',
                org_date_pdf ='".$org_date_pdf ."',
                org_time_pdf ='".$org_time_pdf ."'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePlanningDecol(
        $id,	
        $ref_no_pdt,	
        $decol_pattern_pdt,	
        $pro_no_pdt,	
        $lot_no_pdt,	
        $pattern_no_pdf,	
        $curve_no_pdf,	
        $plan_pcs_pdf,	
        $pcs_per_sheet_pdf,	
        $actual_pdf,	
        $is_edit_pdf,	
        $item01_pdf,	
        $item02_pdf,	
        $item03_pdf,	
        $item04_pdf,	
        $item05_pdf,	
        $org_name_pdf,	
        $org_date_pdf,	
        $org_time_pdf
    ) {

        $res = mysql_query("UPDATE planning_decol_tbl SET
			    ref_no_pdt ='".$ref_no_pdt ."',
                decol_pattern_pdt ='".$decol_pattern_pdt ."',
                pro_no_pdt ='".$pro_no_pdt ."',
                lot_no_pdt ='".$lot_no_pdt ."',
                pattern_no_pdf ='".$pattern_no_pdf ."',
                curve_no_pdf ='".$curve_no_pdf ."',
                plan_pcs_pdf ='".$plan_pcs_pdf ."',
                pcs_per_sheet_pdf ='".$pcs_per_sheet_pdf ."',
                actual_pdf ='".$actual_pdf ."',
                is_edit_pdf ='".$is_edit_pdf ."',
                item01_pdf ='".$item01_pdf ."',
                item02_pdf ='".$item02_pdf ."',
                item03_pdf ='".$item03_pdf ."',
                item04_pdf ='".$item04_pdf ."',
                item05_pdf ='".$item05_pdf ."',
                org_name_pdf ='".$org_name_pdf ."',
                org_date_pdf ='".$org_date_pdf ."',
                org_time_pdf ='".$org_time_pdf ."'
                 WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePlanningDecol($id) {
        $query = "DELETE FROM planning_decol_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }
    
 
    

    public function getNextPlanningDecolRefNo($table, $suffix) {
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

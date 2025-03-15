<?php

class PlanningDetails {

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

    public function getAllPlanningDetails() {
        $query = "SELECT * FROM planning_details_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPlanningDetailsByNo($ref_no_plt) {
        $query = "SELECT * FROM planning_details_tbl WHERE ref_no_plt='" . $ref_no_plt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPlanningDetailsEntity($ref_no_plt) {
        $res = "SELECT*FROM planning_details_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPlanningDetails(
     $id,	
    $ref_no_pdt,	
    $pro_no_pdt,	
    $pattern_no_pdt,	
    $decol_pattern_no_pdt,	
    $curve_no_pdt,	
    $plan_pcs_pdt,	
    $pcs_per_sheet_pdt,	
    $actual_pdt,	
    $is_edit_pdt,	
    $remarks_pdt,	
    $item01_pdt,	
    $item02_pdt,	
    $item03_pdt,	
    $item04_pdt,	
    $item05_pdt,	
    $org_name_pdt,	
    $org_date_pdt,	
    $org_time_pdt	
	


    ) {



        $res = "INSERT INTO planning_details_tbl  SET
                ref_no_pdt='".$ref_no_pdt."',
                pro_no_pdt='".$pro_no_pdt."',
                pattern_no_pdt='".$pattern_no_pdt."',
                decol_pattern_no_pdt='".$decol_pattern_no_pdt."',
                curve_no_pdt='".$curve_no_pdt."',
                plan_pcs_pdt='".$plan_pcs_pdt."',
                pcs_per_sheet_pdt='".$pcs_per_sheet_pdt."',
                actual_pdt='".$actual_pdt."',
                is_edit_pdt='".$is_edit_pdt."',
                remarks_pdt='".$remarks_pdt."',
                item01_pdt='".$item01_pdt."',
                item02_pdt='".$item02_pdt."',
                item03_pdt='".$item03_pdt."',
                item04_pdt='".$item04_pdt."',
                item05_pdt='".$item05_pdt."',
                org_name_pdt='".$org_name_pdt."',
                org_date_pdt='".$org_date_pdt."',
                org_time_pdt='".$org_time_pdt."'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePlanningDetails(
     $id,	
    $ref_no_pdt,	
    $pro_no_pdt,	
    $pattern_no_pdt,	
    $decol_pattern_no_pdt,	
    $curve_no_pdt,	
    $plan_pcs_pdt,	
    $pcs_per_sheet_pdt,	
    $actual_pdt,	
    $is_edit_pdt,	
    $remarks_pdt,	
    $item01_pdt,	
    $item02_pdt,	
    $item03_pdt,	
    $item04_pdt,	
    $item05_pdt,	
    $org_name_pdt,	
    $org_date_pdt,	
    $org_time_pdt	
	

    ) {

        $res = mysql_query("UPDATE planning_details_tbl SET
                 ref_no_pdt='".$ref_no_pdt."',
                pro_no_pdt='".$pro_no_pdt."',
                pattern_no_pdt='".$pattern_no_pdt."',
                decol_pattern_no_pdt='".$decol_pattern_no_pdt."',
                curve_no_pdt='".$curve_no_pdt."',
                plan_pcs_pdt='".$plan_pcs_pdt."',
                pcs_per_sheet_pdt='".$pcs_per_sheet_pdt."',
                actual_pdt='".$actual_pdt."',
                is_edit_pdt='".$is_edit_pdt."',
                remarks_pdt='".$remarks_pdt."',
                item01_pdt='".$item01_pdt."',
                item02_pdt='".$item02_pdt."',
                item03_pdt='".$item03_pdt."',
                item04_pdt='".$item04_pdt."',
                item05_pdt='".$item05_pdt."',
                org_name_pdt='".$org_name_pdt."',
                org_date_pdt='".$org_date_pdt."',
                org_time_pdt='".$org_time_pdt."'

	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePlanningDetails($id) {
        $query = "DELETE FROM planning_details_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }
    
    

    

    public function getNextPlanningDetailsRefNo($table, $suffix) {
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

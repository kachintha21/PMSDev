<?php

class ScreenPlanner {

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

    public function getScreenPlannerByPrintingIndex($pro_no_spt, $mesh_type_spt) {
        $la = array();
        $query = "SELECT * FROM screen_planner_tbl WHERE pro_no_spt='" . $pro_no_spt . "'   AND  mesh_type_spt='" . $mesh_type_spt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_spt'], $rows['ref_code_spt'], $rows['changeover_spt'], $rows['pro_no_spt'], $rows['design_spt'], $rows['lot_no_spt'], $rows['sheets_qty_spt'], $rows['number_of_colors_spt'], $rows['mesh_type_spt'], $rows['plan_colors_spt'], $rows['plan_date_spt'], $rows['plan_time_spt'], $rows['actual_date_spt'], $rows['actual_time_spt'], $rows['actual_qty_spt'], $rows['status_spt'], $rows['remarks'], $rows['item01_spt'], $rows['item02_spt'], $rows['item03_spt'], $rows['item04_spt'], $rows['item05_spt'], $rows['org_name_spt'], $rows['org_date_spt'], $rows['org_time_spt']
                );
            }
            return $la;
        }
    }

    public function getScreenPlannerByPrintingId($id) {
        $la = array();
        $query = "SELECT * FROM screen_planner_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_spt'], $rows['ref_code_spt'], $rows['changeover_spt'], $rows['pro_no_spt'], $rows['design_spt'], $rows['lot_no_spt'], $rows['sheets_qty_spt'], $rows['number_of_colors_spt'], $rows['mesh_type_spt'], $rows['plan_colors_spt'], $rows['plan_date_spt'], $rows['plan_time_spt'], $rows['actual_date_spt'], $rows['actual_time_spt'], $rows['actual_qty_spt'], $rows['status_spt'], $rows['remarks'], $rows['item01_spt'], $rows['item02_spt'], $rows['item03_spt'], $rows['item04_spt'], $rows['item05_spt'], $rows['org_name_spt'], $rows['org_date_spt'], $rows['org_time_spt']
                );
            }
            return $la;
        }
    }

    public function confirmScreenPlannerEntity($id) {
        $res = "SELECT*FROM screen_planner_tbl WHERE ref_no_spt = '" . $id . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewScreenPlanner(
    $id, $ref_no_spt, $ref_code_spt, $changeover_spt, $pro_no_spt, $design_spt, $lot_no_spt, $sheets_qty_spt, $number_of_colors_spt, $mesh_type_spt, $plan_colors_spt, $plan_date_spt, $plan_time_spt, $actual_date_spt, $actual_time_spt, $actual_qty_spt, $status_spt, $remarks, $item01_spt, $item02_spt, $item03_spt, $item04_spt, $item05_spt, $org_name_spt, $org_date_spt, $org_time_spt
    ) {

        $res = "INSERT INTO screen_planner_tbl  SET
        ref_no_spt='" . $ref_no_spt . "',
        ref_code_spt='" . $ref_code_spt . "',
        changeover_spt='" . $changeover_spt . "',
        pro_no_spt='" . $pro_no_spt . "',
        design_spt='" . $design_spt . "',
        lot_no_spt='" . $lot_no_spt . "',
        sheets_qty_spt='" . $sheets_qty_spt . "',
        number_of_colors_spt='" . $number_of_colors_spt . "',
        mesh_type_spt='" . $mesh_type_spt . "',
        plan_colors_spt='" . $plan_colors_spt . "',
        plan_date_spt='" . $plan_date_spt . "',
        plan_time_spt='" . $plan_time_spt . "',
        actual_date_spt='" . $actual_date_spt . "',
        actual_time_spt='" . $actual_time_spt . "',
        actual_qty_spt='" . $actual_qty_spt . "',
        status_spt='" . $status_spt . "',
        remarks='" . $remarks . "',
        item01_spt='" . $item01_spt . "',
        item02_spt='" . $item02_spt . "',
        item03_spt='" . $item03_spt . "',
        item04_spt='" . $item04_spt . "',
        item05_spt='" . $item05_spt . "',
        org_name_spt='" . $org_name_spt . "',
        org_date_spt='" . $org_date_spt . "',
        org_time_spt='" . $org_time_spt . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateScreenPlanner(
    $id, $ref_no_spt, $ref_code_spt, $changeover_spt, $pro_no_spt, $design_spt, $lot_no_spt, $sheets_qty_spt, $number_of_colors_spt, $mesh_type_spt, $plan_colors_spt, $plan_date_spt, $plan_time_spt, $actual_date_spt, $actual_time_spt, $actual_qty_spt, $status_spt, $remarks, $item01_spt, $item02_spt, $item03_spt, $item04_spt, $item05_spt, $org_name_spt, $org_date_spt, $org_time_spt
    ) {




        $res = "UPDATE screen_planner_tbl SET		

ref_no_spt='" . $ref_no_spt . "',
ref_code_spt='" . $ref_code_spt . "',
changeover_spt='" . $changeover_spt . "',
pro_no_spt='" . $pro_no_spt . "',
design_spt='" . $design_spt . "',
lot_no_spt='" . $lot_no_spt . "',
sheets_qty_spt='" . $sheets_qty_spt . "',
number_of_colors_spt='" . $number_of_colors_spt . "',
mesh_type_spt='" . $mesh_type_spt . "',
plan_colors_spt='" . $plan_colors_spt . "',
plan_date_spt='" . $plan_date_spt . "',
plan_time_spt='" . $plan_time_spt . "',
actual_date_spt='" . $actual_date_spt . "',
actual_time_spt='" . $actual_time_spt . "',
actual_qty_spt='" . $actual_qty_spt . "',
status_spt='" . $status_spt . "',
remarks='" . $remarks . "',
item01_spt='" . $item01_spt . "',
item02_spt='" . $item02_spt . "',
item03_spt='" . $item03_spt . "',
item04_spt='" . $item04_spt . "',
item05_spt='" . $item05_spt . "',
org_name_spt='" . $org_name_spt . "',
org_date_spt='" . $org_date_spt . "',
org_time_spt='" . $org_time_spt . "',

		
	WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteScreenPlanner($id) {
        $query = "DELETE FROM screen_planner_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:pigment_master_data.php');
        }
    }

    public function deleteScreenPlannerByRef($id) {
        $query = "DELETE FROM screen_planner_tbl WHERE ref_no_spt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getScreenPlannerByPn($pro_no_spt) {
        $la = array();
        $query = "SELECT * FROM screen_planner_tbl WHERE pro_no_spt='" . $pro_no_spt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pm'], $rows['pro_no_spt'], $rows['mesh_type_spt'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return la;
        }
    }

    
  

}

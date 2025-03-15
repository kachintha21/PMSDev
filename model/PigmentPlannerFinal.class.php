<?php

class PigmentPlannerFinal {

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
    
    
        public function getWipPigmentPlanFinal($ref_no_ppft,$machine_no_ppft,$date_ppft) {
        $query = "SELECT * FROM pigment_planner_final_tbl WHERE  ref_no_ppft='" . $ref_no_ppft . "'  AND   item01_ppft='" . $machine_no_ppft. "' AND date_ppft='" .$date_ppft . "' AND design_ppft!='N/A' AND is_edit_ppft='0' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }
    
           public function getHoldPigmentPlanFinal($ref_no_ppft,$machine_no_ppft,$date_ppft) {
        $query = "SELECT * FROM pigment_planner_final_tbl WHERE  ref_no_ppft='" . $ref_no_ppft . "'  AND   item01_ppft='" . $machine_no_ppft. "' AND date_ppft='" .$date_ppft . "' AND design_ppft!='N/A' AND is_edit_ppft='3' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    } 

    public function getDailyPigmentPlanFinal($ref_no_ppft,$machine_no_ppft,$date_ppft) {
               $query = "SELECT * FROM pigment_planner_final_tbl WHERE  ref_no_ppft='" . $ref_no_ppft . "'  AND   item01_ppft='" . $machine_no_ppft. "' AND date_ppft='" .$date_ppft . "' AND design_ppft!='N/A' AND is_edit_ppft='1' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }
    

    public function getPigmentPlannerFinalByNo($id) {
        $la = array();
        $query = "SELECT*FROM pigment_planner_final_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ID_ppft'], $rows['ref_no_ppft'], $rows['design_ppft'], $rows['pro_no_ppft'], $rows['lot_ppft'], $rows['plan_colors_ppft'], $rows['mesh_type_ppft'], $rows['colors_name_ppft'], $rows['pigment_total_ppft'], $rows['date_ppft'], $rows['change_over_ppft'], $rows['time_ppft'], $rows['shfit_ppft'], $rows['start_date_ppft'], $rows['finish_date_ppft'], $rows['imp_plan_ppft'], $rows['imp_actual_ppft'], $rows['estimate_time_ppft'], $rows['remarks_ppft'], $rows['is_edit_ppft'], $rows['item01_ppft'], $rows['item02_ppft'], $rows['item03_ppft'], $rows['item04_ppft'], $rows['item05_ppft'], $rows['org_name_ppft'], $rows['org_date_ppft'], $rows['org_time_ppft']
                );
            }
            return $la;
        }
    }

    public function confirmPigmentPlannerFinalEntity($ref_no_plt) {
        $res = "SELECT*FROM pigment_planner_final_tbl WHERE ref_no_vpt = '" . $ref_no_vpt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getFirstPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
        $res = "SELECT sum(qty_vtst) As t FROM pigment_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return round($rows['t'] / 20, 0);
        } else {
            return 0;
        }
    }

    public function getQtyFirstPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
        $res = "SELECT sum(qty_vtst) As t FROM pigment_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            //return round($rows['t'] / 20, 0);
            return round($rows['t'], 0);
        } else {
            return 0;
        }
    }

    public function getPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
        $res = "SELECT sum(total_time_vtst) As t FROM pigment_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return round($rows['t'], 0);
        } else {
            return 0;
        }
    }

    public function createNewPigmentPlannerFinal(
    $id, $ID_ppft, $ref_no_ppft, $design_ppft, $pro_no_ppft, $lot_ppft, $plan_colors_ppft, $mesh_type_ppft, $colors_name_ppft, $pigment_total_ppft, $date_ppft, $change_over_ppft, $time_ppft, $shfit_ppft, $start_date_ppft, $finish_date_ppft, $imp_plan_ppft, $imp_actual_ppft, $estimate_time_ppft, $remarks_ppft, $is_edit_ppft, $item01_ppft, $item02_ppft, $item03_ppft, $item04_ppft, $item05_ppft, $org_name_ppft, $org_date_ppft, $org_time_ppft
    ) {

        $res = "INSERT INTO pigment_planner_final_tbl  SET
            id='" . $id . "',
            ID_ppft='" . $ID_ppft . "',
            ref_no_ppft='" . $ref_no_ppft . "',
            design_ppft='" . $design_ppft . "',
            pro_no_ppft='" . $pro_no_ppft . "',
            lot_ppft='" . $lot_ppft . "',
            plan_colors_ppft='" . $plan_colors_ppft . "',
            mesh_type_ppft='" . $mesh_type_ppft . "',
            colors_name_ppft='" . $colors_name_ppft . "',
            pigment_total_ppft='" . $pigment_total_ppft . "',
            date_ppft='" . $date_ppft . "',
            change_over_ppft='" . $change_over_ppft . "',
            time_ppft='" . $time_ppft . "',
            shfit_ppft='" . $shfit_ppft . "',
            start_date_ppft='" . $start_date_ppft . "',
            finish_date_ppft='" . $finish_date_ppft . "',
            imp_plan_ppft='" . $imp_plan_ppft . "',
            imp_actual_ppft='" . $imp_actual_ppft . "',
            estimate_time_ppft='" . $estimate_time_ppft . "',
            remarks_ppft='" . $remarks_ppft . "',
            is_edit_ppft='" . $is_edit_ppft . "',
            item01_ppft='" . $item01_ppft . "',
            item02_ppft='" . $item02_ppft . "',
            item03_ppft='" . $item03_ppft . "',
            item04_ppft='" . $item04_ppft . "',
            item05_ppft='" . $item05_ppft . "',
            org_name_ppft='" . $org_name_ppft . "',
            org_date_ppft='" . $org_date_ppft . "',
            org_time_ppft='" . $org_time_ppft . "'



         ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentPlannerFinal(
    $id, $ID_ppft, $ref_no_ppft, $design_ppft, $pro_no_ppft, $lot_ppft, $plan_colors_ppft, $mesh_type_ppft, $colors_name_ppft, $pigment_total_ppft, $date_ppft, $change_over_ppft, $time_ppft, $shfit_ppft, $start_date_ppft, $finish_date_ppft, $imp_plan_ppft, $imp_actual_ppft, $estimate_time_ppft, $remarks_ppft, $is_edit_ppft, $item01_ppft, $item02_ppft, $item03_ppft, $item04_ppft, $item05_ppft, $org_name_ppft, $org_date_ppft, $org_time_ppft
    ) {

        $res = mysql_query("UPDATE pigment_planner_final_tbl SET
                  id='" . $id . "',
            ID_ppft='" . $ID_ppft . "',
            ref_no_ppft='" . $ref_no_ppft . "',
            design_ppft='" . $design_ppft . "',
            pro_no_ppft='" . $pro_no_ppft . "',
            lot_ppft='" . $lot_ppft . "',
            plan_colors_ppft='" . $plan_colors_ppft . "',
            mesh_type_ppft='" . $mesh_type_ppft . "',
            colors_name_ppft='" . $colors_name_ppft . "',
            pigment_total_ppft='" . $pigment_total_ppft . "',
            date_ppft='" . $date_ppft . "',
            change_over_ppft='" . $change_over_ppft . "',
            time_ppft='" . $time_ppft . "',
            shfit_ppft='" . $shfit_ppft . "',
            start_date_ppft='" . $start_date_ppft . "',
            finish_date_ppft='" . $finish_date_ppft . "',
            imp_plan_ppft='" . $imp_plan_ppft . "',
            imp_actual_ppft='" . $imp_actual_ppft . "',
            estimate_time_ppft='" . $estimate_time_ppft . "',
            remarks_ppft='" . $remarks_ppft . "',
            is_edit_ppft='" . $is_edit_ppft . "',
            item01_ppft='" . $item01_ppft . "',
            item02_ppft='" . $item02_ppft . "',
            item03_ppft='" . $item03_ppft . "',
            item04_ppft='" . $item04_ppft . "',
            item05_ppft='" . $item05_ppft . "',
            org_name_ppft='" . $org_name_ppft . "',
            org_date_ppft='" . $org_date_ppft . "',
            org_time_ppft='" . $org_time_ppft . "'

        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }
    
    
    
    
     public function updatePigmentPlannerFinalById(
    $id, $imp_actual_ppft, $is_edit_ppft, $item02_ppft, $item03_ppft
    ) {
        $res = "UPDATE pigment_planner_final_tbl SET        
            imp_actual_ppft='" . $imp_actual_ppft . "',       
            is_edit_ppft='" . $is_edit_ppft . "',   
            item02_ppft='" . $item02_ppft . "',
            item03_ppft='" . $item03_ppft . "'          
            WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentPlannerFinal($id) {
        $query = "DELETE FROM pigment_planner_final_tbl WHERE ref_no_ppft='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:virtual_planner_beta_view.php');
        }
    }

    public function getNextPigmentPlannerFinalRefNo($table, $suffix) {
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

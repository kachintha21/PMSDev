<?php

class ScreenPlannerFinal {

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

    public function getScreenPlannerFinalByNo($id) {
        $la = array();
        $query = "SELECT*FROM screen_planner_final_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ID_spft'], $rows['ref_no_spft'], $rows['design_spft'], $rows['pro_no_spft'], $rows['lot_spft'], $rows['plan_colors_spft'], $rows['mesh_type_spft'], $rows['machine_no_spft'], $rows['date_spft'], $rows['change_over_spft'], $rows['time_spft'], $rows['shfit_spft'], $rows['start_date_spft'], $rows['finish_date_spft'], $rows['imp_plan_spft'], $rows['imp_actual_spft'], $rows['estimate_time_spft'], $rows['remarks_spft'], $rows['is_edit_spft'], $rows['item01_spft'], $rows['item02_spft'], $rows['item03_spft'], $rows['item04_spft'], $rows['item05_spft'], $rows['org_name_spft'], $rows['org_date_spft'], $rows['org_time_spft']
                );
            }
            return $la;
        }
    }

    public function confirmScreenPlannerFinalEntity($ref_no_plt) {
        $res = "SELECT*FROM screen_planner_final_tbl WHERE ref_no_vpt = '" . $ref_no_vpt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
        public function getWipScreenVirtualPlannerFinal($ref_no_spft,$machine_no_spft,$date_spft) {
        $query = "SELECT * FROM screen_planner_final_tbl WHERE  ref_no_spft='" . $ref_no_spft . "'  AND   machine_no_spft='" . $machine_no_spft. "' AND date_spft='" .$date_spft . "' AND design_spft!='N/A' AND is_edit_spft='0' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }
    
           public function getHoldScreenVirtualPlannerFinal($ref_no_spft,$machine_no_spft,$date_spft) {
        $query = "SELECT * FROM screen_planner_final_tbl WHERE  ref_no_spft='" . $ref_no_spft . "'  AND   machine_no_spft='" . $machine_no_spft. "' AND date_spft='" .$date_spft . "' AND design_spft!='N/A' AND is_edit_spft='3' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    } 

    public function getDailyScreenVirtualPlannerFinal($ref_no_spft,$machine_no_spft,$date_spft) {
               $query = "SELECT * FROM screen_planner_final_tbl WHERE  ref_no_spft='" . $ref_no_spft . "'  AND   machine_no_spft='" . $machine_no_spft. "' AND date_spft='" .$date_spft . "' AND design_spft!='N/A' AND is_edit_spft='1' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }


    public function getFirstPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
        $res = "SELECT sum(qty_vtst) As t FROM screen_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
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
        $res = "SELECT sum(qty_vtst) As t FROM screen_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
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
        $res = "SELECT sum(total_time_vtst) As t FROM screen_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return round($rows['t'], 0);
        } else {
            return 0;
        }
    }

    public function createNewScreenPlannerFinal(
    $id, $ID_spft, $ref_no_spft, $design_spft, $pro_no_spft, $lot_spft, $plan_colors_spft, $mesh_type_spft, $machine_no_spft, $date_spft, $change_over_spft, $time_spft, $shfit_spft, $start_date_spft, $finish_date_spft, $imp_plan_spft, $imp_actual_spft, $estimate_time_spft, $remarks_spft, $is_edit_spft, $item01_spft, $item02_spft, $item03_spft, $item04_spft, $item05_spft, $org_name_spft, $org_date_spft, $org_time_spft
    ) {

        $res = "INSERT INTO screen_planner_final_tbl  SET
            id='" . $id . "',
           ID_spft='" . $ID_spft . "',
           ref_no_spft='" . $ref_no_spft . "',
           design_spft='" . $design_spft . "',
           pro_no_spft='" . $pro_no_spft . "',
           lot_spft='" . $lot_spft . "',
           plan_colors_spft='" . $plan_colors_spft . "',
           mesh_type_spft='" . $mesh_type_spft . "',
           machine_no_spft='" . $machine_no_spft . "',
           date_spft='" . $date_spft . "',
           change_over_spft='" . $change_over_spft . "',
           time_spft='" . $time_spft . "',
           shfit_spft='" . $shfit_spft . "',
           start_date_spft='" . $start_date_spft . "',
           finish_date_spft='" . $finish_date_spft . "',
           imp_plan_spft='" . $imp_plan_spft . "',
           imp_actual_spft='" . $imp_actual_spft . "',
           estimate_time_spft='" . $estimate_time_spft . "',
           remarks_spft='" . $remarks_spft . "',
           is_edit_spft='" . $is_edit_spft . "',
           item01_spft='" . $item01_spft . "',
           item02_spft='" . $item02_spft . "',
           item03_spft='" . $item03_spft . "',
           item04_spft='" . $item04_spft . "',
           item05_spft='" . $item05_spft . "',
           org_name_spft='" . $org_name_spft . "',
           org_date_spft='" . $org_date_spft . "',
           org_time_spft='" . $org_time_spft . "'


         ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
    
        public function updateScreenPlannerFinalUdateID(
        $id, $ID_spft,$imp_actual_spft, $is_edit_spft, $item01_spft, $item02_spft)
        {
        $res = "UPDATE screen_planner_final_tbl SET       
        imp_actual_spft='" . $imp_actual_spft . "',
        is_edit_spft='" . $is_edit_spft . "',
        item01_spft='" . $item01_spft . "',
        item02_spft='" . $item02_spft . "'       
        WHERE id='" . $id . "' ";   
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
      }

    public function updateScreenPlannerFinal(
    $id, $ID_spft, $ref_no_spft, $design_spft, $pro_no_spft, $lot_spft, $plan_colors_spft, $mesh_type_spft, $machine_no_spft, $date_spft, $change_over_spft, $time_spft, $shfit_spft, $start_date_spft, $finish_date_spft, $imp_plan_spft, $imp_actual_spft, $estimate_time_spft, $remarks_spft, $is_edit_spft, $item01_spft, $item02_spft, $item03_spft, $item04_spft, $item05_spft, $org_name_spft, $org_date_spft, $org_time_spft
    ) {

        $res = mysql_query("UPDATE screen_planner_final_tbl SET
            ID_spft='" . $ID_spft . "',
            ref_no_spft='" . $ref_no_spft . "',
            design_spft='" . $design_spft . "',
            pro_no_spft='" . $pro_no_spft . "',
            lot_spft='" . $lot_spft . "',
            plan_colors_spft='" . $plan_colors_spft . "',
            mesh_type_spft='" . $mesh_type_spft . "',
            machine_no_spft='" . $machine_no_spft . "',
            date_spft='" . $date_spft . "',
            change_over_spft='" . $change_over_spft . "',
            time_spft='" . $time_spft . "',
            shfit_spft='" . $shfit_spft . "',
            start_date_spft='" . $start_date_spft . "',
            finish_date_spft='" . $finish_date_spft . "',
            imp_plan_spft='" . $imp_plan_spft . "',
            imp_actual_spft='" . $imp_actual_spft . "',
            estimate_time_spft='" . $estimate_time_spft . "',
            remarks_spft='" . $remarks_spft . "',
            is_edit_spft='" . $is_edit_spft . "',
            item01_spft='" . $item01_spft . "',
            item02_spft='" . $item02_spft . "',
            item03_spft='" . $item03_spft . "',
            item04_spft='" . $item04_spft . "',
            item05_spft='" . $item05_spft . "',
            org_name_spft='" . $org_name_spft . "',
            org_date_spft='" . $org_date_spft . "',
            org_time_spft='" . $org_time_spft . "'

        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteScreenPlannerFinal($id) {
        $query = "DELETE FROM screen_planner_final_tbl WHERE ref_no_spft='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:virtual_planner_beta_view.php');
        }
    }

    public function getNextScreenPlannerFinalRefNo($table, $suffix) {
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

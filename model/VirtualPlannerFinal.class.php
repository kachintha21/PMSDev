<?php

class VirtualPlannerFinal {

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
    
    
        public function getWipVirtualPlannerFinal($ref_no_vpft,$machine_no_vpft,$date_vpft) {
        $query = "SELECT * FROM virtual_planner_final_tbl WHERE    machine_no_vpft='" . $machine_no_vpft. "' AND date_vpft='" .$date_vpft . "' AND design_vpft!='N/A' AND status_vpft='0' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }
    
           public function getHoldVirtualPlannerFinal($ref_no_vpft,$machine_no_vpft,$date_vpft) {
        $query = "SELECT * FROM virtual_planner_final_tbl WHERE    machine_no_vpft='" . $machine_no_vpft. "' AND date_vpft='" .$date_vpft . "' AND design_vpft!='N/A' AND status_vpft='3' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    } 

    public function getDailyVirtualPlannerFinal($ref_no_vpft,$machine_no_vpft,$date_vpft) {
               $query = "SELECT * FROM virtual_planner_final_tbl WHERE    machine_no_vpft='" . $machine_no_vpft. "' AND date_vpft='" .$date_vpft . "' AND design_vpft!='N/A' AND status_vpft='1' ORDER BY id ASC";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getVirtualPlannerFinalByNo($id) {
        $la = array();
        $query = "SELECT*FROM virtual_planner_final_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ID_vpft'], $rows['ref_no_vpft'], $rows['design_vpft'], $rows['pro_no_vpft'], $rows['lot_vpft'], $rows['num_colors_vpft'], $rows['plan_colors_vpft'], $rows['machine_no_vpft'], $rows['date_vpft'], $rows['time_vpft'], $rows['shfit_vpft'], $rows['start_date_vpft'], $rows['finish_date_vpft'], $rows['imp_plan_vpft'], $rows['imp_actual_vpft'], $rows['estimate_time_vpft'], $rows['print_time_vpft'], $rows['change_over_vpft'], $rows['xrite_vpft'], $rows['screen_vpft'], $rows['pigment_vpft'], $rows['status_vpft'], $rows['remarks_vpft'], $rows['is_edit_vpft'], $rows['item01_vpft'], $rows['item02_vpft'], $rows['item03_vpft'], $rows['item04_vpft'], $rows['item05_vpft'], $rows['org_name_vpft'], $rows['org_date_vpft'], $rows['org_time_vpft']
                );
            }
            return $la;
        }
    }

    public function confirmVirtualPlannerFinalEntity($ref_no_plt) {
        $res = "SELECT*FROM virtual_planner_final_tbl WHERE ref_no_vpt = '" . $ref_no_vpt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getFirstPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
        $res = "SELECT sum(qty_vtst) As t FROM virtual_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
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
        $res = "SELECT sum(qty_vtst) As t FROM virtual_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
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
        $res = "SELECT sum(total_time_vtst) As t FROM virtual_planner_final_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return round($rows['t'], 0);
        } else {
            return 0;
        }
    }
	
	public function createNewVPFinal($ref_no_vpft,$plan_date) {
		
		//print($plan_date);exit;
		
		$org_name_vpft = $loge_user;
		$org_date_vpft = getServerDate();
        $org_time_vpft = getServerTime();
		
		$res = "SELECT * FROM virtual_planner_final_tbl_excel WHERE plan_date = '" . $plan_date . "' ";
		if ( $result = $this->mysqli->query($res)) {
		while ($row = $result->fetch_assoc()) {
			
		
			
			$Plan_colour = "S".sprintf("%02d", $row['Plan_colour']);
			
			
		
		
		
		$res2 = "INSERT INTO virtual_planner_final_tbl  SET
  ID_vpft='" . $ID_vpft . "',
        ref_no_vpft='" . $ref_no_vpft . "',
        design_vpft='" . $row['Design'] . "',
        pro_no_vpft='" . $row['Pro_no'] . "',
        lot_vpft='" . $row['Lot'] . "',
        num_colors_vpft='" . $row['No_of_colour'] . "',
        plan_colors_vpft='" . $Plan_colour . "',
        machine_no_vpft='" . $row['M_no'] . "',
        date_vpft='" . $row['Plan_date'] . "',
        time_vpft='" . $row['Time'] . "',
        shfit_vpft='" . $shfit_vpft . "',
        start_date_vpft='" . $row['Start_date'] . "',
        finish_date_vpft='" . $row['End_date'] . "',
        imp_plan_vpft='" . $row['Qty'] . "',
        imp_actual_vpft='',
        estimate_time_vpft='" . $row['Time_t'] . "',
        print_time_vpft='" . $row['Plan_print'] . "',
        change_over_vpft='" . $row['Change_over'] . "',
        xrite_vpft='',
        screen_vpft='',
        pigment_vpft='',
        status_vpft='',
        remarks_vpft='',
        is_edit_vpft='',
        item01_vpft='',
        item02_vpft='',
        item03_vpft='',
        item04_vpft='',
        item05_vpft='',
        org_name_vpft='" . $org_name_vpft . "',
        org_date_vpft='" . $org_date_vpft . "',
        org_time_vpft='" . $org_time_vpft . "'

         ";
        $result2 = $this->mysqli->query($res2);
		
		}
		}

        
	}
	
	
	
	
	
	

    public function createNewVirtualPlannerFinal(
	
    $id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft
    ) {
//print(123123);exit;
        $res = "INSERT INTO virtual_planner_final_tbl  SET
  ID_vpft='" . $ID_vpft . "',
        ref_no_vpft='" . $ref_no_vpft . "',
        design_vpft='" . $design_vpft . "',
        pro_no_vpft='" . $pro_no_vpft . "',
        lot_vpft='" . $lot_vpft . "',
        num_colors_vpft='" . $num_colors_vpft . "',
        plan_colors_vpft='" . $plan_colors_vpft . "',
        machine_no_vpft='" . $machine_no_vpft . "',
        date_vpft='" . $date_vpft . "',
        time_vpft='" . $time_vpft . "',
        shfit_vpft='" . $shfit_vpft . "',
        start_date_vpft='" . $start_date_vpft . "',
        finish_date_vpft='" . $finish_date_vpft . "',
        imp_plan_vpft='" . $imp_plan_vpft . "',
        imp_actual_vpft='" . $imp_actual_vpft . "',
        estimate_time_vpft='" . $estimate_time_vpft . "',
        print_time_vpft='" . $print_time_vpft . "',
        change_over_vpft='" . $change_over_vpft . "',
        xrite_vpft='" . $xrite_vpft . "',
        screen_vpft='" . $screen_vpft . "',
        pigment_vpft='" . $pigment_vpft . "',
        status_vpft='" . $status_vpft . "',
        remarks_vpft='" . $remarks_vpft . "',
        is_edit_vpft='" . $is_edit_vpft . "',
        item01_vpft='" . $item01_vpft . "',
        item02_vpft='" . $item02_vpft . "',
        item03_vpft='" . $item03_vpft . "',
        item04_vpft='" . $item04_vpft . "',
        item05_vpft='" . $item05_vpft . "',
        org_name_vpft='" . $org_name_vpft . "',
        org_date_vpft='" . $org_date_vpft . "',
        org_time_vpft='" . $org_time_vpft . "'

         ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateVirtualPlannerFinal(
    $id, $ID_vpft, $ref_no_vpft, $design_vpft, $pro_no_vpft, $lot_vpft, $num_colors_vpft, $plan_colors_vpft, $machine_no_vpft, $date_vpft, $time_vpft, $shfit_vpft, $start_date_vpft, $finish_date_vpft, $imp_plan_vpft, $imp_actual_vpft, $estimate_time_vpft, $print_time_vpft, $change_over_vpft, $xrite_vpft, $screen_vpft, $pigment_vpft, $status_vpft, $remarks_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft, $item03_vpft, $item04_vpft, $item05_vpft, $org_name_vpft, $org_date_vpft, $org_time_vpft
    ) {

        $res = mysql_query("UPDATE virtual_planner_final_tbl SET
        ID_vpft='" . $ID_vpft . "',
        ref_no_vpft='" . $ref_no_vpft . "',
        design_vpft='" . $design_vpft . "',
        pro_no_vpft='" . $pro_no_vpft . "',
        lot_vpft='" . $lot_vpft . "',
        num_colors_vpft='" . $num_colors_vpft . "',
        plan_colors_vpft='" . $plan_colors_vpft . "',
        machine_no_vpft='" . $machine_no_vpft . "',
        date_vpft='" . $date_vpft . "',
        time_vpft='" . $time_vpft . "',
        shfit_vpft='" . $shfit_vpft . "',
        start_date_vpft='" . $start_date_vpft . "',
        finish_date_vpft='" . $finish_date_vpft . "',
        imp_plan_vpft='" . $imp_plan_vpft . "',
        imp_actual_vpft='" . $imp_actual_vpft . "',
        estimate_time_vpft='" . $estimate_time_vpft . "',
        print_time_vpft='" . $print_time_vpft . "',
        change_over_vpft='" . $change_over_vpft . "',
        xrite_vpft='" . $xrite_vpft . "',
        screen_vpft='" . $screen_vpft . "',
        pigment_vpft='" . $pigment_vpft . "',
        status_vpft='" . $status_vpft . "',
        remarks_vpft='" . $remarks_vpft . "',
        is_edit_vpft='" . $is_edit_vpft . "',
        item01_vpft='" . $item01_vpft . "',
        item02_vpft='" . $item02_vpft . "',
        item03_vpft='" . $item03_vpft . "',
        item04_vpft='" . $item04_vpft . "',
        item05_vpft='" . $item05_vpft . "',
        org_name_vpft='" . $org_name_vpft . "',
        org_date_vpft='" . $org_date_vpft . "',
        org_time_vpft='" . $org_time_vpft . "'
        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }
    
    
        public function updateVirtualPlannerFinalByID(
        $id, $ID_vpft, $status_vpft,$imp_actual_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft,$hre,$screen,$pigment,$color_book,$plate_box,$ac_sheets,$pl_time,$co_time,$pr_time,$lo_time,$lt_reason,$lp_reason,$quality_req,$check_status,$ap_dt,$proceed_decision,$approval_date,$approval_status)
        {
        $res = "UPDATE virtual_planner_final_tbl SET   
        status_vpft='" . $status_vpft . "',  
        imp_actual_vpft='" . $imp_actual_vpft . "',
        is_edit_vpft='" . $is_edit_vpft . "',
        item01_vpft='" . $item01_vpft . "',
        item02_vpft='" . $item02_vpft . "',
		item05_vpft='" . $hre . "'	
        WHERE id='" . $id . "' ";   
        $result = $this->mysqli->query($res);


        $res2 = "INSERT INTO tbl_machine_extra_data  SET
        vpft_id='" . $id . "',
        screen='" . $screen . "',
        pigment='" . $pigment . "',
        color_book='" . $color_book . "',
        plate_box='" . $plate_box . "',
        ac_sheets='" . $ac_sheets . "',
        pl_time='" . $pl_time . "',
        co_time='" . $co_time . "',
        pr_time='" . $pr_time . "',
        lo_time='" . $lo_time . "',
        lt_reason='" . $lt_reason . "',
        lp_reason='" . $lp_reason . "',
        quality_req='" . $quality_req . "',
        check_status='" . $check_status . "',
        ap_dt='" . $ap_dt . "',
        proceed_decision='" . $proceed_decision . "',
        approval_date='" . $approval_date . "',
        approval_status='" . $approval_status . "'
         ";
        $result2 = $this->mysqli->query($res2);





        if ($result) {
            return true;
        }
      }
      
           public function updateVirtualPlannerUdateID(
        $id, $ID_vpft, $status_vpft,$imp_actual_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft)
        {
        $res = "UPDATE virtual_planner_final_tbl SET   
        status_vpft='" . $status_vpft . "',  
        imp_actual_vpft='" . $imp_actual_vpft . "',
        is_edit_vpft='" . $is_edit_vpft . "',
        item01_vpft='" . $item01_vpft . "',
        item02_vpft='" . $item02_vpft . "'       
        WHERE id='" . $id . "' ";   
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
      }
	  
	  public function updateVirtualPlannerUdateIDHold(
        $id, $ID_vpft, $status_vpft,$imp_actual_vpft, $is_edit_vpft, $item01_vpft, $item02_vpft,$today)
        {
        $res = "UPDATE virtual_planner_final_tbl SET   
        status_vpft='" . $status_vpft . "',  
        imp_actual_vpft='" . $imp_actual_vpft . "',
        is_edit_vpft='" . $is_edit_vpft . "',
        item01_vpft='" . $item01_vpft . "',
        item02_vpft='" . $item02_vpft . "' ,
		date_vpft='" . $today . "',
		time_vpft='23:59'
        WHERE id='" . $id . "' ";   
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
      }
    

    public function deleteVirtualPlannerFinal($id) {
        $query = "DELETE FROM virtual_planner_final_tbl WHERE ref_no_vpft='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:virtual_planner_beta_view.php');
        }
    }

    public function getNextVirtualPlannerFinalRefNo($table, $suffix) {
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

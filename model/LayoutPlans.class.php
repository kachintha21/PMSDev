<?php

class Layoutplans {

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
	
	public function getDecalByCurveNo($pro_no_lpt, $curve_no_dt) {
        $la = array();
        $query = "SELECT decal_no_lpt FROM layout_plans_tbl WHERE pro_no_lpt='" . $pro_no_lpt . "' AND  curve_no_dt='" . $curve_no_dt . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        } else {
            return 0;
        }
    }
	
	
	public function updateVirtualPlannerFinalByID(
        $id,$hre)
        {
			
		$stauts='1';
		
        $res = "UPDATE layout_plans_tbl SET 
		item05_lpt='" . $stauts . "',
		item04_lpt='" . $hre . "'	
        WHERE id='" . $id . "' ";   
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
      }

    public function getAllLayoutplans() {
        $query = "SELECT * FROM layout_plans_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getLayoutplansByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM layout_plans_tbl WHERE layout='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pro_no_lpt'], $rows['lot_no_lpt'], $rows['simulation_status_lpt'], $rows['desing_no_lpt'], $rows['curve_no_lpt'], $rows['decal_no_lpt'], $rows['planned_qty_lpt'], $rows['no_of_curves_lpt'], $rows['no_of_sheets_lpt'], $rows['close_curve_after_lpt'], $rows['total_sheets_needed_lpt'], $rows['is_edit_lpt'], $rows['status_lpt'], $rows['item01_lpt'], $rows['item02_lpt'], $rows['item03_lpt'], $rows['item04_lpt'], $rows['item05_lpt'], $rows['org_name_lpt'], $rows['org_date_lpt'], $rows['org_time_lpt']
                );
            }
            return $la;
        }
    }

    public function getLayoutplansById($id) {
        $la = array();
        $query = "SELECT * FROM layout_plans_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pro_no_lpt'], $rows['lot_no_lpt'], $rows['simulation_status_lpt'], $rows['desing_no_lpt'], $rows['curve_no_lpt'], $rows['decal_no_lpt'], $rows['planned_qty_lpt'], $rows['no_of_curves_lpt'], $rows['no_of_sheets_lpt'], $rows['close_curve_after_lpt'], $rows['total_sheets_needed_lpt'], $rows['is_edit_lpt'], $rows['status_lpt'], $rows['item01_lpt'], $rows['item02_lpt'], $rows['item03_lpt'], $rows['item04_lpt'], $rows['item05_lpt'], $rows['org_name_lpt'], $rows['org_date_lpt'], $rows['org_time_lpt']
                );
            }
            return $la;
        }
    }

    public function getLayoutplansByNo($layout) {
        $query = "SELECT * FROM layout_plans_tbl WHERE layout='" . $layout . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmLayoutplansEntity($layout) {
        $res = "SELECT*FROM layout_plans_tbl WHERE layout = '" . $layout . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewLayoutplans(
    $id, $pro_no_lpt, $lot_no_lpt, $simulation_status_lpt, $desing_no_lpt, $curve_no_lpt, $decal_no_lpt, $planned_qty_lpt, $no_of_curves_lpt, $no_of_sheets_lpt, $close_curve_after_lpt, $total_sheets_needed_lpt, $is_edit_lpt, $status_lpt, $item01_lpt, $item02_lpt, $item03_lpt, $item04_lpt, $item05_lpt, $org_name_lpt, $org_date_lpt, $org_time_lpt
    ) {



        $res = "INSERT INTO layout_plans_tbl  SET
id='" . $id . "',			
pro_no_lpt='" . $pro_no_lpt . "',			
lot_no_lpt='" . $lot_no_lpt . "',			
simulation_status_lpt='" . $simulation_status_lpt . "',			
desing_no_lpt='" . $desing_no_lpt . "',			
curve_no_lpt='" . $curve_no_lpt . "',			
decal_no_lpt='" . $decal_no_lpt . "',			
planned_qty_lpt='" . $planned_qty_lpt . "',			
no_of_curves_lpt='" . $no_of_curves_lpt . "',			
no_of_sheets_lpt='" . $no_of_sheets_lpt . "',			
close_curve_after_lpt='" . $close_curve_after_lpt . "',			
total_sheets_needed_lpt='" . $total_sheets_needed_lpt . "',			
is_edit_lpt='" . $is_edit_lpt . "',			
status_lpt='" . $status_lpt . "',			
item01_lpt='" . $item01_lpt . "',			
item02_lpt='" . $item02_lpt . "',			
item03_lpt='" . $item03_lpt . "',			
item04_lpt='" . $item04_lpt . "',			
item05_lpt='" . $item05_lpt . "',			
org_name_lpt='" . $org_name_lpt . "',			
org_date_lpt='" . $org_date_lpt . "',			
org_time_lpt='" . $org_time_lpt . "'			

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateLayoutplans(
    $id, $pro_no_lpt, $lot_no_lpt, $simulation_status_lpt, $desing_no_lpt, $curve_no_lpt, $decal_no_lpt, $planned_qty_lpt, $no_of_curves_lpt, $no_of_sheets_lpt, $close_curve_after_lpt, $total_sheets_needed_lpt, $is_edit_lpt, $status_lpt, $item01_lpt, $item02_lpt, $item03_lpt, $item04_lpt, $item05_lpt, $org_name_lpt, $org_date_lpt, $org_time_lpt
    ) {



            $res = "UPDATE layout_plans_tbl SET         	
            desing_no_lpt='" . $desing_no_lpt . "',			
            curve_no_lpt='" . $curve_no_lpt . "',			
            decal_no_lpt='" . $decal_no_lpt . "',			
            planned_qty_lpt='" . $planned_qty_lpt . "',			
            no_of_curves_lpt='" . $no_of_curves_lpt . "',			
            no_of_sheets_lpt='" . $no_of_sheets_lpt . "',			
            close_curve_after_lpt='" . $close_curve_after_lpt . "',			
            total_sheets_needed_lpt='" . $total_sheets_needed_lpt . "',			
            is_edit_lpt='" . $is_edit_lpt . "',			
            status_lpt='" . $status_lpt . "',			
            item01_lpt='" . $item01_lpt . "',			
            item02_lpt='" . $item02_lpt . "',			
            item03_lpt='" . $item03_lpt . "',			
            item04_lpt='" . $item04_lpt . "',			
            item05_lpt='" . $item05_lpt . "',			
            org_name_lpt='" . $org_name_lpt . "',			
            org_date_lpt='" . $org_date_lpt . "',			
            org_time_lpt='" . $org_time_lpt . "'	
  
		    WHERE id='" . $id . "' ";
            
            
            
//                  $res = "UPDATE layout_plans_tbl SET
//            id='" . $id . "',			
//            pro_no_lpt='" . $pro_no_lpt . "',			
//            lot_no_lpt='" . $lot_no_lpt . "',			
//            simulation_status_lpt='" . $simulation_status_lpt . "',			
//            desing_no_lpt='" . $desing_no_lpt . "',			
//            curve_no_lpt='" . $curve_no_lpt . "',			
//            decal_no_lpt='" . $decal_no_lpt . "',			
//            planned_qty_lpt='" . $planned_qty_lpt . "',			
//            no_of_curves_lpt='" . $no_of_curves_lpt . "',			
//            no_of_sheets_lpt='" . $no_of_sheets_lpt . "',			
//            close_curve_after_lpt='" . $close_curve_after_lpt . "',			
//            total_sheets_needed_lpt='" . $total_sheets_needed_lpt . "',			
//            is_edit_lpt='" . $is_edit_lpt . "',			
//            status_lpt='" . $status_lpt . "',			
//            item01_lpt='" . $item01_lpt . "',			
//            item02_lpt='" . $item02_lpt . "',			
//            item03_lpt='" . $item03_lpt . "',			
//            item04_lpt='" . $item04_lpt . "',			
//            item05_lpt='" . $item05_lpt . "',			
//            org_name_lpt='" . $org_name_lpt . "',			
//            org_date_lpt='" . $org_date_lpt . "',			
//            org_time_lpt='" . $org_time_lpt . "'	
//  
//		    WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
    
    
    
    public function updateLayoutplansByID(
    $id, $pro_no_lpt, $lot_no_lpt, $simulation_status_lpt, $desing_no_lpt, $curve_no_lpt, $decal_no_lpt, $planned_qty_lpt, $no_of_curves_lpt, $no_of_sheets_lpt, $close_curve_after_lpt, $total_sheets_needed_lpt, $is_edit_lpt, $status_lpt, $item01_lpt, $item02_lpt, $item03_lpt, $item04_lpt, $item05_lpt, $org_name_lpt, $org_date_lpt, $org_time_lpt
    ) {



        $res = "UPDATE layout_plans_tbl SET	
        is_edit_lpt='" . $is_edit_lpt . "',			
        status_lpt='" . $status_lpt . "',			
        item01_lpt='" . $item01_lpt . "',			
        item02_lpt='" . $item02_lpt . "',			
        item03_lpt='" . $item03_lpt . "',			
        item04_lpt='" . $item04_lpt . "',			
        item05_lpt='" . $item05_lpt . "',			
        org_name_lpt='" . $org_name_lpt . "',			
        org_date_lpt='" . $org_date_lpt . "',			
        org_time_lpt='" . $org_time_lpt . "'
  
        WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
    
    
    public function resetLayoutplansByID(
    $id, $status_lp, $item01_lpt
    ) {

        $res = "UPDATE layout_plans_tbl SET	   	
        status_lpt='" . $status_lpt . "',			
        item01_lpt='" . $item01_lpt . "'		
         WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
    

    public function deleteLayoutplans($id) {
        $query = "DELETE FROM layout_plans_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function deleteLayoutplansByProNo($id) {
        $query = "DELETE FROM layout_plans_tbl WHERE pro_no_lpt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getLayoutplansByLotNumber() {
        $query = "SELECT DISTINCT layout FROM layout_plans_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['layout'] . "' >" . $rows['layout'] . "</option>");
            }
        }
    }

    public function getAera($id) {
        $query = "SELECT FROM data_tbl WHERE curve_no_dt='" . $id . "'";
        $result = $this->mysqli->query($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row = $result->fetch_assoc();
                return $row["silver_area_dt"];
            }
        } else {
            return 1;
        }
    }

    public function getNextLayoutplansRefNo($table, $suffix) {
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

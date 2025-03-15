<?php

class PrintingSpeedMaster {

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
    
        public function getPrintingSpeedMasterById($id) {
        $la = array();
        $query = "SELECT*FROM printing_speed_master_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_psmt'], $rows['color_index_psmt'], $rows['printing_speed_psmt'], $rows['is_edit_psmt'], $rows['item01_psmt'], $rows['item02_psmt'], $rows['item03_psmt'], $rows['item04_psmt'], $rows['item05_psmt'], $rows['org_name_psmt'], $rows['org_date_psmt'], $rows['org_time_psmt']
                );
            }
            return $la;
        }
    }

    public function getPrintingSpeedMasterByNo($id) {
        $la = array();
        $query = "SELECT*FROM printing_speed_master_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_psmt'], $rows['color_index_psmt'], $rows['printing_speed_psmt'], $rows['is_edit_psmt'], $rows['item01_psmt'], $rows['item02_psmt'], $rows['item03_psmt'], $rows['item04_psmt'], $rows['item05_psmt'], $rows['org_name_psmt'], $rows['org_date_psmt'], $rows['org_time_psmt']
                );
            }
            return $la;
        }
    }

    public function getPrintingSpeedMasterByColorIndex($pattern_no_psmt, $color_index_psmt, $sheet_qty) {
        $la = array();
        $query = "SELECT printing_speed_psmt FROM printing_speed_master_tbl WHERE pattern_no_psmt='" . $pattern_no_psmt . "' AND  color_index_psmt='" . $color_index_psmt . "'  ";
        //echo($query);
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
              //return 10;
          
              return round($rows['printing_speed_psmt'] * $sheet_qty,0);
            }
        } else {
            //return 10;
            //return round(0.25*$sheet_qty,0);
            //
            //
               return round(0.10*$sheet_qty,0);   
              
        } 
    }
    
      public function getFirstPrintingSpeedMasterByColorIndex($id,$machine_no) {


        
               $query = "SELECT SUM(qty_vpt) AS t 
                                        FROM virtual_planner_details_tbl v
                                        LEFT JOIN pigment_master_tbl p
                                        ON p.pattern_pm = v.item01_vpt
                                        LEFT JOIN printing_machine_master_tbl m
                                        ON  p.pattern_pm  = m.pattern_no_pmmt
                                        WHERE v.ref_no_vpt='" .$id. "' AND
                                        v.item05_vpt='1' AND
                                        m.machine_no_pmmt='" . $machine_no . "' AND
                                        m.priority_pmmt='1' AND
                                        p.colours_pm ='S01' ";       
        
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
          
                return round($rows['t']);
            }
        } else {
            
           // return $sheet_qty*0.25;
              return "-";
        }
    }
    
    
    
    

    public function getWipPrintingSpeedMaster($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function getDailyOutPutQtyPrintingSpeedMaster($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM printing_speed_master_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function createNewPrintingSpeedMaster(
    $id, $pattern_no_psmt, $color_index_psmt, $printing_speed_psmt, $is_edit_psmt, $item01_psmt, $item02_psmt, $item03_psmt, $item04_psmt, $item05_psmt, $org_name_psmt, $org_date_psmt, $org_time_psmt
    ) {



        $res = "INSERT INTO printing_speed_master_tbl  SET
                pattern_no_psmt='" . $pattern_no_psmt . "',
                color_index_psmt='" . $color_index_psmt . "',
                printing_speed_psmt='" . $printing_speed_psmt . "',
                is_edit_psmt='" . $is_edit_psmt . "',
                item01_psmt='" . $item01_psmt . "',
                item02_psmt='" . $item02_psmt . "',
                item03_psmt='" . $item03_psmt . "',
                item04_psmt='" . $item04_psmt . "',
                item05_psmt='" . $item05_psmt . "',
                org_name_psmt='" . $org_name_psmt . "',
                org_date_psmt='" . $org_date_psmt . "',
                org_time_psmt='" . $org_time_psmt . "'



            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrintingSpeedMaster(
    $id, $pattern_no_psmt, $color_index_psmt, $printing_speed_psmt, $is_edit_psmt, $item01_psmt, $item02_psmt, $item03_psmt, $item04_psmt, $item05_psmt, $org_name_psmt, $org_date_psmt, $org_time_psmt
    ) {

        $res = "UPDATE printing_speed_master_tbl SET   	    
                pattern_no_psmt='" . $pattern_no_psmt . "',
                color_index_psmt='" . $color_index_psmt . "',
                printing_speed_psmt='" . $printing_speed_psmt . "',
                is_edit_psmt='" . $is_edit_psmt . "',
                item01_psmt='" . $item01_psmt . "',
                item02_psmt='" . $item02_psmt . "',
                item03_psmt='" . $item03_psmt . "',
                item04_psmt='" . $item04_psmt . "',
                item05_psmt='" . $item05_psmt . "',
                org_name_psmt='" . $org_name_psmt . "',
                org_date_psmt='" . $org_date_psmt . "',
                org_time_psmt='" . $org_time_psmt . "'
	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePrintingSpeedMaster($id) {
        $query = "DELETE FROM printing_speed_master_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:printing_speed_master_view.php');
        }
    }

}

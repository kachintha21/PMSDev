<?php

class DIDefect {

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
	
	
	 

    public function getDInspectionQtyByCurveNo($pro_no_dt, $curve_no_dt,$decal_no_lpt) {
        $la = array();
        $query = "SELECT SUM(item01_dt) As t FROM dinspection_tbl WHERE pro_no_dt='" . $pro_no_dt . "' AND  curve_no_dt='" . $curve_no_dt . "'  AND  decal_pattern_dt='" . $decal_no_lpt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        } else {
            return 0;
        }
    }
    
    
        public function getDInspectionByJobNumber($pro_no_dt) {
        $la = array();
        $query = "SELECT SUM(pro_no_dt) As t FROM dinspection_tbl WHERE pro_no_dt='" . $pro_no_dt . "'  ";     
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        } else {
            return 0;
        }
    }
	
	public function getDecalInQtyByCurveNo($pro_no_dt, $curve_no_dt,$decal_no_lpt) {
        $la = array();
        $query = "SELECT SUM(item01_dt) As t FROM dinspection_tbl WHERE pro_no_dt='" . $pro_no_dt . "' AND  curve_no_dt='" . $curve_no_dt . "'  AND  decal_pattern_dt='" . $decal_no_lpt . "' and judgment_dt ='1'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        } else {
            return 0;
        }
    }

    public function getDInspectionById($id) {
        $la = array();
        $query = "SELECT*FROM dinspection_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_dt'], $rows['pro_no_dt'], $rows['lot_no_dt'], $rows['printing_qty_dt'], $rows['printing_lines_dt'], $rows['paper_size_dt'], $rows['printing_pattern_dt'], $rows['delivery_date_dt'], $rows['curve_no_dt'], $rows['decal_pattern_dt'], $rows['planned_qty_dt'], $rows['remain_qty_dt'], $rows['ref_id_dt'], $rows['register_dt'], $rows['line_dt'], $rows['pinhole_dt'], $rows['emboss_dt'], $rows['topcoat_dt'], $rows['dust_dt'], $rows['other_dt'], $rows['color_dt'], $rows['pinhole_repair_dt'], $rows['topcoat_repair_dt'], $rows['is_edit_dt'], $rows['judgment_dt'], $rows['remarks_dt'], $rows['item01_dt'], $rows['item02_dt'], $rows['item03_dt'], $rows['item04_dt'], $rows['item05_dt'], $rows['item06_dt'], $rows['item07_dt'], $rows['item08_dt'], $rows['item09_dt'], $rows['item10_dt'], $rows['org_name_dt'], $rows['org_date_dt'], $rows['org_time_dt']
                );
            }
            return $la;
        }
    }

    public function createNewDInspection(
    $id, $pattern_no_dt, $pro_no_dt, $lot_no_dt, $printing_qty_dt, $printing_lines_dt, $paper_size_dt, $printing_pattern_dt, $delivery_date_dt, $curve_no_dt, $decal_pattern_dt, $planned_qty_dt, $remain_qty_dt, $ref_id_dt, $register_dt, $line_dt, $pinhole_dt, $emboss_dt, $topcoat_dt, $dust_dt, $other_dt, $color_dt, $pinhole_repair_dt, $topcoat_repair_dt, $is_edit_dt, $judgment_dt, $remarks_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $item06_dt, $item07_dt, $item08_dt, $item09_dt, $item10_dt, $org_name_dt, $org_date_dt, $org_time_dt,$is_bs
    ) {



        $res = "INSERT INTO dinspection_tbl  SET
                    id='" . $id . "',
pattern_no_dt='" . $pattern_no_dt . "',
pro_no_dt='" . $pro_no_dt . "',
lot_no_dt='" . $lot_no_dt . "',
printing_qty_dt='" . $printing_qty_dt . "',
printing_lines_dt='" . $printing_lines_dt . "',
paper_size_dt='" . $paper_size_dt . "',
printing_pattern_dt='" . $printing_pattern_dt . "',
delivery_date_dt='" . $delivery_date_dt . "',
curve_no_dt='" . $curve_no_dt . "',
decal_pattern_dt='" . $decal_pattern_dt . "',
planned_qty_dt='" . $planned_qty_dt . "',
remain_qty_dt='" . $remain_qty_dt . "',
ref_id_dt='" . $ref_id_dt . "',
register_dt='" . $register_dt . "',
line_dt='" . $line_dt . "',
pinhole_dt='" . $pinhole_dt . "',
emboss_dt='" . $emboss_dt . "',
topcoat_dt='" . $topcoat_dt . "',
dust_dt='" . $dust_dt . "',
other_dt='" . $other_dt . "',
color_dt='" . $color_dt . "',
pinhole_repair_dt='" . $pinhole_repair_dt . "',
topcoat_repair_dt='" . $topcoat_repair_dt . "',
is_edit_dt='" . $is_edit_dt . "',
judgment_dt='" . $judgment_dt . "',
remarks_dt='" . $is_bs . "',
item01_dt='" . $item01_dt . "',
item02_dt='" . $item02_dt . "',
item03_dt='" . $item03_dt . "',
item04_dt='" . $item04_dt . "',
item05_dt='" . $item05_dt . "',
item06_dt='" . $item06_dt . "',
item07_dt='" . $item07_dt . "',
item08_dt='" . $item08_dt . "',
item09_dt='" . $item09_dt . "',
item10_dt='" . $item10_dt . "',
org_name_dt='" . $org_name_dt . "',
org_date_dt='" . $org_date_dt . "',
org_time_dt='" . $org_time_dt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
public function lotFinished(
    $id, $pattern_no_dt, $pro_no_dt, $lot_no_dt, $received_qty, $good_qty,$org_date_dt, $org_time_dt    ) {


        $res = "INSERT INTO tbl_lot_finished_data  SET
                    id='" . $id . "',
pro_no='" . $pro_no_dt . "',
pattern_no='" . $pattern_no_dt . "',
lot_no='" . $lot_no_dt . "',
received_qty='" . $received_qty . "',
good_qty='" . $good_qty . "',
complete_date='" . $org_date_dt . "',
complete_time='" . $org_time_dt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
	
	
	public function insData(
    $id, $design, $pro_no, $lot, $qty, $epf,$ins_date, $ins_time,$ins_type,$p_date  ) {



        $res = "INSERT INTO tbl_cut_ins_plan_ins_data  SET
                    id='" . $id . "',
pro_no='" . $pro_no . "',
design='" . $design . "',
lot='" . $lot . "',
qty='" . $qty . "',
epf='" . $epf . "',
ins_date='" . $ins_date . "',
ins_time='" . $ins_time . "',
ins_type='" . $ins_type . "',
p_date='" . $p_date . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
	
	public function insDataWith2nd(
    $id, $design, $pro_no, $lot, $fstqty,$sndqty, $epf,$ins_date, $ins_time,$ins_type,$p_date  ) {



        $res = "INSERT INTO tbl_cut_ins_plan_ins_data_with_2nd  SET
                    id='" . $id . "',
pro_no='" . $pro_no . "',
design='" . $design . "',
lot='" . $lot . "',
1st='" . $fstqty . "',
2nd='" . $sndqty . "',
epf='" . $epf . "',
ins_date='" . $ins_date . "',
ins_time='" . $ins_time . "',
ins_type='" . $ins_type . "',
p_date='" . $p_date . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
	
	public function insDataUnPlan($id, $design, $pro_no, $lot, $qty, $epf,$ins_date, $ins_time  ) {


	$unplan='UnPlanned';
	$ins_complete='0';
	$finalize='1';

        $res = "INSERT INTO tbl_cut_ins_planner_wise_data  SET
                    id='" . $id . "',
p_date='" . $ins_date . "',
ins='" . $epf . "',
s_type='" . $unplan . "',
design='" . $design . "',
qty='" . $qty . "',
priority='" . $unplan . "',
pro_no='" . $pro_no . "',
lot='" . $lot . "',
req_time='" . $unplan . "',
finalize='" . $finalize . "',
ins_complete='" . $ins_complete . "'

		       ";
			   
	

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
	
	
	public function updateInsComplete($pro_no)
        {
			
		$stauts='1';
		
        $res = "UPDATE tbl_cut_ins_planner_wise_data SET 
		ins_complete='" . $stauts . "'
        WHERE pro_no='" . $pro_no . "' ";   
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
      }
	
	
	
	
	
	
	public function completelot($pro_no_dt)
        {
			
		$stauts='1';
		$hre='ins';
		
        $res = "UPDATE layout_plans_tbl SET 
		item05_lpt='" . $stauts . "',
		item04_lpt='" . $hre . "'	
        WHERE pro_no_lpt='" . $pro_no_dt . "' ";   
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
      }
	





    public function updateDInspection(
    $id, $pattern_no_dt, $pro_no_dt, $lot_no_dt, $printing_qty_dt, $printing_lines_dt, $paper_size_dt, $printing_pattern_dt, $delivery_date_dt, $curve_no_dt, $decal_pattern_dt, $planned_qty_dt, $remain_qty_dt, $ref_id_dt, $register_dt, $line_dt, $pinhole_dt, $emboss_dt, $topcoat_dt, $dust_dt, $other_dt, $color_dt, $pinhole_repair_dt, $topcoat_repair_dt, $is_edit_dt, $judgment_dt, $remarks_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $item06_dt, $item07_dt, $item08_dt, $item09_dt, $item10_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {

        $res = mysql_query("UPDATE dinspection_tbl SET
        id='" . $id . "',
pattern_no_dt='" . $pattern_no_dt . "',
pro_no_dt='" . $pro_no_dt . "',
lot_no_dt='" . $lot_no_dt . "',
printing_qty_dt='" . $printing_qty_dt . "',
printing_lines_dt='" . $printing_lines_dt . "',
paper_size_dt='" . $paper_size_dt . "',
printing_pattern_dt='" . $printing_pattern_dt . "',
delivery_date_dt='" . $delivery_date_dt . "',
curve_no_dt='" . $curve_no_dt . "',
decal_pattern_dt='" . $decal_pattern_dt . "',
planned_qty_dt='" . $planned_qty_dt . "',
remain_qty_dt='" . $remain_qty_dt . "',
ref_id_dt='" . $ref_id_dt . "',
register_dt='" . $register_dt . "',
line_dt='" . $line_dt . "',
pinhole_dt='" . $pinhole_dt . "',
emboss_dt='" . $emboss_dt . "',
topcoat_dt='" . $topcoat_dt . "',
dust_dt='" . $dust_dt . "',
other_dt='" . $other_dt . "',
color_dt='" . $color_dt . "',
pinhole_repair_dt='" . $pinhole_repair_dt . "',
topcoat_repair_dt='" . $topcoat_repair_dt . "',
is_edit_dt='" . $is_edit_dt . "',
judgment_dt='" . $judgment_dt . "',
remarks_dt='" . $remarks_dt . "',
item01_dt='" . $item01_dt . "',
item02_dt='" . $item02_dt . "',
item03_dt='" . $item03_dt . "',
item04_dt='" . $item04_dt . "',
item05_dt='" . $item05_dt . "',
item06_dt='" . $item06_dt . "',
item07_dt='" . $item07_dt . "',
item08_dt='" . $item08_dt . "',
item09_dt='" . $item09_dt . "',
item10_dt='" . $item10_dt . "',
org_name_dt='" . $org_name_dt . "',
org_date_dt='" . $org_date_dt . "',
org_time_dt='" . $org_time_dt . "'


		WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteDInspection($id) {
        $query = "DELETE FROM dinspection_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:dinspection_view.php');
        }
    }

    public function getNextDInspectionRefNo($table, $suffix) {
       

	   $sql = "SELECT * FROM " . $table . " ORDER BY id DESC";
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $previous = $row['item02_dt'];

            $previous_n = substr($previous, strlen($suffix));
			$previous_n = $previous_n+1;
            
        } else {
            $previous = "0001";
        }
        return $suffix . $previous_n;
    }
	
	
	public function defectData(
    $id,$decal_no_dt, $pattern_no_dt, $pro_no_dt, $lot_no_dt, $curve_no_dt, $Good,$Register, $Top , $Dust , $Line , $Embose , $Pin , $Others , $org_date_dt , $org_time_dt    ) {


        $res = "INSERT INTO tbl_cut_ins_defect_data  SET
                    id='" . $id . "',
pattern_no_dt='" . $pattern_no_dt . "',
decal_no_dt='" . $decal_no_dt . "',
pro_no_dt='" . $pro_no_dt . "',
lot_no_dt='" . $lot_no_dt . "',
curve_no_dt='" . $curve_no_dt . "',
Good='" . $Good . "',
Register='" . $Register . "',
Top='" . $Top . "',
Dust='" . $Dust . "',
Line='" . $Line . "',
Embose='" . $Embose . "',
Pin='" . $Pin . "',
Others='" . $Others . "',
a_date='" . $org_date_dt . "',
a_time='" . $org_time_dt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

}

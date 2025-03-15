<?php

class PigmentMaster {

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

    public function getAllPigmentMaster() {
        $query = "SELECT * FROM pigment_master_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPigmentMasterByNo($pattern_pm) {
        $query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $pattern_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getNumberPigmentMasterByNo($pattern_pm) {
        $query = "SELECT COUNT(pattern_pm) As t FROM pigment_master_tbl WHERE pattern_pm='" . $pattern_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        $rows = $result->fetch_assoc();
        if ($num_result > 0) {
            return $rows['t'];
        }
    }
	
	 public function getremarks($pro,$design,$lot,$date_p,$str ) {
		 //print("SELECT*FROM virtual_planner_final_tbl_excel Where pro_no='".$pro."'  and  design='".$design."' and  lot='".$lot."' and  plan_date='".$date_p."' and  plan_colour='".$str."' limit 1  ");exit;
		 
		 
        $query = "SELECT remark FROM virtual_planner_final_tbl_excel Where pro_no='".$pro."'  and  design='".$design."' and  lot='".$lot."' and  plan_date='".$date_p."' and  plan_colour='".$str."'  limit 1  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        $rows = $result->fetch_assoc();
        if ($num_result > 0) {
            return $rows['remark'];
        }
    }
    
	
	public function getclose($pro,$design,$lot,$date_p,$str ) {
		 //print("SELECT*FROM virtual_planner_final_tbl_excel Where pro_no='".$pro."'  and  design='".$design."' and  lot='".$lot."' and  plan_date='".$date_p."' limit 1  ");exit;
		 
		 
        $query = "SELECT close FROM virtual_planner_final_tbl_excel Where pro_no='".$pro."'  and  design='".$design."' and  lot='".$lot."' and  plan_date='".$date_p."' and  plan_colour='".$str."' limit 1  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        $rows = $result->fetch_assoc();
        if ($num_result > 0) {
            return $rows['close'];
        }
    }


    public function getPigmentMasterByPrintingIndex($pattern_pm, $colours_pm) {
        $la = array();
        $query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $pattern_pm . "'   AND  colours_pm='" . $colours_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattern_pm'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return $la;
        }
    }

    public function getColoursIndexPigmentMasterByMeshNo($pattern_pm, $screen_mesh_pm) {
        $la = array();
        $query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $pattern_pm . "'   AND  screen_mesh_pm='" . $screen_mesh_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattern_pm'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return $la;
        }
    }

    public function getPigmentMasterByPrintingId($id) {
        $la = array();
        $query = "SELECT * FROM pigment_master_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattern_pm'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return $la;
        }
    }

    public function confirmPigmentMasterEntity($pattern_pm) {
        $res = "SELECT*FROM pigment_master_tbl WHERE pattern_pm = '" . $pattern_pm . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }
	
	public function getTempature($pattern_pm) {
		
        $query = "SELECT item01_pm FROM pigment_master_tbl WHERE pattern_pm = '" . $pattern_pm . "' group by pattern_pm  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        $rows = $result->fetch_assoc();
        if ($num_result > 0) {
            return $rows['item01_pm'];
        }
    }

    public function createNewPigmentMaster(
    $id, $ref_no_pm, $pattern_pm, $colours_pm, $colours_name_pm, $screen_mesh_pm, $colour_code_pm, $paper_size_pm, $print_paper_pm, $printing_way_pm, $body_pm, $decoration_pm, $market_pm, $layout_pm, $st_proof_pape_pm, $colour_qty_pm, $is_edit_pm, $item01_pm, $item02_pm, $item03_pm, $item04_pm, $item05_pm, $org_name_pm, $org_date_pm, $org_time_pm
    ) {



        $res = "INSERT INTO pigment_master_tbl  SET
                ref_no_pm='" . $ref_no_pm . "',
                pattern_pm='" . $pattern_pm . "',
                colours_pm='" . $colours_pm . "',
                colours_name_pm='" . $colours_name_pm . "',
                screen_mesh_pm='" . $screen_mesh_pm . "',
                colour_code_pm='" . $colour_code_pm . "',
                paper_size_pm='" . $paper_size_pm . "',
                print_paper_pm='" . $print_paper_pm . "',
                printing_way_pm='" . $printing_way_pm . "',
                body_pm='" . $body_pm . "',
                decoration_pm='" . $decoration_pm . "',
                market_pm='" . $market_pm . "',
                layout_pm='" . $layout_pm . "',
                st_proof_pape_pm='" . $st_proof_pape_pm . "',
                colour_qty_pm='" . $colour_qty_pm . "',
                is_edit_pm='" . $is_edit_pm . "',
                item01_pm='" . $item01_pm . "',
                item02_pm='" . $item02_pm . "',
                item03_pm='" . $item03_pm . "',
                item04_pm='" . $item04_pm . "',
                item05_pm='" . $item05_pm . "',
                org_name_pm='" . $org_name_pm . "',
                org_date_pm='" . $org_date_pm . "',
                org_time_pm='" . $org_time_pm . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentMaster(
    $id, $ref_no_pm, $pattern_pm, $colours_pm, $colours_name_pm, $screen_mesh_pm, $colour_code_pm, $paper_size_pm, $print_paper_pm, $printing_way_pm, $body_pm, $decoration_pm, $market_pm, $layout_pm, $st_proof_pape_pm, $colour_qty_pm, $is_edit_pm, $item01_pm, $item02_pm, $item03_pm, $item04_pm, $item05_pm, $org_name_pm, $org_date_pm, $org_time_pm
    ) {

//        $res = "UPDATE pigment_master_tbl SET
//                    ref_no_pm='" . $ref_no_pm . "',
//                pattern_pm='" . $pattern_pm . "',
//                colours_pm='" . $colours_pm . "',
//                colours_name_pm='" . $colours_name_pm . "',
//                screen_mesh_pm='" . $screen_mesh_pm . "',
//                colour_code_pm='" . $colour_code_pm . "',
//                paper_size_pm='" . $paper_size_pm . "',
//                print_paper_pm='" . $print_paper_pm . "',
//                printing_way_pm='" . $printing_way_pm . "',
//                body_pm='" . $body_pm . "',
//                decoration_pm='" . $decoration_pm . "',
//                market_pm='" . $market_pm . "',
//                layout_pm='" . $layout_pm . "',
//                st_proof_pape_pm='" . $st_proof_pape_pm . "',
//                colour_qty_pm='" . $colour_qty_pm . "',
//                is_edit_pm='" . $is_edit_pm . "',
//                item01_pm='" . $item01_pm . "',
//                item02_pm='" . $item02_pm . "',
//                item03_pm='" . $item03_pm . "',
//                item04_pm='" . $item04_pm . "',
//                item05_pm='" . $item05_pm . "',
//                org_name_pm='" . $org_name_pm . "',
//                org_date_pm='" . $org_date_pm . "',
//                org_time_pm='" . $org_time_pm . "'
//		WHERE id='" . $id . "' ";
        
        
        
          $res = "UPDATE pigment_master_tbl SET
                ref_no_pm='" . $ref_no_pm . "',
                pattern_pm='" . $pattern_pm . "',                
                paper_size_pm='" . $paper_size_pm . "',
                print_paper_pm='" . $print_paper_pm . "',
                printing_way_pm='" . $printing_way_pm . "',
                body_pm='" . $body_pm . "',
                decoration_pm='" . $decoration_pm . "',
                market_pm='" . $market_pm . "',
                layout_pm='" . $layout_pm . "',
                st_proof_pape_pm='" . $st_proof_pape_pm . "',               
                is_edit_pm='" . $is_edit_pm . "',
                item01_pm='" . $item01_pm . "',
                item02_pm='" . $item02_pm . "',
                item03_pm='" . $item03_pm . "',
                item04_pm='" . $item04_pm . "',
                item05_pm='" . $item05_pm . "',
                org_name_pm='" . $org_name_pm . "',
                org_date_pm='" . $org_date_pm . "',
                org_time_pm='" . $org_time_pm . "'
		WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
	
	
	public function updatePigmentMesh(
    $id,$screen_mesh_pm
    ) {

    
        
          $res = "UPDATE pigment_master_tbl SET
                screen_mesh_pm='" . $screen_mesh_pm . "' WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentMaster($id) {
        $pm = "DELETE FROM pigment_master_tbl WHERE pattern_pm='$id'";
        $od = "DELETE FROM oil_data_tbl WHERE pattern_no_odt='$id'";
        $co = "DELETE FROM colours_tbl WHERE pattern_no_ct='$id'";
        $pmad = "DELETE FROM pigment_model_tbl WHERE pattern_no_pmt='$id'";

        $result = $this->mysqli->query($pm);
        $result = $this->mysqli->query($od);
        $result = $this->mysqli->query($co);
        $result = $this->mysqli->query($pmad);
        if ($result) {
            header('location:pigment_master_data.php');
        }
    }

    public function getPigmentMasterByPn($pattern_pm) {
        $la = array();
        $query = "SELECT * FROM pigment_master_tbl WHERE pattern_pm='" . $pattern_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pm'], $rows['pattern_pm'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return la;
        }
    }

    public function getPigmentMasterByPatternNo() {
        $query = "SELECT pattern_pm FROM pigment_master_tbl group by  pattern_pm";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pattern_pm'] . "' >" . $rows['pattern_pm'] . "</option>");
            }
        }
    }

    public function getColoursNoeByPatternNo($pattern_pm) {
        $query = "SELECT colours_pm,colours_name_pm FROM pigment_master_tbl WHERE pattern_pm='" . $pattern_pm . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_pm'] . "," . $rows['colours_name_pm'] . "' >" . $rows['colours_pm'] . "-" . $rows['colours_name_pm'] . "</option>");
            }
        }
    }

    public function getNextPigmentMasterRefNo($table, $suffix) {
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

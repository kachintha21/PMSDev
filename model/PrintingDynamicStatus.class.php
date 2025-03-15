<?php

class PrintingDynamicStatus {

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

    public function getPrintingDynamicStatusByPrintingIndex($production_no_pst, $colours_pm) {
        $la = array();
        $query = "SELECT * FROM printing_dynamic_status_tbl WHERE production_no_pst='" . $production_no_pst . "'   AND  colours_pm='" . $colours_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pdst'], $rows['process_name_pdst'], $rows['machine_no_pdst'], $rows['pattern_no_pdst'], $rows['production_no_pdst'], $rows['lot_no_pdst'], $rows['num_sheets'], $rows['screen_mesh_pdst'], $rows['colour_index_pdst'], $rows['colour_name_pdst'], $rows['plan_qty_pdst'], $rows['plan_date_pdst'], $rows['plan_time_pdst'], $rows['actual_qty_pdst'], $rows['actual_date_pdst'], $rows['actual_time_pdst'], $rows['revised_pland_pdst'], $rows['item01_pdst'], $rows['item02_pdst'], $rows['item03_pdst'], $rows['item04_pdst'], $rows['item05_pdst'], $rows['item06_pdst'], $rows['item07_pdst'], $rows['item08_pdst'], $rows['item09_pdst'], $rows['item10_pdst'], $rows['org_name_psdt'], $rows['org_date_psdt'], $rows['org_time_psdt']
                );
            }
            return $la;
        }
    }
    
    public function getPrintingDynamicStatusByPrintingIndexByRef($id) {
        $la = array();
        $query = "SELECT * FROM printing_dynamic_status_tbl WHERE process_name_pdst='" . $id . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
           
            return $num_result;
        }else{
              return '0';
            
        }
    }
    
    

    public function getPrintingDynamicStatusByPrintingId($id) {
        $la = array();
        $query = "SELECT * FROM printing_dynamic_status_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pdst'], $rows['process_name_pdst'], $rows['machine_no_pdst'], $rows['pattern_no_pdst'], $rows['production_no_pdst'], $rows['lot_no_pdst'], $rows['num_sheets'], $rows['screen_mesh_pdst'], $rows['colour_index_pdst'], $rows['colour_name_pdst'], $rows['plan_qty_pdst'], $rows['plan_date_pdst'], $rows['plan_time_pdst'], $rows['actual_qty_pdst'], $rows['actual_date_pdst'], $rows['actual_time_pdst'], $rows['revised_pland_pdst'], $rows['item01_pdst'], $rows['item02_pdst'], $rows['item03_pdst'], $rows['item04_pdst'], $rows['item05_pdst'], $rows['item06_pdst'], $rows['item07_pdst'], $rows['item08_pdst'], $rows['item09_pdst'], $rows['item10_pdst'], $rows['org_name_psdt'], $rows['org_date_psdt'], $rows['org_time_psdt']
                );
            }
            return $la;
        }
    }

    public function confirmPrintingDynamicStatusEntity($production_no_pst) {
        $res = "SELECT*FROM printing_dynamic_status_tbl WHERE production_no_pst = '" . $production_no_pst . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPrintingDynamicStatus(
    $id, $ref_no_pdst, $process_name_pdst, $machine_no_pdst, $pattern_no_pdst, $production_no_pdst, $lot_no_pdst, $num_sheets, $screen_mesh_pdst, $colour_index_pdst, $colour_name_pdst, $plan_qty_pdst, $plan_date_pdst, $plan_time_pdst, $actual_qty_pdst, $actual_date_pdst, $actual_time_pdst, $revised_pland_pdst, $item01_pdst, $item02_pdst, $item03_pdst, $item04_pdst, $item05_pdst, $item06_pdst, $item07_pdst, $item08_pdst, $item09_pdst, $item10_pdst, $org_name_psdt, $org_date_psdt, $org_time_psdt
    ) {



        $res = "INSERT INTO printing_dynamic_status_tbl  SET
id='" . $id . "',			
ref_no_pdst ='" . $ref_no_pdst . "',			
process_name_pdst ='" . $process_name_pdst . "',			
machine_no_pdst ='" . $machine_no_pdst . "',			
pattern_no_pdst ='" . $pattern_no_pdst . "',			
production_no_pdst ='" . $production_no_pdst . "',			
lot_no_pdst ='" . $lot_no_pdst . "',			
num_sheets ='" . $num_sheets . "',			
screen_mesh_pdst ='" . $screen_mesh_pdst . "',			
colour_index_pdst ='" . $colour_index_pdst . "',			
colour_name_pdst ='" . $colour_name_pdst . "',			
plan_qty_pdst ='" . $plan_qty_pdst . "',			
plan_date_pdst ='" . $plan_date_pdst . "',			
plan_time_pdst ='" . $plan_time_pdst . "',			
actual_qty_pdst ='" . $actual_qty_pdst . "',			
actual_date_pdst ='" . $actual_date_pdst . "',			
actual_time_pdst ='" . $actual_time_pdst . "',			
revised_pland_pdst ='" . $revised_pland_pdst . "',			
item01_pdst ='" . $item01_pdst . "',			
item02_pdst ='" . $item02_pdst . "',			
item03_pdst ='" . $item03_pdst . "',			
item04_pdst ='" . $item04_pdst . "',			
item05_pdst ='" . $item05_pdst . "',			
item06_pdst ='" . $item06_pdst . "',			
item07_pdst ='" . $item07_pdst . "',			
item08_pdst ='" . $item08_pdst . "',			
item09_pdst ='" . $item09_pdst . "',			
item10_pdst ='" . $item10_pdst . "',			
org_name_psdt ='" . $org_name_psdt . "',			
org_date_psdt ='" . $org_date_psdt . "',			
org_time_psdt ='" . $org_time_psdt . "'		


		       ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

        public function updatePrintingDynamicStatusByNew(
        $id, $item07_pdst
        ) {

        $res = "UPDATE printing_dynamic_status_tbl SET		
        item07_pdst ='" . $item07_pdst . "'		
	WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
    
    
        public function updatePrintingDynamicStatus(
    $id, $ref_no_pdst, $process_name_pdst, $machine_no_pdst, $pattern_no_pdst, $production_no_pdst, $lot_no_pdst, $num_sheets, $screen_mesh_pdst, $colour_index_pdst, $colour_name_pdst, $plan_qty_pdst, $plan_date_pdst, $plan_time_pdst, $actual_qty_pdst, $actual_date_pdst, $actual_time_pdst, $revised_pland_pdst, $item01_pdst, $item02_pdst, $item03_pdst, $item04_pdst, $item05_pdst, $item06_pdst, $item07_pdst, $item08_pdst, $item09_pdst, $item10_pdst, $org_name_psdt, $org_date_psdt, $org_time_psdt
    ) {

        


        $res = "UPDATE printing_dynamic_status_tbl SET		
        actual_date_pdst ='" . $actual_date_pdst . "',			
        actual_time_pdst ='" . $actual_time_pdst . "',	
        item10_pdst ='" . $item10_pdst . "'		
	WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
    
    

    public function deletePrintingDynamicStatus($id) {
        $query = "DELETE FROM printing_dynamic_status_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:pigment_master_data.php');
        }
    }
    
    
    public function deletePrintingDynamicStatusByID($id) {
        $query = "DELETE FROM printing_dynamic_status_tbl WHERE process_name_pdst='$id'";
        $result = $this->mysqli->query($query);
           return true;
    }
    

    public function getPrintingDynamicStatusByPn($production_no_pst) {
        $la = array();
        $query = "SELECT * FROM printing_dynamic_status_tbl WHERE production_no_pst='" . $production_no_pst . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pm'], $rows['production_no_pst'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return la;
        }
    }

    public function getPrintingDynamicStatus($pattern_no_pt, $lc) {

        switch ($lc) {
            case '1':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro01_pst='1'  GROUP BY production_no_pst    ";
                break;


            case '2':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro02_pst='1'  GROUP BY production_no_pst    ";
                break;


            case '3':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro03_pst='1'  GROUP BY production_no_pst    ";
                break;


            case '4':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro04_pst='1' AND colour_index_pst!='T01' AND colour_index_pst!='T02'	  GROUP BY production_no_pst    ";
                break;





            case '5':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro05_pst='1'  GROUP BY production_no_pst    ";
                break;


            case '6':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro06_pst='1'  GROUP BY production_no_pst    ";
                break;


            case '7':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro07_pst='1'  GROUP BY production_no_pst    ";
                break;

            case '8':
                $query = "SELECT production_no_pst FROM printing_dynamic_status_tbl WHERE pro08_pst='1'  GROUP BY production_no_pst    ";
                break;
        }

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['production_no_pst'] . "' >" . $rows['production_no_pst'] . "</option>");
            }
        }
    }

    public function getPrintingDynamicStatusColourIndexById($pattern_no_pt, $lc) {

        switch ($lc) {

            case '1':
                $query = "SELECT colour_index_pst FROM printing_dynamic_status_tbl WHERE pro01_pst='1' AND production_no_pst='" . $pattern_no_pt . "'  GROUP BY colour_index_pst   ";
                break;


            case '2':
                $query = "SELECT colour_index_pst FROM printing_dynamic_status_tbl WHERE pro02_pst='1' AND production_no_pst='" . $pattern_no_pt . "' GROUP BY colour_index_pst     ";
                break;


            case '3':
                $query = "SELECT colour_index_pst FROM printing_dynamic_status_tbl WHERE pro03_pst='1' AND production_no_pst='" . $pattern_no_pt . "'   GROUP BY colour_index_pst    ";
                break;




            case '4':
                $query = "SELECT colour_index_pst FROM printing_dynamic_status_tbl WHERE pro04_pst='1' AND production_no_pst='" . $pattern_no_pt . "' AND colour_index_pst!='T01' AND  colour_index_pst!='T02'   GROUP BY colour_index_pst   ";
                break;


            case '5':
                $query = "SELECT colour_index_pst FROM printing_dynamic_status_tbl WHERE pro06_pst='1' AND production_no_pst='" . $pattern_no_pt . "' AND colour_index_pst='T01' OR  colour_index_pst='T02'   GROUP BY colour_index_pst   ";
                break;
        }


        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colour_index_pst'] . "' >" . $rows['colour_index_pst'] . "</option>");
            }
        }
    }

    public function getPrintingDynamicStatusScreenMeshById($pattern_no_pt, $lc) {

        switch ($lc) {

            case '1':
                $query = "SELECT screen_mesh_pst FROM printing_dynamic_status_tbl WHERE pro01_pst='1' AND production_no_pst='" . $pattern_no_pt . "'  GROUP BY screen_mesh_pst     ";
                break;


            case '2':
                $query = "SELECT screen_mesh_pst FROM printing_dynamic_status_tbl WHERE pro02_pst='1' AND production_no_pst='" . $pattern_no_pt . "'  GROUP BY screen_mesh_pst      ";
                break;


            case '3':
                $query = "SELECT screen_mesh_pst FROM printing_dynamic_status_tbl WHERE pro03_pst='1' AND production_no_pst='" . $pattern_no_pt . "'   GROUP BY screen_mesh_pst     ";
                break;
        }



        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['screen_mesh_pst'] . "' >" . $rows['screen_mesh_pst'] . "</option>");
            }
        }
    }

    public function getNextPrintingDynamicStatusRefNo($table, $suffix) {
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

    public function updatePrintingDynamicStatusById(
    $production_no_pt, $pattern_no_pt, $index, $lc
    ) {

        switch ($lc) {
            case '1':
                $res = "UPDATE printing_dynamic_status_tbl SET
            pro01_pst='0',
            pro02_pst='1'        
            WHERE production_no_pst='" . $production_no_pt . "'  AND
            pattern_no_pst='" . $pattern_no_pt . "'  AND
            colour_index_pst='" . $index . "'  ";
                break;



            case '2':
                $res = "UPDATE printing_dynamic_status_tbl SET
             pro02_pst='0',
             pro03_pst='1'        
             WHERE production_no_pst='" . $production_no_pt . "'  AND
             pattern_no_pst='" . $pattern_no_pt . "'  AND
             colour_index_pst='" . $index . "'  ";
                break;


            case '3':
                $res = "UPDATE printing_dynamic_status_tbl SET
                 pro03_pst='0',
                 pro04_pst='1'        
                 WHERE production_no_pst='" . $production_no_pt . "'  AND
                 pattern_no_pst='" . $pattern_no_pt . "'  AND
                 screen_mesh_pst='" . $index . "'  ";
                break;



            case '4':
                $res = "UPDATE printing_dynamic_status_tbl SET
                     pro04_pst='0',
                     pro05_pst='1'        
                     WHERE production_no_pst='" . $production_no_pt . "'  AND
                     pattern_no_pst='" . $pattern_no_pt . "'  AND
                     colour_index_pst='" . $index . "'  ";
                break;




            case '6':
                $res = "UPDATE printing_dynamic_status_tbl SET
                     pro06_pst='0',
                     pro07_pst='1'        
                     WHERE production_no_pst='" . $production_no_pt . "'  AND
                     pattern_no_pst='" . $pattern_no_pt . "'  AND
                     colour_index_pst='" . $index . "'  ";
                break;
        }



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrintingDynamicStatusBymultiple(
    $production_no_pt, $pattern_no_pt, $index, $lc
    ) {


        switch ($lc) {

            case '1':
                $sql = "SELECT id FROM printing_dynamic_status_tbl  WHERE production_no_pst='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE printing_dynamic_status_tbl SET
                pro02_pst='0',
                pro03_pst='1'           
                WHERE id='" . $id . "'   ";
                    $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
                break;


            case '2':
                $sql = "SELECT id FROM printing_dynamic_status_tbl  WHERE production_no_pst='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE printing_dynamic_status_tbl SET
                pro05_pst='0',
                pro04_pst='0',
                pro06_pst='" . $index . "'           
                WHERE id='" . $id . "'   ";
                    $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
                break;

            case '3':
                $sql = "SELECT id FROM printing_dynamic_status_tbl  WHERE production_no_pst='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE printing_dynamic_status_tbl SET           
                pro06_pst='0',
                pro07_pst='" . $index . "'           
                WHERE id='" . $id . "'   ";
                    $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
                break;



            case '4':
                $sql = "SELECT id FROM printing_dynamic_status_tbl  WHERE production_no_pst='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE printing_dynamic_status_tbl SET           
                pro07_pst='0',
                pro08_pst='" . $index . "'           
                WHERE id='" . $id . "'   ";
                    $result = $this->mysqli->query($upate_res);
                }
                if ($result) {
                    return true;
                }
                break;
        }
    }

}

<?php

class PigmentPlan {

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

    public function getPigmentPlanByPrintingIndex($pro_no_ppt, $colours_pm) {
        $la = array();
        $query = "SELECT * FROM pigment_plan_tbl WHERE pro_no_ppt='" . $pro_no_ppt . "'   AND  colours_pm='" . $colours_pm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ppt'], $rows['changeover_ppt'], $rows['required_date_ppt'], $rows['pro_no_ppt'], $rows['design_ppt'], $rows['lot_ppt'], $rows['total_sheets_ppt'], $rows['colors_ppt'], $rows['plan_colors_ppt'], $rows['status_ppt'], $rows['actual_ppt'], $rows['item01_ppt'], $rows['item02_ppt'], $rows['item03_ppt'], $rows['item04_ppt'], $rows['item05_ppt'], $rows['org_name_ppt'], $rows['org_date_ppt'], $rows['org_time_ppt']
                );
            }
            return $la;
        }
    }

    public function getPigmentPlanByPrintingId($id) {
        $la = array();
        $query = "SELECT * FROM pigment_plan_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ppt'], $rows['changeover_ppt'], $rows['required_date_ppt'], $rows['pro_no_ppt'], $rows['design_ppt'], $rows['lot_ppt'], $rows['total_sheets_ppt'], $rows['colors_ppt'], $rows['plan_colors_ppt'], $rows['status_ppt'], $rows['actual_ppt'], $rows['item01_ppt'], $rows['item02_ppt'], $rows['item03_ppt'], $rows['item04_ppt'], $rows['item05_ppt'], $rows['org_name_ppt'], $rows['org_date_ppt'], $rows['org_time_ppt']
                );
            }
            return $la;
        }
    }

    public function confirmPigmentPlanEntity($pro_no_ppt) {
        $res = "SELECT*FROM pigment_plan_tbl WHERE pro_no_ppt = '" . $pro_no_ppt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentPlan(
    $id, $ref_no_ppt, $changeover_ppt, $required_date_ppt, $pro_no_ppt, $design_ppt, $lot_ppt, $total_sheets_ppt, $colors_ppt, $plan_colors_ppt, $status_ppt, $actual_ppt, $item01_ppt, $item02_ppt, $item03_ppt, $item04_ppt, $item05_ppt, $org_name_ppt, $org_date_ppt, $org_time_ppt
    ) {

        $res = "INSERT INTO pigment_plan_tbl  SET
id='" . $id . "',			
ref_no_ppt='" . $ref_no_ppt . "',
changeover_ppt='" . $changeover_ppt . "',
required_date_ppt='" . $required_date_ppt . "',
pro_no_ppt='" . $pro_no_ppt . "',
design_ppt='" . $design_ppt . "',
lot_ppt='" . $lot_ppt . "',
total_sheets_ppt='" . $total_sheets_ppt . "',
colors_ppt='" . $colors_ppt . "',
plan_colors_ppt='" . $plan_colors_ppt . "',
status_ppt='" . $status_ppt . "',
actual_ppt='" . $actual_ppt . "',
item01_ppt='" . $item01_ppt . "',
item02_ppt='" . $item02_ppt . "',
item03_ppt='" . $item03_ppt . "',
item04_ppt='" . $item04_ppt . "',
item05_ppt='" . $item05_ppt . "',
org_name_ppt='" . $org_name_ppt . "',
org_date_ppt='" . $org_date_ppt . "',
org_time_ppt='" . $org_time_ppt . "'


		       ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentPlan(
    $id, $ref_no_ppt, $changeover_ppt, $required_date_ppt, $pro_no_ppt, $design_ppt, $lot_ppt, $total_sheets_ppt, $colors_ppt, $plan_colors_ppt, $status_ppt, $actual_ppt, $item01_ppt, $item02_ppt, $item03_ppt, $item04_ppt, $item05_ppt, $org_name_ppt, $org_date_ppt, $org_time_ppt
    ) {

//
//               $res = "UPDATE pigment_plan_tbl SET		
// id='" . $id . "',			
//ref_no_ppt='" . $ref_no_ppt . "',
//changeover_ppt='" . $changeover_ppt . "',
//required_date_ppt='" . $required_date_ppt . "',
//pro_no_ppt='" . $pro_no_ppt . "',
//design_ppt='" . $design_ppt . "',
//lot_ppt='" . $lot_ppt . "',
//total_sheets_ppt='" . $total_sheets_ppt . "',
//colors_ppt='" . $colors_ppt . "',
//plan_colors_ppt='" . $plan_colors_ppt . "',
//status_ppt='" . $status_ppt . "',
//actual_ppt='" . $actual_ppt . "',
//item01_ppt='" . $item01_ppt . "',
//item02_ppt='" . $item02_ppt . "',
//item03_ppt='" . $item03_ppt . "',
//item04_ppt='" . $item04_ppt . "',
//item05_ppt='" . $item05_ppt . "',
//org_name_ppt='" . $org_name_ppt . "',
//org_date_ppt='" . $org_date_ppt . "',
//org_time_ppt='" . $org_time_ppt . "',
//		
//	WHERE id='" . $id . "' ";


        $res = "UPDATE pigment_plan_tbl SET		
status_ppt='" . $status_ppt . "',
org_date_ppt='" . $org_date_ppt . "',
org_time_ppt='" . $org_time_ppt . "'
		
	WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentPlan($id) {
        $query = "DELETE FROM pigment_plan_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:pigment_master_data.php');
        }
    }
    
      public function deletePigmentPlanByRef($id) {
        $query = "DELETE FROM pigment_plan_tbl WHERE item05_ppt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getPigmentPlanByPn($pro_no_ppt) {
        $la = array();
        $query = "SELECT * FROM pigment_plan_tbl WHERE pro_no_ppt='" . $pro_no_ppt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_pm'], $rows['pro_no_ppt'], $rows['colours_pm'], $rows['colours_name_pm'], $rows['screen_mesh_pm'], $rows['colour_code_pm'], $rows['paper_size_pm'], $rows['print_paper_pm'], $rows['printing_way_pm'], $rows['body_pm'], $rows['decoration_pm'], $rows['market_pm'], $rows['layout_pm'], $rows['st_proof_pape_pm'], $rows['colour_qty_pm'], $rows['is_edit_pm'], $rows['item01_pm'], $rows['item02_pm'], $rows['item03_pm'], $rows['item04_pm'], $rows['item05_pm'], $rows['org_name_pm'], $rows['org_date_pm'], $rows['org_time_pm']
                );
            }
            return la;
        }
    }

    public function getPigmentPlan($pattern_no_pt, $lc) {

        switch ($lc) {
            case '1':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro01_pst='1'  GROUP BY pro_no_ppt    ";
                break;


            case '2':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro02_pst='1'  GROUP BY pro_no_ppt    ";
                break;


            case '3':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro03_pst='1'  GROUP BY pro_no_ppt    ";
                break;


            case '4':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro04_pst='1' AND colour_index_pst!='T01' AND colour_index_pst!='T02'	  GROUP BY pro_no_ppt    ";
                break;





            case '5':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro05_pst='1'  GROUP BY pro_no_ppt    ";
                break;


            case '6':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro06_pst='1'  GROUP BY pro_no_ppt    ";
                break;


            case '7':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro07_pst='1'  GROUP BY pro_no_ppt    ";
                break;

            case '8':
                $query = "SELECT pro_no_ppt FROM pigment_plan_tbl WHERE pro08_pst='1'  GROUP BY pro_no_ppt    ";
                break;
        }

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pro_no_ppt'] . "' >" . $rows['pro_no_ppt'] . "</option>");
            }
        }
    }

    public function getPigmentPlanColourIndexById($pattern_no_pt, $lc) {

        switch ($lc) {

            case '1':
                $query = "SELECT colour_index_pst FROM pigment_plan_tbl WHERE pro01_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "'  GROUP BY colour_index_pst   ";
                break;


            case '2':
                $query = "SELECT colour_index_pst FROM pigment_plan_tbl WHERE pro02_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "' GROUP BY colour_index_pst     ";
                break;


            case '3':
                $query = "SELECT colour_index_pst FROM pigment_plan_tbl WHERE pro03_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "'   GROUP BY colour_index_pst    ";
                break;




            case '4':
                $query = "SELECT colour_index_pst FROM pigment_plan_tbl WHERE pro04_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "' AND colour_index_pst!='T01' AND  colour_index_pst!='T02'   GROUP BY colour_index_pst   ";
                break;


            case '5':
                $query = "SELECT colour_index_pst FROM pigment_plan_tbl WHERE pro06_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "' AND colour_index_pst='T01' OR  colour_index_pst='T02'   GROUP BY colour_index_pst   ";
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

    public function getPigmentPlanScreenMeshById($pattern_no_pt, $lc) {

        switch ($lc) {

            case '1':
                $query = "SELECT screen_mesh_pst FROM pigment_plan_tbl WHERE pro01_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "'  GROUP BY screen_mesh_pst     ";
                break;


            case '2':
                $query = "SELECT screen_mesh_pst FROM pigment_plan_tbl WHERE pro02_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "'  GROUP BY screen_mesh_pst      ";
                break;


            case '3':
                $query = "SELECT screen_mesh_pst FROM pigment_plan_tbl WHERE pro03_pst='1' AND pro_no_ppt='" . $pattern_no_pt . "'   GROUP BY screen_mesh_pst     ";
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

    public function getNextPigmentPlanRefNo($table, $suffix) {
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

    public function updatePigmentPlanById(
    $production_no_pt, $pattern_no_pt, $index, $lc
    ) {

        switch ($lc) {
            case '1':
                $res = "UPDATE pigment_plan_tbl SET
            pro01_pst='0',
            pro02_pst='1'        
            WHERE pro_no_ppt='" . $production_no_pt . "'  AND
            pattern_no_pst='" . $pattern_no_pt . "'  AND
            colour_index_pst='" . $index . "'  ";
                break;



            case '2':
                $res = "UPDATE pigment_plan_tbl SET
             pro02_pst='0',
             pro03_pst='1'        
             WHERE pro_no_ppt='" . $production_no_pt . "'  AND
             pattern_no_pst='" . $pattern_no_pt . "'  AND
             colour_index_pst='" . $index . "'  ";
                break;


            case '3':
                $res = "UPDATE pigment_plan_tbl SET
                 pro03_pst='0',
                 pro04_pst='1'        
                 WHERE pro_no_ppt='" . $production_no_pt . "'  AND
                 pattern_no_pst='" . $pattern_no_pt . "'  AND
                 screen_mesh_pst='" . $index . "'  ";
                break;



            case '4':
                $res = "UPDATE pigment_plan_tbl SET
                     pro04_pst='0',
                     pro05_pst='1'        
                     WHERE pro_no_ppt='" . $production_no_pt . "'  AND
                     pattern_no_pst='" . $pattern_no_pt . "'  AND
                     colour_index_pst='" . $index . "'  ";
                break;




            case '6':
                $res = "UPDATE pigment_plan_tbl SET
                     pro06_pst='0',
                     pro07_pst='1'        
                     WHERE pro_no_ppt='" . $production_no_pt . "'  AND
                     pattern_no_pst='" . $pattern_no_pt . "'  AND
                     colour_index_pst='" . $index . "'  ";
                break;
        }



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentPlanBymultiple(
    $production_no_pt, $pattern_no_pt, $index, $lc
    ) {


        switch ($lc) {

            case '1':
                $sql = "SELECT id FROM pigment_plan_tbl  WHERE pro_no_ppt='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE pigment_plan_tbl SET
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
                $sql = "SELECT id FROM pigment_plan_tbl  WHERE pro_no_ppt='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE pigment_plan_tbl SET
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
                $sql = "SELECT id FROM pigment_plan_tbl  WHERE pro_no_ppt='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE pigment_plan_tbl SET           
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
                $sql = "SELECT id FROM pigment_plan_tbl  WHERE pro_no_ppt='" . $production_no_pt . "'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $id = $rows['id'];
                    $upate_res = "UPDATE pigment_plan_tbl SET           
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

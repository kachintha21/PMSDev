<?php

class CurveMaster {

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

    public function getAllCurveMaster() {
        $query = "SELECT * FROM curve_master_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getCurveAreaById($id) {
        $la = array();
        $query = "SELECT * FROM curve_master_tbl WHERE id='" . $id . "' ";
        echo($query);
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
               array_push($la, $rows['id'], $rows['decal_design_no_cmt'], $rows['curve_no_cmt'], $rows['fg_design_no_cmt'], $rows['curve_area_cmt'], $rows['is_edit_cmt'], $rows['org_date_cmt'], $rows['org_time_cmt']
                );
            }
            return $la;
        }
    }


    public function CheckCurveByRefNo($fg_design_no_cmt,$curve_no_cmt) {
        $query = " SELECT curve_area_cmt FROM curve_master_tbl WHERE fg_design_no_cmt='" . $fg_design_no_cmt . "'  AND curve_no_cmt='" . $curve_no_cmt . "' ";
   $result = $this->mysqli->query($query);
   $num_result = $result->num_rows;
   if ($num_result > 0) {
       while ($rows = $result->fetch_assoc()) {
           return 'OK';
       }
   } else {
       return  '-';
   }
}



    public function getCurveAreaByRefNo($fg_design_no_cmt, $curve_no_cmt) {
        $query = " SELECT curve_area_cmt FROM curve_master_tbl WHERE fg_design_no_cmt='" . $fg_design_no_cmt . "'  AND curve_no_cmt='" . $curve_no_cmt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['curve_area_cmt'];
            }
        } else {
            return "-";
        }
    }
    
        public function getFgDesignByDecalDesign($id) {
        $query = " SELECT fg_deign_gct FROM curve_master_tbl WHERE decal_design_no_cmt='" . $id . "' LIMIT 1 ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['fg_deign_gct'];
            }
        } else {
            return $id;
        }
    }

    public function getCurveAreaByDecal($fg_design_no_cmt, $curve_no_cmt) {
        $query = " SELECT curve_area_cmt FROM curve_master_tbl WHERE decal_design_no_cmt='" . $fg_design_no_cmt . "'  AND curve_no_cmt='" . $curve_no_cmt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['curve_area_cmt'];
            }
        } else {
            return "-";
        }
    }

    public function getDecalNumberByRefNo($fg_design_no_cmt, $curve_no_cmt) {
        $query = " SELECT decal_design_no_cmt FROM curve_master_tbl WHERE fg_design_no_cmt='" . $fg_design_no_cmt . "'  AND curve_no_cmt='" . $curve_no_cmt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['decal_design_no_cmt'];
            }
        } else {
            return "-";
        }
    }
    
    
      public function getFGPatternByRef($decal_design_no_cmt, $curve_no_cmt) {
        $query = " SELECT fg_design_no_cmt FROM curve_master_tbl WHERE decal_design_no_cmt='" . $decal_design_no_cmt . "'  AND curve_no_cmt='" . $curve_no_cmt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['fg_design_no_cmt'];
            }
        } else {
            return "Update-curvemaster ";
        }
    }
	
	
	 public function getFGPatternByRefFG($decal_design_no_cmt, $fg_design_no_cmt) {
        $query = " SELECT curve_no_cmt as curve_no_cmt  FROM curve_master_tbl WHERE decal_design_no_cmt='" . $decal_design_no_cmt . "'  AND fg_design_no_cmt='" . $fg_design_no_cmt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['curve_no_cmt'];
            }
        } else {
            return "Update-curvemaster ";
        }
    }

    public function confirmCurveMasterEntity($curve_no_cmt) {
        $res = "SELECT*FROM curve_master_tbl WHERE curve_no_cmt = '" . $curve_no_cmt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewCurveMaster(
    $id, $fg_design_no_cmt, $curve_no_cmt, $decal_design_no_cmt, $curve_area_cmt, $is_edit_cmt, $org_date_cmt, $org_time_cmt
    ) {



        $res = "INSERT INTO curve_master_tbl  SET
                           fg_design_no_cmt='" . $fg_design_no_cmt . "',
                            curve_no_cmt='" . $curve_no_cmt . "',
                            decal_design_no_cmt='" . $decal_design_no_cmt . "',
                            curve_area_cmt='" . $curve_area_cmt . "',
                            is_edit_cmt='" . $is_edit_cmt . "',
                            org_date_cmt='" . $org_date_cmt . "',
                            org_time_cmt='" . $org_time_cmt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateCurveMaster(
    $id, $fg_design_no_cmt, $curve_no_cmt, $decal_design_no_cmt, $curve_area_cmt, $is_edit_cmt, $org_date_cmt, $org_time_cmt
    ) {

        $res = "UPDATE curve_master_tbl SET
		            fg_design_no_cmt='" . $fg_design_no_cmt . "',
                            curve_no_cmt='" . $curve_no_cmt . "',
                            decal_design_no_cmt='" . $decal_design_no_cmt . "',
                            curve_area_cmt='" . $curve_area_cmt . "',
                            is_edit_cmt='" . $is_edit_cmt . "',
                            org_date_cmt='" . $org_date_cmt . "',
                            org_time_cmt='" . $org_time_cmt . "'
		            WHERE id='" . $id . "' ";
        
       

     
               $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteCurveMaster($id) {
        $query = "DELETE FROM curve_master_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:curve_view.php');
        }
    }

    public function getCurveMasterAeraById($id) {
        $query = "SELECT silver_area_dt FROM curve_master_tbl WHERE curve_no_cmt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextCurveMasterRefNo($table, $suffix) {
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

    public function printCurveMasterByFg($pattern_no_pt) {
        $query = "SELECT curve_no_cmt FROM curve_master_tbl WHERE  fg_design_no_cmt='" . $pattern_no_pt . "' ";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['curve_no_cmt'] . "' >" . $rows['curve_no_cmt'] . "</option>");
            }
        }
    }

    public function printDecalMasterByFg($pattern_no_pt) {
        $query = "SELECT decal_design_no_cmt FROM curve_master_tbl WHERE  fg_design_no_cmt='" . $pattern_no_pt . "' GROUP By decal_design_no_cmt ";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['decal_design_no_cmt'] . "' >" . $rows['decal_design_no_cmt'] . "</option>");
            }
        }
    }

}

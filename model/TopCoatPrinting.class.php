<?php

class TopCoatPrinting {

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

    public function getAllTopCoatPrinting() {
        $query = "SELECT * FROM top_coat_printing_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }
    
    
       public function getWipTopCoatPrinting() {
        $query = "SELECT pro06_pst FROM printing_status_tbl WHERE pro06_pst='1'   GROUP BY   ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
          
      
        
    }
    
  

    public function getDailyOutPutQtyTopCoatPrinting($date) {
        $query = "SELECT org_date_tcpt FROM top_coat_printing_tbl WHERE org_date_tcpt='" . $date . "'  GROUP BY  lot_no_tcpt   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        } 
        
        
    }
    

    public function getPlanedQtyByNo($id) {
        $la = array();
        $query = "SELECT*FROM planed_qty_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_tcpt'], $rows['pattern_no_tcpt'], $rows['lot_no_tcpt'], $rows['screen_mesh_tcpt'], $rows['colours_index_tcpt'], $rows['machine_no_tcpt'], $rows['judgment_tcpt'], $rows['is_edit_tcpt'], $rows['item01_tcpt'], $rows['item02_tcpt'], $rows['item03_tcpt'], $rows['item04_tcpt'], $rows['item05_tcpt'], $rows['org_name_tcpt'], $rows['org_date_tcpt'], $rows['org_time_tcpt']
                );
            }
            return $la;
        }
    }

    public function getTopCoatPrintingByNo($curve_no_ymt) {
        $query = "SELECT * FROM top_coat_printing_tbl WHERE curve_no_ymt='" . $curve_no_ymt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getDecalNumberByRefNo($fg_design_no_ymt, $curve_no_ymt) {
        $query = " SELECT decal_design_no_ymt FROM top_coat_printing_tbl WHERE fg_design_no_ymt='" . $fg_design_no_ymt . "'  AND curve_no_ymt='" . $curve_no_ymt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['decal_design_no_ymt'];
            }
        } else {
            return "-";
        }
    }

    public function confirmTopCoatPrintingEntity($curve_no_ymt) {
        $res = "SELECT*FROM top_coat_printing_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewTopCoatPrinting(
    $id, $pro_no_tcpt, $pattern_no_tcpt, $lot_no_tcpt, $screen_mesh_tcpt, $colours_index_tcpt, $machine_no_tcpt, $judgment_tcpt, $is_edit_tcpt, $item01_tcpt, $item02_tcpt, $item03_tcpt, $item04_tcpt, $item05_tcpt, $org_name_tcpt, $org_date_tcpt, $org_time_tcpt
    ) {



        $res = "INSERT INTO top_coat_printing_tbl  SET
       	    id='" . $id . "',
            pro_no_tcpt='" . $pro_no_tcpt . "',
            pattern_no_tcpt='" . $pattern_no_tcpt . "',
            lot_no_tcpt='" . $lot_no_tcpt . "',
            screen_mesh_tcpt='" . $screen_mesh_tcpt . "',
            colours_index_tcpt='" . $colours_index_tcpt . "',
            machine_no_tcpt='" . $machine_no_tcpt . "',
            judgment_tcpt='" . $judgment_tcpt . "',
            is_edit_tcpt='" . $is_edit_tcpt . "',
            item01_tcpt='" . $item01_tcpt . "',
            item02_tcpt='" . $item02_tcpt . "',
            item03_tcpt='" . $item03_tcpt . "',
            item04_tcpt='" . $item04_tcpt . "',
            item05_tcpt='" . $item05_tcpt . "',
            org_name_tcpt='" . $org_name_tcpt . "',
            org_date_tcpt='" . $org_date_tcpt . "',
            org_time_tcpt='" . $org_time_tcpt . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateTopCoatPrinting(
    $id, $pro_no_tcpt, $pattern_no_tcpt, $lot_no_tcpt, $screen_mesh_tcpt, $colours_index_tcpt, $machine_no_tcpt, $judgment_tcpt, $is_edit_tcpt, $item01_tcpt, $item02_tcpt, $item03_tcpt, $item04_tcpt, $item05_tcpt, $org_name_tcpt, $org_date_tcpt, $org_time_tcpt
    ) {

        $res = mysql_query("UPDATE top_coat_printing_tbl SET
        	id='" . $id . "',
            pro_no_tcpt='" . $pro_no_tcpt . "',
            pattern_no_tcpt='" . $pattern_no_tcpt . "',
            lot_no_tcpt='" . $lot_no_tcpt . "',
            screen_mesh_tcpt='" . $screen_mesh_tcpt . "',
            colours_index_tcpt='" . $colours_index_tcpt . "',
            machine_no_tcpt='" . $machine_no_tcpt . "',
            judgment_tcpt='" . $judgment_tcpt . "',
            is_edit_tcpt='" . $is_edit_tcpt . "',
            item01_tcpt='" . $item01_tcpt . "',
            item02_tcpt='" . $item02_tcpt . "',
            item03_tcpt='" . $item03_tcpt . "',
            item04_tcpt='" . $item04_tcpt . "',
            item05_tcpt='" . $item05_tcpt . "',
            org_name_tcpt='" . $org_name_tcpt . "',
            org_date_tcpt='" . $org_date_tcpt . "',
            org_time_tcpt='" . $org_time_tcpt . "',
		     WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteTopCoatPrinting($id) {
        $query = "DELETE FROM top_coat_printing_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getTopCoatPrintingAeraById($id) {
        $query = "SELECT silver_area_dt FROM top_coat_printing_tbl WHERE curve_no_ymt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextTopCoatPrintingRefNo($table, $suffix) {
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

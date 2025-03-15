<?php

class Printing {

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

    public function getAllPrinting() {
        $query = "SELECT * FROM printing_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }
    
    
    
       public function getWipPrinting() {
        $query = "SELECT pro04_pst FROM printing_status_tbl WHERE pro04_pst='1' AND colour_index_pst!='T01' AND  colour_index_pst!='T02' GROUP BY  ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyOutPutQtyPrinting($date) {
        $query = "SELECT org_date_pt FROM printing_tbl WHERE org_date_pt='" . $date . "'  GROUP BY  lot_no_pt   ";
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
                array_push($la, $rows['id'], $rows['pro_no_pt'], $rows['pattern_no_pt'], $rows['lot_no_pt'], $rows['screen_mesh_pt'], $rows['colours_index_pt'], $rows['machine_no_pt'], $rows['judgment_pt'], $rows['is_edit_pt'], $rows['item01_pt'], $rows['item02_pt'], $rows['item03_pt'], $rows['item04_pt'], $rows['item05_pt'], $rows['org_name_pt'], $rows['org_date_pt'], $rows['org_time_pt']
                );
            }
            return $la;
        }
    }

    public function getPrintingByNo($curve_no_ymt) {
        $query = "SELECT * FROM printing_tbl WHERE curve_no_ymt='" . $curve_no_ymt . "'";
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
        $query = " SELECT decal_design_no_ymt FROM printing_tbl WHERE fg_design_no_ymt='" . $fg_design_no_ymt . "'  AND curve_no_ymt='" . $curve_no_ymt . "' ";
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

    public function confirmPrintingEntity($curve_no_ymt) {
        $res = "SELECT*FROM printing_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPrinting(
    $id, $pro_no_pt, $pattern_no_pt, $lot_no_pt, $screen_mesh_pt, $colours_index_pt, $machine_no_pt, $judgment_pt, $is_edit_pt, $item01_pt, $item02_pt, $item03_pt, $item04_pt, $item05_pt, $org_name_pt, $org_date_pt, $org_time_pt
    ) {



        $res = "INSERT INTO printing_tbl  SET
       	    id='" . $id . "',
            pro_no_pt='" . $pro_no_pt . "',
            pattern_no_pt='" . $pattern_no_pt . "',
            lot_no_pt='" . $lot_no_pt . "',
            screen_mesh_pt='" . $screen_mesh_pt . "',
            colours_index_pt='" . $colours_index_pt . "',
            machine_no_pt='" . $machine_no_pt . "',
            judgment_pt='" . $judgment_pt . "',
            is_edit_pt='" . $is_edit_pt . "',
            item01_pt='" . $item01_pt . "',
            item02_pt='" . $item02_pt . "',
            item03_pt='" . $item03_pt . "',
            item04_pt='" . $item04_pt . "',
            item05_pt='" . $item05_pt . "',
            org_name_pt='" . $org_name_pt . "',
            org_date_pt='" . $org_date_pt . "',
            org_time_pt='" . $org_time_pt . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrinting(
    $id, $pro_no_pt, $pattern_no_pt, $lot_no_pt, $screen_mesh_pt, $colours_index_pt, $machine_no_pt, $judgment_pt, $is_edit_pt, $item01_pt, $item02_pt, $item03_pt, $item04_pt, $item05_pt, $org_name_pt, $org_date_pt, $org_time_pt
    ) {

        $res = mysql_query("UPDATE printing_tbl SET
        	id='" . $id . "',
            pro_no_pt='" . $pro_no_pt . "',
            pattern_no_pt='" . $pattern_no_pt . "',
            lot_no_pt='" . $lot_no_pt . "',
            screen_mesh_pt='" . $screen_mesh_pt . "',
            colours_index_pt='" . $colours_index_pt . "',
            machine_no_pt='" . $machine_no_pt . "',
            judgment_pt='" . $judgment_pt . "',
            is_edit_pt='" . $is_edit_pt . "',
            item01_pt='" . $item01_pt . "',
            item02_pt='" . $item02_pt . "',
            item03_pt='" . $item03_pt . "',
            item04_pt='" . $item04_pt . "',
            item05_pt='" . $item05_pt . "',
            org_name_pt='" . $org_name_pt . "',
            org_date_pt='" . $org_date_pt . "',
            org_time_pt='" . $org_time_pt . "',
		     WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePrinting($id) {
        $query = "DELETE FROM printing_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getPrintingAeraById($id) {
        $query = "SELECT silver_area_dt FROM printing_tbl WHERE curve_no_ymt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextPrintingRefNo($table, $suffix) {
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

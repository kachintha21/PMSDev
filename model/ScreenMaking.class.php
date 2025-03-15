<?php

class ScreenMaking {

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

    public function getScreenMakingByNo($id) {
        $la = array();
        $query = "SELECT*FROM screen_making_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_sm'], $rows['pattern_no_sm'], $rows['lot_no_sm'], $rows['screen_mesh_sm'], $rows['judgment_sm'], $rows['is_edit_sm'], $rows['item01_sm'], $rows['item02_sm'], $rows['item03_sm'], $rows['item04_sm'], $rows['item05_sm'], $rows['org_name_sm'], $rows['org_date_sm'], $rows['org_time_sm']
                );
            }
            return $la;
        }
    }

    public function getScreenMakingByRefNo($id, $screen_mesh_sm) {
        $la = array();
        $query = "SELECT*FROM screen_making_tbl WHERE pro_no_sm='" . $id . "' AND screen_mesh_sm='" . $screen_mesh_sm . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_sm'], $rows['pattern_no_sm'], $rows['lot_no_sm'], $rows['screen_mesh_sm'], $rows['judgment_sm'], $rows['is_edit_sm'], $rows['item01_sm'], $rows['item02_sm'], $rows['item03_sm'], $rows['item04_sm'], $rows['item05_sm'], $rows['org_name_sm'], $rows['org_date_sm'], $rows['org_time_sm']
                );
            }
            return $la;
        }
    }

    public function getWipScreenMaking() {
        $query = "SELECT pro03_pst FROM printing_status_tbl WHERE pro03_pst='1'  GROUP BY  ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyOutPutQtyScreenMaking($date) {
        $query = "SELECT org_date_sm FROM screen_making_tbl WHERE org_date_sm='" . $date . "'  GROUP BY  lot_no_sm   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function createNewScreenMaking(
    $id, $pro_no_sm, $pattern_no_sm, $lot_no_sm, $screen_mesh_sm, $judgment_sm, $is_edit_sm, $item01_sm, $item02_sm, $item03_sm, $item04_sm, $item05_sm, $org_name_sm, $org_date_sm, $org_time_sm
    ) {



        $res = "INSERT INTO screen_making_tbl  SET
        id='" . $id . "',			
        pro_no_sm='" . $pro_no_sm . "',			
        pattern_no_sm='" . $pattern_no_sm . "',			
        lot_no_sm='" . $lot_no_sm . "',			
        screen_mesh_sm='" . $screen_mesh_sm . "',			
        judgment_sm='" . $judgment_sm . "',			
        is_edit_sm='" . $is_edit_sm . "',			
        item01_sm='" . $item01_sm . "',			
        item02_sm='" . $item02_sm . "',			
        item03_sm='" . $item03_sm . "',			
        item04_sm='" . $item04_sm . "',			
        item05_sm='" . $item05_sm . "',			
        org_name_sm='" . $org_name_sm . "',			
        org_date_sm='" . $org_date_sm . "',			
        org_time_sm='" . $org_time_sm . "'	
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateScreenMaking(
    $id, $pro_no_sm, $pattern_no_sm, $lot_no_sm, $screen_mesh_sm, $judgment_sm, $is_edit_sm, $item01_sm, $item02_sm, $item03_sm, $item04_sm, $item05_sm, $org_name_sm, $org_date_sm, $org_time_sm
    ) {

        $res = "UPDATE screen_making_tbl SET
   	
        pro_no_sm='" . $pro_no_sm . "',			
        pattern_no_sm='" . $pattern_no_sm . "',			
        lot_no_sm='" . $lot_no_sm . "',			
        screen_mesh_sm='" . $screen_mesh_sm . "',			
        judgment_sm='" . $judgment_sm . "',			
        is_edit_sm='" . $is_edit_sm . "',			
        item01_sm='" . $item01_sm . "',			
        item02_sm='" . $item02_sm . "',			
        item03_sm='" . $item03_sm . "',			
        item04_sm='" . $item04_sm . "',			
        item05_sm='" . $item05_sm . "',			
        org_name_sm='" . $org_name_sm . "',			
        org_date_sm='" . $org_date_sm . "',			
        org_time_sm='" . $org_time_sm . "'

	        WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteScreenMaking($id) {
        $query = "DELETE FROM screen_making_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

}

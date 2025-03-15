<?php

class Defect {

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

      public function getDefectById($id) {
        $la = array();
        $query = "SELECT*FROM defect_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['defect_name_dt'], $rows['item01_dt'], $rows['item02_dt'], $rows['item03_dt'], $rows['item04_dt'], $rows['item05_dt'], $rows['is_edit_dt'], $rows['org_name_dt'], $rows['org_date_dt'], $rows['org_time_dt']
                );
            }
            return $la;
        }
    
      }
    
    public function getDefectByNo($id) {
        $la = array();
        $query = "SELECT*FROM defect_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['defect_name_dt'], $rows['item01_dt'], $rows['item02_dt'], $rows['item03_dt'], $rows['item04_dt'], $rows['item05_dt'], $rows['is_edit_dt'], $rows['org_name_dt'], $rows['org_date_dt'], $rows['org_time_dt']
                );
            }
            return $la;
        }
    }

    public function getDefectByRefNo($id, $screen_mesh_sm) {
        $la = array();
        $query = "SELECT*FROM defect_tbl WHERE pro_no_sm='" . $id . "' AND screen_mesh_sm='" . $screen_mesh_sm . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['defect_name_dt'], $rows['item01_dt'], $rows['item02_dt'], $rows['item03_dt'], $rows['item04_dt'], $rows['item05_dt'], $rows['is_edit_dt'], $rows['org_name_dt'], $rows['org_date_dt'], $rows['org_time_dt']
                );
            }
            return $la;
        }
    }

    public function getWipDefect() {
        $query = "SELECT pro03_pst FROM printing_status_tbl WHERE pro03_pst='1'  GROUP BY  ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyOutPutQtyDefect($date) {
        $query = "SELECT org_date_sm FROM defect_tbl WHERE org_date_sm='" . $date . "'  GROUP BY  lot_no_sm   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function createNewDefect(
    $id, $defect_name_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $is_edit_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {

        $res = "INSERT INTO defect_tbl  SET            
        id='" . $id . "',
        defect_name_dt='" . $defect_name_dt . "',
        item01_dt='" . $item01_dt . "',
        item02_dt='" . $item02_dt . "',
        item03_dt='" . $item03_dt . "',
        item04_dt='" . $item04_dt . "',
        item05_dt='" . $item05_dt . "',
        is_edit_dt='" . $is_edit_dt . "',
        org_name_dt='" . $org_name_dt . "',
        org_date_dt='" . $org_date_dt . "',
        org_time_dt='" . $org_time_dt . "'	
		       ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDefect(
    $id, $defect_name_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $is_edit_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {

        $res = "UPDATE defect_tbl SET   	
        defect_name_dt='" . $defect_name_dt . "',
        item01_dt='" . $item01_dt . "',
        item02_dt='" . $item02_dt . "',
        item03_dt='" . $item03_dt . "',
        item04_dt='" . $item04_dt . "',
        item05_dt='" . $item05_dt . "',
        is_edit_dt='" . $is_edit_dt . "',
        org_name_dt='" . $org_name_dt . "',
        org_date_dt='" . $org_date_dt . "',
        org_time_dt='" . $org_time_dt . "'
	 WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteDefect($id) {
        $query = "DELETE FROM defect_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:defect_view.php');
        }
    }
    
    
       public function getDefect() {
        $query = "SELECT defect_name_dt FROM defect_tbl ORDER BY defect_name_dt ASC ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['defect_name_dt'] . "' >" . $rows['defect_name_dt'] . "</option>");
            }
        }
    }


}

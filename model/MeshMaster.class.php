<?php

class MeshMaster {

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

    public function getMeshMasterByNo($id) {
        $la = array();
        $query = "SELECT*FROM mesh_master_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['mesh_name_mmt'], $rows['item01_mmt'], $rows['item02_mmt'], $rows['item03_mmt'], $rows['item04_mmt'], $rows['item05_mmt'], $rows['is_edit_mmt'], $rows['org_name_mmt'], $rows['org_date_mmt'], $rows['org_time_mmt']
                );
            }
            return $la;
        }
    }

    public function getWipMeshMaster($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function createNewMeshMaster(
    $id, $mesh_name_mmt, $item01_mmt, $item02_mmt, $item03_mmt, $item04_mmt, $item05_mmt, $is_edit_mmt, $org_name_mmt, $org_date_mmt, $org_time_mmt
    ) {



        $res = "INSERT INTO mesh_master_tbl  SET
         mesh_name_mmt='" . $mesh_name_mmt . "',
        item01_mmt='" . $item01_mmt . "',
        item02_mmt='" . $item02_mmt . "',
        item03_mmt='" . $item03_mmt . "',
        item04_mmt='" . $item04_mmt . "',
        item05_mmt='" . $item05_mmt . "',
        is_edit_mmt='" . $is_edit_mmt . "',
        org_name_mmt='" . $org_name_mmt . "',
        org_date_mmt='" . $org_date_mmt . "',
        org_time_mmt='" . $org_time_mmt . "'




            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateMeshMaster(
    $id, $mesh_name_mmt, $item01_mmt, $item02_mmt, $item03_mmt, $item04_mmt, $item05_mmt, $is_edit_mmt, $org_name_mmt, $org_date_mmt, $org_time_mmt
    ) {

        $res = "UPDATE mesh_master_tbl SET   	    
 mesh_name_mmt='" . $mesh_name_mmt . "',
        item01_mmt='" . $item01_mmt . "',
        item02_mmt='" . $item02_mmt . "',
        item03_mmt='" . $item03_mmt . "',
        item04_mmt='" . $item04_mmt . "',
        item05_mmt='" . $item05_mmt . "',
        is_edit_mmt='" . $is_edit_mmt . "',
        org_name_mmt='" . $org_name_mmt . "',
        org_date_mmt='" . $org_date_mmt . "',
        org_time_mmt='" . $org_time_mmt . "'


	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteMeshMaster($id) {
        $query = "DELETE FROM mesh_master_tbl WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:mesh_master_view.php');
        }
    }

    public function getMesh() {
        $query = "SELECT mesh_name_mmt FROM mesh_master_tbl   group by mesh_name_mmt";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['mesh_name_mmt'] . "' >" . $rows['mesh_name_mmt'] . "</option>");
            }
        }
    }

 


}

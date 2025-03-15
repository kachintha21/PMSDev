<?php

class VirtualPlanner {

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

    public function getAllVirtualPlanner() {
        $query = "SELECT * FROM virtual_planner_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getVirtualPlannerByNo($id) {
        $la = array();
        $query = "SELECT*FROM virtual_planner_tbl WHERE ref_no_vt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_vt'], $rows['date_vt'], $rows['org_name_vt'], $rows['org_date_vt'], $rows['org_time_vt']
                );
            }
            return $la;
        }
    }

    public function confirmVirtualPlannerEntity($ref_no_plt) {
        $res = "SELECT*FROM virtual_planner_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewVirtualPlanner(
    $id, $ref_no_vt, $date_vt, $org_name_vt, $org_date_vt, $org_time_vt
    ) {



        $res = "INSERT INTO virtual_planner_tbl  SET
        id='" . $id . "',
        ref_no_vt='" . $ref_no_vt . "',
        date_vt='" . $date_vt . "',
        org_name_vt='" . $org_name_vt . "',
        org_date_vt='" . $org_date_vt . "',
        org_time_vt='" . $org_time_vt . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateVirtualPlanner(
    $id, $ref_no_vt, $date_vt, $org_name_vt, $org_date_vt, $org_time_vt
    ) {

        $res = mysql_query("UPDATE virtual_planner_tbl SET
                    ref_no_vt='" . $ref_no_vt . "',
        date_vt='" . $date_vt . "',
        org_name_vt='" . $org_name_vt . "',
        org_date_vt='" . $org_date_vt . "',
        org_time_vt='" . $org_time_vt . "',



	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteVirtualPlanner($id) {
        $query_vtp = "DELETE FROM virtual_temp_details_tbl WHERE ref_no_vtdt='$id'";
        $query_vpd = "DELETE FROM virtual_planner_details_tbl WHERE ref_no_vpt='$id'";
        $query_vt = "DELETE FROM virtual_planner_tbl WHERE ref_no_vt='$id'";

        $result = $this->mysqli->query($query_vtp);
          $result = $this->mysqli->query($query_vt);
        $result = $this->mysqli->query($query_vpd);
        if ($result) {
            header('location:virtual_planner_beta_view.php');
        }
    }

    public function getNextVirtualPlannerRefNo($table, $suffix) {
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

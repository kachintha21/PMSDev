<?php

class VirtualPlannerDetails {

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

    public function getVirtualPlannerDetailsByNo($id) {
        $la = array();
        $query = "SELECT*FROM virtual_planner_details_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_vpt'], $rows['date_vpt'], $rows['pro_no_vpt'], $rows['lot_no_vpt'], $rows['qty_vpt'], $rows['ship_scheduled_date_vpt'], $rows['is_edit_vpt'], $rows['item01_vpt'], $rows['item02_vpt'], $rows['item03_vpt'], $rows['item04_vpt'], $rows['item05_vpt'], $rows['org_name_vpt'], $rows['org_date_vpt'], $rows['org_time_vpt']
                );
            }
            return $la;
        }
    }

    public function confirmVirtualPlannerDetailsEntity($ref_no_plt) {
        $res = "SELECT*FROM virtual_planner_details_tbl WHERE ref_no_vpt = '" . $ref_no_vpt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewVirtualPlannerDetails(
    $id, $ref_no_vpt, $date_vpt, $pro_no_vpt, $lot_no_vpt, $qty_vpt, $ship_scheduled_date_vpt, $is_edit_vpt, $item01_vpt, $item02_vpt, $item03_vpt, $item04_vpt, $item05_vpt, $org_name_vpt, $org_date_vpt, $org_time_vpt
    ) {



        $res = "INSERT INTO virtual_planner_details_tbl  SET
       id='" . $id . "',
ref_no_vpt='" . $ref_no_vpt . "',
date_vpt='" . $date_vpt . "',
pro_no_vpt='" . $pro_no_vpt . "',
lot_no_vpt='" . $lot_no_vpt . "',
qty_vpt='" . $qty_vpt . "',
ship_scheduled_date_vpt='" . $ship_scheduled_date_vpt . "',
is_edit_vpt='" . $is_edit_vpt . "',
item01_vpt='" . $item01_vpt . "',
item02_vpt='" . $item02_vpt . "',
item03_vpt='" . $item03_vpt . "',
item04_vpt='" . $item04_vpt . "',
item05_vpt='" . $item05_vpt . "',
org_name_vpt='" . $org_name_vpt . "',
org_date_vpt='" . $org_date_vpt . "',
org_time_vpt='" . $org_time_vpt . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateVirtualPlannerDetails(
    $id, $ref_no_vpt, $date_vpt, $pro_no_vpt, $lot_no_vpt, $qty_vpt, $ship_scheduled_date_vpt, $is_edit_vpt, $item01_vpt, $item02_vpt, $item03_vpt, $item04_vpt, $item05_vpt, $org_name_vpt, $org_date_vpt, $org_time_vpt
    ) {

        $res = mysql_query("UPDATE virtual_planner_details_tbl SET
              id='" . $id . "',
ref_no_vpt='" . $ref_no_vpt . "',
date_vpt='" . $date_vpt . "',
pro_no_vpt='" . $pro_no_vpt . "',
lot_no_vpt='" . $lot_no_vpt . "',
qty_vpt='" . $qty_vpt . "',
ship_scheduled_date_vpt='" . $ship_scheduled_date_vpt . "',
is_edit_vpt='" . $is_edit_vpt . "',
item01_vpt='" . $item01_vpt . "',
item02_vpt='" . $item02_vpt . "',
item03_vpt='" . $item03_vpt . "',
item04_vpt='" . $item04_vpt . "',
item05_vpt='" . $item05_vpt . "',
org_name_vpt='" . $org_name_vpt . "',
org_date_vpt='" . $org_date_vpt . "',
org_time_vpt='" . $org_time_vpt . "',



	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteVirtualPlannerDetails($id) {
        $query = "DELETE FROM virtual_planner_details_tbl WHERE ref_no_vpt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextVirtualPlannerDetailsRefNo($table, $suffix) {
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

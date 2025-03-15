<?php

class DecalLeadTime {

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

    public function getAllDecalLeadTimel() {
        $query = "SELECT * FROM decal_lead_time_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getDecalLeadTimelByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM decal_lead_time_tbl WHERE layout='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattern_no_dltt'], $rows['item_no_dltt'], $rows['type_name_dltt'], $rows['decal_store_dltt'], $rows['decal_cutting_dltt'], $rows['qc_apporaval_dltt'], $rows['top_coat_dltt'], $rows['recovery_dltt'], $rows['printing_dltt'], $rows['item01_dltt'], $rows['item02_dltt'], $rows['item03_dltt'], $rows['item04_dltt'], $rows['item05_dltt'], $rows['is_edit_dltt'], $rows['org_name_dltt'], $rows['org_date_dltt'], $rows['org_time_dltt']
                );
            }
            return $la;
        }
    }

    public function getDecalLeadTimelById($id) {
        $la = array();
        $query = "SELECT * FROM decal_lead_time_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattern_no_dltt'], $rows['item_no_dltt'], $rows['type_name_dltt'], $rows['decal_store_dltt'], $rows['decal_cutting_dltt'], $rows['qc_apporaval_dltt'], $rows['top_coat_dltt'], $rows['recovery_dltt'], $rows['printing_dltt'], $rows['item01_dltt'], $rows['item02_dltt'], $rows['item03_dltt'], $rows['item04_dltt'], $rows['item05_dltt'], $rows['is_edit_dltt'], $rows['org_name_dltt'], $rows['org_date_dltt'], $rows['org_time_dltt']
                );
            }
            return $la;
        }
    }

    public function getDecalLeadTimelByNo($layout) {
        $query = "SELECT * FROM decal_lead_time_tbl WHERE layout='" . $layout . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmDecalLeadTimelEntity($layout) {
        $res = "SELECT*FROM decal_lead_time_tbl WHERE layout = '" . $layout . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewDecalLeadTimel(
    $id, $pattern_no_dltt, $item_no_dltt, $type_name_dltt, $decal_store_dltt, $decal_cutting_dltt, $qc_apporaval_dltt, $top_coat_dltt, $recovery_dltt, $printing_dltt, $item01_dltt, $item02_dltt, $item03_dltt, $item04_dltt, $item05_dltt, $is_edit_dltt, $org_name_dltt, $org_date_dltt, $org_time_dltt
    ) {



        $res = "INSERT INTO decal_lead_time_tbl  SET       
pattern_no_dltt='" . $pattern_no_dltt . "',
item_no_dltt='" . $item_no_dltt . "',
type_name_dltt='" . $type_name_dltt . "',
decal_store_dltt='" . $decal_store_dltt . "',
decal_cutting_dltt='" . $decal_cutting_dltt . "',
qc_apporaval_dltt='" . $qc_apporaval_dltt . "',
top_coat_dltt='" . $top_coat_dltt . "',
recovery_dltt='" . $recovery_dltt . "',
printing_dltt='" . $printing_dltt . "',
item01_dltt='" . $item01_dltt . "',
item02_dltt='" . $item02_dltt . "',
item03_dltt='" . $item03_dltt . "',
item04_dltt='" . $item04_dltt . "',
item05_dltt='" . $item05_dltt . "',
is_edit_dltt='" . $is_edit_dltt . "',
org_name_dltt='" . $org_name_dltt . "',
org_date_dltt='" . $org_date_dltt . "',
org_time_dltt='" . $org_time_dltt . "'
			

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDecalLeadTimel(
    $id, $pattern_no_dltt, $item_no_dltt, $type_name_dltt, $decal_store_dltt, $decal_cutting_dltt, $qc_apporaval_dltt, $top_coat_dltt, $recovery_dltt, $printing_dltt, $item01_dltt, $item02_dltt, $item03_dltt, $item04_dltt, $item05_dltt, $is_edit_dltt, $org_name_dltt, $org_date_dltt, $org_time_dltt
    ) {



        $res = "UPDATE decal_lead_time_tbl SET
id='" . $id . "',           
pattern_no_dltt='" . $pattern_no_dltt . "',
item_no_dltt='" . $item_no_dltt . "',
type_name_dltt='" . $type_name_dltt . "',
decal_store_dltt='" . $decal_store_dltt . "',
decal_cutting_dltt='" . $decal_cutting_dltt . "',
qc_apporaval_dltt='" . $qc_apporaval_dltt . "',
top_coat_dltt='" . $top_coat_dltt . "',
recovery_dltt='" . $recovery_dltt . "',
printing_dltt='" . $printing_dltt . "',
item01_dltt='" . $item01_dltt . "',
item02_dltt='" . $item02_dltt . "',
item03_dltt='" . $item03_dltt . "',
item04_dltt='" . $item04_dltt . "',
item05_dltt='" . $item05_dltt . "',
is_edit_dltt='" . $is_edit_dltt . "',
org_name_dltt='" . $org_name_dltt . "',
org_date_dltt='" . $org_date_dltt . "',
org_time_dltt='" . $org_time_dltt . "'
		    WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteDecalLeadTimel($id) {
        $query = "DELETE FROM decal_lead_time_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function deleteDecalLeadTimelByProNo($id) {
        $query = "DELETE FROM decal_lead_time_tbl WHERE pro_no_lpt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getDecalLeadTimelByLotNumber() {
        $query = "SELECT DISTINCT layout FROM decal_lead_time_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['layout'] . "' >" . $rows['layout'] . "</option>");
            }
        }
    }

    public function getAera($id) {
        $query = "SELECT FROM data_tbl WHERE curve_no_dt='" . $id . "'";
        $result = $this->mysqli->query($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row = $result->fetch_assoc();
                return $row["silver_area_dt"];
            }
        } else {
            return 1;
        }
    }

    public function getNextDecalLeadTimelRefNo($table, $suffix) {
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

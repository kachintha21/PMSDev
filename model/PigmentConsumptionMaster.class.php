<?php

class PigmentConsumptionMaster {

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

    public function getAllPigmentConsumptionMaster() {
        $query = "SELECT * FROM pigment_consumption_master_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPigmentConsumptionMasterByNo($colours_index_pcm) {
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE colours_index_pcm='" . $colours_index_pcm . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPigmentConsumptionMasterCodeByPatternNo($pattern_pcm, $colours_index_pcm) {
        $la = array();
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pattern_pcm='" . $pattern_pcm . "'   AND  colours_index_pcm='" . $colours_index_pcm . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattern_pcm'], $rows['colours_index_pcm'], $rows['colours_name_pcm'], $rows['colour_qty_pcm'], $rows['wastage_consumpation_pcm'], $rows['machine_consumpation_pcm'], $rows['is_edit_pcm'], $rows['item01_pcm'], $rows['item02_pcm'], $rows['item03_pcm'], $rows['item04_pcm'], $rows['item05_pcm'], $rows['org_name_pcm'], $rows['org_date_pcm'], $rows['org_time_pcm']
                );
            }
            return $la;
        }
    }

    public function getPigmentConsumptionMasterCusumpationPatternNo($pattern_pcm, $colours_index_pcm) {
        $la = array();
        //  $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pattern_pcm='000M218'   AND  colours_index_pcm='S01'  LIMIT 1  ";
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pattern_pcm='" . $pattern_pcm . "'   AND  colours_index_pcm='" . $colours_index_pcm . "'    LIMIT 1 ";



        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_pcm'], $rows['colours_index_pcm'], $rows['colours_name_pcm'], $rows['colour_qty_pcm'], $rows['wastage_consumpation_pcm'], $rows['machine_consumpation_pcm'], $rows['is_edit_pcm'], $rows['item01_pcm'], $rows['item02_pcm'], $rows['item03_pcm'], $rows['item04_pcm'], $rows['item05_pcm'], $rows['org_name_pcm'], $rows['org_date_pcm'], $rows['org_time_pcm']
                );
            }
            return $la;
        }
    }

    public function getPigmentConsumptionMasterCodeByPatternNoList($pattern_pcm, $colours_index_pcm) {
        $la = array();
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pattern_pcm='" . $pattern_pcm . "'   AND  colours_index_pcm='" . $colours_index_pcm . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_pcm'], $rows['colours_index_pcm'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getPigmentConsumptionMasterCodeIndexByPatternNo($pattern_pcm, $pigment_name_ct, $qty_ct) {
        $la = array();
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pattern_pcm='" . $pattern_pcm . "'   AND  pigment_name_ct='" . $pigment_name_ct . "'  AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_pcm'], $rows['colours_index_pcm'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getPigmentConsumptionMasterCodeIndexConfrimByPatternNo($pattern_pcm, $pigment_name_ct, $qty_ct) {
        $la = array();
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pattern_pcm='" . $pattern_pcm . "'   AND  pigment_name_ct='" . $pigment_name_ct . "'  AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getpatternNameByNo($pigment_name_ct, $qty_ct) {
        $query = "SELECT * FROM pigment_consumption_master_tbl WHERE pigment_name_ct='" . $pigment_name_ct . "'   AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row["pattern_pcm"];
            }
        } else {

            return "";
        }
    }

    public function confirmPigmentConsumptionMasterEntity($colours_index_pcm) {
        $res = "SELECT*FROM pigment_consumption_master_tbl WHERE colours_index_pcm = '" . $colours_index_pcm . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentConsumptionMaster(
    $id, $pattern_pcm, $colours_index_pcm, $colours_name_pcm, $colour_qty_pcm, $wastage_consumpation_pcm, $machine_consumpation_pcm, $is_edit_pcm, $item01_pcm, $item02_pcm, $item03_pcm, $item04_pcm, $item05_pcm, $org_name_pcm, $org_date_pcm, $org_time_pcm
    ) {


        $res = "INSERT INTO pigment_consumption_master_tbl  SET
               id='" . $id . "',
pattern_pcm='" . $pattern_pcm . "',
colours_index_pcm='" . $colours_index_pcm . "',
colours_name_pcm='" . $colours_name_pcm . "',
colour_qty_pcm='" . $colour_qty_pcm . "',
wastage_consumpation_pcm='" . $wastage_consumpation_pcm . "',
machine_consumpation_pcm='" . $machine_consumpation_pcm . "',
is_edit_pcm='" . $is_edit_pcm . "',
item01_pcm='" . $item01_pcm . "',
item02_pcm='" . $item02_pcm . "',
item03_pcm='" . $item03_pcm . "',
item04_pcm='" . $item04_pcm . "',
item05_pcm='" . $item05_pcm . "',
org_name_pcm='" . $org_name_pcm . "',
org_date_pcm='" . $org_date_pcm . "',
org_time_pcm='" . $org_time_pcm . "',

		 ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentConsumptionMaster(
    $id, $pattern_pcm, $colours_index_pcm, $colours_name_pcm, $colour_qty_pcm, $wastage_consumpation_pcm, $machine_consumpation_pcm, $is_edit_pcm, $item01_pcm, $item02_pcm, $item03_pcm, $item04_pcm, $item05_pcm, $org_name_pcm, $org_date_pcm, $org_time_pcm
    ) {

        $res = mysql_query("UPDATE pigment_consumption_master_tbl SET
                         id='" . $id . "',
pattern_pcm='" . $pattern_pcm . "',
colours_index_pcm='" . $colours_index_pcm . "',
colours_name_pcm='" . $colours_name_pcm . "',
colour_qty_pcm='" . $colour_qty_pcm . "',
wastage_consumpation_pcm='" . $wastage_consumpation_pcm . "',
machine_consumpation_pcm='" . $machine_consumpation_pcm . "',
is_edit_pcm='" . $is_edit_pcm . "',
item01_pcm='" . $item01_pcm . "',
item02_pcm='" . $item02_pcm . "',
item03_pcm='" . $item03_pcm . "',
item04_pcm='" . $item04_pcm . "',
item05_pcm='" . $item05_pcm . "',
org_name_pcm='" . $org_name_pcm . "',
org_date_pcm='" . $org_date_pcm . "',
org_time_pcm='" . $org_time_pcm . "',
		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentConsumptionMaster($id) {
        $query = "DELETE FROM pigment_consumption_master_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getPigmentConsumptionMasterById($pattern_no_pt) {
        $query = "SELECT colours_index_pcm FROM pigment_consumption_master_tbl WHERE  pattern_pcm='" . $pattern_no_pt . "' AND  colours_index_pcm!='T01' AND  colours_index_pcm!='T02'  group by colours_index_pcm";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_index_pcm'] . "' >" . $rows['colours_index_pcm'] . "</option>");
            }
        }
    }

    public function getNextPigmentConsumptionMasterRefNo($table, $suffix) {
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

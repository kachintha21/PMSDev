<?php
class GoldConsumpation {
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

    public function getAllGoldConsumpation() {
        $query = "SELECT COUNT(ref_no_plt) AS t FROM gold_consumption_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['t'];
            }
            return 0;
        }
    }

    public function getGoldConsumpationByID($id) {
        $la = array();
        $query = "SELECT*FROM gold_consumption_tbl WHERE id='" . $id . "'  ";
        echo($query);
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_gct'], $rows['lot_no_gct'], $rows['pattern_no_gct'], $rows['fg_deign_gct'], $rows['printing_gct'], $rows['color_gct'], $rows['consumption_gct'], $rows['is_edit_gct'], $rows['item01_gct'], $rows['item02_gct'], $rows['item03_gct'], $rows['item04_gct'], $rows['org_name_gct'], $rows['org_date_gct'], $rows['org_time_gct']
                );
            }
            return $la;
        }
    }

    public function getGoldConsumpationByNo($id) {
        $la = array();
        $query = "SELECT*FROM gold_consumption_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_gct'], $rows['lot_no_gct'], $rows['pattern_no_gct'], $rows['fg_deign_gct'], $rows['printing_gct'], $rows['color_gct'], $rows['consumption_gct'], $rows['is_edit_gct'], $rows['item01_gct'], $rows['item02_gct'], $rows['item03_gct'], $rows['item04_gct'], $rows['org_name_gct'], $rows['org_date_gct'], $rows['org_time_gct']
                );
            }
            return $la;
        }
    }

    public function createNewGoldConsumpation(
    $id, $pro_no_gct, $lot_no_gct, $pattern_no_gct, $fg_deign_gct, $printing_gct, $color_gct, $consumption_gct, $is_edit_gct, $item01_gct, $item02_gct, $item03_gct, $item04_gct, $org_name_gct, $org_date_gct, $org_time_gct
    ) {



        $res = "INSERT INTO gold_consumption_tbl  SET
                        id='" . $id . "',
            pro_no_gct='" . $pro_no_gct . "',
            lot_no_gct='" . $lot_no_gct . "',
            pattern_no_gct='" . $pattern_no_gct . "',
            fg_deign_gct='" . $fg_deign_gct . "',
            printing_gct='" . $printing_gct . "',
            color_gct='" . $color_gct . "',
            consumption_gct='" . $consumption_gct . "',
            is_edit_gct='" . $is_edit_gct . "',
            item01_gct='" . $item01_gct . "',
            item02_gct='" . $item02_gct . "',
            item03_gct='" . $item03_gct . "',
            item04_gct='" . $item04_gct . "',
            org_name_gct='" . $org_name_gct . "',
            org_date_gct='" . $org_date_gct . "',
            org_time_gct='" . $org_time_gct . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateGoldConsumpation(
    $id, $pro_no_gct, $lot_no_gct, $pattern_no_gct, $fg_deign_gct, $printing_gct, $color_gct, $consumption_gct, $is_edit_gct, $item01_gct, $item02_gct, $item03_gct, $item04_gct, $org_name_gct, $org_date_gct, $org_time_gct
    ) {



        $query = "UPDATE gold_consumption_tbl SET
                        id='" . $id . "',
            pro_no_gct='" . $pro_no_gct . "',
            lot_no_gct='" . $lot_no_gct . "',
            pattern_no_gct='" . $pattern_no_gct . "',
            fg_deign_gct='" . $fg_deign_gct . "',
            printing_gct='" . $printing_gct . "',
            color_gct='" . $color_gct . "',
            consumption_gct='" . $consumption_gct . "',
            is_edit_gct='" . $is_edit_gct . "',
            item01_gct='" . $item01_gct . "',
            item02_gct='" . $item02_gct . "',
            item03_gct='" . $item03_gct . "',
            item04_gct='" . $item04_gct . "',
            org_name_gct='" . $org_name_gct . "',
            org_date_gct='" . $org_date_gct . "',
            org_time_gct='" . $org_time_gct . "',

	        WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function updateGoldConsumpationById(
    $id, $item03_plt, $type
    ) {
        $res = "UPDATE gold_consumption_tbl SET
                item03_plt='" . $item03_plt . "'           
	        WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateGoldConsumpationByRefNo(
    $id, $item03_plt, $type
    ) {
        $res = "UPDATE gold_consumption_tbl SET
                item03_plt='" . $item03_plt . "'           
	        WHERE ref_no_plt='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteGoldConsumpation($id) {
        $query = "DELETE FROM gold_consumption_tbl WHERE pro_no_gct='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function deleteGoldConsumpationByProNo($id) {
        $query = "DELETE FROM gold_consumption_tbl WHERE pro_no_plt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getNextGoldConsumpationRefNo($table, $suffix) {
        $sql = "SELECT COUNT(id)as id FROM " . $table . " WHERE item15_plt='" . $suffix . "' ORDER BY id DESC";
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            $previous = $row['id'];

            //$previous = substr($previous, 5, strlen($previous));

            if (strlen("" . $previous + 1) == 1) {
                $previous = "00" . ($previous + 1);
            } else if (strlen("" . $previous + 1) == 2) {
                $previous = "0" . ($previous + 1);
            }
        } else {
            $previous = "001";
        }
        return $suffix . $previous;
    }

    public function getNextGoldConsumpationunique($table, $suffix) {
        $sql = "SELECT COUNT(id)as id FROM " . $table . " WHERE pattern_no_plt='" . $suffix . "'  ORDER BY id DESC";

        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $previous = $row['id'];
            if (strlen("" . $previous + 1) == 1) {
                $previous = "" . ($previous + 1);
            } else if (strlen("" . $previous + 1) == 2) {
                $previous = "" . ($previous + 1);
            }
        } else {
            $previous = "1";
        }
        return $previous;
    }

}

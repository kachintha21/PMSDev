<?php

class ColoursCode {

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

    public function getAllColoursCode() {
        $query = "SELECT * FROM color_code_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getColoursCodeByNo($colours_code_ct) {
        $query = "SELECT * FROM color_code_tbl WHERE colours_code_ct='" . $colours_code_ct . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getColoursCodeCodeById($id) {
        $la = array();
        $query = "SELECT * FROM color_code_tbl WHERE id='" . $id . "'    ";
        echo($query);
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattten_no_cct'], $rows['color_code_cct'], $rows['color_name_cct'], $rows['item01_cct'], $rows['item02_cct'], $rows['item03_cct'], $rows['org_name_cct'], $rows['org_date_cct'], $rows['org_time_cct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeCodeByPatternNo($pattern_no_ct, $colours_code_ct) {
        $la = array();
        $query = "SELECT * FROM color_code_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  colours_code_ct='" . $colours_code_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['pattten_no_cct'], $rows['color_code_cct'], $rows['color_name_cct'], $rows['item01_cct'], $rows['item02_cct'], $rows['item03_cct'], $rows['org_name_cct'], $rows['org_date_cct'], $rows['org_time_cct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeCodeByPatternNoList($pattern_no_ct, $colours_code_ct) {
        $la = array();
        $query = "SELECT * FROM color_code_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  colours_code_ct='" . $colours_code_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['pattten_no_cct'], $rows['color_code_cct'], $rows['color_name_cct'], $rows['item01_cct'], $rows['item02_cct'], $rows['item03_cct'], $rows['org_name_cct'], $rows['org_date_cct'], $rows['org_time_cct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeCodeIndexByPatternNo($pattern_no_ct, $pigment_name_ct, $qty_ct) {
        $la = array();
        $query = "SELECT * FROM color_code_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  pigment_name_ct='" . $pigment_name_ct . "'  AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['id'], $rows['pattten_no_cct'], $rows['color_code_cct'], $rows['color_name_cct'], $rows['item01_cct'], $rows['item02_cct'], $rows['item03_cct'], $rows['org_name_cct'], $rows['org_date_cct'], $rows['org_time_cct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeCodeIndexConfrimByPatternNo($pattern_no_ct, $pigment_name_ct, $qty_ct) {
        $la = array();
        $query = "SELECT * FROM color_code_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  pigment_name_ct='" . $pigment_name_ct . "'  AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getpatternNameByNo($pigment_name_ct, $qty_ct) {
        $query = "SELECT * FROM color_code_tbl WHERE pigment_name_ct='" . $pigment_name_ct . "'   AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row["pattern_no_ct"];
            }
        } else {

            return "";
        }
    }

    public function confirmColoursCodeEntity($colours_code_ct) {
        $res = "SELECT*FROM color_code_tbl WHERE colours_code_ct = '" . $colours_code_ct . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewColoursCode(
    $id, $pattten_no_cct, $color_code_cct, $color_name_cct, $item01_cct, $item02_cct, $item03_cct, $org_name_cct, $org_date_cct, $org_time_cct
    ) {


        $res = "INSERT INTO color_code_tbl  SET
            pattten_no_cct='" . $pattten_no_cct . "',
           color_code_cct='" . $color_code_cct . "',
           color_name_cct='" . $color_name_cct . "',
           item01_cct='" . $item01_cct . "',
           item02_cct='" . $item02_cct . "',
           item03_cct='" . $item03_cct . "',
           org_name_cct='" . $org_name_cct . "',
           org_date_cct='" . $org_date_cct . "',
           org_time_cct='" . $org_time_cct . "'
		 ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateColoursCode(
    $id, $pattten_no_cct, $color_code_cct, $color_name_cct, $item01_cct, $item02_cct, $item03_cct, $org_name_cct, $org_date_cct, $org_time_cct
    ) {

        $res = "UPDATE color_code_tbl SET
                pattten_no_cct='" . $pattten_no_cct . "',
                color_code_cct='" . $color_code_cct . "',
                color_name_cct='" . $color_name_cct . "',
                item01_cct='" . $item01_cct . "',
                item02_cct='" . $item02_cct . "',
                item03_cct='" . $item03_cct . "',
                org_name_cct='" . $org_name_cct . "',
                org_date_cct='" . $org_date_cct . "',
                org_time_cct='" . $org_time_cct . "'
		  WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteColoursCode($id) {
        $query = "DELETE FROM color_code_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:color_code_view.php');
        }
    }

    public function getColoursCodeById($pattern_no_pt) {
        $query = "SELECT colours_code_ct FROM color_code_tbl WHERE  pattern_no_ct='" . $pattern_no_pt . "' AND  colours_code_ct!='T01' AND  colours_code_ct!='T02'  group by colours_code_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_code_ct'] . "' >" . $rows['colours_code_ct'] . "</option>");
            }
        }
    }
    
    
       public function getColoursIndexList() {
        $query = "SELECT colours_code_ct FROM colours_tbl  WHERE  colours_code_ct!='R01' AND colours_code_ct!='R02' AND colours_code_ct!='R03' AND colours_code_ct!='R04' AND colours_code_ct!='R05' AND colours_code_ct!='R06' AND colours_code_ct!='R07' AND colours_code_ct!='R08' AND colours_code_ct!='R09' AND colours_code_ct!='R10' AND colours_code_ct!='R11' AND colours_code_ct!='R12' AND colours_code_ct!='R13' AND colours_code_ct!='R14' AND colours_code_ct!='R15' AND  colours_code_ct!='R16' AND  colours_code_ct!='R17' AND  colours_code_ct!='R18'   group by colours_code_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_code_ct'] . "' >" . $rows['colours_code_ct'] . "</option>");
            }
        }
    }
    
       public function getColoursList() {
        $query = "SELECT color_name_cct FROM color_code_tbl   group by color_name_cct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['color_name_cct'] . "' >" . $rows['color_name_cct'] . "</option>");
            }
        }
    }
    
    
    
          public function getColoursCodeList() {
        $query = "SELECT color_code_cct FROM color_code_tbl  group by color_code_cct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['color_code_cct'] . "' >" . $rows['color_code_cct'] . "</option>");
            }
        }
    }

    public function getNextColoursCodeRefNo($table, $suffix) {
        $sql = "SELECT color_code_cct	 FROM " . $table . " ORDER BY color_code_cct DESC";
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $previous = $row['color_code_cct'];

            //$previous = substr($previous, 5, strlen($previous));

            if (strlen("" . $previous + 1) == 1) {
                $previous = ($previous + 1);
            } else if (strlen("" . $previous + 1) == 2) {
                $previous = ($previous + 1);
            }
        } else {
            $previous = "1";
        }
        return $suffix . $previous;
    }

}

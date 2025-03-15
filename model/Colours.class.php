<?php

class Colours {

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

    public function getAllColours() {
        $query = "SELECT * FROM colours_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getColoursByNo($colours_code_ct) {
        $query = "SELECT * FROM colours_tbl WHERE colours_code_ct='" . $colours_code_ct . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getSheetByNo($pattern_no_ct) {
        $query_t01 = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND colours_code_ct='T01'   ";
        $query_t02 = "SELECT * FROM  colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND colours_code_ct='T02'   ";
        $result_t01 = $this->mysqli->query($query_t01);
        $result_t02 = $this->mysqli->query($query_t02);
        $num_result_t01 = $result_t01->num_rows;
        $num_result_t02 = $result_t02->num_rows;
        $top = $num_result_t01 + $num_result_t02;
        if ($top > 0) {
            $sheets = ($top == "1") ? '6' : '7';
            return $sheets;
        } else {
            return '6';
        }
    }
    
    
       public function getcoloursSheetByNo($pattern_no_ct) {
        $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND (colours_code_ct!='T01' AND  colours_code_ct!='T02')  GROUP BY colours_code_ct ";
        $result = $this->mysqli->query($query);     
        $num_result = $result->num_rows;         
        return $num_result;
      
    }
    
       public function NumberTopCoatgetSheetByNo($pattern_no_ct) {
        $query_t01 = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND colours_code_ct='T01'   ";
        $query_t02 = "SELECT * FROM  colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND colours_code_ct='T02'   ";
        $result_t01 = $this->mysqli->query($query_t01);
        $result_t02 = $this->mysqli->query($query_t02);
        $num_result_t01 = $result_t01->num_rows;
        $num_result_t02 = $result_t02->num_rows;
        $top = $num_result_t01 + $num_result_t02;
        
        return $top;
//        if ($top > 0) {
//            $sheets = ($top == "1") ? '6' : '7';
//            return $sheets;
//        } else {
//            return '6';
//        }
    }

    public function getColoursCodeByPatternNoId($id) {
        $la = array();
        $query = "SELECT * FROM colours_tbl WHERE id='" . $id . "'     ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_no_ct'], $rows['colours_code_ct'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeByPatternNo($pattern_no_ct, $colours_code_ct) {
        $la = array();
        $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  colours_code_ct='" . $colours_code_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_no_ct'], $rows['colours_code_ct'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getColoursCusumpationPatternNo($pattern_no_ct, $colours_code_ct) {
        $la = array();
        //  $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='000M218'   AND  colours_code_ct='S01'  LIMIT 1  ";
        $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  colours_code_ct='" . $colours_code_ct . "'    LIMIT 1 ";



        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_no_ct'], $rows['colours_code_ct'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeByPatternNoList($pattern_no_ct, $colours_code_ct) {
        $la = array();
        $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  colours_code_ct='" . $colours_code_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_no_ct'], $rows['colours_code_ct'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeIndexByPatternNo($pattern_no_ct, $pigment_name_ct, $qty_ct) {
        $la = array();
        $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  pigment_name_ct='" . $pigment_name_ct . "'  AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_no_ct'], $rows['pattern_no_ct'], $rows['colours_code_ct'], $rows['colours_name_ct'], $rows['pigment_name_ct'], $rows['qty_ct'], $rows['item01_ct'], $rows['item02_ct'], $rows['item03_ct'], $rows['item04_ct'], $rows['item05_ct'], $rows['is_edit_ct'], $rows['org_name_ct'], $rows['org_date_ct'], $rows['org_time_ct']
                );
            }
            return $la;
        }
    }

    public function getColoursCodeIndexConfrimByPatternNo($pattern_no_ct, $pigment_name_ct, $qty_ct) {
        $la = array();
        $query = "SELECT * FROM colours_tbl WHERE pattern_no_ct='" . $pattern_no_ct . "'   AND  pigment_name_ct='" . $pigment_name_ct . "'  AND  qty_ct='" . $qty_ct . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getpatternNameByNo($pigment_name_ct, $qty_ct) {
        $query = "SELECT * FROM colours_tbl WHERE pigment_name_ct='" . $pigment_name_ct . "'   AND  qty_ct='" . $qty_ct . "'  ";
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

    public function confirmColoursEntity($colours_code_ct) {
        $res = "SELECT*FROM colours_tbl WHERE colours_code_ct = '" . $colours_code_ct . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewColours(
            $id, $ref_no_ct, $pattern_no_ct, $colours_code_ct, $colours_name_ct, $pigment_name_ct, $qty_ct, $item01_ct, $item02_ct, $item03_ct, $item04_ct, $item05_ct, $is_edit_ct, $org_name_ct, $org_date_ct, $org_time_ct
    ) {


        $res = "INSERT INTO colours_tbl  SET
                id='" . $id . "',
                ref_no_ct ='" . $ref_no_ct . "',
                pattern_no_ct ='" . $pattern_no_ct . "',
                colours_code_ct ='" . $colours_code_ct . "',
                colours_name_ct ='" . $colours_name_ct . "',
                pigment_name_ct ='" . $pigment_name_ct . "',
                qty_ct ='" . $qty_ct . "',
                item01_ct ='" . $item01_ct . "',
                item02_ct ='" . $item02_ct . "',
                item03_ct ='" . $item03_ct . "',
                item04_ct ='" . $item04_ct . "',
                item05_ct ='" . $item05_ct . "',
                is_edit_ct ='" . $is_edit_ct . "',
                org_name_ct ='" . $org_name_ct . "',
                org_date_ct ='" . $org_date_ct . "',
                org_time_ct ='" . $org_time_ct . "'
		 ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateColours(
            $id, $ref_no_ct, $pattern_no_ct, $colours_code_ct, $colours_name_ct, $pigment_name_ct, $qty_ct, $item01_ct, $item02_ct, $item03_ct, $item04_ct, $item05_ct, $is_edit_ct, $org_name_ct, $org_date_ct, $org_time_ct
    ) {

        $res = "UPDATE colours_tbl SET
                id='" . $id . "',
                ref_no_ct ='" . $ref_no_ct . "',
                pattern_no_ct ='" . $pattern_no_ct . "',
                colours_code_ct ='" . $colours_code_ct . "',
                colours_name_ct ='" . $colours_name_ct . "',
                pigment_name_ct ='" . $pigment_name_ct . "',
                qty_ct ='" . $qty_ct . "',
                item01_ct ='" . $item01_ct . "',
                item02_ct ='" . $item02_ct . "',
                item03_ct ='" . $item03_ct . "',
                item04_ct ='" . $item04_ct . "',
                item05_ct ='" . $item05_ct . "',
                is_edit_ct ='" . $is_edit_ct . "',
                org_name_ct ='" . $org_name_ct . "',
                org_date_ct ='" . $org_date_ct . "',
                org_time_ct ='" . $org_time_ct . "'

		        WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);
      

        if ($result) {
            return true;
        }
    }

    public function deleteColours($id) {
        $query = "DELETE FROM colours_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getColoursById($pattern_no_pt) {
        $query = "SELECT colours_code_ct FROM colours_tbl WHERE  pattern_no_ct='" . $pattern_no_pt . "' AND  colours_code_ct!='T01' AND  colours_code_ct!='T02'  group by colours_code_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['colours_code_ct'] . "' >" . $rows['colours_code_ct'] . "</option>");
            }
        }
    }
    
    
         public function getPigmentList() {
        $query = "SELECT pigment_name_ct FROM colours_tbl  group by pigment_name_ct";

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pigment_name_ct'] . "' >" . $rows['pigment_name_ct'] . "</option>");
            }
        }
    }

    public function getNextColoursRefNo($table, $suffix) {
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

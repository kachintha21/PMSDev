<?php

class ColorSeparation {

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

    public function getAllColorSeparation() {
        $query = "SELECT * FROM color_separation_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getColorSeparationByNo($id) {
        $la = array();
        $query = "SELECT*FROM color_separation_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_sc'], $rows['pro_no_fot'], $rows['lot_fot'], $rows['sheets_fot'], $rows['judgment_sc'], $rows['ffinish_date_fot'], $rows['colour_print_date_fot'], $rows['print_plan_date_fot'], $rows['layout_maker_fot'], $rows['layout_Check_fot'], $rows['is_edit_fot'], $rows['item01_fot'], $rows['item02_fot'], $rows['item03_fot'], $rows['item04_fot'], $rows['item05_fot'], $rows['item06_fot'], $rows['item07_fot'], $rows['item08_fot'], $rows['item09_fot'], $rows['item10_fot'], $rows['org_name_fot'], $rows['org_date_sc'], $rows['org_time_fot']
                );
            }
            return $la;
        }
    }

  

    public function getDailyOutPutQtyColorSeparation($date, $mname) {
        $query = "SELECT org_date_sc,COUNT(*) AS t FROM color_separation_tbl WHERE org_date_sc='" . $date . "' AND judgment_sc='OK'  AND  pattern_no_sc='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }
    
    
    
        public function getWipColorSeparation($mname) {
         $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro02_pt='1' AND  pattern_no_pt='" . $mname . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }
    
    
    
    
    

    public function confirmColorSeparationEntity($ref_no_plt) {
        $res = "SELECT*FROM color_separation_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewColorSeparation(
        $id,	
        $pro_no_sc,	
        $pattern_no_sc,	
        $lot_no_sc,	
        $judgment_sc,	
        $is_edit_sc,	
        $item01_sc,	
        $item02_sc,	
        $item03_sc,	
        $item04_sc,	
        $item05_sc,	
        $org_name_sc,	
        $org_date_sc,	
        $org_time_sc

    ) {



        $res = "INSERT INTO color_separation_tbl  SET
                        id='".$id."',
                        pro_no_sc='".$pro_no_sc."',
                        pattern_no_sc='".$pattern_no_sc."',
                        lot_no_sc='".$lot_no_sc."',
                        judgment_sc='".$judgment_sc."',
                        is_edit_sc='".$is_edit_sc."',
                        item01_sc='".$item01_sc."',
                        item02_sc='".$item02_sc."',
                        item03_sc='".$item03_sc."',
                        item04_sc='".$item04_sc."',
                        item05_sc='".$item05_sc."',
                        org_name_sc='".$org_name_sc."',
                        org_date_sc='".$org_date_sc."',
                        org_time_sc='".$org_time_sc."'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateColorSeparation(
        $id,	
        $pro_no_sc,	
        $pattern_no_sc,	
        $lot_no_sc,	
        $judgment_sc,	
        $is_edit_sc,	
        $item01_sc,	
        $item02_sc,	
        $item03_sc,	
        $item04_sc,	
        $item05_sc,	
        $org_name_sc,	
        $org_date_sc,	
        $org_time_sc
    ) {

        $res = mysql_query("UPDATE color_separation_tbl SET
                       id='".$id."',
                        pro_no_sc='".$pro_no_sc."',
                        pattern_no_sc='".$pattern_no_sc."',
                        lot_no_sc='".$lot_no_sc."',
                        judgment_sc='".$judgment_sc."',
                        is_edit_sc='".$is_edit_sc."',
                        item01_sc='".$item01_sc."',
                        item02_sc='".$item02_sc."',
                        item03_sc='".$item03_sc."',
                        item04_sc='".$item04_sc."',
                        item05_sc='".$item05_sc."',
                        org_name_sc='".$org_name_sc."',
                        org_date_sc='".$org_date_sc."',
                        org_time_sc='".$org_time_sc."',

	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteColorSeparation($id) {
        $query = "DELETE FROM color_separation_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextColorSeparationRefNo($table, $suffix) {
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

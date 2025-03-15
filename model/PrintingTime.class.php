<?php

class PrintingTime {
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

    public function getAllPrintingTime() {
        $query = "SELECT * FROM printing_time_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPrintingTimeByNo($ref_no_plt) {
        $query = "SELECT * FROM printing_time_tbl WHERE ref_no_plt='" . $ref_no_plt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPrintingTimeEntity($ref_no_plt) {
        $res = "SELECT*FROM printing_time_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPrintingTime(
        $id,	
        $ref_no_ptt,	
        $pattern_no_ptt,	
        $pro_no_ptt,	
        $lot_no_ptt,	
        $color_ptt,	
        $print_date_ptt,	
        $is_edit_ptt,	
        $item01_ptt,	
        $item02_ptt,	
        $item03_ptt,	
        $item04_ptt,	
        $item05_ptt,	
        $org_name_ptt,	
        $org_date_ptt,	
        $org_time_ptt	

    ) {



        $res = "INSERT INTO printing_time_tbl  SET
        id='".$id."',
        ref_no_ptt='".$ref_no_ptt."',
        pattern_no_ptt='".$pattern_no_ptt."',
        pro_no_ptt='".$pro_no_ptt."',
        lot_no_ptt='".$lot_no_ptt."',
        color_ptt='".$color_ptt."',
        print_date_ptt='".$print_date_ptt."',
        is_edit_ptt='".$is_edit_ptt."',
        item01_ptt='".$item01_ptt."',
        item02_ptt='".$item02_ptt."',
        item03_ptt='".$item03_ptt."',
        item04_ptt='".$item04_ptt."',
        item05_ptt='".$item05_ptt."',
        org_name_ptt='".$org_name_ptt."',
        org_date_ptt='".$org_date_ptt."',
        org_time_ptt='".$org_time_ptt."'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePrintingTime(
        $id,	
        $ref_no_ptt,	
        $pattern_no_ptt,	
        $pro_no_ptt,	
        $lot_no_ptt,	
        $color_ptt,	
        $print_date_ptt,	
        $is_edit_ptt,	
        $item01_ptt,	
        $item02_ptt,	
        $item03_ptt,	
        $item04_ptt,	
        $item05_ptt,	
        $org_name_ptt,	
        $org_date_ptt,	
        $org_time_ptt
            
            
	

    ) {

        $res = mysql_query("UPDATE printing_time_tbl SET
               id='".$id."',
              ref_no_ptt='".$ref_no_ptt."',
              pattern_no_ptt='".$pattern_no_ptt."',
              pro_no_ptt='".$pro_no_ptt."',
              lot_no_ptt='".$lot_no_ptt."',
              color_ptt='".$color_ptt."',
              print_date_ptt='".$print_date_ptt."',
              is_edit_ptt='".$is_edit_ptt."',
              item01_ptt='".$item01_ptt."',
              item02_ptt='".$item02_ptt."',
              item03_ptt='".$item03_ptt."',
              item04_ptt='".$item04_ptt."',
              item05_ptt='".$item05_ptt."',
              org_name_ptt='".$org_name_ptt."',
              org_date_ptt='".$org_date_ptt."',
              org_time_ptt='".$org_time_ptt."',


	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePrintingTime($id) {
        $query = "DELETE FROM printing_time_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }
    
    

    

    public function getNextPrintingTimeRefNo($table, $suffix) {
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

<?php

class DefectsCategories {

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

    public function getAllDefectsCategories() {
        $query = "SELECT * FROM defects_categories_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function geDefectsCategoriestByNo($id) {
        $la = array();
        $query = "SELECT*FROM planed_qty_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_dt'], $rows['pro_no_dt'], $rows['lot_no_dt'], $rows['printing_qty_dt'], $rows['printing_lines_dt'], $rows['paper_size_dt'], $rows['delivery_date_dt'], $rows['no_of_box_dt'], $rows['top_coat_thickness_dt'], $rows['offset_dt'], $rows['screen_dt'], $rows['inspection_sheets_dt'], $rows['first_class_qt_dt'], $rows['second_class_qty_dt'], $rows['defective_sheets_dt'], $rows['converted_1st_class_qty_qt'], $rows['order_sheet_qty_dt'], $rows['is_edit_dt'], $rows['judgment_dt'], $rows['remarks_dt'], $rows['item01_dt'], $rows['item02_dt'], $rows['item03_dt'], $rows['item04_dt'], $rows['item05_dt'], $rows['item06_dt'], $rows['item07_dt'], $rows['item08_dt'], $rows['item09_dt'], $rows['item10_dt'], $rows['org_name_dt'], $rows['org_date_dt'], $rows['org_time_dt']
                );
            }
            return $la;
        }
    }

 



    public function confirmDefectsCategoriesEntity($curve_no_ymt) {
        $res = "SELECT*FROM defects_categories_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewDefectsCategories(
    $id, $ref_code_dct, $pattern_no_dct, $pro_no_dct, $lot_no_dct, $printing_qty_dct, $register_dct, $line_dct, $pinhole_dct, $emboss_dct, $topcoat_dct, $dust_dct, $other_dct, $color_dct, $pinhole_repair_dct, $topcoat_repair_dct, $item01_dct, $item02_dct, $item03_dct, $item04_dct, $item05_dct, $org_name_dct, $org_date_dct, $org_time_dct
    ) {



        $res = "INSERT INTO defects_categories_tbl  SET
                    ref_code_dct='" . $ref_code_dct . "',
                    pattern_no_dct='" . $pattern_no_dct . "',
                    pro_no_dct='" . $pro_no_dct . "',
                    lot_no_dct='" . $lot_no_dct . "',
                    printing_qty_dct='" . $printing_qty_dct . "',
                    register_dct='" . $register_dct . "',
                    line_dct='" . $line_dct . "',
                    pinhole_dct='" . $pinhole_dct . "',
                    emboss_dct='" . $emboss_dct . "',
                    topcoat_dct='" . $topcoat_dct . "',
                    dust_dct='" . $dust_dct . "',
                    other_dct='" . $other_dct . "',
                    color_dct='" . $color_dct . "',
                    pinhole_repair_dct='" . $pinhole_repair_dct . "',
                    topcoat_repair_dct='" . $topcoat_repair_dct . "',
                    item01_dct='" . $item01_dct . "',
                    item02_dct='" . $item02_dct . "',
                    item03_dct='" . $item03_dct . "',
                    item04_dct='" . $item04_dct . "',
                    item05_dct='" . $item05_dct . "',
                    org_name_dct='" . $org_name_dct . "',
                    org_date_dct='" . $org_date_dct . "',
                    org_time_dct='" . $org_time_dct . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDefectsCategories(
    $id, $ref_code_dct, $pattern_no_dct, $pro_no_dct, $lot_no_dct, $printing_qty_dct, $register_dct, $line_dct, $pinhole_dct, $emboss_dct, $topcoat_dct, $dust_dct, $other_dct, $color_dct, $pinhole_repair_dct, $topcoat_repair_dct, $item01_dct, $item02_dct, $item03_dct, $item04_dct, $item05_dct, $org_name_dct, $org_date_dct, $org_time_dct
    ) {

        $res = mysql_query("UPDATE defects_categories_tbl SET
        	                ref_code_dct='" . $ref_code_dct . "',
                    pattern_no_dct='" . $pattern_no_dct . "',
                    pro_no_dct='" . $pro_no_dct . "',
                    lot_no_dct='" . $lot_no_dct . "',
                    printing_qty_dct='" . $printing_qty_dct . "',
                    register_dct='" . $register_dct . "',
                    line_dct='" . $line_dct . "',
                    pinhole_dct='" . $pinhole_dct . "',
                    emboss_dct='" . $emboss_dct . "',
                    topcoat_dct='" . $topcoat_dct . "',
                    dust_dct='" . $dust_dct . "',
                    other_dct='" . $other_dct . "',
                    color_dct='" . $color_dct . "',
                    pinhole_repair_dct='" . $pinhole_repair_dct . "',
                    topcoat_repair_dct='" . $topcoat_repair_dct . "',
                    item01_dct='" . $item01_dct . "',
                    item02_dct='" . $item02_dct . "',
                    item03_dct='" . $item03_dct . "',
                    item04_dct='" . $item04_dct . "',
                    item05_dct='" . $item05_dct . "',
                    org_name_dct='" . $org_name_dct . "',
                    org_date_dct='" . $org_date_dct . "',
                    org_time_dct='" . $org_time_dct . "'
		WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteDefectsCategories($id) {
        $query = "DELETE FROM defects_categories_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

  

    public function getNextDefectsCategoriesRefNo($table, $suffix) {
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

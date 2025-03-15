<?php

class DecalInspection {

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

    public function getAllDecalInspection() {
        $query = "SELECT * FROM decal_inspection_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getWipDecalInspection() {
        $query = "SELECT pro06_pst FROM printing_status_tbl WHERE pro07_pst='1'   GROUP BY   ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getDailyOutPutQtyDecalInspection($date) {
        $query = "SELECT org_date_dt FROM decal_inspection_tbl WHERE org_date_dt='" . $date . "'  GROUP BY  lot_no_dt   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function getPlanedQtyByNo($id) {
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

    public function getDecalInspectionByNo($curve_no_ymt) {
        $query = "SELECT * FROM decal_inspection_tbl WHERE curve_no_ymt='" . $curve_no_ymt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getDecalNumberByRefNo($fg_design_no_ymt, $curve_no_ymt) {
        $query = " SELECT decal_design_no_ymt FROM decal_inspection_tbl WHERE fg_design_no_ymt='" . $fg_design_no_ymt . "'  AND curve_no_ymt='" . $curve_no_ymt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['decal_design_no_ymt'];
            }
        } else {
            return "-";
        }
    }

    public function confirmDecalInspectionEntity($curve_no_ymt) {
        $res = "SELECT*FROM decal_inspection_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewDecalInspection(
    $id, $pattern_no_dt, $pro_no_dt, $lot_no_dt, $printing_qty_dt, $printing_lines_dt, $paper_size_dt, $delivery_date_dt, $no_of_box_dt, $top_coat_thickness_dt, $offset_dt, $screen_dt, $inspection_sheets_dt, $first_class_qt_dt, $second_class_qty_dt, $defective_sheets_dt, $converted_1st_class_qty_qt, $order_sheet_qty_dt, $is_edit_dt, $judgment_dt, $remarks_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $item06_dt, $item07_dt, $item08_dt, $item09_dt, $item10_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {



        $res = "INSERT INTO decal_inspection_tbl  SET
                    id='" . $id . "',
	        pattern_no_dt='" . $pattern_no_dt . "',
                pro_no_dt='" . $pro_no_dt . "',
                lot_no_dt='" . $lot_no_dt . "',
                printing_qty_dt='" . $printing_qty_dt . "',
                printing_lines_dt='" . $printing_lines_dt . "',
                paper_size_dt='" . $paper_size_dt . "',
                delivery_date_dt='" . $delivery_date_dt . "',
                no_of_box_dt='" . $no_of_box_dt . "',
                top_coat_thickness_dt='" . $top_coat_thickness_dt . "',
                offset_dt='" . $offset_dt . "',
                screen_dt='" . $screen_dt . "',
                inspection_sheets_dt='" . $inspection_sheets_dt . "',
                first_class_qt_dt='" . $first_class_qt_dt . "',
                second_class_qty_dt='" . $second_class_qty_dt . "',
                defective_sheets_dt='" . $defective_sheets_dt . "',
                converted_1st_class_qty_qt='" . $converted_1st_class_qty_qt . "',
                order_sheet_qty_dt='" . $order_sheet_qty_dt . "',
                is_edit_dt='" . $is_edit_dt . "',
                judgment_dt='" . $judgment_dt . "',
                remarks_dt='" . $remarks_dt . "',
                item01_dt='" . $item01_dt . "',
                item02_dt='" . $item02_dt . "',
                item03_dt='" . $item03_dt . "',
                item04_dt='" . $item04_dt . "',
                item05_dt='" . $item05_dt . "',
                item06_dt='" . $item06_dt . "',
                item07_dt='" . $item07_dt . "',
                item08_dt='" . $item08_dt . "',
                item09_dt='" . $item09_dt . "',
                item10_dt='" . $item10_dt . "',
                org_name_dt='" . $org_name_dt . "',
                org_date_dt='" . $org_date_dt . "',
                org_time_dt='" . $org_time_dt . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDecalInspection(
    $id, $pattern_no_dt, $pro_no_dt, $lot_no_dt, $printing_qty_dt, $printing_lines_dt, $paper_size_dt, $delivery_date_dt, $no_of_box_dt, $top_coat_thickness_dt, $offset_dt, $screen_dt, $inspection_sheets_dt, $first_class_qt_dt, $second_class_qty_dt, $defective_sheets_dt, $converted_1st_class_qty_qt, $order_sheet_qty_dt, $is_edit_dt, $judgment_dt, $remarks_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $item06_dt, $item07_dt, $item08_dt, $item09_dt, $item10_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {

        $res = mysql_query("UPDATE decal_inspection_tbl SET
        	pattern_no_dt='" . $pattern_no_dt . "',
                pro_no_dt='" . $pro_no_dt . "',
                lot_no_dt='" . $lot_no_dt . "',
                printing_qty_dt='" . $printing_qty_dt . "',
                printing_lines_dt='" . $printing_lines_dt . "',
                paper_size_dt='" . $paper_size_dt . "',
                delivery_date_dt='" . $delivery_date_dt . "',
                no_of_box_dt='" . $no_of_box_dt . "',
                top_coat_thickness_dt='" . $top_coat_thickness_dt . "',
                offset_dt='" . $offset_dt . "',
                screen_dt='" . $screen_dt . "',
                inspection_sheets_dt='" . $inspection_sheets_dt . "',
                first_class_qt_dt='" . $first_class_qt_dt . "',
                second_class_qty_dt='" . $second_class_qty_dt . "',
                defective_sheets_dt='" . $defective_sheets_dt . "',
                converted_1st_class_qty_qt='" . $converted_1st_class_qty_qt . "',
                order_sheet_qty_dt='" . $order_sheet_qty_dt . "',
                is_edit_dt='" . $is_edit_dt . "',
                judgment_dt='" . $judgment_dt . "',
                remarks_dt='" . $remarks_dt . "',
                item01_dt='" . $item01_dt . "',
                item02_dt='" . $item02_dt . "',
                item03_dt='" . $item03_dt . "',
                item04_dt='" . $item04_dt . "',
                item05_dt='" . $item05_dt . "',
                item06_dt='" . $item06_dt . "',
                item07_dt='" . $item07_dt . "',
                item08_dt='" . $item08_dt . "',
                item09_dt='" . $item09_dt . "',
                item10_dt='" . $item10_dt . "',
                org_name_dt='" . $org_name_dt . "',
                org_date_dt='" . $org_date_dt . "',
                org_time_dt='" . $org_time_dt . "'
		WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteDecalInspection($id) {
        $query = "DELETE FROM decal_inspection_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getDecalInspectionAeraById($id) {
        $query = "SELECT silver_area_dt FROM decal_inspection_tbl WHERE curve_no_ymt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextDecalInspectionRefNo($table, $suffix) {
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

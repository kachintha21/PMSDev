<?php
class Curve {
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

    public function getAllCurve() {
        $query = "SELECT * FROM data_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getCurveByNo($design_no_ot) {
        $query = "SELECT * FROM data_tbl WHERE design_no_ot='" . $design_no_ot . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmCurveEntity($design_no_ot) {
        $res = "SELECT*FROM data_tbl WHERE design_no_ot = '" . $design_no_ot . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewCurve(
    $id, $patt_no_dt, $customer_dt, $item_no_dt, $curve_no_dt, $parts_dt, $abc_curve_dt, $esagari_dt, $nobi_dt, $cw_dt, $curve_type_dt, $radius_dt, $unit_dt, $hair_line_dt, $back_stamp_dt, $firing_dt, $market_dt, $job_type_dt, $making_date_dt, $factory_dt, $decal_patt_dt, $note_dt, $curve_area_dt, $silver_area_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $item06_dt, $item08_dt, $item09_dt, $item10_dt, $is_edit_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {



        $res = "INSERT INTO data_tbl  SET
                id='" . $id . "',
                patt_no_dt='" . $patt_no_dt . "',
                customer_dt='" . $customer_dt . "',
                item_no_dt='" . $item_no_dt . "',
                curve_no_dt='" . $curve_no_dt . "',
                parts_dt='" . $parts_dt . "',
                abc_curve_dt='" . $abc_curve_dt . "',
                esagari_dt='" . $esagari_dt . "',
                nobi_dt='" . $nobi_dt . "',
                cw_dt='" . $cw_dt . "',
                curve_type_dt='" . $curve_type_dt . "',
                radius_dt='" . $radius_dt . "',
                unit_dt='" . $unit_dt . "',
                hair_line_dt='" . $hair_line_dt . "',
                back_stamp_dt='" . $back_stamp_dt . "',
                firing_dt='" . $firing_dt . "',
                market_dt='" . $market_dt . "',
                job_type_dt='" . $job_type_dt . "',
                making_date_dt='" . $making_date_dt . "',
                factory_dt='" . $factory_dt . "',
                decal_patt_dt='" . $decal_patt_dt . "',
                note_dt='" . $note_dt . "',
                curve_area_dt='" . $curve_area_dt . "',
                silver_area_dt='" . $silver_area_dt . "',
                item01_dt='" . $item01_dt . "',
                item02_dt='" . $item02_dt . "',
                item03_dt='" . $item03_dt . "',
                item04_dt='" . $item04_dt . "',
                item05_dt='" . $item05_dt . "',
                item06_dt='" . $item06_dt . "',
                item08_dt='" . $item08_dt . "',
                item09_dt='" . $item09_dt . "',
                item10_dt='" . $item10_dt . "',
                is_edit_dt='" . $is_edit_dt . "',
                org_name_dt='" . $org_name_dt . "',
                org_date_dt='" . $org_date_dt . "',
                org_time_dt='" . $org_time_dt . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateCurve(
    $id, $patt_no_dt, $customer_dt, $item_no_dt, $curve_no_dt, $parts_dt, $abc_curve_dt, $esagari_dt, $nobi_dt, $cw_dt, $curve_type_dt, $radius_dt, $unit_dt, $hair_line_dt, $back_stamp_dt, $firing_dt, $market_dt, $job_type_dt, $making_date_dt, $factory_dt, $decal_patt_dt, $note_dt, $curve_area_dt, $silver_area_dt, $item01_dt, $item02_dt, $item03_dt, $item04_dt, $item05_dt, $item06_dt, $item08_dt, $item09_dt, $item10_dt, $is_edit_dt, $org_name_dt, $org_date_dt, $org_time_dt
    ) {

        $res = mysql_query("UPDATE data_tbl SET
		             id='" . $id . "',
                            patt_no_dt='" . $patt_no_dt . "',
                            customer_dt='" . $customer_dt . "',
                            item_no_dt='" . $item_no_dt . "',
                            curve_no_dt='" . $curve_no_dt . "',
                            parts_dt='" . $parts_dt . "',
                            abc_curve_dt='" . $abc_curve_dt . "',
                            esagari_dt='" . $esagari_dt . "',
                            nobi_dt='" . $nobi_dt . "',
                            cw_dt='" . $cw_dt . "',
                            curve_type_dt='" . $curve_type_dt . "',
                            radius_dt='" . $radius_dt . "',
                            unit_dt='" . $unit_dt . "',
                            hair_line_dt='" . $hair_line_dt . "',
                            back_stamp_dt='" . $back_stamp_dt . "',
                            firing_dt='" . $firing_dt . "',
                            market_dt='" . $market_dt . "',
                            job_type_dt='" . $job_type_dt . "',
                            making_date_dt='" . $making_date_dt . "',
                            factory_dt='" . $factory_dt . "',
                            decal_patt_dt='" . $decal_patt_dt . "',
                            note_dt='" . $note_dt . "',
                            curve_area_dt='" . $curve_area_dt . "',
                            silver_area_dt='" . $silver_area_dt . "',
                            item01_dt='" . $item01_dt . "',
                            item02_dt='" . $item02_dt . "',
                            item03_dt='" . $item03_dt . "',
                            item04_dt='" . $item04_dt . "',
                            item05_dt='" . $item05_dt . "',
                            item06_dt='" . $item06_dt . "',
                            item08_dt='" . $item08_dt . "',
                            item09_dt='" . $item09_dt . "',
                            item10_dt='" . $item10_dt . "',
                            is_edit_dt='" . $is_edit_dt . "',
                            org_name_dt='" . $org_name_dt . "',
                            org_date_dt='" . $org_date_dt . "',
                            org_time_dt='" . $org_time_dt . "'
		            WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }
    
    
    
    

    public function deleteCurve($id) {
        $query = "DELETE FROM data_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getCurveAeraById($id) {
        $query = "SELECT silver_area_dt FROM data_tbl WHERE curve_no_dt='".$id."' ";
        $result = $this->mysqli->query($query);
        if ($result) {
         
                $row = $result->fetch_assoc();
                return $row["silver_area_dt"];
       
        } else {
            return $id;
        }
    }
    
    
    

    public function getNextCurveRefNo($table, $suffix) {
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

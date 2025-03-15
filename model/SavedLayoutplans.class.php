<?php

class SavedLayoutplans {

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

    public function getAllSavedLayoutplans() {
        $query = "SELECT * FROM saved_layout_plans_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getSavedLayoutplansByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM saved_layout_plans_tbl WHERE layout='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_id'], $rows['layout'], $rows['design'], $rows['schedule'], $rows['curve_no'], $rows['curve_area'], $rows['planned_qty'], $rows['no_of_curves'], $rows['no_of_sheets'], $rows['close_curve_after'], $rows['total_sheets_needed'], $rows['created_date'], $rows['status']
                );
            }
            return $la;
        }
    }

    public function getSavedLayoutplansGroupByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM saved_layout_plans_tbl WHERE layout='" . $id . "' GROUP BY  layout ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_id'], $rows['layout'], $rows['design'], $rows['schedule'], $rows['curve_no'], $rows['curve_area'], $rows['planned_qty'], $rows['no_of_curves'], $rows['no_of_sheets'], $rows['close_curve_after'], $rows['total_sheets_needed'], $rows['created_date'], $rows['status']
                );
            }
            return $la;
        }
    }
    
    
    
    
    public function getMaxSheetQtyByLotNo($id) {
        $la = array();
        $query = "SELECT max(no_of_sheets) as t FROM saved_layout_plans_tbl WHERE layout='" . $id . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
           
                  return $rows['t'];

           
            }
           
        }
    }
    
    
    
    
    

    public function getSavedLayoutplansById($id) {
        $la = array();
        $query = "SELECT * FROM saved_layout_plans_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'], $rows['ref_id'], $rows['layout'], $rows['design'], $rows['schedule'], $rows['curve_no'], $rows['curve_area'], $rows['planned_qty'], $rows['no_of_curves'], $rows['no_of_sheets'], $rows['close_curve_after'], $rows['total_sheets_needed'], $rows['created_date'], $rows['status']
                );
            }
            return $la;
        }
    }

    public function getSavedLayoutplansByNo($layout) {
        $query = "SELECT * FROM saved_layout_plans_tbl WHERE layout='" . $layout . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmSavedLayoutplansEntity($layout) {
        $res = "SELECT*FROM saved_layout_plans_tbl WHERE layout = '" . $layout . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewSavedLayoutplans(
    $id, $ref_id, $layout, $design, $schedule, $curve_no, $curve_area, $planned_qty, $no_of_curves, $no_of_sheets, $close_curve_after, $total_sheets_needed, $created_date, $status
    ) {



        $res = "INSERT INTO saved_layout_plans_tbl  SET
	   id='" . $id . "',
                    ref_id='" . $ref_id . "',
                    layout='" . $layout . "',
                    design='" . $design . "',
                    schedule='" . $schedule . "',     
                    curve_no='" . $curve_no . "',
                    curve_area='" . $curve_area . "',
                    planned_qty='" . $planned_qty . "',
                    no_of_curves='" . $no_of_curves . "',
                    no_of_sheets='" . $no_of_sheets . "',
                    close_curve_after='" . $close_curve_after . "',
                    total_sheets_needed='" . $total_sheets_needed . "',
                    created_date='" . $created_date . "',
                    status='" . $status . "'    
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateSavedLayoutplans(
    $id, $ref_id, $layout, $design,$schedule, $curve_no, $curve_area, $planned_qty, $no_of_curves, $no_of_sheets, $close_curve_after, $total_sheets_needed,$status, $created_date
    ) {

       

        $res = "UPDATE saved_layout_plans_tbl SET
	             layout='" . $layout . "',
                    design='" . $design . "',
                    schedule='" . $schedule . "',         
                    curve_no='" . $curve_no . "',
                    planned_qty='" . $planned_qty . "',
                    no_of_curves='" . $no_of_curves . "',
                    no_of_sheets='" . $no_of_sheets . "',
                    close_curve_after='" . $close_curve_after . "',
                    total_sheets_needed='" . $total_sheets_needed . "',
                    created_date='" . $created_date . "',
                    status='" . $status . "' 
              
		    WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteSavedLayoutplans($id) {
        $query = "DELETE FROM saved_layout_plans_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function updateMultipleSavedLayoutplans($id) {
        $query = "UPDATE saved_layout_plans_tbl SET status = '0' WHERE layout = '" . $id . "'";
        $result = $this->mysqli->query($query);
        if ($result) {
           
            return true;
        }
    }

    public function getSavedLayoutplansByLotNumber() {
        $query = "SELECT DISTINCT layout FROM saved_layout_plans_tbl ";
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

    public function getNextSavedLayoutplansRefNo($table, $suffix) {
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

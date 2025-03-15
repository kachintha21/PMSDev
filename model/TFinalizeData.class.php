<?php
 class FinalizeData {
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

    public function getAllFinalizeData() {
        $query = "SELECT * FROM finalize_data_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getFinalizeDataByNo($ref_no_fdt) {
        $query = "SELECT * FROM finalize_data_tbl WHERE ref_no_fdt='" . $ref_no_fdt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmFinalizeDataEntity($ref_no_fdt) {
        $res = "SELECT*FROM finalize_data_tbl WHERE ref_no_fdt = '" . $ref_no_fdt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewFinalizeData(
        $id,	
        $ref_no_fdt,	
        $design_fdt,	
        $curve_fdt,	
        $total_fdt,	
        $is_edit_fdt,	
        $item01_fdt,	
        $item02_fdt,	
        $item03_fdt,	
        $item04_fdt,	
        $item05_fdt,	
        $org_name_fdt,	
        $org_date_fdt,	
        $org_time_fdt
        
    ) {

        $res = "INSERT INTO finalize_data_tbl  SET
                ref_no_fdt='".$ref_no_fdt."',		
                design_fdt='".$design_fdt."',		
                curve_fdt='".$curve_fdt."',		
                total_fdt='".$total_fdt."',		
                is_edit_fdt='".$is_edit_fdt."',		
                item01_fdt='".$item01_fdt."',		
                item02_fdt='".$item02_fdt."',		
                item03_fdt='".$item03_fdt."',		
                item04_fdt='".$item04_fdt."',		
                item05_fdt='".$item05_fdt."',		
                org_name_fdt='".$org_name_fdt."',		
                org_date_fdt='".$org_date_fdt."',		
                org_time_fdt='".$org_time_fdt."'	
               ";
               

          
  

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    
    }

    public function updateFinalizeData(
        $id ,	
        $ref_no_fdt ,	
        $design_fdt ,	
        $curve_fdt ,	
        $total_fdt ,	
        $is_edit_fdt ,	
        $item01_fdt ,	
        $item02_fdt ,	
        $item03_fdt ,	
        $item04_fdt ,	
        $item05_fdt ,	
        $org_name_fdt ,	
        $org_date_fdt ,	
        $org_time_fdt	
        
    ) {

        $res = mysql_query("UPDATE finalize_data_tbl SET
		                            ref_no_fdt ='".$ref_no_fdt ."',		
                                    design_fdt ='".$design_fdt ."',		
                                    curve_fdt ='".$curve_fdt ."',		
                                    total_fdt ='".$total_fdt ."',		
                                    is_edit_fdt ='".$is_edit_fdt ."',		
                                    item01_fdt ='".$item01_fdt ."',		
                                    item02_fdt ='".$item02_fdt ."',		
                                    item03_fdt ='".$item03_fdt ."',		
                                    item04_fdt ='".$item04_fdt ."',		
                                    item05_fdt ='".$item05_fdt ."',		
                                    org_name_fdt ='".$org_name_fdt ."',		
                                    org_date_fdt ='".$org_date_fdt ."',		
                                    org_time_fdt='".$org_time_fdt."'	
		                         WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteFinalizeData($id) {
        $query = "DELETE FROM finalize_data_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getFinalizeDataAeraById($id) {
        $query = "SELECT silver_area_dt FROM finalize_data_tbl WHERE FinalizeData_no_dt='".$id."' ";
        $result = $this->mysqli->query($query);
        if ($result) {
         
                $row = $result->fetch_assoc();
                return $row["silver_area_dt"];
       
        } else {
            return $id;
        }
    }

    public function getNextFinalizeDataRefNo($table, $suffix) {
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

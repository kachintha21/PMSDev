<?php
class PigmentStock{

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

    public function getAllPigmentStock() {
        $query = "SELECT * FROM pigment_stock_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPigmentStockByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM pigment_stock_tbl WHERE item01_ps='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'],
                $rows['pattern_no_ps'],
                $rows['colour_Index_ps'],
                $rows['color_ps'],
                $rows['pigment_content_ps'],
                $rows['is_edit_ps'],
                $rows['item01_ps'],
                $rows['item02_ps'],
                $rows['item03_ps'],
                $rows['item04_ps'],
                $rows['item05_ps'],
                $rows['org_name_ps'],
                $rows['org_date_ps'],
                $rows['org_time_ps']
                
                );
            }
            return $la;
        }
    }
    
    
        public function getPigmentStockGroupByLotNo($id) {
        $la = array();
        $query = "SELECT * FROM pigment_stock_tbl WHERE item01_ps='" . $id . "' GROUP BY  item01_ps ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'],
                $rows['pattern_no_ps'],
                $rows['colour_Index_ps'],
                $rows['color_ps'],
                $rows['pigment_content_ps'],
                $rows['is_edit_ps'],
                $rows['item01_ps'],
                $rows['item02_ps'],
                $rows['item03_ps'],
                $rows['item04_ps'],
                $rows['item05_ps'],
                $rows['org_name_ps'],
                $rows['org_date_ps'],
                $rows['org_time_ps']
                );
            }
            return $la;
        }
    }
    
    
        public function getPigmentStockById($id) {
        $la = array();
        $query = "SELECT * FROM pigment_stock_tbl WHERE id='" . $id . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                array_push($la, $rows['id'],
                $rows['pattern_no_ps'],
                $rows['colour_Index_ps'],
                $rows['color_ps'],
                $rows['pigment_content_ps'],
                $rows['is_edit_ps'],
                $rows['item01_ps'],
                $rows['item02_ps'],
                $rows['item03_ps'],
                $rows['item04_ps'],
                $rows['item05_ps'],
                $rows['org_name_ps'],
                $rows['org_date_ps'],
                $rows['org_time_ps']
                );
            }
            return $la;
        }
    }
    
    
    

    public function getPigmentStockByNo($item01_ps) {
        $query = "SELECT * FROM pigment_stock_tbl WHERE item01_ps='" . $item01_ps . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPigmentStockEntity($item01_ps) {
        $res = "SELECT*FROM pigment_stock_tbl WHERE item01_ps = '" . $item01_ps . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentStock(
        $id,	
        $pattern_no_ps,	
        $colour_Index_ps,	
        $color_ps,	
        $pigment_content_ps,	
        $is_edit_ps,	
        $item01_ps,	
        $item02_ps,	
        $item03_ps,	
        $item04_ps,	
        $item05_ps,	
        $org_name_ps,	
        $org_date_ps,	
        $org_time_ps	
        
    ) {



        $res = "INSERT INTO pigment_stock_tbl  SET
            pattern_no_ps='".$pattern_no_ps."',
        colour_Index_ps='".$colour_Index_ps."',
        color_ps='".$color_ps."',
        pigment_content_ps='".$pigment_content_ps."',
        is_edit_ps='".$is_edit_ps."',
        item01_ps='".$item01_ps."',
        item02_ps='".$item02_ps."',
        item03_ps='".$item03_ps."',
        item04_ps='".$item04_ps."',
        item05_ps='".$item05_ps."',
        org_name_ps='".$org_name_ps."',
        org_date_ps='".$org_date_ps."',
        org_time_ps='".$org_time_ps."'
   
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentStock(
        $id,	
        $pattern_no_ps,	
        $colour_Index_ps,	
        $color_ps,	
        $pigment_content_ps,	
        $is_edit_ps,	
        $item01_ps,	
        $item02_ps,	
        $item03_ps,	
        $item04_ps,	
        $item05_ps,	
        $org_name_ps,	
        $org_date_ps,	
        $org_time_ps
    ) {

        
    

        $res = "UPDATE pigment_stock_tbl SET
	                       pattern_no_ps='".$pattern_no_ps."',
        colour_Index_ps='".$colour_Index_ps."',
        color_ps='".$color_ps."',
        pigment_content_ps='".$pigment_content_ps."',
        is_edit_ps='".$is_edit_ps."',
        item01_ps='".$item01_ps."',
        item02_ps='".$item02_ps."',
        item03_ps='".$item03_ps."',
        item04_ps='".$item04_ps."',
        item05_ps='".$item05_ps."',
        org_name_ps='".$org_name_ps."',
        org_date_ps='".$org_date_ps."',
        org_time_ps='".$org_time_ps."'
		    WHERE id='" . $id . "' ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentStock($id) {
        $query = "DELETE FROM pigment_stock_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getPigmentStockByLotNumber() {
        $query = "SELECT DISTINCT item01_ps FROM pigment_stock_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['item01_ps'] . "' >" . $rows['item01_ps'] . "</option>");
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

    public function getNextPigmentStockRefNo($table, $suffix) {
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

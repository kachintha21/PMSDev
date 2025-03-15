<?php

class virtualTimeStore {

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

    public function getvirtualTimeStoreByNo($id) {
        $la = array();
        $query = "SELECT*FROM virtua_time_store_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_vtst'], $rows['pro_no_vtst'], $rows['lot_vtst'], $rows['num_colors_vtst'], $rows['plan_colors_vtst'], $rows['machine_no_vtst'], $rows['date_vtst'], $rows['total_time_vtst'], $rows['qty_vtst'], $rows['status_vtst'], $rows['item01_vtst'], $rows['item02_vtst'], $rows['item03_vtst'], $rows['item04_vtst'], $rows['item05_vtst'], $rows['is_edit_vtst'], $rows['org_name_vtst'], $rows['org_date_vtst'], $rows['org_time_vtst']
                );
            }
            return $la;
        }
    }

    public function confirmvirtualTimeStoreEntity($ref_no_vpt) {
        $res = "SELECT*FROM virtua_time_store_tbl WHERE ref_no_vtst = '" . $ref_no_vpt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getFirstPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
       // $res = "SELECT sum(qty_vtst) As t FROM virtua_time_store_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
		 $res = "SELECT sum(qty_vtst) As t FROM virtua_time_store_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'   ";
		// print("SELECT sum(qty_vtst) As t FROM virtua_time_store_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'   ");exit;
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return round($rows['t'] / 20, 0);
        } else {
            return 0;
        }
      }
      
      
      
       public function getQtyFirstPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
       // $res = "SELECT sum(qty_vtst) As t FROM virtua_time_store_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "' AND plan_colors_vtst='S01'  ";
		 $res = "SELECT sum(qty_vtst) As t FROM virtua_time_store_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            //return round($rows['t'] / 20, 0);
                      return round($rows['t'], 0);
        } else {
            return 0;
        }
      }
      
      
      
    
        public function getPrintingVirtualTimeStoreByIndex($machine_no_vtst, $date_vtst) {
        $res = "SELECT sum(total_time_vtst) As t FROM virtua_time_store_tbl WHERE machine_no_vtst = '" . $machine_no_vtst . "'  AND  date_vtst = '" . $date_vtst . "'  ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return round($rows['t'], 0);
        } else {
            return 0;
        }
    }
    

    public function createNewvirtualTimeStore(
    $id, $ref_no_vtst, $pro_no_vtst, $lot_vtst, $num_colors_vtst, $plan_colors_vtst, $machine_no_vtst, $date_vtst, $total_time_vtst, $qty_vtst, $status_vtst, $item01_vtst, $item02_vtst, $item03_vtst, $item04_vtst, $item05_vtst, $is_edit_vtst, $org_name_vtst, $org_date_vtst, $org_time_vtst
    ) {

        $res = "INSERT INTO virtua_time_store_tbl  SET       
        ref_no_vtst='" . $ref_no_vtst . "',
        pro_no_vtst='" . $pro_no_vtst . "',
        lot_vtst='" . $lot_vtst . "',
        num_colors_vtst='" . $num_colors_vtst . "',
        plan_colors_vtst='" . $plan_colors_vtst . "',
        machine_no_vtst='" . $machine_no_vtst . "',
        date_vtst='" . $date_vtst . "',
        total_time_vtst='" . $total_time_vtst . "',
        qty_vtst='" . $qty_vtst . "',
        status_vtst='" . $status_vtst . "',
        item01_vtst='" . $item01_vtst . "',
        item02_vtst='" . $item02_vtst . "',
        item03_vtst='" . $item03_vtst . "',
        item04_vtst='" . $item04_vtst . "',
        item05_vtst='" . $item05_vtst . "',
        is_edit_vtst='" . $is_edit_vtst . "',
        org_name_vtst='" . $org_name_vtst . "',
        org_date_vtst='" . $org_date_vtst . "',
        org_time_vtst='" . $org_time_vtst . "'
         ";
        
    
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatevirtualTimeStore(
    $id, $ref_no_vtst, $pro_no_vtst, $lot_vtst, $num_colors_vtst, $plan_colors_vtst, $machine_no_vtst, $date_vtst, $total_time_vtst, $qty_vtst, $status_vtst, $item01_vtst, $item02_vtst, $item03_vtst, $item04_vtst, $item05_vtst, $is_edit_vtst, $org_name_vtst, $org_date_vtst, $org_time_vtst
    ) {

        $res = mysql_query("UPDATE virtua_time_store_tbl SET
        id='" . $id . "',
        ref_no_vtst='" . $ref_no_vtst . "',
        pro_no_vtst='" . $pro_no_vtst . "',
        lot_vtst='" . $lot_vtst . "',
        num_colors_vtst='" . $num_colors_vtst . "',
        plan_colors_vtst='" . $plan_colors_vtst . "',
        machine_no_vtst='" . $machine_no_vtst . "',
        date_vtst='" . $date_vtst . "',
        total_time_vtst='" . $total_time_vtst . "',
        qty_vtst='" . $qty_vtst . "',
        status_vtst='" . $status_vtst . "',
        item01_vtst='" . $item01_vtst . "',
        item02_vtst='" . $item02_vtst . "',
        item03_vtst='" . $item03_vtst . "',
        item04_vtst='" . $item04_vtst . "',
        item05_vtst='" . $item05_vtst . "',
        is_edit_vtst='" . $is_edit_vtst . "',
        org_name_vtst='" . $org_name_vtst . "',
        org_date_vtst='" . $org_date_vtst . "',
        org_time_vtst='" . $org_time_vtst . "'
	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletevirtualTimeStore($id) {
        $query = "DELETE FROM virtua_time_store_tbl WHERE ref_no_vtst='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextvirtualTimeStoreRefNo($table, $suffix) {
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

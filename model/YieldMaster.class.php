<?php

class YieldMaster {

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

    public function getAllYieldMaster() {
        $query = "SELECT * FROM yield_master_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getYieldMasterById($id) {
        $la = array();
        $query = "SELECT*FROM yield_master_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['fg_design_no_ymt'], $rows['curve_no_ymt'], $rows['decal_design_no_ymt'], $rows['yield_value_ymt'], $rows['is_edit_ymt'], $rows['org_date_ymt'], $rows['org_time_ymt']
                );
            }
            return $la;
        }
    }

    public function getPlanedQtyByNo($id) {
        $la = array();
        $query = "SELECT*FROM planed_qty_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['fg_design_no_ymt'], $rows['curve_no_ymt'], $rows['decal_design_no_ymt'], $rows['yield_value_ymt'], $rows['is_edit_ymt'], $rows['org_date_ymt'], $rows['org_time_ymt']
                );
            }
            return $la;
        }
    }

    public function getYieldMasterByNo($curve_no_ymt) {
        $query = "SELECT * FROM yield_master_tbl WHERE curve_no_ymt='" . $curve_no_ymt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getYieldByRefNo($fg_design_no_ymt, $curve_no_ymt, $qty) {
        $query = " SELECT yield_value_ymt FROM yield_master_tbl WHERE fg_design_no_ymt='" . $fg_design_no_ymt . "'  AND curve_no_ymt='" . $curve_no_ymt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                $yield_value = round((100 - $rows["yield_value_ymt"]) * $qty / 100, 0);

                return $yield_value + $qty;
            }
        } else {
            $yield_value = round(20 / 100 * $qty, 0);
            return $yield_value + $qty;
        }
    }

    public function getYieldAdditionalSheetsByQty($qty) {
//             if (199 >$qty AND  $qty > 1) {                        
//              $value=round((10*$qty)/100,0);
//              return $value+$qty;
//               }else{
//                   
//                   
//                if(999 > $qty  AND  $qty > 200) {                        
//                   $value=round((5*$qty)/100,0);
//                   return  $value+$qty;
//                     //return  10;;
//                   
//              }
//              else{
//                if( $qty >1000){
//                    $value=50;
//                    return  $value+$qty;
//
//                }
//                else{
//                   $value=round((5*$qty)/100,0); 
//                    return  $value+$qty;
//                }
//              
//
//              }
//                  }


        if (199 > $qty AND $qty > 1) {
            $value = round((10 * $qty) / 100, 0);
            return $value + $qty;
        } elseif (999 > $qty AND $qty > 199) {
            $value = round((5 * $qty) / 100, 0);
            return $value + $qty;
        } else if ($qty > 1000) {
            $value = 50;
            return $value + $qty;
        } else {
            $value = 50;
            return $value + $qty; 
        }
    }

    public function getCurveAreaByRefNo($fg_design_no_ymt, $curve_no_ymt) {
        $query = " SELECT yield_value_ymt FROM yield_master_tbl WHERE fg_design_no_ymt='" . $fg_design_no_ymt . "'  AND curve_no_ymt='" . $curve_no_ymt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['yield_value_ymt'];
            }
        } else {
            return "-";
        }
    }

    public function getDecalNumberByRefNo($fg_design_no_ymt, $curve_no_ymt) {
        $query = " SELECT decal_design_no_ymt FROM yield_master_tbl WHERE fg_design_no_ymt='" . $fg_design_no_ymt . "'  AND curve_no_ymt='" . $curve_no_ymt . "' ";
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

    public function confirmYieldMasterEntity($curve_no_ymt) {
        $res = "SELECT*FROM yield_master_tbl WHERE curve_no_ymt = '" . $curve_no_ymt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewYieldMaster(
    $id, $fg_design_no_ymt, $curve_no_ymt, $decal_design_no_ymt, $yield_value_ymt, $is_edit_ymt, $org_date_ymt, $org_time_ymt
    ) {



        $res = "INSERT INTO yield_master_tbl  SET
                           fg_design_no_ymt='" . $fg_design_no_ymt . "',
                            curve_no_ymt='" . $curve_no_ymt . "',
                            decal_design_no_ymt='" . $decal_design_no_ymt . "',
                            yield_value_ymt='" . $yield_value_ymt . "',
                            is_edit_ymt='" . $is_edit_ymt . "',
                            org_date_ymt='" . $org_date_ymt . "',
                            org_time_ymt='" . $org_time_ymt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateYieldMaster(
    $id, $fg_design_no_ymt, $curve_no_ymt, $decal_design_no_ymt, $yield_value_ymt, $is_edit_ymt, $org_date_ymt, $org_time_ymt
    ) {

        $res = "UPDATE yield_master_tbl SET
		            fg_design_no_ymt='" . $fg_design_no_ymt . "',
                            curve_no_ymt='" . $curve_no_ymt . "',
                            decal_design_no_ymt='" . $decal_design_no_ymt . "',
                            yield_value_ymt='" . $yield_value_ymt . "',
                            is_edit_ymt='" . $is_edit_ymt . "',
                            org_date_ymt='" . $org_date_ymt . "',
                            org_time_ymt='" . $org_time_ymt . "'
		            WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteYieldMaster($id) {
        $query = "DELETE FROM yield_master_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getYieldMasterAeraById($id) {
        $query = "SELECT silver_area_dt FROM yield_master_tbl WHERE curve_no_ymt='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {

            $row = $result->fetch_assoc();
            return $row["silver_area_dt"];
        } else {
            return $id;
        }
    }

    public function getNextYieldMasterRefNo($table, $suffix) {
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

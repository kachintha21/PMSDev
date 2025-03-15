<?php

class LeadTimeRelationship {

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

    public function getLeadTimeRelationshipByNo($id) {
        $la = array();
        $query = "SELECT*FROM lead_time_relationship_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_ltrt'], $rows['item_no_ltrt'], $rows['type_name_ltrt'], $rows['decal_store_ltrt'], $rows['decal_cutting_ltrt'], $rows['qc_apporaval_ltrt'], $rows['top_coat_ltrt'], $rows['recovery_ltrt'], $rows['printing_ltrt'], $rows['item01_ltrt'], $rows['item02_ltrt'], $rows['item03_ltrt'], $rows['item04_ltrt'], $rows['item05_ltrt'], $rows['is_edit_ltrt'], $rows['org_name_ltrt'], $rows['org_date_ltrt'], $rows['org_time_ltrt']
                );
            }
            return $la;
        }
    }

    public function getLeadTimeRelationshipByType($pattern_no_ltrt) {
        $query = "SELECT*FROM lead_time_relationship_tbl WHERE type_ltrt='normal'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $days = $rows['decal_store_ltrt'] + $rows['decal_cutting_ltrt'] + $rows['decal_store_ltrt'] + $rows['decal_cutting_ltrt'] + $rows['decal_cutting_ltrt'] + $rows['top_coat_ltrt'] + $rows['recovery_ltrt'];
                return $days;

               
            }
        } else {
             return 0;
        }
    }
    
    public function getLeadTimeRelationshipByPattern($pattern_no_ltrt,$type_ltrt) {
        $query = "SELECT*FROM lead_time_relationship_tbl WHERE type_ltrt='normal'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $days = $rows['decal_store_ltrt'] + $rows['decal_cutting_ltrt'] + $rows['decal_store_ltrt'] + $rows['decal_cutting_ltrt'] + $rows['decal_cutting_ltrt'] + $rows['top_coat_ltrt'] + $rows['recovery_ltrt'];
                return $days;

               
            }
        } else {
             return 0;
        }
    }
    
    

    public function getWipLeadTimeRelationship($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function getDailyOutPutQtyLeadTimeRelationship($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM lead_time_relationship_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function createNewLeadTimeRelationship(
    $id, $pattern_no_ltrt, $item_no_ltrt, $type_name_ltrt, $decal_store_ltrt, $decal_cutting_ltrt, $qc_apporaval_ltrt, $top_coat_ltrt, $recovery_ltrt, $printing_ltrt, $item01_ltrt, $item02_ltrt, $item03_ltrt, $item04_ltrt, $item05_ltrt, $is_edit_ltrt, $org_name_ltrt, $org_date_ltrt, $org_time_ltrt
    ) {


        $res = "INSERT INTO lead_time_relationship_tbl  SET
            pattern_no_ltrt='" . $pattern_no_ltrt . "',
            item_no_ltrt='" . $item_no_ltrt . "',
            type_name_ltrt='" . $type_name_ltrt . "',
            decal_store_ltrt='" . $decal_store_ltrt . "',
            decal_cutting_ltrt='" . $decal_cutting_ltrt . "',
            qc_apporaval_ltrt='" . $qc_apporaval_ltrt . "',
            top_coat_ltrt='" . $top_coat_ltrt . "',
            recovery_ltrt='" . $recovery_ltrt . "',
            printing_ltrt='" . $printing_ltrt . "',
            item01_ltrt='" . $item01_ltrt . "',
            item02_ltrt='" . $item02_ltrt . "',
            item03_ltrt='" . $item03_ltrt . "',
            item04_ltrt='" . $item04_ltrt . "',
            item05_ltrt='" . $item05_ltrt . "',
            is_edit_ltrt='" . $is_edit_ltrt . "',
            org_name_ltrt='" . $org_name_ltrt . "',
            org_date_ltrt='" . $org_date_ltrt . "',
            org_time_ltrt='" . $org_time_ltrt . "'
                                           ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateLeadTimeRelationship(
    $id, $pattern_no_ltrt, $item_no_ltrt, $type_name_ltrt, $decal_store_ltrt, $decal_cutting_ltrt, $qc_apporaval_ltrt, $top_coat_ltrt, $recovery_ltrt, $printing_ltrt, $item01_ltrt, $item02_ltrt, $item03_ltrt, $item04_ltrt, $item05_ltrt, $is_edit_ltrt, $org_name_ltrt, $org_date_ltrt, $org_time_ltrt
    ) {

        $res = "UPDATE lead_time_relationship_tbl SET   	    

pattern_no_ltrt='" . $pattern_no_ltrt . "',
item_no_ltrt='" . $item_no_ltrt . "',
type_name_ltrt='" . $type_name_ltrt . "',
decal_store_ltrt='" . $decal_store_ltrt . "',
decal_cutting_ltrt='" . $decal_cutting_ltrt . "',
qc_apporaval_ltrt='" . $qc_apporaval_ltrt . "',
top_coat_ltrt='" . $top_coat_ltrt . "',
recovery_ltrt='" . $recovery_ltrt . "',
printing_ltrt='" . $printing_ltrt . "',
item01_ltrt='" . $item01_ltrt . "',
item02_ltrt='" . $item02_ltrt . "',
item03_ltrt='" . $item03_ltrt . "',
item04_ltrt='" . $item04_ltrt . "',
item05_ltrt='" . $item05_ltrt . "',
is_edit_ltrt='" . $is_edit_ltrt . "',
org_name_ltrt='" . $org_name_ltrt . "',
org_date_ltrt='" . $org_date_ltrt . "',
org_time_ltrt='" . $org_time_ltrt . "'


	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteLeadTimeRelationship($id) {
        $query = "DELETE FROM lead_time_relationship_tbl WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:dryer_capacity_view.php');
        }
    }

}

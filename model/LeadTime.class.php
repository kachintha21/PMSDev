<?php

class LeadTime{

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

    
        public function getLeadTimeById($id) {
        $la = array();
        $query = "SELECT*FROM lead_time_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, 
                $rows['id'],
                $rows['design_ltt'],
                $rows['pro_name_ltt'],
                $rows['pattern_no_ltt'],
                $rows['is_edi_ltt'],
                $rows['item01_llt'],
                $rows['item02_llt'],
                $rows['item03_llt'],
                $rows['item04_llt'],
                $rows['item05_llt'],
                $rows['org_name_llt'],
                $rows['org_date_llt'],
                $rows['org_time_llt']
                
                
                );
            }
            return $la;
        }
    }
 

    public function getLeadTimeByNo($id) {
        $la = array();
        $query = "SELECT*FROM lead_time_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, 
                $rows['id'],
                $rows['design_ltt'],
                $rows['pro_name_ltt'],
                $rows['pattern_no_ltt'],
                $rows['is_edi_ltt'],
                $rows['item01_llt'],
                $rows['item02_llt'],
                $rows['item03_llt'],
                $rows['item04_llt'],
                $rows['item05_llt'],
                $rows['org_name_llt'],
                $rows['org_date_llt'],
                $rows['org_time_llt']
                
                
                );
            }
            return $la;
        }
    }

    
    
      public function getWipLeadTime($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
        
    }
    
  

    public function getDailyOutPutQtyLeadTime($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM lead_time_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }



    public function createNewLeadTime(
        $id,
        $design_ltt,
        $pro_name_ltt,
        $pattern_no_ltt,
        $is_edi_ltt,
        $item01_llt,
        $item02_llt,
        $item03_llt,
        $item04_llt,
        $item05_llt,
        $org_name_llt,
        $org_date_llt,
        $org_time_llt
	
            
        
    ) {



        $res = "INSERT INTO lead_time_tbl  SET
         id='".$id."',
        design_ltt='".$design_ltt."',
        pro_name_ltt='".$pro_name_ltt."',
        pattern_no_ltt='".$pattern_no_ltt."',
        is_edi_ltt='".$is_edi_ltt."',
        item01_llt='".$item01_llt."',
        item02_llt='".$item02_llt."',
        item03_llt='".$item03_llt."',
        item04_llt='".$item04_llt."',
        item05_llt='".$item05_llt."',
        org_name_llt='".$org_name_llt."',
        org_date_llt='".$org_date_llt."',
        org_time_llt='".$org_time_llt."'
            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateLeadTime(
        $id,
        $design_ltt,
        $pro_name_ltt,
        $pattern_no_ltt,
        $is_edi_ltt,
        $item01_llt,
        $item02_llt,
        $item03_llt,
        $item04_llt,
        $item05_llt,
        $org_name_llt,
        $org_date_llt,
        $org_time_llt
		
        
    ) {

        $res = "UPDATE lead_time_tbl SET   	    
        design_ltt='".$design_ltt."',
        pro_name_ltt='".$pro_name_ltt."',
        pattern_no_ltt='".$pattern_no_ltt."',
        is_edi_ltt='".$is_edi_ltt."',
        item01_llt='".$item01_llt."',
        item02_llt='".$item02_llt."',
        item03_llt='".$item03_llt."',
        item04_llt='".$item04_llt."',
        item05_llt='".$item05_llt."',
        org_name_llt='".$org_name_llt."',
        org_date_llt='".$org_date_llt."',
        org_time_llt='".$org_time_llt."'
	     WHERE id='".$id."' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
       public function deleteLeadTimeById($id) {
        $query = "DELETE FROM lead_time_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    
   
}

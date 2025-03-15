<?php
class QcQcApproval{

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
	
	
	public function deleteProcess($id,$pro) {

        $query = "DELETE FROM qc_qc_approval_tbl WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($query);
        
        
        $sql = "SELECT id FROM printing_status_tbl  WHERE ref_no_pst='".$pro."'  ";
                $res = $this->mysqli->query($sql);
                while ($rows = $res->fetch_assoc()) {
                $id=$rows['id'];
                $upate_res = "UPDATE printing_status_tbl SET
                pro05_pst='0',
                pro04_pst='0',
				pro06_pst='0',
                pro08_pst='1', 
				pro09_pst=	'0'	,
				pro10_pst='0'				
                WHERE id='".$id."'   ";
                $result = $this->mysqli->query($upate_res);
                }
               
               
               
               
        
               
        
        if ($result) {
            header('location:qc_qc_approval_view.php');
        }
        
        
        
        
        
        
        
    }

 

    public function getQcApprovalByNo($id) {
        $la = array();
        $query = "SELECT*FROM qc_qc_approval_tbl WHERE pro_no_qc='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la,
                $rows['id'],
                $rows['pro_no_qc'],
                $rows['pattern_no_qc'],
                $rows['lot_no_qc'],
                $rows['printing_qty_qc'],
                $rows['actual_qty_qc'],
                $rows['check_date_qc'],
                $rows['judgment_qc'],
                $rows['reject_items_qc'],
                $rows['re_marks_qc'],
                $rows['is_edit_qc'],
                $rows['item01_qc'],
                $rows['item02_qc'],
                $rows['item03_qc'],
                $rows['item04_qc'],
                $rows['item05_qc'],
                $rows['org_name_qc'],
                $rows['org_date_qc'],
                $rows['org_time_qc']
                
                
                );
            }
            return $la;
        }
    }




    public function getQcApprovalByRefNo($id) {
        $la = array();
        $query = "SELECT*FROM qc_qc_approval_tbl WHERE pro_no_qc='" . $id . "'  '   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la,   
                $rows['id'],
                $rows['pro_no_qc'],
                $rows['pattern_no_qc'],
                $rows['lot_no_qc'],
                $rows['printing_qty_qc'],
                $rows['actual_qty_qc'],
                $rows['check_date_qc'],
                $rows['judgment_qc'],
                $rows['reject_items_qc'],
                $rows['re_marks_qc'],
                $rows['is_edit_qc'],
                $rows['item01_qc'],
                $rows['item02_qc'],
                $rows['item03_qc'],
                $rows['item04_qc'],
                $rows['item05_qc'],
                $rows['org_name_qc'],
                $rows['org_date_qc'],
                $rows['org_time_qc']
                );
            }
            return $la;
        }
    }

    
    
      public function getWipQcApproval() {
        $query = "SELECT pro05_pst FROM printing_status_tbl WHERE pro05_pst='1'   GROUP BY   ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
          
      
        
    }
    
  

    public function getDailyOutPutQtyQcApproval($date) {
        $query = "SELECT org_date_qc FROM qc_qc_approval_tbl WHERE org_date_qc='" . $date . "'  GROUP BY  lot_no_qc   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        } 
        
        
    }



    public function createNewQcApproval(
        $id,	
        $pro_no_qc,	
        $pattern_no_qc,	
        $lot_no_qc,	
        $printing_qty_qc,	
        $actual_qty_qc,	
        $check_date_qc,	
        $judgment_qc,	
        $reject_items_qc,	
        $re_marks_qc,	
        $is_edit_qc,	
        $item01_qc,	
        $item02_qc,	
        $item03_qc,	
        $item04_qc,	
        $item05_qc,	
        $org_name_qc,	
        $org_date_qc,	
        $org_time_qc	
            
            
        
    ) {

        $res = "INSERT INTO qc_qc_approval_tbl  SET
        id='".$id."',
        pro_no_qc='".$pro_no_qc."',
        pattern_no_qc='".$pattern_no_qc."',
        lot_no_qc='".$lot_no_qc."',
        printing_qty_qc='".$printing_qty_qc."',
        actual_qty_qc='".$actual_qty_qc."',
        check_date_qc='".$check_date_qc."',
        judgment_qc='".$judgment_qc."',
        reject_items_qc='".$reject_items_qc."',
        re_marks_qc='".$re_marks_qc."',
        is_edit_qc='".$is_edit_qc."',
        item01_qc='".$item01_qc."',
        item02_qc='".$item02_qc."',
        item03_qc='".$item03_qc."',
        item04_qc='".$item04_qc."',
        item05_qc='".$item05_qc."',
        org_name_qc='".$org_name_qc."',
        org_date_qc='".$org_date_qc."',
        org_time_qc='".$org_time_qc."'
	
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateQcApproval(
        $id,	
        $pro_no_qc,	
        $pattern_no_qc,	
        $lot_no_qc,	
        $printing_qty_qc,	
        $actual_qty_qc,	
        $check_date_qc,	
        $judgment_qc,	
        $reject_items_qc,	
        $re_marks_qc,	
        $is_edit_qc,	
        $item01_qc,	
        $item02_qc,	
        $item03_qc,	
        $item04_qc,	
        $item05_qc,	
        $org_name_qc,	
        $org_date_qc,	
        $org_time_qc		
        
    ) {

        $res = "UPDATE qc_qc_approval_tbl SET
        pro_no_qc='".$pro_no_qc."',
        pattern_no_qc='".$pattern_no_qc."',
        lot_no_qc='".$lot_no_qc."',
        printing_qty_qc='".$printing_qty_qc."',
        actual_qty_qc='".$actual_qty_qc."',
        check_date_qc='".$check_date_qc."',
        judgment_qc='".$judgment_qc."',
        reject_items_qc='".$reject_items_qc."',
        re_marks_qc='".$re_marks_qc."',
        is_edit_qc='".$is_edit_qc."',
        item01_qc='".$item01_qc."',
        item02_qc='".$item02_qc."',
        item03_qc='".$item03_qc."',
        item04_qc='".$item04_qc."',
        item05_qc='".$item05_qc."',
        org_name_qc='".$org_name_qc."',
        org_date_qc='".$org_date_qc."',
        org_time_qc='".$org_time_qc."'
	

	        WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteQcApproval($id) {
        $query = "DELETE FROM qc_qc_approval_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }




   
}

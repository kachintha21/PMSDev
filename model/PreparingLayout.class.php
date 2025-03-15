<?php

class PreparingLayout {

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

    public function getAllPreparingLayout() {
        $query = "SELECT COUNT(ref_no_plt) AS t FROM preparing_layout_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['t'];
            }
            return 0;
        }
    }

    public function confirmLotNumberByModelPreparingLayout($lot_no_plt, $pattern_no_plt) {
        $la = array();
        $query = "SELECT*FROM preparing_layout_tbl WHERE lot_no_plt='" . $lot_no_plt . "'  AND  pattern_no_plt='" . $pattern_no_plt . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function alphaID($n) {
        for ($r = ""; $n >= 0; $n = intval($n / 26) - 1)
            $r = chr($n % 26 + 0x41) . $r;
        return str_pad($r, 2, 'A', STR_PAD_LEFT);
    }

    
    public function getPreparingLayoutByID($id) {
        $la = array();
        $query = "SELECT*FROM preparing_layout_tbl WHERE id='" .$id . "'  ";
        echo($query);
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_plt'], $rows['pro_no_plt'], $rows['lot_no_plt'], $rows['pattern_no_plt'], $rows['shipment_request_plt'], $rows['printing_lines_plt'], $rows['date_plt'], $rows['printing_way_plt'], $rows['paper_size_plt'], $rows['body_plt'], $rows['factory_plt'], $rows['market_plt'], $rows['decoration_plt'], $rows['number_sheet_plt'], $rows['printing_plt'], $rows['is_remarks_plt'], $rows['item01_plt'], $rows['item02_plt'], $rows['item03_plt'], $rows['item04_plt'], $rows['item05_plt'], $rows['item06_plt'], $rows['item07_plt'], $rows['item08_plt'], $rows['item09_plt'], $rows['item10_plt'], $rows['item11_plt'], $rows['item12_plt'], $rows['item13_plt'], $rows['item14_plt'], $rows['item15_plt'], $rows['is_edit_plt'], $rows['org_name_plt'], $rows['org_date_plt'], $rows['org_time_plt']
                );
            }
            return $la;
        }
    }
    public function getPreparingLayoutByNo($id) {
        $la = array();
		//print("SELECT*FROM preparing_layout_tbl WHERE pro_no_plt='" . $id . "'  ");exit;
        $query = "SELECT*FROM preparing_layout_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_plt'], $rows['pro_no_plt'], $rows['lot_no_plt'], $rows['pattern_no_plt'], $rows['shipment_request_plt'], $rows['printing_lines_plt'], $rows['date_plt'], $rows['printing_way_plt'], $rows['paper_size_plt'], $rows['body_plt'], $rows['factory_plt'], $rows['market_plt'], $rows['decoration_plt'], $rows['number_sheet_plt'], $rows['printing_plt'], $rows['is_remarks_plt'], $rows['item01_plt'], $rows['item02_plt'], $rows['item03_plt'], $rows['item04_plt'], $rows['item05_plt'], $rows['item06_plt'], $rows['item07_plt'], $rows['item08_plt'], $rows['item09_plt'], $rows['item10_plt'], $rows['item11_plt'], $rows['item12_plt'], $rows['item13_plt'], $rows['item14_plt'], $rows['item15_plt'], $rows['is_edit_plt'], $rows['org_name_plt'], $rows['org_date_plt'], $rows['org_time_plt']
                );
            }
            return $la;
        }
    }

    public function getPreparingLayoutByLotNo($pro_no_plt, $lot_no_plt, $pattern_no_plt) {
        $la = array();
        $query = "SELECT*FROM preparing_layout_tbl WHERE pro_no_plt='" . $pro_no_plt . "' AND lot_no_plt='" . $lot_no_plt . "' AND  pattern_no_plt='" . $pattern_no_plt . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_plt'], $rows['pro_no_plt'], $rows['lot_no_plt'], $rows['pattern_no_plt'], $rows['shipment_request_plt'], $rows['printing_lines_plt'], $rows['date_plt'], $rows['printing_way_plt'], $rows['paper_size_plt'], $rows['body_plt'], $rows['factory_plt'], $rows['market_plt'], $rows['decoration_plt'], $rows['number_sheet_plt'], $rows['printing_plt'], $rows['is_remarks_plt'], $rows['item01_plt'], $rows['item02_plt'], $rows['item03_plt'], $rows['item04_plt'], $rows['item05_plt'], $rows['item06_plt'], $rows['item07_plt'], $rows['item08_plt'], $rows['item09_plt'], $rows['item10_plt'], $rows['item11_plt'], $rows['item12_plt'], $rows['item13_plt'], $rows['item14_plt'], $rows['item15_plt'], $rows['is_edit_plt'], $rows['org_name_plt'], $rows['org_date_plt'], $rows['org_time_plt']
                );
            }
            return $la;
        }
    }

    public function getDailyOutPutQtyPreparingLayout($date, $mname) {
        $query = "SELECT org_date_plt,COUNT(*) AS t FROM preparing_layout_tbl WHERE org_date_plt='" . $date . "' AND item02_plt='OK'  AND  pattern_no_plt='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function getAllDailyOutPutQtyPreparingLayout() {
        $query = "SELECT lot_no_plt,COUNT(*) AS t FROM preparing_layout_tbl  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function confirmPreparingLayoutEntity($ref_no_plt) {
        $res = "SELECT*FROM preparing_layout_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPreparingLayout(
    $id, $ref_no_plt, $pro_no_plt, $lot_no_plt, $pattern_no_plt, $shipment_request_plt, $printing_lines_plt, $date_plt, $printing_way_plt, $paper_size_plt, $body_plt, $factory_plt, $market_plt, $decoration_plt, $number_sheet_plt, $printing_plt, $is_remarks_plt, $item01_plt, $item02_plt, $item03_plt, $item04_plt, $item05_plt, $item06_plt, $item07_plt, $item08_plt, $item09_plt, $item10_plt, $item11_plt, $item12_plt, $item13_plt, $item14_plt, $item15_plt, $is_edit_plt, $org_name_plt, $org_date_plt, $org_time_plt
    ) {



        $res = "INSERT INTO preparing_layout_tbl  SET
       ref_no_plt='" . $ref_no_plt . "',
                pro_no_plt='" . $pro_no_plt . "',
                lot_no_plt='" . $lot_no_plt . "',
                pattern_no_plt='" . $pattern_no_plt . "',
                shipment_request_plt='" . $shipment_request_plt . "',
                printing_lines_plt='" . $printing_lines_plt . "',
                date_plt='" . $date_plt . "',
                printing_way_plt='" . $printing_way_plt . "',
                paper_size_plt='" . $paper_size_plt . "',
                body_plt='" . $body_plt . "',
                factory_plt='" . $factory_plt . "',
                market_plt='" . $market_plt . "',
                decoration_plt='" . $decoration_plt . "',
                number_sheet_plt='" . $number_sheet_plt . "',
                printing_plt='" . $printing_plt . "',
                is_remarks_plt='" . $is_remarks_plt . "',
                item01_plt='" . $item01_plt . "',
                item02_plt='" . $item02_plt . "',
                item03_plt='" . $item03_plt . "',
                item04_plt='" . $item04_plt . "',
                item05_plt='" . $item05_plt . "',
                item06_plt='" . $item06_plt . "',
                item07_plt='" . $item07_plt . "',
                item08_plt='" . $item08_plt . "',
                item09_plt='" . $item09_plt . "',
                item10_plt='" . $item10_plt . "',
                item11_plt='" . $item11_plt . "',
                item12_plt='" . $item12_plt . "',
                item13_plt='" . $item13_plt . "',
                item14_plt='" . $item14_plt . "',
                item15_plt='" . $item15_plt . "',
                is_edit_plt='" . $is_edit_plt . "',
                org_name_plt='" . $org_name_plt . "',
                org_date_plt='" . $org_date_plt . "',
                org_time_plt='" . $org_time_plt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePreparingLayout(
    $id, $ref_no_plt, $pro_no_plt, $lot_no_plt, $pattern_no_plt, $shipment_request_plt, $printing_lines_plt, $date_plt, $printing_way_plt, $paper_size_plt, $body_plt, $factory_plt, $market_plt, $decoration_plt, $number_sheet_plt, $printing_plt, $is_remarks_plt, $item01_plt, $item02_plt, $item03_plt, $item04_plt, $item05_plt, $item06_plt, $item07_plt, $item08_plt, $item09_plt, $item10_plt, $item11_plt, $item12_plt, $item13_plt, $item14_plt, $item15_plt, $is_edit_plt, $org_name_plt, $org_date_plt, $org_time_plt
    ) {

//        $query = "UPDATE preparing_layout_tbl SET
//                ref_no_plt='" . $ref_no_plt . "',
//                pro_no_plt='" . $pro_no_plt . "',
//                lot_no_plt='" . $lot_no_plt . "',
//                pattern_no_plt='" . $pattern_no_plt . "',
//                shipment_request_plt='" . $shipment_request_plt . "',
//                printing_lines_plt='" . $printing_lines_plt . "',
//                date_plt='" . $date_plt . "',
//                printing_way_plt='" . $printing_way_plt . "',
//                paper_size_plt='" . $paper_size_plt . "',
//                body_plt='" . $body_plt . "',
//                factory_plt='" . $factory_plt . "',
//                market_plt='" . $market_plt . "',
//                decoration_plt='" . $decoration_plt . "',
//                number_sheet_plt='" . $number_sheet_plt . "',
//                printing_plt='" . $printing_plt . "',
//                is_remarks_plt='" . $is_remarks_plt . "',
//                item01_plt='" . $item01_plt . "',
//                item02_plt='" . $item02_plt . "',
//                item03_plt='" . $item03_plt . "',
//                item04_plt='" . $item04_plt . "',
//                item05_plt='" . $item05_plt . "',
//                item06_plt='" . $item06_plt . "',
//                item07_plt='" . $item07_plt . "',
//                item08_plt='" . $item08_plt . "',
//                item09_plt='" . $item09_plt . "',
//                item10_plt='" . $item10_plt . "',
//                item11_plt='" . $item11_plt . "',
//                item12_plt='" . $item12_plt . "',
//                item13_plt='" . $item13_plt . "',
//                item14_plt='" . $item14_plt . "',
//                item15_plt='" . $item15_plt . "',
//                is_edit_plt='" . $is_edit_plt . "',
//                org_name_plt='" . $org_name_plt . "',
//                org_date_plt='" . $org_date_plt . "',
//                org_time_plt='" . $org_time_plt . "'
//	        WHERE id='" . $id . "' ";
        
        $query = "UPDATE preparing_layout_tbl SET
                             shipment_request_plt='" . $shipment_request_plt . "',
                printing_lines_plt='" . $printing_lines_plt . "',
                date_plt='" . $date_plt . "',
                printing_way_plt='" . $printing_way_plt . "',
                paper_size_plt='" . $paper_size_plt . "',
                body_plt='" . $body_plt . "',
                factory_plt='" . $factory_plt . "',
                market_plt='" . $market_plt . "',
                decoration_plt='" . $decoration_plt . "',
                number_sheet_plt='" . $number_sheet_plt . "',
                printing_plt='" . $printing_plt . "',
                is_remarks_plt='" . $is_remarks_plt . "',
                item01_plt='" . $item01_plt . "',
                item02_plt='" . $item02_plt . "',
                item03_plt='" . $item03_plt . "',
                item04_plt='" . $item04_plt . "',
                item05_plt='" . $item05_plt . "',
                item06_plt='" . $item06_plt . "',
                item07_plt='" . $item07_plt . "',
                item08_plt='" . $item08_plt . "',
                item09_plt='" . $item09_plt . "',
                item10_plt='" . $item10_plt . "',
                item11_plt='" . $item11_plt . "',
                item12_plt='" . $item12_plt . "',
                item13_plt='" . $item13_plt . "',                         
                is_edit_plt='" . $is_edit_plt . "',
                org_name_plt='" . $org_name_plt . "',
                org_date_plt='" . $org_date_plt . "',
                org_time_plt='" . $org_time_plt . "'
	        WHERE id='" . $id . "' ";
        

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function updatePreparingLayoutById(
    $id, $item03_plt, $type
    ) {
        $res = "UPDATE preparing_layout_tbl SET
                item03_plt='" . $item03_plt . "'           
	        WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePreparingLayoutByRefNo(
    $id, $item03_plt, $type
    ) {
        $res = "UPDATE preparing_layout_tbl SET
                item03_plt='" . $item03_plt . "'           
	        WHERE ref_no_plt='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
      public function updateGoldconsumpationPreparingLayoutByRePro(
     $id
    ) {
        $res = "UPDATE preparing_layout_tbl SET
                item14_plt='1'           
	        WHERE pro_no_plt='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }
    
     public function resetGoldconsumpationPreparingLayoutByRePro(
     $id
    ) {
        $res = "UPDATE preparing_layout_tbl SET
                item14_plt=''           
	        WHERE pro_no_plt='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePreparingLayout($id) {
        $query = "DELETE FROM preparing_layout_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function deletePreparingLayoutByProNo($id) {
        $query = "DELETE FROM preparing_layout_tbl WHERE pro_no_plt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getNextPreparingLayoutRefNo($table, $suffix) {
		//print("SELECT COUNT(id)as ID FROM " . $table . " WHERE item15_plt='".$suffix."' ORDER BY id DESC");exit;
        $sql = "SELECT COUNT(id)as ID FROM " . $table . " WHERE item15_plt='".$suffix."' ORDER BY id DESC";
          $res = $this->mysqli->query($sql);
          if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            $previous = $row['ID'];

            //$previous = substr($previous, 5, strlen($previous));

            if (strlen("" . $previous + 1) == 1) {
                $previous = "00" . ($previous + 1);
            } else if (strlen("" . $previous + 1) == 2) {
                $previous = "0" . ($previous + 1);
            }
        } else {
            $previous = "001";
        }
        return $suffix . $previous;
    }
    public function getNextPreparingLayoutunique($table, $suffix) {
        //print(321);exit;
		$sql = "SELECT COUNT(id)as ID FROM " . $table . " WHERE pattern_no_plt='".$suffix."'  ORDER BY id DESC";
       
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $previous = $row['ID'];          
            // if (strlen("" . $previous + 1) == 1) {
            //     $previous = "" . ($previous + 1);
            // } else if (strlen("" . $previous + 1) == 2) {
            //     $previous = "" . ($previous + 1);
            // }
        } else {
            $previous = "1";
        }
        return $previous;
    }
	
	//Kachintha 2022-07-22
	public function getNextLot($table, $suffix) {
         //print(222);exit;
		$sql = "SELECT * FROM " . $table . "  WHERE pattern_no_plt='".$suffix."' order by `lot_no_plt` desc";
		
       
        $res = $this->mysqli->query($sql);
        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $last_lot = $row['lot_no_plt'];          
            $next_lot = ++$last_lot;
			
        } else {
            $next_lot = "AA";
        }
        return $next_lot;
    }
	
	//Kachintha 2022-08-26
	public function getNextRef($table, $suffix) {
        $sql = "SELECT SUBSTRING(ref_no_plt, -3) as ref_no_plt_t FROM " . $table . " WHERE item15_plt='".$suffix."' ORDER BY id DESC limit 1";
          $res = $this->mysqli->query($sql);
          if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_array($res);
            $last_ref = $row['ref_no_plt_t'];  
           // print($last_ref);exit;
            $next_ref = ++$last_ref;
            $next_ref = str_pad($next_ref, 3, '0', STR_PAD_LEFT);
            $next_ref = $suffix.$next_ref;
			
        } else {
			$next_ref = $suffix."001";
        }
		//print($next_ref);exit;
        return $next_ref;
    }

}

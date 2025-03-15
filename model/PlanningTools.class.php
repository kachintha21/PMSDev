<?php

class PlanningTools {

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

    public function getAllPlanningTools() {
        $query = "SELECT * FROM planning_tools_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPlanningToolsByNo($pro_no_tt) {
        $query = "SELECT * FROM planning_tools_tbl WHERE pro_no_tt='" . $pro_no_tt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPlanningToolsEntity($pro_no_tt) {
        $res = "SELECT*FROM planning_tools_tbl WHERE pro_no_tt = '" . $pro_no_tt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPlanningTools(
        $id,	
        $ref_no_tt,	
        $pro_no_tt,	
        $lot_no_tt,	
        $pattern_no_tt,	
        $shipment_request_tt,	
        $printing_lines_tt,	
        $date_tt,	
        $printing_way_tt,	
        $paper_size_tt,	
        $body_tt,	
        $factory_tt,	
        $market_tt,	
        $decoration_tt,	
        $num_shett_tt,	
        $printing_tt,	
        $order_no_tt,	
        $item01_tt,	
        $item02_tt,	
        $item03_tt,	
        $item04_tt,	
        $item05_tt,	
        $item06_tt,	
        $item07_tt,	
        $item08_tt,	
        $item09_tt,	
        $item10_tt,	
        $id_edit_tt,	
        $org_name_tt,	
        $org_date_tt,	
        $org_time_tt

    ) {



        $res = "INSERT INTO planning_tools_tbl  SET
		        ref_no_tt ='".$ref_no_tt ."',
                pro_no_tt ='".$pro_no_tt ."',
                lot_no_tt ='".$lot_no_tt ."',
                pattern_no_tt ='".$pattern_no_tt ."',
                shipment_request_tt ='".$shipment_request_tt ."',
                printing_lines_tt ='".$printing_lines_tt ."',
                date_tt ='".$date_tt ."',
                printing_way_tt ='".$printing_way_tt ."',
                paper_size_tt ='".$paper_size_tt ."',
                body_tt ='".$body_tt ."',
                factory_tt ='".$factory_tt ."',
                market_tt ='".$market_tt ."',
                decoration_tt ='".$decoration_tt ."',
                num_shett_tt ='".$num_shett_tt ."',
                printing_tt ='".$printing_tt ."',
                order_no_tt ='".$order_no_tt ."',
                item01_tt ='".$item01_tt ."',
                item02_tt ='".$item02_tt ."',
                item03_tt ='".$item03_tt ."',
                item04_tt ='".$item04_tt ."',
                item05_tt ='".$item05_tt ."',
                item06_tt ='".$item06_tt ."',
                item07_tt ='".$item07_tt ."',
                item08_tt ='".$item08_tt ."',
                item09_tt ='".$item09_tt ."',
                item10_tt ='".$item10_tt ."',
                id_edit_tt ='".$id_edit_tt ."',
                org_name_tt ='".$org_name_tt ."',
                org_date_tt ='".$org_date_tt ."',
                org_time_tt='".$org_time_tt."'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePlanningTools(
        $id,	
        $ref_no_tt,	
        $pro_no_tt,	
        $lot_no_tt,	
        $pattern_no_tt,	
        $shipment_request_tt,	
        $printing_lines_tt,	
        $date_tt,	
        $printing_way_tt,	
        $paper_size_tt,	
        $body_tt,	
        $factory_tt,	
        $market_tt,	
        $decoration_tt,	
        $num_shett_tt,	
        $printing_tt,	
        $order_no_tt,	
        $item01_tt,	
        $item02_tt,	
        $item03_tt,	
        $item04_tt,	
        $item05_tt,	
        $item06_tt,	
        $item07_tt,	
        $item08_tt,	
        $item09_tt,	
        $item10_tt,	
        $id_edit_tt,	
        $org_name_tt,	
        $org_date_tt,	
        $org_time_tt
    ) {

        $res = mysql_query("UPDATE planning_tools_tbl SET
			    pro_no_tt ='".$pro_no_tt ."',
                lot_no_tt ='".$lot_no_tt ."',
                pattern_no_tt ='".$pattern_no_tt ."',
                shipment_request_tt ='".$shipment_request_tt ."',
                printing_lines_tt ='".$printing_lines_tt ."',
                date_tt ='".$date_tt ."',
                printing_way_tt ='".$printing_way_tt ."',
                paper_size_tt ='".$paper_size_tt ."',
                body_tt ='".$body_tt ."',
                factory_tt ='".$factory_tt ."',
                market_tt ='".$market_tt ."',
                decoration_tt ='".$decoration_tt ."',
                num_shett_tt ='".$num_shett_tt ."',
                printing_tt ='".$printing_tt ."',
                order_no_tt ='".$order_no_tt ."',
                item01_tt ='".$item01_tt ."',
                item02_tt ='".$item02_tt ."',
                item03_tt ='".$item03_tt ."',
                item04_tt ='".$item04_tt ."',
                item05_tt ='".$item05_tt ."',
                item06_tt ='".$item06_tt ."',
                item07_tt ='".$item07_tt ."',
                item08_tt ='".$item08_tt ."',
                item09_tt ='".$item09_tt ."',
                item10_tt ='".$item10_tt ."',
                id_edit_tt ='".$id_edit_tt ."',
                org_name_tt ='".$org_name_tt ."',
                org_date_tt ='".$org_date_tt ."',
                org_time_tt='".$org_time_tt."'

		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePlanningTools($id) {
        $query = "DELETE FROM planning_tools_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }
    
 
    

    public function getNextPlanningToolsRefNo($table, $suffix) {
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

<?php

class PastLayoutDetails {

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
    
       public function getAllPastLayoutDetails() {      
         $query = "SELECT COUNT(lot_no_pldt) AS t FROM past_layout_details_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if($num_result>0){
        return  $num_result;
        }
        else{
            return 0;
        }
        
        
    }
    
    

    public function getPastLayoutDetailsByNo($id) {
        $la = array();
        $query = "SELECT*FROM past_layout_details_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_pldt'], $rows['design_no_pldt'], $rows['lot_no_pldt'], $rows['sheet_pldt'], $rows['factory_pldt'], $rows['layout_finish_date_pldt'], $rows['first_color_print_date_pldt'], $rows['layout_maker_pldt'], $rows['layout_check_pldt'], $rows['print_date_pldt'], $rows['curves_no_pldt'], $rows['qty_pldt'], $rows['item01_pldt'], $rows['item02_pldt'], $rows['item03_pldt'], $rows['item04_pldt'], $rows['item05_pldt'], $rows['org_name_pldt'], $rows['org_date_pldt'], $rows['org_time_pldt']
                );
            }
            return $la;
        }
    }

    public function createNewPastLayoutDetails(
    $id, $pro_no_pldt, $design_no_pldt, $lot_no_pldt, $sheet_pldt, $factory_pldt, $layout_finish_date_pldt, $first_color_print_date_pldt, $layout_maker_pldt, $layout_check_pldt, $print_date_pldt, $curves_no_pldt, $qty_pldt, $item01_pldt, $item02_pldt, $item03_pldt, $item04_pldt, $item05_pldt, $org_name_pldt, $org_date_pldt, $org_time_pldt
    ) {



        $res = "INSERT INTO past_layout_details_tbl  SET
            id='" . $id . "',
            pro_no_pldt='" . $pro_no_pldt . "',
            design_no_pldt='" . $design_no_pldt . "',
            lot_no_pldt='" . $lot_no_pldt . "',
            sheet_pldt='" . $sheet_pldt . "',
            factory_pldt='" . $factory_pldt . "',
            layout_finish_date_pldt='" . $layout_finish_date_pldt . "',
            first_color_print_date_pldt='" . $first_color_print_date_pldt . "',
            layout_maker_pldt='" . $layout_maker_pldt . "',
            layout_check_pldt='" . $layout_check_pldt . "',
            print_date_pldt='" . $print_date_pldt . "',
            curves_no_pldt='" . $curves_no_pldt . "',
            qty_pldt='" . $qty_pldt . "',
            item01_pldt='" . $item01_pldt . "',
            item02_pldt='" . $item02_pldt . "',
            item03_pldt='" . $item03_pldt . "',
            item04_pldt='" . $item04_pldt . "',
            item05_pldt='" . $item05_pldt . "',
            org_name_pldt='" . $org_name_pldt . "',
            org_date_pldt='" . $org_date_pldt . "',
            org_time_pldt='" . $org_time_pldt . "'
	
            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePastLayoutDetails(
    $id, $pro_no_pldt, $design_no_pldt, $lot_no_pldt, $sheet_pldt, $factory_pldt, $layout_finish_date_pldt, $first_color_print_date_pldt, $layout_maker_pldt, $layout_check_pldt, $print_date_pldt, $curves_no_pldt, $qty_pldt, $item01_pldt, $item02_pldt, $item03_pldt, $item04_pldt, $item05_pldt, $org_name_pldt, $org_date_pldt, $org_time_pldt
    ) {

        $res = "UPDATE past_layout_details_tbl SET   	    
               id='" . $id . "',
            pro_no_pldt='" . $pro_no_pldt . "',
            design_no_pldt='" . $design_no_pldt . "',
            lot_no_pldt='" . $lot_no_pldt . "',
            sheet_pldt='" . $sheet_pldt . "',
            factory_pldt='" . $factory_pldt . "',
            layout_finish_date_pldt='" . $layout_finish_date_pldt . "',
            first_color_print_date_pldt='" . $first_color_print_date_pldt . "',
            layout_maker_pldt='" . $layout_maker_pldt . "',
            layout_check_pldt='" . $layout_check_pldt . "',
            print_date_pldt='" . $print_date_pldt . "',
            curves_no_pldt='" . $curves_no_pldt . "',
            qty_pldt='" . $qty_pldt . "',
            item01_pldt='" . $item01_pldt . "',
            item02_pldt='" . $item02_pldt . "',
            item03_pldt='" . $item03_pldt . "',
            item04_pldt='" . $item04_pldt . "',
            item05_pldt='" . $item05_pldt . "',
            org_name_pldt='" . $org_name_pldt . "',
            org_date_pldt='" . $org_date_pldt . "',
            org_time_pldt='" . $org_time_pldt . "'
   
	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePastLayoutDetails($id) {
        $query_pcdt = "DELETE FROM past_curves_details_tbl WHERE pro_no_pcdt='$id'";
        $query_pldt = "DELETE FROM past_layout_details_tbl WHERE pro_no_pldt='$id'";


        $result = $this->mysqli->query($query);
        $result = $this->mysqli->query($query_pldt);
        if ($result) {
            header('location:past_layout_details_data.php');
        }
    }

}

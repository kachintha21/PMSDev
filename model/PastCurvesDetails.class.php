<?php

class PastCurvesDetails {

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

    public function getAllPastCurvesDetailsDetails() {
        $query = "SELECT * FROM past_curves_details_tbl GROUP BY pro_no_pcdt,lot_no_pcdt";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return 0;
        }
    }

    public function getPastCurvesDetailsByNo($id) {
        $la = array();
        $query = "SELECT*FROM past_curves_details_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pro_no_pcdt'], $rows['lot_no_pcdt'], $rows['design_pcdt'], $rows['curves_no_pcdt'], $rows['qty_pcdt'], $rows['org_name_pcdt'], $rows['org_date_pcdt'], $rows['org_time_pcdt']
                );
            }
            return $la;
        }
    }

    public function createNewPastCurvesDetails(
   $id, $pro_no_pcdt, $lot_no_pcdt, $design_pcdt, $curves_no_pcdt,$curves_pcdt, $qty_pcdt,$first_color_print_pcdt, $print_date_pcdt, $org_name_pcdt, $org_date_pcdt, $org_time_pcdt
    ) {



        $res = "INSERT INTO past_curves_details_tbl  SET
            pro_no_pcdt='" . $pro_no_pcdt . "',
        lot_no_pcdt='" . $lot_no_pcdt . "',
        design_pcdt='" . $design_pcdt . "',
        curves_no_pcdt='" . $curves_no_pcdt . "',
       curves_pcdt='" . $curves_pcdt . "',    
        qty_pcdt='" . $qty_pcdt . "',
        first_color_print_pcdt='" . $first_color_print_pcdt . "',
        print_date_pcdt='" . $print_date_pcdt . "',  
        org_name_pcdt='" . $org_name_pcdt . "',
        org_date_pcdt='" . $org_date_pcdt . "',
        org_time_pcdt='" . $org_time_pcdt . "'




            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePastCurvesDetails(
      $id, $pro_no_pcdt, $lot_no_pcdt, $design_pcdt, $curves_no_pcdt,$curves_pcdt, $qty_pcdt,$first_color_print_pcdt, $print_date_pcdt, $org_name_pcdt, $org_date_pcdt, $org_time_pcdt
    ) {

        $res = "UPDATE past_curves_details_tbl SET   	    
               pro_no_pcdt='" . $pro_no_pcdt . "',
        lot_no_pcdt='" . $lot_no_pcdt . "',
        design_pcdt='" . $design_pcdt . "',
        curves_no_pcdt='" . $curves_no_pcdt . "',
       curves_pcdt='" . $curves_pcdt . "',    
        qty_pcdt='" . $qty_pcdt . "',
        first_color_print_pcdt='" . $first_color_print_pcdt . "',
        print_date_pcdt='" . $print_date_pcdt . "',  
        org_name_pcdt='" . $org_name_pcdt . "',
        org_date_pcdt='" . $org_date_pcdt . "',
        org_time_pcdt='" . $org_time_pcdt . "'


	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePastCurvesDetails($id) {
        $query = "DELETE FROM past_curves_details_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:printing_speed_master_view.php');
        }
    }

}

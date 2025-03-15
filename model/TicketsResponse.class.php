<?php

class TicketsResponse {

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

    public function getAllTicketsResponse() {
        $query = "SELECT * FROM tickets_response_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getTicketsResponseByNo($tickets_no_trt) {
        $query = "SELECT * FROM tickets_response_tbl WHERE tickets_no_trt='" . $tickets_no_trt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmTicketsResponseEntity($tickets_no_trt) {
        $res = "SELECT*FROM tickets_response_tbl WHERE tickets_no_trt = '" . $tickets_no_trt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewTicketsResponse(
    $id, $tickets_no_trt, $tickets_status_trt, $response_date_trt, $response_details_trt, $required_time_trt, $hardware_required_trt, $is_edit_trt, $item01_trt, $item02_trt, $item03_trt, $item04_trt, $item05_trt, $org_name_trt, $org_date_trt, $org_time_trt
    ) {



        $res = "INSERT INTO tickets_response_tbl  SET
		        tickets_no_trt='" . $tickets_no_trt . "',
                        tickets_status_trt='" . $tickets_status_trt . "',
                        response_date_trt='" . $response_date_trt . "',
                        response_details_trt='" . $response_details_trt . "',
                        required_time_trt='" . $required_time_trt . "',
                        hardware_required_trt='" . $hardware_required_trt . "',
                        is_edit_trt='" . $is_edit_trt . "',
                        item01_trt='" . $item01_trt . "',
                        item02_trt='" . $item02_trt . "',
                        item03_trt='" . $item03_trt . "',
                        item04_trt='" . $item04_trt . "',
                        item05_trt='" . $item05_trt . "',
                        org_name_trt='" . $org_name_trt . "',
                        org_date_trt='" . $org_date_trt . "',
                        org_time_trt='" . $org_time_trt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateTicketsResponse(
    $id, $tickets_no_trt, $tickets_status_trt, $response_date_trt, $response_details_trt, $required_time_trt, $hardware_required_trt, $is_edit_trt, $item01_trt, $item02_trt, $item03_trt, $item04_trt, $item05_trt, $org_name_trt, $org_date_trt, $org_time_trt
    ) {

        $res = mysql_query("UPDATE tickets_response_tbl SET
                        tickets_status_trt='" . $tickets_status_trt . "',
                        response_date_trt='" . $response_date_trt . "',
                        response_details_trt='" . $response_details_trt . "',
                        required_time_trt='" . $required_time_trt . "',
                        hardware_required_trt='" . $hardware_required_trt . "',
                        is_edit_trt='" . $is_edit_trt . "',
                        item01_trt='" . $item01_trt . "',
                        item02_trt='" . $item02_trt . "',
                        item03_trt='" . $item03_trt . "',
                        item04_trt='" . $item04_trt . "',
                        item05_trt='" . $item05_trt . "',
                        org_name_trt='" . $org_name_trt . "',
                        org_date_trt='" . $org_date_trt . "',
                        org_time_trt='" . $org_time_trt . "'

		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteTicketsResponse($id) {
        $query = "DELETE FROM tickets_response_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getNextTicketsResponseRefNo($table, $suffix) {
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

<?php

class TicketsApproved {

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

    public function getAllTicketsApproved() {
        $query = "SELECT * FROM tickets_approved_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getTicketsApprovedByNo($tickets_no_tat) {
        $query = "SELECT * FROM tickets_approved_tbl WHERE tickets_no_tat='" . $tickets_no_tat . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmTicketsApprovedEntity($tickets_no_tat) {
        $res = "SELECT*FROM tickets_approved_tbl WHERE tickets_no_tat = '" . $tickets_no_tat . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewTicketsApproved(
    $id, $tickets_no_tat, $assign_name_tat, $assign_date_tat, $possibility_tat, $is_edit_tat, $item01_tat, $item02_tat, $item03_tat, $item04_tat, $item05_tat, $org_name_tat, $org_date_tat, $org_time_tat
    ) {



        $res = "INSERT INTO tickets_approved_tbl  SET
		        tickets_no_tat='" . $tickets_no_tat . "',
                        assign_name_tat='" . $assign_name_tat . "',
                        assign_date_tat='" . $assign_date_tat . "',
                        possibility_tat='" . $possibility_tat . "',
                        is_edit_tat='" . $is_edit_tat . "',
                        item01_tat='" . $item01_tat . "',
                        item02_tat='" . $item02_tat . "',
                        item03_tat='" . $item03_tat . "',
                        item04_tat='" . $item04_tat . "',
                        item05_tat='" . $item05_tat . "',
                        org_name_tat='" . $org_name_tat . "',
                        org_date_tat='" . $org_date_tat . "',
                        org_time_tat='" . $org_time_tat . "'
		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateTicketsApproved(
    $id, $tickets_no_tat, $assign_name_tat, $assign_date_tat, $possibility_tat, $is_edit_tat, $item01_tat, $item02_tat, $item03_tat, $item04_tat, $item05_tat, $org_name_tat, $org_date_tat, $org_time_tat
    ) {

        $res = mysql_query("UPDATE tickets_approved_tbl SET
			tickets_no_tat='" . $tickets_no_tat . "',
                        assign_name_tat='" . $assign_name_tat . "',
                        assign_date_tat='" . $assign_date_tat . "',
                        possibility_tat='" . $possibility_tat . "',
                        is_edit_tat='" . $is_edit_tat . "',
                        item01_tat='" . $item01_tat . "',
                        item02_tat='" . $item02_tat . "',
                        item03_tat='" . $item03_tat . "',
                        item04_tat='" . $item04_tat . "',
                        item05_tat='" . $item05_tat . "',
                        org_name_tat='" . $org_name_tat . "',
                        org_date_tat='" . $org_date_tat . "',
                        org_time_tat='" . $org_time_tat . "'

		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteTicketsApproved($id){
        $query = "DELETE FROM tickets_approved_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
        
        
        
    }

    public function getNextTicketsApprovedRefNo($table, $suffix) {
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

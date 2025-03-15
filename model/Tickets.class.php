<?php

class Tickets {

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

    public function getAllTickets() {
        $query = "SELECT * FROM tickets_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getTicketsByNo($tickets_ref_no_tt) {
        $query = "SELECT * FROM tickets_tbl WHERE tickets_ref_no_tt='" . $tickets_ref_no_tt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmTicketsEntity($tickets_ref_no_tt) {
        $res = "SELECT*FROM tickets_tbl WHERE tickets_ref_no_tt = '" . $tickets_ref_no_tt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewTickets(
    $id, $tickets_ref_no_tt, $request_date_tt, $depart_tt, $category_tt, $subject_tt, $pc_number_tt, $description_tt, $response_tt, $request_person_tt, $response_person_tt, $status_tt, $is_edit_tt, $item01_tt, $item02_tt, $item03_tt, $item04_tt, $item05_tt, $item06_tt, $item07_tt, $item08_tt, $item09_tt, $item10_tt, $org_name_tt, $org_date_tt, $org_time_tt
    ) {



        $res = "INSERT INTO tickets_tbl  SET
		        tickets_ref_no_tt='" . $tickets_ref_no_tt . "',
                        request_date_tt='" . $request_date_tt . "',
                        depart_tt='" . $depart_tt . "',
                        category_tt='" . $category_tt . "',
                        subject_tt='" . $subject_tt . "',
                        pc_number_tt='" . $pc_number_tt . "',
                        description_tt='" . $description_tt . "',
                        response_tt='" . $response_tt . "',
                        request_person_tt='" . $request_person_tt . "',
                        response_person_tt='" . $response_person_tt . "',
                        status_tt='" . $status_tt . "',
                        is_edit_tt='" . $is_edit_tt . "',
                        item01_tt='" . $item01_tt . "',
                        item02_tt='" . $item02_tt . "',
                        item03_tt='" . $item03_tt . "',
                        item04_tt='" . $item04_tt . "',
                        item05_tt='" . $item05_tt . "',
                        item06_tt='" . $item06_tt . "',
                        item07_tt='" . $item07_tt . "',
                        item08_tt='" . $item08_tt . "',
                        item09_tt='" . $item09_tt . "',
                        item10_tt='" . $item10_tt . "',
                        org_name_tt='" . $org_name_tt . "',
                        org_date_tt='" . $org_date_tt . "',
                        org_time_tt='" . $org_time_tt . "'

		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateTickets(
    $id, $tickets_ref_no_tt, $request_date_tt, $depart_tt, $category_tt, $subject_tt, $pc_number_tt, $description_tt, $response_tt, $request_person_tt, $response_person_tt, $status_tt, $is_edit_tt, $item01_tt, $item02_tt, $item03_tt, $item04_tt, $item05_tt, $item06_tt, $item07_tt, $item08_tt, $item09_tt, $item10_tt, $org_name_tt, $org_date_tt, $org_time_tt
    ) {

        $res = mysql_query("UPDATE tickets_tbl SET
			tickets_ref_no_tt='" . $tickets_ref_no_tt . "',
                        request_date_tt='" . $request_date_tt . "',
                        depart_tt='" . $depart_tt . "',
                        category_tt='" . $category_tt . "',
                        subject_tt='" . $subject_tt . "',
                        pc_number_tt='" . $pc_number_tt . "',
                        description_tt='" . $description_tt . "',
                        response_tt='" . $response_tt . "',
                        request_person_tt='" . $request_person_tt . "',
                        response_person_tt='" . $response_person_tt . "',
                        status_tt='" . $status_tt . "',
                        is_edit_tt='" . $is_edit_tt . "',
                        item01_tt='" . $item01_tt . "',
                        item02_tt='" . $item02_tt . "',
                        item03_tt='" . $item03_tt . "',
                        item04_tt='" . $item04_tt . "',
                        item05_tt='" . $item05_tt . "',
                        item06_tt='" . $item06_tt . "',
                        item07_tt='" . $item07_tt . "',
                        item08_tt='" . $item08_tt . "',
                        item09_tt='" . $item09_tt . "',
                        item10_tt='" . $item10_tt . "',
                        org_name_tt='" . $org_name_tt . "',
                        org_date_tt='" . $org_date_tt . "',
                        org_time_tt='" . $org_time_tt . "'

		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteTickets($id) {
        $query = "DELETE FROM tickets_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }
    
    
	public function getAera($id){
		$query="SELECT FROM data_tbl WHERE curve_no_dt='".$id."'";
		$result= $this->mysqli->query($query);
		if($result){
                       while ($row = $result->fetch_assoc()) {
                    $row = $result->fetch_assoc();
			return $row["silver_area_dt"];
                       }
		}
                else{
                    return 1;
                    
                }
	}
        
    

    public function getNextTicketsRefNo($table, $suffix) {
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

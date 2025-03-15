<?php

class ToolsUpdate {

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

    public function getAllToolsUpdate() {

        $query = "SELECT * FROM tools_update_tbl";

        $result = $this->mysqli->query($query);

        $num_result = $result->num_rows;


        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }

            return $this->data;
        }
    }

    public function createNewToolsUpdate(
    $id, $update_id_tut, $is_tut, $item01_tut, $item02_tut, $item03_tut, $item04_tut, $item05_tut, $org_name_tut, $date_tut, $time_tut
    ) {



        $res = "INSERT INTO tools_update_tbl  SET
		 id='" . $id . "',
update_id_tut='" . $update_id_tut . "',
is_tut='" . $is_tut . "',
item01_tut='" . $item01_tut . "',
item02_tut='" . $item02_tut . "',
item03_tut='" . $item03_tut . "',
item04_tut='" . $item04_tut . "',
item05_tut='" . $item05_tut . "',
org_name_tut='" . $org_name_tut . "',
date_tut='" . $date_tut . "',
time_tut='" . $time_tut . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function getToolsUpdateByNo($pattern_no_pmt) {
        $la = array();
        $query = "SELECT * FROM tools_update_tbl WHERE update_id_tut='" . $pattern_no_pmt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
          return 1;
      
        }
        else{
            
       return 0;
        }
    }

    public function confirmToolsUpdateEntity($pattern_no_pmt) {
        $res = "SELECT*FROM tools_update_tbl WHERE pattern_no_pmt = '" . $pattern_no_pmt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateToolsUpdate(
    $id, $update_id_tut, $is_tut, $item01_tut, $item02_tut, $item03_tut, $item04_tut, $item05_tut, $org_name_tut, $date_tut, $time_tut
    ) {

        $res = mysql_query("UPDATE tools_update_tbl SET
		update_id_tut='" . $update_id_tut . "',
                is_tut='" . $is_tut . "',
                item01_tut='" . $item01_tut . "',
                item02_tut='" . $item02_tut . "',
                item03_tut='" . $item03_tut . "',
                item04_tut='" . $item04_tut . "',
                item05_tut='" . $item05_tut . "',
                org_name_tut='" . $org_name_tut . "',
                date_tut='" . $date_tut . "',
                time_tut='" . $time_tut . "'


		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function updateToolsUpdateById(
    $id, $update_id_tut, $is_tut, $item01_tut, $item02_tut, $item03_tut, $item04_tut, $item05_tut, $org_name_tut, $date_tut, $time_tut
    ) {

        $res = "UPDATE tools_update_tbl SET
		update_id_tut='" . $update_id_tut . "',
                is_tut='" . $is_tut . "',     
                org_name_tut='" . $org_name_tut . "',
                date_tut='" . $date_tut . "',
                time_tut='" . $time_tut . "'
		  WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteToolsUpdate($id) {
        $query = "DELETE FROM tools_update_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getNextToolsUpdateRefNo($table, $suffix) {
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

    public function getToolsUpdateName() {
        $query = "SELECT pattern_no_pmt FROM tools_update_tbl ORDER BY pattern_no_pmt DESC ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pattern_no_pmt'] . "' >" . $rows['pattern_no_pmt'] . "</option>");
            }
        }
    }

}

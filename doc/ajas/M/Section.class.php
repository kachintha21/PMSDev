<?php

class Section {

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

    public function getAllSection() {
        $query = "SELECT * FROM section_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getSectionByNo($section_name_st) {
        $query = "SELECT * FROM section_tbl WHERE colours_code_ct='" . $section_name_st . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getSectionById($id) {
        $la = array();
        $query = "SELECT*FROM section_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_st'], $rows['section_name_st'], $rows['is_edit_st'], $rows['org_name_st'], $rows['org_date_st'], $rows['org_time_st']
                );
            }
            return $la;
        }
    }

    public function confirmSectionEntity($section_name_st) {
        $res = "SELECT*FROM section_tbl WHERE colours_code_ct = '" . $section_name_st . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewSection(
    $id, $ref_no_st, $section_name_st, $is_edit_st, $org_name_st, $org_date_st, $org_time_st
    ) {


        $res = "INSERT INTO section_tbl  SET
             ref_no_st='" . $ref_no_st . "',
            section_name_st='" . $section_name_st . "',
            is_edit_st='" . $is_edit_st . "',
            org_name_st='" . $org_name_st . "',
            org_date_st='" . $org_date_st . "',
            org_time_st='" . $org_time_st . "'
		 ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateSection(
    $id, $ref_no_st, $section_name_st, $is_edit_st, $org_name_st, $org_date_st, $org_time_st
    ) {

        $res = "UPDATE section_tbl SET
            ref_no_st='" . $ref_no_st . "',
            section_name_st='" . $section_name_st . "',
            is_edit_st='" . $is_edit_st . "',
            org_name_st='" . $org_name_st . "',
            org_date_st='" . $org_date_st . "',
            org_time_st='" . $org_time_st . "'
            WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteSection($id) {
        $query = "DELETE FROM section_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:section_view.php');
        }
    }

    public function getNextSectionRefNo($table, $suffix) {
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

    public function getSectionByName() {
        $query = "SELECT section_name_st FROM section_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['section_name_st'] . "' >" . $rows['section_name_st'] . "</option>");
            }
        }
    }

}

<?php

class Skill {

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

    public function getAllSkill() {
        $query = "SELECT * FROM skill_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getSkillByNo($pro_name_st) {
        $query = "SELECT * FROM skill_tbl WHERE colours_code_ct='" . $pro_name_st . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmSkillEntity($pro_name_st) {
        $res = "SELECT*FROM skill_tbl WHERE colours_code_ct = '" . $pro_name_st . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewSkill(
    $id, $emp_no_st, $pro_name_st, $is_edit_st, $org_name_st, $org_date_st, $org_time_st
    ) {


        $res = "INSERT INTO skill_tbl  SET
             emp_no_st='" . $emp_no_st . "',
            pro_name_st='" . $pro_name_st . "',
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

    public function updateSkill(
    $id, $emp_no_st, $pro_name_st, $is_edit_st, $org_name_st, $org_date_st, $org_time_s
    ) {

        $res = mysql_query("UPDATE skill_tbl SET
            emp_no_st='" . $emp_no_st . "',
            pro_name_st='" . $pro_name_st . "',
            is_edit_st='" . $is_edit_st . "',
            org_name_st='" . $org_name_st . "',
            org_date_st='" . $org_date_st . "',
            org_time_st='" . $org_time_st . "',
            WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteSkill($id) {
        $query = "DELETE FROM skill_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:account_managed_view.php');
        }
    }

    public function getNextSkillRefNo($table, $suffix) {
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

    public function getSkillByName() {
        $query = "SELECT pro_name_st FROM skill_tbl ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pro_name_st'] . "' >" . $rows['pro_name_st'] . "</option>");
            }
        }
    }

}

<?php

class PigmentStore {
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

    public function getAllPigmentStore() {
        $query = "SELECT * FROM pigment_store_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function gePigmentIssuesByNo($barcode_ref_no_pidt) {
        $la = array();
        $query = "SELECT * FROM pigment_store_tbl WHERE barcode_ref_no_pidt='" . $barcode_ref_no_pidt . "'    ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_pst'], $rows['printing_pattern_pst'], $rows['weight_pst'], $rows['comment_pst'], $rows['mix_date_pst'], $rows['item01_pst'], $rows['item02_pst'], $rows['item03_pst'], $rows['item04_pst'], $rows['item05_pst'], $rows['org_name_pst'], $rows['org_date_pst'], $rows['org_time_pst']
                );
            }
            return $la;
        }
    }

    public function getPigmentStoreByNo($ref_no_pst) {
        $query = "SELECT * FROM pigment_store_tbl WHERE ref_no_pst='" . $ref_no_pst . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPigmentStoreEntity($ref_no_pst) {
        $res = "SELECT*FROM pigment_store_tbl WHERE ref_no_pst = '" . $ref_no_pst . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentStore(
    $id, $ref_no_pst, $printing_pattern_pst, $weight_pst, $comment_pst, $mix_date_pst, $item01_pst, $item02_pst, $item03_pst, $item04_pst, $item05_pst, $org_name_pst, $org_date_pst, $org_time_pst
    ) {



        $res = "INSERT INTO pigment_store_tbl  SET
                 id='" . $id . "',
                ref_no_pst='" . $ref_no_pst . "',
                printing_pattern_pst='" . $printing_pattern_pst . "',
                weight_pst='" . $weight_pst . "',
                comment_pst='" . $comment_pst . "',
                mix_date_pst='" . $mix_date_pst . "',
                item01_pst='" . $item01_pst . "',
                item02_pst='" . $item02_pst . "',
                item03_pst='" . $item03_pst . "',
                item04_pst='" . $item04_pst . "',
                item05_pst='" . $item05_pst . "',
                org_name_pst='" . $org_name_pst . "',
                org_date_pst='" . $org_date_pst . "',
                org_time_pst='" . $org_time_pst . "'
                     ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentStore(
    $id, $ref_no_pst, $printing_pattern_pst, $weight_pst, $comment_pst, $mix_date_pst, $item01_pst, $item02_pst, $item03_pst, $item04_pst, $item05_pst, $org_name_pst, $org_date_pst, $org_time_pst
    ) {

        $res = mysql_query("UPDATE pigment_store_tbl SET
               id='" . $id . "',
                ref_no_pst='" . $ref_no_pst . "',
                printing_pattern_pst='" . $printing_pattern_pst . "',
                weight_pst='" . $weight_pst . "',
                comment_pst='" . $comment_pst . "',
                mix_date_pst='" . $mix_date_pst . "',
                item01_pst='" . $item01_pst . "',
                item02_pst='" . $item02_pst . "',
                item03_pst='" . $item03_pst . "',
                item04_pst='" . $item04_pst . "',
                item05_pst='" . $item05_pst . "',
                org_name_pst='" . $org_name_pst . "',
                org_date_pst='" . $org_date_pst . "',
                org_time_pst='" . $org_time_pst . "'


	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentStore($id) {
        $query = "DELETE FROM pigment_store_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:pigment_issues_details_data.php');
        }
    }

    public function getNextPigmentStoreRefNo($table, $suffix) {
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

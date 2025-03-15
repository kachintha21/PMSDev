<?php

class FilmOutingDetails {

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

    public function getAllFilmOutingDetails() {
        $query = "SELECT * FROM film_outing_details_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getFilmOutingDetailsByNo($id) {
        $la = array();
        $query = "SELECT*FROM film_outing_details_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['id'], $rows['pattern_no_fodt'], $rows['pro_no_fodt'], $rows['lot_no_fodt'], $rows['curve_no_fodt'], $rows['per_sheet_fodt'], $rows['is_edit_fodt'], $rows['item01_fodt'], $rows['item02_fodt'], $rows['item03_fodt'], $rows['item04_fodt'], $rows['item05_fodt'], $rows['org_name_fodt'], $rows['org_date_fodt'], $rows['org_time_fodt']
                );
            }
            return $la;
        }
    }

    public function createNewFilmOutingDetails(
    $id, $pattern_no_fodt, $pro_no_fodt, $lot_no_fodt, $curve_no_fodt, $per_sheet_fodt, $is_edit_fodt, $item01_fodt, $item02_fodt, $item03_fodt, $item04_fodt, $item05_fodt, $org_name_fodt, $org_date_fodt, $org_time_fodt
    ) {



        $res = "INSERT INTO film_outing_details_tbl  SET
        pattern_no_fodt='" . $pattern_no_fodt . "',
        pro_no_fodt='" . $pro_no_fodt . "',
        lot_no_fodt='" . $lot_no_fodt . "',
        curve_no_fodt='" . $curve_no_fodt . "',
        per_sheet_fodt='" . $per_sheet_fodt . "',
        is_edit_fodt='" . $is_edit_fodt . "',
        item01_fodt='" . $item01_fodt . "',
        item02_fodt='" . $item02_fodt . "',
        item03_fodt='" . $item03_fodt . "',
        item04_fodt='" . $item04_fodt . "',
        item05_fodt='" . $item05_fodt . "',
        org_name_fodt='" . $org_name_fodt . "',
        org_date_fodt='" . $org_date_fodt . "',
        org_time_fodt='" . $org_time_fodt . "'



		       ";


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateFilmOutingDetails(
    $id, $pattern_no_fodt, $pro_no_fodt, $lot_no_fodt, $curve_no_fodt, $per_sheet_fodt, $is_edit_fodt, $item01_fodt, $item02_fodt, $item03_fodt, $item04_fodt, $item05_fodt, $org_name_fodt, $org_date_fodt, $org_time_fodt
    ) {

        $res = mysql_query("UPDATE film_outing_details_tbl SET
        id='" . $id . "',
        pattern_no_fodt='" . $pattern_no_fodt . "',
        pro_no_fodt='" . $pro_no_fodt . "',
        lot_no_fodt='" . $lot_no_fodt . "',
        curve_no_fodt='" . $curve_no_fodt . "',
        per_sheet_fodt='" . $per_sheet_fodt . "',
        is_edit_fodt='" . $is_edit_fodt . "',
        item01_fodt='" . $item01_fodt . "',
        item02_fodt='" . $item02_fodt . "',
        item03_fodt='" . $item03_fodt . "',
        item04_fodt='" . $item04_fodt . "',
        item05_fodt='" . $item05_fodt . "',
        org_name_fodt='" . $org_name_fodt . "',
        org_date_fodt='" . $org_date_fodt . "',
        org_time_fodt='" . $org_time_fodt . "',
            
	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteFilmOutingDetails($id) {
        $query = "DELETE FROM film_outing_details_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextFilmOutingDetailsRefNo($table, $suffix) {
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

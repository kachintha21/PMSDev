<?php

class FilmOuting {

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

    public function getAllFilmOuting() {
        $query = "SELECT * FROM film_outing_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getFilmOutingByNo($id) {
        $la = array();
        $query = "SELECT*FROM film_outing_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['pattern_no_fot'], $rows['pro_no_fot'], $rows['lot_fot'], $rows['sheets_fot'], $rows['judgment_fot'], $rows['ffinish_date_fot'], $rows['colour_print_date_fot'], $rows['print_plan_date_fot'], $rows['layout_maker_fot'], $rows['layout_Check_fot'], $rows['is_edit_fot'], $rows['item01_fot'], $rows['item02_fot'], $rows['item03_fot'], $rows['item04_fot'], $rows['item05_fot'], $rows['item06_fot'], $rows['item07_fot'], $rows['item08_fot'], $rows['item09_fot'], $rows['item10_fot'], $rows['org_name_fot'], $rows['org_date_fot'], $rows['org_time_fot']
                );
            }
            return $la;
        }
    }

    
    
      public function getWipFilmOuting() {
        $query = "SELECT pro02_pst FROM printing_status_tbl WHERE pro02_pst='1'  GROUP BY  ref_no_pst   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
        
    }
    
  

    public function getDailyOutPutQtyFilmOuting($date) {
       $query = "SELECT org_date_fot FROM film_outing_tbl WHERE org_date_fot='" . $date . "'  GROUP BY  lot_fot   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {

            return 0;
        }
    }

    public function confirmFilmOutingEntity($ref_no_plt) {
        $res = "SELECT*FROM film_outing_tbl WHERE ref_no_plt = '" . $ref_no_plt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewFilmOuting(
    $id, $pattern_no_fot, $pro_no_fot, $lot_fot, $sheets_fot, $judgment_fot, $ffinish_date_fot, $colour_print_date_fot, $print_plan_date_fot, $layout_maker_fot, $layout_Check_fot, $is_edit_fot, $item01_fot, $item02_fot, $item03_fot, $item04_fot, $item05_fot, $item06_fot, $item07_fot, $item08_fot, $item09_fot, $item10_fot, $org_name_fot, $org_date_fot, $org_time_fot
    ) {



        $res = "INSERT INTO film_outing_tbl  SET
               id='".$id."',
pattern_no_fot='".$pattern_no_fot."',
pro_no_fot='".$pro_no_fot."',
lot_fot='".$lot_fot."',
sheets_fot='".$sheets_fot."',
judgment_fot='".$judgment_fot."',
ffinish_date_fot='".$ffinish_date_fot."',
colour_print_date_fot='".$colour_print_date_fot."',
print_plan_date_fot='".$print_plan_date_fot."',
layout_maker_fot='".$layout_maker_fot."',
layout_Check_fot='".$layout_Check_fot."',
is_edit_fot='".$is_edit_fot."',
item01_fot='".$item01_fot."',
item02_fot='".$item02_fot."',
item03_fot='".$item03_fot."',
item04_fot='".$item04_fot."',
item05_fot='".$item05_fot."',
item06_fot='".$item06_fot."',
item07_fot='".$item07_fot."',
item08_fot='".$item08_fot."',
item09_fot='".$item09_fot."',
item10_fot='".$item10_fot."',
org_name_fot='".$org_name_fot."',
org_date_fot='".$org_date_fot."',
org_time_fot='".$org_time_fot."'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateFilmOuting(
    $id, $pattern_no_fot, $pro_no_fot, $lot_fot, $sheets_fot, $judgment_fot, $ffinish_date_fot, $colour_print_date_fot, $print_plan_date_fot, $layout_maker_fot, $layout_Check_fot, $is_edit_fot, $item01_fot, $item02_fot, $item03_fot, $item04_fot, $item05_fot, $item06_fot, $item07_fot, $item08_fot, $item09_fot, $item10_fot, $org_name_fot, $org_date_fot, $org_time_fot
    ) {

        $res = mysql_query("UPDATE film_outing_tbl SET
                               id='".$id."',
                            pattern_no_fot='".$pattern_no_fot."',
                            pro_no_fot='".$pro_no_fot."',
                            lot_fot='".$lot_fot."',
                            sheets_fot='".$sheets_fot."',
                            judgment_fot='".$judgment_fot."',
                            ffinish_date_fot='".$ffinish_date_fot."',
                            colour_print_date_fot='".$colour_print_date_fot."',
                            print_plan_date_fot='".$print_plan_date_fot."',
                            layout_maker_fot='".$layout_maker_fot."',
                            layout_Check_fot='".$layout_Check_fot."',
                            is_edit_fot='".$is_edit_fot."',
                            item01_fot='".$item01_fot."',
                            item02_fot='".$item02_fot."',
                            item03_fot='".$item03_fot."',
                            item04_fot='".$item04_fot."',
                            item05_fot='".$item05_fot."',
                            item06_fot='".$item06_fot."',
                            item07_fot='".$item07_fot."',
                            item08_fot='".$item08_fot."',
                            item09_fot='".$item09_fot."',
                            item10_fot='".$item10_fot."',
                            org_name_fot='".$org_name_fot."',
                            org_date_fot='".$org_date_fot."',
                            org_time_fot='".$org_time_fot."'

	        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteFilmOuting($id) {
        $query = "DELETE FROM film_outing_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextFilmOutingRefNo($table, $suffix) {
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

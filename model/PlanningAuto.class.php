<?php
class PlanningAuto {
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

    public function getAllPlanningAuto() {
        $query = "SELECT * FROM planning_auto_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getTicketsByNo($ref_no_fdt) {
        $query = "SELECT * FROM planning_auto_tbl WHERE ref_no_fdt='" . $ref_no_fdt . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmPlanningAutoEntity($ref_no_fdt) {
        $res = "SELECT*FROM planning_auto_tbl WHERE ref_no_fdt = '" . $ref_no_fdt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPlanningAuto(
    $id, $ref_no_pat, $item01_pat, $item02_pat, $item03_pat, $item04_pat, $item05_pat, $org_name_pat, $org_date_pat, $org_time_pat
    ) {



        $res = "INSERT INTO planning_auto_tbl  SET
            ref_no_pat ='" . $ref_no_pat . "',
            item01_pat ='" . $item01_pat . "',
            item02_pat ='" . $item02_pat . "',
            item03_pat ='" . $item03_pat . "',
            item04_pat ='" . $item04_pat . "',
            item05_pat ='" . $item05_pat . "',
            org_name_pat ='" . $org_name_pat . "',
            org_date_pat ='" . $org_date_pat . "',
            org_time_pat ='" . $org_time_pat . "'

          ";




        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePlanningAuto(
    $id, $ref_no_pat, $item01_pat, $item02_pat, $item03_pat, $item04_pat, $item05_pat, $org_name_pat, $org_date_pat, $org_time_pat
    ) {

        $res = mysql_query("UPDATE planning_auto_tbl SET
	    ref_no_pat ='" . $ref_no_pat . "',
            item01_pat ='" . $item01_pat . "',
            item02_pat ='" . $item02_pat . "',
            item03_pat ='" . $item03_pat . "',
            item04_pat ='" . $item04_pat . "',
            item05_pat ='" . $item05_pat . "',
            org_name_pat ='" . $org_name_pat . "',
            org_date_pat ='" . $org_date_pat . "',
            org_time_pat ='" . $org_time_pat . "'


		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deletePlanningAuto($id) {
        $query = "DELETE FROM planning_auto_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getPlanningAuto($id) {
        $query = "SELECT FROM data_tbl WHERE curve_no_dt='" . $id . "'";
        $result = $this->mysqli->query($query);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row = $result->fetch_assoc();
                return $row["silver_area_dt"];
            }
        } else {
            return 1;
        }
    }

    public function getNextPlanningAutoRefNo($table, $suffix) {
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

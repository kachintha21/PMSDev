<?php

class Order {

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

    public function getAllOrder() {
        $query = "SELECT * FROM order_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getOrderByNo($design_no_ot) {
        $query = "SELECT * FROM order_tbl WHERE design_no_ot='" . $design_no_ot . "'";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function confirmOrderEntity($design_no_ot) {
        $res = "SELECT*FROM order_tbl WHERE design_no_ot = '" . $design_no_ot . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewOrder(
    $id, $design_no_ot, $curve_no_ot, $curve_qty_ot, $ship_date_ot, $status_st
    ) {



        $res = "INSERT INTO order_tbl  SET
                     design_no_ot='" . $design_no_ot . "',
                    curve_no_ot='" . $curve_no_ot . "',
                    curve_qty_ot='" . $curve_qty_ot . "',
                    ship_date_ot='" . $ship_date_ot . "',
                    status_st='" . $status_st . "'


		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateOrder(
    $design_no_ot, $curve_no_ot, $curve_qty_ot, $ship_date_ot, $status_st
    ) {

        $res = mysql_query("UPDATE order_tbl SET
		    design_no_ot='" . $design_no_ot . "',
                    curve_no_ot='" . $curve_no_ot . "',
                    curve_qty_ot='" . $curve_qty_ot . "',
                    ship_date_ot='" . $ship_date_ot . "',
                    status_st='" . $status_st . "'

		        WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

    public function deleteOrder($id) {
        $query = "DELETE FROM order_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function getAera($id) {
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

    public function getNextOrderRefNo($table, $suffix) {
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

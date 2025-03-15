<?php

class PigmentTransaction {

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

    public function getAllPigmentTransaction() {
        $query = "SELECT * FROM pigment_transaction_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getPigmentTransactionCounty() {
        $query = "SELECT * FROM pigment_transaction_tbl WHERE st01_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function getPigmentTransactionTwo() {

        $query = "SELECT * FROM pigment_transaction_tbl WHERE st02_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function getPigmentTransactionThree() {


        $query = "SELECT * FROM product_pigment_transaction_tbl WHERE st03_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function confirmPigmentTransactionEntity($ref_no_ptt) {
        $res = "SELECT*FROM pigment_transaction_tbl WHERE ref_no_ptt = '" . $ref_no_ptt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewPigmentTransaction(
    $id, $ref_no_ptt, $pattern_no_ptt, $loc01_ptt, $loc02_ptt, $loc03_ptt, $loc04_ptt, $loc05_ptt, $org_name_ptt, $org_date_ptt, $org_time_ptt
    ) {

        $res = "INSERT INTO pigment_transaction_tbl  SET
	ref_no_ptt='" . $ref_no_ptt . "',
        pattern_no_ptt='" . $pattern_no_ptt . "',
        loc01_ptt='" . $loc01_ptt . "',
        loc02_ptt='" . $loc02_ptt . "',
        loc03_ptt='" . $loc03_ptt . "',
        loc04_ptt='" . $loc04_ptt . "',
        loc05_ptt='" . $loc05_ptt . "',
        org_name_ptt='" . $org_name_ptt . "',
        org_date_ptt='" . $org_date_ptt . "',
        org_time_ptt='" . $org_time_ptt . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentTransaction(
    $id, $ref_no_ptt, $pattern_no_ptt, $loc01_ptt, $loc02_ptt, $loc03_ptt, $loc04_ptt, $loc05_ptt, $org_name_ptt, $org_date_ptt, $org_time_ptt
    ) {
        $res = "UPDATE pigment_transaction_tbl SET
         ref_no_ptt='" . $ref_no_ptt . "',
        pattern_no_ptt='" . $pattern_no_ptt . "',
        loc01_ptt='" . $loc01_ptt . "',
        loc02_ptt='" . $loc02_ptt . "',
        loc03_ptt='" . $loc03_ptt . "',
        loc04_ptt='" . $loc04_ptt . "',
        loc05_ptt='" . $loc05_ptt . "',
        org_name_ptt='" . $org_name_ptt . "',
        org_date_ptt='" . $org_date_ptt . "',
        org_time_ptt='" . $org_time_ptt . "'
        WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updatePigmentTransactionById(
   $ref_no_ptt,$pattern_no_pt ,$index
    ) {

        switch ($index) {
        case '1':
        $res = "UPDATE pigment_transaction_tbl SET
	loc01_ptt='0',
        loc02_ptt='1'        
        WHERE ref_no_ptt='" . $ref_no_ptt . "'  ";
        break;
    
    
    
      case '2':
        $res = "UPDATE pigment_transaction_tbl SET
	loc01_ptt='1',
        loc02_ptt='0'        
        WHERE ref_no_ptt='" . $ref_no_ptt . "'  ";
        break;
    
    
    
    


  
        }


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deletePigmentTransaction($id) {
        $query = "DELETE FROM pigment_transaction_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }

    public function deletePigmentTransactionbyByRef($id) {
        $query = "DELETE FROM pigment_transaction_tbl WHERE ref_no_ptt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getNextPigmentTransactionRefNo($table, $suffix) {
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

    public function getPigmentTransactionNo() {
        $query = "SELECT ref_no_ptt FROM pigment_transaction_tbl WHERE st01_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['ref_no_ptt'] . "' >" . $rows['ref_no_ptt'] . "</option>");
            }
        }
    }

    public function getPigmentTransaction($pattern_no_pt) {
        $query = "SELECT ref_no_ptt FROM pigment_transaction_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['ref_no_ptt'] . "' >" . $rows['ref_no_ptt'] . "</option>");
            }
        }
    }

}

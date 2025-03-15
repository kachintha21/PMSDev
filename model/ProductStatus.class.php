<?php

class ProductStatus {

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

    public function getAllProductStatus() {
        $query = "SELECT * FROM product_status_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
    }

    public function getProductStatusCounty() {
        $query = "SELECT * FROM product_status_tbl WHERE st01_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function getProductStatusTwo() {

        $query = "SELECT * FROM product_status_tbl WHERE st02_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function getProductStatusThree() {


        $query = "SELECT * FROM product_product_status_tbl WHERE st03_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return $num_result;
        } else {
            return "";
        }
    }

    public function confirmProductStatusEntity($production_no_pt) {
        $res = "SELECT*FROM product_status_tbl WHERE production_no_pt = '" . $production_no_pt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewProductStatus(
    $id, $ref_no_pt, $pattern_no_pt, $production_no_pt, $lot_no_pt, $shipment_request_pt, $pro01_pt, $pro02_pt, $pro03_pt, $pro04_pt, $pro05_pt, $pro06_pt, $pro07_pt, $pro08_pt, $pro09_pt, $pro10_pt, $pro11_pt, $pro12_pt, $pro13_pt, $pro14_pt, $pro15_pt, $pro16_pt, $pro17_pt, $pro18_pt, $pro19_pt, $pro20_pt, $org_name_pt, $org_date_pt, $org_time_pt
    ) {

        $res = "INSERT INTO product_status_tbl  SET
	id='" . $id . "',
        ref_no_pt='" . $ref_no_pt . "',
        pattern_no_pt='" . $pattern_no_pt . "',
        production_no_pt='" . $production_no_pt . "',
        lot_no_pt='" . $lot_no_pt . "',
        shipment_request_pt='" . $shipment_request_pt . "',
        pro01_pt='" . $pro01_pt . "',
        pro02_pt='" . $pro02_pt . "',
        pro03_pt='" . $pro03_pt . "',
        pro04_pt='" . $pro04_pt . "',
        pro05_pt='" . $pro05_pt . "',
        pro06_pt='" . $pro06_pt . "',
        pro07_pt='" . $pro07_pt . "',
        pro08_pt='" . $pro08_pt . "',
        pro09_pt='" . $pro09_pt . "',
        pro10_pt='" . $pro10_pt . "',
        pro11_pt='" . $pro11_pt . "',
        pro12_pt='" . $pro12_pt . "',
        pro13_pt='" . $pro13_pt . "',
        pro14_pt='" . $pro14_pt . "',
        pro15_pt='" . $pro15_pt . "',
        pro16_pt='" . $pro16_pt . "',
        pro17_pt='" . $pro17_pt . "',
        pro18_pt='" . $pro18_pt . "',
        pro19_pt='" . $pro19_pt . "',
        pro20_pt='" . $pro20_pt . "',
        org_name_pt='" . $org_name_pt . "',
        org_date_pt='" . $org_date_pt . "',
        org_time_pt='" . $org_time_pt . "' ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateProductStatus(
    $id, $ref_no_pt, $pattern_no_pt, $production_no_pt, $lot_no_pt, $shipment_request_pt, $pro01_pt, $pro02_pt, $pro03_pt, $pro04_pt, $pro05_pt, $pro06_pt, $pro07_pt, $pro08_pt, $pro09_pt, $pro10_pt, $pro11_pt, $pro12_pt, $pro13_pt, $pro14_pt, $pro15_pt, $pro16_pt, $pro17_pt, $pro18_pt, $pro19_pt, $pro20_pt, $org_name_pt, $org_date_pt, $org_time_pt
    ) {
        $res = "UPDATE product_status_tbl SET
	id='" . $id . "',
        ref_no_pt='" . $ref_no_pt . "',
        pattern_no_pt='" . $pattern_no_pt . "',
        production_no_pt='" . $production_no_pt . "',
        lot_no_pt='" . $lot_no_pt . "',
        shipment_request_pt='" . $shipment_request_pt . "',
        pro01_pt='" . $pro01_pt . "',
        pro02_pt='" . $pro02_pt . "',
        pro03_pt='" . $pro03_pt . "',
        pro04_pt='" . $pro04_pt . "',
        pro05_pt='" . $pro05_pt . "',
        pro06_pt='" . $pro06_pt . "',
        pro07_pt='" . $pro07_pt . "',
        pro08_pt='" . $pro08_pt . "',
        pro09_pt='" . $pro09_pt . "',
        pro10_pt='" . $pro10_pt . "',
        pro11_pt='" . $pro11_pt . "',
        pro12_pt='" . $pro12_pt . "',
        pro13_pt='" . $pro13_pt . "',
        pro14_pt='" . $pro14_pt . "',
        pro15_pt='" . $pro15_pt . "',
        pro16_pt='" . $pro16_pt . "',
        pro17_pt='" . $pro17_pt . "',
        pro18_pt='" . $pro18_pt . "',
        pro19_pt='" . $pro19_pt . "',
        pro20_pt='" . $pro20_pt . "',
        org_name_pt='" . $org_name_pt . "',
        org_date_pt='" . $org_date_pt . "',
        org_time_pt='" . $org_time_pt . "'
        WHERE production_no_pt='" . $production_no_pt . "' ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateProductStatusById(
    $pattern_no_pt, $production_no_pt, $lot_no_pt, $id, $index
    ) {

        switch ($index) {

            case '1':
                $res = "UPDATE product_status_tbl SET
	pro01_pt='0',
        pro02_pt='1'        
        WHERE production_no_pt='" . $production_no_pt . "'  AND   pattern_no_pt='" . $pattern_no_pt . "' AND  lot_no_pt='" . $lot_no_pt . "' ";
                break;


        case '2':
        $res = "UPDATE product_status_tbl SET
	pro02_pt='0',
        pro03_pt='1'        
        WHERE production_no_pt='" . $production_no_pt . "'  AND   pattern_no_pt='" . $pattern_no_pt . "' AND  lot_no_pt='" . $lot_no_pt . "' ";
         break;
     
         case '3':
        $res = "UPDATE product_status_tbl SET
	pro03_pt='0',
        pro04_pt='1'        
        WHERE production_no_pt='" . $production_no_pt . "'  AND   pattern_no_pt='" . $pattern_no_pt . "' AND  lot_no_pt='" . $lot_no_pt . "' ";
         break;
     
        }
        
        




        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteProductStatus($id) {
        $query = "DELETE FROM product_status_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:invoice_view.php');
        }
    }
    
       public function deleteProductStatusbyProNo($id) {
        $query = "DELETE FROM product_status_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
           return true;
        }
    }
    
    

    public function getNextProductStatusRefNo($table, $suffix) {
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

    public function getProductStatusNo() {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE st01_st='1' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['production_no_pt'] . "' >" . $rows['production_no_pt'] . "</option>");
            }
        }
    }

    public function getWIPByProces($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function getProductStatus($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['production_no_pt'] . "' >" . $rows['production_no_pt'] . "</option>");
            }
        }
    }

    public function printProductStatusBy($pattern_no_pt, $index, $id) {

        switch ($index) {
            case '1':

                $query = "SELECT production_no_pt,lot_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;


            case '2':

                $query = "SELECT production_no_pt,lot_no_pt FROM product_status_tbl WHERE pro02_pt='1'    AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;
            
              case '3':

                $query = "SELECT production_no_pt,lot_no_pt FROM product_status_tbl WHERE pro03_pt='1'    AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;
            
                 case '4':

                $query = "SELECT production_no_pt,lot_no_pt FROM product_status_tbl WHERE pro04_pt='1'    AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;
            
            
        }

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['production_no_pt'] . "' >" . $rows['production_no_pt'] . $rows['lot_no_pt'] . "</option>");
            }
        }
    }

    public function printProductStatusWIPBy($pattern_no_pt, $index, $id) {

        switch ($index) {
            case '1':

                $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;


               case '2':

                $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro02_pt='1'      AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;
            
               case '3':

                $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro02_pt='1'      AND  pattern_no_pt='" . $pattern_no_pt . "'   ";


                break;
            
            
            
        }

        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function gePatternNumber() {
        $query = "SELECT pattern_no_pt FROM product_status_tbl  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        echo("<option value=''>-Select-</option>");
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {

                echo("<option value='" . $rows['pattern_no_pt'] . "' >" . $rows['pattern_no_pt'] . "</option>");
            }
        }
    }

}

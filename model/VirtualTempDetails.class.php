<?php

class VirtualTempDetails {

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

    public function getVirtualTempDetailsCloneByColor($lot_no_vtdt,$design_no_vtdt,$colours_vtdt) {
        $la = array();
        $query = "SELECT*FROM virtual_temp_details_tbl WHERE colours_vtdt='" .$colours_vtdt . "'  AND design_no_vtdt='" . $design_no_vtdt . "'  AND   lot_no_vtdt='" . $lot_no_vtdt. "'  ";
        $result = $this->mysqli->query($query);        
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_vtdt'], $rows['pro_no_vtdt'], $rows['design_no_vtdt'], $rows['lot_no_vtdt'], $rows['colours_vtdt'], $rows['number_colour_vtdt'], $rows['qty_vtdt'], $rows['ship_scheduled_date_vtdt'], $rows['machine_vtdt'], $rows['priority_vtdt'], $rows['is_edit_vtdt'], $rows['item01_vtdt'], $rows['item02_vtdt'], $rows['item03_vtdt'], $rows['item04_vtdt'], $rows['item05_vtdt'], $rows['org_name_vtdt'], $rows['date_vtdt'], $rows['time_vtdt']
                );
            }
            return $la;
        }
    }
    
     public function getVirtualTempDetailsCloneByById($id) {
        $la = array();
		//print("SELECT item02_vtdt FROM virtual_temp_details_tbl WHERE id='" .$id. "'   ");exit;
        $query = "SELECT item02_vtdt FROM virtual_temp_details_tbl WHERE id='" .$id. "'   ";
        $result = $this->mysqli->query($query);        
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();   
              return $rows['item02_vtdt'];            
                      
        }
    }
    
    
     public function getVirtualTempDetailsPrintDate($id,$colours_vtdt,$number_colour_vtdt) {
        $la = array();        
        $query = "SELECT date_vtst FROM virtua_time_store_tbl WHERE lot_vtst='" .$id. "' AND plan_colors_vtst='S01'   ";
        $result = $this->mysqli->query($query);        
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();   
              
               switch($colours_vtdt){
                case 'S01':
                   $numday=0;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                  case 'S02':
                   $numday=0;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                  case 'S03':
                   $numday=0;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S04':
                   $numday=1;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S05':
                   $numday=1;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S06':
                   $numday=1;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
                   
               
                   case 'S07':
                   $numday=2;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
                     
                   case 'S08':
                   $numday=2;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S09':
                   $numday=2;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S10':
                   $numday=3;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S11':
                   $numday=3;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S14':
                   $numday=3;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S15':
                   $numday=4;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S16':
                   $numday=4;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S17':
                   $numday=4;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                  case 'S18':
                   $numday=5;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S19':
                   $numday=5;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S20':
                   $numday=5;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                    case 'S21':
                   $numday=6;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S22':
                   $numday=6;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S23':
                   $numday=6;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S24':
                   $numday=6;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                    case 'S25':
                   $numday=6;
                   $newDate = strtotime($rows['date_vtst'] . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
               
               }
                      
        }else{
             if($number_colour_vtdt==1){
                  $today = date("Y-m-d");
                  $newDate = strtotime($today . '+ ' .$number_colour_vtdt . 'days');
                  $caldate = Date('Y-m-d', $newDate);
                  return $caldate;
             }else {
              
               
               switch($colours_vtdt){
                case 'S01':
                   $numday=1;
                   $today = date("Y-m-d");
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                  case 'S02':
                   $numday=1;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                  case 'S03':
                   $numday=1;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S04':
                   $numday=2;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S05':
                   $numday=2;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S06':
                   $numday=2;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
                   
               
                   case 'S07':
                   $numday=3;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
                     
                   case 'S08':
                   $numday=3;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S09':
                   $numday=3;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S10':
                   $numday=4;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S11':
                   $numday=4;
                   $newDate = strtotime($today. '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S14':
                   $numday=4;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S15':
                   $numday=5;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S16':
                   $numday=5;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S17':
                   $numday=5;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                  case 'S18':
                   $numday=6;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                   case 'S19':
                   $numday=6;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S20':
                   $numday=6;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                    case 'S21':
                   $numday=7;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S22':
                   $numday=7;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                   case 'S23':
                   $numday=7;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
                    case 'S24':
                   $numday=8;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
               
                    case 'S25':
                   $numday=8;
                   $newDate = strtotime($today . '+ ' .$numday . 'days');                
                   return Date('Y-m-d', $newDate); 
                   break;
               
             }
             }
        }
    }
    
    
     public function getVirtualTempDetailsByNo($id) {
        $la = array();
        $query = "SELECT*FROM virtual_temp_details_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['ref_no_vtdt'], $rows['pro_no_vtdt'], $rows['design_no_vtdt'], $rows['lot_no_vtdt'], $rows['colours_vtdt'], $rows['number_colour_vtdt'], $rows['qty_vtdt'], $rows['ship_scheduled_date_vtdt'], $rows['machine_vtdt'], $rows['priority_vtdt'], $rows['is_edit_vtdt'], $rows['item01_vtdt'], $rows['item02_vtdt'], $rows['item03_vtdt'], $rows['item04_vtdt'], $rows['item05_vtdt'], $rows['org_name_vtdt'], $rows['date_vtdt'], $rows['time_vtdt']
                );
            }
            return $la;
        }
    }


    public function confirmVirtualTempDetailsEntity($ref_no_vtdt) {
        $res = "SELECT*FROM virtual_temp_details_tbl WHERE ref_no_vtdt = '" . $ref_no_vtdt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewVirtualTempDetails(
    $id, $ref_no_vtdt, $pro_no_vtdt, $design_no_vtdt, $lot_no_vtdt, $colours_vtdt, $number_colour_vtdt, $qty_vtdt, $ship_scheduled_date_vtdt, $machine_vtdt, $priority_vtdt, $is_edit_vtdt, $item01_vtdt, $item02_vtdt, $item03_vtdt, $item04_vtdt, $item05_vtdt, $org_name_vtdt, $date_vtdt, $time_vtdt
    ) {



        $res = "INSERT INTO virtual_temp_details_tbl  SET
            id='" . $id . "',
            ref_no_vtdt='" . $ref_no_vtdt . "',
            pro_no_vtdt='" . $pro_no_vtdt . "',
            design_no_vtdt='" . $design_no_vtdt . "',
            lot_no_vtdt='" . $lot_no_vtdt . "',
            colours_vtdt='" . $colours_vtdt . "',
            number_colour_vtdt='" . $number_colour_vtdt . "',
            qty_vtdt='" . $qty_vtdt . "',
            ship_scheduled_date_vtdt='" . $ship_scheduled_date_vtdt . "',
            machine_vtdt='" . $machine_vtdt . "',
            priority_vtdt='" . $priority_vtdt . "',
            is_edit_vtdt='" . $is_edit_vtdt . "',
            item01_vtdt='" . $item01_vtdt . "',
            item02_vtdt='" . $item02_vtdt . "',
            item03_vtdt='" . $item03_vtdt . "',
            item04_vtdt='" . $item04_vtdt . "',
            item05_vtdt='" . $item05_vtdt . "',
            org_name_vtdt='" . $org_name_vtdt . "',
            date_vtdt='" . $date_vtdt . "',
            time_vtdt='" . $time_vtdt . "'
       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateVirtualTempDetails(
    $id, $ref_no_vtdt, $pro_no_vtdt, $design_no_vtdt, $lot_no_vtdt, $colours_vtdt, $number_colour_vtdt, $qty_vtdt, $ship_scheduled_date_vtdt, $machine_vtdt, $priority_vtdt, $is_edit_vtdt, $item01_vtdt, $item02_vtdt, $item03_vtdt, $item04_vtdt, $item05_vtdt, $org_name_vtdt, $date_vtdt, $time_vtdt
    ) {

        $res = mysql_query("UPDATE virtual_temp_details_tbl SET
        id='" . $id . "',
        ref_no_vtdt='" . $ref_no_vtdt . "',
        pro_no_vtdt='" . $pro_no_vtdt . "',
        design_no_vtdt='" . $design_no_vtdt . "',
        lot_no_vtdt='" . $lot_no_vtdt . "',
        colours_vtdt='" . $colours_vtdt . "',
        number_colour_vtdt='" . $number_colour_vtdt . "',
        qty_vtdt='" . $qty_vtdt . "',
        ship_scheduled_date_vtdt='" . $ship_scheduled_date_vtdt . "',
        machine_vtdt='" . $machine_vtdt . "',
        priority_vtdt='" . $priority_vtdt . "',
        is_edit_vtdt='" . $is_edit_vtdt . "',
        item01_vtdt='" . $item01_vtdt . "',
        item02_vtdt='" . $item02_vtdt . "',
        item03_vtdt='" . $item03_vtdt . "',
        item04_vtdt='" . $item04_vtdt . "',
        item05_vtdt='" . $item05_vtdt . "',
        org_name_vtdt='" . $org_name_vtdt . "',
        date_vtdt='" . $date_vtdt . "',
        time_vtdt='" . $time_vtdt . "'
	WHERE id='" . $id . "' ");

        $result = $this->mysqli->query($query);

        if ($result) {
            return true;
        }
    }

        public function updateVirtualTempDetailsById($id, $item02_vtdt,$item03_vtdt) {
        $res = "UPDATE virtual_temp_details_tbl SET      
        item02_vtdt='1' ,
        item03_vtdt='".$item03_vtdt."' 
	WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteVirtualTempDetails($id) {
        $query = "DELETE FROM virtual_temp_details_tbl WHERE ref_no_vtdt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:colour_data.php');
        }
    }

    public function getNextVirtualTempDetailsRefNo($table, $suffix) {
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

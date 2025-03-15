<?php

class DecalInsCounting {

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

        public function getPlanedQtyById($id) {
        $la = array();
        $query = "SELECT*FROM decal_ins_counting_tbl WHERE id='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['date_mlt'], $rows['machine_no_mlt'], $rows['number_shift_mlt'], $rows['work_time_mlt'], $rows['is_edit_mlt'], $rows['item01_mlt'], $rows['item02_mlt'], $rows['item03_mlt'], $rows['item04_mlt'], $rows['item05_mlt'], $rows['org_name_mlt'], $rows['org_date_mlt'], $rows['org_time_mlt']
                );
            }
            return $la;
        }
    }
    public function getPlanedQtyByNo($id) {
        $la = array();
        $query = "SELECT*FROM decal_ins_counting_tbl WHERE pro_no_plt='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['date_mlt'], $rows['machine_no_mlt'], $rows['number_shift_mlt'], $rows['work_time_mlt'], $rows['is_edit_mlt'], $rows['item01_mlt'], $rows['item02_mlt'], $rows['item03_mlt'], $rows['item04_mlt'], $rows['item05_mlt'], $rows['org_name_mlt'], $rows['org_date_mlt'], $rows['org_time_mlt']
                );
            }
            return $la;
        }
    }

    public function getMachineCalendarByDate($date_mlt, $machine_no_mlt) {
        $la = array();
        $query = "SELECT*FROM decal_ins_counting_tbl WHERE machine_no_mlt='" . $machine_no_mlt . "'   AND  date_mlt='" . $date_mlt . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['date_mlt'], $rows['machine_no_mlt'], $rows['number_shift_mlt'], $rows['work_time_mlt'], $rows['is_edit_mlt'], $rows['item01_mlt'], $rows['item02_mlt'], $rows['item03_mlt'], $rows['item04_mlt'], $rows['item05_mlt'], $rows['org_name_mlt'], $rows['org_date_mlt'], $rows['org_time_mlt']
                );
            }
            return $la;
        }
    }

    public function getMachineCalendarByNo($id) {
        $la = array();
        $query = "SELECT*FROM decal_ins_counting_tbl WHERE pro_no_sm='" . $id . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                array_push($la, $rows['id'], $rows['date_mlt'], $rows['machine_no_mlt'], $rows['number_shift_mlt'], $rows['work_time_mlt'], $rows['is_edit_mlt'], $rows['item01_mlt'], $rows['item02_mlt'], $rows['item03_mlt'], $rows['item04_mlt'], $rows['item05_mlt'], $rows['org_name_mlt'], $rows['org_date_mlt'], $rows['org_time_mlt']
                );
            }
            return $la;
        }
    }

    public function getMachineCalendarTimeCheck($machine_no_vtst, $date_vtst, $is) {
        $la = array();
        $query = "SELECT*FROM decal_ins_counting_tbl WHERE machine_no_mlt='" . $machine_no_vtst . "'  AND   date_mlt='" . $date_vtst . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $work_time_mlt = $rows['work_time_mlt'];
                $sql_time = "SELECT total_time_vtst FROM virtua_time_store_tbl WHERE machine_no_vtst='" . $machine_no_vtst . "'  AND   date_vtst='" . $date_vtst . "' ";
                $result_time = $this->mysqli->query($sql_time);
                $num_result_time = $result_time->num_rows;
                if ($num_result_time > 0) {                   
                       while ($rowst = $result_time->fetch_assoc()) {
                       return $work_time_mlt-$rowst['total_time_vtst'];                            
                        }
                        } else 
                        {
                        return $work_time_mlt;                    
                        }
            }
        } else {
            return false;
        }
    }
    
    
       public function getMachineTimeCheck($machine_no_vtst, $date_vtst, $is) {
        $la = array();
        $query = "SELECT*FROM decal_ins_counting_tbl WHERE machine_no_mlt='" . $machine_no_vtst . "'  AND   date_mlt='" . $date_vtst . "' ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $work_time_mlt = $rows['work_time_mlt'];
                
                return $work_time_mlt; 
//                $sql_time = "SELECT total_time_vtst FROM virtua_time_store_tbl WHERE machine_no_vtst='" . $machine_no_vtst . "'  AND   date_vtst='" . $date_vtst . "' ";
//                $result_time = $this->mysqli->query($sql_time);
//                $num_result_time = $result_time->num_rows;
//                if ($num_result_time > 0) {                   
//                       while ($rowst = $result_time->fetch_assoc()) {
//                       return $work_time_mlt-$rowst['total_time_vtst'];                            
//                        }
//                        } else 
//                        {
//                        return $work_time_mlt;                    
//                        }
            }
        } else {
            return false;
        }
    }
    
    

    public function getWipMachineCalendar($pattern_no_pt) {
        $query = "SELECT production_no_pt FROM product_status_tbl WHERE pro01_pt='1' AND  pattern_no_pt='" . $pattern_no_pt . "'   ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        return $num_result;
    }

    public function getDailyOutPutQtyMachineCalendar($date, $mname) {
        $query = "SELECT org_date_fot,COUNT(*) AS t FROM decal_ins_counting_tbl WHERE org_date_fot='" . $date . "' AND judgment_fot='OK'  AND  pattern_no_fot='" . $mname . "'  ";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            $rows = $result->fetch_assoc();
            return $rows['t'];
        }
    }

    public function createNewMachineCalendar(
    $id, $date_mlt, $ins_no_1, $ins_no_2, $ins_no_3, $ins_no_4, $ins_no_5, $ins_no_6, $is_edit_mlt, $item01_mlt, $item02_mlt, $item03_mlt, $item04_mlt, $item05_mlt, $org_name_mlt, $org_date_mlt, $org_time_mlt
    ) {



        $res = "INSERT INTO decal_ins_counting_tbl  SET
       id='" . $id . "',
        date_mlt='" . $date_mlt . "',
        ins_no_1='" . $ins_no_1 . "',
		ins_no_2='" . $ins_no_2 . "',
		ins_no_3='" . $ins_no_3 . "',
		ins_no_4='" . $ins_no_4 . "',
		ins_no_5='" . $ins_no_5 . "',
		ins_no_6='" . $ins_no_6 . "',
        is_edit_mlt='" . $is_edit_mlt . "',
        item01_mlt='" . $item01_mlt . "',
        item02_mlt='" . $item02_mlt . "',
        item03_mlt='" . $item03_mlt . "',
        item04_mlt='" . $item04_mlt . "',
        item05_mlt='" . $item05_mlt . "',
        org_name_mlt='" . $org_name_mlt . "',
        org_date_mlt='" . $org_date_mlt . "',
        org_time_mlt='" . $org_time_mlt . "'


            		       ";



        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateMachineCalendar(
    $id, $date_mlt, $machine_no_mlt, $number_shift_mlt, $work_time_mlt, $is_edit_mlt, $item01_mlt, $item02_mlt, $item03_mlt, $item04_mlt, $item05_mlt, $org_name_mlt, $org_date_mlt, $org_time_mlt
    ) {

        $res = "UPDATE decal_ins_counting_tbl SET   	    
            date_mlt='" . $date_mlt . "',
            machine_no_mlt='" . $machine_no_mlt . "',
            number_shift_mlt='" . $number_shift_mlt . "',
            work_time_mlt='" . $work_time_mlt . "',
            is_edit_mlt='" . $is_edit_mlt . "',
            item01_mlt='" . $item01_mlt . "',
            item02_mlt='" . $item02_mlt . "',
            item03_mlt='" . $item03_mlt . "',
            item04_mlt='" . $item04_mlt . "',
            item05_mlt='" . $item05_mlt . "',
            org_name_mlt='" . $org_name_mlt . "',
            org_date_mlt='" . $org_date_mlt . "',
            org_time_mlt='" . $org_time_mlt . "'
	     WHERE id='" . $id . "' ";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteMachineCalendar($id) {
        $query = "DELETE FROM decal_ins_counting_tbl WHERE id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:machine_calendar_view.php');
        }
    }

}

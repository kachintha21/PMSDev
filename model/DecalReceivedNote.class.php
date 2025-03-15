<?php

class DecalReceivedNote {

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




    public function confirmDecalReceivedNoteEntity($ref_no_ptt) {
        $res = "SELECT*FROM decal_received_note_tbl WHERE ref_no_drn = '" . $ref_no_ptt . "'   ";
        $result = $this->mysqli->query($res);
        $num_result = $result->num_rows;
        if ($num_result > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createNewDecalReceivedNote(
    $id, $ref_no_drn, $item01_drt, $item02_drt, $item03_drt, $item04_drt, $item05_drt, $item06_drt, $item07_drt, $item08_drt, $item09_drt, $item10_drt, $remakes_drt, $is_edit_drt, $org_name_drt, $org_date_drt, $org_time_drt
    ) {

        $res = "INSERT INTO decal_received_note_tbl  SET
	    ref_no_drn='" . $ref_no_drn . "',
                item01_drt='" . $item01_drt . "',
                item02_drt='" . $item02_drt . "',
                item03_drt='" . $item03_drt . "',
                item04_drt='" . $item04_drt . "',
                item05_drt='" . $item05_drt . "',
                item06_drt='" . $item06_drt . "',
                item07_drt='" . $item07_drt . "',
                item08_drt='" . $item08_drt . "',
                item09_drt='" . $item09_drt . "',
                item10_drt='" . $item10_drt . "',
                remakes_drt='" . $remakes_drt . "',
                is_edit_drt='" . $is_edit_drt . "',
                org_name_drt='" . $org_name_drt . "',
                org_date_drt='" . $org_date_drt . "',
                org_time_drt='" . $org_time_drt . "'
";

        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDecalReceivedNote(
    $id, $ref_no_drn, $item01_drt, $item02_drt, $item03_drt, $item04_drt, $item05_drt, $item06_drt, $item07_drt, $item08_drt, $item09_drt, $item10_drt, $remakes_drt, $is_edit_drt, $org_name_drt, $org_date_drt, $org_time_drt
    ) {
        $res = "UPDATE decal_received_note_tbl SET
                ref_no_drn='" . $ref_no_drn . "',
                item01_drt='" . $item01_drt . "',
                item02_drt='" . $item02_drt . "',
                item03_drt='" . $item03_drt . "',
                item04_drt='" . $item04_drt . "',
                item05_drt='" . $item05_drt . "',
                item06_drt='" . $item06_drt . "',
                item07_drt='" . $item07_drt . "',
                item08_drt='" . $item08_drt . "',
                item09_drt='" . $item09_drt . "',
                item10_drt='" . $item10_drt . "',
                remakes_drt='" . $remakes_drt . "',
                is_edit_drt='" . $is_edit_drt . "',
                org_name_drt='" . $org_name_drt . "',
                org_date_drt='" . $org_date_drt . "',
                org_time_drt='" . $org_time_drt . "'

        WHERE id='" . $id . "' ";
        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function updateDecalReceivedNoteById(
    $ref_no_ptt, $pattern_no_pt, $index
    ) {

        switch ($index) {
        case '1':
         $res = "UPDATE dinspection_tbl SET
        judgment_dt='1'        
        WHERE item02_dt='" . $ref_no_ptt . "'  ";
         break;
     
        case '2':
         $res = "UPDATE dinspection_tbl SET
        judgment_dt='0'        
        WHERE item02_dt='" . $ref_no_ptt . "'  ";
         break;
            
            

        }


        $result = $this->mysqli->query($res);

        if ($result) {
            return true;
        }
    }

    public function deleteDecalReceivedNote($id) {
        $query = "DELETE FROM decal_received_note_tbl WHERE ref_no_drn='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            header('location:decal_received_note_view.php');
        }
    }

    public function deleteDecalReceivedNotebyByRef($id) {
        $query = "DELETE FROM decal_received_note_tbl WHERE ref_no_ptt='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            return true;
        }
    }

    public function getNextDecalReceivedNoteRefNo($table, $suffix) {
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
	
	 public function getDrndata($drn_no) {
		 
		$la = array();
        $query = "SELECT * FROM dinspection_tbl where item02_dt='" . $drn_no . "'  ";
        //$res = $this->mysqli->query($sql);
		
		// $row = mysqli_fetch_array($res);
            //$pattern = $row['pattern_no_dt'];
			//$curve = $row['curve_no_dt'];
			//$lot = $row['lot_no_dt'];
			//$qty = $row['item01_dt'];
			
			//$result = $this->mysqli->query($query);
			//while ($rows = $result->fetch_assoc()) {
				
                //array_push($la, $rows['pattern_no_dt'], $rows['curve_no_dt'], $rows['lot_no_dt'], $rows['item01_dt']);
            //}
           // return $la;
			
			
			
			//$query = "SELECT * FROM pigment_master_tbl";
        $result = $this->mysqli->query($query);
        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
            }
            return $this->data;
        }
            
        
    }






}

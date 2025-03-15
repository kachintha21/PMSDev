<?php

class DecalReceivedNoteRemote {

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
	
	
	 public function updateDecalStock($ref_no_ptt, $res_data, $index) {
		
		$today_date=date("Y-m-d");
		$today_date_time=date("Y-m-d H:i:s");
		//print("SELECT * FROM decal_stock.decal_in_out  where decal_transfer_no  ='" . $ref_no_ptt . "'  ");exit;
		
		$sql_stk_add = "SELECT * FROM decal_stock.decal_in_out  where decal_transfer_no  ='" . $ref_no_ptt . "'  ";
        $res_stk_add = $this->mysqli->query($sql_stk_add);
        if (mysqli_num_rows($res_stk_add) > 0) {
		
		}
		
		else{
			
			 foreach ($res_data as $data)  {
            $pattern=$data['decal_pattern_dt'];
			$curve=$data['curve_no_dt'];
			$lot=$data['lot_no_dt'];
			$qty=$data['item01_dt'];
			$remarks_dt=$data['remarks_dt'];
			
			if($remarks_dt == 'isBS'){
				$is_bs = 1;
				
			}
			else{
				$is_bs = 0;
				
				
			}
			
			
			
			
		$res = "INSERT INTO decal_stock.decal_in_out  SET
	    decalPatt='" . $pattern . "', curve ='" . $curve . "' , lot ='" . $lot . "' , dec_in ='" . $qty . "', is_bs ='" . $is_bs . "'
		, eDate ='" . $today_date . "', eTime ='" . $today_date_time . "', status ='2', decal_transfer_no ='" . $ref_no_ptt . "'";
		
		
		 $result = $this->mysqli->query($res);
		
			
		$sql_stk = "SELECT * FROM decal_stock.decal_master  where decalPatt  ='" . $pattern . "' and curve  ='" . $curve . "' and lot  ='" . $lot . "' ";
        $res_stk = $this->mysqli->query($sql_stk);
        if (mysqli_num_rows($res_stk) > 0) {
			
			
			$res_up = "UPDATE decal_stock.decal_master SET
        closing_stock = closing_stock+'" . $qty . "'  , is_bs='".$is_bs."'     
        where decalPatt  ='" . $pattern . "' and curve  ='" . $curve . "' and lot  ='" . $lot . "'   ";
		
		$this->mysqli->query($res_up);
		
		}
		else{
			
			$res_new = "INSERT INTO decal_stock.decal_master  SET
	    decalPatt='" . $pattern . "', curve ='" . $curve . "' , lot ='" . $lot . "' , opening_stock ='" . $qty . "', is_bs ='" . $is_bs . "'
		, closing_stock ='" . $qty . "'";
		
		
		$this->mysqli->query($res_new);
			
		}
			
			
       
        }
			
			
			
			
		}
		
		
       
		
		

        if ($result) {
            return true;
        }
    }




    



}

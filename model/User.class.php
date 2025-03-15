<?php
class User{
	 public $mysqli;
	 public $data;
	 public function __construct($host,$username,$password,$db_name){
		
		$this->mysqli = new mysqli($host, $username, $password, $db_name);
		
		if(mysqli_connect_errno()) {
 
			echo "Error: Could not connect to database.";
 
		exit;
 
		}
				
	}
	
	public function __destruct(){
		$this->mysqli->close();	
	}
	
	public function getAllUser(){
		
		$query="SELECT * FROM user_tbl";
		
		$result= $this->mysqli->query($query);
		
		$num_result=$result->num_rows;
		
				
		if($num_result>0){
			while($rows=$result->fetch_assoc()){
				$this->data[]=$rows;
			}
						
			return $this->data;
		}
		
		
	}

	public function getUserByNo($tickets_ref_no_tt){
		$query="SELECT * FROM user_tbl WHERE tickets_ref_no_tt='".$tickets_ref_no_tt."'";
	        $result= $this->mysqli->query($query);		
		$num_result=$result->num_rows;	
		if($num_result>0){
		 while($rows=$result->fetch_assoc()){								
                    $this->data[]=$rows;
                    }
		     return $this->data;
                    }
		
		
	}

        public function confirmUserEntity($tickets_ref_no_tt){
                             $res = "SELECT*FROM user_tbl WHERE tickets_ref_no_tt = '".$tickets_ref_no_tt."'   ";
                         $result= $this->mysqli->query($res);
                           $num_result=$result->num_rows;
                             if($num_result > 0){
                                     return 1;
                             }
                          else{
                                     return 0;


                          }
                            }



                    public function createNewUser(		
                    $id,
                    $emp_no,
                    $user_name,
                    $password,
                    $fname,
                    $lname,
                    $section,
                    $is_admin,
                    $is_data,
                    $is_edit,
                    $is_report,
                    $log_ip,
                    $log_date,
                    $log_time,
                    $item01,
                    $item02,
                    $item03,
                    $item04,
                    $item05,
                    $item06,
                    $org_date,
                    $org_time
	

	
                   ){
		
          

                    $res="INSERT INTO user_tbl  SET
		        emp_no='".$emp_no."',
                        user_name='".$user_name."',
                        password=PASSWORD('".$password."'),
                        fname='".$fname."',
                        lname='".$lname."',
                        section='".$section."',
                        is_admin='".$is_admin."',
                        is_data='".$is_data."',
                        is_edit='".$is_edit."',
                        is_report='".$is_report."',
                        log_ip='".$log_ip."',
                        log_date='".$log_date."',
                        log_time='".$log_time."',
                        item01='".$item01."',
                        item02='".$item02."',
                        item03='".$item03."',
                        item04='".$item04."',
                        item05='".$item05."',
                        item06='".$item06."',
                        org_date='".$org_date."',
                        org_time='".$org_time."'


		       ";
                                      		
		$result= $this->mysqli->query($res);
                    
               
                
                
		
		if($result){
			return true;	
		}
		
		
		
	}
	
            public function updateUser(
            $id ,
            $emp_no,
            $user_name,
            $password,
            $fname,
            $lname,
            $section,
            $is_admin,
            $is_data,
            $is_edit,
            $is_report,
            $log_ip,
            $log_date,
            $log_time,
            $item01,
            $item02,
            $item03,
            $item04,
            $item05,
            $item06,
            $org_date,
            $org_time
	


         ){
		
			$res=mysql_query("UPDATE user_tbl SET
			emp_no='".$emp_no."',
                        user_name='".$user_name."',
                        password='".$password."',
                        fname='".$fname."',
                        lname='".$lname."',
                        section='".$section."',
                        is_admin='".$is_admin."',
                        is_data='".$is_data."',
                        is_edit='".$is_edit."',
                        is_report='".$is_report."',
                        log_ip='".$log_ip."',
                        log_date='".$log_date."',
                        log_time='".$log_time."',
                        item01='".$item01."',
                        item02='".$item02."',
                        item03='".$item03."',
                        item04='".$item04."',
                        item05='".$item05."',
                        item06='".$item06."',
                        org_date='".$org_date."',
                        org_time='".$org_time."',


		        WHERE id='".$id."' ");
		
		$result= $this->mysqli->query($query);
		
		if($result){
			return true;	
		}
		
		
	}
	
	public function deleteUser($id){
		$query="DELETE FROM user_tbl WHERE id='$id'";
		$result= $this->mysqli->query($query);
		if($result){
			header('location:invoice_view.php');	
		}
	}
        



	public function getAera($id){
		$query="DELETE FROM data_tbl WHERE curve_no_dt='$id'";
		$result= $this->mysqli->query($query);
		if($result){
                    $row = $result->fetch_assoc();
			return $row["curve_area_dt"];
		}
                else{
                    return 1;
                    
                }
	}
        





        public function getNextUserRefNo($table, $suffix){
                        $sql = "SELECT id FROM " . $table . " ORDER BY id DESC";
                        $res= $this->mysqli->query($sql);
                        if(mysqli_num_rows($res) > 0){

                                $row=mysqli_fetch_array($res);
                            $previous = $row['id'];

                                //$previous = substr($previous, 5, strlen($previous));

                                if(strlen("".$previous+1) == 1){
                                        $previous = "000" . ($previous+1);
                                }
                                else if(strlen("".$previous+1) == 2){
                                        $previous = "0" . ($previous+1);
                                }			
                        }
                        else{
                                $previous = "0001";
                        }
                        return $suffix . $previous;


                }	
                
                
                
                
                
                


    public function getUserName(){
                    $query="SELECT * FROM user_tbl WHERE section='IT' ";
                    $result= $this->mysqli->query($query);		
                    $num_result=$result->num_rows;	
                         echo("<option value=''>-Select-</option>");
                    if($num_result>0){
                     while($rows=$result->fetch_assoc()){								

                     echo("<option value='".$rows['user_name']."' >".$rows['user_name']."</option>");


                        }
                    }

                        }






}


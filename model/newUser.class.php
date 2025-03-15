<?php
	class User{
		var $id;
                var $emp_no;
                var $user_name;
                var $password;
                var $fname;
                var $lname;
                var $section;
                var $is_admin;
                var $is_data;
                var $is_edit;
                var $is_report;
                var $org_date;
                var $org_time;
                var $loge_date;
                var $loge_time;
                var $log_ip;
                var $add_item01;
                var $add_item02;
                var $add_item03;
                var $add_item04;
                var $add_item05;


		
		function User(
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
                $org_date,	
                $org_time,	
                $loge_date,	
                $loge_time,	
                $log_ip,	
                $add_item01,	
                $add_item02,	
                $add_item03,	
                $add_item04,	
                $add_item05	


             ){
                $this->id=$id;	
                $this->emp_no=$emp_no;	
                $this->user_name=$user_name;	
                $this->password=$password;	
                $this->fname=$fname;	
                $this->lname=$lname;	
                $this->section=$section;	
                $this->is_admin=$is_admin;	
                $this->is_data=$is_data;	
                $this->is_edit=$is_edit;	
                $this->is_report=$is_report;	
                $this->org_date=$org_date;	
                $this->org_time=$org_time;	
                $this->loge_date=$loge_date;	
                $this->loge_time=$loge_time;	
                $this->log_ip=$log_ip;	
                $this->add_item01=$add_item01;	
                $this->add_item02=$add_item02;	
                $this->add_item03=$add_item03;	
                $this->add_item04=$add_item04;	
                $this->add_item05=$add_item05;	

		}

	    static function confirmUserEntity($emp_no){
			$res = mysql_query("SELECT COUNT(*) AS c FROM user_tbl WHERE emp_no = '".$emp_no."'");
		
			if(mysql_result($res, 0, "c") > 0){
				return 1;
			}
		    else{
				return 0;

  
           }
		}


         static function userDeleteById($id){
                            $res = mysql_query("SELECT emp_no FROM user_tbl WHERE id= '".$id."'");  
                            $emp_no=mysql_result($res,0,'emp_no');
                            $res=mysql_query("DELETE FROM user_tbl WHERE id='".$id."'");
                            $res=mysql_query("DELETE FROM dynamic_parameter_tbl WHERE emp_no_dpt = '". $emp_no."'");
                             if($res==true){
                                    header("location:user_view.php");
				            }
			
                                        }
		







		
		function createNewUser($user){
			$res = mysql_query("SELECT COUNT(*) AS c FROM user_tbl WHERE emp_no = '".$user->user_emp."'   AND  user_name = '".$user->user_name."' ");
		
			if(mysql_result($res, 0, "c") > 0){
				return 0;
			}
             else 
            {
		   $res="INSERT INTO user_tbl(
			id,
                        emp_no,
                        user_name,
                        password,
                        fname,
                        lname,
                        section,
                        is_admin,
                        is_data,
                        is_edit,
                        is_report,
                        org_date,
                        org_time,
                        loge_date,
                        loge_time,
                        log_ip,
                        add_item01,
                        add_item02,
                        add_item03,
                        add_item04,
                        add_item05

				 
				 )
				 VALUES (
		'".$user->id."',
		'".$user->emp_no."',
		'".$user->user_name."',
		PASSWORD('".$user->password."'),  
		'".$user->fname."',
                '".$user->lname."',
                '".$user->section."',
                '".$user->is_admin."',
                '".$user->is_data."',
                '".$user->is_edit."',
                '".$user->is_report."',
                '".$user->org_date."',
                '".$user->org_time."',
                '".$user->loge_date."',
                '".$user->loge_time."',
                '".$user->log_ip."',
                '".$user->add_item01."',
                '".$user->add_item02."',
                '".$user->add_item03."',
                '".$user->add_item04."',
                '".$user->add_item05."'
	         )  
			";



				return mysql_query($res);
		   }



         
             
		}
		


		function updateUser($user){
		
			$res=mysql_query("UPDATE user_tbl SET
			emp_no='".$user->emp_no."',
                        user_name='".$user->user_name."',
                        fname='".$user->fname."',
                        lname='".$user->lname."',
                        section='".$user->section."',
                        is_admin='".$user->is_admin."',
                        is_data='".$user->is_data."',
                        is_edit='".$user->is_edit."',
                        is_report='".$user->is_report."',
                        org_date='".$user->org_date."',
                        org_time='".$user->org_time."',
                        loge_date='".$user->loge_date."',
                        loge_time='".$user->loge_time."',
                        log_ip='".$user->log_ip."',
                        add_item01='".$user->add_item01."',
                        add_item02='".$user->add_item02."',
                        add_item03='".$user->add_item03."',
                        add_item04='".$user->add_item04."',
                        add_item05='".$user->add_item05."'
			WHERE id='".$user->id."' ");

			
			return $res;
		}
		
		static function getUserByID($id){
			$res = mysql_query("SELECT * FROM user_tbl u WHERE u.id = '" . $id ."';");
		
			$user = new User(
			mysql_result($res,0,'id'),
                        mysql_result($res,0,'emp_no'),
                        mysql_result($res,0,'user_name'),
                        mysql_result($res,0,'password'),
                        mysql_result($res,0,'fname'),
                        mysql_result($res,0,'lname'),
                        mysql_result($res,0,'section'),
                        mysql_result($res,0,'is_admin'),
                        mysql_result($res,0,'is_data'),
                        mysql_result($res,0,'is_edit'),
                        mysql_result($res,0,'is_report'),
                        mysql_result($res,0,'org_date'),
                        mysql_result($res,0,'org_time'),
                        mysql_result($res,0,'loge_date'),
                        mysql_result($res,0,'loge_time'),
                        mysql_result($res,0,'log_ip'),
                        mysql_result($res,0,'add_item01'),
                        mysql_result($res,0,'add_item02'),
                        mysql_result($res,0,'add_item03'),
                        mysql_result($res,0,'add_item04'),
                        mysql_result($res,0,'add_item05')

			);
			
			return $user;	
		}
		





		static function changePsw($id,$old, $new){
			$sql = "SELECT COUNT(*) AS c FROM user_tbl u WHERE u.id = '" . $id ."' AND password = PASSWORD('$old');";
			$res = mysql_query($sql);
			if(mysql_result($res, 0, "c") != 1){
				return 0;
			}
			else{
				$sql = "UPDATE user_tbl SET " .
					"password = PASSWORD('".$new."')".
				" WHERE id = '".$id."';";
			
				return mysql_query($sql);
			}		
		}
		
		static function deleteUserByID($id){
			mysql_query("DELETE FROM user_tbl WHERE id = '".$id."';");		
			header("location:users.php");
			exit();						
		}
		

	}
	
	
?>
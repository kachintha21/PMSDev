<link rel="shortcut icon" type="image/png" href="images/reports.png"/>
<title>New Decal Cutting & Ins Plan</title>
<?php 
require_once('calendar/calendar/classes/tc_calendar.php');
	date_default_timezone_set('Asia/Colombo');
	session_start();
	include("database_connections.php");
	
	
	

	error_reporting(0);
	$plan_date=$_GET['p_date'];
	$type=$_GET['type'];
	if($plan_date != ''){
		$today= $plan_date;
	} 
	else{
		$today = date("Y-m-d");
		
	}
	
	$today_n=date("Y-m-d");
	$plan_date_f=isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";
	
	$sql_finalize_count =mysqli_query($con,"SELECT * FROM tbl_cut_ins_planner_wise_data where p_date = '$plan_date_f' and finalize ='1' and s_type !='UnPlanned' ");
			if(mysqli_num_rows($sql_finalize_count)>0){
				$day_finalize_count=1;
			}
			else{
				$day_finalize_count=0;
			}
	
	
	
	//print($day_finalize_count);exit;
	
	
	
	if(isset($_POST['btn_fina']))
	{
		if($day_finalize_count ==1){
			echo '<script>alert("You have finalize Plan to Selected Date")</script>'; 
			
		}
		else{
			$sqlup_temp=mysqli_query($con,"update tbl_cut_ins_planner_wise_data a set a.finalize='1' where p_date='$plan_date'");
			$status=mysqli_query($con,"update tbl_cut_ins_plan_finalize a set  a.plan_status = '2' where a.plan_status='1' and a.p_date='$plan_date'")or die("insert_err4");
								
		
			header("Location:Cut_ins_plan_new.php?p_date=$plan_date");
			
		}
		
		
	}
	
	if(isset($_POST['btn_delete']))
	{
		if($day_finalize_count ==1){
			echo '<script>alert("Please Contact IT Department")</script>'; 
			
		}
		else{
			
			
		}
		
		
	}
	
	
	
	
	
	
	if(isset($_POST['btn_fin']))
	{	
		if($day_finalize_count ==1){
			echo '<script>alert("You have finalize Plan to Selected Date")</script>'; 
			
		}
		else{
			
			$count_1=isset($_REQUEST["count_1new"]) ? $_REQUEST["count_1new"] : "";
		
		for ($x = 1; $x <= $count_1; $x++) {
			$tempid_1=isset($_REQUEST["tempid_1_".$x]) ? $_REQUEST["tempid_1_".$x] : "";
			$p_qty=isset($_REQUEST["qty".$x]) ? $_REQUEST["qty".$x] : "";
			//$sqlup_temp=mysqli_query($con,"update tbl_cut_ins_plan_temp a set a.qty_plan='$p_qty' where id='$tempid_1'");
			
		}
		
		
		mysqli_query($con,"Delete from tbl_cut_ins_plan_finalize where p_date ='$plan_date'");
		mysqli_query($con,"INSERT INTO tbl_cut_ins_plan_finalize SELECT * from tbl_cut_ins_plan_temp where p_date ='$plan_date' AND qty_plan>0");







	
		$sql_finalize_data=mysqli_query($con,"SELECT * from decal_ins_calendar_tbl a where a.date_mlt='$plan_date' ");
		if(mysqli_num_rows($sql_finalize_data)>0){
			$S_count=0;
			$G_count=0;
			$ins_array = array();
			while($row_order=mysqli_fetch_array($sql_finalize_data)){
				if($row_order['ins_no_1'] == 'General'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift' ){$S_count++;}
				if($row_order['ins_no_1'] == 'General_Sat'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift_Sat' ){$S_count++;}
				if($row_order['ins_no_1'] != 'No' ){array_push($ins_array, 1);}
				
				if($row_order['ins_no_2'] == 'General'){$G_count++;}
				if($row_order['ins_no_2'] == 'Shift' ){$S_count++;}
				if($row_order['ins_no_1'] == 'General_Sat'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift_Sat' ){$S_count++;}
				if($row_order['ins_no_2'] != 'No' ){array_push($ins_array, 2);}
				
				if($row_order['ins_no_3'] == 'General'){$G_count++;}
				if($row_order['ins_no_3'] == 'Shift' ){$S_count++;}
				if($row_order['ins_no_1'] == 'General_Sat'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift_Sat' ){$S_count++;}
				if($row_order['ins_no_3'] != 'No' ){array_push($ins_array, 3);}
				
				if($row_order['ins_no_4'] == 'General'){$G_count++;}
				if($row_order['ins_no_4'] == 'Shift' ){$S_count++;}
				if($row_order['ins_no_1'] == 'General_Sat'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift_Sat' ){$S_count++;}
				if($row_order['ins_no_4'] != 'No' ){array_push($ins_array, 4);}
				
				if($row_order['ins_no_5'] == 'General'){$G_count++;}
				if($row_order['ins_no_5'] == 'Shift' ){$S_count++;}
				if($row_order['ins_no_1'] == 'General_Sat'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift_Sat' ){$S_count++;}
				if($row_order['ins_no_5'] != 'No' ){array_push($ins_array, 5);}
				
				if($row_order['ins_no_6'] == 'General'){$G_count++;}
				if($row_order['ins_no_6'] == 'Shift' ){$S_count++;}
				if($row_order['ins_no_1'] == 'General_Sat'){$G_count++; }
				if($row_order['ins_no_1'] == 'Shift_Sat' ){$S_count++;}
				if($row_order['ins_no_6'] != 'No' ){array_push($ins_array, 6);}
				
			}
			//echo "<pre>";
   // print_r($ins_array);
   // echo "</pre>";
			
			$total_count = $G_count+$S_count;
			$total_work_time = $total_count * 500;
			
			
			$sql_cy_time=mysqli_query($con,"SELECT SUM(a.arrange+a.ins+a.seal+a.datain) AS cy_time_100 FROM decal_ins_cycletime_tbl a  ");
			if(mysqli_num_rows($sql_cy_time)>0){
				while($row_cy=mysqli_fetch_array($sql_cy_time)){
					$cycle_time_100 = $row_cy['cy_time_100'];
				}
			}
			
			
			$sql_plan_temp=mysqli_query($con,"SELECT * FROM decal_ins_calendar_tbl a WHERE a.date_mlt='$plan_date'");
			if(mysqli_num_rows($sql_plan_temp)>0){
				while($row_p_temp=mysqli_fetch_array($sql_plan_temp)){
					mysqli_query($con,"Delete from tbl_cut_ins_planner_time where p_date ='$plan_date'");
					
					// Convert the date to a timestamp
					$timestamp = strtotime($plan_date);

					// Get the day of the week (0 for Sunday, 6 for Saturday)
					$dayOfWeek = date('w', $timestamp);
					
					if($dayOfWeek == 6){
						$plan_time_D=240*60;
						$plan_time=300*60;
					}
					else{
						$plan_time_D=380*60;
						$plan_time=440*60;
					}
					
					
					$ins1 = $row_p_temp['ins_no_1'];
					if($ins1 == 'Shift' || $ins1 == 'General' || $ins1 == 'Shift_Sat' || $ins1 == 'General_Sat'){
						$sql_check_counting=mysqli_query($con,"SELECT * FROM decal_ins_counting_tbl a WHERE a.date_mlt='$plan_date' and ins_no_1 = 'Yes'");
						if(mysqli_num_rows($sql_check_counting)>0){
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins1','$ins1','$plan_time_D','0') ")or die("insert_err1");		
						}
						else{
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins1','$ins1','$plan_time','0') ")or die("insert_err1");		
						}
						
					}
					
					$ins2 = $row_p_temp['ins_no_2'];
					if($ins2 == 'Shift' || $ins2 == 'General' || $ins2 == 'Shift_Sat' || $ins2 == 'General_Sat'){
						$sql_check_counting=mysqli_query($con,"SELECT * FROM decal_ins_counting_tbl a WHERE a.date_mlt='$plan_date' and ins_no_2 = 'Yes'");
						if(mysqli_num_rows($sql_check_counting)>0){
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins2','$ins2','$plan_time_D','0') ")or die("insert_err1");		
						}
						else{
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins2','$ins2','$plan_time','0') ")or die("insert_err1");		
						}
						
					}
					
					$ins3 = $row_p_temp['ins_no_3'];
					if($ins3 == 'Shift' || $ins3 == 'General' || $ins3 == 'Shift_Sat' || $ins3 == 'General_Sat'){
						$sql_check_counting=mysqli_query($con,"SELECT * FROM decal_ins_counting_tbl a WHERE a.date_mlt='$plan_date' and ins_no_3 = 'Yes'");
						if(mysqli_num_rows($sql_check_counting)>0){
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins3','$ins3','$plan_time_D','0') ")or die("insert_err1");		
						}
						else{
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins3','$ins3','$plan_time','0') ")or die("insert_err1");		
						}
					}
					
					$ins4 = $row_p_temp['ins_no_4'];
					if($ins4 == 'Shift' || $ins4 == 'General' || $ins4 == 'Shift_Sat' || $ins4 == 'General_Sat'){
						$sql_check_counting=mysqli_query($con,"SELECT * FROM decal_ins_counting_tbl a WHERE a.date_mlt='$plan_date' and ins_no_4 = 'Yes'");
						if(mysqli_num_rows($sql_check_counting)>0){
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins4','$ins4','$plan_time_D','0') ")or die("insert_err1");		
						}
						else{
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins4','$ins4','$plan_time','0') ")or die("insert_err1");		
						}
					}
					
					$ins5 = $row_p_temp['ins_no_5'];
					if($ins5 == 'Shift' || $ins5 == 'General' || $in5 == 'Shift_Sat' || $ins5 == 'General_Sat'){
						$sql_check_counting=mysqli_query($con,"SELECT * FROM decal_ins_counting_tbl a WHERE a.date_mlt='$plan_date' and ins_no_5 = 'Yes'");
						if(mysqli_num_rows($sql_check_counting)>0){
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins5','$ins5','$plan_time_D','0') ")or die("insert_err1");		
						}
						else{
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins5','$ins5','$plan_time','0') ")or die("insert_err1");		
						}
					}
					
					$ins6 = $row_p_temp['ins_no_6'];
					if($ins6 == 'Shift' || $ins6 == 'General' || $ins6 == 'Shift_Sat' || $ins6 == 'General_Sat'){
						$sql_check_counting=mysqli_query($con,"SELECT * FROM decal_ins_counting_tbl a WHERE a.date_mlt='$plan_date' and ins_no_6 = 'Yes'");
						if(mysqli_num_rows($sql_check_counting)>0){
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins6','$ins6','$plan_time_D','0') ")or die("insert_err1");		
						}
						else{
							$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_time  values ('-','$plan_date','ins6','$ins6','$plan_time','0') ")or die("insert_err1");		
						}
					}
					
				}
			}
			
			
			
			$sql_finalize_data=mysqli_query($con,"SELECT * FROM tbl_cut_ins_plan_finalize where p_date = '$plan_date' order by priority desc,pro_no");
			if(mysqli_num_rows($sql_finalize_data)>0){
				mysqli_query($con,"Delete from tbl_cut_ins_planner_wise_data where p_date ='$plan_date' and finalize ='0'");
				while($row_f_data=mysqli_fetch_array($sql_finalize_data)){
					
					$qty_plan = $row_f_data['qty_plan'];
					$design = $row_f_data['design'];
					$priority = $row_f_data['priority'];
					$pro_no = $row_f_data['pro_no'];
					$lot = $row_f_data['lot'];
					
					//print("SELECT * FROM tbl_cut_ins_planner_time a WHERE a.p_date='$plan_date' ORDER BY cast(a.work_time as unsigned)");exit;
					$sql_final_plan=mysqli_query($con,"SELECT * FROM tbl_cut_ins_planner_time a WHERE a.p_date='$plan_date' ORDER BY cast(a.work_time as unsigned)" );
					$day_ins_count = mysqli_num_rows($sql_final_plan);
					
					
					if($priority == '1' && $qty_plan >'1000'){
						$one_ins_plan_qty = ceil($qty_plan/$day_ins_count);
						$priority_devide=1;
						//print("123");exit;
					}
					else{
						
						if($qty_plan>'1000'){
							$one_ins_plan_qty = ceil($qty_plan/$day_ins_count);
							$priority_devide=1;
						}
						else{
							$one_ins_plan_qty = $qty_plan;
							$priority_devide=0;
						}
						
					}
					$plan_cy_time =  $one_ins_plan_qty*60*$cycle_time_100/100 ;
					
					
					
					if(mysqli_num_rows($sql_final_plan)>0)
					{
						while($row_final_data=mysqli_fetch_array($sql_final_plan)){
							$planner = $row_final_data['planner'];
							$p_type = $row_final_data['p_type'];							
							$total_time = $row_final_data['total_time'];
							$work_time = $row_final_data['work_time'];
							$remaning_time = $total_time-$work_time;
							
							
							
							if($remaning_time>$plan_cy_time){
								$sql=mysqli_query($con,"INSERT INTO tbl_cut_ins_planner_wise_data  values ('-','$plan_date','$planner','$p_type','$design','$one_ins_plan_qty','$priority','$pro_no','$lot','$plan_cy_time',0,0) ")or die("insert_err1");		
								
								//print("update tbl_cut_ins_planner_time a set  a.work_time +='$plan_cy_time' where a.planner='$planner' and a.p_date='$plan_date'");exit;
								$belt=mysqli_query($con,"update tbl_cut_ins_planner_time a set  a.work_time = a.work_time+'$plan_cy_time' where a.planner='$planner' and a.p_date='$plan_date'")or die("insert_err4");
								$status=mysqli_query($con,"update tbl_cut_ins_plan_finalize a set  a.plan_status = '1' where a.pro_no='$pro_no' and a.p_date='$plan_date'")or die("insert_err4");
								
								//print(123);exit;
								
								if($priority_devide!=1){
									break;
								}
								
							}
							
						}
					}
					
					
					
					
					
					
				}
			}
			
			
			
			
			
			
			
		}
	
		else{
			echo '<script>alert("Add date to Calender")</script>'; exit;
		}
		}
		
		
	}
	
	
	
	//
	if($type!=null)
	{
		
		
		if($type=='update2')		
		{	
			$updateid_2=$_GET['updateid_2'];
			$plan_date=$_GET['p_date'];
			$order=$_GET['order'];
	
	
			$belt=mysqli_query($con,"update tbl_virtual_plan_ww_of_set_order a set  a.plan_date='$plan_date' 
			,a.order='$order' 
			where a.id='$updateid_2'")or die("insert_err4");
		}
		
		
		
	}
	
	if(isset($_POST['btnprio_dec_1']))
	{
		
		if($day_finalize_count ==1){
			echo '<script>alert("You have finalize Plan to Selected Date")</script>'; 
			
		}
		else{
			$count_1=isset($_REQUEST["count_1new"]) ? $_REQUEST["count_1new"] : "";
		mysqli_query($con,"Delete from tbl_cut_ins_plan_finalize where p_date ='$plan_date'");
		mysqli_query($con,"Delete from tbl_cut_ins_planner_wise_data where p_date ='$plan_date' and finalize ='0'");
		//print($count_1);exit;
		
		for ($x = 1; $x <= $count_1; $x++) {
			$tempid_1=isset($_REQUEST["tempid_1_".$x]) ? $_REQUEST["tempid_1_".$x] : "";
			$qty=isset($_REQUEST["qty_p_".$x]) ? $_REQUEST["qty_p_".$x] : "";
			$is_prio=isset($_POST['prio_1_dec'.$x]);
			
			//print($isset($_POST['prio_1_dec'.$x]));exit;
			if(isset($_POST['prio_1_dec'.$x])) {
				
				
				
				$sqlreport=mysqli_query($con,"update tbl_cut_ins_plan_temp a set a.priority='1',qty_plan='$qty' where id='$tempid_1'");
				
			} 
			
			else{
				$sqlreport=mysqli_query($con,"update tbl_cut_ins_plan_temp a set a.priority='0',qty_plan='$qty' where id='$tempid_1'");
				//print(32131);exit;
			}
			
		}
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date");
		}
		
		
	}
	
	
	if(isset($_POST['btnprio_1']))
	{
		
		
		//mysqli_query($con,"delete from tbl_virtual_plan_decoration_belt_wise_data_snk where chit_final_status='1' ");
		$count_1=isset($_REQUEST["count_1"]) ? $_REQUEST["count_1"] : "";
		
//$count_1new=isset($_REQUEST["count_1new"]) ? $_REQUEST["count_1new"] : "";
		$plan_date_fix=$today;
		
		
		$count_1=10000;
		//print(123123);exit;
		
		for ($x = 1; $x <= $count_1; $x++) {
			$tempid_1=isset($_REQUEST["tempid_1_".$x]) ? $_REQUEST["tempid_1_".$x] : "";
			$pro_no=isset($_REQUEST["pro_no".$x]) ? $_REQUEST["pro_no".$x] : "";
			$order=isset($_REQUEST["order_".$x]) ? $_REQUEST["order_".$x] : "";
			$shift=isset($_REQUEST["shift_".$x]) ? $_REQUEST["shift_".$x] : "";
			$design=isset($_REQUEST["design".$x]) ? $_REQUEST["design".$x] : "";
			$lot=isset($_REQUEST["lot".$x]) ? $_REQUEST["lot".$x] : "";
			$qty=isset($_REQUEST["qty".$x]) ? $_REQUEST["qty".$x] : "";
			
			
			
			
			
			
			if(isset($_POST['prio_1'.$x])) {
				
				//print("insert into tbl_cut_ins_plan  (pro_no,p_date,order) values  ('$pro_no','$plan_date_fix','$order') ");exit;
				$belt=mysqli_query($con,"insert into tbl_cut_ins_plan  (pro_no,p_date,design,lot,qty,order_no,shift,date) values  ('$pro_no','$plan_date_fix','$design','$lot','$qty','$order','$shift','$today_n') ")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
			header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}
	
	
	if(isset($_POST['btnprio_2']))
	{
		//print(123123);exit;
		$count_2=isset($_REQUEST["count_2"]) ? $_REQUEST["count_2"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		
		
		for ($x = 1; $x <= $count_2; $x++) {
			$tempid_2=isset($_REQUEST["tempid_2_".$x]) ? $_REQUEST["tempid_2_".$x] : "";
			
			//print($count_2);exit;
			if(isset($_POST['prio_2'.$x])) {
				
				//print("delete from tbl_cut_ins_plan  where id='$tempid_2'");exit;
				$belt=mysqli_query($con,"delete from tbl_cut_ins_plan  where id='$tempid_2'")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}


if(isset($_POST['btnprio_222']))
	{
		//print(123123);exit;
		$count_2=isset($_REQUEST["count_222"]) ? $_REQUEST["count_222"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		
		
		for ($x = 1; $x <= $count_2; $x++) {
			$tempid_2=isset($_REQUEST["tempid_222_".$x]) ? $_REQUEST["tempid_222_".$x] : "";
			
			//print($count_2);exit;
			if(isset($_POST['prio_222'.$x])) {
				
				//print("delete from tbl_cut_ins_plan  where id='$tempid_2'");exit;
				$belt=mysqli_query($con,"delete from tbl_cut_ins_plan  where id='$tempid_2'")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnprio_22']))
	{
		//print(3333);exit;
		$count_2=isset($_REQUEST["count_22"]) ? $_REQUEST["count_22"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		
		
		for ($x = 1; $x <= $count_2; $x++) {
			$tempid_2=isset($_REQUEST["tempid_22_".$x]) ? $_REQUEST["tempid_22_".$x] : "";
			
			//print($count_2);exit;
			if(isset($_POST['prio_22'.$x])) {
				
				//print("delete from tbl_cut_ins_plan  where id='$tempid_2'");exit;
				$belt=mysqli_query($con,"delete from tbl_cut_ins_plan  where id='$tempid_2'")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnprio_2222']))
	{
		//print(123123);exit;
		$count_2=isset($_REQUEST["count_2222"]) ? $_REQUEST["count_2222"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		
		
		for ($x = 1; $x <= $count_2; $x++) {
			$tempid_2=isset($_REQUEST["tempid_2222_".$x]) ? $_REQUEST["tempid_2222_".$x] : "";
			
			//print($count_2);exit;
			if(isset($_POST['prio_2222'.$x])) {
				
				//print("delete from tbl_cut_ins_plan  where id='$tempid_2'");exit;
				$belt=mysqli_query($con,"delete from tbl_cut_ins_plan  where id='$tempid_2'")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}
	
	if(isset($_POST['btnprio_4']))
	{
		
		
		$plan_date=isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";
		
		
		if($day_finalize_count ==1){
			echo '<script>alert("You have finalize Plan to Selected Date")</script>'; 
			
		}
		
		else{
				
		if($_GET['p_date'] != null){
		$tp_date=$_GET['p_date'];
		mysqli_query($con,"Delete from tbl_cut_ins_plan_temp where p_date ='$tp_date'");
		
		
		$sqlreport=mysqli_query($con,"INSERT INTO tbl_cut_ins_plan_temp

SELECT * FROM (SELECT '',aa.pro_no_qc,'$plan_date',aa.pattern_no_qc,aa.lot_no_qc,aa.item01_qc,aa.actual_qty_qc,
(case when (eee.ssqty is null) then aa.actual_qty_qc else aa.actual_qty_qc-eee.ssqty end) AS `remm`,
(case when (eee.ssqty is null) then aa.actual_qty_qc else aa.actual_qty_qc-eee.ssqty end) AS `remm2`,
reject_items_qc,'0' AS qwe,'0' AS qwe2,aa.check_date_qc
 FROM qc_qc_approval_tbl aa

LEFT JOIN (SELECT a.pro_no,a.design,a.lot,SUM(a.qty) AS ssqty FROM tbl_cut_ins_plan_ins_data a GROUP BY a.pro_no) eee
ON aa.pro_no_qc =eee.pro_no AND aa.lot_no_qc = eee.lot AND aa.pattern_no_qc=eee.design

LEFT JOIN (SELECT * from tbl_cut_ins_planner_wise_data c WHERE c.ins_complete != '0' GROUP BY c.pro_no) fff
ON aa.pro_no_qc=fff.pro_no

 WHERE (aa.reject_items_qc ='Pass' || aa.reject_items_qc ='Conditional-Pass') AND aa.check_date_qc > '2024-06-01' 
 AND fff.ins_complete IS null
 GROUP BY aa.pro_no_qc

) kkk WHERE kkk.remm>0 ");
	}
			
			
			header("Location:Cut_ins_plan_new.php?p_date=$plan_date");
		}
		
		
		
		
		
		
	
		
		
		
		
		
		
	}
	
	
	if(isset($_POST['btnchange1']))
	{
		
			
		$count_2=isset($_REQUEST["count_2"]) ? $_REQUEST["count_2"] : "";
		$plan_date_fix=$today;
		
		$count_2=100;
		
		for ($x = 1; $x <= $count_2; $x++) {
			//print(331231);exit;
			$updateid_2=isset($_REQUEST["tempid_2_".$x]) ? $_REQUEST["tempid_2_".$x] : "";
			$order_no=isset($_REQUEST["order_no_2".$x]) ? $_REQUEST["order_no_2".$x] : "";
			
			
	
	
			$belt=mysqli_query($con,"update tbl_cut_ins_plan a set  a.order_no='$order_no' 
			where a.id='$updateid_2' and a.shift='1'")or die("insert_err4");
			
			
		}
		
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnchange222']))
	{
		
			
		$count_2=isset($_REQUEST["count_222"]) ? $_REQUEST["count_222"] : "";
		$plan_date_fix=$today;
		
		$count_2=100;
		
		for ($x = 1; $x <= $count_2; $x++) {
			//print(331231);exit;
			$updateid_2=isset($_REQUEST["tempid_222_".$x]) ? $_REQUEST["tempid_222_".$x] : "";
			$order_no=isset($_REQUEST["order_no_222".$x]) ? $_REQUEST["order_no_222".$x] : "";
			
			
	
	
			$belt=mysqli_query($con,"update tbl_cut_ins_plan a set  a.order_no='$order_no' 
			where a.id='$updateid_2' and a.shift='2'")or die("insert_err4");
			
			
		}
		
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnchange2']))
	{
		
			//print(331231);exit;
		$count_22=isset($_REQUEST["count_22"]) ? $_REQUEST["count_22"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		for ($x = 1; $x <= $count_22; $x++) {
			$updateid_22=isset($_REQUEST["tempid_22_".$x]) ? $_REQUEST["tempid_22_".$x] : "";
			$order_no2=isset($_REQUEST["order_no_22".$x]) ? $_REQUEST["order_no_22".$x] : "";
			
			//print($plan_date);exit;
	
	
			$belt=mysqli_query($con,"update tbl_cut_ins_plan a set  a.order_no='$order_no2' 
			where a.id='$updateid_22' and a.shift='3'")or die("insert_err4");
			
			
		}
		
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}
	
if(isset($_POST['btnchange2222']))
	{
		
			//print(331231);exit;
		$count_2222=isset($_REQUEST["count_2222"]) ? $_REQUEST["count_2222"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		for ($x = 1; $x <= $count_2222; $x++) {
			$updateid_22=isset($_REQUEST["tempid_2222_".$x]) ? $_REQUEST["tempid_2222_".$x] : "";
			$order_no2=isset($_REQUEST["order_no_2222".$x]) ? $_REQUEST["order_no_2222".$x] : "";
			
			//print($plan_date);exit;
	
	
			$belt=mysqli_query($con,"update tbl_cut_ins_plan a set  a.order_no='$order_no2' 
			where a.id='$updateid_22' and a.shift='4'")or die("insert_err4");
			
			
		}
		
		
		header("Location:Cut_ins_plan_new.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnpri']))
	{		
		
		//print(12312312);exit;
		$plan_date_fix=$today;
		
		header("Location:Cut_ins_plan_print.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnpri222']))
	{		
		
		//print(12312312);exit;
		$plan_date_fix=$today;
		
		header("Location:Cut_ins_plan_print3.php?p_date=$plan_date_fix");
	}

	if(isset($_POST['btnpri2']))
	{		
		
		//print(12312312);exit;
		$plan_date_fix=$today;
		
		header("Location:Cut_ins_plan_print2.php?p_date=$plan_date_fix");
	}	

	if(isset($_POST['btnpri2222']))
	{		
		
		//print(12312312);exit;
		$plan_date_fix=$today;
		
		header("Location:Cut_ins_plan_print.php?p_date=$plan_date_fix");
	}	
	
	
	
	
?>



<?php
	
	
?>



<?php  error_reporting (E_ALL ^ E_NOTICE); ?>
<title>:: Noritake - Packed Data ::</title>
<script language="javascript" src="calendar/calendar/calendar.js"></script>
<link href="calendar/calendar/calendar.css" rel="stylesheet" type="text/css">
<style type="text/css">
	
	.heading{
	background-color:#2859AA;
	border:1px solid #121649;
	color:#FFFFFF;
	font-weight:bold;
	font-size:14px;
	padding:3px;
	text-align:center;
	margin-bottom:20px;
	}
	.bcode{
	
	width:210px;
	height:30px;
	padding:3px;
	color:#663300;
	font-family:Arial, Helvetica, sans-serif;
	size:30px;
	font-weight:bold;
	font-size: 16px;
	}
	#status{
	display:none;
	}
	.err{
	color:#CC0000;
	font:Tahoma 80%;
	}
	.suc{
	color:#33CC00;
	font:Tahoma 80%;
	}
	.alr{
	color:#FF5218;
	font:Tahoma 80%;
	}
	.clock {
	background-color: #FFFFFF;
	text-align: center;
	border-bottom: 0;
	border-left: 0;
	border-top: 0;
	border-right: 0;
	font-family:Arial, Helvetica, sans-serif; 
	font-size:12px;
	}
	.style2 {background-color: #286488; border: 1px solid #006767; color: #FFFFFF; font-weight: bold; font-size: 16px; padding: 3px; text-align: center; margin-bottom: 20px; }
	.style3 {font-family: Arial, Helvetica, sans-serif}
	.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 25px;
	font-weight: bold;
	}
	
	.line {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 1px;
	font-weight: bold;
	}
	.hide_info {
	}
	.patt {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	font-weight: bold;
	background-color: #286488;
	color: #FFF;
	width: 140px;
	height: 35px;
	}
	
	.qty {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 25px;
	font-weight: bold;
	background-color: #FFF;
	color: #FFF;
	width: 120px;
	height: 50px;
	}
	.curve {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	font-weight: bold;
	background-color: #286488;
	color: #FFF;
	width: 80px;
	height: 35px;
	}
	.stock {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-weight: bold;
	background-color: #9CF;
	color: #000;
	width: 60px;
	height: 25px;
	}
	.in {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-weight: bold;
	background-color: #BFFFBF;
	color: #000;
	width: 60px;
	height: 25px;
	}
	.out {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-weight: bold;
	background-color: #FC9;
	color: #000;
	width: 60px;
	height: 25px;
	}
	.no {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-weight: bold;
	background-color: #CCC;
	color: #000;
	width: 120px;
	height: 25px;
	}
	a {
	font-size: 14px;
	color: #FFFFFF;
	}
	a:link {
	text-decoration: none;
	color: #003300;
	}
	a:visited {
	text-decoration: none;
	color: #003300;
	}
	a:hover {
	text-decoration: none;
	color: #FF6600;
	}
	a:active {
	text-decoration: none;
	color: #003300;
	}
	.textbox {
	BORDER-RIGHT: #999999 1px solid;
	BORDER-TOP: #999999 1px solid;
	FONT-SIZE: 12px;
	FILTER: progid:DXImageTransform.Microsoft.Alpha( style=0,opacity=50); 													BORDER-LEFT: #999999 1px solid;
	COLOR: #000000;
	BORDER-BOTTOM: #999999 1px solid;
	FONT-FAMILY: verdana;
	BACKGROUND-COLOR: #738e94;
	width: 200px;
	height: 30px;
	font-weight: bold;
	}
	.err{
	color:#F00;
	font:Tahoma 50%;
	font-size:12px;
	} 
	
	.inn{
	float:left;
	font-size:16px;
	border:solid 1px #000000;
	width:143px;
	font-family:Arial, Helvetica, sans-serif;
	color:#0066CC;
	font-weight:bold;		
	
	
	}
	.srn {
	float:left;
	font-size:16px;
	border:solid 1px #000000;
	width:100px;
	font-family:Arial, Helvetica, sans-serif;
	color:#063;
	font-weight:bold;
	}
	.password {
	font-family: Calibri;
	font-size: 14px;
	color: #FFF;
	}
	.qty {
	float:left;
	font-size:16px;
	border:solid 1px #000000;
	width:50px;
	font-family:Arial, Helvetica, sans-serif;
	color:#0066CC;
	font-weight:bold;
	}
	.button {
	font-size:12px;
	color:#FFF;
	text-decoration:none;
	display:block;
	width:100px;
	padding:5px;
	border:1px solid #DDD;
	text-align:center;	
	font-weight: bold;
	background-color: #3278BE;
	}
	
	.button2 {
	font-size:12px;
	color:#FFF;
	text-decoration:none;
	display:block;
	width:100px;
	padding:5px;
	border:1px solid #DDD;
	text-align:center;	
	font-weight: bold;
	background-color: red;
	}
	
	.title {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	}
	.text1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	}
	body,td,th {
	color: #000000;
	
	}
	
	#jsddm
	{	margin: 0;
	padding: 0}
	
	#jsddm li
	{	float: left;
	list-style: none;
	font: 12px Tahoma, Arial;
	font-weight:bold}
	
	#jsddm li a
	{	display: block;
	background: #324143;
	padding: 5px 12px;
	text-decoration: none;
	border-right: 1px solid white;
	width: 103px;
	color: #EAFFED;
	white-space: nowrap}
	
	#jsddm li a:hover
	{	background: #24313C}
	
	#jsddm li ul
	{	margin: 0;
	padding: 0;
	position: absolute;
	visibility: hidden;
	border-top: 1px solid white}
	
	#jsddm li ul li
	{	float: none;
	display: inline}
	
	#jsddm li ul li a
	{	width: auto;
	background: #A9C251;
	color: #24313C}
	
	#jsddm li ul li a:hover
	{	background: #8EA344}
	body{
	font-family: Helvetica, Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size:12px;
	}
	
	p, h1, form, button{border:0; margin:0; padding:0;}
	
	.spacer{clear:both; height:1px;}
	
	
	.login{
	margin:0 auto;
	width:400px;
	padding:14px;
	}
	
	
	#stylized{
	border:solid 3px #2E6881;
	}
	
	#stylized h1 {
	font-size:14px;
	font-weight:bold;
	margin-bottom:8px;
	}
	
	#stylized p {
	font-size:11px;
	color:#666666;
	margin-bottom:20px;
	border-bottom:solid 1px #b7ddf2;
	padding-bottom:10px;
	}
	
	#stylized label{
	font-weight:bold;
	text-align:right;
	width:140px;
	float:left;
	}
	
	
	
	#stylized button{
	clear:both;
	
	width:60px;
	height:31px;
	background:#b7ddf2;
	text-align:center;
	line-height:31px;
	color:#FFFFFF;
	font-size:11px;
	font-weight:bold;
	}
	
	body {
	background-color: #000;
	}
	.bcode1 {	border:2px solid #006767;
	width:210px;
	height:30px;
	padding:3px;
	color:#004040;
	font-family:Arial, Helvetica, sans-serif;
	size:30px;
	font-weight:bold;
	font-size: 16px;
	}
	.textbox1 {	BORDER-RIGHT: #999999 1px solid;
	BORDER-TOP: #999999 1px solid;
	FONT-SIZE: 12px;
	FILTER: progid:DXImageTransform.Microsoft.Alpha( style=0,opacity=50); 													BORDER-LEFT: #999999 1px solid;
	COLOR: #000000;
	BORDER-BOTTOM: #999999 1px solid;
	FONT-FAMILY: verdana;
	BACKGROUND-COLOR: #CCC;
	width: 80px;
	height: 30px;
	font-weight: bold;
	}
	.notification-success{
	
	border-left-width:1px;
	border-right-width:1px;
	box-shadow:0 0 6px #AAAAAA;
	margin:15px 0;
	padding:15px 15px;
	text-align:center;
	
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; color:#FFFFFF;
	font-size:16px;
	border-color:#0C514B;
	background-color:#006600;
	
	
	
	}
	.qty_in {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 50px;
	font-weight: bold;
	color:#FFF;
	
	}
	.confirm_data {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color:#FFF;
	}
	.details_font {font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	}
	.line1 {	font-size: 1px;
	}
	.textBoxStyle {	
	background-color: #cccccc;
	}
	
	body {
	background-image: url("images/bk.jpg");
	background-color: #cccccc;
	}
	
	.style13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	}
	.style10 {	color: #171B20;
	font-weight: bold;
	}
	.style15 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; font-weight: bold; }
	.style16 {font-family: Arial, Helvetica, sans-serif; font-size: 1px; }
	.clock {
	background-color: #FFFFFF;
	text-align: center;
	border-bottom: 0;
	border-left: 0;
	border-top: 0;
	border-right: 0;
	font-family:Arial, Helvetica, sans-serif; 
	font-size:12px;
	}
	.tdinfo {
	font-size: 14px;
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	padding-top: 3px;
	padding-bottom: 3px;
	}
	.textbox {	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-left-color: #FFF;
	border-top: 0;
	border-right: 0;
	border-left: 0;
	}
	#apDiv1 {	position:absolute;
	width:207px;
	height:42px;
	z-index:1;
	left: 633px;
	top: 39px;
	}
	.textbox1 {font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
	font-weight:bold;
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-left-color: #FFF;
	border-top: 0;
	border-right: 0;
	border-left: 0;
	}
	.style18 {color: #171B20; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
	.line {
	font-size: 2px;
	}
	.tot {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	}
	
	
	.input3 {
	background-color: rgba(0,0,0,0);
	color: blue;
	border: none;
	font-size: inherit;
	width:100;
	text-align: left;
	}
	
	.input33 {
	background-color: rgba(0,0,0,0);
	color: blue;
	border: none;
	font-size: inherit;
	width:300;
	text-align: left;
	}
	
	
	.input6 {
	background-color: rgba(0,0,0,0);
	color: red;
	border: none;
	font-size: inherit;
	width:100;
	text-align: left;
	}
	
	
	.input2 {
	background-color: rgba(0,0,0,0);
	color: red;
	border: none;
	font-size: inherit;
	width:100;
	text-align: left;
	}
</style>
<SCRIPT LANGUAGE="JavaScript">
	
	
	function final_data() { 
		var type='final';
		var p_date = document.getElementById('datep').value;
		window.location.replace("Cut_ins_plan_new.php?type="+type+"&p_date="+p_date);
	}
	
	
	function Drop_1(count) { 
		var tempid_1 = document.getElementById('tempid_1_'+count).value;
		var type='temp1';
		window.location.replace("production_plan.php?tempid_1="+tempid_1+"&type="+type);
	}
	
	function Drop_2(count) { 
		var tempid_2 = document.getElementById('tempid_2_'+count).value;
		var type='temp2';
		
		//alert(tempid_2);
		window.location.replace("production_plan.php?tempid_2="+tempid_2+"&type="+type);
	}
	
	
	
	
	function update_2(count) { 
		
		
		var updateid_2 = document.getElementById('tempid_2_'+count).value;
		var plan_date = document.getElementById('plan_date'+count).value;
		var order = document.getElementById('order'+count).value;
		
		//alert(order);exit;
		
		
		var type='update2';
		
		window.location.replace("plan_master_change_of.php?updateid_2="+updateid_2+"&type="+type+"&plan_date="+plan_date+"&order="+order);
		
		
		
	}
	
	
	function update_3(count) { 
		
		var updateid_3 = document.getElementById('tempid_3_'+count).value;
		
		var change_qty_3 = document.getElementById('change_qty_3_'+count).value;
		
		var fp_3 = document.getElementById('fp_3_'+count).value;
		
		var fr_3 = document.getElementById('fr_3_'+count).value;
		
		var type='update3';
		
		window.location.replace("production_plan.php?updateid_3="+updateid_3+"&type="+type+"&change_qty_3="+change_qty_3+"&fp_3="+fp_3+"&fr_3="+fr_3);
		
		
	}
	
	
	<!-- Begin
	var timerID = null;
	var timerRunning = false;
	function stopclock (){
		if(timerRunning)
		clearTimeout(timerID);
		timerRunning = false;
	}
	function showtime () {
		var now = new Date();
		var hours = now.getHours();
		var minutes = now.getMinutes();
		var seconds = now.getSeconds()
		var timeValue = "" + ((hours >12) ? hours -12 :hours)
		if (timeValue == "0") timeValue = 12;
		timeValue += ((minutes < 10) ? ":0" : ":") + minutes
		timeValue += ((seconds < 10) ? ":0" : ":") + seconds
		timeValue += (hours >= 12) ? " P.M." : " A.M."
		document.clock.face.value = timeValue;
		timerID = setTimeout("showtime()",1000);
		timerRunning = true;
	}
	function startclock() {
		stopclock();
		showtime();
	}
	
	var months=new Array(13);
	months[1]="January";
	months[2]="February";
	months[3]="March";
	months[4]="April";
	months[5]="May";
	months[6]="June";
	months[7]="July";
	months[8]="August";
	months[9]="September";
	months[10]="October";
	months[11]="November";
	months[12]="December";
	var time=new Date();
	var lmonth=months[time.getMonth() + 1];
	var date=time.getDate();
	var year=time.getYear();
	if (year < 2000)    
	year = year + 1900; 
</SCRIPT>
<script type="text/javascript">
	function selectAll()
	{
		document.form1.bcode.focus();
		document.form1.bcode.select();
	}
</script>

<BODY onLoad="startclock()">
	<?php
	
	
	
?>
	
	<?php
		//print(123);exit;
		if(1)
		{
			
		?><td width="30%" valign="top">
					<a href="/PMSDev/view/index.php" >
						<img src="images/home.png"  width="40" height="40"  /> Home
					</a>
				</td>
		<table width="800" height="5" border="0" align="center">
			<tr align="center">
				<td align="center" style="color:#36a2ef;font-size: -webkit-xxx-large;"><H3>New Decal Cutting & Inspection Plan</H3></td>
			</tr>
		</table>
		<table width="800" height="5" border="0" align="center">
			<tr>
				<td style="color:#36a2ef;font-size: -webkit-xxx-large;"></td>
			</tr>
		</table>
		
		
		<form id="form2" name="form2" method="post">
		
		<table width="800" height="5" border="0" align="center"><tr>
				
				
													<td width="83"><font size='2px'>Select Date :</font></td>
							<td width="114" hidden nowrap><?php
								$myCalendar = new tc_calendar("date5", true, false);
								$myCalendar->setIcon("calendar/calendar/images/iconCalendar.gif");
								$myCalendar->setPath("calendar/calendar/");
								$myCalendar->setYearInterval(2011, 2025);
								$myCalendar->dateAllow('2011-01-1', '2025-12-31');
								$myCalendar->setDateFormat('j F Y');
								$myCalendar->writeScript();
							?></td>
							<td>
							<input name="date5"class="input3" id="date5"
										
									value="<?php print $today;?>"  >
							
							</td>
					<td><input name="btnprio_4" value="Set Date" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /></td>
						
					<td hidden><input type="datep" id="datep" name="datep" value="<?php echo $today;?>" />
					<input type="hidden" id="hiddensdt" name="hiddensdt" value="<?php echo $today;?>" /></td>
					
					<td></td>
				</tr></table>
			<table width="800" height="100" border="0" align="center">
				
				<tr valign="top" >
					<td width="120" >
						<table width="120" height="75" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								
								<td colspan="12"  width="120" height="25" align="center" valign="middle" bgcolor="#004848" class="style15">QC Approved Jobs</td>
								
							</tr>
							<tr class="style13">
								<td width="2" height="25" valign="middle" bgcolor="#004848" class="style13">  </td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Pro No</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Design</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Lot</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">QC Approval Date</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">QC Comment</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Total <br>QTY</td>
								<td  width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Remaning<br>QTY</td>
								<td   width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">QTY</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Priority</td>
								<td width="50" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Add To Plan</td>
								<td width="50" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Finalize</td>
								<td hidden width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Check</td>
								<td hidden width="10" height="25" valign="middle" bgcolor="#004848" class="style13">  </td>
							</tr>  
							
							<tr  class="tcday">
								<td></td><td></td>
								<td></td><td></td><td></td>
								<td></td><td></td><td></td>	<td></td>	
								<td><input name="btnprio_dec_1" value="Set & Priority" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /></td>
								<td hidden><input name="btnprio_1" value="Select" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /></td>
								</tr> <?php 
								include("database_connections.php");
								
								$query_1 =mysqli_query($con,"SELECT a.*,b.plan_status FROM tbl_cut_ins_plan_temp  a
left JOIN tbl_cut_ins_plan_finalize b
ON a.pro_no = b.pro_no
AND a.p_date= b.p_date
WHERE a.p_date = '$plan_date' order BY a.priority DESC,a.pro_no");
								
								$count_1=0;
								while($a_1=mysqli_fetch_array($query_1))
								{
									
								?>
								<tr class="style13" <?php if(1){ ?> bgcolor="#CCFFFF"<?php }?>>
									
									<td  width="2" align="left" valign="middle"  > 
										<?php
											$count_1++;
											print "(".$count_1.").&nbsp;&nbsp;";
										?>
									</td>
									<td valign="middle" width="48" hidden  >
										<input  name="tempid_1_<?php print $count_1 ?>"class="input3" id="tempid_1_<?php print $count_1 ?>"
										
									value="<?php print $a_1['id'];?>" readonly  ></td>
									
									
									
									
									
									<td valign="middle" width="48" >
										<input name="pro_no<?php print $count_1 ?>"class="input3" id="pro_no<?php print $count_1 ?>"
										
									value="<?php print $a_1['pro_no'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="design<?php print $count_1 ?>"class="input3" id="design<?php print $count_1 ?>"
										
									value="<?php print $a_1['design'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="lot<?php print $count_1 ?>"class="input3" id="lot<?php print $count_1 ?>"
										
									value="<?php print $a_1['lot'];?>" readonly ></td>
									<td valign="middle" width="48" >
										<input name="lot<?php print $count_1 ?>"class="input3" id="lot<?php print $count_1 ?>"
										
									value="<?php print $a_1['qc_qc_approval_date'];?>" readonly ></td>
									<td valign="middle" width="48" >
										<input name="lot<?php print $count_1 ?>"class="input3" id="lot<?php print $count_1 ?>"
										
									value="<?php print $a_1['qc_comment'];?>" readonly ></td>
									


									<td valign="middle" width="48" >
										<input name="qshow<?php print $count_1 ?>"class="input3" id="qshow<?php print $count_1 ?>"
										
									value="<?php print $a_1['qty_p'];?>" readonly ></td>

									<td  valign="middle" width="48" >
										<input name="remshow<?php print $count_1 ?>"class="input3" id="remshow<?php print $count_1 ?>"
										
									value="<?php print $a_1['qty_r'];?>" readonly ></td>


									
									<td  valign="middle" width="48" >
										<input name="qty_p_<?php print $count_1 ?>" id="qty_p_<?php print $count_1 ?>"
										
									value="<?php print $a_1['qty_plan'];?>" style="width:100;font-size: smaller;color: red;font-weight: bold;"  ></td>
									
								

									<td hidden><input name="shift_<?php print $count_1 ?>" type="text" id="shift_<?php print $count_1 ?>" value="<?php
														
														print '1';
													?>" style="width:100;font-size: smaller;color: blue;font-weight: bold;text-align: right;"></td>
									
									
									
									<td width="69" align="left" valign="middle" nowrap class="tdinfo"  height="30">
														<?php  if($a_1['priority']=='1'){  ?>
															<input type="checkbox" name="prio_1_dec<?php print $count_1 ?>" id="prio_1_dec<?php print $count_1 ?>" checked > 
															
															
															
															<?php } 
															
															else{ ?>
															
															<input type="checkbox" name="prio_1_dec<?php print $count_1 ?>" id="prio_1_dec<?php print $count_1 ?>"  > 
															
														<?php  }  ?>
														
													</td>
													
								
									<?php  if($a_1['plan_status']=='1'){  ?>
															<td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:green;">&#10004;</td>
															
															
															
															<?php } 
															
															else{ ?>
															
															<td></td>
															
														<?php  }  ?>
														
														
														<?php  if($a_1['plan_status'] =='2'){  ?>
															<td align="center" style="text-align:center; font-size:150%; font-weight:bold; color:red;">&#10004;</td>
															
															
															
															<?php } 
															
															else{ ?>
															
															<td></td>
															
														<?php  }  ?>
														
													</td>
									
									
									
									<!---
										<td>
										<input type="button" onclick="Drop_1(<?php print $count_1 ?>)" class="button button3"  Value="Drop" style="color:#ffffff; width: 100; height: 30;" />
										
										
										</td>
									-->
									
									
									
									
									
									
								</tr>
								<tr class="report_font">
									<td height="1" colspan="10" valign="top" bgcolor="#FFFFFF" class="style16">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/line.png" width="100%" height="1"></td>
								</tr> 
								
								
								
							<?php }?>
							
							
							
							<td hidden align="right" valign="middle"  class="">
								<input name="count" class="input3"id="count"					
							value="<?php print $total_received_m;?>" readonly   ></td>
							
						</tr>
						
						
						
						<tr>
							<td  valign="middle" nowrap class="tdinfo">
								<input name="count_1new" class="input3"id="count_1new"					
							value="<?php print $count_1;?>" readonly  ></td>
							<td></td>
							<td></td>
							<td></td><td></td><td></td>
							<td hidden><input name="btndrop_1" value="Drop" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /> 
								
								
							</td>
							
						</tr>
						<tr class="report_font">
							<td height="1" colspan="8" valign="top" bgcolor="#FFFFFF" class="style16">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/line.png" width="100%" height="1"></td>
						</tr> 
						<tr>
						<td></td>
							<td></td>
							<td></td>
							<td></td><td></td>
							<td></td>
							<td></td>
							<td></td>
						<td><input name="btn_fin" value="Generate" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /></td>
						</tr>
					</table>
					
				</td>
				
				
			
			
		</tr>
		
		
		
		
		
	</table>
	
	<table width="120" height="75" border="1" align="center" cellpadding="0" cellspacing="0">
	<tr valign="top" >
	<td width="120" >
	<?php
	$sql_final_plan=mysqli_query($con,"SELECT a.planner as ins,a.p_type FROM tbl_cut_ins_planner_time a WHERE a.p_date = '$plan_date' ");
	if(mysqli_num_rows($sql_final_plan)>0){
		
		while($row=mysqli_fetch_array($sql_final_plan))
		{
			$ins= $row['ins'];
			$p_type= $row['p_type'];
			?>
			<table width="800" height="100" border="0" align="center">
				
				<tr valign="top" >
					<td width="120" >
						<table width="120" height="75" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
							
							<td colspan="2"  width="300" height="25" align="center" valign="middle" bgcolor="#004848" class="style15"><?php print "Inspector :" .$ins ?></td>
							<td colspan="2"  width="300" height="25" align="center" valign="middle" bgcolor="#004848" class="style15"><?php print "Work TIme :" .$p_type ?></td>
							<td colspan="4"  width="300" height="25" align="center" valign="middle" bgcolor="#004848" class="style15"><?php print "Plan Date :" .$plan_date  ?></td>
							
							
						</tr>
							<tr class="style13">
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">No</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Pro No</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Design</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Lot</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Plan Qty</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Plan Time(Min:Sec)</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Start Time</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">End Time</td>
							</tr>  
							
							<tr class="tcday">
								
								</tr> <?php 
								include("database_connections.php");
								$decal_count_val=0;
								$lunch_c = 0;
								$tea_1 = 0;
								$tea_2 = 0;
								$tea_S = 0;
								if($p_type=='Shift' || $p_type=='Shift_Sat'){
									$start_time = strtotime('06:00:00');
									$start_time_p = date("H:i:s",strtotime('+0 seconds',$start_time));
								}
								else{
									if($ins=='ins1'){
										$query_1 =mysqli_query($con,"SELECT ins_no_1 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");
										if(mysqli_num_rows($query_1)>0){
										while($a_11=mysqli_fetch_array($query_1))
										{
											if($a_11['ins_no_1']=='Yes'){
												$start_time = strtotime('08:45:00');
												$decal_count_val=1;
											}
											else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
										}
										}
										else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
									}
									if($ins=='ins2'){
										$query_1 =mysqli_query($con,"SELECT ins_no_2 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");
										
										if(mysqli_num_rows($query_1)>0){
										while($a_11=mysqli_fetch_array($query_1))
										{
											if($a_11['ins_no_2']=='Yes'){
												$start_time = strtotime('08:45:00');
												$decal_count_val=1;
											}
											else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
										}
										}
										else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
									}
									if($ins=='ins3'){
										//print("SELECT ins_no_3 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");exit;
										$query_1 =mysqli_query($con,"SELECT ins_no_3 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");
										if(mysqli_num_rows($query_1)>0){
										while($a_11=mysqli_fetch_array($query_1))
										{
											if($a_11['ins_no_3']=='Yes'){
												$start_time = strtotime('08:45:00');
												$decal_count_val=1;
											}
											else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
										}
										}
										else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
									}
									if($ins=='ins4'){
										$query_1 =mysqli_query($con,"SELECT ins_no_4 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");
										if(mysqli_num_rows($query_1)>0){
										while($a_11=mysqli_fetch_array($query_1))
										{
											if($a_11['ins_no_4']=='Yes'){
												$start_time = strtotime('08:45:00');
												$decal_count_val=1;
											}
											else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
										}
										}
										else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
									}
									
									if($ins=='ins5'){
										$query_1 =mysqli_query($con,"SELECT ins_no_5 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");
										if(mysqli_num_rows($query_1)>0){
										while($a_11=mysqli_fetch_array($query_1))
										{
											if($a_11['ins_no_5']=='Yes'){
												$start_time = strtotime('08:45:00');
												$decal_count_val=1;
											}
											else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
										}
										}
										else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
									}
									
									if($ins=='ins6'){
										$query_1 =mysqli_query($con,"SELECT ins_no_6 FROM decal_ins_counting_tbl a WHERE  a.date_mlt ='$plan_date'");
										if(mysqli_num_rows($query_1)>0){
										while($a_11=mysqli_fetch_array($query_1))
										{
											if($a_11['ins_no_6']=='Yes'){
												$start_time = strtotime('08:45:00');
												$decal_count_val=1;
											}
											else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
										}
										}
										else{
												$start_time = strtotime('07:30:00');
												$decal_count_val=0;
											}
									}
										
									
									$start_time_p = date("H:i:s",strtotime('+0 seconds',$start_time));
								}
								
								$query_1 =mysqli_query($con,"SELECT * FROM tbl_cut_ins_planner_wise_data a WHERE a.p_date = '$plan_date' and a.ins ='$ins'");
								
								$count_1_t=0;
								while($a_1=mysqli_fetch_array($query_1))
								{
									if($decal_count_val ==1){
										?>
										<tr class="style13" <?php if($a_1['reset']=='1'){ ?> bgcolor="#CCFFFF"<?php }?>>
									<td colspan='3'>
									
									</td>
									
									<td valign="middle" width="48" hidden  >
										<input  name="tempid_12_<?php print $count_1_t ?>"class="input3" id="tempid_12_<?php print $count_1_t ?>"
										
									value="<?php print $a_1['id'];?>" readonly  ></td>
									<td width="10" align="right" valign="middle"  > 
										<?php
											//$count_1_t++;
											print "Decal-Count";
											$decal_count_val=0
											
										?>
									</td>
										
										<tr>
										
										<?php
									}
									
									
									
								?>
								<tr class="style13" <?php if($a_1['reset']=='1'){ ?> bgcolor="#CCFFFF"<?php }?>>
									
									<td width="10" align="right" valign="middle"  > 
										<?php
											$count_1_t++;
											print "(".$count_1_t.").&nbsp;&nbsp;";
										?>
									</td>
									<td valign="middle" width="48" hidden  >
										<input  name="tempid_12_<?php print $count_1_t ?>"class="input3" id="tempid_12_<?php print $count_1_t ?>"
										
									value="<?php print $a_1['id'];?>" readonly  ></td>
									
									
									
									
									
									<td valign="middle" width="48" >
										<input name="pro_no<?php print $count_1_t ?>"class="input3" id="pro_no<?php print $count_1_t ?>"
										
									value="<?php print $a_1['pro_no'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="design<?php print $count_1_t ?>"class="input3" id="design<?php print $count_1_t ?>"
										
									value="<?php print $a_1['design'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="lot<?php print $count_1_t ?>"class="input3" id="lot<?php print $count_1_t ?>"
										
									value="<?php print $a_1['lot'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="qty<?php print $count_1_t ?>"class="input3" id="qty<?php print $count_1_t ?>"
										
									value="<?php print $a_1['qty'];?>" readonly ></td>
									
									
									<td valign="middle" width="48" >
										<input name="p_time<?php print $count_1_t ?>"class="input3" id="p_time<?php print $count_1_t ?>"
										
									value="<?php 
									$work_time=$a_1['req_time'];
									
									$min =floor($work_time/60);
									$sec =$work_time%60;
									
									print $min.":".$sec;?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="stime<?php print $count_1_t ?>"class="input3" id="stime<?php print $count_1_t ?>"
										
									value="<?php print date("H:i:s", $start_time);?>" readonly ></td>
									
									
									<td valign="middle" width="100" >
										<input name="stime<?php print $count_1_t ?>"class="input33" id="stime<?php print $count_1_t ?>"
										
									value="<?php
									
									
									$end_time=$start_time+$work_time;
									$temp = strtotime('12:00:00');
									//print $temp."- 1710993600 -";
									
									if($p_type == 'General'){
										
										$remarks="";
										//1711166400
										//1710982950
										//1710982950
										if($end_time >= '1712116800' && $tea_1 == 0){
											//print(1);exit;
											$remarks .= " - With Morning Tea";
											$end_time = $end_time + 1200;
											$tea_1 = 1;
										}
										
										if($end_time > '1712125800' && $lunch_c == 0){
											//print(2);exit;
											//print $end_time_p;
											$remarks .= " - With Lunch";
											$end_time = $end_time + 2700;
											$lunch_c = 1;
										}
										
										if($end_time > '1712135700' && $tea_2 == 0){
											//print(3);exit;
											//print $end_time_p;
											$remarks .= " - With Evening Tea";
											$end_time = $end_time + 900;
											$tea_2 = 1;
										}
										
										
									}
									
									if($p_type == 'Shift' || $p_type == 'Shift_Sat' || $p_type == 'General_Sat'){
										if($end_time > '1712116800' && $tea_S == 0){
											//print $end_time;
											//echo date('Y-m-d H:i:s', $end_time);
											$remarks .= " - With Morning Tea";
											$end_time = $end_time + 1800;
											$tea_S = 1;
										}
										
									}
									
									$end_time_p = date("H:i:s", $end_time);
									$start_time = strtotime($end_time_p);

									print $end_time_p.$remarks;
									$remarks= "";
									?>" readonly ></td>
									
									<!---
										<td>
										<input type="button" onclick="Drop_1(<?php print $count_1_t ?>)" class="button button3"  Value="Drop" style="color:#ffffff; width: 100; height: 30;" />
										
										
										</td>
									-->
									
									
									
									
									
									
								</tr>
								<tr class="report_font">
									<td height="1" colspan="6" valign="top" bgcolor="#FFFFFF" class="style16">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/line.png" width="100%" height="1"></td>
								</tr> 
								
								
								
							<?php }?>
							
							
							
							<td align="right" valign="middle"  class="">
								<input name="count" class="input3"id="count"					
							value="<?php print $total_received_m;?>" readonly   ></td>
							
						</tr>
						
						
						
						<tr>
							<td valign="middle" nowrap class="tdinfo">
								<input name="count_1newt" class="input3"id="count_1newt"					
							value="<?php print $count_1_t;?>" readonly  ></td>
							<td></td>
							<td></td>
							<td></td><td></td><td></td>
							<td hidden><input name="btndrop_1" value="Drop" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /> 
								
								
							</td>
							
						</tr>
						<tr class="report_font">
							<td height="1" colspan="8" valign="top" bgcolor="#FFFFFF" class="style16">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/line.png" width="100%" height="1"></td>
						</tr> 
						
						
					</table>
					
				</td>
				
				
			
			
		</tr>
		
		
		
		
		
	</table>
			
			<?php
		}
	}
	
	
	?>
	
	
	
	
	
	</td>
	</tr>
	
<tr>
						<td align ="right">
							
						<input name="btn_fina" value="Finalize" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    /></td>
						</tr>

<tr>
						<td hidden align ="left">
						<input name="btn_delete" value="Delete Finalize Plan" class="button button1"  type="submit" src="search.jpg" width="60" height="20"    />
							
						</td>
						
						<td><input name="btnpri2222" value="Print Plan" class="button button2"  type="submit" src="search.jpg" width="60" height="20"     /></td>
					
						</tr>


</table>













</form>
<p>
	
</p>
<p>&nbsp; </p>
<p>&nbsp; </p>
<?php
}


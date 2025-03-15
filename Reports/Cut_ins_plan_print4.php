
<?php include("database_connections.php");?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/png" href="images/reports.png"/>
<title>Cutting & Ins Plan</title>
		<style type="text/css">
			.heding {	color: #171B20;
			font-family: Arial, Helvetica, sans-serif; 
			font-weight: bold;
			}
			.text1 {
			color: #171B20;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			font-size: 13px;
			}
			.text_FFF {
			color: #FFF;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			font-size: 13px;
			}
			.text2 {
			color: #171B20;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: normal;
			font-size: 13px;
			}
			.line {
			font-size: 1px;
			}
			.clock {	background-color: #FFFFFF;
			text-align: center;
			border-bottom: 0;
			border-left: 0;
			border-top: 0;
			border-right: 0;
			font-family:Arial, Helvetica, sans-serif; 
			font-size:12px;
			}
			body {
			background-image: url(images/bg.jpg);
			background-repeat: repeat-y;
			}
			
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
			border:2px solid #069;
			width:200px;
			height:30px;
			padding:3px;
			color:#004040;
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
			.style1 {
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			}
			.style2 {background-color: #069; border: 1px solid #069; color: #FFFFFF; font-weight: bold; font-size: 16px; padding: 3px; text-align: center; margin-bottom: 20px; }
			.style3 {font-family: Arial, Helvetica, sans-serif}
			.style4 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;
			font-weight: bold;
			}
			.hide_info {
			}
			.list_box {
			font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
			font-weight: bold;
			background-color: #069;
			color: #FFF;
			width: 150px;
			height: 25px;
			}
			.list_box_small {
			font-family: Verdana, Geneva, sans-serif;
			font-size: 12px;
			font-weight: bold;
			background-color: #069;
			color: #FFF;
			width: 50px;
			height: 20px;
			}
			a {
			font-size: 14px;
			color: #FFFFFF;
			}
			a:link {
			text-decoration: none;
			color: #069;
			}
			a:visited {
			text-decoration: none;
			color: #069;
			}
			a:hover {
			text-decoration: none;
			color: #003E3E;
			}
			a:active {
			text-decoration: none;
			}
			body {
			background-image: url();
			background-repeat: repeat-x;
			background-color: #FFF;
			}
			.table {	font-family: Verdana, Geneva, sans-serif;
			font-size: 11px;
			}
			.font {
			color: #000;
			}
			.font td {
			font-family: Calibri;
			}
			.line1 {	font-size: 2px;
			}
			.style13 {	font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			}
			.style15 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF; font-weight: bold; }
			.style16 {font-family: Arial, Helvetica, sans-serif; font-size: 1px; }
			.tdinfo {
			font-size: 14px;
			color: #000000;
			font-family: Calibri;
			padding-top: 3px;
			padding-bottom: 3px;
			}
		</style>
		<SCRIPT LANGUAGE="JavaScript">
			
			
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
			<!--
			function selectAll()
			{
				document.form1.bcode.focus();
				document.form1.bcode.select();
			}
			//-->
		</script>
	</head>
	
	<body OnLoad="window.print()">
		<?php
			if(1)
			{	include("database_connections.php");
				
				$p_date=$_GET['p_date'];
				
				
				
				
				
				
				$dateTime =  date("Y-m-d h:i:sa");
				
				
				//$query1 =mysql_query("SELECT * FROM tbl_barcode_data where cart_no=$cart and status='0' order by chit_no,id desc");	
				
							$query1 =mysqli_query($con,"select * from tbl_cut_ins_plan a where p_date ='$p_date' and shift = '4' order by ABS(order_no),pro_no");
				
				
				
			?>
			<table width="533" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr class="font">
					<td height="20" colspan="7" align="center" bgcolor="#FFFFFF"><a >
						<u><font size="+1"><b>Cutting & Ins Plan 7.30 - 4.30  </br> user - 4 </br>  Plan Date<?php print $p_date; ?> - Print Date -<?php print $dateTime;?></b></font></u> 
					</a></td>
					
				</tr>
				<tr class="font">
					<td height="20" colspan="7" align="left" bgcolor="#FFFFFF"></td>
				</tr>
				<tr class="font">
					<td colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
					<td width="48" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Production No</td>
					<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Design</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Lot</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">QTY</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Time</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Start Time</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">End Time</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Order</td>
					
					
					
					
				</tr>
				<?php
					
					$total_time=0;
					$count=0;
					$final_t_qty=0;
					$print_tea1=0;
					$teac_tt=0;
					$teac2_tt=0;
					
					
					while($a1=mysqli_fetch_array($query1))
					{
						
						$time=$a1['qty']*25;
						$minutes=floor($time/60);
						$sec=round($time%60);
						$t_time = $time+360;
						
						
						if($count < 1){
							//print(88);
							$s_time = strtotime('08:45:00');
							$s_time = date("H:i:s",strtotime('+0 seconds',$s_time));
							//$s_time_t = date("H:i:s",strtotime('+'.($total_time).'seconds',$s_time));
							$t_time_t=$total_time;
							//print($t_time_t);
						}
						else{
							//print($total_time);exit;
							$s_time = strtotime('08:45:00');
							$s_time = date("H:i:s",strtotime('+'.($total_time).'seconds',$s_time));
							//print($s_time);exit;
						}
						$total_time=$total_time+$t_time;
						$t_minutes=floor($total_time/60);
						$t_sec=round($total_time%60);
						
						
						$tea=$s_time;
						
						if($s_time < '08:46:00'){
																			?>
																			<tr>
																			<td colspan='4'></td>
																			<td colspan='10'>"Decal Counting"</td>
																			</tr>
<?php
																		}
																		
																		if($tea<'09:00:00'){
																			
																			$tea_t=$tea;																			
																		}
																		
																		if($tea_t<$tea && $print_tea1 != 1 ){
																		
																		$print_tea1 = 1;
																		$s_time_temp = strtotime($s_time);
																		$s_time = date("H:i:s",strtotime('+1800 seconds',$s_time_temp));
																			$total_time=$total_time+1800;
																			?>
																			<tr>
																			<td colspan='10'>"Tea Time"</td>
																			</tr>
																			<?php
																		}
																		
																		$teac2=$s_time;
																		
																		if($teac2<12.00){
																			//print(333);exit;
																			$teac2_t=$teac2;																			
																		}
																		else{
																			//print($tea);exit;
																			
																		}
																		if($teac2_t<$teac2 && $teac2_tt!=1){
																			$s_time_temp = strtotime($s_time);
																			$s_time = date("H:i:s",strtotime('+2700 seconds',$s_time_temp));
																			$teac2_tt=1;
																			?>
																			<tr>
																			<td colspan='4'></td>
																			<td >"Lunch"</td>
																			</tr>
																			<?php
																		}
																		

																		$teac3=$s_time;
																		
																		if($teac3<15.00){
																			//print(333);exit;
																			$teac3_t=$teac3;																			
																		}
																		else{
																			//print($tea);exit;
																			
																		}
																		if($teac3_t<$teac3 && $teac3_tt!=1){
																			$s_time_temp = strtotime($s_time);
																			$s_time = date("H:i:s",strtotime('+1200 seconds',$s_time_temp));
																			$teac3_tt=1;
																			?>
																			<tr>
																			<td colspan='4'></td>
																			<td >"Tea Time"</td>
																			</tr>
																			<?php
																		}
																		
						
					?>
					<tr class="text2">
						<td width="32" align="right" nowrap="nowrap" bgcolor="#FFFFFF"> 
							(<?php
								$count++;
								print $count;
							?>).</td>
							<td width="13" align="left" nowrap="nowrap" bgcolor="#FFFFFF">&nbsp;</td>
							<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php print $a1['pro_no'];?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php print $a1['design'];?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php print $a1['lot'];?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php print $a1['qty'];?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF" ><span class="tdinfo" >
								<?php print $minutes.":".$sec;?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF" hidden ><span class="tdinfo" >
								<?php print $t_minutes.":".$t_sec;?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php print $s_time ;?>
								<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php 
								$s_time_temp2= strtotime($s_time);
								$e_time = date("H:i:s",strtotime('+'.($time).'seconds',$s_time_temp2));
								print $e_time ;?>
							</span></td>
							<td width="99" align="left" nowrap="nowrap" bgcolor="#FFFFFF"><span class="tdinfo">
								<?php
									$decal_patt=$a1['order_no'];
									print $decal_patt=$a1['order_no'];
								?>
							</span></td>
							
							
						
							
							
							
							
					</tr>
					<?php
					}
					
				?>
			
				
				
			</table>
			
			<table>
				<tr>
					<td ><p>Prepared By - ............................</p></td>
					<td ><p>&nbsp;</p></td>
					
					
				</tr>
				
				
				
				<tr>					
					
					
					<td colspan="2"><p><?php print $dateTime; ?></p></td>	
				</tr>
				
			</table>
			<p>&nbsp;</p>
			<p>
				<?php
				}
				
			?>
		</p>
		<p>&nbsp;</p>
	</body>
	</html> <?php
	
	//$filename="decal_in_as_at_".$date; $filename ="$filename.xls"; $contents = "testdata1 \t testdata2 \t testdata3 \t \n"; header('Content-type: application/ms-excel'); header('Content-Disposition: attachment; filename='.$filename);
   	//$query1 =mysql_query("UPDATE decal_in_out SET reset='1' WHERE   reset='0' AND dec_in>'0' ")or die("update error");   
	
	
?>
<link rel="shortcut icon" type="image/png" href="images/reports.png"/>
<title>Top Coat Daily Actual</title>
<?php 
require_once('calendar/calendar/classes/tc_calendar.php');
	date_default_timezone_set('Asia/Colombo');
	session_start();
	include("database_connections.php");

	error_reporting(0);
	$plan_date=$_GET['p_date'];
	if($plan_date != ''){
		$today= $plan_date;
	} 
	else{
		$today = date("Y-m-d");
		
	}
	
	$today_n=date("Y-m-d");
	
	
	
	
	
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
			$design=isset($_REQUEST["design".$x]) ? $_REQUEST["design".$x] : "";
			$lot=isset($_REQUEST["lot".$x]) ? $_REQUEST["lot".$x] : "";
			$qty=isset($_REQUEST["qty".$x]) ? $_REQUEST["qty".$x] : "";
			
			
			
			
			
			
			if(isset($_POST['prio_1'.$x])) {
				
				//print("insert into tbl_top_coat_plan  (pro_no,p_date,order) values  ('$pro_no','$plan_date_fix','$order') ");exit;
				$belt=mysqli_query($con,"insert into tbl_top_coat_plan  (pro_no,p_date,design,lot,qty,order_no,date) values  ('$pro_no','$plan_date_fix','$design','$lot','$qty','$order','$today_n') ")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
			header("Location:Top_coat_plan_actual_report.php?p_date=$plan_date_fix");
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
				
				//print("delete from tbl_top_coat_plan  where id='$tempid_2'");exit;
				$belt=mysqli_query($con,"delete from tbl_top_coat_plan  where id='$tempid_2'")or die("insert_err4");
			} 
			else{
				//$sqlreport=mysqli_query($con,"update tbl_virtual_plan_decoration_final_data_temp a set a.is_priority='0' where id='$tempid_1'");
			}
			
		}
		
		header("Location:Top_coat_plan_actual_report.php?p_date=$plan_date_fix");
	}
	
	if(isset($_POST['btnprio_4']))
	{
		$plan_date=isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";
		
		
		header("Location:Top_coat_plan_actual_report.php?p_date=$plan_date");
	}
	
	
	if(isset($_POST['btnchange']))
	{
		
			//print(331231);exit;
		$count_2=isset($_REQUEST["count_2"]) ? $_REQUEST["count_2"] : "";
		$plan_date_fix=$today;
		
		$count_2=10000;
		
		for ($x = 1; $x <= $count_2; $x++) {
			$updateid_2=isset($_REQUEST["tempid_2_".$x]) ? $_REQUEST["tempid_2_".$x] : "";
			$order_no=isset($_REQUEST["order_no_2".$x]) ? $_REQUEST["order_no_2".$x] : "";
			
			//print($plan_date);exit;
	
	
			$belt=mysqli_query($con,"update tbl_top_coat_plan a set  a.order_no='$order_no' 
			where a.id='$updateid_2'")or die("insert_err4");
			
			
		}
		
		
		header("Location:Top_coat_plan_actual_report.php?p_date=$plan_date_fix");
	}
	
	if(isset($_POST['btnpri']))
	{		
		
		//print(12312312);exit;
		$plan_date_fix=$today;
		//print($plan_date_fix);exit;
		header("Location:Top_coat_plan_print.php?p_date=$plan_date_fix");
	}

if(isset($_POST['btnfin']))
	{		
		
		
		$plan_date_fix=$today;
		$today_now=date("Y-m-d");
		$today_now_time=date("h:i:s");
		//print($today_now_time);exit;
		mysqli_query($con,"DELETE from  screen_planner_final_tbl  WHERE date_spft='$plan_date_fix'
		AND machine_no_spft ='Top-Coat'")or die("insert_err4");
		
		mysqli_query($con,"INSERT INTO screen_planner_final_tbl   

(SELECT '','','',a.design,a.pro_no,a.lot,'Top-Coat',b.item04_ct,'Top-Coat',a.p_date,'-','23.59'
,'-','-','-',a.qty,'-','-','-','0','-','-','-','-','-','amilak','$today_now','$today_now_time' FROM tbl_top_coat_plan a
LEFT JOIN colours_tbl b ON a.design=b.pattern_no_ct
 WHERE a.p_date ='$plan_date_fix' AND b.colours_name_ct='TOP-COAT')")or die("insert_err4");
	}	
	
	
	
	
?>



<?php
	
	
?>



<?php  error_reporting (E_ALL ^ E_NOTICE); ?>
<title>:: Noritake - Top Coat Daily Actual ::</title>
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
	background-image: url("images/bk-r.jpg");
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
		window.location.replace("production_plan_edit_snk.php?type="+type);
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
				<td align="center" style="color:#36a2ef;font-size: -webkit-xxx-large;"><H3>Top Coat Daily Actual</H3></td>
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
					<td><?php print $today; ?></td>		
					<td align="left">
						<input type="hidden" onclick="final_data()" class="button button2"  Value="Finalize" style="color:#ffffff; width: 300; height: 30;" />
						
						
					</td>
					
					<td></td>
				</tr></table>
			<table width="800" height="100" border="0" align="center">
				
				<tr valign="top" >
					<td width="120" >
						<table width="120" height="75" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								
								<td colspan="12"  width="120" height="25" align="center" valign="middle" bgcolor="#004848" class="style15">Top Daily Actual </td>
								
							</tr>
							<tr class="style13">
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">No</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Pro No</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Design</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Lot</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Plan Date</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Actual Date</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Actual Time</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Plan Qty</td>
								<td width="10" height="25" align="left" valign="middle" bgcolor="#004848" class="style15">Actual Qty</td>
							</tr>  
							
							<tr class="tcday">
								
								</tr> <?php 
								include("database_connections.php");
								
								$query_1 =mysqli_query($con,"SELECT * FROM top_coat_printing_tbl a LEFT JOIN tbl_top_coat_plan b
ON a.pro_no_tcpt=b.pro_no WHERE a.org_date_tcpt='$today' ORDER BY a.org_time_tcpt ");
								
								$count_1=0;
								while($a_1=mysqli_fetch_array($query_1))
								{
									
								?>
								<tr class="style13" <?php if($a_1['reset']=='1'){ ?> bgcolor="#CCFFFF"<?php }?>>
									
									<td width="10" align="right" valign="middle"  > 
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
										
									value="<?php print $a_1['pro_no_tcpt'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="design<?php print $count_1 ?>"class="input3" id="design<?php print $count_1 ?>"
										
									value="<?php print $a_1['pattern_no_tcpt'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="lot<?php print $count_1 ?>"class="input3" id="lot<?php print $count_1 ?>"
										
									value="<?php print $a_1['lot_no_tcpt'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="qty<?php print $count_1 ?>"class="input3" id="qty<?php print $count_1 ?>"
										
									value="<?php print $a_1['p_date'];?>" readonly ></td>
									
									
									<td valign="middle" width="48" >
										<input name="qty<?php print $count_1 ?>"class="input3" id="qty<?php print $count_1 ?>"
										
									value="<?php print $a_1['org_date_tcpt'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="qty<?php print $count_1 ?>"class="input3" id="qty<?php print $count_1 ?>"
										
									value="<?php print $a_1['org_time_tcpt'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="qty<?php print $count_1 ?>"class="input3" id="qty<?php print $count_1 ?>"
										
									value="<?php print $a_1['qty'];?>" readonly ></td>
									
									<td valign="middle" width="48" >
										<input name="qty<?php print $count_1 ?>"class="input3" id="qty<?php print $count_1 ?>"
										
									value="<?php print $a_1['item01_tcpt'];?>" readonly ></td>
									
									
									
									<!---
										<td>
										<input type="button" onclick="Drop_1(<?php print $count_1 ?>)" class="button button3"  Value="Drop" style="color:#ffffff; width: 100; height: 30;" />
										
										
										</td>
									-->
									
									
									
									
									
									
								</tr>
								<tr class="report_font">
									<td height="1" colspan="2" valign="top" bgcolor="#FFFFFF" class="style16">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/line.png" width="100%" height="1"></td>
								</tr> 
								
								
								
							<?php }?>
							
							
							
							<td align="right" valign="middle"  class="">
								<input name="count" class="input3"id="count"					
							value="<?php print $total_received_m;?>" readonly   ></td>
							
						</tr>
						
						
						
						<tr>
							<td valign="middle" nowrap class="tdinfo">
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
						
					</table>
					
				</td>
				
				
			
			
		</tr>
		
		
		
		
		
	</table>
	
</tr>





</table>













</form>
<p>
	
</p>
<p>&nbsp; </p>
<p>&nbsp; </p>
<?php
}


<?php
	session_start();
	error_reporting(0);
	
	if(isset($_GET['type']))
	{
		$type=$_GET['type'];
		$_SESSION['type']=$_GET['type'];
	}
	else
	{
		$type="id";
		$_SESSION['type']=$_GET['type'];
	}
	
	if(isset($_GET['sdate']))
	{
		$sdate=$_GET['sdate'];
		
	}
	
	
	
	if(isset($_GET['sdate']))
	{
		if (strpos($datetime, '-') !== false) {
			$_SESSION['sdate']=str_replace("-","",$_GET['sdate']);
		}
		else{
			$_SESSION['sdate']=$_GET['sdate'];
			
		}
		
		
		$table="plan_".$_SESSION['sdate'];
	}
	if(isset($_SESSION['sdate']))
	{
		
		$table="plan_".$_SESSION['sdate'];
	}
	else
	{
		$_SESSION['sdate']=str_replace("-","",date("d/m/Y"));
		$table="plan_".$_SESSION['sdate'];	
	}
	
	
	
	
	
	include("database_connections.php");
	
	
	
	if(isset($_GET['mode']))
	{
		$mode=$_GET['mode'];
		
	}
	
	if($mode =='final'){
		
		$delete=mysqli_query($conn,"delete from virtual_planner_final_tbl_excel where Plan_date='$sdate' ");
		
		$insert=mysqli_query($conn,"INSERT INTO virtual_planner_final_tbl_excel select '',Time, Start_date, End_date, Pro_no, Design,Lot,No_of_colour,Qty,remark,Plan_colour,close,
		Time_t,Change_over,Plan_print,Plan_date,M_no
		from virtual_planner_final_tbl_excel_f ") ;
		
	}
	else {
		
		if($sdate != null){
			
			if($mode =='start'){
				$result=mysqli_query($conn,"SELECT `Plan_date` FROM `virtual_planner_final_tbl_excel` group by `Plan_date` ")or die('err');  
				while ($row = mysqli_fetch_row($result)) {
					$t_plan  = $row[0];
					
				}
				//print($sdate);exit;
				if(1){
					//print($sdate);exit;
					$truncate=mysqli_query($conn,"TRUNCATE TABLE virtual_planner_final_tbl_excel_f");
					
					$insert=mysqli_query($conn,"INSERT INTO virtual_planner_final_tbl_excel_f  select *
					from virtual_planner_final_tbl_excel  where Plan_date='$sdate' ORDER BY id ASC") ;			
				}
				
				
			}
			
			else{

				$truncate=mysqli_query($conn,"TRUNCATE TABLE virtual_planner_final_tbl_excel_f_sort");
				$insert=mysqli_query($conn,"INSERT INTO virtual_planner_final_tbl_excel_f_sort select *
				from virtual_planner_final_tbl_excel_f ORDER BY $type ASC") ;
				
				$truncate=mysqli_query($conn,"TRUNCATE TABLE virtual_planner_final_tbl_excel_f");
				$insert=mysqli_query($conn,"INSERT INTO virtual_planner_final_tbl_excel_f select *
				from virtual_planner_final_tbl_excel_f_sort   ORDER BY $type ASC") ;
				
				
				
			}
		}
		
		
	}
	
	
	
	
	
	
	/*
		
		
		$query06 = mysql_query("select DISTINCT design FROM item_master") or die ("err1");
		$pattern=array();
		
		while($row06 = mysql_fetch_array($query06)) {
		$pattern[] = array($row06[0]) ;
		}
		$pattern = json_encode ($pattern);	
		
		$pattern=str_replace("[","",$pattern);
		$pattern=str_replace("]","",$pattern);
		$pattern="[".$pattern."]";
		
		$query07 = mysql_query("select DISTINCT item FROM item_master") or die ("err2");
		$item=array();
		
		while($row07 = mysql_fetch_array($query07)) {
		$item[] = array($row07[0]) ;
		}
		$item = json_encode ($item);	
		
		$item=str_replace("[","",$item);
		$item=str_replace("]","",$item);
		$item="[".$item."]";
		
	*/
	
	
	
?>
<style type="text/css">
		
		body{
		background-image: url("../../images/virbak.jpg"), url("paper.gif");
		background-color: #cccccc;
		}
	</style>

<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>DECSYS-Daily Plan :: PLAN ::</title>
		<style type="text/css">
			.city {border: none;
			}
		</style>
		
		<script type="text/javascript" src="../../jqwidgets/jquery-1.7.1.min.js"></script>
		<script src="js/jquery-latest.js"></script>
		
		<script>
			$(document).ready(function(){
				setInterval(function() {
					
					$("#latestData").load("getTable.php");
				}, 50);
				
				var s = $("#sticker");
				var pos = s.position();                   
				$(window).scroll(function() {
					var windowpos = $(window).scrollTop();
					s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
					if (windowpos >= pos.top) {
						s.addClass("stick");
						} else {
						s.removeClass("stick");
					}
				});
				
			});
			
		</script>
		
		
		<style>
			#nav ul li {
			background-color: #59FF19;
			border: 1px solid #000000;
			margin: 0;
			padding: 3px 7px;
			position: relative;
			}
			
			.city {
			border: none;
			}
			
		</style> 
		<link rel="stylesheet" href="../../css/jquery-ui.css" />
		
		<script src="../../js/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<script>
			$(function() {
				$( "#datepicker" ).datepicker();
			});
			document.country="";
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
				eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
				if (restore) selObj.selectedIndex=0;
			}
		</script> 
		<script src="../lib/jquery.min.js"></script>
		<script src="../dist/jquery.handsontable.full.js"></script>
		<link rel="stylesheet" media="screen" href="../dist/jquery.handsontable.full.css">
		
		
		<script src="js/samples.js"></script>
		<script src="js/highlight/highlight.pack.js"></script>
		
		
		
		<script src="js/ga.js"></script>
		<style type="text/css">
			#b1, #b2, #b3 {
			display: none;
			}
			
			.stick {
			position:fixed;
			top:0px;
			}
			#left {
			width: 1150px;
			
			}
			#right {
			margin-left: 1150px;
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			
			}
			
			.myButton {
			
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
			background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
			
			background-color:#e00d2a;
			
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			
			display:inline-block;
			color:#ffffff;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:5px 5px;
			text-decoration:none;
			
			text-shadow:0px 1px 0px #3d768a;
			
			}
			.myButton:hover {
			
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
			background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
			
			background-color:#408c99;
			}
			.myButton:active {
			position:relative;
			top:1px;
			}
			.myButton2 {
			
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fa1105), color-stop(1, #408c99));
			background:-moz-linear-gradient(top, ##fa1105 5%, #408c99 100%);
			background:-webkit-linear-gradient(top, ##fa1105 5%, #408c99 100%);
			background:-o-linear-gradient(top, ##fa1105 5%, #408c99 100%);
			background:-ms-linear-gradient(top, ##fa1105 5%, #408c99 100%);
			background:linear-gradient(to bottom, ##fa1105 5%, #408c99 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='##fa1105', endColorstr='#408c99',GradientType=0);
			
			background-color:#fa1105;
			
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			
			display:inline-block;
			color:#ffffff;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:5px 5px;
			text-decoration:none;
			
			text-shadow:0px 1px 0px #3d768a;
			
			}
			.myButton2:hover {
			
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #009999));
			background:-moz-linear-gradient(top, #408c99 5%, #009999 100%);
			background:-webkit-linear-gradient(top, #408c99 5%, #009999 100%);
			background:-o-linear-gradient(top, #408c99 5%, #009999 100%);
			background:-ms-linear-gradient(top, #408c99 5%, #009999 100%);
			background:linear-gradient(to bottom, #408c99 5%, #009999 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
			
			background-color:#009999;
			}
			.myButton2:active {
			position:relative;
			top:1px;
			}
		</style>
		
		<script src="../dist/jquery.handsontable.full.js"></script>
		<script src="../lib/jquery-ui/js/jquery-ui.custom.min.js"></script>   
		<link rel="stylesheet" href="css/jquery-ui.css" />
		
		<link rel="stylesheet" href="css/style.css" />
		
		<link rel="stylesheet" media="screen" href="../dist/jquery.handsontable.full.css">
		<link rel="stylesheet" media="screen" href="../lib/jquery-ui/css/ui-bootstrap/jquery-ui.custom.css">  
		
	</head>
	
	<body> 
		<?php
			
			//print(123);exit;
			
		?></p> 
		
		<form name="form1" method="post" action="">
			<span class="cell_color">Date:
				<select name="sdate" id="sdate" onChange="MM_jumpMenu('parent',this,0)">
					<option selected value="">-select-</option>
					
					<?php
					
					//print("SELECT `date_vtst` FROM `virtua_time_store_tbl` group by `date_vtst`");exit;
						$result=mysqli_query($conn,"SELECT `date_vtst` FROM `virtua_time_store_tbl` group by `date_vtst` ")or die('err');  
						while ($row = mysqli_fetch_row($result)) {
							
							echo "<option value=plan.php?mode=start&type=id&sdate=".substr($row[0],0).">.".substr($row[0],0)."</option>"; 
						}
						if(isset($_GET['sdate']))
						{ 
							echo "<option value=plan.php?mode=start&type=d&sdate=".$_GET['sdate']." selected>.".$_GET['sdate']."</option>"; 
						}
					?>
				</select>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href ='plan.php?type=machine_no_vtst&sdate=<?php print $sdate ?>' class="myButton" onclick= "var result = confirm('really?'); if (result==true) return true; else return false;">Sort Machine</a>
			
			<a href ='plan.php?type=o_id&sdate=<?php print $sdate ?>&mode=final' class="myButton2" onclick= "var result = confirm('really?'); if (result==true) return true; else return false;">Finalized</a>
			
			
			
			
			
		</form>
		<div id="left">
			<div id="container">
				<div class="columnLayout">
					
					<div class="rowLayout">
						<div class="descLayout"><h2><center>
							<p> DAILY PLAN  Printing - <?php 
							
								
								if(isset($_POST['sdate']))
								{
									
									echo $_POST['sdate'];
								}
								else if(isset($_SESSION['sdate']))
								{
									
									echo $edate=date( "Y-m-d", strtotime($_SESSION['sdate']) );
								}
								else
								{
									echo date("Y-m-d");	
								}
								
								
								
								
							?></center></h2>
							
							<?php  //include("links.php"); ?>  
							
							
						</div>
						</div>
						
						<div class="rowLayout">
							<div class="descLayout">
								<div class="pad">
									
									
									
									<button name="save" style="visibility:hidden">Save</button>
									<label><input type="checkbox" name="autosave" checked="checked" autocomplete="off" style="visibility:hidden">  </label><button name="load"  style="visibility:hidden" >Load</button>
									
									
									<div id="exampleConsole" class="console"> <font color="#006699"><b>Loading....</b></font> </div><p>
										
										<div id="example1"></div>
										
										<p>
											
										</p>
									</div>
								</div>
								
								
								<div class="pad">
									<script>
									
										var deco = function (instance, td, row, col, prop, value, cellProperties) {
											Handsontable.TextCell.renderer.apply(this, arguments);
											$(td).css({
												background: '#F0F8FF'
											});
										};
										
										var plan = function (instance, td, row, col, prop, value, cellProperties) {
											Handsontable.TextCell.renderer.apply(this, arguments);
											$(td).css({
												background: '#FFF2F2'
											});
										}
										
										var getData = (function () {
											
											
											return function () {
												var page  = parseInt(window.location.hash.replace('#', ''), 10) || 1
												, limit = 6
												, row   = (page - 1) * limit
												, count = page * limit
												, part  = [];
												
												for(;row < count;row++) {
													part.push(data[row]);
												}
												
												return part;
											}
										})();
										
										
										
										var $container = $("#example1");
										var $console = $("#exampleConsole");
										var $parent = $container.parent();
										var autosaveNotification;
										
										$container.handsontable({
											
											
											colWidths: [50,100, 100, 50, 80, 30, 50, 50,50, 30,50,50, 50,50, 100,80],
											startRows: 8,
											startCols: 12,
											rowHeaders: true,
											colHeaders: [ 'Time','Start date','End date', 'Pro no', 'Design', 'Lot', 'No of colour', 'Qty','Remark','Plan colour','Close','Time Total', 'Change over','Plan print','Plan Date','Machine'],
											
											
											minSpareCols: 0,
											minSpareRows: 1, 
											contextMenu: true,
											
											
											
											columns: [
											
											{// 1 
												
												
												
											},
											{ //2
												type: 'date',
												dateFormat: 'yy-mm-dd' ,
												
												
											},
											{
												//3
												type: 'date',
												dateFormat: 'yy-mm-dd' ,
												
											},
											{
												//4
												
												
											},
											{
												//5
												
												
											},
											{
												
												
											},
											{
												
												//7  
												type: 'date',
												dateFormat: 'yy-mm-dd' ,
											},
											{
												
											}
											,
											{
												
											},
											{
												
											},
											{
												
											},
											{
												
											},
											{
												
											},
											{
												
											},
											{
												
											},
											{
												
											}
											
											
											],
											
											
											
											onChange: function (change, source) {

												if (source === 'loadData') {
													return; //don't save this change
												}
												if ($parent.find('input[name=autosave]').is(':checked')) {
													clearTimeout(autosaveNotification);
													
													var type = "<?php print $type ?>"; 
													
													
													$.ajax({
														url: "php/save_chit_T.php",
														dataType: "json",
														type: "POST",
														data:{'changes':change}, //contains changed cells' data
														success: function (data) {console.log(change);
															$console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');
															autosaveNotification = setTimeout(function () {
																$console.text('Changes autosaved');
															}, 1000);
														}
													});
												}
											}
											
										});
										
										
										
										
										var handsontable = $container.data('handsontable');
										
										$parent.find('button[name=load]').click(function () {
											$.ajax({
												url: "php/load_chit_t.php",
												dataType: 'json',
												type: 'GET',
												success: function (res) {console.log(res);
													var data = [], row;
													for (var i = 0, ilen = res.daily_plan.length; i < ilen; i++) {
														row = [];
														var num=i+1;
														
														row[0] = res.daily_plan[i].Time ;
														row[1] = res.daily_plan[i].Start_date;
														
														row[2] = res.daily_plan[i].End_date;
														row[3] = res.daily_plan[i].Pro_no;
														
														row[4] = res.daily_plan[i].Design;
														row[5] = res.daily_plan[i].Lot;
														
														row[6] = res.daily_plan[i].No_of_colour;
														row[7] = res.daily_plan[i].Qty ;
														row[8] = res.daily_plan[i].remark;
														row[9] = res.daily_plan[i].Plan_colour;
														row[10] = res.daily_plan[i].close;
														row[11] = res.daily_plan[i].Time_t;
														
														row[12] = res.daily_plan[i].Change_over ;
														row[13] = res.daily_plan[i].Plan_print ;
														row[14] = res.daily_plan[i].Plan_date ;
														row[15] = res.daily_plan[i].M_no ;
														
														
														
														data[num - 1] = row;
													}
													
													handsontable.loadData(data);
													$console.text('Data loaded');
												}
											});
										}).click(); //execute immediately
										
										$parent.find('button[name=save]').click(function () {
											$.ajax({
												url: "php/save_chit_T.php",
												data: {"data": handsontable.getData()}, //returns all cells' data
												dataType: 'json',
												type: 'POST',
												success: function (res) {
													if (res.result === 'ok') {
														$console.text('Data saved');
													}
													else {
														$console.text('Save error');
													}
												},
												error: function () {
													$console.text('Save error');
												}
											});
										});
										
										$parent.find('input[name=autosave]').click(function () {
											if ($(this).is(':checked')) {
												$console.text('Changes will be autosaved');
											}
											else {
												$console.text('Changes will not be autosaved');
											}
										});
										
										
										
									</script>
									
								</div>
							</div>
							
							
							
						</div>
					</div> 
				</div>
				<div id="right">
					<div id = "latestData" style="overflow:scroll;" ></div> 
					
				</div>
				
			</td>
		</tr>
</table>

</body>
</html>
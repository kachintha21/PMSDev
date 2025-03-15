<?php
	session_start();
	
	error_reporting(0);
	
	include("database_connections.php");
	//print(123);exit;
	
	if(isset($_POST['filter']))
	{		//$_POST['pro_no']=''
		$where = "aaa.rem2>0"; 
		if($_POST['design']!=NULL) { $where .=" AND aaa.desing_no_lpt='".$_POST['design']."'";  }
		if($_POST['pro_no']!=NULL) {   $where.=" AND aaa.pro_no_lpt='".$_POST['pro_no']."'"; }
		if($_POST['lot']!=NULL) {   $where.=" AND aaa.lot_no_lpt='".$_POST['lot']."'"; }
		if($_POST['curve']!=NULL) {   $where.=" AND aaa.curve_no_lpt='".$_POST['curve']."'"; }
		
		//print($where);exit;
		
	}
?>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script src="../../js/jquery-1.9.1.js"></script>
<script src="../../js/jquery-ui.js"></script>

<link rel="stylesheet" href="../..//resources/demos/style.css" />
<style>
	body {
	padding:0;
	margin:0 2px;
	background-image: url("images/bk-r.jpg");
	background-color: #cccccc;
	}
	.CSSTableGenerator {
	margin:0px;padding:0px;
	width:1100;
	
	border:0px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
	}.CSSTableGenerator table{
	width:1100;
	
	margin:0px;padding:0px;
	}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	}
	.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
	}
	.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	}.CSSTableGenerator tr:hover td{
	background-color:#C7E0D9;
	}
	.CSSTableGenerator tr:nth-child(odd){
	
	}
	.CSSTableGenerator tr:nth-child(even)    { }.CSSTableGenerator td{
	vertical-align:middle;
	
	border-width:0px 1px 1px 0px;
	text-align:right;
	padding:3px;
	font-size:14px;
	font-family:Calibri;
	font-weight:normal;
	color:#000000;
	}.headng {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	
	text-decoration: underline;
	}
	.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
	}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
	}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
	}
	.CSSTableGenerator tr:first-child td{
	
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Calibri;
	
	color:#000000;
	}
	
	.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
	}
	.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
	}
	.class1{ background-color:#CCE5FF; }
	.class2{ background-color:#FFE5CC; }
	.class3{ background-color: #FFFFCC; }
	.class4{ background-color:#F0FFFF; }
	.class5{ background-color:#CCFFCC; }
	.class6{ background-color:#CCFFFF; }
	.class7{ background-color:#CCE5FF; }
	.class8{ background-color:#E6F0EB; }
	.class9{ background-color:#FFF8DC; }
	.class10{ background-color:#FFF0F5; }
	tr:hover, tr:hover   {
background:#C7E0D9; }</style>



<script>
	
	$(function() {
		
		$( "#from" ).datepicker({
			dateFormat: 'yy-mm-dd',
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onClose: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			dateFormat: 'yy-mm-dd',
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onClose: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		
	});
</script>


<script type="text/javascript">
	
	function exportTableToExcel(tableID, filename = '') {
		
		/* Get the HTML data using Element by Id */
		var table = document.getElementById("tblData");
		
		/* Declaring array variable */
		var rows =[];
		
		//iterate through rows of table
		for(var i=0,row; row = table.rows[i];i++){
			//rows would be accessed using the "row" variable assigned in the for loop
			//Get each cell value/column from the row
			column1 = row.cells[0].innerText;
			column2 = row.cells[1].innerText;
			column3 = row.cells[2].innerText;
			column4 = row.cells[3].innerText;
			column5 = row.cells[4].innerText;
			column6 = row.cells[5].innerText;
			column7 = row.cells[6].innerText;
			column8 = row.cells[7].innerText;
			column9 = row.cells[8].innerText;
			column10 = row.cells[9].innerText;
			column11 = row.cells[10].innerText;
			column12 = row.cells[11].innerText;
			column13 = row.cells[12].innerText;
			column14 = row.cells[13].innerText;
			
			
			
			
			/* add a new records in the array */
			rows.push(
            [
			column1,
			column2,
			column3,
			column4,
			column5,
			column6,
			column7,
			column8,
			column9,
			column10,
			column11,
			column12,
			column13,
			column14
            ]
			);
			
		}
        csvContent = "data:text/csv;charset=utf-8,";
		/* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
		});
		
        /* create a hidden <a> DOM node and set its download attribute */
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "Printing_WIP.csv");
        document.body.appendChild(link);
		/* download the data file named "Stock_Price_Report.csv" */
        link.click();
	}
</script>



<td width="30%" valign="top">
	<a href="/PMSDev/view/index.php" >
		<img src="images/home.png"  width="40" height="40"  /> Home
	</a>
</td>

<p><font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="3px">
	<form id="form1" name="form1" method="post" >
		
		<label>Design : </label>
		<label for="design"></label>
		<input name="design" type="text" id="design" size="10" maxlength="10" value="<?php if(isset($_POST['design']))echo   $_POST['design']; ?>" />
		Curve :
		<input name="curve" type="text" id="curve" size="10" maxlength="10"  value="<?php if(isset($_POST['curve']))echo   $_POST['curve']; ?>" />
		Lot :
		<input name="lot" type="text" id="lot" size="10" maxlength="10"  value="<?php if(isset($_POST['lot']))echo   $_POST['lot']; ?>" />
		Production No :
		<input name="pro_no" type="text" id="pro_no" size="10" maxlength="10"  value="<?php if(isset($_POST['pro_no']))echo   $_POST['pro_no']; ?>" />
		<input type="submit" name="filter" id="filter" value="Search" />
	</label>
	&nbsp;&nbsp;&nbsp;
	<input type="button" value="Reset" onclick="javascript:window.location.href='WIP_Summary.php'" />
</form>
<p>
	<?php
		
		
		
		if(isset($_POST['filter']))
		{
			
		?> 
		
		<center> <font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="6px"><u> Printing WIP Summary
		</u></font></center> 
		
		<p>
			<center>  
				<div class="CSSTableGenerator" align="center" >
					<li>
						<a href="javascript:;" onclick="exportTableToExcel('tblData')">
						Export to Excel </a>
					</li>
					
					<table width="1049" height="82" border="1" cellpadding="0" cellspacing="0" class="display" align="center" id="tblData" >
						<tr>
							<td  width="61">Production No</td>
							<td  width="61">Factory Code</td>
							<td width="61">Design</td>
							<td width="61">Lot</td>
							<td width="61">Curve</td>
							<td width="61">Curves Per Sheet</td>
							<td width="64">Planned Sheets</td>
							<td width="64">Actual Sheets</td>
							<td width="64">No Of Clours</td>
							<td width="61">Current Stage</td>
							<td width="61">Last Stage</td>
							<td width="61">Last Update Date</td>
							<td width="61">Decal Finished Date</td>
							<td width="64">Top Coat Plan Date</td>
							<td width="64">QC Plan Date</td>
							<td width="64">Ins. & Cut. Date</td>
						</tr> 
					</thead>
					<?php
						
						
						
						
						$result1 =mysqli_query($con,"
						select * from (select *,(case when (aa.t is null) then aa.plan_n else aa.plan_n- aa.t - aa.def  end) AS `rem2` from (SELECT *, 
						(case when (t is null) then planned_qty_lpt else `planned_qty_lpt`- t - def end) AS `rem`,
						(case when (close_curve_after_lpt > '0') then close_curve_after_lpt else planned_qty_lpt end) AS `plan_n` 
						
						FROM layout_plans_tbl a left join (SELECT SUM(c.item01_dt)As t ,SUM(c.register_dt)As def ,c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt 
						FROM dinspection_tbl c  group by c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt ) b 
						on a.pro_no_lpt=b.pro_no_dt and a.curve_no_lpt = b.curve_no_dt and a.decal_no_lpt = b.decal_pattern_dt
						where a.item05_lpt != '1') aa) aaa 
						left join (SELECT `ref_no_plt`,`item01_plt` FROM `preparing_layout_tbl` group by `ref_no_plt`) bbb
						on aaa.`pro_no_lpt` =bbb.ref_no_plt
						LEFT JOIN preparing_layout_tbl  ccc
						on aaa.`pro_no_lpt` =ccc.ref_no_plt 
						
						where $where  GROUP BY `aaa`.`pro_no_lpt`
						ORDER BY `aaa`.`pro_no_lpt`  " ); 
						
						while ($a2 = mysqli_fetch_array($result1)) { 							
							//print(123);exit;
							
							$stock_in2+=$a2['stock_in'];
							$stock_out2+=$a2['stock_out'];
							$chit_no=$a2['chit_no'];
							
							
							
						?>
						<tr onMouseOver="style.backgroundColor='#84DFC1'"  onmouseout="style.backgroundColor=''" >
							<!-- <td valign="middle" class="tdinfo" hidden><?php
								
								//print $fdate=$a2['item01_plt'];
							?></td>
							-->
							<td valign="middle" class="tdinfo" ><a href="WIP_Visualize.php?pro_no=<?php print $a2['pro_no_lpt']?>"><?php
								
								print $pro_no=$a2['pro_no_lpt'];
							?></td>
							<td valign="middle" class="tdinfo"><?php
								$factory_plt=$a2['factory_plt'];
								print $factory_plt=$a2['factory_plt'];
							?></td>
							<td valign="middle" class="tdinfo"><?php
								$design_p=$a2['desing_no_lpt'];
								print $design=$a2['decal_no_lpt'];
							?></td>
							<td valign="middle" class="tdinfo"><?php
								
								print $lot=$a2['lot_no_lpt'];
							?></td>
							
							<td valign="middle" class="tdinfo"><?php
								
								print $curve=$a2['curve_no_lpt'];
							?></td>
							
							<?php
								
								$curves_per_sheet_qry =mysqli_query($con,"SELECT a.no_of_curves_lpt FROM layout_plans_tbl a WHERE a.pro_no_lpt='$pro_no'
								AND a.curve_no_lpt ='$curve' limit 1") or die ("error3"); 
								
								if(mysqli_num_rows($curves_per_sheet_qry)>0){
									while($curves_per_sheet_row=mysqli_fetch_array($curves_per_sheet_qry))
									{
										$curves_per_sheet = $curves_per_sheet_row[0];
										print "<td>".$curves_per_sheet."</td>";
									}	
								}
								else{
									print "<td>"."-"."</td>";
								}
								
								
								
								$sheet_qry =mysqli_query($con,"SELECT a.number_sheet_plt,a.printing_plt FROM preparing_layout_tbl a WHERE a.pro_no_plt='$pro_no'") or die ("error3"); 
								
								
								if(mysqli_num_rows($sheet_qry)>0){
									while($sheet_row=mysqli_fetch_array($sheet_qry))
									{
										$plan_sheet = $sheet_row[0];
										$act_sheet = $sheet_row[1];
										print "<td>".$plan_sheet."</td>";
										print "<td>".$act_sheet."</td>";
									}	
									
								}
								else{
									print "<td>"."-"."</td>";
									print "<td>"."-"."</td>";
								}
								
								
								$no_of_colours_qry =mysqli_query($con,"SELECT a.* FROM colours_tbl a WHERE a.pattern_no_ct='$design_p'
								AND a.colours_code_ct NOT LIKE 'T%'
								GROUP BY a.colours_code_ct") or die ("error3"); 
								
								if(mysqli_num_rows($no_of_colours_qry)>0){
									$no_of_colours = mysqli_num_rows($no_of_colours_qry);
									print "<td>".$no_of_colours."</td>";
								}
								else{
									print "<td>"."-"."</td>";
								}
								
								
								
								
								
								
								$current_stage_qry =mysqli_query($con,"SELECT a.plan_colors_vpft FROM virtual_planner_final_tbl a WHERE a.imp_actual_vpft=''
								AND a.pro_no_vpft='$pro_no' ORDER BY id LIMIT 1") or die ("error3"); 
								
																
								if(mysqli_num_rows($current_stage_qry)>0){
									
									while($current_stage_row=mysqli_fetch_array($current_stage_qry))
									{
										$current_stage = $current_stage_row[0];
										//print "<td>".$current_stage."</td>";
										
										
										if($current_stage == 'S01'){
											print "<td>".("Not Start")."</td>";
											print "<td>".("Not Start")."</td>";
										}
										else{
											
											$current_stage_temp =  substr($current_stage, 1);
											//$current_stage_no =  $current_stage_temp - 1;
											$current_stage_temp = -- $current_stage_temp;
											$current_stage_temp = str_pad($current_stage_temp,2, '0', STR_PAD_LEFT);
											$pre_ref = "S".$current_stage_temp;											
											
											
											$current_stage_qry3 =mysqli_query($con,"SELECT  a.item01_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' 
											AND a.plan_colors_vpft='$pre_ref' ORDER BY id LIMIT 1  ") or die ("error3"); 
											
											if(mysqli_num_rows($current_stage_qry3)>0){
												while($current_stage_row3=mysqli_fetch_array($current_stage_qry3))
												{
													$current_stage_2 = $current_stage_row3[0];
													print "<td>".$current_stage."</td>";
													print "<td>".$pre_ref."</td>";
													print "<td>".$current_stage_2."</td>";
													//print "<td>".("Plan 1")."</td>";
													//print "<td>".("Plan 2")."</td>";
												}
											}
											else{
											
												print "<td>".("Plan Incomplete")."</td>";
												print "<td>".("Plan Incomplete")."</td>";
												
											}
											
											
										}
										
									}
								}
								else{
									
									$current_stage_qry2 =mysqli_query($con,"SELECT a.plan_colors_vpft FROM virtual_planner_final_tbl a WHERE a.imp_actual_vpft !=''
									AND a.pro_no_vpft='$pro_no' ORDER BY id LIMIT 1") or die ("error3"); 
									
									if(mysqli_num_rows($current_stage_qry2)>0){
										
										$current_stage_qry4 =mysqli_query($con,"SELECT  * FROM qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' ORDER BY id LIMIT 1 ") or die ("error3"); 
										
										if(mysqli_num_rows($current_stage_qry4)>0){
											
											$current_stage_qry6 =mysqli_query($con,"SELECT a.date FROM tbl_top_coat_plan a WHERE a.pro_no='$pro_no' ORDER BY id LIMIT 1  ") or die ("error3"); 
											
											if(mysqli_num_rows($current_stage_qry6)>0){
												
												while($current_stage_row6=mysqli_fetch_array($current_stage_qry6))
												{
													$top_coat_plan_date = $current_stage_row6[0];
													
												}
												
												
												$current_stage_qry7 =mysqli_query($con,"SELECT a.org_date_tcpt FROM top_coat_printing_tbl a WHERE a.pro_no_tcpt='$pro_no' ORDER BY id LIMIT 1  ") or die ("error3"); 
												
												if(mysqli_num_rows($current_stage_qry7)>0){
													
													while($current_stage_row7=mysqli_fetch_array($current_stage_qry7))
													{
														$top_act_date = $current_stage_row7[0];
														
														$current_stage_qry9 =mysqli_query($con,"SELECT a.org_date_qc,a.reject_items_qc FROM qc_qc_approval_tbl a WHERE a.pro_no_qc='$pro_no'  ") or die ("error3"); 
														
														if(mysqli_num_rows($current_stage_qry9)>0){
															
															while($current_stage_row9=mysqli_fetch_array($current_stage_qry9))
															{
																$qc_act_date = $current_stage_row9[0];
																$qc_status = $current_stage_row9[1];
																
																if($qc_status == 'Conditional-Pass'){
																	
																	$qc_print_status = "QC Conditional-Pass";
																}
																else if($qc_status == 'Pass'){
																	
																	$qc_print_status = "QC Pass";
																}
																else if($qc_status == 'Pending'){
																	
																	$qc_print_status = "QC Pending";
																}
																
																else if($qc_status == 'Rejected'){
																	
																	$qc_print_status = "QC Rejected";
																}
															}
															print "<td>".$qc_print_status."</td>";
															print "<td>".("QC")."</td>";
															print "<td>".$qc_act_date."</td>";
														}
														else{
															$qc_act_date="";
															print "<td>".("Need QC Approval")."</td>";
															print "<td>".("TOP Coat")."</td>";
															print "<td>".$top_act_date."</td>";
														}
														
														
														
													}
													
												}
												else{
													$top_act_date="";
													print "<td>".("topcoat planned")."</td>";
													print "<td>".("Printing Approved")."</td>";
													print "<td>".$top_coat_plan_date."</td>";
												}
												
											}
											else{
												
												$current_stage_qry8 =mysqli_query($con,"SELECT a.org_date_pst FROM printing_status_tbl a WHERE a.pro06_pst='1' and a.production_no_pst ='$pro_no' GROUP BY a.production_no_pst    ") or die ("error3"); 
												
												if(mysqli_num_rows($current_stage_qry8)>0){
													while($current_stage_row8=mysqli_fetch_array($current_stage_qry8))
													{
														$pri_approved_date = $current_stage_row8[0];
														print "<td>".("Printing Approved")."</td>";
														print "<td>".("Need to plan topcoat")."</td>";
														print "<td>".$pri_approved_date."</td>";
														
													}
												}
												else{
													print "<td>".("Printing Approved")."</td>";
													print "<td>".("Need to plan topcoat 2")."</td>";
													print "<td>".$pri_approved_date."</td>";
													
												}
												
												
											}
											
											
										}
										else{
											
											$current_stage_qry5 =mysqli_query($con,"SELECT a.item01_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' 
											AND a.item01_vpft !='' ORDER BY id DESC LIMIT 1") or die ("error3"); 
											
											if(mysqli_num_rows($current_stage_qry5)>0){
												while($current_stage_row5=mysqli_fetch_array($current_stage_qry5))
												{
													$current_stage_5 = $current_stage_row5[0];
													
													print "<td>".("Need Printing Approval")."</td>";
													print "<td>".("Colour Finished")."</td>";
													print "<td>".$current_stage_5."</td>";
												}
											}
											else{
												print "<td>".("***77&&&")."</td>";
												print "<td>".("***77&&&")."</td>";
												print "<td>".("***77&&&")."</td>";
											}
											
										}
										
										
										
										
										
										
									}
									else{
										print "<td>".("no data")."</td>";
										print "<td>".("***")."</td>";
										print "<td>".("***")."</td>";
										
									}
									
								}
								
								
								
								
								
								
								
								$decal_finish_plan_date_qry =mysqli_query($con,"SELECT a.finish_date_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' ORDER BY id DESC LIMIT 1") or die ("error3"); 
								
								if(mysqli_num_rows($decal_finish_plan_date_qry)>0){
									while($decal_finish_plan_date_row=mysqli_fetch_array($decal_finish_plan_date_qry))
									{
										$decal_finish_plan_date = $decal_finish_plan_date_row[0];
										print "<td>".$decal_finish_plan_date."</td>";

									}
									
								}
								else{
									print "<td>".("No decal Finnished date")."</td>";
								}
								
								
								$top_coat_plan_date_qry =mysqli_query($con,"SELECT a.p_date FROM tbl_top_coat_plan a WHERE a.pro_no='$pro_no' limit 1") or die ("error3"); 
								
								if(mysqli_num_rows($top_coat_plan_date_qry)>0){
									while($top_coat_plan_date_row=mysqli_fetch_array($top_coat_plan_date_qry))
									{
										$top_coat_plan_date = $top_coat_plan_date_row[0];
										print "<td>".$top_coat_plan_date."</td>";
									}
								}
								else{
									print "<td>".("Not Plan Top Coat")."</td>";
								}
								
								if($top_act_date != ''){
									
									$qc_date=date('Y-m-d', strtotime($top_act_date. ' + 10 days'));
									print "<td>".$qc_date."</td>";
								}
								else{
									$qc_date="";
									print "<td>".("Not Plan QC")."</td>";
									
								}
								
								if($qc_act_date != ''){
									
									$ins_date=date('Y-m-d', strtotime($qc_act_date. ' + 10 days'));
									print "<td>".$ins_date."</td>";
									$qc_act_date="";
								}
								else{
									$ins_date="";
									print "<td>".("Not Ins Date")."</td>";
									
								}
								
								
								
							?>
							
							
							
							</tr>
							
							<?php
								
								
							}
						} 
					?>
				</table>
				
			</div>
			
			
		</center>								
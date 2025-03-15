<?php
	session_start();
	
	error_reporting(0);
	
	include("database_connections.php");
	//print(123);exit;
	
	//print($_GET['pro_no']);exit;
	
	
	if(isset($_GET['pro_no']))
	{		
		$pro_no = $_GET['pro_no'];
		
		$where = "aaa.rem2>0 and aaa.pro_no_lpt='".$pro_no."'"; 
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
					<a href="/PMSDev/reports/WIP_Summary.php" >
						<img src="images/home.png"  width="40" height="40"  /> Home
					</a>
				</td>

<p><font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="3px">
	
<p>
	<?php
		
		
		
		if(isset($_GET['pro_no']))
		{
			
		?> 
		
		<center> <font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="6px"><u> Printing WIP Detailed
			 </u></font></center> 
			
			<p>
				<center>  
					<div class="CSSTableGenerator" align="center" >
					
						<table width="1049" height="82" border="1" cellpadding="0" cellspacing="0" class="display" align="center" id="tblData" >
							<tr>
								<td  width="61">Production No</td>
								<td width="61">Design</td>
								<td width="61">Lot</td>
								<td width="61">Curve</td>
								<td width="61">Curves Per Sheet</td>
								<td width="61">Machine</td>
								<td width="64">Planned Sheets</td>
								<td width="64">Decal Colour Finished Date</td>
								<td width="64">Shipment Date</td>
								<td width="61">Status</td>
								
								<?php
								$colour_plan_date_qry =mysqli_query($con,"SELECT a.plan_colors_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' ") or die ("error3"); 
									
									if(mysqli_num_rows($colour_plan_date_qry)>0){
										while($colour_plan_date_row=mysqli_fetch_array($colour_plan_date_qry))
										{
											$colour_plan_date = $colour_plan_date_row[0];
											?>
										<td><?php print $colour_plan_date;?></td>
										
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
								
								?>
								<td width="61">Top Coat</td>
								<td width="61">QC Date</td>
								<td width="61">QC Comment</td>
								<td width="61">Cutting</td>
								
								
							</tr> 
						</thead>
						<?php
							
							
							$result1 =mysqli_query($con,"
							select *,GROUP_CONCAT(aaa.curve_no_lpt) as curves,GROUP_CONCAT(aaa.no_of_curves_lpt) as cqty from (select *,(case when (aa.t is null) then aa.plan_n else aa.plan_n- aa.t - aa.def  end) AS `rem2` from (SELECT *, 
(case when (t is null) then planned_qty_lpt else `planned_qty_lpt`- t - def end) AS `rem`,
(case when (close_curve_after_lpt > '0') then close_curve_after_lpt else planned_qty_lpt end) AS `plan_n` 

											FROM layout_plans_tbl a left join (SELECT SUM(c.item01_dt)As t ,SUM(c.register_dt)As def ,c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt 
											FROM dinspection_tbl c  group by c.pro_no_dt,c.curve_no_dt,c.decal_pattern_dt ) b 
											on a.pro_no_lpt=b.pro_no_dt and a.curve_no_lpt = b.curve_no_dt and a.decal_no_lpt = b.decal_pattern_dt
											where a.item05_lpt != '1') aa) aaa 
                                            left join (SELECT `ref_no_plt`,`item01_plt` FROM `preparing_layout_tbl` group by `ref_no_plt`) bbb
                                            on aaa.`pro_no_lpt` =bbb.ref_no_plt
                                            
                                            where $where 
GROUP BY `aaa`.`pro_no_lpt`  " ); 
							
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
								<td rowspan="4" valign="middle" class="tdinfo"><?php
									
									print $pro_no=$a2['pro_no_lpt'];
								?></td>
								<td rowspan="4" valign="middle" class="tdinfo"><?php
									$design_p=$a2['desing_no_lpt'];
									print $design=$a2['decal_no_lpt'];
								?></td>
								<td rowspan="4" valign="middle" class="tdinfo"><?php
									
									print $lot=$a2['lot_no_lpt'];
								?></td>
								
								<td rowspan="4" valign="middle" class="tdinfo"><?php
									
									print $curve=$a2['curves'];
								?></td>
								
								<td rowspan="4" valign="middle" class="tdinfo"><?php
									
									print $cqty=$a2['cqty'];
								?></td>
								<?php
								
								$machine_qry =mysqli_query($con,"SELECT a.machine_no_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' limit 1") or die ("error3"); 

								if(mysqli_num_rows($machine_qry)>0){
									while($machine_row=mysqli_fetch_array($machine_qry))
									{
										$machine_no = $machine_row[0];
										?>
										<td rowspan="4" ><?php print $machine_no;?></td>
										
										<?Php
									}	
								}
								else{
									?> <td rowspan="4"><?php print "-"; ?></td> <?php
								}
								?>
								
								<td rowspan="4" valign="middle" class="tdinfo"><?php
									
									print $no_of_sheets_lpt=$a2['no_of_sheets_lpt'];
								?></td>
									
								<?php
								
								$decal_finish_plan_date_qry =mysqli_query($con,"SELECT a.date_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' ORDER BY id DESC LIMIT 1") or die ("error3"); 
									
									if(mysqli_num_rows($decal_finish_plan_date_qry)>0){
										while($decal_finish_plan_date_row=mysqli_fetch_array($decal_finish_plan_date_qry))
										{
											$decal_finish_plan_date = $decal_finish_plan_date_row[0];
											?>
										<td rowspan="4" ><?php print $decal_finish_plan_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td rowspan="4"><?php print "-"; ?></td> <?php
									}
									
								$ship_date_qry =mysqli_query($con,"SELECT a.shipment_request_plt FROM preparing_layout_tbl a WHERE a.pro_no_plt='$pro_no' ORDER BY id DESC LIMIT 1") or die ("error3"); 
									
									if(mysqli_num_rows($ship_date_qry)>0){
										while($ship_date_row=mysqli_fetch_array($ship_date_qry))
										{
											$ship_date = $ship_date_row[0];
											?>
										<td rowspan="4" ><?php print $ship_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td rowspan="4" ><?php print "-"; ?></td> <?php
									}

									
								?>
								
								
								
								<td>Plan Date</td>
								<?php
								$colour_plan_date_qry =mysqli_query($con,"SELECT a.date_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' ") or die ("error3"); 
									
									if(mysqli_num_rows($colour_plan_date_qry)>0){
										while($colour_plan_date_row=mysqli_fetch_array($colour_plan_date_qry))
										{
											$colour_plan_date = $colour_plan_date_row[0];
											?>
										<td><?php print $colour_plan_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									
									
									$top_coat_plan_date_qry =mysqli_query($con,"SELECT a.p_date FROM tbl_top_coat_plan a WHERE a.pro_no='$pro_no' limit 1 ") or die ("error3"); 
									
									if(mysqli_num_rows($top_coat_plan_date_qry)>0){
										while($top_coat_plan_date_row=mysqli_fetch_array($top_coat_plan_date_qry))
										{
											$top_coat_plan_date = $top_coat_plan_date_row[0];
											?>
										<td><?php print $top_coat_plan_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									$qc_date_qry =mysqli_query($con,"SELECT a.org_date_qc FROM qc_qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' limit 1 ") or die ("error3"); 
									//print("SELECT a.org_date_qc FROM qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' limit 1 ");exit;
									if(mysqli_num_rows($qc_date_qry)>0){
										while($qc_date_row=mysqli_fetch_array($qc_date_qry))
										{
											$qc_date = $qc_date_row[0];
											?>
										<td><?php print $qc_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									$qc_date_qry =mysqli_query($con,"SELECT a.reject_items_qc FROM qc_qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' limit 1 ") or die ("error3"); 
									
									if(mysqli_num_rows($qc_date_qry)>0){
										while($qc_date_row=mysqli_fetch_array($qc_date_qry))
										{
											$qc_date = $qc_date_row[0];
											?>
										<td><?php print $qc_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									
									$qc_date_qry =mysqli_query($con,"SELECT a.curve_no_dt,a.org_date_dt,SUM(a.item01_dt) AS qty FROM 
									dinspection_tbl a WHERE a.pro_no_dt='$pro_no' group by a.curve_no_dt ") or die ("error3"); 
									
									if(mysqli_num_rows($qc_date_qry)>0){
										while($qc_date_row=mysqli_fetch_array($qc_date_qry))
										{
											$cut_curve = $qc_date_row[0];
											$cut_date = $qc_date_row[1];
											$cut_qty = $qc_date_row[2];
											?>
										<td><?php print $cut_curve."-".$cut_qty;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									
									
									
									
								
								?>	
								
								
								</tr>
								
								<tr><td>Actual Date</td>
								<?php
								$colour_plan_date_qry =mysqli_query($con,"SELECT a.item01_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' ") or die ("error3"); 
									
									if(mysqli_num_rows($colour_plan_date_qry)>0){
										while($colour_plan_date_row=mysqli_fetch_array($colour_plan_date_qry))
										{
											$colour_plan_date = $colour_plan_date_row[0];
											?>
										<td><?php print $colour_plan_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									
									
									
								$top_coat_act_date_qry =mysqli_query($con,"SELECT a.org_date_tcpt FROM top_coat_printing_tbl a WHERE a.pro_no_tcpt='$pro_no' limit 1 ") or die ("error3"); 
									
									if(mysqli_num_rows($top_coat_act_date_qry)>0){
										while($top_coat_act_date_row=mysqli_fetch_array($top_coat_act_date_qry))
										{
											$top_coat_act_date = $top_coat_act_date_row[0];
											?>
										<td><?php print $top_coat_act_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									
									$qc_date_qry =mysqli_query($con,"SELECT a.org_date_qc FROM qc_qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' limit 1 ") or die ("error3"); 
									//print("SELECT a.org_date_qc FROM qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' limit 1 ");exit;
									if(mysqli_num_rows($qc_date_qry)>0){
										while($qc_date_row=mysqli_fetch_array($qc_date_qry))
										{
											$qc_date = $qc_date_row[0];
											?>
										<td><?php print $qc_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									

								
								?>	
								
								</tr>
								<tr><td>Actual Sheets</td>
								<?php
								$colour_plan_date_qry =mysqli_query($con,"SELECT a.imp_actual_vpft FROM virtual_planner_final_tbl a WHERE a.pro_no_vpft='$pro_no' ") or die ("error3"); 
									
									if(mysqli_num_rows($colour_plan_date_qry)>0){
										while($colour_plan_date_row=mysqli_fetch_array($colour_plan_date_qry))
										{
											$colour_plan_date = $colour_plan_date_row[0];
											?>
										<td><?php print $colour_plan_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
									
									
									$top_coat_act_date_qry =mysqli_query($con,"SELECT a.item01_tcpt FROM top_coat_printing_tbl a WHERE a.pro_no_tcpt='$pro_no' limit 1 ") or die ("error3"); 
									
									if(mysqli_num_rows($top_coat_act_date_qry)>0){
										while($top_coat_act_date_row=mysqli_fetch_array($top_coat_act_date_qry))
										{
											$top_coat_act_date = $top_coat_act_date_row[0];
											?>
										<td><?php print $top_coat_act_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
								
								
								$qc_date_qry =mysqli_query($con,"SELECT a.actual_qty_qc FROM qc_qc_approval_tbl a WHERE a.pro_no_qc='$pro_no' limit 1 ") or die ("error3"); 
									
									if(mysqli_num_rows($qc_date_qry)>0){
										while($qc_date_row=mysqli_fetch_array($qc_date_qry))
										{
											$qc_date = $qc_date_row[0];
											?>
										<td><?php print $qc_date;?></td>
										
										<?Php
										}
										
									}
									else{
										?> <td><?php print "-"; ?></td> <?php
									}
									
								?>	
								
								
								
								
								
								
								
								
							</tr>
							
							<?php
							
								
							}
						} 
					?>
				</table>
				
			
				</div>
				
				
				
				<?php
					if(0)
					{
				
					?>
					<P><strong>Repair Data</strong></P>
					<table width="400" height="82" border="1" cellpadding="0" cellspacing="0"  align="center">
					
						<tr>
							<td width="61">Pattern</td>
							<td width="64">Item</td>
							<td width="64"  >Repair Qty</td>
						</tr> 
					
					<?php
						
						
						
						
						$result1 =mysql_query("select kk.design,kk.item,SUM(kk.total_r) as total_r from (select aa.*,(bb.Repairs),(bb.wwrepair),(bb.Printrepair),(bb.Kilnrepair),(bb.refire), 
((bb.Repairs)+(bb.wwrepair)+(bb.Printrepair)+(bb.Kilnrepair)+(bb.refire))as total_r 
from (select * from ((select a.design,a.item,a.chit_no as ChitNo,a.pjt_no ,a.qty as qty,
sum(b.good_qty) as good_qty from decsys.cm a 
left join decsys.tbl_barcode_data b on a.chit_no=b.chit_no 
where a.fdate>='2019-07-21' and a.fdate<='2019-07-24' and a.`process`='ins' 
group by a.chit_no )) cc where cc.qty != cc.good_qty) aa left join 
decsys.repairs bb on aa.ChitNo=bb.ChitNo) kk group by kk.design,kk.item" ); 
						
						while ($a2 = mysql_fetch_array($result1)) { 
						
						if($a2['total_r']>0){
							
							
							
							$stock_in2+=$a2['stock_in'];
							$stock_out2+=$a2['stock_out'];
							
							
						?>
						<tr onMouseOver="style.backgroundColor='#84DFC1'"  onmouseout="style.backgroundColor=''" >
							
							
							
							
							<td valign="middle" class="tdinfo"><?php
								
								print $design=$a2['design'];
							?></td>
							<td align="left" valign="middle" class="tdinfo"><?php
								
								print $item=$a2['item'];
							?></td>
							<td nowrap="nowrap"><?php print $total_r=$a2['total_r']; ?></td>
							
							
						</tr>
						
						<?php
						}
						}
					} 
				?>
			</table>
			
			
			
			
			
			
			
	
	
</center>						
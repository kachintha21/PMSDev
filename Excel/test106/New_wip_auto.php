<?php
	session_start();
	
	error_reporting(0);
	
	$con=mysql_connect("localhost","root","") or die ("error1");
	$db=mysql_select_db("packing_system",$con) or die ("error2");
	
	date_default_timezone_set('Asia/Colombo');
	$_POST['filter']=1;
	$user='System';
	
	
	
?>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script src="../../js/jquery-1.9.1.js"></script>
<script src="../../js/jquery-ui.js"></script>

<link rel="stylesheet" href="../..//resources/demos/style.css" />
<style>
	body {
	padding:0;
	margin:0 2px;
	background-image: url("../../../images/bk-r.jpg");
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
	//alert(4444);
	function fnExcelReport()
		//alert(4444);
				{
					var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
					var textRange; var j=0;
					tab = document.getElementById('table2excelfg'); // id of table
					
					//alert(tab.rows.length);
					for(j = 0 ; j < tab.rows.length ; j++) 
					{     
						tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
						//tab_text=tab_text+"</tr>";
					}
					
					tab_text=tab_text+"</table>";
					tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
					tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
					tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
					
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf("MSIE "); 
					
					if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
					{
						txtArea1.document.open("txt/html","replace");
						txtArea1.document.write(tab_text);
						txtArea1.document.close();
						txtArea1.focus(); 	
						sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
					}  
					else 
					//alert(123);
					//other browser not tested on IE 11
					sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
					
					return (sa);
				}
	
	
	
	</script>



	<?php
		
		
		if($_SESSION['user_t']=='Kiln') 
		{
			echo "<a href='../../kiln_home.php'><-home</a>";  
		}
		else if($_SESSION['user_t']=='Decoration') 
		{
			echo "<a href='../../deco_home.php'><-home</a>";   
		}
		else if($_SESSION['user_t']=='Inspection') 
		{
			echo "<a href='../../ins_home.php'><-home</a>";   
		}
		else if($_SESSION['user_t']=='Planning') 
		{
			echo "<a href='../../plan_home.php'><-home</a>";   
		}
		
		if(isset($_POST['filter']))
		{
			
		?> 
		
		<center> <font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="6px"><u> Deco WIP Stock For Last Night
			</u></font></center> 
			
			<p>
			
				<center>  
					<div  align="center" >
						
						<table width="300" border="1" id="table2excelfg">
							<tr >
								<td width="61"><strong>Design</strong></td>
								<td width="61"><strong>Item</strong></td>
								<td width="61"><strong>Qty</strong></td>
								<td width="61"><strong>Repair Qty</strong></td>
								<td width="61"><strong>Total Qty</strong></td>
								
							</tr> 
						</thead>
						<?php
							
							$result1 =mysql_query("select 
nnn.fdesign,nnn.fitem,
SUM(nnn.f1) as f1,
SUM(nnn.f2) as f2,
SUM(nnn.r1) as r1,
SUM(nnn.r2) as r2,
SUM(nnn.r3) as r3,
SUM(nnn.r4) as r4





from (select bb.fdesign,bb.fitem,bb.fqty as f1,bb.nfqty as f2,
0 as r1,0 as r2,0 as r3,0 as r4 from (select *,
case when (aa.design != '')
	then 	aa.design
else 	aa.ndesign
end as fdesign,

case when (aa.item != '')
	then 	aa.item
else 	aa.nitem
end as fitem,

case when (aa.qty != '')
	then 	aa.qty
else 	'0'
end as fqty,

case when (aa.nQty != '')
	then 	aa.nQty
else 	'0'
end as nfqty

 from (SELECT a.design,a.item,a.qty,b.design as ndesign,b.item as nitem,b.qty as nQty
FROM (select design,item,SUM(qty) as qty from tbl_wip_stk group by design,item) a
LEFT outer JOIN (select design,item,SUM(qty) as qty from tbl_wip_stk_nagoya group by design,item) b
ON a.design =b.design and
a.item =b.item

UNION  all 

SELECT a.design,a.item,a.qty,b.design as ndesign,b.item as nitem,b.qty as nQty
FROM (select design,item,SUM(qty) as qty from tbl_wip_stk group by design,item) a
RIGHT outer JOIN (select design,item,SUM(qty) as qty from tbl_wip_stk_nagoya group by design,item) b
ON a.design =b.design and
a.item =b.item ) aa ) bb 


union all


select bb.fdesignr as fdesign,bb.fitemr as fitem,0 as f1,0 as f2,
bb.NRwip as r1,bb.Rwip as r2,bb.NRwipN as r3,bb.RwipN as r4 from (select 
case when (aa.design != '')
	then 	aa.design
else 	aa.ndesign
end as fdesignr,

case when (aa.item != '')
	then 	aa.item
else 	aa.nitem
end as fitemr,

case when (aa.NRwip != '')
	then 	aa.NRwip
else 	'0'
end as NRwip,

case when (aa.Rwip != '')
	then 	aa.Rwip
else 	'0'
end as Rwip,

case when (aa.NRwipN != '')
	then 	aa.NRwipN
else 	'0'
end as NRwipN,

case when (aa.RwipN != '')
	then 	aa.RwipN
else 	'0'
end as RwipN

 from (SELECT a.design,a.item,a.NRwip,a.Rwip,b.design as ndesign,b.item as nitem,
b.NRwipN ,b.RwipN
FROM tbl_repair_stk a
LEFT OUTER JOIN tbl_repair_stk_nagoya b
ON a.design =b.design and
a.item =b.item 

UNION  all 


SELECT a.design,a.item,a.NRwip,a.Rwip,b.design as ndesign,b.item as nitem,
b.NRwipN ,b.RwipN
FROM tbl_repair_stk a
RIGHT OUTER JOIN tbl_repair_stk_nagoya b
ON a.design=b.design and
a.item =b.item  ) aa ) bb group by bb.fdesignr,bb.fitemr 


) nnn group by nnn.fdesign,nnn.fitem " ); 

							
							while ($a2 = mysql_fetch_array($result1)) { 
								
								
								
								$stock_in2+=$a2['stock_in'];
								$stock_out2+=$a2['stock_out'];
								
								
							?>
							<tr onMouseOver="style.backgroundColor='#84DFC1'"  onmouseout="style.backgroundColor=''" >
								
								<td valign="middle" class="tdinfo"><?php
									
									print $design=$a2['fdesign'];
								?></td>
								<td align="left" valign="middle" class="tdinfo"><?php
									
									print $item=$a2['fitem'];
								?></td>
								<td align="right" nowrap="nowrap"><?php $final+=$a2['f1']+$a2['f2'];
								print $pro_qty=$a2['f1']+$a2['f2']; ?></td>
								
								<td align="right" nowrap="nowrap"><?php $finalr+=$a2['r1']+$a2['r2']+$a2['r3']+$a2['r4'];
								print $pro_qtyr=$a2['r1']+$a2['r2']+$a2['r3']+$a2['r4']; ?></td>
								
								
								<td align="right" nowrap="nowrap"><?php //$finalr+=$a2['NRwip']+$a2['Rwip']+$a2['NRwipN']+$a2['RwipN'];
								print $pro_qty+$pro_qtyr; ?></td>
								
							</tr>
							
							
							<?php
							}
							
						} 
					?>
					<tr>
							<td valign="middle" class="tdinfo"><?php
									
									
								?></td>
								<td align="left" valign="middle" class="tdinfo"><?php
									
									
								?></td>
								<td align="right" nowrap="nowrap"><strong><?php
								print $final; ?></strong></td>
								<td align="right" nowrap="nowrap"><strong><?php
								print $finalr; ?></strong></td>
								<td align="right" nowrap="nowrap"><strong><?php
								print $final+$finalr; ?></strong></td>
							
							</tr>
				</table>
				
			</div>
			
	</center>	
	
	
	
	<script type='text/javascript' >
		
		alert(12434343);
		
		$("button").click(function(){
			alert(3333);
			$("#table2exceldeco").table2excel({
				
				// exclude CSS class
				exclude: ".noExl",
				name: "Worksheet Name",
				filename: "Shipment Plan <?php print $from." to ".$to." by -" .$user ; ?>" //do not include extension
			}); 
		});
		
		
		$("#table2exceldeco").table2excel({
			alert(123);
			// exclude CSS class
			exclude: ".noExl",
			name: "Worksheet Name",
			filename: "Deco Report  <?php print $from." to ".$to." by -" .$user." - " .$date.".xls" ; ?>" //do not include extension
		}); 
		
		
		
		
	</script>

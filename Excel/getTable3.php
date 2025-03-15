<?php
	session_start();
	
	include("database_connections2.php");
	
	if(isset($_SESSION['sdate']))
	{		
		$table="tbl_virtual_plan_decoration_belt_wise_data_temp_for_edit";
	}
	
	
	
	
	error_reporting(0);
	
	$sql=mysql_query("select sum((distance/1150)*pro_qty) AS dist,sum(pro_qty) AS qty ,belt from $table  GROUP BY belt");
?>

<style type="text/css">
	.cell_color {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	}
</style>

<table width="226" border="1" cellspacing="1" cellpadding="1" bgcolor="#00ffff">
	<tr>
		<td><table width="226" border="0" cellspacing="0" cellpadding="0">
            <tr>
				<td colspan="2" class="cell_color">&nbsp;</td>
			</tr>
            <tr>
				<td colspan="2"   align="center"  bgcolor="#CCCCCC"><strong><font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="3px"> Calculate</font></strong></td>
			</tr>
            <tr>
				<td colspan="2" class="cell_color">&nbsp;</td>
			</tr>
            <tr>
				<td colspan="2" class="cell_color">&nbsp;&nbsp;Date:
					<?php
						
						if(isset($_SESSION['sdate']))
						{
							
							
							echo $_SESSION['sdate'] ;;
						}
						else
						{
							
							echo  date("Y-m-d");;
						}
						
					?></td>
			</tr>
			
            <tr>
				<td colspan="2" class="cell_color">&nbsp;</td>
			</tr>
            <tr>
				<td width="34" class="cell_color">&nbsp;</td>
				<td width="192" class="cell_color"><div id = "latestData"><?php
					
					echo"<b>Belt Total Distance / Qty: </b>";
					echo "<br><br>";
					
					while($row=mysql_fetch_array($sql))
					{
						
						
						
						
						
						$belt=$row['belt'] ." > ";
						$data=round($row[0],2)." min";
						
						if($row['belt']=='')
						echo "# - > ";
						else
						echo $belt;
						
						if($data<=450)
						echo $data." [".$row[1]."]";
						else echo "<font color='red'>".$data." [".$row[1]."]"."</font>"; 
						
						
						echo "<br>";
						
						
					}
					
					
					echo "----------------------";
					
					echo "<br>";
					echo"<b>Total / Qty:</b>";
					
					echo "<br><br>";
					
					$sql2=mysql_query("select sum((distance/1150)*pro_qty) AS dist,sum(pro_qty) AS qty 
 from tbl_virtual_plan_decoration_belt_wise_data_temp_for_edit  ");
					while($row2=mysql_fetch_array($sql2))
					{
						$kiln=round($row2[0],2)." min";
						echo $kiln." [".$row2[1]."]";
						echo "<br>"; 
					}
					
					
					echo "----------------------";
					
					echo "<br>";
					
					
				?></div></td>
			</tr>
            <tr>
				<td colspan="2" class="cell_color">&nbsp;</td>
			</tr>
		</table></td>
	</tr>
</table>

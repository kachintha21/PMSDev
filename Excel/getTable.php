<?php
	session_start();
	
	include("database_connections.php");
	
	if(isset($_SESSION['sdate']))
	{		
		$table="virtual_planner_final_tbl_excel_f";
	}
	
	
	
	
	error_reporting(0);
	//print("select sum(qty_vtst) AS qty ,belt from $table  GROUP BY belt");exit;
	$sql=mysqli_query($conn,"select sum(`Time_t`) AS tt,sum(qty) AS tqty ,`M_no` from $table GROUP BY plan_date,M_no");
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
					
					echo"<b>Machine Total  Time/Qty: </b>";
					echo "<br><br>";
					
					while($row=mysqli_fetch_array($sql))
					{
						
						
						
						
						
						$belt=$row['M_no'] ." > ";
						$data=round($row[0],2)." min";
						
						if($row['M_no']=='')
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
					//print("select sum(qty_vtst) AS qty ,machine_no_vtst from $table ");exit;
					$sql2=mysqli_query($conn,"select sum(qty) AS qty from $table;  ");
					while($row2=mysqli_fetch_array($sql2))
					{
						//$kiln=round($row2[0],2)." min";
						echo "[".$row2[0]."]";
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

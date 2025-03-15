<?php
session_start();

include("database_connections.php");

	  $table="plan_".$_SESSION['sdate'];	
	
	
 error_reporting(0);
 ?>
 <style>
 .CSSTableGenerator {
	margin:0px;padding:0px;
	width:400;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #000000;
	
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
	width:400;
	 
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
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#aad4ff; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:14px;
	font-family:Calibri;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
	background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");	background: -o-linear-gradient(top,#005fbf,003f7f);

	background-color:#005fbf;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
	background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");	background: -o-linear-gradient(top,#005fbf,003f7f);

	background-color:#005fbf;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
 </style>
 <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
 </script>
<form id="form1" name="form1" method="post" action="">
 <center><div class="CSSTableGenerator" >
<table width="350" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" class="cell_color"><strong>Shipment Vs Design / Item - <?php print $_SESSION['sdate'];?></strong></td>
  </tr>
  <tr>
    <td colspan="4"   align="center">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" class="cell_color"><strong>Destination</strong></td>
    <td bgcolor="#CCCCCC" class="cell_color"><strong>Pattern</strong></td>
    <td bgcolor="#CCCCCC" class="cell_color"><strong>Item</strong></td>
    <td bgcolor="#CCCCCC" class="cell_color"><strong>Pcs</strong></td>
  </tr>	
   <tr>
    <td bgcolor="#CCCCCC" class="cell_color"><select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
    
    <option value="getTable2.php">--select--</option><?php
	
$sql2=mysql_query("select  DISTINCT  shipment  FROM $table");
while($row2=mysql_fetch_array($sql2))
{
		?>
      <option value="getTable2.php?dest=<?php echo $row2['shipment'];?>" selected="selected"><?php echo $row2['shipment'];?></option>
      
      <?php

}
if(isset($_GET['dest']))
{
?>
<option><?php echo $_GET['dest']?></option>

<?php   } ?> </select></td>
    <td bgcolor="#CCCCCC" class="cell_color"><select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)"> <option value="getTable2.php">--select--</option>
      <?php
$sql2=mysql_query("select  DISTINCT  pattern  FROM $table");
while($row2=mysql_fetch_array($sql2))
{
		?>
      <option value="getTable2.php?pattern=<?php echo $row2['pattern'];?>"><?php echo $row2['pattern'];?></option>
      <?php

}
if(isset($_GET['pattern']))
{
?>
      <option selected="selected"><?php echo $_GET['pattern']?></option>
      <?php   } ?>
    </select></td>
    <td bgcolor="#CCCCCC" class="cell_color"><select name="jumpMenu3" id="jumpMenu3" onchange="MM_jumpMenu('parent',this,0)"> <option value="getTable2.php">--select--</option>
      <?php
$sql2=mysql_query("select  DISTINCT  itemno  FROM $table");
while($row2=mysql_fetch_array($sql2))
{
		?>
      <option value="getTable2.php?itemno=<?php echo $row2['itemno'];?>"><?php echo $row2['itemno'];?></option>
      <?php

}
if(isset($_GET['itemno']))
{
?>
      <option selected="selected"><?php echo $_GET['itemno']?></option>
      <?php   } ?>
    </select></td>
    <td bgcolor="#CCCCCC" class="cell_color">&nbsp;</td>
  </tr>
  <?php
			 
		if(isset($_GET['pattern']) & !isset($_GET['itemno']) & !isset($_GET['dest']))
{
	$pattern=$_GET['pattern'];
	 $sql=mysql_query("select    shipment,itemno, pro_qty,pattern,sum(pro_qty) as qty  FROM $table WHERE shipment IS NOT NULL  AND pattern='$pattern' AND belt!='D'  GROUP BY shipment,itemno, pattern ");
	
}
  if(!isset($_GET['pattern']) &  isset($_GET['itemno']) & !isset($_GET['dest']))
{
		$itemno=$_GET['itemno'];
 $sql=mysql_query("select    shipment,itemno,pro_qty, pattern,sum(pro_qty) as qty  FROM $table WHERE shipment IS NOT NULL  AND itemno='$itemno' AND belt!='D'  GROUP BY shipment,itemno, pattern ");	
}
 if(!isset( $_GET['pattern']) & !isset($_GET['itemno']) &  isset($_GET['dest']))
{
		$shipment=$_GET['dest'];
	 $sql=mysql_query("select   shipment,itemno, pro_qty,pattern,sum(pro_qty) as qty  FROM $table WHERE shipment IS NOT NULL AND shipment='$shipment' AND belt!='D'  GROUP BY shipment,itemno, pattern ");
}
if(!isset($_GET['pattern']) & !isset($_GET['itemno']) & !isset($_GET['dest']))
{
	// $sql=mysql_query("select shipment,itemno,pro_qty, pattern,sum(pro_qty) as qty  FROM $table WHERE shipment IS NOT NULL  GROUP BY shipment,itemno, pattern");
	}
	 	 		  
while($row=mysql_fetch_array($sql))
{
	$pro_qty+=$row['qty'];
	 
	   ?>
  <tr>
    <td width="43" class="cell_color"><?php  
echo $shipment=$row['shipment'];;

	  ?>
      &nbsp;</td>
    <td width="44" class="cell_color"><?php
	  echo $pattern=$row['pattern'] 
	?></td>
    <td width="44" nowrap="nowrap" class="cell_color"><?php   echo $itemno=$row['itemno'] ; ?>
      &nbsp;</td>
    <td width="43" class="cell_color"><?php   echo $qty=$row['qty'];?></td>
  </tr> <?php
  }
?>
  <tr>
    <td class="cell_color">&nbsp;</td>
    <td class="cell_color">&nbsp;</td>
    <td nowrap="nowrap" class="cell_color">&nbsp;</td>
    <td class="cell_color"><strong><?php print $pro_qty; ?></strong></td>
  </tr>
 
  <tr>
    <td colspan="4" class="cell_color">&nbsp;</td>
  </tr>
</table>
</div></center></form>
<?php 
  session_start();
 
  error_reporting(0);
  include("database_connections.php");
  
  if(isset($_POST['filter']))
{
   
	$sdate=$_POST['sdate'];
	  
	      if($_POST['pattern']!=NULL){  $where="daily_plan.pattern='".$_POST['pattern']."'";     }
	      if($_POST['item']!=NULL)  { $where.=" AND daily_plan.itemno='".$_POST['item']."'";  }
		  if($_POST['belt']!=NULL) { $where.=" AND daily_plan.belt='".$_POST['belt']."'";  } 
		  
	  }
 else
 {  
	 
     	$sdate=date("Y-m-d");
	 }

    $where.=" AND daily_plan.plandate='".$sdate."'"; 
 if(substr(trim($where),0,3)=="AND"){$where=trim(substr($where ,5));
		  }
		  
		//print  $where;
    
?>
<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:1000;
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
	width:1000;
 
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
	text-align:right;
	padding:5px;
	font-size:14px;
	font-family:Calibri;
	font-weight:normal;
	color:#000000;
}.headng {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-weight: bold;
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
		background:-o-linear-gradient(bottom, #76b1ed 5%, #0e3f70 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #76b1ed), color-stop(1, #0e3f70) );
	background:-moz-linear-gradient( center top, #76b1ed 5%, #0e3f70 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#76b1ed", endColorstr="#0e3f70");	background: -o-linear-gradient(top,#76b1ed,0e3f70);

	background-color:#76b1ed;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #76b1ed 5%, #0e3f70 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #76b1ed), color-stop(1, #0e3f70) );
	background:-moz-linear-gradient( center top, #76b1ed 5%, #0e3f70 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#76b1ed", endColorstr="#0e3f70");	background: -o-linear-gradient(top,#76b1ed,0e3f70);

	background-color:#76b1ed;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script src="../../js/jquery-1.9.1.js"></script>
<script src="../../js/jquery-ui.js"></script>
 
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
	
$( "#sdate" ).datepicker({
dateFormat: 'yy-mm-dd' 
});
}); 

</script> 


<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<p><font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="3px"><form id="form1" name="form1" method="post" >
 <span class="cell_color">Date :
  <input type="text"  name='sdate' id="sdate" size="10" maxlength="10" value="<?php
  
  
  if(isset($_POST['sdate']))
{
 
	echo $pdate=$_POST['sdate'];
	}
	else
	{
	print $pdate= date("Y-m-d");	
}



; ?>" />
 </span>
  
<label>Pattern : </label>
<label for="pattern"></label>
<input name="pattern" type="text" id="pattern" size="10" maxlength="10" value="<?php if(isset($_POST['pattern']))echo   $_POST['pattern']; ?>" />
Item : 
<input name="item" type="text" id="item" size="10" maxlength="10"  value="<?php if(isset($_POST['item']))echo   $_POST['item']; ?>" />
Belt : 
  <select name="belt" id="belt">
    <option value="">All</option>
    <option value="A1">A1</option>
    <option value="A2">A2</option>
    <option value="B2">B2</option>
    <option value="C1">C1</option>
    <option value="C2">C2</option>
    <option value="E1">E1</option>
    <option value="E2">E2</option>
    <option value="D">D</option>
    <option value="D1">D1</option>
    <option value="D2">D2</option>
    <option value="E3">E3</option>
    <option>-----</option>
    <option value="FW1">FW1</option>
    <option value="HW1">HW1</option>
    <option>-----</option>
    <option value="T1">T1</option>
    <option value="T2">T2</option>
    <option value="T3">T3</option>
    <option value="T4">T4</option>
    <option value="T5">T5</option>
    <option value="T6">T6</option>
    <option value="T7">T7</option>
    <option value="T8">T8</option>
    <option value="T9">T9</option>
    <option value="T10">T10</option>
    <option value="T11">T11</option>
    <option value="T12">T12</option>
    <option value="T13">T13</option>
    <option value="T14">T14</option>
    <option value="T13">T13</option>
    <option value="T14">T14</option>
    <option>-----</option>
    <option value="TT1">TT1</option>
    <option value="TT2">TT2</option>
    <option value="TT3">TT3</option>
    <option value="TT4">TT4</option>
    <option value="TT5">TT5</option>
    <option value="TT6">TT6</option>
    <option value="TT7">TT7</option>
    <option value="TT8">TT8</option>
    <option value="TT9">TT9</option>
    <option value="TT10">TT10</option>
    <option value="TT11">TT11</option>
    <option value="TT12">TT12</option>
    <option value="TT13">TT13</option>
    <option value="TT14">TT14</option>
    <option value="TT13">TT13</option>
    <option value="TT14">TT14</option>
    <option>-----</option>
    <option value="RHK I">RHK I</option>
    <option value="RHK III">RHK III</option>
    <option value="RHK IV">RHK IV</option>
    <?php if(isset($_POST['belt']))
	{
	?>
    <option value="<?php print  $_POST['belt'];?>" selected="selected">
      <?php  print $_POST['belt'];?>
    </option>
    <?php
	}
	?>
  </select> 
  <input type="submit" name="filter" id="filter" value="Search" />
  </label>
 &nbsp;&nbsp;&nbsp; 
 <input type="button" value="Reset" onclick="javascript:window.location.href='previous_plan.php'" />
</form></form></p>

<p>
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
	?>  |
<center> 
  <font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="6px"><u> Decoration Plan as at
  <?php

if(isset($_POST['sdate']))
{
   echo $_POST['sdate'];
	}
	else
	{
  
 echo date("Y-m-d");
}


?> </u></font></center> 

<p>
<center>
<div class="CSSTableGenerator" align="center" >
  <table width="1053" height="82" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td width="78">Plan Date</td>
 <td width="78">Belt</td>
 <td width="78">Distant</td>
 <td width="78">Pjt No</td>
 <td width="58">Pattern</td>
      <td width="86">Item No</td>
      <td width="46">Plan_Qty</td>
      <td width="65">Yeild</td>
      <td width="92">Priority</td>
      <td width="90">Remarks</td>
      <td width="90">Shipment </td>
      <td width="90">Ship Date</td>
      </tr>
    <?php
 
 
  
	  if ($_POST['pattern']!=NULL   |  $_POST['item']!=NULL  | $_POST['belt']!=NULL ) 
	{
	 
			  
			$sql =mysql_query( "  SELECT * from daily_plan WHERE $where ORDER BY pattern,itemno");
			}
			
		else
		{
			  
		 
		$sql =mysql_query( "  SELECT * from daily_plan  WHERE $where ORDER BY pattern,itemno");
	 }
 

$id=1;
  
	while ($r4 = mysql_fetch_assoc($sql)) { 
	
	 
 ?>
    <tr onMouseOver="style.backgroundColor='#84DFC1'"  onmouseout="style.backgroundColor=''" >
      <td nowrap="nowrap"><?php print $r4['plandate']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['belt']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['distant']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['pjtno']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['pattern']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['itemno']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['pro_qty']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['yeild']."&nbsp;"; ?> </td>
      <td nowrap="nowrap"><?php print $r4['priority']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['remark']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['shipment']."&nbsp;"; ?></td>
      <td nowrap="nowrap"><?php print $r4['ship_date']."&nbsp;"; ?></td>
      </tr>
    
   <?php
	
} 
?><?php  if(mysql_num_rows($sql)<1)
 {
	 echo "<p>-- No Results --</p>"; 
	exit();	 }?>
  </table>
</div>
</center>
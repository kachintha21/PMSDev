<?php
  session_start();
 
  error_reporting(0);
  include("database_connections.php");
  
  
 if(isset($_POST['filter']))
  {
	      if($_POST['from']!=NULL){  $where="fdate BETWEEN  '".$_POST['from']."'";     }
	      if($_POST['to']!=NULL)  { $where.=" AND '".$_POST['to']."'";  }
		  if($_POST['shipment']!=NULL) { $where.=" AND shipment='".$_POST['shipment']."'";  } 
		  if($_POST['pattern']!=NULL) { $where.=" AND pattern='".$_POST['pattern']."'";  }
		  if($_POST['item']!=NULL) {   $where.=" AND item='".$_POST['item']."'"; }
		  
		  
		  
		  
		  if($_POST['belt']!=NULL) { 
		    
			 
			 
			 if($_POST['belt']=="W/O LINING") { 
			 
			 $where.=" AND bbelt NOT LIKE '%T%'";  
			 
			 
			 
			 }
			 
			 else if($_POST['belt']=="ONLY LINING") { 
			 
			 $where.=" AND bbelt LIKE '%T%'";  
			 
			  
			 }
			 else
			 {
				
			 
			
			 $where.=" AND bbelt='".$_POST['belt']."'";  
				 
				 }
		  }
		  
		  
		  
		  
		  
		  
		  if($_POST['pm']!=NULL) { if($_POST['pm']=='-') {$where.=" AND (qty-pro_qty)<0"; }
		  else if($_POST['pm']=='+') { $where.=" AND (qty-pro_qty)>0"; } 
		  else if($_POST['pm']=='0')  {$where.=" AND (qty-pro_qty)=0"; } }
		  if($_POST['process']!=NULL){if($_POST['process']=="1"){ $process="Dec"; $current_stage="1"; }
		  else if($_POST['process']=="1F"){$process="Firing"; $current_stage="1"; }			
		  else if($_POST['process']=="2"){	$process="Dec"; $current_stage="2"; }
		  else if($_POST['process']=="2F"){$process="Firing"; $current_stage="2"; }
		  else if($_POST['process']=="3"){ $process="Dec"; $current_stage="3"; }
		  else if($_POST['process']=="3F"){	$process="Firing"; $current_stage="3"; }
		  else {$process="Ins"; $current_stage="0"; }
		  $where.=" AND Process='".$process."' AND current_stage='".$current_stage."'";	  }
  }

 	 
   
?>
<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:1100;
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
<p><font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="3px">
<form id="form1" name="form1" method="post" >
  <span class="cell_color">From :
  <input type="text" id="from" name="from"  value="<?PHP if(isset($_POST['from']))
		  { print $_POST['from']; }else {echo date("Y-m-d");}?>"/> 
  To : 
  <input type="text" id="to" name="to"  value="<?PHP if(isset($_POST['to']))
		  { print $_POST['to']; }else {echo date("Y-m-d");}?>"/> 
  </span>
  <label>Pattern : </label>
  <label for="pattern"></label>
  <input name="pattern" type="text" id="pattern" size="10" maxlength="10" value="<?php if(isset($_POST['pattern']))echo   $_POST['pattern']; ?>" />
  Item :
  <input name="item" type="text" id="item" size="10" maxlength="10"  value="<?php if(isset($_POST['item']))echo   $_POST['item']; ?>" />
  Process :
  <label for="process"></label>
  <select name="process" id="process">
    <option value="">All</option>
    <option value="1">1</option>
    <option value="1F">1F</option>
    <option value="2">2</option>
    <option value="2F">2F</option>
    <option value="3">3</option>
    <option value="3F">3F</option>
    <option value="Ins" > Ins</option>
    <?php if(isset($_POST['process']))
	{
	?>
    <option value="<?php print  $_POST['process'];?>" selected="selected">
      <?php  print $_POST['process'];?>
    </option>
    <?php
	}
	?>
  </select>
  +/- :
  <label for="pm"></label>
  <select name="pm" id="pm">
    <option value="">All</option>
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="0">0</option>
  <?php if(isset($_POST['pm']))
	{
	?>
    <option value="<?php print  $_POST['pm'];?>" selected="selected">
	<?php print $_POST['pm'];?> 
    </option>
    
    <?php
	}
	?>
  </select>
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
     
     <option value="W/O LINING">W/O LINING</option>
      <option value="ONLY LINING">ONLY LINING</option> 
  
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
     <option value="RHK 1">RHK 1</option>
     <option value="RHK 3">RHK 3</option>
     <option value="RHK 4">RHK 4</option>
     <?php if(isset($_POST['belt']))
	{
	?>
     <option value="<?php print  $_POST['belt'];?>" selected="selected"><?php  print $_POST['belt'];?></option>
    <?php
	}
	?>
  </select> 
  Stage :
  <select name="belt2" id="belt2">
   <option></option>
    <option value="FW1">FW1</option>
     <option value="HW1">HW1</option>
    <?php if(isset($_POST['belt2']))
	{
	?>
    <option value="<?php print  $_POST['belt2'];?>" selected="selected">
      <?php  print $_POST['belt2'];?>
    </option>
    <?php
	}
	?>
  </select>
Shipment :
<select name="shipment" id="shipment">
    <option value="">All</option>
    <?php
    $sql1 =mysql_query("SELECT distinct shipment FROM daily_plan ORDER BY shipment ASC"); 
	 
  
	while ($r2 = mysql_fetch_array($sql1)) { 
	
	
		$shipment=$r2[0];
    ?>
    
    <option value="<?php print $shipment; ?>"><?php print $shipment; ?></option>
   <?php } ?>
    <?php if(isset($_POST['shipment']))
	{
	?>
    <option value="<?php print  $_POST['shipment'];?>" selected="selected">
      <?php  print $_POST['shipment'];?>
    </option>
    <?php
	}
	?>
  </select>
  <input type="submit" name="filter" id="filter" value="Search" />
  </label>
  &nbsp;&nbsp;&nbsp;
  <input type="button" value="Reset" onclick="javascript:window.location.href='WIP.php'" />
</form>
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
	 
    if(isset($_POST['filter']))
  {
	  ?> 
    
<center> <font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="6px"><u> Decoration WIP : <?php

if(isset($_POST['from']))
{
 
	 
	  echo $_POST['from']." to ".$_POST['to'];
	}
	else
	{
	 
 echo date("Y-m-d")." to ".date("Y-m-d");
}


?> </u></font></center> 

<p>
<center>
<div class="CSSTableGenerator" align="center" >
  <table width="900" height="82" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
 
 <td width="59">Date</td>
      <td width="51">PJTNo</td>
      <td width="61">Chit No</td>
      <td width="61">Process</td>
      <td width="64">Belt</td>
      <td width="60">Distant</td>
      <td width="74">Design </td>
      <td width="64">Item </td>
      <td width="63">Plan. Qty </td>
            <td width="67">Cy. Time </td>
      <td width="66">Yeild </td>
      <td width="61">Act. Qty</td>
        <td width="58"> + / - </td>
        <td width="79">Remarks</td>
        <td width="85">Shipment</td>
        <td width="69">Ship Date</td>
 
    </tr>
    <?php
 
  


	if(isset($_POST['filter']))
	{
	   // $sql =mysql_query("SELECT * FROM cm  INNER JOIN daily_plan  ON cm.pjt_no = daily_plan.pjtno AND design=pattern AND item=itemno WHERE $where AND belt !='D' AND plan_status='0'  ORDER BY cm.id,design, item,chit_no  ")or die ("err");
	  
	  
	    $sql =mysql_query("SELECT * FROM cm  LEFT OUTER JOIN daily_plan  ON cm.pjt_no = daily_plan.pjtno AND design=pattern AND item=itemno WHERE $where AND belt !='D' AND plan_status='0'  ORDER BY cm.id,design, item,chit_no  ")or die ("err");
	   
	    
	 }
 
   
	
	while ($r4 = mysql_fetch_assoc($sql)) { 
	
  	 $id=$r4['id']-1;
	
	$qty+=$r4['qty'];

	  
 ?>
   <tr onMouseOver="style.backgroundColor='#84DFC1'"  onmouseout="style.backgroundColor=''" >
      <td nowrap="nowrap"><?php print $r4['fdate']; ?></td>
      <td nowrap="nowrap"><?php print $r4['pjt_no']; ?></td>
      <td><?php print $r4['chit_no']; ?></td>
      <td><?php print $r4['current_stage']."-".$r4['process']; ?></td>
      <td nowrap="nowrap"><?php 
	  if($r4['bbelt']==NULL)
	  print "&nbsp;";
	  else
	  print $r4['bbelt']; ?></td>
      <td><?php 
	   if($r4['distant']==NULL)
	  print "&nbsp;";
	  else print $r4['distant']; ?></td>
      <td><?php print $r4['design']; ?></td>
      <td><?php print $r4['item']; ?></td>
      <td><?php 
	  
	  if( $r4['process']=='Dec'  & $r4['current_stage']=='1')
	 {
	      $pro_qty=$r4['pro_qty'];
	 }
	  else
	  {
		  $sql2 =mysql_query("SELECT qty FROM cm  WHERE id='$id'")or die ("err");
		    
		   while ($r8 = mysql_fetch_array($sql2))  
		   {
		  $pro_qty= $r8[0];
			 }
		    
		  } 
	echo  $pro_qty; 
	
  $pro_qty2+=$pro_qty;
	  
	   ?></td>
      <td><?php print round(($r4['distant']/60) ,2); ?></td>
      <td><?php 
	   if($r4['yeild']==NULL)
	  print "&nbsp;";
	  else 
	   print $r4['yeild']; ?></td>
      <td><?php print $r4['qty']; ?></td>
      <td><?php print $r4['qty']-$pro_qty ; ?></td>
      <td><?php 
	  if($r4['remarks']==NULL)
	  print "&nbsp;";
	  else 
	  print $r4['remarks']; ?></td>
      <td><?php
	  if($r4['shipment']==NULL)
	  print "&nbsp;";
	  else 
	   print $r4['shipment']; ?></td>
      <td nowrap="nowrap"><?php print $r4['ship_date']; ?></td>
    </tr>
    
   <?php
	
} 
?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp; </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong>
        <?php  echo $pro_qty2;?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong>
        <?php  echo $qty;?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
     
    </tr>
    <?php  if(mysql_num_rows($sql)<1)
 {
	 echo "<p>-- No Results --</p>"; 
	exit();	 }?>
  </table>
</div>
<?php
  } ?>
</center>
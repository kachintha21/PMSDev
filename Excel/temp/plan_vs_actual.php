<?php
  session_start();
 
 error_reporting(0);
  include("database_connections.php");
  
  if(isset($_POST['filter']))
{
 
	$_SESSION['sdate']=str_replace("-","",$_POST['sdate']);
	  $table="plan_".$_SESSION['sdate'];
	}
	else
	{
	$_SESSION['sdate']=str_replace("-","",date("Y-m-d"));
   	$table="plan_".$_SESSION['sdate'];	
}

 
   
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
	padding:7px;
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
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
 
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
document.country="";

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
<input type="submit" name="filter" id="filter" value="Filter" />
  </label>
 &nbsp;&nbsp;&nbsp; 
 <input type="button" value="Reset" onclick="javascript:window.location.href='plan_vs_actual.php'" />
</form></form></p>
<a href="print_x1.php?pdate=<?php print $pdate; ?>&table=<?php print $table; ?>  " target="_new">print this page </a>
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
	?>
    
<center> <font face="Lucida Sans Unicode, Lucida Grande, sans-serif" size="6px"><u> Daily Plan Vs Actual as at <?php

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
  <table width="895" height="82" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
 
 <td width="78">Pjt No</td>
      <td width="58">Pattern</td>
      <td width="86">Item No</td>
      <td width="46">Pro_Qty</td>
      <td width="46">Belt</td>
      <td width="65">Yeild</td>
      <td width="92">Priority</td>
      <td width="90">Deco 1 </td>
      <td width="90">Kiln 1 </td>
      <td width="90">Deco 2 </td>
            <td width="90">Kiln 2 </td>
      <td width="90">Deco 3 </td>
      <td width="90">Kiln 3 </td>
        <td width="90"> Ins </td>
 
    </tr>
    <?php
 
  
	if(isset($_POST['filter']))
	{
		
		if(($_POST['pattern']!=NULL)  &  ($_POST['item']==NULL ) &  ($_POST['sdate']!=NULL ))
		{
			  $pattern=$_POST['pattern'];
			  
			$sql =mysql_query( "SELECT $table.pjtno, $table.pattern, $table.itemno,$table.belt,$table.belt, $table.pro_qty, $table.yeild, $table.priority, progress.deco_1_qty, progress.deco_2_qty, progress.deco_3_qty, progress.kiln_1_qty, progress.kiln_2_qty, progress.kiln_3_qty, progress.ins_qty
	FROM $table LEFT JOIN progress ON ($table.itemno = progress.itemno) AND ($table.pattern = progress.pattern) AND ($table.pjtno = progress.pjtno)   WHERE $table.pattern ='$pattern' ORDER BY pattern,itemno"); 
			}
			
			else 	if(($_POST['pattern']==NULL)  &  ($_POST['item']!=NULL )&  ($_POST['sdate']!=NULL ))
		{
			$item=$_POST['item'];
			
			$sql =mysql_query( "SELECT $table.pjtno, $table.pattern, $table.itemno,$table.belt, $table.pro_qty, $table.yeild, $table.priority, progress.deco_1_qty, progress.deco_2_qty, progress.deco_3_qty, progress.kiln_1_qty, progress.kiln_2_qty, progress.kiln_3_qty, progress.ins_qty
	FROM $table LEFT JOIN progress ON ($table.itemno = progress.itemno) AND ($table.pattern = progress.pattern) AND ($table.pjtno = progress.pjtno)  WHERE $table.itemno ='$item' ORDER BY pattern,itemno"); 
	
			}
			else 	if(($_POST['pattern']!=NULL)  &  ($_POST['item']!=NULL )&  ($_POST['sdate']!=NULL ))
		{
			$item=$_POST['item'];
			$pattern=$_POST['pattern'];
			
			$sql =mysql_query( "SELECT $table.pjtno, $table.pattern, $table.itemno,$table.belt, $table.pro_qty, $table.yeild, $table.priority, progress.deco_1_qty, progress.deco_2_qty, progress.deco_3_qty, progress.kiln_1_qty, progress.kiln_2_qty, progress.kiln_3_qty, progress.ins_qty
	FROM $table LEFT JOIN progress ON ($table.itemno = progress.itemno) AND ($table.pattern = progress.pattern) AND ($table.pjtno = progress.pjtno)  WHERE $table.pattern ='$pattern' AND $table.itemno ='$item' ORDER BY pattern,itemno"); 
			}
			else 	if(($_POST['pattern']==NULL)  &  ($_POST['item']==NULL )&  ($_POST['sdate']!=NULL ))
		{
			 
			
			$sql =mysql_query( "SELECT $table.pjtno, $table.pattern, $table.itemno,$table.belt, $table.pro_qty, $table.yeild, $table.priority, progress.deco_1_qty, progress.deco_2_qty, progress.deco_3_qty, progress.kiln_1_qty, progress.kiln_2_qty, progress.kiln_3_qty, progress.ins_qty
	FROM $table LEFT JOIN progress ON ($table.itemno = progress.itemno) AND ($table.pattern = progress.pattern) AND ($table.pjtno = progress.pjtno)   ORDER BY pattern,itemno"); 
	
			}
			
			
		
	}
	 else
	 {
		 
		$sql =mysql_query( "  SELECT $table.pjtno, $table.pattern, $table.itemno,$table.belt, $table.pro_qty, $table.yeild, $table.priority, progress.deco_1_qty, progress.deco_2_qty, progress.deco_3_qty, progress.kiln_1_qty, progress.kiln_2_qty, progress.kiln_3_qty, progress.ins_qty
	FROM $table LEFT JOIN progress ON ($table.itemno = progress.itemno) AND ($table.pattern = progress.pattern) AND ($table.pjtno = progress.pjtno) ORDER BY pattern,itemno");
	 }
 


  
	while ($r4 = mysql_fetch_assoc($sql)) { 
	
	$deco_1_qty+=$r4['deco_1_qty'];
	$deco_2_qty+=$r4['deco_2_qty'];
	$deco_3_qty+=$r4['deco_3_qty'];
	$kiln_1_qty+=$r4['kiln_1_qty'];
	$kiln_2_qty+=$r4['kiln_2_qty'];
	$kiln_3_qty+=$r4['kiln_3_qty'];
	$ins_qty+=$r4['ins_qty'];
 ?>
    <tr>
      <td><?php print $r4['pjtno']."&nbsp;"; ?></td>
      <td><?php print $r4['pattern']."&nbsp;"; ?></td>
      <td><?php print $r4['itemno']."&nbsp;"; ?></td>
      <td><?php print $r4['pro_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['belt']."&nbsp;"; ?></td>
      <td><?php print $r4['yeild']."&nbsp;"; ?> </td>
      <td><?php print $r4['priority']."&nbsp;"; ?></td>
      <td><?php print $r4['deco_1_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['deco_2_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['deco_3_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['kiln_1_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['kiln_2_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['kiln_3_qty']."&nbsp;"; ?></td>
      <td><?php print $r4['ins_qty']."&nbsp;"; ?></td>
    </tr>
    
   <?php
	
} 
?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp; </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td><td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong>
        <?php  echo $deco_1_qty;?>
      </strong></td>
      <td><strong>
        <?php  echo $deco_2_qty;?>
      </strong></td>
      <td><strong>
        <?php  echo $deco_3_qty;?>
      </strong></td>
      <td><strong>
        <?php  echo $kiln_1_qty;?>
      </strong></td>
      <td><strong>
        <?php  echo $kiln_2_qty;?>
      </strong></td>
      <td><strong>
        <?php  echo $kiln_3_qty;?>
      </strong></td>
      <td><strong>
        <?php  echo $ins_qty;?>
      </strong></td>
     
    </tr><?php  if(mysql_num_rows($sql)<1)
 {
	 echo "<p>-- No Results --</p>"; 
	exit();	 }?>
  </table>
</div>
</center>
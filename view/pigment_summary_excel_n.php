<?php session_start();
	date_default_timezone_set('Asia/Colombo');
	error_reporting(0);
 	include("database_connections.php");
	
?>




<center>
<h3><u>Green Ware Minus Report -  <?php print $from." to ".$to; ?></u></h3></center>
<a href="packer_remaining_forming.php" >
	<img src="../images/back.png"  width="30" height="30"  /> 
</a>
<button hidden id="button6" name="button6" class="button6">Download Shipment Excel</button>
<button hidden  id="button1" name="button1" class="button1">Download WW Excel</button>
<button hidden id="button2" name="button2" class="button2">Download Glazed Excel</button>
<button hidden id="button4" name="button4" class="button4">Download Biscuit Excel</button>
<button hidden id="button5" name="button5" class="button5">Download Green Ware Excel</button>
<button hidden id="button7" name="button7" class="button7">Download Decal Excel</button>
<center>
	<table  id="table2excelship">
  <tr>
    <td width="90" nowrap="nowrap"><strong>Design</strong></td>
    <td width="90" nowrap="nowrap"><strong>Colour Code</strong></td>
    <td width="94" nowrap="nowrap"><strong>Colour Name</strong></td>
    <td width="222" nowrap="nowrap"><strong>Mesh</strong></td>
    <td width="50" nowrap="nowrap"><strong>Pigmant Name</strong></td>
	<td width="90" nowrap="nowrap"><strong>Pigmant Ratio</strong></td>
    <td width="94" nowrap="nowrap"><strong>Temprerature 1</strong></td>
    <td width="222" nowrap="nowrap"><strong>Temprerature 2</strong></td>
    <td width="50" nowrap="nowrap"><strong>Temprerature 3</strong></td>
  </tr>
  <?php

  $q2=mysqli_query($con,"SELECT *,GROUP_CONCAT(pigment_name_ct) as pigmant_name,GROUP_CONCAT(qty_ct) as ratio FROM pigment_master_tbl a
LEFT JOIN colours_tbl b 
ON a.pattern_pm=b.pattern_no_ct
AND a.colours_pm =b.colours_code_ct
GROUP BY a.ref_no_pm,colours_pm
ORDER BY a.pattern_pm,a.colours_pm ");

 
while($arr=mysqli_fetch_array($q2)) 
 {
               
               
  ?>
  <tr>
    <td nowrap="nowrap" align="left"><?php print $arr['pattern_pm'];?></td>
    <td nowrap="nowrap" align="left"><?php print $arr['colours_pm'];?></td>
    <td nowrap="nowrap" align="left"><?php print $arr['colours_name_pm'];?></td>
    <td nowrap="nowrap"><?php print $arr['screen_mesh_pm'];?></td>
    <td nowrap="nowrap"><?php print $arr['pigmant_name'];?></td>
	<td nowrap="nowrap"><?php print $arr['ratio'];?></td>
    <td nowrap="nowrap"><?php print $arr['item01_pm'];?></td>
	<td nowrap="nowrap"><?php print $arr['item02_pm'];?></td>
    <td nowrap="nowrap"><?php print $arr['item03_pm'];?></td>
  </tr>
  <?php
 
}
  ?>
  
</table>

	
	<script src="src/jquery.min2.js"></script>
	<script src="src/jquery.table2excel.js"></script>
	
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	
	<link rel="stylesheet" href="css/jquery-ui.css">
	
	
	<script type='text/javascript' >
		//alert(3333);				
		
		
	</script>
	
	<script type='text/javascript'>
	
		$("#table2excelship").table2excel({
			
			// exclude CSS class
			exclude: ".noExl",
			name: "Worksheet Name",
			filename: "Pigment_summary" //do not include extension
		});
		
		
	</script>
	
	
	
	
	
	<p>&nbsp;</p>
</center>
<?php
	//$filename="White Ware Minus Plan".$from."_".$to; 
	//$filename ="$filename.xls"; 
	//$contents = "testdata1 \t testdata2 \t testdata3 \t \n"; 
	//header('Content-type: application/ms-excel'); 
	//header('Content-Disposition: attachment; filename='.$filename);
	
?>																
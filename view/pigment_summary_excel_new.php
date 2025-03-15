

<?php
date_default_timezone_set("Asia/Colombo");  
	include("database_connections.php");


               
              
?>

<h3>ITEM WISE STOCK REPORT  </h3>

<h3>Stock Report as at   <?php print date("Y-m-d"); ?> </h3>

  
<table  id="tb_data">
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
ORDER BY a.pattern_pm,a.colours_pm limit 10");

 
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

   <?php

    ?>
	<script src="src/jquery.min2.js"></script>
	<script src="src/jquery.table2excel.js"></script>
	
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	
	<link rel="stylesheet" href="css/jquery-ui.css">
	
	
	<script type='text/javascript'>
	
		$("#tb_data").table2excel({
			
			// exclude CSS class
			exclude: ".noExl",
			name: "Worksheet Name",
			filename: "Pigment_summary.xls" //do not include extension
		});
		
		
	</script>
	
	

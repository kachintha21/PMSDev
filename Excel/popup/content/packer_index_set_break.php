<?php
include("database_connections.php");
?>

<div id='homer' style="background:url(popup/content/homer.jpg) right center no-repeat #ececec;  padding:30px 10px;">
    
	<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#CCCCCC">ORCASENO</td>
    <td bgcolor="#CCCCCC">ORORDNO</td>
    <td bgcolor="#CCCCCC">ORPATT</td>
    <td bgcolor="#CCCCCC">ORITEM</td>
    </tr>
  
  <?php
   $sql=mysql_query("SELECT * FROM set_master_break WHERE Pattern='4837' AND setItem='T029N'");
   
   
		while($row=mysql_fetch_array($sql))
		{
  ?>
  <tr>
    <td><?php print $row[1];?></td>
    <td><?php print $row[2];?></td>
    <td><?php print $row[3];?></td>
    <td><?php print $row[4];?></td>
    </tr>
  <?php
  
		}
		
		?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>


  
  
</div>
<script type='text/javascript'>
    $('#homer strong').css({color:'red'});
</script>
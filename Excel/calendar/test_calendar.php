<?php
require_once('calendar/classes/tc_calendar.php');

header ( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header ("Pragma: no-cache");
?>

<?php
header ( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header ("Pragma: no-cache");

$mydate = isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";

echo("value of date submit = ".$mydate);

echo("<p>Press Back button to go back</p>");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TriConsole : PHP Calendar Date Picker</title>
<script language="javascript" src="calendar/calendar.js"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css">
</head>

<body>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="0" cellpadding="2">
<tr>
<td><font size='1px'>Date :</font>	</td>
<td><?php
$myCalendar = new tc_calendar("date5", true, false);
$myCalendar->setIcon("calendar/images/iconCalendar.gif");
$myCalendar->setPath("calendar/");
$myCalendar->setYearInterval(2000, 2015);
$myCalendar->dateAllow('2011-01-1', '2015-12-31');
$myCalendar->setDateFormat('j F Y');
$myCalendar->writeScript();
?></td>
<td>&nbsp;</td>
</tr>
</table>
<p>

<input type="submit" name="Submit" value="Submit" />
</p>
</form>
</body>
</html>

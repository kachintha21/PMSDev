<?php
header ( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header ("Pragma: no-cache");

$mydate = isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";

echo("value of date submit = ".$mydate);

echo("<p>Press Back button to go back</p>");
?>

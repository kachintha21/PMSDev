<?php
error_reporting(E_PARSE | E_WARNING | E_ERROR);
include('../include/db.php');
include("../include/db_config.php");
include("../include/conn.php");
include_once("lib/phpgraphlib.php");
include_once("../model/ColorSeparation.class.php");
include_once("../model/LayoutInspection.class.php");
include_once("../model/PreparingLayout.class.php");
include_once("../model/FilmOuting.class.php");
$pl = new PreparingLayout(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$fo = new FilmOuting(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$cs = new ColorSeparation(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$li = new LayoutInspection(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


date_default_timezone_set("Asia/Shanghai");
?>
<?php


$mname="M-700";

$date = date("Y-m-d");
$time = date("Y-m-d H:i:s");
$yesterday = date('Y-m-d', time() - 86400);
$now_time = date("H:i:s");
$last_TimeStr = '00.00.00';

$cur_TimeStr = $now_time;
$last_TimeStr = "00:00:00";
$TimeInt = strtotime($cur_TimeStr) - strtotime($last_TimeStr);
$hrs = $TimeInt / 3600;


$data = array();

$graph = new PHPGraphLib(1000, 400, 'img/kecs_wip.png');



$data = array(
"Layout Film outing" =>$fo->getWipFilmOuting($mname),
"Color separation" =>$cs->getWipColorSeparation($mname),
    "Layout inspection " =>$li->getWipLayoutInspection($mname)
 );
 


$graph->setBackgroundColor("black");
$graph->addData($data);
$graph->setTextColor("maroon");
$graph->setTitle('Process Vs WIP Quantity Up to (' . $time . ')');
$graph->setTitleLocation("left");
$graph->setTitleColor('white');
$graph->setupYAxis(10, 'yellow');
$graph->setupXAxis(50, 'yellow');
$graph->setGrid(false);
$graph->setRange(1000, 0);
$graph->setDataPointSize(5);
$graph->setDataValues(true);
$graph->setGoalLineColor("red");

$graph->setDataValues(true);
$graph->setDataValueColor("white");

$graph->setLegend(true);
$graph->setLegendTitle("P-Name,Y-Qty ", "Pears");
$graph->setLegendColor("white");
//$graph->setGoalLine(80, "red", "solid");
$graph->setXValuesHorizontal(false);
$graph->setBars(true);
$graph->setLineColor("aqua", "red", "blue");
//$graph->setLineColor("navy", "red","blue");
$graph->setBarOutlineColor('white');
$graph->setTextColor('white');
$graph->setDataPoints(true);
$graph->setDataPointColor('yellow');
$graph->setLine(false);
$graph->setLineColor('yellow');
$graph->createGraph();
?>
<div onmouseover="stop_slider()" onmouseout="start_slider();"><img src="img/kecs_wip.png"  class="image_graph"   style="width:100%; height:100%"/></div>

<?php ?>

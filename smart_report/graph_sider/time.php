<?php
error_reporting(E_PARSE|E_WARNING|E_ERROR);
include('../include/db.php');
include_once("lib/phpgraphlib.php");
     date_default_timezone_set("Asia/Shanghai");
$pc_date=date("Y-m-d"); 
?>

<?php



 	  $sql_final="SELECT
		 SUBSTRING(time_pmf,1,2)  AS `time`,
				SUM(IF(
				total_jud_pmf='OK'  
				   ,1,0)) AS `ok_qty`,
			   
			   
			 SUM(IF(
				 total_jud_pmf='NG' 
			  ,1,0)) AS `ng_qty`,
			 
			 
			 
			 
			   SUM(IF(
				total_jud_pmf='OK'  	  			      OR
				total_jud_pmf='NG'  	  			
				
								
			   ,1,0)) AS `total_qty`
		   FROM  pmf_tbl WHERE date_pmf='".$pc_date."'
		  GROUP BY SUBSTRING(time_pmf,1,2)   " ;

	   
 
 
  $res_final=mysql_query($sql_final);
  
  $data2 = array();
 // $data3 = array(); 
  
  $graph = new PHPGraphLib(1000,400, 'img\graph_img\pmf_time.png');


   if(mysql_num_rows($res_final)>0){

    $sum2=0;
  for ($y = 0; $y <mysql_num_rows($res_final); $y++)
  {
  
    //$data1[mysql_result($res_final,$x,'time')."-".(mysql_result($res_final,$x,'time')+1)] = mysql_result($res_final,$x,'ok_qty');
  
  
   $sum2+= mysql_result($res_final,$y,'ok_qty');
   $data2[mysql_result($res_final,$y,'time')."-".(mysql_result($res_final,$y,'time')+1)] =$sum2;
  
  
  
  
  //$data3[mysql_result($res_final,$y,'time')."-".(mysql_result($res_final,$y,'time')+1)] =colimator_target(mysql_result($res_final,$y,'time'));
    
  
  
  
  
  }
  }
  else{
   $data2["production is not available "] =0;
   $data3["production is not available "] =0;
   
  }
$graph->addData($data2,$data3);
$graph->setBackgroundColor("black");
$graph->setBarColor('255,255,204');
$graph->setTitle('PMF Process Time Vs Qty(Today) report ');
$graph->setDataPointSize(5);
$graph->setTitleLocation("left"); 
$graph->setLegendTitle("X-Time[H],Y-Qty ", "Pears");
$graph->setTitleColor('white');
$graph->setupYAxis(6, 'yellow');
$graph->setupXAxis(22, 'yellow');
$graph->setXValuesHorizontal(true);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor('maroon');
$graph->setGrid(false);
$graph->setRange(1500,0);
$graph->setDataValues(true);
$graph->setDataValueColor("white");
$graph->setDataValueColor("white");
$graph->setLegend(true);
$graph->setLegendTitle('Actual', 'Target', 'Target');
$graph->setLegendColor("white");
$graph->setXValuesHorizontal(true);
$graph->setBars(false);
$graph->setBarOutlineColor('white');
$graph->setTextColor('white');
$graph->setDataPoints(true);
$graph->setDataPointColor('yellow');
$graph->setLine(true);
$graph->setLineColor("White", "aqua","blue");
$graph->createGraph();

?>
<div onmouseover="stop_slider()" onmouseout="start_slider();"><img src="img\graph_img\pmf_time.png"  class="image_graph"   style="width:100%; height:100%"/></div>
	<?php

?>

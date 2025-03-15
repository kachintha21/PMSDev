<?php
session_start();

if(isset($_POST['sdate']))
{
 
	$_SESSION['sdate']=str_replace("-","",$_POST['sdate']);
	  $table="plan_".$_SESSION['sdate'];
	}
	if(isset($_SESSION['sdate']))
		{
 
	   $table="plan_".$_SESSION['sdate'];
	}
	else
	{
	$_SESSION['sdate']=str_replace("-","",date("Y-m-d"));
	  $table="plan_".$_SESSION['sdate'];	
}


 include("database_connections.php");
 
   $q2=mysql_query("DELETE FROM  $table WHERE pjtno =''  and pattern ='' AND itemno ='' and belt=''   and shipment='' ");
  
  mysql_query("ALTER TABLE $table DROP `id`;");
  mysql_query("ALTER TABLE $table AUTO_INCREMENT = 1; ");
  mysql_query("ALTER TABLE $table ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ");
  
  
  
  


/*


$query06 = mysql_query("select DISTINCT design FROM item_master") or die ("err1");
$pattern=array();
 
	while($row06 = mysql_fetch_array($query06)) {
    $pattern[] = array($row06[0]) ;
	}
      $pattern = json_encode ($pattern);	
	
	  $pattern=str_replace("[","",$pattern);
	  $pattern=str_replace("]","",$pattern);
	  $pattern="[".$pattern."]";
	  
$query07 = mysql_query("select DISTINCT item FROM item_master") or die ("err2");
$item=array();
 
	while($row07 = mysql_fetch_array($query07)) {
    $item[] = array($row07[0]) ;
	}
      $item = json_encode ($item);	
	
	  $item=str_replace("[","",$item);
	  $item=str_replace("]","",$item);
	  $item="[".$item."]";
	
 */
 
$query05 = mysql_query("select dname FROM destinations") or die ("err");
$dest=array();
 
	while($row05 = mysql_fetch_array($query05)) {
    $dest[] = array($row05[0]) ;
	}
      $dest = json_encode ($dest);	
	
	  $dest=str_replace("[","",$dest);
	  $dest=str_replace("]","",$dest);
	  $dest="[".$dest."]";   
	  
	  
?>


<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <title>DECSYS-Daily Plan :: PLAN ::</title>
 <style type="text/css">
.city {border: none;
}
</style>
 
<script type="text/javascript" src="../../jqwidgets/jquery-1.7.1.min.js"></script>
 <script src="js/jquery-latest.js"></script>

<script>
    $(document).ready(function(){
        setInterval(function() {
            
			$("#latestData").load("getTable.php");
        }, 50);
		
		  var s = $("#sticker");
    var pos = s.position();                   
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
        if (windowpos >= pos.top) {
            s.addClass("stick");
        } else {
            s.removeClass("stick");
        }
    });
	
    });

</script>


<style>
#nav ul li {
background-color: #59FF19;
border: 1px solid #000000;
margin: 0;
padding: 3px 7px;
position: relative;
}

.city {
border: none;
}
    
 </style> 
 <link rel="stylesheet" href="../../css/jquery-ui.css" />
  
<script src="../../js/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
document.country="";

</script> 
  <script src="../lib/jquery.min.js"></script>
  <script src="../dist/jquery.handsontable.full.js"></script>
  <link rel="stylesheet" media="screen" href="../dist/jquery.handsontable.full.css">
 
  
  <script src="js/samples.js"></script>
  <script src="js/highlight/highlight.pack.js"></script>
  
 
 
  <script src="js/ga.js"></script>
 <style type="text/css">
#b1, #b2, #b3 {
display: none;
}
 
.stick {
    position:fixed;
    top:0px;
}
#left {
        width: 1100px;
      
    }
    #right {
        margin-left: 1100px;
		  position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        
		
		
    }
</style>

<script src="../dist/jquery.handsontable.full.js"></script>
<script src="../lib/jquery-ui/js/jquery-ui.custom.min.js"></script>   
<link rel="stylesheet" href="css/jquery-ui.css" />
 
<link rel="stylesheet" href="css/style.css" />
 
 <link rel="stylesheet" media="screen" href="../dist/jquery.handsontable.full.css">
 <link rel="stylesheet" media="screen" href="../lib/jquery-ui/css/ui-bootstrap/jquery-ui.custom.css">  
    
</head>

<body> 
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
	?></p> 
 
<form name="form1" method="post" action="">
  <span class="cell_color">Date:
  <input type="text"  name='sdate' id="sdate" size="10" maxlength="10" value="<?php
  
   error_reporting(0);
  if(isset($_POST['sdate']))
{
 
	echo $_POST['sdate'];
	}
	else if(isset($_SESSION['sdate']))
		{
 
	  echo $edate=date( "Y-m-d", strtotime($_SESSION['sdate']) );
	} 
	else
	{
	print  date("Y-m-d");	
}



; ?>" />
  <input type="submit" name="gdate" id="button" value="Submit" />
  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href ='../../sort_table.php' onclick= "var result = confirm('really?'); if (result==true) return true; else return false;"> [Sort Belt]  </a>
  
  
 </form>
 <div id="left">
 <div id="container">
  <div class="columnLayout">

    <div class="rowLayout">
      <div class="descLayout"><h2><center>
       <p> DAILY PLAN  PLANNING  - <?php 
	   
	  if(isset($_POST['sdate']))
{
 
	echo $_POST['sdate'];
	}
	else if(isset($_SESSION['sdate']))
		{
 
	  echo $edate=date( "Y-m-d", strtotime($_SESSION['sdate']) );
	}
	else
	{
	echo date("Y-m-d");	
}



	   
	   ?></center></h2>
        
           <?php  //include("links.php"); ?>  
           
       
      </div>
    </div>

    <div class="rowLayout">
      <div class="descLayout">
        <div class="pad">
          

            
            <button name="save" style="visibility:hidden">Save</button>
            <label><input type="checkbox" name="autosave" checked="checked" autocomplete="off" style="visibility:hidden">  </label><button name="load"  style="visibility:hidden" >Load</button>
          </p>

          <div id="exampleConsole" class="console"> <font color="#006699"><b>Loading....</b></font> </div><p>

          <div id="example1"></div>

          <p>
            
          </p>
        </div>
      </div>

       
        <div class="pad">
          <script>
		  var deco = function (instance, td, row, col, prop, value, cellProperties) {
  Handsontable.TextCell.renderer.apply(this, arguments);
  $(td).css({
    background: '#F0F8FF'
  });
};

		  var plan = function (instance, td, row, col, prop, value, cellProperties) {
  Handsontable.TextCell.renderer.apply(this, arguments);
  $(td).css({
    background: '#FFF2F2'
  });
}
var getData = (function () {
  

  return function () {
    var page  = parseInt(window.location.hash.replace('#', ''), 10) || 1
      , limit = 6
      , row   = (page - 1) * limit
      , count = page * limit
      , part  = [];

    for(;row < count;row++) {
      part.push(data[row]);
    }

    return part;
  }
})();



            var $container = $("#example1");
            var $console = $("#exampleConsole");
            var $parent = $container.parent();
            var autosaveNotification;
            $container.handsontable({
	 
			  colWidths: [100, 50, 60, 100, 100, 100, 60, 60,50, 100, 100,100],
              startRows: 8,
              startCols: 12,
               rowHeaders: true,
              colHeaders: [ 'Plan Date','Belt','Distant', 'PJT No', 'Pattern', 'Item', 'Plan Qty', 'Yeild','Priority', 'Remarks', 'Shipment',  'Ship Date'],
			  
              minSpareCols: 0,
              minSpareRows: 1, 
              contextMenu: true,
			  
			   
			  
			  columns: [
    {// 1 
		 type: 'date',
      dateFormat: 'yy-mm-dd' ,
	   
	  
	},
	{ //2
       
	   
	   
    },
    {
      //3
	  
	   	  
    },
    {
	   //4
	
	  
    },
    {
		//5
	 
	   
    },
    {
       
	  
    },
    {
		
    	//7  
    },
    {
     readOnly: true,	//8 
	 type: {renderer: plan}  
    },
	{
      type: 'autocomplete',
      source: ["1", "2", "3", "4", "5"],
    },
    {
    	//9 
 
    },
    
    {
      	//11
	   type: 'autocomplete',
      source: <?php  echo $dest; ?>,
      strict: false,
	  options: {items: 50},
	  
	  
	    
    },
     
	{// 13
		 type: 'date',
      dateFormat: 'yy-mm-dd' ,
	  
	},
	
	  
  ],
			  
			  
			  
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent.find('input[name=autosave]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "php/save_deco.php",
                    dataType: "json",
                    type: "POST",
                    data: {changes: change}, //contains changed cells' data
                    success: function (data) {
                      $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console.text('Changes autosaved');
                      }, 1000);
                    }
                  });
                }
              }
			  
            });
			
			
			 
			
            var handsontable = $container.data('handsontable');

            $parent.find('button[name=load]').click(function () {
              $.ajax({
                url: "php/load_deco.php",
                dataType: 'json',
                type: 'GET',
                success: function (res) {
                  var data = [], row;
                  for (var i = 0, ilen = res.daily_plan.length; i < ilen; i++) {
                    row = [];
                     
                    row[0] = res.daily_plan[i].plandate;
					row[1] = res.daily_plan[i].belt;
                    row[2] = res.daily_plan[i].distant;

                    row[3] = res.daily_plan[i].pjtno;
                    row[4] = res.daily_plan[i].pattern;
                    row[5] = res.daily_plan[i].itemno;
					
					row[6] = res.daily_plan[i].pro_qty;
                    
                    row[7] = res.daily_plan[i].yeild;
					row[8] = res.daily_plan[i].priority;
					
					row[9] = res.daily_plan[i].remark;
                    row[10] = res.daily_plan[i].shipment;
					
			
                    row[11] = res.daily_plan[i].ship_date;
					
					 
					
                    data[res.daily_plan[i].id - 1] = row;
                  }
				  
                  handsontable.loadData(data);
                  $console.text('Data loaded');
                }
              });
            }).click(); //execute immediately

            $parent.find('button[name=save]').click(function () {
              $.ajax({
                url: "php/save_deco.php",
                data: {"data": handsontable.getData()}, //returns all cells' data
                dataType: 'json',
                type: 'POST',
                success: function (res) {
                  if (res.result === 'ok') {
                    $console.text('Data saved');
                  }
                  else {
                    $console.text('Save error');
                  }
                },
                error: function () {
                  $console.text('Save error');
                }
              });
            });

            $parent.find('input[name=autosave]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('Changes will be autosaved');
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
			
			
			
          </script>
          
        </div>
      </div>
   

    
  </div>
</div> 
     </div>
    <div id="right">
 <div id = "latestData" style="overflow:scroll;" ></div> 
            
      </div>

</td>
  </tr>
</table>

</body>
</html>
<?php
 error_reporting(E_PARSE|E_WARNING|E_ERROR);
 include("../include/db_config.php");
 include("../include/conn.php"); 
   include("../include/common.php"); 
 include("../model/CurveMaster.class.php"); 
  $cm=new CurveMaster(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
<html lang="en">

<head>
<meta charset="utf-8"/>
<title>Noritake|Layout Simulation</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->

<link href="../assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/components-rounded.css" rel="stylesheet" id="style_components" type="text/css" />

<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	  <?php
        include_once '../tpl/header.php';
          ?>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
   <?php
        include_once '../tpl/menu.php';
    ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
        <div class="page-content">
            
            
            <h3 class="page-title">Layout Simulation

                         <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="tickets_view.php"> View

</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
                                            <a href="#">Layout Simulation
 </a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	
                        
           <div class="row">
          <div class="col-md-12"> 
            <!-- BEGIN PORTLET-->
            <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption"> <i class="fa fa-gift"></i>Layout Simulation</div>
              <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
            </div>
                
                
                
                
                
               <div class="portlet-body form">
       <!-- BEGIN FORM-->
                <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >
                    
                    <input  type="hidden" class="form-control"  name="org_name_tt" id="org_name_tt"  value="<?php echo($loge_user);?>" />
                              <input  type="hidden" class="form-control"  name="depart_tt" id="depart_tt"  value="<?php echo($loge_depart);?>" />
                    
                    <div class="form-body">                    
                                              
                          <div class="form-group form-group-sm">
                            <label class="control-label col-sm-2">Ref Number<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                                <input  type="text" class="form-control" name="tickets_ref_no_tt" id="tickets_ref_no_tt"  value="<?php echo($ti->getNextTicketsRefNo("tickets_tbl","NLPL".getServerNewDate()));
                                ?>"/>                         
                           </div>                                                        
                                                     

                            
                            
                        
                        
                             
               
                        			<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
								</th>

								<th>
								 Plan Ref No
								</th>                                      
							        <th>
								Design 
								</th>                                                                
                                                                <th>
								Curve
								</th> 
							                                                            
								<th>
								Total
								</th>  
                                                                
                                                                <th>
                                                               Decal_Pattern
								</th> 
                                                                
                                                                <th>
                                                                 Curve_Area(cm2)
								</th>                                                                                                                               
								<th>                                                         
                                                                Edit
								</th>  
                                                                 <th>
								Name
								</th>                         
			                                                                                                     
								<th>
								Date
								</th> 
                                                         	 <th>
								Time
								</th>                          
                                                                
                                                               
								
                                                                </tr>
                                                                </tr>
                                                                </thead>
							<tbody>
                                                            
                                                          <?php
                                                           $query = "SELECT * FROM planning_tbl  ORDER BY id ASC";
                                                          
                                                          ?>  
                                                            
                                                            <?php
                                                            if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>
							       <tr class="odd gradeX">
								<td>
								   <input type="checkbox" class="checkboxes" value="1"/>
								</td>

								<td>
								<?php echo($row["ref_no_fdt"]);?> 
								</td>
                                        
								<td>
								<?php echo($row["design_fdt"]);?> 
								</td>
                                                         
								<td>									
							        <?php echo($row["curve_fdt"]);?> 
								</td>

							

                                                                
                                                                <td>
									<?php echo($row["total_fdt"]);?>
								</td>
                                                                
                                                                
                                                                       <td>
							         <?php
                                                                   echo($cm->getDecalNumberByRefNo($row["design_fdt"],$row["curve_fdt"]));
									
									
							              ?>
                                                                
                                                                
                                                                
                                                                <td>
							         <?php
                                                                   echo($cm->getCurveAreaByRefNo($row["design_fdt"],$row["curve_fdt"]));
									
									
							              ?>
								</td>
                                                                
                                                                
								<td>
									<?php echo($row["is_edit_fdt"]);?>
								</td>

								<td>
									<?php echo($row["org_name_fdt"]);?>
								</td>

                                                                
								<td>
									<?php echo($row["org_date_fdt"]);?>
								</td>
								<td>
									<?php echo($row["org_time_fdt"]);?>
								</td>                            
                                                                
                                                      
							</tr>
							
                                                        
                                                      <?php
                                                             }
                                                        }
                                                        ?>
							</table>
               
                        
                        
                        
                   
                
         
                    
                </form>
       
       
                <!-- END FORM-->
                <div  id="insert_response" style="color: #FF0000;  font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >
          <h3></h3>
          <p></p>
        </div>
                
            </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>   
                        
                        
                        
                        
                        
		</div>
	</div>
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- BEGIN FOOTER -->
   <?php
        include_once '../tpl/footer.php';
    ?>

<script src="../ajax_post/tickets_post.js"></script>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/form-samples.js"></script>


<script src="../script/bootstrap.min.js"></script>
<script src="script/jquery-1.11.1.min.js"></script>
<!--<script src="script/certificate_post.js"></script>-->


<script src="../js/curve_simulation.js"></script>

<script type='text/javascript'>
        $(document).ready(function(){
            $('#myForm input').keydown(function(e){
             if(e.keyCode==13){       

                if($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type')=='submit'){// check for submit button and submit form on enter press
                 return true;
                }

                $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();

               return false;
             }

            });
        });
        </script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   FormSamples.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

<?php  
error_reporting(E_PARSE|E_WARNING|E_ERROR);
 include("../include/db_config.php");
 include("../include/conn.php"); 
include("../include/common.php");
include("../model/Tickets.class.php");
include("../model/Curve.class.php");


 $ti =new Tickets(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 $cu =new Curve(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 
 
  if($_SESSION['logged_usr_id']){
    $loge_user= $_SESSION['logged_usr_id'];
       $loge_depart= $_SESSION['logged_usr_depat'];
    
   
    }

    else{
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    header("location:../index.php");
    exit();
    }
    

?>


<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Noritake|Production Requirement <?php echo($_POST['tickets_ref_no_tt']."414");?> </title>
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
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	  <?php
        include_once '../tpl/header.php';
          ?>
	<!-- END HEADER INNER -->
</div>
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
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Production Requirement 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="note note-success">
						<p>
							 Please try to re-size your browser window in order to see the tables in responsive mode.
						</p>
					</div>

					<div class="portlet-body form">
       <!-- BEGIN FORM-->
                <form action="table.php" class="form-horizontal form-bordered" method="post" id="myForm" >
                    
                    <input  type="hidden" class="form-control"  name="org_name_tt" id="org_name_tt"  value="<?php echo($loge_user);?>" />
                              <input  type="hidden" class="form-control"  name="depart_tt" id="depart_tt"  value="<?php echo($loge_depart);?>" />
                    
                    <div class="form-body">                    
                                              
                          <div class="form-group form-group-sm">

                            <div class="col-sm-2">
                                <input  type="text" class="form-control" name="dec_patt"  placeholder='Design No'  id="dec_patt" 
                                /> 
								
								                        
						   </div>
						   
						   

                            <div class="col-sm-2">
                                <input  type="text" class="form-control" name="dec_curve" placeholder='Curve No' id="dec_curve" />  
						   </div>
						   
						   <div class="col-sm-2">
                     <input type="text" class="form-control" name="item" id="item" placeholder='item Name' maxlength="20"/>                           
                           </div>


                            <div class="col-sm-2">
                     <input type="date" class="form-control" name="ORNYDATE" id="ORNYDATE"  maxlength="20"/>                           
                           </div>




						   <div class="col-sm-2">
 

						   <button type="submit" class="btn btn-info"  onClick="return form_submit();">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>

                           </div>

                                                     
                         </div>
                        
                   
                         
                        
                 
                   
                
                        
                  <div class="form-actions">
             
              </div>
                    
                </form>
       
       
                <!-- END FORM-->
                <div  id="insert_response" style="color: #FF0000;  font-family: Tahoma; font-size: 12px;  font-weight: bold; text-align: left; " >
          <h3></h3>
          <p></p>
        </div>
                
            </div>

					
					<!-- BEGIN SAMPLE TABLE PORTLET-->
				
				
					<!-- END SAMPLE TABLE PORTLET-->
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Production Requirement 
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
							<table class="table table-striped table-bordered table-hover"  >
								 <table class="table table-striped table-bordered table-hover table-checkable order-column" id="checkbox-table" >
                                            <thead style="background-color: lightgray; text-align:center;">
                                                <tr>
                                                  <td rowspan="2" style="font-size:11px; padding:0px;">Design</td>
													<td rowspan="2" style="font-size:12px; padding:4px;">Curve</td>	
													<td rowspan="2" style="font-size:12px; padding:4px;">Item</td>	

										
													
																<?php 
														for($i=0;$i<10;$i++){
											
																?>
                                                    
														<td colspan="4" style="font-size:12px; padding:4px;">
														<input type="checkbox" id="K<?php echo($i);?>" />
														
														
														<a href="#" ><?php echo("202004".$i); ?><a></td> 	
													
													   <?php } ?>
													   

													   
                           							  </tr>
												
								
												             <tr>



													      <?php 
								                          for($i=0;$i<10;$i++){
								 
								                           ?>
														<td style="font-size:12px; padding:px;" colspan="4" ><?php echo("KKJ".$i); ?></td>	
														<?php } ?>




														<td style="font-size:12px; padding:px;" colspan="4" >Total</td>


														
														
														

													</tr>
												
                                            </thead>
                                            
                                            
			       
                                            
                                            
                                            <tbody>


								          
											<?php
                                                      /*  $query = "SELECT * FROM tbl_minus_report_dec_final WHERE dec_patt='".$_POST['dec_patt']."' OR
														dec_curve ='".$_POST['dec_curve']."' OR
														item  ='".$_POST['item']."' OR
														ORNYDATE = '".$_POST['ORNYDATE']."' 
														
														
														 Limit 1000 ";*/


$query = "SELECT * FROM tbl_minus_report_dec_final 


 Limit 20 ";




                                                          
                                                          ?>  
                                                            
                                                            <?php
                                                            if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>
								    

												<tr id="<?php echo($row["id"]);?>">
												<td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["dec_patt"]);?></td>                                                                            
												 <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo($row["dec_curve"]);?></td>	
												 <td style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;"><?php echo(($row["item"]));?></td>	
								

												 
											     <?php 
								                    for($k=0;$k<10;$k++){							 
								                     ?>
								                    <td class="<?php echo("K".$k);?>_<?php echo($row["id"]); ?>"    style="text-align:left; font-size:11px; padding:4px; word-wrap:break-word; width:10%;" ><?php echo('2');?></td>
										
												     <?php
												  
								                     }
												 
												   ?>



										            <td  colspan="4"  class="total_<?php echo($row["id"]);?>"></td>	


											
															  

															  </tr>
												
															  <?php
												  
												}
											}	   
															   ?>


                                    </tbody>
										</table>
										
										


							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->


	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
        include_once '../tpl/footer.php';
    ?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>\
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
    $('#checkbox-table input:checkbox').click(function () {
		   
		

        var checked = $(this).is(":checked"); // if the checkbox is ticked or not
		var columnId = $(this).attr('id');


        $('#checkbox-table tbody tr').each(function(index, tr) {
            var rowId = $(tr).attr('id');
            var value = parseInt($('.' + columnId + '_' + rowId).html());
            var total = parseInt($('.total_' + rowId).html());
            if (isNaN(total)) {
                total = 0;
            }
            console.log(parseInt(total));
            if (checked) {
                total = total + value;
                $('.total_' + rowId).html(total);
            } else {
               // total = total - value;
                //$('.total_' + rowId).html(total);
            }
        });
    });
	
	
</script>
</body>





<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
});
</script>



<!-- END BODY -->
</html>
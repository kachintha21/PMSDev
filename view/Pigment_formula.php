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
<html lang="en">

<head>
<meta charset="utf-8"/>
<title>Noritake|Pigment Formula</title>
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
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

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
            
            
            <h3 class="page-title">Pigment Formula

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
                                    <a href="#">Pigment Formula
                                         </a>
					</li>
				</ul>
			
			</div>
	
                        
           <div class="row">
          <div class="col-md-12"> 
            <!-- BEGIN PORTLET-->
            <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption"> <i class="fa fa-gift"></i>Pigment Formula</div>
              <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
            </div>
                
                
                
                
                
               <div class="portlet-body form">
       <!-- BEGIN FORM-->
                <form action="#" name="frmPurchaseRequestAddEdit" class="form-horizontal form-bordered" id="myForm" >
                    
                    <input  type="hidden" class="form-control"  name="org_name_tt" id="org_name_tt"  value="<?php echo($loge_user);?>" />
                              <input  type="hidden" class="form-control"  name="depart_tt" id="depart_tt"  value="<?php echo($loge_depart);?>" />
                    
                    <div class="form-body">                    
                                              
                          <div class="form-group form-group-sm">
                            <label class="control-label col-sm-2">Patten No<span style="color: crimson;"> *</span></label>
                            <div class="col-sm-2">
                                <input  type="text" class="form-control" name="tickets_ref_no_tt" id="tickets_ref_no_tt"  
                               />                         
                           </div>                                                     
                                                 
                         </div>
                        
        
                        
                        
    <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
                <th class="text-center"> # </th>
                <th class="text-center">Pigment Order No</th>
                 <th class="text-center">Color Name</th>
                <th class="text-center"> Screen Mesh</th>
                <th class="text-center">Required Layout </th>            
                <th class="text-center"> Curve Area(cm2) </th>
            <th class="text-center"> Total Curve Area (cm2)  </th>
          </tr>
        </thead>
        <tbody>            
                                                            <?php
                                                        $query = "SELECT * FROM tbl_minus_report_dec_final  ";
                                                          
                                                          ?>  
                                                            
                                                            <?php
                                                            if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>
            
          <tr id='addr0'>
     
          <td>1</td>
                            <td>
                                       <select name="product[]" id="product[]" class="form-control product">
                                    <option value="">-Select-</option>
                                <?php 
                           							 
		            
                                                            if ($result = $conn->query($query)) {
                                                             while ($row = $result->fetch_assoc()) {
                                                            
                                                            ?>
                                    <option data-price="<?php
                                    
                                    
                                    
                                    
                          
                          
                          
                          ?>"  data-name="<?php  echo $row["curve_qty_ot"]; ?>"    value="<?php echo $row["curve_no_ot"]; ?>">
                         <?php   echo($row["curve_no_ot"]); ?> </option>
                                    <?php
                                }}
                                ?>
                                </select>
                            </td>
                            <td><input type="number" name='name[]' id='name[]' placeholder='Shipment Qty'  type="text"  class="form-control name" /></td>
                            
                           <td><input type="number" name='qty[]' id='qty[]' placeholder='Required Curve Qty' class="form-control qty"
                                       step="0" min="0"/></td>
                           
                             <td><input type="number" name='sqty[]' id='sqty[]' placeholder='Sheet Curve Qty' class="form-control sqty"
                                       step="0" min="0"/></td>
                           
                                       
                                       
                                       
                           <td><input type="number" name='price[]' id="" placeholder='Curve Area(cm2)'
                                       class="form-control price" readonly step="0.00" min="0"/>
                            </td>
                            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total"
                                       readonly/></td>
                        </tr>

    
                        <?php
                    }
                            }
                        ?>



          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
                        
                        <div class="row clearfix">
    <div class="col-md-12">
      <button id="add_row" type="button" class="btn btn-default pull-left">Add Row</button>
      <button id='delete_row' type="button" class="pull-right btn btn-default">Delete Row</button>
    </div>
  </div>               

  

                        
                        
                        
                 
                        
                        
                        
                        
                        
                        
                        
                        
                         
              
                        
                        
                        
                        
             
                        
                        
                        
                        
                        
                        
                        
                             
               
                        
               
                        
                        
                        
                   
                
                        
                  <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="button" class="btn purple" onClick="return form_submit();" > <i class="fa fa-check"></i> Sava </button>
                    <button type="button" class="btn default"  onClick="this.form.reset()">Cancel</button>
                  </div>
                </div>
              </div>
                    
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
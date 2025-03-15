<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                `
            </li>
            <li class="start active open">
                <a href="javascript:;">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">


                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="title">User Management</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  "> <a href="user_view.php" class="nav-link "> <i class="icon-settings"></i> User Managed </a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="fa fa-calculator"></i>
                    <span class="title">Layout Simulator     </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">                                                                                                  
                    <li  class="nav-item  active open"> <a href="planning_tools.php" class="nav-link "> <i class="fa fa-gears"></i>  Manual Simulation </a> </li> 
                    <li  class="nav-item  active open"> <a href="remorte_db.php" class="nav-link "> <i class="fa fa-gears"></i>  Curve List </a> </li> 

<!--                     <li  class="nav-item  active open"> <a href="automated_planning_tools.php" class="nav-link "> <i class="fa fa-gears"></i> Automated Simulation  </a> </li>
                    <li  class="nav-item  active open"> <a href="simulation_amend_data.php" class="nav-link "> <i class="fa fa-gears"></i> Simulation Amend  </a> </li>  
                    <li  class="nav-item  active open"> <a href="simpulation_save.php" class="nav-link "> <i class="fa fa-gears"></i>  Simulation Final  </a> </li>-->
                    <li  class="nav-item  active open"> <a href="layout_registration_ps.php" class="nav-link "> <i class="fa fa-gears"></i>   Layout Registration  </a> </li>
<!--                    <li  class="nav-item  active open"> <a href="plan_qty_data.php" class="nav-link "> <i class="fa fa-gears"></i>  Already Plan Data  </a> </li> 
                    <li  class="nav-item  active open"> <a href="past_layout_details.php" class="nav-link "> <i class="fa fa-gears"></i> Past Simulation Data  </a> </li> -->
                    <li  class="nav-item  active open"> <a href="search.php" target="new" class="nav-link "> <i class="fa fa-gears"></i> Layout Finder 
                    
  </a> </li> 
   <li  class="nav-item  active open"> <a href="layout_box_view.php" class="nav-link "> <i class="fa fa-gears"></i>  Layout Box  </a> </li> 
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="title">Process Management</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">  

                    <li  class="nav-item  active open"> <a href="printing_order_details.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Job details[Work Order] </a> </li>  

                    <li  class="nav-item  active open"> <a href="pigment_preparation_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Pigment preparation  </a> </li>         
                    <li  class="nav-item  active open"> <a href="film_outing_ps.php" class="nav-link " target="new"> <i class="glyphicon glyphicon-briefcase"></i>  Layout Film outing </a> </li>  
                    <li  class="nav-item  active open"> <a href="screen_making_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  screen making </a> </li>
                    <li  class="nav-item  active open"> <a href="printing_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Printing  </a> </li>
                    <li  class="nav-item  active open"> <a href="qc_approval_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Printing approval </a> </li>
                    
					<li  class="nav-item  active open"> <a href="top_coat_printing_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>   Top Coat </a> </li>
                    <li  class="nav-item  active open"> <a href="qc_qc_approval_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  QC approval </a> </li>
                    
					<!-- <li  class="nav-item  active open"> <a href="decal_inspection_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>   Decal Inspection </a> </li> -->

                    <li  class="nav-item  active open"> <a href="dinspection_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Decal New Inspection </a> </li>
                    <li  class="nav-item  active open"> <a href="product_table.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>   Product Table

                        </a>
                    </li>

                    <li  class="nav-item  active open"> <a href="printing_status.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Printing Status

                        </a>
                    </li>

                </ul>                                                                                                                                                                            

            </li>

            <li>
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="title">  Production Planner </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">                                                                                                  
                  <li  class="nav-item  active open"> <a href="virtual_planner_beta.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Virtual Planner</a> </li>
                    <li  class="nav-item  active open"> <a href="virtual_actual_view.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Plan status</a> </li>
                    <li  class="nav-item  active open"> <a href="demo.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Machine Plan</a> </li>
                    <li  class="nav-item  active open"> <a href="screen_plan.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Screen Plan</a> </li>
                    <li  class="nav-item  active open"> <a href="screen_plan_new.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Screen Plan(Melody)</a> </li>
                   <li  class="nav-item  active open"> <a href="pigment_mixing_plan.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Pigment mixing plan</a> </li>
				   <li  class="nav-item  active open"> <a href="pigment_mixing_plan_new.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Pigment mixing plan(Melody)</a> </li>
				   <li  class="nav-item  active open"> <a href="virtual_planner_beta_view.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Print Plan</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/Top_coat_plan.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Top Coat Plan</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/Cut_ins_plan_new.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> New Inspection  Plan</a> </li>
				
				</ul>                                                                                                                                                                                                                                                                      

            </li>
			
			  <li>
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="title">  Decal Cut & Ins Plan </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">  
                <li  class="nav-item  active open"> <a href="/PMSDev/view/decal_ins_calendar.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Inspection Calender</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/view/decal_ins_counting.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Inspection Counting</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/view/decal_ins_cycletime_view.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i>  Inspection Cycle Time</a> </li>
				
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/Cut_ins_plan_new.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> New Inspection  Plan</a> </li>
				
				<li  class="nav-item  active open"> <a href="dinspection_ps_new.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection data(Planned)</a> </li>
				
				<li  class="nav-item  active open"> <a href="dinspection_ps_new_up.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection data(UnPlanned)</a> </li>
				<li  class="nav-item  active open"> <a href="inspection_wip.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection WIP</a> </li>
				<li  class="nav-item  active open"> <a href="inspection_plan_vs_actual.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection Plan Vs Actual</a> </li>
				<li  class="nav-item  active open"> <a href="dinspection_ps_new_2nd.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection data(2nd)</a> </li>
				<li  class="nav-item  active open"> <a href="dinspection_view_curve_wise.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection data Report With Curve</a> </li>
				<li  class="nav-item  active open"> <a href="dinspection_ps_defect.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection Defect Data </a> </li>
				
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/Yield_report.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Yield Report</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/Yield_report_curve_with_defects.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Printing Yeild Report With Curve Wise</a> </li>
				
				
				
				
				
				</ul>                                                                                                                                                                                                                                                                      

            </li>
            
            
             

            <li>
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="title">Decal Management</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">                                                                                                  


                    
                                        <li  class="nav-item  active open"> <a href="decal_received_note.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Decal Received Note</a> </li> 
                                        
                                               
                </ul>                                                                                                                                                                            

            </li>


            <li>
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="title">Pigment Management </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">                                                                                                  


                    
                                        <li  class="nav-item  active open"> <a href="pigment_issue_ps.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Pigment Issue</a> </li> 
                    
                                        <li  class="nav-item  active open"> <a href="pigment_expire_data.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Pigment expire report</a> </li> 

                                        <li  class="nav-item  active open"> <a href="pigment_transaction.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Pigment Transaction</a> </li> 
                                        
                                                                                <li  class="nav-item  active open"> <a href="color_relationships.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Color Relationships</a> </li> 
                </ul>                                                                                                                                                                            

            </li>


            <li>
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="title">Gold consumption  </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">                                                                                                 
                   
               <li  class="nav-item  active open"> <a href="atual_gold_consumpation.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Gold consumption</a> </li> 
                    

                </ul>                                                                                                                                                                            

            </li>


            <li>
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <span class="title"> Report  </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">  
                <li  class="nav-item  active open"> <a href="excel_report.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Report</a> </li>
                    <li  class="nav-item  active open"> <a href="request_report.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Report Plan V Actual</a> </li>
                    <li  class="nav-item  active open"> <a href="general_report_view.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Report[General]</a> </li>
                    <li  class="nav-item  active open"> <a href="previous_lot_report.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Report[Previously Lots]</a> </li>
                    <li  class="nav-item  active open"> <a href="transferred_lot.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Report[Transferred Lot]</a> </li>
                    <li  class="nav-item  active open"> <a href="wip.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Report[WIP]</a> </li>                  
                    <li  class="nav-item  active open"> <a href="printing_plan_details.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Printing Plan</a> </li>

                    <li  class="nav-item  active open"> <a href="decal_WIP_Reports01.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Decal WIP Report</a> </li>
					<li  class="nav-item  active open"> <a href="decal_WIP_Reports_excel.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Decal WIP Report(Excel)</a> </li>
                    <li  class="nav-item  active open"> <a href="decal_WIP_Reports01_ab.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Decal WIP Report(Abnormal)</a> </li>
                    <li  class="nav-item  active open"> <a href="decal_WIP_Reports01_ab_excel.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Decal WIP Report(Abnormal-Excel)</a> </li>
                    <li  class="nav-item  active open"> <a href="pigment_summary_excel.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Pigmant Summary(Excel)</a> </li>
                   
					<li  class="nav-item  active open"> <a href="decal_WIP_Reports02.php" class="nav-link "> <i class="glyphicon glyphicon-filter"></i> Curve WIP Report</a> </li>
					 <li  class="nav-item  active open"> <a href="/PMSDev/reports/WIP_Summary.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> WIP Summary</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/Top_coat_plan_vs_act.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Top Coat Plan Vs Actual</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/Ready_to_test_plate.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Ready TO Test Plates</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/screen_daily_actual.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Screen Daily Actual</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/machine_daily_actual.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Machine Daily Actual</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/Pigment_daily_actual.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Pigment Daily Actual</a> </li>
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/qc_daily_actual.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> QC Daily Actual</a> </li>				
				<li  class="nav-item  active open"> <a href="/PMSDev/reports/Top_coat_plan_actual_report.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Top Coat Daily Actual</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/inspection_daily_actual.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Inspection Daily Actual</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/Top_coat_plan_view.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Top Coat Plan View</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/common.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Machine Data View</a> </li>
                <li  class="nav-item  active open"> <a href="/PMSDev/reports/Wip_Details.php" class="nav-link "> <i class="glyphicon glyphicon-briefcase"></i> Testing</a> </li>
                
                </ul>                                                                                                                                                                                                                                                                     
            </li>




            <li class="nav-item"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-gears"></i> <span class="title">Administration</span> <span class="arrow "></span> </a>
                <ul class="sub-menu">
                    <li class="nav-item"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-gears"></i> Master Files <span class="arrow "></span> </a>
                        <ul class="sub-menu">


<!--                            <li class="nav-item  "> <a href="smart_report/index.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Report



                                    </span> </a> </li>-->

<!--                                    <li class="nav-item  "> <a href="layout_finder_registration.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Curve Registration 



</span> </a> </li>-->

                            <li class="nav-item  "> <a href="curve_view.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Curve Master



                                    </span> </a> </li>


                       

                    <li class="nav-item  "> <a href="yield_view.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Yield Master



                            </span> </a> </li>


                    <li class="nav-item  "> <a href="pigment_master.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Pigment Registration



                            </span> </a> </li>




<!--                    <li class="nav-item  "> <a href="pro_requirement_view.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Pro  Requirement
                            </span> </a> </li>-->



                    <li class="nav-item  "> <a href="section.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Section
                            </span> </a> </li>




                    <li class="nav-item  "> <a href="process.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Process
                            </span> </a> </li>


                    <li class="nav-item  "> <a href="lead_time.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Lead Time Master
                            </span> </a> </li> 


                    <li class="nav-item  "> <a href="defect.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Defect Master
                            </span> </a> </li> 



                    <li class="nav-item  "> <a href="pigment_csv_upload.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Pigment CSV Uplaod
                            </span> </a> </li>


                    <li class="nav-item  "> <a href="curve_csv_upload.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Curve CSV Upload
                            </span> </a> </li>


                    <li class="nav-item  "> <a href="printing_machine_master.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Machine Master
                            </span> </a> </li>   



                    <li class="nav-item  "> <a href="dryer_capacity.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Dryer Capacity
                            </span> </a> </li> 



                    <li class="nav-item  "> <a href="machine_calendar.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Machine Calendar 
                            </span> </a> </li> 

                    <li class="nav-item  "> <a href="printing_speed_master_view.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Printing Speed
                            </span> </a> </li>  

                    <li class="nav-item  "> <a href="change_over_time_view.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Change Over Log
                            </span> </a> </li>      


                    <li class="nav-item  "> <a href="lead_time.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Lead Time 
                            </span> </a> </li>   


                    <li class="nav-item  "> <a href="decal_lead_time_view.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Decal Lead time 
                            </span> </a> </li> 

                    <li class="nav-item  "> <a href="color_code_master.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Color Code Master 
                            </span> </a> </li> 
                                    
                            <li class="nav-item  "> <a href="mesh_master.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">Mesh Master
                            </span> </a> </li> 
                            
                            
                            
<!--                                <li class="nav-item  "> <a href="layout_csv_upload.php" class="nav-link " > <i class="fa fa-gears" ></i> <span class="title">CSV Layout upload 
                            </span> </a> </li> -->









                </ul>
            </li>
            <li class="nav-item"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-settings"></i> System <span class="arrow "></span> </a>
                <ul class="sub-menu">
                    <li> <a ui-sref="systemConfigurationAddEdit"> <i class="icon-wrench"></i> Configurations </a> </li>
                </ul>
            </li>
        </ul>
        </li>
            <li class="nav-item"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-settings"></i> System <span class="arrow "></span> </a>
                <ul class="sub-menu">
                    <li> <a ui-sref="systemConfigurationAddEdit"> <i class="icon-wrench"></i> Configurations </a> </li>
                </ul>
            </li>
        </ul>
        </li>


    </div>
</div>
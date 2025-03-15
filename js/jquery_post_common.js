/*modle_table*/
function submit_admin(){
	$('#insert_response').html("");				
	$.post(
		"admin_process.php", 
		{
					
		post_mname:$('#mname').val(),
		post_center_wavelength:$('#center_wavelength').val(),		
		post_add_center_wavelength:$('#add_center_wavelength').val(),		
		post_pmd_wavelength:$('#pmd_wavelength').val(),		
		post_rl_wavelength:$('#rl_wavelength').val(),		
		post_il_spic_optical_assy:$('#il_spic_optical_assy').val(),		
		post_pdl_spic_optical_assy:$('#pdl_spic_optical_assy').val(),		
		post_iso_spic_optical_assy_01:$('#iso_spic_optical_assy_01').val(),		
		post_iso_spic_optical_assy_02:$('#iso_spic_optical_assy_02').val(),		
		post_temp_in_low:$('#temp_in_low').val(),		
		post_temp_in_high:$('#temp_in_high').val(),		
		post_il_spic_inspection_low:$('#il_spic_inspection_low').val(),		
		post_pdl_spic_inspection_low:$('#pdl_spic_inspection_low').val(),		
		post_iso_spic_inspection_low:$('#iso_spic_inspection_low').val(),
		post_il_spic_inspection_high:$('#il_spic_inspection_high').val(),		
		post_pdl_spic_inspection_high:$('#pdl_spic_inspection_high').val(),		
		post_iso_spic_inspection_high:$('#iso_spic_inspection_high').val(),
		post_vee_name_inspection:$('#vee_name_inspection').val(),		
		post_vee_name_final:$('#vee_name_final').val(),		
		post_excel_name_final:$('#excel_name_final').val(),		
		post_pmd_spic:$('#pmd_spic').val(),		
		post_rl_spic:$('#rl_spic').val(),		
		post_pcc_format_no:$('#pcc_format_no').val(),		
		post_product_symbol:$('#product_symbol').val(),		
		post_sop_no:$('#sop_no').val(),	
	    post_customer_pin_no:$('#customer_pin_no').val(),	
		post_uec_no:$('#uec_no').val(),		
		post_pcc_design_name:$('#pcc_design_name').val()		

					
		},
		function(data){
			/*$('#insert_response').html(data);*/
			/*if(data==1){
			window.location="data_view.php";
            	
		   }
		   */
		 $('#insert_response').html(data);
		   if(data==1){
			window.location="data_view.php";
            	
		   }
			
		}
	);
	
}




function submit_adminUpdate(){
	$('#insert_response').html("");				
	$.post(
		"admin_edit_process.php", 
		{
		post_id:$('#id').val(),			
		post_mname:$('#mname').val(),
		post_center_wavelength:$('#center_wavelength').val(),		
		post_add_center_wavelength:$('#add_center_wavelength').val(),		
		post_pmd_wavelength:$('#pmd_wavelength').val(),		
		post_rl_wavelength:$('#rl_wavelength').val(),		
		post_il_spic_optical_assy:$('#il_spic_optical_assy').val(),		
		post_pdl_spic_optical_assy:$('#pdl_spic_optical_assy').val(),		
		post_iso_spic_optical_assy_01:$('#iso_spic_optical_assy_01').val(),		
		post_iso_spic_optical_assy_02:$('#iso_spic_optical_assy_02').val(),		
		post_temp_in_low:$('#temp_in_low').val(),		
		post_temp_in_high:$('#temp_in_high').val(),		
		post_il_spic_inspection_low:$('#il_spic_inspection_low').val(),		
		post_pdl_spic_inspection_low:$('#pdl_spic_inspection_low').val(),		
		post_iso_spic_inspection_low:$('#iso_spic_inspection_low').val(),
		post_il_spic_inspection_high:$('#il_spic_inspection_high').val(),		
		post_pdl_spic_inspection_high:$('#pdl_spic_inspection_high').val(),		
		post_iso_spic_inspection_high:$('#iso_spic_inspection_high').val(),
		post_vee_name_inspection:$('#vee_name_inspection').val(),		
		post_vee_name_final:$('#vee_name_final').val(),		
		post_excel_name_final:$('#excel_name_final').val(),		
		post_pmd_spic:$('#pmd_spic').val(),		
		post_rl_spic:$('#rl_spic').val(),		
		post_pcc_format_no:$('#pcc_format_no').val(),		
		post_product_symbol:$('#product_symbol').val(),		
		post_sop_no:$('#sop_no').val(),	
		post_customer_pin_no:$('#customer_pin_no').val(),	
		post_uec_no:$('#uec_no').val(),		
		post_pcc_design_name:$('#pcc_design_name').val(),		
		post_pcc_orgine_date:$('#pcc_orgine_date').val(),
		post_is_eng_approval:$('#is_eng_approval').val(),		
        post_is_qc_approval:$('#is_qc_approval').val(),
        post_is_doc_approval:$('#is_doc_approval').val(),
        post_issue_date:$('#issue_date').val(),
		post_revise_histoty:$('#revise_histoty').val()

					
		},
		function(data){
			/*$('#insert_response').html(data);*/
			/*if(data==1){
			window.location="data_view.php";
            	
		   }
		   */
		 $('#insert_response').html(data);
		   if(data==1){
			window.location="data_view.php";
            	
		   }
			
		}
	);
	
}



var $j = jQuery.noConflict(); 
function submit_content(){
	$j('#msg').html("");				
	$j.post(
		"qc_approval_pc_process.php", 
		{   
		    post_id : $j('#id').val(),
			post_approve_name : $j('#approve_name').val(),
			post_approve_section : $j('#approve_section').val(),	
		
		},
		function(data){
			$j('#msg').html(data);
			if(data="PCC  is confirm."){
				window.location = "data_view.php";
			}
			
		}
	);
	
}


/*OpticalIsolator Assembly Add-POST*/
function submit_OpticalIsolatorAssemblyAdd(){
	$('#insert_response').html("");				
	$.post(
		"optical_isolator_assembly_mini_process.php", 
		
		{  
		post_mname:$('#mname').val(),			
		post_pro_number_optical_isolator:$('#pro_number_optical_isolator').val(),			
		post_pro_number_colimator:$('#pro_number_colimator').val(),			
		post_unit_appearance_01:$('#unit_appearance_01').val(),			
		post_fiber_appearance_01:$('#fiber_appearance_01').val(),			
		post_lens_appearance_01:$('#lens_appearance_01').val(),			
		post_ferrule_appearance_01:$('#ferrule_appearance_01').val(),			
		post_emp_no_optical_assembly_01:$('#emp_no_optical_assembly_01').val(),			
		post_shfit_optical_assembly_01:$('#shfit_optical_assembly_01').val(),			
		post_il_wb:$('#il_wb').val(),			
		post_pdl_wb:$('#pdl_wb').val(),			
		post_iso_o1_wb:$('#iso_o1_wb').val(),			
		post_iso_o2_wb:$('#iso_o2_wb').val(),			
		post_il_wa:$('#il_wa').val(),			
		post_pdl_wa:$('#pdl_wa').val(),			
		post_iso_o1_wa:$('#iso_o1_wa').val(),			
		post_iso_o2_wa:$('#iso_o2_wa').val(),			
		post_temporary_welding_apperance_01:$('#temporary_welding_apperance_01').val(),			
		post_emp_no_optical_assembly_02:$('#emp_no_optical_assembly_02').val(),			
		post_shfit_optical_assembly_02:$('#shfit_optical_assembly_02').val(),			
		post_appearance_welded_points_01:$('#appearance_welded_points_01').val(),			
		post_emp_no_optical_assembly_03:$('#emp_no_optical_assembly_03').val(),			
		post_shfit_optical_assembly_03:$('#shfit_optical_assembly_03').val(),			
		post_weld_cond_good_points_ip:$('#weld_cond_good_points_ip').val(),			
		post_weld_cond_good_points_op:$('#weld_cond_good_points_op').val(),			
		post_weld_cond_for_addjustment:$('#weld_cond_for_addjustment').val(),			
		post_appearance_welded_points_02:$('#appearance_welded_points_02').val(),			
		post_emp_no_optical_assembly_04:$('#emp_no_optical_assembly_04').val(),			
		post_shfit_optical_assembly_04:$('#shfit_optical_assembly_04').val(),
		post_computer_name:$('#computer_name').val()
		},
		
		
		function(data){
			$('#insert_response').html(data);
		
		
			
		}
		
		
		  
	);
	
}





/*OpticalIsolator Assembly Update-POST*/
function submit_OpticalIsolatorAssemblyEdit(){
	$('#insert_response').html("");				
	$.post(
		"optical_isolator_assembly_mini_edit_process.php", 
		
		{  
		
		post_ID:$('#ID').val(),			
		post_mname:$('#mname').val(),			
		post_pro_number_optical_isolator:$('#pro_number_optical_isolator').val(),			
		post_pro_number_colimator:$('#pro_number_colimator').val(),			
		post_unit_appearance_01:$('#unit_appearance_01').val(),			
		post_fiber_appearance_01:$('#fiber_appearance_01').val(),			
		post_lens_appearance_01:$('#lens_appearance_01').val(),			
		post_ferrule_appearance_01:$('#ferrule_appearance_01').val(),			
		post_emp_no_optical_assembly_01:$('#emp_no_optical_assembly_01').val(),			
		post_shfit_optical_assembly_01:$('#shfit_optical_assembly_01').val(),			
		post_il_wb:$('#il_wb').val(),			
		post_pdl_wb:$('#pdl_wb').val(),			
		post_iso_o1_wb:$('#iso_o1_wb').val(),			
		post_iso_o2_wb:$('#iso_o2_wb').val(),			
		post_il_wa:$('#il_wa').val(),			
		post_pdl_wa:$('#pdl_wa').val(),			
		post_iso_o1_wa:$('#iso_o1_wa').val(),			
		post_iso_o2_wa:$('#iso_o2_wa').val(),			
		post_temporary_welding_apperance_01:$('#temporary_welding_apperance_01').val(),			
		post_emp_no_optical_assembly_02:$('#emp_no_optical_assembly_02').val(),			
		post_shfit_optical_assembly_02:$('#shfit_optical_assembly_02').val(),			
		post_appearance_welded_points_01:$('#appearance_welded_points_01').val(),			
		post_emp_no_optical_assembly_03:$('#emp_no_optical_assembly_03').val(),			
		post_shfit_optical_assembly_03:$('#shfit_optical_assembly_03').val(),			
		post_weld_cond_good_points_ip:$('#weld_cond_good_points_ip').val(),			
		post_weld_cond_good_points_op:$('#weld_cond_good_points_op').val(),			
		post_weld_cond_for_addjustment:$('#weld_cond_for_addjustment').val(),			
		post_appearance_welded_points_02:$('#appearance_welded_points_02').val(),			
		post_emp_no_optical_assembly_04:$('#emp_no_optical_assembly_04').val(),			
		post_shfit_optical_assembly_04:$('#shfit_optical_assembly_04').val(),
		post_computer_name:$('#computer_name').val(),
	    post_pc_date:$('#pc_date').val()

		},
		
		
		function(data){
			
		  if((data)==1){
	      window.location = "optical_isolator_assembly_mini_after_pcc_view.php";

		 }
		 else{
			$('#insert_response').html(data);
			 }
	       
			
		}
		
		
		  
	);
	
}



function submit_commentAdd(){
	$('#insert_response').html("image/ajax-loader-3.gif");				
	$.post(
		"comment_ procress.php", 
		
		{  
		post_mname:$('#mname').val(),
		post_process_name:$('#process_name').val(),
		post_sn_pn:$('#sn_pn').val(),
		post_com:$('#com').val(),
		post_desination:$('#desination').val(),
		post_em_no_comment:$('#em_no_comment').val()
		
		
		},
		
		
		function(data){
			$('#insert_response').html(data);
	       
			
		}
		
		
		  
	);
	
}
	







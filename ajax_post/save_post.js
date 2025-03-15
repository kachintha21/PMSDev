function form_submit_new() {
        var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
		$j('#org_name_prt').removeClass('error');					
      if($j('#org_name_prt').val() == '') {
        $j('#org_name_prt').addClass('error');
        valid = false;
        str += '<li>org name  can not be empty.</li>';
	}	
	


	
	
       
	if(valid){



				$j.post(
			    "../controllers/save_process.php", 
			{
				form_data: $j( "form" ).serialize()


            



			},
			function(data) {
				if(parseInt(data) == 1){
					//window.location="quick_simulation_session_view.php";
                                        window.location="printing_plans_new_print.php";
                                        
				}
				else{
					$j('#insert_response').html(data);
				}
				
				
			}
		);	
				
		
		return false;
			
	}
	else{
		return false;	
	}
    return false;	


}






	

function form_submit_automated() {
        var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
		$j('#org_name_prt').removeClass('error');					
      if($j('#org_name_prt').val() == '') {
        $j('#org_name_prt').addClass('error');
        valid = false;
        str += '<li>org name  can not be empty.</li>';
	}	
	


	
	
       
	if(valid){



				$j.post(
			    "../controllers/save_process.php", 
			{
				form_data: $j( "form" ).serialize()


            



			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="quick_simulation_session_view.php";
                                        //window.location="printing_plans_new_print.php";
                                        
				}
				else{
					$j('#insert_response').html(data);
				}
				
				
			}
		);	
				
		
		return false;
			
	}
	else{
		return false;	
	}
    return false;	


}	





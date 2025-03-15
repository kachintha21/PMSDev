
function submit_ajax() {
    var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
        $j('#tickets_no_tat').removeClass('error');
   
        

     
        
    if(!valid) {
        $j('#insert_ajax').html(str);
        $j('#insert_ajax').addClass('error');;
    }
	
	if(valid){
		
		$j.post(
			    "../controllers/tickets_response_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="tickets_approved_view.php";
				}
				else{
					$j('#insert_ajax').html(data);
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
	











function form_submit() {
    var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
        $j('#tickets_status_trt').removeClass('error');
        $j('#response_date_trt').removeClass('error');
        $j('#response_details_trt').removeClass('error');        
        $j('#required_time_trt').removeClass('error');
        $j('#hardware_required_trt').removeClass('error');
  
      if($j('#tickets_status_trt').val() == '') {
        $j('#tickets_status_trt').addClass('error');
        valid = false;
        str += '<li>Tickets Status  can not be empty.</li>';
    }	
	
        
           if($j('#response_details_trt').val() == '') {
        $j('#response_details_trt').addClass('error');
        valid = false;
        str += '<li>Response Date can not be empty.</li>';
    }	
	
        
     
	  
       if($j('#response_date_trt').val() == '') {
        $j('#response_date_trt').addClass('error');
        valid = false;
        str += '<li> hardware  can not be empty.</li>';
    }	
	
        
        
     	  
       if($j('#hardware_required_trt').val() == '') {
        $j('#hardware_required_trt').addClass('error');
        valid = false;
        str += '<li>Response Details can not be empty.</li>';
    }	
	
         
        
        
     
        
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			    "../controllers/tickets_response.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="tickets_response_view.php";
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
	



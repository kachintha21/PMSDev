
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
			    "../controllers/approved_response_process.php", 
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
	WS


function form_submit() {
    var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
        $j('#tickets_no_tat').removeClass('error');
        $j('#assign_name_tat').removeClass('error');
        $j('#possibility_tat').removeClass('error');        
        $j('#subject_tt').removeClass('error');
       
  
      if($j('#tickets_no_tat').val() == '') {
        $j('#tickets_no_tat').addClass('error');
        valid = false;
        str += '<li>Approved can not be empty.</li>';
    }	
	
        
     
	
     
        
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			    "../controllers/tickets_approved_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="tickets_approved_view.php";
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
	




function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#employee_no_tt').removeClass('error');
	$j('#name_tt').removeClass('error');
        $j('#date_tt').removeClass('error');
        $j('#stime_tt').removeClass('error');
        $j('#ftime_tt').removeClass('error');
        $j('#hour_tt').removeClass('error');
        $j('#district_emt').removeClass('error');
        $j('#description_tt').removeClass('error');
   	$j('#ot_tt').removeClass('error');         
        $j('#ot_hour_tt').removeClass('error');
    
	 if($j('#employee_no_tt').val() == '') {
        $j('#employee_no_tt').addClass('error');
        valid = false;
        str += '<li>Employee Number  not be empty.</li>';
    }	

    

	 if($j('#name_tt').val() == '') {
        $j('#name_tt').addClass('error');
        valid = false;
        str += '<li>Employee name  not be empty.</li>';
    }	
    
    
    
	 if($j('#date_tt').val() == '') {
        $j('#date_tt').addClass('error');
        valid = false;
        str += '<li>Date  not be empty.</li>';
    }	
    
  
  
  	 if($j('#stime_tt').val() == '') {
        $j('#stime_tt').addClass('error');
        valid = false;
        str += '<li>Start Time  not be empty.</li>';
    }	
    
    
      if($j('#ftime_tt').val() == '') {
        $j('#ftime_tt').addClass('error');
        valid = false;
        str += '<li>Finish Time  not be empty.</li>';
    }	
    
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/user_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="user_data.php";
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
	

function submit_edit() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#employee_no_tt').removeClass('error');
	$j('#name_tt').removeClass('error');
        $j('#date_tt').removeClass('error');
        $j('#stime_tt').removeClass('error');
        $j('#ftime_tt').removeClass('error');
        $j('#hour_tt').removeClass('error');
        $j('#district_emt').removeClass('error');
        $j('#description_tt').removeClass('error');
   	$j('#ot_tt').removeClass('error');         
        $j('#ot_hour_tt').removeClass('error');
    
	 if($j('#employee_no_tt').val() == '') {
        $j('#employee_no_tt').addClass('error');
        valid = false;
        str += '<li>Employee Number  not be empty.</li>';
    }	

    

	 if($j('#name_tt').val() == '') {
        $j('#name_tt').addClass('error');
        valid = false;
        str += '<li>Employee name  not be empty.</li>';
    }	
    
    
    
	 if($j('#date_tt').val() == '') {
        $j('#date_tt').addClass('error');
        valid = false;
        str += '<li>Date  not be empty.</li>';
    }	
    
  
  
  	 if($j('#stime_tt').val() == '') {
        $j('#stime_tt').addClass('error');
        valid = false;
        str += '<li>Start Time  not be empty.</li>';
    }	
    
    
      if($j('#ftime_tt').val() == '') {
        $j('#ftime_tt').addClass('error');
        valid = false;
        str += '<li>Finish Time  not be empty.</li>';
    }	
    
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/user_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="user_data.php";
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
	
	


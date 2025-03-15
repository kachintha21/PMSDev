
function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#name_emt').removeClass('error');
	$j('#epf_no_emt').removeClass('error');
        $j('#location_emt').removeClass('error');
        $j('#work_status_emt').removeClass('error');
        $j('#hod_name_emt').removeClass('error');
        $j('#manager_emt').removeClass('error');
        $j('#district_emt').removeClass('error');
        $j('#contact_no_emt').removeClass('error');
   	$j('#home_contact_no_emt').removeClass('error');         
        $j('#level_emt').removeClass('error');
    
	 if($j('#name_emt').val() == '') {
        $j('#name_emt').addClass('error');
        valid = false;
        str += '<li>Name can  not be empty.</li>';
    }	

    

	 if($j('#epf_no_emt').val() == '') {
        $j('#epf_no_emt').addClass('error');
        valid = false;
        str += '<li>EPF Number  not be empty.</li>';
    }	

    
	 if($j('#work_status_emt').val() == '') {
        $j('#work_status_emt').addClass('error');
        valid = false;
        str += '<li>work status can not be empty.</li>';
    }	


 if($j('#hod_name_emt').val() == '') {
        $j('#hod_name_emt').addClass('error');
        valid = false;
        str += '<li>HOD Name  not be empty.</li>';
    }	
    
    
     if($j('#manager_emt').val() == '') {
        $j('#manager_emt').addClass('error');
        valid = false;
        str += '<li>Manager  not be empty.</li>';
    }	
    
    
         if($j('#district_emt').val() == '') {
        $j('#district_emt').addClass('error');
        valid = false;
        str += '<li>District  name  not be empty.</li>';
    }	
    
    
          if($j('#contact_no_emt').val() == '') {
        $j('#contact_no_emt').addClass('error');
        valid = false;
        str += '<li>Contact number  not be empty.</li>';
    }	
    
             if($j('#home_contact_no_emt').val() == '') {
        $j('#home_contact_no_emt').addClass('error');
        valid = false;
        str += '<li>Contact Home number  not be empty.</li>';
    }	
    
    
    
     if($j('#emergency_emt').val() == '') {
        $j('#emergency_emt').addClass('error');
        valid = false;
        str += '<li>emergency number  not be empty.</li>';
    }	
    
    
    
    
       
    
    
     if($j('#level_emt').val() == '') {
        $j('#level_emt').addClass('error');
        valid = false;
        str += '<li>level   not be empty.</li>';
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
    
    	$j('#id').removeClass('error');
    	$j('#name_emt').removeClass('error');
	$j('#epf_no_emt').removeClass('error');
        $j('#location_emt').removeClass('error');
        $j('#work_status_emt').removeClass('error');
        $j('#hod_name_emt').removeClass('error');
        $j('#manager_emt').removeClass('error');
        $j('#district_emt').removeClass('error');
        $j('#contact_no_emt').removeClass('error');
   	$j('#home_contact_no_emt').removeClass('error');         
        $j('#level_emt').removeClass('error');
    
	 if($j('#name_emt').val() == '') {
        $j('#name_emt').addClass('error');
        valid = false;
        str += '<li>Name can  not be empty.</li>';
    }	

    

	 if($j('#epf_no_emt').val() == '') {
        $j('#epf_no_emt').addClass('error');
        valid = false;
        str += '<li>EPF Number  not be empty.</li>';
    }	

    
	 if($j('#work_status_emt').val() == '') {
        $j('#work_status_emt').addClass('error');
        valid = false;
        str += '<li>work status can not be empty.</li>';
    }	


 if($j('#hod_name_emt').val() == '') {
        $j('#hod_name_emt').addClass('error');
        valid = false;
        str += '<li>HOD Name  not be empty.</li>';
    }	
    
    
     if($j('#manager_emt').val() == '') {
        $j('#manager_emt').addClass('error');
        valid = false;
        str += '<li>Manager  not be empty.</li>';
    }	
    
    
         if($j('#district_emt').val() == '') {
        $j('#district_emt').addClass('error');
        valid = false;
        str += '<li>District  name  not be empty.</li>';
    }	
    
    
          if($j('#contact_no_emt').val() == '') {
        $j('#contact_no_emt').addClass('error');
        valid = false;
        str += '<li>Contact number  not be empty.</li>';
    }	
    
             if($j('#home_contact_no_emt').val() == '') {
        $j('#home_contact_no_emt').addClass('error');
        valid = false;
        str += '<li>Contact Home number  not be empty.</li>';
    }	
    
    
    
     if($j('#emergency_emt').val() == '') {
        $j('#emergency_emt').addClass('error');
        valid = false;
        str += '<li>emergency number  not be empty.</li>';
    }	
    
    
    
    
       
    
    
     if($j('#level_emt').val() == '') {
        $j('#level_emt').addClass('error');
        valid = false;
        str += '<li>level   not be empty.</li>';
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
	
	



	


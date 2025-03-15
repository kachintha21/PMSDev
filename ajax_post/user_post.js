
function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#emp_no').removeClass('error');
	$j('#password').removeClass('error');
        $j('#password').removeClass('error');

 $j('#emp_no').removeClass('error');
 $j('#fname').removeClass('error');
 $j('#lname').removeClass('error');
 $j('#user_name').removeClass('error');
 $j('#fname').removeClass('error');
   
	   $j('#section').removeClass('error');
    
	 if($j('#password').val() == '') {
        $j('#password').addClass('error');
        valid = false;
        str += '<li>Password can  not be empty.</li>';
    }	

    
	 if($j('#emp_no').val() == '') {
        $j('#emp_no').addClass('error');
        valid = false;
        str += '<li>Emp number can  not be empty.</li>';
    }	

	
	 if($j('#user_name').val() == '') {
        $j('#user_name').addClass('error');
        valid = false;
        str += '<li>User Name can  not be empty.</li>';
    }	
	
	 if($j('#fname').val() == '') {
        $j('#fname').addClass('error');
        valid = false;
        str += '<li>Fname can  not be empty.</li>';
    }	


		 if($j('#lname').val() == '') {
        $j('#lname').addClass('error');
        valid = false;
        str += '<li>Lname can  not be empty.</li>';
    }	



        
        	 if($j('#section').val() == '') {
        $j('#section').addClass('error');
        valid = false;
        str += '<li>Section can  not be empty.</li>';
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
					window.location="user_view.php";
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
	
	



	

	
function submit_all() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#emp_no_st').removeClass('error');
	$j('#pro_name_st').removeClass('error');
 
   
	
    
   if($j('#emp_no').val() == '') {
        $j('#emp_no').addClass('error');
        valid = false;
        str += '<li>Employee number can  not be empty.</li>';
    }	
	
        
          
   if($j('#pro_name_st').val() == '') {
        $j('#pro_name_st').addClass('error');
        valid = false;
        str += '<li>Process name can  not be empty.</li>';
    }	
    
	
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/pro_allocation_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="pro_allocation.php";
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
	
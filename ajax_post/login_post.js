
function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
     
     

    

	$j('#password').removeClass('error');
	$j('#username').removeClass('error');
	
    
    	 if($j('#username').val() == '') {
        $j('#username').addClass('error');
        valid = false;
        str += '<li>User name can  not be empty.</li>';
    }	
	
        
    
    
	 if($j('#password').val() == '') {
        $j('#password').addClass('error');
        valid = false;
        str += '<li>Password can  not be empty.</li>';
    }	
	
        
        
	
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		//$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"controllers/login_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="view/index.php";
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
	
	



	


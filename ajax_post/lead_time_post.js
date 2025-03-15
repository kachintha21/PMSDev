function  submit_save() {

    
        var $j = jQuery.noConflict();	
        var valid = true;
        var str = '<ul>';
    

	    $j('#design_ltt').removeClass('error');
	    $j('#pro_name_ltt').removeClass('error');
        $j('#pattern_no_ltt').removeClass('error');
    
    

	 if($j('#design_ltt').val() == '') {
        $j('#design_ltt').addClass('error');
        valid = false;
        str += '<li>Production  number  can not be empty.</li>';
    }	
    
    
    
    	 if($j('#pro_name_ltt').val() == '') {
        $j('#pro_name_ltt').addClass('error');
        valid = false;
        str += '<li>process Name can not be empty.</li>';
    }	
    
    
    
      if($j('#pattern_no_ltt').val() == '') {
        $j('#pattern_no_ltt').addClass('error');
        valid = false;
        str += '<li>Lead Time  can not be empty.</li>';
    }	
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/lead_time_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="lead_time_view.php";
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





















function  form_ps() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#colours_code_ct').removeClass('error');

   
   
   

     if($j('#colours_code_ct').val() == '') {
        $j('#colours_code_ct').addClass('error');
        valid = false;
        str += '<li>Colours Code not be empty.</li>';
    }	
    
    
    

	 if($j('#colours_name_ct').val() == '') {
        $j('#colours_name_ct').addClass('error');
        valid = false;
        str += '<li>Colours Name not be empty.</li>';
    }	
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/colours_master_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="colour_data.php";
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
	



function  form_submit_om() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#colours_code_odt').removeClass('error');

   
   
   

     if($j('#colours_code_odt').val() == '') {
        $j('#colours_code_odt').addClass('error');
        valid = false;
        str += '<li>Colours Code not be empty.</li>';
    }	
    
    
    

    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/mixing_master_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="mixing_master_data.php";
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



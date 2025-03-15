



function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
    $j('#design_no_crt').removeClass('error');
    $j('#col_no_crt').removeClass('error');			
    $j('#col_name_crt').removeClass('error');


                        
                        
               
		

      if($j('#design_no_crt').val() == '') {
        $j('#design_no_crt').addClass('error');
        valid = false;
        str += '<li>Pattern No can not be empty.</li>';
    }	
    
    
      if($j('#col_no_crt').val() == '') {
        $j('#col_no_crt').addClass('error');
        valid = false;
        str += '<li>Color Index can not be empty.</li>';
    }	
    
    
    
       if($j('#col_name_crt').val() == '') {
        $j('#col_name_crt').addClass('error');
        valid = false;
        str += '<li>Color Name can not be empty.</li>';
    }	
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		//$j('#iinsert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/color_relationships_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="color_relationships_view.php";
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
	



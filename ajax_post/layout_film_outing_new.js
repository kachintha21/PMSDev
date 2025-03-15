function  form_ps() {
       var $j = jQuery.noConflict();	
        var valid = true;
        var str = '<ul>';
	$j('#colours_code_ct').removeClass('error');

    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
	
		$j.post(
			"../controllers/ps_layout_film_outing_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="layout_film_outing_from.php";
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
	



function  form_ajax() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#pnumber').removeClass('error');

   


    
    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');;
    }
	
	if(valid){
		///$j('#insert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
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




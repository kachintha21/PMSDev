

function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
	$j('#section_name_st').removeClass('error');

 



	
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/search_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			      function(data) {
				
					$j('#insert_response').html(data);
				
				
				
			}
		);	
				
		
		return false;
			
	}
	else{
		return false;	
	}
	return false;	

}
	







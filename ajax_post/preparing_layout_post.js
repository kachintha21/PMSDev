
function submit_ajax() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
		$j('#pattern_no_plt').removeClass('error');
		

		

      if($j('#pattern_no_plt').val() == '') {
        $j('#pattern_no_plt').addClass('error');
        valid = false;
        str += '<li>Pattern No  not be empty.</li>';
    }	
    
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');;
    }
	
	if(valid){
		//$j('#iinsert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/layout_respone_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="user_data.php";
				}
				else{
					$j('#insert_response_ajax').html(data);
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
	



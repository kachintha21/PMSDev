function form_submit() {
    var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
        $j('#tickets_ref_no_tt').removeClass('error');
       
  

  
      if($j('#tickets_ref_no_tt').val() == '') {
        $j('#tickets_ref_no_tt').addClass('error');
        valid = false;
        str += '<li>Tickets ref number can not be empty.</li>';
    }	
	
       
	if(valid){



				$j.post(
			    "../controllers/post_process.php", 
			{
				form_data: $j( "form" ).serialize()


            







			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="tickets_view.php";
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






	

	






function form_submit() {
    var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';   
	


     
     

      if($j('#mname').val() == '') {
        $j('#mname').addClass('error');
        valid = false;
        str += '<li>Model  can not be empty.</li>';
    }	
	
    
 
        
        
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		///$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			    "get.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="qc_view.php";
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
	



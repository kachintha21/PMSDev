

function  form_ajax() {
	
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';   
    


    str += '</ul>';
    if (!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');
    
    }

    if (valid) {
        //$j('#insert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/decal_received_note_respone_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
          
                $j('#insert_response_ajax').html(data);
        

        }
        );


        return false;

    }
    else {
        return false;
    }
    return false;
    }












function submit_save() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
    $j('#ref_no_drn').removeClass('error');
		

                        
               
		

      if($j('#ref_no_drn').val() == '') {
        $j('#ref_no_drn').addClass('error');
        valid = false;
        str += '<li>Ref Number  can not be empty.</li>';
    }	
    
 
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		//$j('#iinsert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/decal_received_note_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="decal_received_note_view.php";
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
	



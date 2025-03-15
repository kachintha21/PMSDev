

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
                "../controllers/pigment_location_respone_process.php",
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
    $j('#barcode_ref_no_pidt').removeClass('error');
    $j('#weight_pst').removeClass('error');			

                        
               
		

      if($j('#barcode_ref_no_pidt').val() == '') {
        $j('#barcode_ref_no_pidt').addClass('error');
        valid = false;
        str += '<li>Standard Color Number can not be empty.</li>';
    }	
    
    
      if($j('#weight_pst').val() == '') {
        $j('#weight_pst').addClass('error');
        valid = false;
        str += '<li>Weight can not  not be empty.</li>';
    }	
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		//$j('#iinsert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/pigment_transaction_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="pigment_store_data.php";
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
	



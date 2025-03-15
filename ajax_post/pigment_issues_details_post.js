

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
                "../controllers/pigment_issue_respone_process.php",
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


















function  form_ps() {
       var $j = jQuery.noConflict();	
        var valid = true;
        var str = '<ul>';
	$j('#design_number_pidt').removeClass('error');

    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
	
		$j.post(
			"../controllers/pigment_issue_ps_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="pigment_issue.php";
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








function submit_() {
	var $j = jQuery.noConflict();	
    var valid = true;
    var str = '<ul>';
    $j('#barcode_ref_no_pidt').removeClass('error');
    $j('#standard_color_no_pidt').removeClass('error');			
    $j('#weight_pidt').removeClass('error');
    $j('#design_number_pidt').removeClass('error');			
    $j('#color_number_pidt').removeClass('error');
    $j('#re_mixing_date_pidt').removeClass('error');
                        
                        
               
		

      if($j('#barcode_ref_no_pidt').val() == '') {
        $j('#barcode_ref_no_pidt').addClass('error');
        valid = false;
        str += '<li>Standard Color Number can not be empty.</li>';
    }	



       
      if($j('#weight_pidt').val() == '') {
        $j('#weight_pidt').addClass('error');
        valid = false;
        str += '<li>Weight can not  not be empty.</li>';
    }	
    
    
      if($j('#re_mixing_date_pidt').val() == '') {
        $j('#re_mixing_date_pidt').addClass('error');
        valid = false;
        str += '<li>mixing date can not  not be empty.</li>';
    }	
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		//$j('#iinsert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/pigment_issues_details_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="barcode_print.php";
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
	



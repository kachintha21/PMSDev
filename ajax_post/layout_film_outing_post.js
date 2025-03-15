function  submit_save() {
    
    
    
    
        var $j = jQuery.noConflict();	
        var valid = true;
        var str = '<ul>';
    

	$j('#pro_no_plt').removeClass('error');
	$j('#lot_no_plt').removeClass('error');
        $j('#pattern_no_plt').removeClass('error');
        $j('#shipment_request_plt').removeClass('error');
        $j('#printing_lines_plt').removeClass('error');
        $j('#date_plt').removeClass('error');
        $j('#printing_way_plt').removeClass('error');      
	$j('#paper_size_plt').removeClass('error');
	$j('#body_plt').removeClass('error');
        $j('#factory_plt').removeClass('error');
        $j('#market_plt').removeClass('error');
        $j('#decoration_plt').removeClass('error');
        $j('#number_sheet_plt').removeClass('error');
        $j('#printing_plt').removeClass('error');

    

	 if($j('#pro_no_plt').val() == '') {
        $j('#pro_no_plt').addClass('error');
        valid = false;
        str += '<li>Production  number  can not be empty.</li>';
    }	
    
    
    
    	 if($j('#lot_no_plt').val() == '') {
        $j('#lot_no_plt').addClass('error');
        valid = false;
        str += '<li>Lot number can not be empty.</li>';
    }	
    
    
    
      if($j('#pattern_no_plt').val() == '') {
        $j('#pattern_no_plt').addClass('error');
        valid = false;
        str += '<li>Pattern number can not be empty.</li>';
    }	
    
    

    
    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }
	
	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/preparing_layout_process.php", 
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="printing_order_details.php";
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



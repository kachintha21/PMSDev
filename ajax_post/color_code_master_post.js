function  form_save() {


        var $j = jQuery.noConflict();
        var valid = true;
        var str = '<ul>';


	    $j('#color_code_cct').removeClass('error');
	    $j('#color_name_cct').removeClass('error');




	 if($j('#color_code_cct').val() == '') {
        $j('#color_code_cct').addClass('error');
        valid = false;
        str += '<li>color code  number  can not be empty.</li>';
    }



    	 if($j('#color_name_cct').val() == '') {
        $j('#color_name_cct').addClass('error');
        valid = false;
        str += '<li>Color name can not be empty.</li>';
    }




    str += '</ul>';
    if(!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');;
    }

	if(valid){
		$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
		$j.post(
			"../controllers/color_code_master_process.php",
			{
				form_data: $j( "form" ).serialize()
			},
			function(data) {
				if(parseInt(data) == 1){
					window.location="color_code_view.php";
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



function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#fg_design_no_cmt').removeClass('error');
    $j('#curve_no_cmt').removeClass('error');
    $j('#decal_design_no_cmt').removeClass('error');
    $j('#curve_area_cmt').removeClass('error');
   
	 if($j('#fg_design_no_cmt').val() == '') {
        $j('#fg_design_no_cmt').addClass('error');
        valid = false;
        str += '<li>FG Design can not be empty.</li>';
    }

  
	 if($j('#curve_no_cmt').val() == '') {
        $j('#curve_no_cmt').addClass('error');
        valid = false;
        str += '<li>curve no not be empty.</li>';
    }
    


	 if($j('#decal_design_no_cmt').val() == '') {
        $j('#decal_design_no_cmt').addClass('error');
        valid = false;
        str += '<li>decal design no not be empty.</li>';
    }
    
    
    	 if($j('#curve_area_cmt').val() == '') {
        $j('#curve_area_cmt').addClass('error');
        valid = false;
        str += '<li>Curve Area can not be empty.</li>';
    }
    
    

    str += '</ul>';
    if (!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');
        ;
    }

    if (valid) {
        $j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/curve_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "curve_view.php";
            }
            else {
                $j('#insert_response').html(data);
            }


        }
        );


        return false;

    }
    else {
        return false;
    }
    return false;

}



function  form_edit() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#fg_design_no_cmt').removeClass('error');
    $j('#curve_no_cmt').removeClass('error');
    $j('#decal_design_no_cmt').removeClass('error');
    $j('#curve_area_cmt').removeClass('error');
   
	 if($j('#fg_design_no_cmt').val() == '') {
        $j('#fg_design_no_cmt').addClass('error');
        valid = false;
        str += '<li>FG Design can not be empty.</li>';
    }

  
	 if($j('#curve_no_cmt').val() == '') {
        $j('#curve_no_cmt').addClass('error');
        valid = false;
        str += '<li>curve no not be empty.</li>';
    }
    


	 if($j('#decal_design_no_cmt').val() == '') {
        $j('#decal_design_no_cmt').addClass('error');
        valid = false;
        str += '<li>decal design no not be empty.</li>';
    }
    
    
    	 if($j('#curve_area_cmt').val() == '') {
        $j('#curve_area_cmt').addClass('error');
        valid = false;
        str += '<li>Curve Area can not be empty.</li>';
    }
    
    

    str += '</ul>';
    if (!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');
        ;
    }

    if (valid) {
        $j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/curve_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "curve_view.php";
            }
            else {
                $j('#insert_response').html(data);
            }


        }
        );


        return false;

    }
    else {
        return false;
    }
    return false;

}

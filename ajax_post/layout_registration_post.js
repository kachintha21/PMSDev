function  form_ps() {
	
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_name').removeClass('error');




    if ($j('#pattern_name').val() == '') {
        $j('#pattern_name').addClass('error');
        valid = false;
        str += '<li>Production  number  can not be empty.</li>';
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
                "../controllers/layout_registration_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "layout_registration.php";
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


function  form_ps2() {
	
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_name').removeClass('error');




    if ($j('#pattern_name').val() == '') {
        $j('#pattern_name').addClass('error');
        valid = false;
        str += '<li>Production  number  can not be empty.</li>';
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
                "../controllers/layout_registration_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "layout_registration_ok.php";
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








function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
      $j('#pattern_no_lit').removeClass('error');
    $j('#pro_no_lit').removeClass('error');
    $j('#lot_lit').removeClass('error');
    
    



if ($j('#layout').val() == '') {
       $j('#layout').addClass('error');
       valid = false;
       str += '<li>lot number can not be   can not be empty.</li>';
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
                "../controllers/layout_registration_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "printing_order_details.php";
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
      $j('#pattern_no_lit').removeClass('error');
    $j('#pro_no_lit').removeClass('error');
    $j('#lot_lit').removeClass('error');
    
    



if ($j('#layout').val() == '') {
       $j('#layout').addClass('error');
       valid = false;
       str += '<li>lot number can not be   can not be empty.</li>';
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
                "../controllers/layout_registration_edit_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "printing_order_details.php";
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








function  add_curve() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
      $j('#pattern_no_lit').removeClass('error');
    $j('#pro_no_lit').removeClass('error');
    $j('#lot_lit').removeClass('error');
    
    



if ($j('#layout').val() == '') {
       $j('#layout').addClass('error');
       valid = false;
       str += '<li>lot number can not be   can not be empty.</li>';
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
                "../controllers/new_curve_registration_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "printing_order_details.php";
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

function  form_ajax() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#lot_no_lit').removeClass('error');



    str += '</ul>';
    if (!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');
        ;
    }

    if (valid) {
        //$j('#insert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/layout_inspection_respone_process.php",
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



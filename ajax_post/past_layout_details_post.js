function  submit_() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $j('#pro_no_pldt').removeClass('error');
    $j('#design_no_pldt').removeClass('error');
    $j('#lot_no_pldt').removeClass('error');
    $j('#sheet_pldt').removeClass('error');
    $j('#factory_pldt').removeClass('error');
    $j('#layout_finish_date_pldt').removeClass('error');
    $j('#first_color_print_date_pldt').removeClass('error');
    $j('#layout_maker_pldt').removeClass('error');
    $j('#layout_check_pldt').removeClass('error');
    $j('#print_date_pldt').removeClass('error');




    if ($j('#pro_no_pldt').val() == '') {
        $j('#pro_no_pldt').addClass('error');
        valid = false;
        str += '<li>Production No   can not be empty.</li>';
    }


    if ($j('#design_no_pldt').val() == '') {
        $j('#design_no_pldt').addClass('error');
        valid = false;
        str += '<li>design no  number can not be empty.</li>';
    }


    if ($j('#lot_no_pldt').val() == '') {
        $j('#lot_no_pldt').addClass('error');
        valid = false;
        str += '<li>lot no  can not be empty.</li>';
    }
    
  
     if ($j('#sheet_pldt').val() == '') {
        $j('#sheet_pldt').addClass('error');
        valid = false;
        str += '<li>sheet no  can not be empty.</li>';
    }
    
     if ($j('#factory_pldt').val() == '') {
        $j('#factory_pldt').addClass('error');
        valid = false;
        str += '<li>FACTORY   can not be empty.</li>';
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
                "../controllers/past_layout_details_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "past_layout_details_data.php";
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



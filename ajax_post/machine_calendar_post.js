function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $j('#date_mlt').removeClass('error');
    $j('#machine_no_mlt').removeClass('error');
    $j('#number_shift_mlt').removeClass('error');




    if ($j('#date_mlt').val() == '') {
        $j('#date_mlt').addClass('error');
        valid = false;
        str += '<li>date  can not be empty.</li>';
    }


    if ($j('#machine_no_mlt').val() == '') {
        $j('#machine_no_mlt').addClass('error');
        valid = false;
        str += '<li>machine no  number can not be empty.</li>';
    }


    if ($j('#number_shift_mlt').val() == '') {
        $j('#number_shift_mlt').addClass('error');
        valid = false;
        str += '<li>number shift  can not be empty.</li>';
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
                "../controllers/machine_calendar_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "machine_calendar_view.php";
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



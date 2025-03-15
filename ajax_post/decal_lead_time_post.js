function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $j('#pattern_no_dltt').removeClass('error');
    $j('#item_no_dltt').removeClass('error');
    $j('#type_name_dltt').removeClass('error');




    if ($j('#pattern_no_dltt').val() == '') {
        $j('#pattern_no_dltt').addClass('error');
        valid = false;
        str += '<li>pattern_no_dltt  can not be empty.</li>';
    }


    if ($j('#item_no_dltt').val() == '') {
        $j('#item_no_dltt').addClass('error');
        valid = false;
        str += '<li>item_no_dltt number can not be empty.</li>';
    }


    if ($j('#type_name_dltt').val() == '') {
        $j('#type_name_dltt').addClass('error');
        valid = false;
        str += '<li>type_name_dltt list  can not be empty.</li>';
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
                "../controllers/decal_lead_time_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "decal_lead_time_view.php";
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



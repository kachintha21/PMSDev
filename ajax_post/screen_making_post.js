function  form_ps() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_no_sm').removeClass('error');




    if ($j('#pattern_no_sm').val() == '') {
        $j('#pattern_no_sm').addClass('error');
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
                "../controllers/screen_making_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "screen_making.php";
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


    $j('#pattern_no_sm').removeClass('error');
    $j('#pro_no_sm').removeClass('error');
    $j('#lot_no_sm').removeClass('error');




    if ($j('#pattern_no_sm').val() == '') {
        $j('#pattern_no_sm').addClass('error');
        valid = false;
        str += '<li>Pattern no  can not be empty.</li>';
    }


    if ($j('#pro_no_sm').val() == '') {
        $j('#pro_no_sm').addClass('error');
        valid = false;
        str += '<li>Production No   can not be empty.</li>';
    }


    if ($j('#lot_no_sm').val() == '') {
        $j('#lot_no_sm').addClass('error');
        valid = false;
        str += '<li>Lot number  can not be empty.</li>';
    }




    if ($j('#judgment_sm').val() == '') {
        $j('#judgment_sm').addClass('error');
        valid = false;
        str += '<li>Judgment   can not be empty.</li>';
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
                "../controllers/screen_making_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                //window.location = "screen_making_view.php";
                window.location = "barcode_print_sm.php";


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
    $j('#lot_no_sm').removeClass('error');



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



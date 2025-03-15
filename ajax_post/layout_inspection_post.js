function  form_ps() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_no_lit').removeClass('error');




    if ($j('#pattern_no_lit').val() == '') {
        $j('#pattern_no_lit').addClass('error');
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
                "../controllers/layout_inspection_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "layout_inspection.php";
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




    if ($j('#pattern_no_lit').val() == '') {
        $j('#pattern_no_lit').addClass('error');
        valid = false;
        str += '<li>Pattern no  can not be empty.</li>';
    }


    if ($j('#pro_no_lit').val() == '') {
        $j('#pro_no_lit').addClass('error');
        valid = false;
        str += '<li>Production No   can not be empty.</li>';
    }


    if ($j('#lot_lit').val() == '') {
        $j('#lot_lit').addClass('error');
        valid = false;
        str += '<li>Lot number  can not be empty.</li>';
    }



    if ($j('#sheets_lit').val() == '') {
        $j('#sheets_lit').addClass('error');
        valid = false;
        str += '<li>Sheets   can not be empty.</li>';
    }


    if ($j('#judgment_lit').val() == '') {
        $j('#judgment_lit').addClass('error');
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
                "../controllers/layout_inspection_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "layout_inspection_view.php";
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



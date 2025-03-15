function  form_pp() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pro_no_dt').removeClass('error');




    if ($j('#pro_no_dt').val() == '') {
        $j('#pro_no_pd').addClass('error');
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
                "../controllers/decal_inspection_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "decal_inspection.php";
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


    $j('#pattern_no_dt').removeClass('error');
    $j('#pro_no_dt').removeClass('error');
    $j('#lot_no_dt').removeClass('error');


 

    if ($j('#pattern_no_dt').val() == '') {
        $j('#pattern_no_dt').addClass('error');
        valid = false;
        str += '<li>pattern no  can not be empty.</li>';
    }


    if ($j('#pro_no_dt').val() == '') {
        $j('#pro_no_dt').addClass('error');
        valid = false;
        str += '<li>Production number can not be empty.</li>';
    }


    if ($j('#lot_no_dt').val() == '') {
        $j('#lot_no_dt').addClass('error');
        valid = false;
        str += '<li>Lot Number  can not be empty.</li>';
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
                "../controllers/decal_inspection_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "decal_inspection_view.php";
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



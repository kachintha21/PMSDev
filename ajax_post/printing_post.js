function  form_pp() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pro_no_ppt').removeClass('error');




    if ($j('#pro_no_ppt').val() == '') {
        $j('#pro_no_ppt').addClass('error');
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
                "../controllers/printing_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "printing.php";
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


    $j('#colours_index_pt').removeClass('error');
    $j('#machine_no_pt').removeClass('error');
    $j('#judgment_pt').removeClass('error');




    if ($j('#colours_index_pt').val() == '') {
        $j('#colours_index_pt').addClass('error');
        valid = false;
        str += '<li>colours no  can not be empty.</li>';
    }


    if ($j('#machine_no_pt').val() == '') {
        $j('#machine_no_pt').addClass('error');
        valid = false;
        str += '<li>Printing Machine  can not be empty.</li>';
    }


    if ($j('#judgment_pt').val() == '') {
        $j('#judgment_pt').addClass('error');
        valid = false;
        str += '<li>Judgment  can not be empty.</li>';
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
                "../controllers/printing_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "printing_view.php";
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



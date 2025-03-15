function  form_pp() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pro_no_ptct').removeClass('error');




    if ($j('#pro_no_ptct').val() == '') {
        $j('#pro_no_ptct').addClass('error');
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
                "../controllers/top_coat_printing_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "top_coat_printing.php";
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


    $j('#pro_no_tcpt').removeClass('error');
    $j('#machine_no_tcpt').removeClass('error');
    $j('#colours_index_tcpt').removeClass('error');
    $j('#item01_tcpt').removeClass('error');




    if ($j('#pro_no_tcpt').val() == '') {
        $j('#pro_no_tcpt').addClass('error');
        valid = false;
        str += '<li>colours no  can not be empty.</li>';
    }


    if ($j('#pro_no_tcpt').val() == '') {
        $j('#pro_no_tcpt').addClass('error');
        valid = false;
        str += '<li>Printing Machine  can not be empty.</li>';
    }


    if ($j('#colours_index_tcpt').val() == '') {
        $j('#colours_index_tcpt').addClass('error');
        valid = false;
        str += '<li>colours  can not be empty.</li>';
    }


    if ($j('#item01_tcpt').val() == '') {
        $j('#item01_tcpt').addClass('error');
        valid = false;
        str += '<li>Printing Qunatity can not be empty.</li>';
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
                "../controllers/top_coat_printing_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "top_coat_printing_view.php";
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



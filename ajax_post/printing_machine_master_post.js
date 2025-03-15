function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $j('#pattern_no_pmmt').removeClass('error');
    $j('#machine_no_pmmt').removeClass('error');
    $j('#priority_pmmt').removeClass('error');




    if ($j('#pattern_no_pmmt').val() == '') {
        $j('#machine_no_pmmt').addClass('error');
        valid = false;
        str += '<li>pattern no  can not be empty.</li>';
    }


    if ($j('#machine_no_pmmt').val() == '') {
        $j('#machine_no_pmmt').addClass('error');
        valid = false;
        str += '<li>machine no  number can not be empty.</li>';
    }


    if ($j('#priority_pmmt').val() == '') {
        $j('#priority_pmmt').addClass('error');
        valid = false;
        str += '<li>priority list  can not be empty.</li>';
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
                "../controllers/printing_machine_master_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "printing_machine_master_view.php";
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



function  form_pp() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pro_no_qc').removeClass('error');




    if ($j('#pro_no_qc').val() == '') {
        $j('#pro_no_qc').addClass('error');
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
                "../controllers/qc_qc_approval_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "qc_qc_approval.php";
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


    $j('#pro_no_qc').removeClass('error');
    $j('#actual_qty_qc').removeClass('error');
    $j('#check_date_qc').removeClass('error');




    if ($j('#pro_no_qc').val() == '') {
        $j('#pro_no_qc').addClass('error');
        valid = false;
        str += '<li>Pattern No   can not be empty.</li>';
    }


    if ($j('#actual_qty_qc').val() == '') {
        $j('#actual_qty_qc').addClass('error');
        valid = false;
        str += '<li>Actual Qty  can not be empty.</li>';
    }


    if ($j('#check_date_qc').val() == '') {
        $j('#check_date_qc').addClass('error');
        valid = false;
        str += '<li>Check Date can not be empty.</li>';
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
                "../controllers/qc_qc_approval_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "qc_qc_approval_view.php";
            }
            else {
                window.location = "qc_qc_approval_view.php";
            }


        }
        );
window.location = "qc_qc_approval_view.php";

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



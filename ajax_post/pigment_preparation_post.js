function  form_ps() {
    var $k = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $k('#pro_no_fot').removeClass('error');




    if ($k('#pro_no_fot').val() == '') {
        $k('#pro_no_fot').addClass('error');
        valid = false;
        str += '<li>Production  number  can not be empty.</li>';
    }







    str += '</ul>';
    if (!valid) {
        $k('#insert_response').html(str);
        $k('#insert_response').addClass('error');
        ;
    }

    if (valid) {
        $k('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
        $k.post(
                "../controllers/pigment_preparation_ps_process.php",
                {
                    form_data: $k("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "pigment_preparation.php";
            }
            else {
                $k('#insert_response').html(data);
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
    var $k = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $k('#pro_no_pp').removeClass('error');
    $k('#lot_no_pp').removeClass('error');
    $k('#pattern_no_pp').removeClass('error');
    $k('#printing_qty_pp').removeClass('error');
    $k('#colour_index_pp').removeClass('error');
    $k('#pigment_contents_pp').removeClass('error');
             
      


    if ($k('#pattern_no_pp').val() == '') {
        $k('#pattern_no_pp').addClass('error');
        valid = false;
        str += '<li>Pattern no  can not be empty.</li>';
    }


    if ($k('#pro_no_pp').val() == '') {
        $k('#pro_no_pp').addClass('error');
        valid = false;
        str += '<li>Production No   can not be empty.</li>';
    }


    if ($k('#lot_no_pp').val() == '') {
        $k('#lot_no_pp').addClass('error');
        valid = false;
        str += '<li>Lot number  can not be empty.</li>';
    }



    if ($k('#printing_qty_pp').val() == '') {
        $k('#printing_qty_pp').addClass('error');
        valid = false;
        str += '<li>Sheets   can not be empty.</li>';
    }


    if ($k('#pigment_contents_pp').val() == '') {
        $k('#pigment_contents_pp').addClass('error');
        valid = false;
        str += '<li>pigment contents  can not be empty.</li>';
    }


    if ($k('#ffinish_date_fot').val() == '') {
        $k('#ffinish_date_fot').addClass('error');
        valid = false;
        str += '<li>F-finish date   can not be empty.</li>';
    }




    str += '</ul>';
    if (!valid) {
        $k('#insert_response').html(str);
        $k('#insert_response').addClass('error');
        ;
    }

    if (valid) {
        $k('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
        $k.post(
                "../controllers/pigment_preparation_process.php",
                {
                    form_data: $k("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "pigment_preparation_view.php";
            }
            else {
                $k('#insert_response').html(data);
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
    var $k = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';   


    str += '</ul>';
    if (!valid) {
        $k('#insert_response_ajax').html(str);
        $k('#insert_response_ajax').addClass('error');
    
    }

    if (valid) {
        //$k('#insert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
        $k.post(
                "../controllers/pigment_preparation_respone_process.php",
                {
                    form_data: $k("form").serialize()
                },
        function (data) {
          
                $k('#insert_response_ajax').html(data);
        

        }
        );


        return false;

    }
    else {
        return false;
    }
    return false;

}



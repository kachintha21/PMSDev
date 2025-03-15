function  form_ps() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';


    $j('#pro_no_fot').removeClass('error');




    if ($j('#pro_no_fot').val() == '') {
        $j('#pro_no_fot').addClass('error');
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
                "../controllers/film_outing_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "film_outing.php";
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


    $j('#pattern_no_fot').removeClass('error');
    $j('#pro_no_fot').removeClass('error');
        $j('#lot_fot').removeClass('error');
            $j('#sheets_fot').removeClass('error');
                $j('#judgment_fot').removeClass('error');
                    $j('#ffinish_date_fot').removeClass('error');
                              $j('#colour_print_date_fot').removeClass('error');
      $j('#print_plan_date_fot').removeClass('error');
      
            $j('#layout_maker_fot').removeClass('error');
                  $j('#layout_maker_fot').removeClass('error');
      


    if ($j('#pattern_no_fot').val() == '') {
        $j('#pattern_no_fot').addClass('error');
        valid = false;
        str += '<li>Pattern no  can not be empty.</li>';
    }


    if ($j('#pro_no_fot').val() == '') {
        $j('#pro_no_fot').addClass('error');
        valid = false;
        str += '<li>Production No   can not be empty.</li>';
    }


    if ($j('#lot_fot').val() == '') {
        $j('#lot_fot').addClass('error');
        valid = false;
        str += '<li>Lot number  can not be empty.</li>';
    }



    if ($j('#sheets_fot').val() == '') {
        $j('#sheets_fot').addClass('error');
        valid = false;
        str += '<li>Sheets   can not be empty.</li>';
    }


    if ($j('#judgment_fot').val() == '') {
        $j('#judgment_fot').addClass('error');
        valid = false;
        str += '<li>Judgment   can not be empty.</li>';
    }


    if ($j('#ffinish_date_fot').val() == '') {
        $j('#ffinish_date_fot').addClass('error');
        valid = false;
        str += '<li>F-finish date   can not be empty.</li>';
    }


    if ($j('#ffinish_date_fot').val() == '') {
        $j('#ffinish_date_fot').addClass('error');
        valid = false;
        str += '<li>F-finish date   can not be empty.</li>';
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
                "../controllers/film_outing_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "film_outing_view.php";
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
        $j('#lot_no_pt').removeClass('error');
   




    if ($j('#lot_no_pt').val() == '') {
        $j('#lot_no_pt').addClass('error');
        valid = false;
        str += '<li>LoT number Code not be empty.</li>';
    }






    str += '</ul>';
    if (!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');
        ;
    }

    if (valid) {
        //$j('#insert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/film_outing_respone_process.php",
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



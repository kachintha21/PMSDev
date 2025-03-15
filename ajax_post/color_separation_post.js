function  form_ps() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_no_cs').removeClass('error');




    if ($j('#pattern_no_cs').val() == '') {
        $j('#pattern_no_cs').addClass('error');
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
                "../controllers/color_separation_ps_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "color_separation.php";
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


    $j('#pattern_no_sc').removeClass('error');
    $j('#pro_no_sc').removeClass('error');
        $j('#lot_sc').removeClass('error');
            
      


    if ($j('#pattern_no_sc').val() == '') {
        $j('#pattern_no_sc').addClass('error');
        valid = false;
        str += '<li>Pattern no  can not be empty.</li>';
    }


    if ($j('#pro_no_sc').val() == '') {
        $j('#pro_no_sc').addClass('error');
        valid = false;
        str += '<li>Production No   can not be empty.</li>';
    }


    if ($j('#lot_sc').val() == '') {
        $j('#lot_sc').addClass('error');
        valid = false;
        str += '<li>Lot number  can not be empty.</li>';
    }



    if ($j('#sheets_sc').val() == '') {
        $j('#sheets_sc').addClass('error');
        valid = false;
        str += '<li>Sheets   can not be empty.</li>';
    }


    if ($j('#judgment_sc').val() == '') {
        $j('#judgment_sc').addClass('error');
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
                "../controllers/color_separation_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "color_separation_view.php";
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
   


    str += '</ul>';
    if (!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');
        ;
    }

    if (valid) {
        //$j('#insert_response_ajax').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/color_separation_respone_process.php",
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



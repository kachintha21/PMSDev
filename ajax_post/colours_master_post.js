function  submit_main() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_pm').removeClass('error');
    $j('#paper_size_pm').removeClass('error');
    $j('#st_proof_pape_pm').removeClass('error');



    if ($j('#pattern_pm').val() == '') {
        $j('#colourpattern_pm').addClass('error');
        valid = false;
        str += '<li>Pattern No Code not be empty.</li>';
    }




    if ($j('#paper_size_pm').val() == '') {
        $j('#paper_size_pm').addClass('error');
        valid = false;
        str += '<li>paper_size  can not be empty.</li>';
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
                "../controllers/pigment_master_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "pigment_master_data.php";
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








function  submit_ajax() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_pm').removeClass('error');





    if ($j('#paper_size_pm').val() == '') {
        $j('#paper_size_pm').addClass('error');
        valid = false;
        str += '<li>paper_size  can not be empty.</li>';
    }




    str += '</ul>';
    if (!valid) {
        $j('#insert_response_ajax').html(str);
        $j('#insert_response_ajax').addClass('error');
        ;
    }

    if (valid) {
        //$j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/return_colours_process.php",
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















function  form_submit() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
   /* $j('#colours_code_ct').removeClass('error');
    $j('#colours_name_ct').removeClass('error');




    if ($j('#colours_code_ct').val() == '') {
        $j('#colours_code_ct').addClass('error');
        valid = false;
        str += '<li>Colours Code not be empty.</li>';
    }




    if ($j('#colours_name_ct').val() == '') {
        $j('#colours_name_ct').addClass('error');
        valid = false;
        str += '<li>Colours Name not be empty.</li>';
    }*/




    str += '</ul>';
    if (!valid) {
        $j('#insert_response').html(str);
        $j('#insert_response').addClass('error');
        ;
    }

    if (valid) {
        $j('#insert_response').html("<img  src='../img/ajax-loader-3.gif'/>");
        $j.post(
                "../controllers/colours_master_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "colour_data.php";
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




function  form_submit_om() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#colours_code_odt').removeClass('error');





    if ($j('#colours_code_odt').val() == '') {
        $j('#colours_code_odt').addClass('error');
        valid = false;
        str += '<li>Colours Code not be empty.</li>';
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
                "../controllers/mixing_master_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "oil_data.php";
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

function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#date_vt').removeClass('error');



    if ($j('#date_vt').val() == '') {
        $j('#date_vt').addClass('error');
        valid = false;
        str += '<li>D                                                                                                                                                                                                                                                                                                                                         ate  can not be empty.</li>';
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
                "../controllers/virtual_planner_process.php",
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




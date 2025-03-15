function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#time_cott').removeClass('error');
   $j('#machine_no_cott').removeClass('error');



    if ($j('#time_cott').val() == '') {
        $j('#time_cott').addClass('error');
        valid = false;
        str += '<li>Time name  can not be empty.</li>';
    }


    if ($j('#machine_no_cott').val() == '') {
        $j('#machine_no_cott').addClass('error');
        valid = false;
        str += '<li>machine no  can not be empty.</li>';
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
                "../controllers/change_over_time_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "change_over_time_view.php";
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





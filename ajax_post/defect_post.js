function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#defect_name_dt').removeClass('error');




    if ($j('#defect_name_dt').val() == '') {
        $j('#defect_name_dt').addClass('error');
        valid = false;
        str += '<li>Defect name  can not be empty.</li>';
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
                "../controllers/defect_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "defect_view.php";
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





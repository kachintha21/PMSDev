function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#pattern_name').removeClass('error');
    $j('#lot_no_pcdt').removeClass('error');
    $j('#pro_no_pcdt').removeClass('error'); 
    $j('#first_color_print_pcdt').removeClass('error');
    $j('#print_date_pcdt').removeClass('error');

    if ($j('#pattern_name').val() == '') {
        $j('#pattern_name').addClass('error');
        valid = false;
        str += '<li>pattern  name  can not be empty.</li>';
    }

   if ($j('#lot_no_pcdt').val() == '') {
        $j('#lot_no_pcdt').addClass('error');
        valid = false;
        str += '<li>Lot no can not be empty.</li>';
    }

   if ($j('#pro_no_pcdt').val() == '') {
        $j('#pro_no_pcdt').addClass('error');
        valid = false;
        str += '<li>Pro No can not be empty.</li>';
    }


   if ($j('#first_color_print_pcdt').val() == '') {
        $j('#first_color_print_pcdt').addClass('error');
        valid = false;
        str += '<li>first color print date can not be empty.</li>';
    }
    
       if ($j('#print_date_pcdt').val() == '') {
        $j('#print_date_pcdt').addClass('error');
        valid = false;
        str += '<li>print date can not be empty.</li>';
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
                "../controllers/layout_finder_registration_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "layout_finder.php";
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







function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#machine_no_dct').removeClass('error');
    $j('#capacity_dct').removeClass('error');


   
	 if($j('#machine_no_dct').val() == '') {
        $j('#machine_no_dct').addClass('error');
        valid = false;
        str += '<li>machine no not be empty.</li>';
    }

  
	 if($j('#capacity_dct').val() == '') {
        $j('#capacity_dct').addClass('error');
        valid = false;
        str += '<li>capacity no not be empty.</li>';
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
                "../controllers/dryer_capacity_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "dryer_capacity_view.php";
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




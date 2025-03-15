


function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
      $j('#project_no_tct').removeClass('error');
   
    
    



if ($j('#project_no_tct').val() == '') {
       $j('#project_no_tct').addClass('error');
       valid = false;
       str += '<li>project_no_tct can not be   can not be empty.</li>';
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
                "../controllers/atual_gold_consumpation_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
                window.location = "gold_consumption_details.php";
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


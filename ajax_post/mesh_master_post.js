function  form_save() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#mesh_name_mmt').removeClass('error');
   

   

	 if($j('#mesh_name_mmt').val() == '') {
        $j('#mesh_name_mmt').addClass('error');
        valid = false;
        str += '<li>ID not be empty.</li>';
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
                "../controllers/mesh_master_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
              window.location = "mesh_master_view.php";
             //window.history.back();
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





function  save_oill() {
    var $j = jQuery.noConflict();
    var valid = true;
    var str = '<ul>';
    $j('#id').removeClass('error');
   

   

	 if($j('#id').val() == '') {
        $j('#id').addClass('error');
        valid = false;
        str += '<li>ID not be empty.</li>';
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
                "../controllers/oil_process.php",
                {
                    form_data: $j("form").serialize()
                },
        function (data) {
            if (parseInt(data) == 1) {
//                window.location = "curve_view.php";
             window.history.back();
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

function ajax() {

    var pro_no_sm = document.getElementById('pro_no_sm').value;
    $.ajax({
        type: 'POST',
        url: "../controllers/json_sm_process.php",
        data:
                {
                    pro_no_sm: pro_no_sm

                },
        dataType: 'json',
        success: function ajax(response) {


            $("#lot_no_sm").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#lot_no_sm").append(new Option(response[i], response[i]));


            }

        }
    });


}







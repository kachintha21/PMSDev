
function ajax() {

    var pro_no_lit = document.getElementById('pro_no_lit').value;
    $.ajax({
        type: 'POST',
        url: "../controllers/json_fit_process.php",
        data:
                {
                    pro_no_lit: pro_no_lit

                },
        dataType: 'json',
        success: function ajax(response) {


            $("#lot_no_lit").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#lot_no_lit").append(new Option(response[i], response[i]));


            }

        }
    });


}







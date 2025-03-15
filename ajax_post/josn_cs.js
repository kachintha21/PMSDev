
function ajax() {
    var pro_no_sc = document.getElementById('pro_no_sc').value;
    $.ajax({
        type: 'POST',
        url: "../controllers/json_cs_process.php",
        data:
                {
                    pro_no_sc: pro_no_sc

                },
        dataType: 'json',
        success: function ajax(response) {
      

            $("#lot_no_sc").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#lot_no_sc").append(new Option(response[i], response[i]));


            }

        }
    });


}







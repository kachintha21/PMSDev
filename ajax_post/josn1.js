
function ajax() {
    var pro_no_fot = document.getElementById('pro_no_fot').value;
    $.ajax({
        type: 'POST',
        url: "../controllers/json_lot_no_process.php",
        data:
                {
                    pro_no_fot: pro_no_fot

                },
        dataType: 'json',
        success: function ajax(response) {


            document.getElementById('Ae').value = response['Ae'];



            $("#lot_fot").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#lot_fot").append(new Option(response[i], response[i]));


            }

        }
    });


}










function ajax_cs() {




    var pattern_no_sc = document.getElementById('pattern_no_sc').value;



    $.ajax_cs({
        type: 'POST',
        url: "../controllers/json_lot_no_process.php",
        data:
                {
                    pro_no_fot: pro_no_fot

                },
        dataType: 'json',
        success: function ajax_cs(response) {


            //document.getElementById('Ae').value = response['Ae'];



            $("#lot_fot").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#lot_fot").append(new Option(response[i], response[i]));


            }

        }
    });


}
















function ajax_lot() {




    var lot_no_pt = document.getElementById('lot_no_pt').value;




    $.ajax_lot({
        type: 'POST',
        url: "../controllers/json_return_process.php",
        data:
                {
                    lot_no_pt: lot_no_pt

                },
        dataType: 'json',
        success: function ajax_lot(response1) {
            alert(lot_no_pt);

            document.getElementById('x').value = response1['x'];




        }
    });


}





function ajax_lot() {




    var lot_no_pt = document.getElementById('lot_no_pt').value;




    $.ajax({
        type: 'POST',
        url: "../controllers/json_return_process.php",
        data:
                {
                    lot_no_pt: lot_no_pt

                },
        dataType: 'json',
        success: function ajax_lot(response) {


            document.getElementById('x').value = response['x'];




        }
    });


}
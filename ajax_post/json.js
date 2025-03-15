
function ajax() {  //Ae Calculation

    var pattern_no_ct = document.getElementById('pattern_no_ct').value;


    $.ajax({
        type: 'POST',
        url: "../controllers/json_process.php",
        data:
                {
                    pattern_no_ct: pattern_no_ct

                },
        dataType: 'json',
        success: function ajax(response) {


            //document.getElementById('Ae').value = response['Ae'];



            $("#colours_code_ct").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#colours_code_ct").append(new Option(response[i], response[i]));

            }

        }
    });


}



function printlot() {  //Ae Calculation

    var pro_no_ct = document.getElementById('pro_no_ct').value;
 

    $.printlot({
        type: 'POST',
        url: "../controllers/json_lot_no_process.php",
        data:
                {
                    pro_no_ct: pro_no_ct

                },
        dataType: 'json',
        success: function printlot(response) {


       alert(pro_no_ct);

            //document.getElementById('Ae').value = response['Ae'];



            $("#lot_no_pt").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
                $("#lot_no_pt").append(new Option(response[i], response[i]));
                alert(response[i]);

            }

        }
    });


}
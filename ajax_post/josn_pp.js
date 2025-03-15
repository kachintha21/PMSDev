
function ajax() {
    var $z = jQuery.noConflict();
    var pro_no_pp = document.getElementById('pro_no_pp').value;

  

    $z.ajax({
        type: 'POST',
        url: "../controllers/json_pp_process.php",
        data:
                {
                    pro_no_pp: pro_no_pp

                },
        dataType: 'json',
        success: function ajax(response) {
            var myJSON = JSON.stringify(response); 
            document.getElementById("demo").innerHTML = myJSON;

       

      

          /// console.log(json);
        

           /* $z("#lot_no_sc").append(new Option('--select option--', '-'));

            for (i = 0; i < response.length; i++) {
                $z("#lot_fot").append(new Option(response[i], response[i]));


            }*/




        }
    });


}







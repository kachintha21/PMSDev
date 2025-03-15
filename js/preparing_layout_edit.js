$(document).ready(function () {
    var j = 1;
    //$("#add_rowpm").click(function () {
    $("#add_rowpm").on("click", function(){
    
    
        c = j - 1;
        $('#addrpm' + j).html($('#addrpm' + c).html()).find('td:first-child').html(j + 1);
        
        
        $('#tab_logicpm').append('<tr id="addrpm' + (j + 1) + '"></tr>');
        
        
        
        j++;

   

    });
    $("#delete_rowpm").click(function () {
        
        alert("B");

        if (j > 1) {
            $("#addrpm" + (j - 1)).html('');
            j--;
        }
        calcpm();
    });

    $('#tab_logicpm tbody').on('keyup change', function () {
        calcpm();
    });
    $('#tax').on('keyup change', function () {
        calcpm_total();
    });

    $('.product').on('change', function () {
       
        calcpm();
    });

});

function calcpm()
{
    $('#tab_logicpm tbody tr').each(function (j, element) {
        var html = $(this).html();
        if (html != '')
        {
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            var name = $(this).find('.name').val();

            $(this).find('.total').val(qty * price);
            var sqty = name / qty;

            $(this).find('.sqty').val(sqty.toFixed(0));

            calcpm_total();
        }
    });
}

function calcpm_total()
{
    total = 0;
    $('.total').each(function () {
        total += parseInt($(this).val());
    });
    $('#sub_total').val(total.toFixed(2));



    $('#total_amount').val((total).toFixed(2));

    $('#remain_area').val(2310 - total);
}
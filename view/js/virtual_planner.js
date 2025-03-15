$(document).ready(function () {
    var i = 1;
    $("#add_row").click(function () {
        b = i - 1;
        $('#addr' + i).html($('#addr' + b).html()).find('td:first-child').html(i + 1);
        $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
        i++;

        $('.virtual').on('change', function () {
            $(this).closest('tr').find('.date').val($(this).children("option:selected").data('date'));
            $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
            $(this).closest('tr').find('.lot').val($(this).children("option:selected").data('lot'));
              $(this).closest('tr').find('.pattern').val($(this).children("option:selected").data('pattern'));
        });


        $('.virtual').on('change', function () {
            $(this).closest('tr').find('.date').val($(this).children("option:selected").data('date'));
            $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
            $(this).closest('tr').find('.lot').val($(this).children("option:selected").data('lot'));
                $(this).closest('tr').find('.pattern').val($(this).children("option:selected").data('pattern'));
        });


    });
    $("#delete_row").click(function () {
        if (i > 1) {
            $("#addr" + (i - 1)).html('');
            i--;
        }
        calc();
    });

    $('#tab_logic tbody').on('keyup change', function () {
        calc();
    });
    $('#tax').on('keyup change', function () {
        calc_total();
    });

    $('.virtual').on('change', function () {

        $(this).closest('tr').find('.date').val($(this).children("option:selected").data('date'));
        $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
        $(this).closest('tr').find('.lot').val($(this).children("option:selected").data('lot'));
            $(this).closest('tr').find('.pattern').val($(this).children("option:selected").data('pattern'));

        calc();
    });

});

function calc()
{
    $('#tab_logic tbody tr').each(function (i, element) {
        var html = $(this).html();
        if (html != '')
        {
            var qty = $(this).find('.qty').val();
            var date = $(this).find('.date').val();
            var lot = $(this).find('.lot').val();

            $(this).find('.total').val(qty * 1);
            var sqty = name / qty;

            $(this).find('.sqty').val(sqty.toFixed(0));

            calc_total();
        }
    });
}

function calc_total()
{
    total = 0;
    $('.total').each(function () {
        total += parseInt($(this).val());
    });
    $('#sub_total').val(total.toFixed(2));



    $('#total_amount').val((total).toFixed(2));

    $('#remain_area').val(2310 - total);
}
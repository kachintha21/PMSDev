$(document).ready(function () {
    var i = 1;
    $("#add_rowp").click(function () {

        b = i - 1;
        $('#addrp' + i).html($('#addrp' + b).html()).find('td:first-child').html(i + 1);
        $('#tab_logicp').append('<tr id="addrp' + (i + 1) + '"></tr>');
        i++;


        $('.product').on('change', function () {
            $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
            $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
            $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
            $(this).closest('tr').find('.planned').val($(this).children("option:selected").data('planned'));
             $(this).closest('tr').find('.id').val($(this).children("option:selected").data('id'));
            $(this).closest('tr').find('.curves').val($(this).children("option:selected").data('curves'));
             $(this).closest('tr').find('.insp').val($(this).children("option:selected").data('insp'));
        $(this).closest('tr').find('.defect').val($(this).children("option:selected").data('defect'));
        });




    });
    $("#delete_rowp").click(function () {
        if (i > 1) {
            $("#addrp" + (i - 1)).html('');
            i--;
        }
        calcp();
    });

    $('#tab_logicp tbody').on('keyup change', function () {
        calcp();


    });





    $('.product').on('keyup change', function () {
        $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
        $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
        $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
        $(this).closest('tr').find('.planned').val($(this).children("option:selected").data('planned'));
            $(this).closest('tr').find('.id').val($(this).children("option:selected").data('id'));

        $(this).closest('tr').find('.curves').val($(this).children("option:selected").data('curves'));
          $(this).closest('tr').find('.insp').val($(this).children("option:selected").data('insp'));
		   $(this).closest('tr').find('.defect').val($(this).children("option:selected").data('defect'));
		  
        calcp();
    });

});

function calcp()
{
    $('#tab_logicp tbody tr').each(function (i, element) {
        var html = $(this).html();
        if (html != '')
        {

            var planned = $(this).find('.planned').val();
            var insp = $(this).find('.insp').val();

            var actual = $(this).find('.actual').val();
			
			var defect = $(this).find('.defect').val();
			
		//alert(defect);
					
       var remain = planned-actual-insp-defect;
		 
		    //   var remain = insp - actual - defect;

            $(this).find('.remain').val(remain);

            calc_totalp();
        }
    });
}

function calc_totalp()
{
//	total=0;
//        var eduarray = {};
//	$('.total').each(function() {
//                 total= parseInt($(this).val());





}


                                                 
$('#checkbox-table input:checkbox').click(function () {
 var checked = $(this).is(":checked"); // if the checkbox is ticked or not
 var columnId = $(this).attr('id');
 $('#checkbox-table tbody tr').each(function (index, tr) {
     var rowId = $(tr).attr('id');
     var value = parseInt($('.' + columnId + '_' + rowId).html());
     //var total = parseInt($('.total_' + rowId).html());
     var total = parseInt($('#total_' + rowId).val());

     if (isNaN(total)) {
         total = 0;
     }
     console.log(parseInt(total));
     if (checked) {
         total = total + value;
         //$('.total_' + rowId).html(total);
         $('#total_' + rowId).val(total);



     } else {
         total = total-value;
         $('#total_' + rowId).val(total);
     }
 });
});
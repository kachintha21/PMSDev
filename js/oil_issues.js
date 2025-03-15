$(document).ready(function(){
    var i=1;
    $("#add_rowp").click(function(){
    	b=i-1;
      	$('#addrp'+i).html($('#addrp'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logicp').append('<tr id="addrp'+(i+1)+'"></tr>');
      	i++;

		$('.product').on('change', function(){
			$(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
		});
		
		
			$('.product').on('change', function(){
			$(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
		});
		
		
  	});
    $("#delete_rowp").click(function(){
    	if(i>1){
		$("#addrp"+(i-1)).html('');
		i--;
		}
		calcp();
	});
	
	$('#tab_logicp tbody').on('keyup change',function(){
		calcp();
	});
	$('#tax').on('keyup change',function(){
		calc_totalp();
	});

	$('.product').on('change', function(){
		$(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
	   $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
		calcp();
	});

});

function calcp()
{
	$('#tab_logicp tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
                        var name = $(this).find('.name').val();
                        
			$(this).find('.total').val(qty*price);
                        var sqty=name/qty;
                        
                        $(this).find('.sqty').val(sqty.toFixed(0));
			
			calc_totalp();
		}
    });
}

function calc_totalp()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));

        
        
	$('#total_amount').val((total).toFixed(2));
        
        $('#remain_area').val(2310-total);
}
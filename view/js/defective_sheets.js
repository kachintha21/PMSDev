$(document).ready(function(){
    var i=1;
    $("#add_rowde").click(function(){
    	b=i-1;
      	$('#addrde'+i).html($('#addrde'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logicde').append('<tr id="addrde'+(i+1)+'"></tr>');
      	i++;

		$('.product').on('change', function(){
			$(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
		});
		
		
			$('.product').on('change', function(){
			$(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
		});
		
		
  	});
    $("#delete_rowde").click(function(){
    	if(i>1){
		$("#addrde"+(i-1)).html('');
		i--;
		}
		calcde();
	});
	
	$('#tab_logicde tbody').on('keyup change',function(){
		calcde();
	});
	$('#tax').on('keyup change',function(){
		calc_totalde();
	});

	$('.product').on('change', function(){
		$(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
	   $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
		calcde();
	});

});

function calde()
{
	$('#tab_logide tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
                        var name = $(this).find('.name').val();
                        
			$(this).find('.total').val(qty*price);
                        var sqty=name/qty;
                        
                        $(this).find('.sqty').val(sqty.toFixed(0));
			
			calc_totalde();
		}
    });
}

function calc_totalde()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));

        
        
	$('#total_amount').val((total).toFixed(2));
        
        $('#remain_area').val(2310-total);
}
$(document).ready(function(){
    var i=1;
    $("#add_sg_row").click(function(){
 
        
    	b=i-1;
      	$('#addsg'+i).html($('#addsg'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic_sg').append('<tr id="addsg'+(i+1)+'"></tr>');
      	i++;

		$('.product').on('change', function(){
                    
                    			$(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
			$(this).closest('tr').find('.manu_sg').val($(this).children("option:selected").data('manu_sg'));
       	                $(this).closest('tr').find('.type_sg').val($(this).children("option:selected").data('type_sg'));
                        $(this).closest('tr').find('.range_sg').val($(this).children("option:selected").data('range_sg'));
                                         $(this).closest('tr').find('.qt_sg').val($(this).children("option:selected").data('qt_sg'));
                        $(this).closest('tr').find('.model_sg').val($(this).children("option:selected").data('model_sg'));
                        $(this).closest('tr').find('.rating_sg').val($(this).children("option:selected").data('rating_sg'));
       
                        
		});
		
		
		
  	});
    $("#delete_sg_row").click(function(){
    	if(i>1){
		$("#addsg"+(i-1)).html('');
		i--;
		}
		calcsg();
	});
	
	$('#tab_logic_sg tbody').on('keyup change',function(){
		calcsg();
	});
	$('#tax').on('keyup change',function(){
		calcsg_total();
	});

	$('.product').on('change', function(){
          $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
             $(this).closest('tr').find('.qt_sg').val($(this).children("option:selected").data('qt_sg'));
             $(this).closest('tr').find('.manu_sg').val($(this).children("option:selected").data('manu_sg'));
	     $(this).closest('tr').find('.type_sg').val($(this).children("option:selected").data('type_sg'));
             $(this).closest('tr').find('.range_sg').val($(this).children("option:selected").data('range_sg'));
             $(this).closest('tr').find('.model_sg').val($(this).children("option:selected").data('model_sg'));
             $(this).closest('tr').find('.rating_sg').val($(this).children("option:selected").data('rating_sg'));                    
          		calcsg();
	});

});

function calcsg()
{
	$('#tab_logic_sg tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
                    
                   
    	                var rating_sg= $(this).find('.price').val();
			var qt_sg= $(this).find('.qt_sg').val();
                        
                        var power_loss_sg=qt_sg*rating_sg*rating_sg;    
                        
                        
                        
                        
                         var power_loss_sg = power_loss_sg.toFixed(2); 
                         
                  	$(this).find('.power_loss_sg').val(power_loss_sg);
			$(this).find('.power_loss_sg').val();
		
			calcsg_total();
		}
    });
}

function calcsg_total()
{
	total=0;
	$('.power_loss_sg').each(function() {
        total += parseFloat($(this).val());
    });
	$('#sub_total_sg').val(total);
	
}
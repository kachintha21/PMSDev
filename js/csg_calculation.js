$(document).ready(function(){
    var i=1;
    $("#add_csg_row").click(function(){
 
        
    	b=i-1;
      	$('#addcsg'+i).html($('#addcsg'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic_csg').append('<tr id="addcsg'+(i+1)+'"></tr>');
      	i++;

		$('.product').on('change', function(){
                    
                    			$(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
			$(this).closest('tr').find('.manu_csg').val($(this).children("option:selected").data('manu_csg'));
       	                $(this).closest('tr').find('.type_csg').val($(this).children("option:selected").data('type_csg'));
                        $(this).closest('tr').find('.range_csg').val($(this).children("option:selected").data('range_csg'));
                                         $(this).closest('tr').find('.qt_csg').val($(this).children("option:selected").data('qt_csg'));
                        $(this).closest('tr').find('.model_csg').val($(this).children("option:selected").data('model_csg'));
                        $(this).closest('tr').find('.rating_csg').val($(this).children("option:selected").data('rating_csg'));
       
                        
		});
		
		
		
  	});
    $("#delete_csg_row").click(function(){
    	if(i>1){
		$("#addcsg"+(i-1)).html('');
		i--;
		}
		calccsg();
	});
	
	$('#tab_logic_csg tbody').on('keyup change',function(){
		calccsg();
	});
	$('#tax').on('keyup change',function(){
		calccsg_total();
	});

	$('.product').on('change', function(){
          $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
             $(this).closest('tr').find('.qt_csg').val($(this).children("option:selected").data('qt_csg'));
             $(this).closest('tr').find('.manu_csg').val($(this).children("option:selected").data('manu_csg'));
	     $(this).closest('tr').find('.type_csg').val($(this).children("option:selected").data('type_csg'));
             $(this).closest('tr').find('.range_csg').val($(this).children("option:selected").data('range_csg'));
             $(this).closest('tr').find('.model_csg').val($(this).children("option:selected").data('model_csg'));
             $(this).closest('tr').find('.rating_csg').val($(this).children("option:selected").data('rating_csg'));                    
          		calcsg();
	});

});

function calccsg()
{
	$('#tab_logic_csg tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
                    
                   
    	                var rating_csg= $(this).find('.price').val();
			var qt_csg= $(this).find('.qt_csg').val();
                        
                        var power_loss_csg=qt_csg*rating_csg*rating_csg;    
                        
                        
                        
                        
                         var power_loss_csg = power_loss_csg.toFixed(2); 
                         
                  	$(this).find('.power_loss_csg').val(power_loss_csg);
			$(this).find('.power_loss_csg').val();
		
			calccsg_total();
		}
    });
}

function calccsg_total()
{
	total=0;
	$('.power_loss_csg').each(function() {
        total += parseFloat($(this).val());
    });
	$('#sub_total_csg').val(total);
	
}
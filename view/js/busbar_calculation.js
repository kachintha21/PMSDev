$(document).ready(function(){
    var i=1;
    $("#add_busbar_row").click(function(){
    	b=i-1;
      	$('#addbr'+i).html($('#addbr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic_busbar').append('<tr id="addbr'+(i+1)+'"></tr>');
      	i++;

		$('.material_bb').on('change', function(){
			$(this).closest('tr').find('.description_bb').val($(this).children("option:selected").data('description_bb'));
       	                $(this).closest('tr').find('.material_bb').val($(this).children("option:selected").data('material_bb'));
                        $(this).closest('tr').find('.thickness_bb').val($(this).children("option:selected").data('thickness_bb'));
                 
                        $(this).closest('tr').find('.runs_bb').val($(this).children("option:selected").data('runs_bb'));
                        $(this).closest('tr').find('.length_bb').val($(this).children("option:selected").data('length_bb'));
                        $(this).closest('tr').find('.current_bb').val($(this).children("option:selected").data('current_bb'));
                        
		});
		
		
		
  	});
    $("#delete_busbar_row").click(function(){
    	if(i>1){
		$("#addbr"+(i-1)).html('');
		i--;
		}
		calcbb();
	});
	
	$('#tab_logic_busbar tbody').on('keyup change',function(){
		calcbb();
	});
	$('#tax').on('keyup change',function(){
		calcbb_total();
	});

	$('.material_bb').on('change', function(){
             $(this).closest('tr').find('.description_bb').val($(this).children("option:selected").data('description_bb'));
	     $(this).closest('tr').find('.material_bb').val($(this).children("option:selected").data('material_bb'));
             $(this).closest('tr').find('.thickness_bb').val($(this).children("option:selected").data('thickness_bb'));
             $(this).closest('tr').find('.runs_bb').val($(this).children("option:selected").data('runs_bb'));
             $(this).closest('tr').find('.length_bb').val($(this).children("option:selected").data('length_bb'));  
             $(this).closest('tr').find('.current_bb').val($(this).children("option:selected").data('current_bb'));  
                   
          		calcbb();
	});

});

function calcbb()
{
	$('#tab_logic_busbar tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
                    
                   
    	                var material_bb= $(this).find('.material_bb').val();
			var thickness_bb= $(this).find('.thickness_bb').val();
                        var width_bb= $(this).find('.width_bb').val();
                        
			var runs_bb = $(this).find('.runs_bb').val();
                        var length_bb = $(this).find('.length_bb').val();
                        var current_bb = $(this).find('.current_bb').val();
                        var power_loss_bb=((material_bb/1000)*length_bb)/(width_bb*thickness_bb*runs_bb)*current_bb*current_bb;    
                        
                        
                        
                        
                         var power_loss_bb = power_loss_bb.toFixed(2); 
                         
                  	$(this).find('.power_loss_bb').val(power_loss_bb);
			$(this).find('.power_loss_bb').val();
		
			calcbb_total();
		}
    });
}

function calcbb_total()
{
	total=0;
	$('.power_loss_bb').each(function() {
        total += parseFloat($(this).val());
    });
	$('#sub_total_bbt').val(total);
	
}
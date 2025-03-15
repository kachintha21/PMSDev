$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){
    	b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++;

		$('.material_pc').on('change', function(){
			$(this).closest('tr').find('.description_pc').val($(this).children("option:selected").data('description_pc'));
       	                $(this).closest('tr').find('.material_pc').val($(this).children("option:selected").data('material_pc'));
                        $(this).closest('tr').find('.type_pc').val($(this).children("option:selected").data('type_pc'));
                        $(this).closest('tr').find('.size_pc').val($(this).children("option:selected").data('size_pc'));
                        $(this).closest('tr').find('.runs_pc').val($(this).children("option:selected").data('runs_pc'));
                        $(this).closest('tr').find('.length_pc').val($(this).children("option:selected").data('length_pc'));
                        $(this).closest('tr').find('.current_pc').val($(this).children("option:selected").data('current_pc'));
                        
		});
		
		
		
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calpc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calpc();
	});
	$('#tax').on('keyup change',function(){
		calpc_total();
	});

	$('.material_pc').on('change', function(){
             $(this).closest('tr').find('.description_pc').val($(this).children("option:selected").data('description_pc'));
	     $(this).closest('tr').find('.material_pc').val($(this).children("option:selected").data('material_pc'));
             $(this).closest('tr').find('.type_pc').val($(this).children("option:selected").data('type_pc'));
             $(this).closest('tr').find('.size_pc').val($(this).children("option:selected").data('size_pc'));
             $(this).closest('tr').find('.runs_pc').val($(this).children("option:selected").data('runs_pc'));
             $(this).closest('tr').find('.length_pc').val($(this).children("option:selected").data('length_pc'));  
             $(this).closest('tr').find('.current_pc').val($(this).children("option:selected").data('current_pc'));  
                   
          		calpc();
	});

});

function calpc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
                    
                   
    	                var material_pc= $(this).find('.material_pc').val();
			var size= $(this).find('.size_pc').val();
			var runs_pc = $(this).find('.runs_pc').val();
                        var length_pc = $(this).find('.length_pc').val();
                        var current_pc = $(this).find('.current_pc').val();
                        var power_loss_pc=((material_pc/1000)*length_pc/size)*current_pc*current_pc*runs_pc;                                         
                        var npower_loss_pc = power_loss_pc.toFixed(2); 
                        
                        
                  	$(this).find('.power_loss_pc').val(npower_loss_pc);
			$(this).find('.power_loss_pc').val();
			calpc_total();
		}
    });
}

function calpc_total()
{
	total=0;
	$('.power_loss_pc').each(function() {
        total += parseFloat($(this).val());
    });
	$('#sub_total').val(total);
	
}
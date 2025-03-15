$(document).ready(function(){
    var i=1;
    $("#add_rowp").click(function(){
 
        
    	b=i-1;
      	$('#addrp'+i).html($('#addrp'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logicp').append('<tr id="addrp'+(i+1)+'"></tr>');
      	i++;


                              $('.product').on('change', function(){
                                        $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
                                      $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));                                                       
                                       $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
                                       $(this).closest('tr').find('.curves').val($(this).children("option:selected").data('curves'));
                                });
		
		
                              $('.product').on('change', function(){
                                    $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
                                    $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
                                    $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
                                    $(this).closest('tr').find('.curves').val($(this).children("option:selected").data('curves'));                                    
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
        
        
//	$('#tax').on('keyup change',function(){
//		calc_totalp();
//	});
        
        

	   $('.product').on('keyup change', function(){
                    $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
                    $(this).closest('tr').find('.name').val($(this).children("option:selected").data('name'));
                    $(this).closest('tr').find('.qty').val($(this).children("option:selected").data('qty'));
                    $(this).closest('tr').find('.curves').val($(this).children("option:selected").data('curves'));
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
                        	
                        
                        var curves = $(this).find('.curves').val();
                       // var n = num.toFixed(qty/curves);
	
			$(this).find('.sheets').val(Math.trunc(qty/curves));
                       $(this).find('.total').val(Math.trunc(qty/curves));
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
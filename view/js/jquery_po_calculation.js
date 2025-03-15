$(document).ready(function(){
             $('.product').on('change', function(){
             $(this).closest('tr').find('.customer').val($(this).children("option:selected").data('customer'));	
               // $(this).closest('tr').find('.price').val($(this).children("option:selected").data('price'));
               $(this).closest('tr').find('.kecs').val($(this).children("option:selected").data('kecs'));
                  $(this).closest('tr').find('.kkj').val($(this).children("option:selected").data('kkj'));
                     $(this).closest('tr').find('.modle').val($(this).children("option:selected").data('modle')); 
            });
                
             
                
               
		
  	});
  





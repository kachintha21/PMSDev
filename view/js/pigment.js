$(document).ready(function(){
    
    bindAll = function(){
        $('.g-manu').off('change');
        $('.g-type').off('change');
        $('.g-range').off('change');
        $('.g-product').off('change');
        
        $(".g-product").on(
            "change", 
            function(){  
                $(this).closest('.tr-row').find(".g-qty").change();                
            }
        );
        
        $(".g-range").on(
            "change", 
            function(){  
                $(this).closest('.tr-row').find('.g-product').val("");
                $(this).closest('.tr-row').find('.g-product option').hide();
                $(this).closest('.tr-row').find(".g-product option[data-range='"+$(this).val()+"']").show();
                $(this).closest('.tr-row').find(".g-product").change();
            }
        );
        
        $(".g-type").on(
            "change", 
            function(){  
                $(this).closest('.tr-row').find('.g-range').val("");
                $(this).closest('.tr-row').find('.g-range option').hide();
                $(this).closest('.tr-row').find(".g-range option[data-type='"+$(this).val()+"']").show();
                $(this).closest('.tr-row').find(".g-range").change();
            }
        );
        
        $(".g-manu").on(
            "change", 
            function(){  
                $(this).closest('.tr-row').find('.g-type').val("");
                $(this).closest('.tr-row').find('.g-type option').hide();
                $(this).closest('.tr-row').find(".g-type option[data-manu='"+$(this).val()+"']").show();
                    //console.log($(this));
                $(this).closest('.tr-row').find(".g-type").change();
                
            }
        );
        
        $(".g-qty").on(
            "change", 
            function(){  
                var price = $(this).closest('.tr-row').find('.g-product option:selected').data("price");
                  var cname = $(this).closest('.tr-row').find('.g-product option:selected').data("cname");
                
                $(this).closest('.tr-row').find(".g-price").val(price);
                  $(this).closest('.tr-row').find(".g-cname").val(cname);
                
                $(this).closest('.tr-row').find(".g-total").val(price * $(this).val());
                calc_total_new();
            }
        );
        

        
    }
    bindAll();
     
    $("#tax").on('change', function(){
        calc_total_new();
    });
    
    var i=1;
    $("#add_row").click(function(){
        b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'" class="tr-row"></tr>');
       
        setTimeout(function(){bindAll();}, 100);
      	i++; 
    });
    
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
	});

	calc_total_new();

});


function calc_total_new()
{   
    total = 0;
    $('.g-total').each(function() {
        total += parseInt($(this).val());
    });
    $('#sub_total').prop('value', total.toFixed(2));
    tax_sum=total/100*$('#tax').val();
    $('#tax_amount').val(tax_sum.toFixed(2));
    $('#total_amount').val((tax_sum+total).toFixed(2));
}
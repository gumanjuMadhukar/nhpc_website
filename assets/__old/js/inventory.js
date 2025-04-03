// JavaScript Document
if($('#inventory_form').length)
{
	$(document).on('click', '.stock_schedular', function(){
		var _container = $(this).parents('.col-lg-6').find('.toggleMe');
		if ($(this).is(":checked"))
		{
			_container.removeClass('hide'); 
			_container.find('.sales_from').prop('required', true);
			_container.find('.sales_to').prop('required', true);
		}else{
			_container.addClass('hide');  
			_container.find('#sales_from').prop('required', false);
			_container.find('#sales_to').prop('required', false);
		}		
	})
	
	$('#inventory_form').on('click', '.addNewProductAttribute', function(e){
		e.preventDefault();
		var _count = parseInt( $('#clonedArea .cloned').length + 2 ),
			_html = $('#master').clone().show(),
			_appendHtml = '<div class="panel panel-info cloned" id="attribute_'+_count+'">'+_html.html()+'</div>';	
		$('#clonedArea').append(_appendHtml);
		$('#attribute_'+_count+' .deleteProductAttribute').removeClass('hide');
		$('#attribute_'+_count).find(':text').val('');
		$('#attribute_'+_count).find(':text').val('');
		$('#attribute_'+_count).find('textarea').val('');
		$('#attribute_'+_count).find('select').prop("selectedIndex", 0);
		$('#attribute_'+_count).find('.toggleMe').addClass("hide");
		
		$('#attribute_'+_count).find('.product_size').attr("name", 'inventory['+_count+'][product_size]');
		$('#attribute_'+_count).find('.inventory_sku').attr("name", 'inventory['+_count+'][inventory_sku]');
		$('#attribute_'+_count).find('.regular_price').attr("name", 'inventory['+_count+'][regular_price]');
		$('#attribute_'+_count).find('.status').attr("name", 'inventory['+_count+'][status]');
		$('#attribute_'+_count).find('.weight').attr("name", 'inventory['+_count+'][weight]');
		$('#attribute_'+_count).find('.stock_quntity').attr("name", 'inventory['+_count+'][stock_quntity]');
		$('#attribute_'+_count).find('.sales_price').attr("name", 'inventory['+_count+'][sales_price]');
		$('#attribute_'+_count).find('.stock_schedular').attr("name", 'inventory['+_count+'][stock_schedular]');
		$('#attribute_'+_count).find('.sales_from').attr("name", 'inventory['+_count+'][sales_from]');
		$('#attribute_'+_count).find('.sales_to').attr("name", 'inventory['+_count+'][sales_to]');
	})

	$('#inventory_form').on('click', '.deleteProductAttribute', function(e){
		e.preventDefault();
		if(confirm('Are you sure to delete this attribute?')){
			var _this = $(this),
				_id = _this.data('id');
			_this.parents('.cloned').remove();
			
			if(_id > 0){
				deleteProductAttribute(_this, _id);	
			}
		}
	})
	
	function deleteProductAttribute(_this, id)
	{
		var _btn = _this,
			_formData = {'id' : id },
			_url = _baseUrl + 'ajax/deleteProductAttribute',
			_beforeSend = function(){
			  _btn.hide();				  
			  _btn.after('<img class="fl-rt loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.show();	
				   _btn.next('.loading_gif').remove(); 
				   if(result.response == 'success'){
					   _btn.parents('.panel-info').remove();
				   }
				   alert(result.message);
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	}
	
}
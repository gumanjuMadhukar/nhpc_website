// JavaScript Document
function updateOrderCart()
{
	var _totalamt = 0;
	$('#orderProductTable tbody tr').each(function(){
		var _this = $(this),
			_qty = parseFloat(_this.find('td:eq(2)').text()),
			_price = parseFloat(_this.find('td:eq(3)').text()),
			_amt = parseFloat(_qty * _price).toFixed(2);
			_totalamt = parseFloat(_totalamt) + parseFloat(_amt);			
			_this.find('td:eq(4)').text(_amt);
	})
	$('#orderProductTable tfoot tr td:eq(1)').text(parseFloat(_totalamt).toFixed(2));
}

function updateProductSerial()
{
	var i = 1;
	$('#orderProductTable tbody tr').each(function(){
		$(this).find('td:eq(0)').text(i);
		i++;
	})
}

jQuery(function($){
	if($('#create_user_form').length)
	{
		$('#create_user_form').on('keyup', ' #userEmail', function(){
			$('#userName').val($(this).val());
		})
		
		$('#create_user_form').on('change', '#group_id', function(){
			$('#brandSelector').removeClass('show').addClass('hide');
			$('#brand_id').prop('required', false);
			var _group_id = $(this).val();
			if(_group_id == 3){
				$('#brandSelector').removeClass('hide');
				$('#brand_id').prop('required', true);
			}
		})
	}
	
	if($('#order_form').length)
	{
		$(document).on('click', '#addPopupProductBtn', function(){
			var _prd_id = parseInt($('#product_id_popup :selected').val()),
				_qty = parseInt($('#product_qty_popup :selected').val());

			if(isNaN(_prd_id && _qty)){
				if(isNaN(_prd_id)){
					alert('Please choose product first.');
					return false;
				}
				if(isNaN(_qty)){
					alert('Please choose quantity as well.');
					return false;
				}
			}else{
				
				var _btn = $(this),
					_formData = {'_prd_id' : _prd_id, '_qty' : _qty},
					_url = _baseUrl + 'ajax/getProudctInfoAddToCart',
					_beforeSend = function(){
					  _btn.hide();				  
					  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
					},			
					_callback = function(result){
						   _btn.show();	
						   _btn.next('.loading_gif').remove(); 
						   if(result.response == 'success'){
								var _trLength = $('#orderProductTable tbody tr').length,
									_tr = '<tr><td><input type="hidden" name="order[pid][]" value="'+result.message.pdt_pk_id+'"/><input type="hidden" name="order[qty][]" value="'+_qty+'"/>'+parseInt(_trLength + 1)+'</td><td>'+result.message.pdt_name+'</td><td>'+_qty+'</td><td>'+result.message.price+'</td><td>&nbsp;</td><td><a href="#" class="confirmOrderDelete" title="Delete Record"><i class="fa fa-trash fa-fw"></i></a></td></tr>';
								$('#orderProductTable tbody').append(_tr);			
								$('#addProductManualPopup')[0].reset();
								$('#orderModal').modal('hide');
								updateOrderCart();
						   }else{
								alert(obj.message);
						   }
					};
				ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
			}			
		})
		
		$(document).on('click', '.confirmOrderDelete', function(e){
			e.preventDefault();
			var _this = $(this);
			if(confirm('Are you sure to delete this order?')){
				_this.parents('tr').remove();
			}
			updateOrderCart();
			updateProductSerial()
		})
			
	}
})
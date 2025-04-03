// JavaScript Document
function checkDuplicateAttribute()
{
	var _duplicate = 0,
		_elements = $('select.product_size:last').val();

		$('select.product_size').not('select.product_size:last').each(function(){
			var _this = $(this);
			if(_this.val() == _elements){
				_duplicate = _duplicate + 1;
			}
		})
		return (_duplicate > 0)?true:false;
}
jQuery(function($){
	
	Dropzone.autoDiscover = false;
    $("#dZUpload").dropzone({
        url: _baseUrl + 'admin/products/uploadProductGalleryImages',	

            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            acceptedFiles: "image/*",		
        
		
		addRemoveLinks: true,
		
		removedfile: function(file) {
			if(confirm('Do you want to delete?')){
				console.log(file.name);
				file.previewElement.remove();
			}
		},
		
		sending : function(file, xhr, formData){
            var _galleryImages = $('#galleryImages').val();
			formData.append('existing', _galleryImages);
        },		
		
		success: function (file, response) {
			file.previewElement.classList.add("dz-success");
			if(response){
				$('#galleryImages').val(response);
			}
		},
		error: function (file, response) {
			file.previewElement.classList.add("dz-error");
		}
    });	
	
	$('.removeProductGalleryImage').on('click', function(e){
		e.preventDefault();
		if(confirm('Are you Sure to delete this image?')){
			var _btn = $(this),
				_formData = {'pid' : _btn.data('pid'), 'id' : _btn.data('id') },
				_url = _baseUrl + 'admin/products/removeProductGalleryImage',
				_beforeSend = function(){
				  _btn.hide();				  
				  _btn.after('<img class="fl-rt loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
				},			
				_callback = function(result){
					   _btn.show();	
					   _btn.next('.loading_gif').remove(); 
					   if(result.response == 'success'){
						 _btn.remove();  
					   }
					   alert(result.message);
				};
			ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
		}
	})
	
	$(document).on({
		mouseenter: function () {
			var _this = $(this);
			_this.after('<div class="dynamic"><img src="'+_this.data('imgsrc')+'"></div>');	
		},
		mouseleave: function () {
			var _this = $(this);
			_this.next('.dynamic').remove();		
		}
	}, ".showfeatureImg");
	
	$('#generateProductAttributes').on('change', function(){
		var _size = $(this).val();
		if(_size == ''){
			return '';
		}
		$('#clonedArea .cloned:gt(0)').remove();
		
		var _btn = $(this),
			_formData = {'slug' : _size },
			_url = _baseUrl + 'ajax/getAttributeBySlug',
			_beforeSend = function(){
			  _btn.hide();				  
			  _btn.after('<img class="fl-rt loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.show();	
				   _btn.next('.loading_gif').remove(); 
				   if(result.response == 'success'){
					   $('#clonedArea .cloned:first .product_size').html(result.message);
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	})
	
	function closeAllCalendar()
	{
		var _container = $('.toggleStatus');
		_container.each(function(){
			_container.addClass('hide'); 
		})
	}
	
	$('#addProductAttribute').on('click', function(e){
		e.preventDefault();
		var _selectedSizeAttr = $('#generateProductAttributes').val();
		if(_selectedSizeAttr == ''){
			alert('Please choose product size attribute first.');
			return;
		}
		
		closeAllCalendar();	
		
		if(checkDuplicateAttribute())
		{
			alert('Duplicate product attribute used.');
			return;
		}
		var _count = parseInt( $('#clonedArea .cloned').length + 1 ),
			_html = $('#clonedArea .cloned:first').clone(),
			_appendHtml = '<div class="row cloned" id="attribute_'+_count+'">'+_html.html()+'</div>';	
			$('#clonedArea').append(_appendHtml);
			$('.status').bootstrapToggle(); 
			$('#attribute_'+_count).find(':text').val('');
			$('#attribute_'+_count).find(':text').val('');
			$('#attribute_'+_count).find('textarea').val('');
			$('#attribute_'+_count).find('select').prop("selectedIndex", 0);
			$('#attribute_'+_count).find('.toggleMe').addClass("hide");
			
			$('#attribute_'+_count).find('.product_size').attr("name", 'inventory['+_count+'][product_size]');
			$('#attribute_'+_count).find('.inventory_pk_id').attr("name", 'inventory['+_count+'][inventory_pk_id]').val(0);
			$('#attribute_'+_count).find('.inventory_sku').attr("name", 'inventory['+_count+'][inventory_sku]');
			$('#attribute_'+_count).find('.regular_price').attr("name", 'inventory['+_count+'][regular_price]');
			$('#attribute_'+_count).find('.status').attr("name", 'inventory['+_count+'][status]');
			$('#attribute_'+_count).find('.weight').attr("name", 'inventory['+_count+'][weight]');
			$('#attribute_'+_count).find('.stock_quntity').attr("name", 'inventory['+_count+'][stock_quntity]');
			$('#attribute_'+_count).find('.sales_price').attr("name", 'inventory['+_count+'][sales_price]');
			$('#attribute_'+_count).find('.stock_schedular').attr("name", 'inventory['+_count+'][stock_schedular]');
			$('#attribute_'+_count).find('.sales_from').attr("name", 'inventory['+_count+'][sales_from]');
			$('#attribute_'+_count).find('.sales_to').attr("name", 'inventory['+_count+'][sales_to]');
			
			$('#attribute_'+_count).find('.schedularCalendar').addClass('hide');
			$('#attribute_'+_count).find('.toggleStatus').addClass('hide');
			
	})
	
	$(document).on('change', '.product_size', function(e){
		e.preventDefault();
		if(checkDuplicateAttribute())
		{
			alert('Duplicate product attribute used.');
			$(this).val($(this).find("option:first").val());
		}
		return true;
	});
	
	$(document).on('click', '.deleteProductAttribute', function(e){
		e.preventDefault();
		var _count = parseInt( $('#clonedArea .cloned').length ),
		    _this = $(this),
			_i_pk_id = _this.data('ipk');
		
		if(_count == 1){
			alert('Atleast one product attribute is requied.');
			return false;
		}
		
		if(confirm('Are you Sure to delete this row, this can\'t be undo?')){
			if(_i_pk_id > 0){
				deleteProductAttribute(_this, _i_pk_id);
			}else{
				_this.parents('.cloned').remove();
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
					   _btn.parents('.cloned').remove();
				   }else{
				   		alert(result.message);
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	}
	
	$(document).on('click', '.stock_schedular',  function(){
		var _container = $(this).next('.schedularCalendar');
		if ($(this).is(":checked"))
		{
			_container.removeClass('hide'); 
		}else{
			_container.addClass('hide');  
		}		
	})
	
	$(document).on('click', '.schedularCalendar', function(e){
		e.preventDefault();
		var _container = $(this).next('.toggleStatus');
		if (_container.hasClass('hide'))
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
	
})
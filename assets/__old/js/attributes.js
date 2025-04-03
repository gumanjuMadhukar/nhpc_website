// JavaScript Document
jQuery(function($){
	if($('#attribute_form').length){
		$('input').on('beforeItemRemove', function(event) {
			event.preventDefault();
			var _event = event,
				tag = event.item;
				if(confirm('Are you sure to delete this attribute?')){
					var _btn = $(this),
						_formData = {'value' : event.item, 'slug' : $('#identifier').val()},
						_url = _baseUrl + 'ajax/removeAttribute',
						_beforeSend = function(){
						  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
						},			
						_callback = function(result, event){
							   _btn.next('.loading_gif').remove(); 
							   if(result.response == 'failure'){
									 $('#tags-input').tagsinput('add', tag);
							   }
							   alert(result.message);
						};
					ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
				}else{
					event.cancel = true;
				}				 
		});
	}
		
})
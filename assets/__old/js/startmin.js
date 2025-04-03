var dateToday = new Date();

function ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback) {
    jQuery.ajax({
        url: _url,
        data: _formData,
        type: 'POST',
        datatype: 'JSON',
        beforeSend: _beforeSend,
		success: _callback,
		error: function(request, error){
			alert('The server encountered an error.');
		}
    });
}

$(function() {
	$('html').click(function() {
		if($('#side-menu').length){
			var _menu = $('#side-menu li.active'),
				_submenu = _menu.find('ul');
			_submenu.removeClass('in');	
			_menu.addClass('active');
		}
	});
	
	if($('#dynamicSearch').length){
		$('#dynamicSearch thead tr').clone(true).appendTo( '#dynamicSearch thead' );
		$('#dynamicSearch thead tr:eq(1) th').each( function (i) {
			if(i > 1 && i < 5){
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		 
				$( 'input', this ).on( 'keyup change', function () {
					if ( table.column(i).search() !== this.value ) {
						table
							.column(i)
							.search( this.value )
							.draw();
					}
				} );
			}
		} );
	 
		var table = $('#dynamicSearch').DataTable( {
			orderCellsTop: true,
			fixedHeader: true
		} );
	}

    $('#side-menu').metisMenu();
	
	if($('.select2').length){
		var _placeholder = $('.select2').attr('placeholder');
		_placeholder = _placeholder?_placeholder:'Please Select';
		$('.select2').select2({'placeholder' : _placeholder});
	}
	
	$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
	
	if($("#couponFromDatepicker").length && $("#couponToDatepicker").length){
		$("#couponFromDatepicker").datepicker({
 		  dateFormat: 'yy-mm-dd',
		  minDate: 0,
		  onSelect: function(date) {
			$("#couponToDatepicker").datepicker({
				  dateFormat: 'yy-mm-dd',
				  minDate: date
			  });
		  } 
		});	
	}
})

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
jQuery(function($) {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
	
	if($('#dataTables').length){
		$('#dataTables').DataTable({
				responsive: true
		});
	}
	
	$(document).on('click', '.confirmDelete', function(e){
		e.preventDefault();
		if(confirm('Are You Sure To Delete This Record?')){
			window.location.href = $(this).attr('href');
		}
		return false;
	})
	
	$('.btn-redirect').on('click', function(){
		var _href = $(this).attr('href');
		if(_href != '' || _href != '#'){
			window.location.href = _href;
		}
		return false;
	})	
	
	$(document).on('click', '.process_change_status', function(e){
		e.preventDefault();
		var _btn = $(this),
			_formData = {'tbl' : _btn.data('tbl'), 'identifier' : _btn.data('identifier')},
			_url = _baseUrl + 'ajax/changeStatus',
			_beforeSend = function(){
			  _btn.hide();				  
			  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.show();	
				   _btn.next('.loading_gif').remove(); 
				   if(result.response == 'success'){
					  _btn.empty().html('<i class="fa '+result.message+' fa-fw"></i>');
				   }else{
				   		alert(obj.message);
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	})

	$(document).on('click', '.process_dynamic_status', function(e){
		e.preventDefault();
		var _btn = $(this),
			_formData = {'tbl' : _btn.data('tbl'), 'identifier' : _btn.data('identifier'), 'sfield' : _btn.data('sfield'), 'ifield' : _btn.data('ifield')},
			_url = _baseUrl + 'ajax/changeDynamicStatus',
			_beforeSend = function(){
			  _btn.hide();				  
			  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.show();	
				   _btn.next('.loading_gif').remove(); 
				   if(result.response == 'success'){
					  _btn.empty().html('<i class="fa '+result.message+' fa-fw"></i>');
				   }else{
				   		alert(obj.message);
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	})

	$('.process_change_feature_status').on('click', function(e){
		e.preventDefault();
		var _btn = $(this),
			_formData = {'tbl' : _btn.data('tbl'), 'identifier' : _btn.data('identifier')},
			_url = _baseUrl + 'ajax/changeFeatureStatus',
			_beforeSend = function(){
			  _btn.hide();				  
			  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.show();	
				   _btn.next('.loading_gif').remove(); 
				   if(result.response == 'success'){
					  _btn.empty().html('<i class="fa '+result.message+' fa-fw"></i>');
				   }else{
				   		alert(obj.message);
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	})
	
	$('#product_category_form, #product_form').on('change', '#brand_id', function(e){
		e.preventDefault();
		$('#parent_id option:gt(0)').remove();
		var _btn = $(this),
			_formData = {'brand' : _btn.val()},
			_url = _baseUrl + 'ajax/getParentCategory',
			_beforeSend = function(){
			  _btn.prop('disabled', true);				  
			  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.prop('disabled', false);				  
				   _btn.next('.loading_gif').remove(); 
				   
				   if(result.response == 'success'){
					  $('#parent_id').append(result.message);
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	})

	$('#parent_id').on('change', function(e){
		e.preventDefault();
		$("#child_id").empty();
		var childCategory = $('#child_id');
		var _btn = $(this),
			_formData = {'parent_id' : _btn.val()},
			_url = _baseUrl + 'ajax/getChildCategory',
			_beforeSend = function(){
			  _btn.prop('disabled', true);				  
			  _btn.after('<img class="loading_gif" src="'+_baseUrl+'assets/dashboard/images/loading.gif" />');
			},			
			_callback = function(result){
				   _btn.prop('disabled', false);				  
				   _btn.next('.loading_gif').remove(); 
				   
				   if(result.response == 'success'){
						$("#child_id").select2({
							 placeholder: "Please Select Child Category",
							 data:result.message
						});					   
				   }
			};
		ajax_process_forms(_formData, _url, _btn, _beforeSend, _callback);	
	})
	
	//banner mgmt//
	$('.duplicateRow').on('click', function(e){
		e.preventDefault();
		
		var _master = $('#master'),
			_duplicateContainer = $('#duplicateContainer');
		//_master.find('.form-group:last').html(_deleteBtn);
		_duplicateContainer.append('<div class="row child">' + _master.html() + '</div>');		
	})
	
	$(document).on('click', '.duplicateDuplicateRow', function(e){
		e.preventDefault();
		if(confirm('Are you sure to delete this records?')){
			var _this = $(this);
			_this.parents('.child').remove();
		}		
	})
	
});

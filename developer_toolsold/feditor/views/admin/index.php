<link href="<?php echo base_url('assets')?>/vendor/file_manager/css/treeview.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets')?>/vendor/file_manager/css/filetree.css" rel="stylesheet" type="text/css">

<style type="text/css">
	#filecontent {
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
</style>

<div class="page-header">
    <h1 class="page-title"><?php echo $header; ?></h1>
    <ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      	<li class="breadcrumb-item active"><a href="#"><?php echo $header; ?></a></li>
    </ol>
    <div class="page-header-actions">
      	

    </div>
</div>
 
<!-- Main content -->
<div class="page-content">
	<div class="row">
		<div class="col-md-3">
			<div class="panel">
				<header class="panel-heading">
					<h4 class="panel-title">File List</h4>
				</header>
			  	<div class="panel-body">
					<div id="filetree"></div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel">
				<header class="panel-heading">
					<h4 class="panel-title"></h4>
				</header>
			  	<div class="panel-body">
					<div style="position:relative;float:right;margin-left:10px;width:100%">
					    <form action="#" method="post" id="file-form" onSubmit="return false">
					        <div class="form-group">
					        	<input type="text" id="source_file" class="form-control" name="source_file" readonly="readonly" style="width:100%"/>
					        </div>
					        <div class="form-group" >
								<textarea id="filecontent" name="filecontent"></textarea>
					        </div>
					        <input type="hidden" id="save" name="save" value="1"/>
					    </form>
						<a href="#" id="save-changes" class="btn btn-sm btn-primary btn-outline btn-round"  title="Save Changes">
							<i class="icon wb-pencil" aria-hidden="true"></i>
				        	<span class="hidden-sm-down">Save Changes</span>
						</a>
						<a href="#" id="clear" class="btn btn-sm btn-danger btn-outline btn-round"  title="Clear">
							<i class="icon wb-trash" aria-hidden="true"></i>
				        	<span class="hidden-sm-down">Clear</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- doc form -->
<div id="doc-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 id="doc_modal_title" class="modal-title">Add/Edit</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-doc', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "directory" id = "doc_directory"/>
		        	<input type = "hidden" name = "doc_type" id = "doc_type"/>
		        	<input type = "hidden" name = "doc_action" id = "doc_action"/>
		            
					<div class='form-group'>
					<label for='doc_name'>Name</label>
					<input id='doc_name' type='text' class='form-control' name='name'>
					</div>
				<?php echo form_close()?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-green waves-effect" onClick="save_doc_name()"><?php echo lang('general_save'); ?></button>			
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets')?>/vendor/file_manager/jquery.treeview.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets')?>/vendor/file_manager/jquery.filetree.js"></script>

<link rel="stylesheet" href="<?php echo base_url('assets')?>/vendor/jquery-contextmenu/jquery.contextMenu.css">

<script src="<?php echo base_url('assets')?>/vendor/jquery-contextmenu/jquery.contextMenu.js"></script>

<script src="<?php echo site_url()?>/assets/vendor/ace-editor/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>


<script>
    var editor = ace.edit("filecontent");
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode("ace/mode/php");
    // editor.renderer.setHScrollBarAlwaysVisible(false);
    // editor.style.height= '500px';
    // editor.getBoundClientRect().height;
    // editor.resize();
    editor.setOption("maxLines", 35);
    editor.setOption("minLines", 35);
</script>

<script>

	$(function() {
		initilize_file_tree();
	    
	});
</script>
<script type="text/javascript">
	function rename_form(key,opt) {
		console.log(key);
		console.log(opt.$trigger);
		console.log(opt.$trigger.children('a').text());
		if(key == 'new'){
			$('#doc_type').val('file');
		}else if(key == 'new-folder'){
			$('#doc_type').val('directory');
		}else if(opt.$trigger.hasClass('directory')){
			$('#doc_type').val('directory');
		}else{
			$('#doc_type').val('file');
		}
		$('#doc_action').val(key);
		$('#doc-modal').modal('show');
		$('#doc_directory').val(opt.$trigger.children('a').attr('rel'));
		if(key == 'rename'){
			$('#doc_name').val(opt.$trigger.children('a').text());
		}else{
			$('#doc_name').val('');
		}
		$('#doc_modal_title').html(key.charAt(0).toUpperCase() + key.slice(1));
	}

</script>
<script type="text/javascript">
	function save_doc_name() {
		var data = $('#form-doc').serialize();
		$.post('<?php echo site_url('admin/Feditor/save_doc_name')?>',data,function(result){
			if(result.success){
				initilize_file_tree();
			}else{
				alert(result.msg);
			}

			$('#doc-modal').modal('hide');
		},'json');
	}
</script>

<script type="text/javascript">
	function autoImplementedMode(filename){
	    var ext = filename.split('.').pop();
	    var prefix = "ace/mode/";

	    if(!ext){
	        return prefix + "text";
	    }

	    /**
	     *  Functional, but inefficient if you want to write it by yourself ....
	     */
	    switch (ext) {
	        case "js":
	        return prefix + "javascript";
	        case "cs":
	        return prefix + "csharp";
	        case "php":
	        return prefix + "php";
	        case "html":
	        return prefix + "php";
	        case "htm":
	        return prefix + "php";
	        case "css":
	        return prefix + "css";
	        case "rb":
	        return prefix + "ruby";
	    }
	}
</script>

<script type="text/javascript">
	function initilize_file_tree() {
		$('#filetree').fileTree({ root: '<?php echo $_SERVER['DOCUMENT_ROOT']?>/',script:'<?php echo base_url()?>admin/Feditor/filetree',multiFolder: false }, 
		function(file) {
			$.get('<?php echo base_url()?>admin/Feditor/get_file',{file:file},function(data){
				// $('#filecontent').val(data);
				
				var mode = autoImplementedMode(file);
				editor.getSession().setMode(mode);

				editor.session.setValue(data);
			});
			$('#source_file').val(file);
			
	    });

		$('#save-changes').click(function(){
			console.log($('#file-form').serialize());
			console.log(editor.session.getValue());
			console.log(encodeURIComponent(editor.session.getValue()));
			data = $('#file-form').serialize() + '&filecontent=' + encodeURIComponent(editor.session.getValue());
			$.ajax({type:'post',url:'<?php echo site_url()?>admin/Feditor/save',data:data,dataType:'json',
					success:function(data){
						if(data.success)
						{
							$.messager.alert('Success','File Editor Successfully');
						}
					}
			});

		});	

		$('#clear').click(function(){
			$('#source_file').val('');
			// $("#filecontent").val("")
			editor.getSession().setMode("ace/mode/php");
			editor.session.setValue('');
			// editor.container.webkitRequestFullscreen()

		})

		var menu_options = {
	  		items: (_items = {
		      	"rename": {
		        	name: "Rename ...",
		        	icon: function icon() {
		          		return 'context-menu-icon context-menu-extend-icon wb-pencil';
		        	},
		        	callback: function(key, opt){
		                rename_form(key,opt);
		            }
		      	},
		      	// "search": {
		       //  	name: "Find in...",
		       //  	icon: function icon() {
		       //    		return 'context-menu-icon context-menu-extend-icon wb-search';
		       //  	}
		      	// },
		      	"sep1": "---------",
		      	"new": {
		        	name: "New File",
		        	icon: function icon() {
		          		return 'context-menu-icon context-menu-extend-icon wb-file';
		        	},
		        	callback: function(key, opt){
		                rename_form(key,opt);
		            }
		      	},
		      	"new-folder": {
		        	name: "New Folder",
	        		icon: function icon() {
		          		return 'context-menu-icon context-menu-extend-icon wb-folder';
		        	},
		        	callback: function(key, opt){
		                rename_form(key,opt);
		            }
		      	}
	    	},  _items),
		    selector: '.file, .directory',
	  	}
	  	$.contextMenu(menu_options);
	  	// $('.directory').contextMenu(menu_options);
	}

	
</script>
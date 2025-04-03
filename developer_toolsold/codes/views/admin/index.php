<h1><u>File Editor</u></h1>
<p style="float:right;margin-right:90px">
<a id="save-changes" class="easyui-linkbutton">Save Changes</a>
</p>  
<div style="clear:both"></div>
<div id="filetree"></div>
<div style="position:relative;float:right;margin-left:10px;width:75%">
    <form action="#" method="post" id="file-form" onSubmit="return false">
        <input type="text" id="source_file" name="source_file" readonly="readonly" style="width:90%"/>
		<textarea id="filecontent" name="filecontent" style="height:380px;width:90%"></textarea>
        <input type="hidden" id="save" name="save" value="1"/>
    </form>
</div>
</div>
</div>

<script>

$(function() {

    $('#filetree').fileTree({ root: '<?php echo base_url()?>',script:'<?php echo site_url()?>codes/admin/Feditor/filetree',multiFolder: false }, 
	function(file) {
		$.get('<?php echo site_url()?>codes/admin/Feditor/get_file',{file:file},function(data){
			$('#filecontent').val(data);
		});
		$('#source_file').val(file);
		
    });

	$('#save-changes').click(function(){
		$.ajax({type:'post',url:'<?php echo site_url()?>codes/admin/Feditor/save',data:$('#file-form').serialize(),dataType:'json',
				success:function(data){
					if(data.success)
					{
						$.messager.alert('Success','File Editor Successfully');
					}
				}
		});

	});	
});

</script>


<script type="text/javascript" src="<?php echo base_url('assets')?>/vendor/file_manager/jquery.treeview.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets')?>/vendor/file_manager/jquery.filetree.js"></script>
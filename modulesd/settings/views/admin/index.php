<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('settings'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('settings'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <form method="POST" action="<?php echo site_url('admin/Settings/save');?>">
				<div class='form-group'>
					<label for='contact_detail'>Contact Detail</label>
					<textarea name='contact_detail' id='contact_detail' class='form-control myTextarea' ><?php
						if(isset($setting_data['contact_detail']))
						{
							echo $setting_data['contact_detail'];
						}
						?></textarea>
				</div>
				<div class='form-group'>
					<label for='facebook'>Facebook</label>
					<input id='facebook' type='text' class='form-control' name='facebook' 
					value="<?php 
						if(isset($setting_data['facebook']))
						{
							echo $setting_data['facebook'];
						}
						else
						{
							echo '';
						}
					?>">
				</div>
				<div class='form-group'>
					<label for='twitter'>Twitter</label>
					<input id='twitter' type='text' class='form-control' name='twitter' 
					value="<?php 
						if(isset($setting_data['twitter']))
						{
							echo $setting_data['twitter'];
						}
						else
						{
							echo '';
						}
					?>">
				</div>
				<div class='form-group'>
					<label for='announcement_title'>Announcement Title</label>
					<input id='announcement_title' type='text' class='form-control' name='announcement_title' 
					value="<?php 
						if(isset($setting_data['announcement_title']))
						{
							echo $setting_data['announcement_title'];
						}
						else
						{
							echo '';
						}
					?>">
				</div>
				<div class='form-group'>
					<label for='announcement_link'>Announcement link</label>
					<input id='announcement_link' type='text' class='form-control' name='announcement_link' 
					value="<?php 
						if(isset($setting_data['announcement_link']))
						{
							echo $setting_data['announcement_link'];
						}
						else
						{
							echo '';
						}
					?>">
				</div>
				<div class='form-group'>
					<label for='announcement_description'>Announcement Description</label>
					<textarea name='announcement_description' id='announcement_description' class='form-control myTextarea' ><?php
						if(isset($setting_data['announcement_description']))
						{
							echo $setting_data['announcement_description'];
						}
						?></textarea>
				</div>
				<div class='form-group'>
					<label for='covid_name'>Covid Title</label>
					<input id='covid_name' type='text' class='form-control' name='covid_name' 
					value="<?php 
						if(isset($setting_data['covid_name']))
						{
							echo $setting_data['covid_name'];
						}
						else
						{
							echo '';
						}
					?>">
				</div>
				<div class='form-group'>
					<label for='covid_description'>Covid Description</label>
					<textarea name='covid_description' id='covid_description' class='form-control myTextarea' ><?php
						if(isset($setting_data['covid_description']))
						{
							echo $setting_data['covid_description'];
						}
						?></textarea>
				</div>
				<?php if($setting_data['covid_document']){ ?>
					<div class='form-group'>
					<label for='document'>Covid Attachment</label>
					<div id="pdf_upload_name">
						<label><?php echo $setting_data['covid_document']; ?></label>
					</div>
					<input id="documents" style="display:none" name="documents" value=<?php echo $setting_data['covid_document'];?>>
					<input id='document' type='file' class='form-control' name='document' style="display:none">
					<a href="#" id="change-pdf" title="Delete" style="display:block">Change PDF</a>
					</div>
				<?php } else { ?>
					<div class='form-group'>
					<label for='document'>Covid Attachment</label>
					<div id="pdf_upload_name" style="display:none"></div>
					<input id="documents" style="display:none" name="documents">
					<input id='document' type='file' class='form-control' name='document'>
					<a href="#" id="change-pdf" title="Delete" style="display:none">Change PDF</a>
					</div>
					<?php } ?>
					<div class='form-group'>
					<label for='contact_map'>Contact Map</label>
					<textarea name='contact_map' id='contact_map' class='form-control myTextarea' ><?php
						if(isset($setting_data['contact_map']))
						{
							echo $setting_data['contact_map'];
						}
						?></textarea>
					</div>
				<button type="submit" class="btn bg-green waves-effect" ><?php echo lang('general_save'); ?></button>	
			</form>
        </div>
    </div>
</section>
<script type="text/javascript">
	
	$(document).ready(function() {
       CKEDITOR.replace('contact_detail', { 

       	removeButtons: 'Save,NewPage,Preview,Print,Templates,Find,Replace,SelectAll,SpellChecker,Form,Checkbox,Radio,TextField,Textarea,Select,ImageButton,HiddenField,BidiLtr,BidiRtl,Unlink,ShowBlocks,About,PageBreak,SetLanguage,Flash,Table,HorizontalRule,Smiley,SpecialChar,Iframe,InsertPre,Language'
		 });

       
   	});
</script> 
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		uploader1=$('#document');
		new AjaxUpload(uploader1, {
			
			action: '<?php  echo site_url('admin/Settings/upload_pdf')?>',
			name: 'document',
			responseType: "json",
			onSubmit: function(file, ext){
				if (! (ext && /^(pdf)$/.test(ext))){ 
            // extension is not allowed 
            $.messager.show({title: '<?php  echo lang('error')?>',msg: 'Only PDF files are allowed'});
            return false;
        }
        //status.text('Uploading...');
    },
    onComplete: function(file, response){
    	var filename = response.file_name;
        $('#pdf_upload_name').html('<label>'+filename+'</label>');
        $('#pdf_upload_name').show();
        $("#documents").val(filename);
        $('#document').hide();
        $('#change-pdf').show();
    }       
	});     
	});

	$('#change-pdf').click(function(){
		var filename = $('#documents').val();
		if(confirm('Are you sure you to want to delete this pdf?')){

			$.post('<?php echo site_url('admin/Settings/upload_delete')?>',{ filename: filename },function(){

				$('#document').show();
				$('#pdf_upload_name').html('');
				$('#documents').val('');
	        	$('#change-pdf').hide();
			});
		}

	});
</script> 

<?php /* <section class="content-header">
    <div class="container-fluid">
    	<?php echo $form; ?> Pages
    </div>
</section>
*/?>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contents</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Seo</a>
			</li> -->

		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				
				<form method="POST" action="<?php echo site_url('admin/Pages/save');?>">
					
			
				<input type = "hidden" name = "id" id = "id" value="<?php echo set_value('id',(isset($pages_data->id)?$pages_data->id:''));?>"/>


				<div class='form-group'>
					<label for='title'>Name</label>
					<input id='name' type='text' class='form-control' name='name' value="<?php echo set_value('name',(isset($pages_data->name)?$pages_data->name:''));?>">
				</div>
				<div class='form-group'>
					<label for='description'>Description</label>
					<textarea name='description' id='description' class='form-control myTextarea' ><?php
						if(isset($pages_data->description))
						{
							echo $pages_data->description;
						}
						?></textarea>
				</div>
				<button type="submit" class="btn bg-green waves-effect">Submit</button>	
			</div>
		</div>
	</form>
		<?php //echo form_close(); ?>
	</div>
</div>
</section>
<script type="text/javascript">
	
	$(document).ready(function() {
       CKEDITOR.replace('description', { 

       	removeButtons: 'Save,NewPage,Preview,Print,Templates,Find,Replace,SelectAll,Scayt,SpellChecker,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,BidiLtr,BidiRtl,Unlink,Anchor,ShowBlocks,About,PageBreak,SetLanguage,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,Iframe,InsertPre,Language'
		 });

   	});
</script>
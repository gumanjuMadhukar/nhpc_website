<?php /* <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('news'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('news'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
*/?>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add/Edit News</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <?php echo form_open('', array('id' =>'form-news')); ?>
                    <input type = "hidden" name = "id" id = "id" value="<?php echo $row?$row->id:''?>" />
                <div class='form-group'>
                <label for='news_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
                <input id='news_name' type='text' class='form-control' name='name' value="<?php echo $row?$row->name:''?>" >
                </div>
                <div class='form-group'>
                <label for='image'><?php echo lang('image')?></label>
                    <div id="image_upload_name" style="display:none"></div>
                    <input name="image" id="image" class='text_input' value="<?php $row?$row->image:''?>" style="display:none"/>
                    <input type="file" id="image_upload" name="userfile" style="display:block"/>
                </div>
                <div class='form-group'>
                <label for='description'><?php echo lang('des€cription')?></label>
                <textarea name='description' id='description' class='form-control' ><?php echo $row?$row->description:''?></textarea>
                </div>
                <div class='form-group'>
                <label for='date'><?php echo lang('date')?></label>
                <input id='date' class='form-control datepicker' name='date' value="<?php echo $row?$row->date:''?>">
                </div>
                <div class='form-group'>
                <input type="checkbox" id='is_featured' name='is_featured' <?php echo ($row && $row->is_featured)?'checked':''?>> <label for='date'><?php echo lang('is_featured')?></label>
                </div>
                <button type="submit" class="btn bg-green waves-effect" onClick="save()"><?php echo lang('general_save'); ?></button>           
                <a href="<?php echo site_url('admin/News')?>" type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></a>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        CKEDITOR.replace('description', { 

        removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,Find,Replace,SelectAll,Scayt,SpellChecker,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,BidiLtr,BidiRtl,Link,Unlink,Anchor,ShowBlocks,About,PageBreak,SetLanguage,Flash,Table,HorizontalRule,Smiley,SpecialChar,Iframe,InsertPre,Language',
        filebrowserBrowseUrl: "<?php  echo site_url('uploads/news')?>"
         });
        $('#date').datetimepicker({
                format: 'YYYY-MM-DD',
        });

        uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/News/do_upload')?>","<?php echo site_url('uploads/news/thumbs/')?>","remove_doc");
        <?php if($row && $row->image){?>
            $('#image_upload').hide();
            $('#image_upload_name').html('<img src="<?php echo site_url()?>uploads/news/thumbs/<?php echo $row->image?>" height="100px" width="100px"> <buttton type="button" onclick="remove_doc()" class="btn btn-danger"><i class="fa fa-trash"></i></button>');
            $('#image_upload_name').show();
        <?php }?>
    });

    function remove_doc(argument) {
        $('#image_upload').show();
        $('#image_upload_name').hide();
        $('#image').val('');
    }
    
</script>

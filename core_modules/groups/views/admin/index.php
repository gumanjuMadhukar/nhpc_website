<div class="page-header">
    <h1 class="page-title">Roles</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="breadcrumb-item active"><a href="#">Roles</a></li>
    </ol>
    <div class="page-header-actions">
        
        <a href="javascript::void(0)" id="create-role-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="create">
            <i class="icon wb-plus" aria-hidden="true"></i>
            <span class="hidden-sm-down">Create</span>
        </a>

    </div>
</div>

<div class="page-content">
    <div class="panel">
        <header class="panel-heading">
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="role-datatable" style="width: 100% !important" class="table table-hover dataTable table-striped">
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th >Name</th>
                        <th >Description</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<div id="role-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add/Edit Roles</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' =>'form-groups', 'onsubmit' => 'return false')); ?>
                    <!-- <input type = "hidden" name = "id" id = "id"/> -->
                    <input type="hidden" name="mode" id="mode" />
                    <div class='form-group' id="role_id_form_grp">
                        <label for='id'>ID</label>
                        <input id='id' class='form-control' name='id' type="number">
                    </div>
                    <div class='form-group'>
                        <label for='name'><?php echo lang('name')?></label>
                        <input id='name' class='form-control' name='name'>
                    </div>
                    <div class='form-group'>
                        <label for='definition'><?php echo lang('definition')?></label>
                        <textarea id='definition' class='form-control' name='definition'></textarea>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-green waves-effect" onClick="save()"><?php echo lang('general_save'); ?></button>           
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></button>
            </div>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    $(document).on('click','#create-role-button', function () { 
            $('#mode').val('insert');
            $('#role-modal').modal('show');
            $('#form-groups').trigger('reset');
            $('#id').val(0);
        });

        var dataTable; 
        $(function(){
            dataTable = $('#role-datatable').DataTable({
                dom: 'Bfrtip',
                // scrollX: true,
                "serverSide": true,
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                'ajax' : { url: "<?php  echo site_url('admin/Groups/json'); ?>",type: 'POST' },
                    columns: [
                        { data: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },name: "sn", searchable: false },
                        { data: "id",name: "id"},
                        { data: "name",name: "name"},
                        { data: "definition",name: "definition"},
                        
                        { data: function(data,b,c,table) { 
                            var buttons = '';
                            if(data.id == 100){

                            }else{
                                buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#role-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

                                buttons += "<a onclick='removedemo("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>&nbsp;&nbsp";

                                buttons += "<a target='_blank' href='<?php echo site_url('admin/Users/setPermission') ?>?group_id="+data.id+"'  class='btn btn-sm btn-warning btn-outline'  title='Assign Group Permission' ><i class='icon wb-unlock' aria-hidden='true'></i></a>";
                                
                            }


                            return buttons;
                        }, name:'action',searchable: false},    
                    ],
                });
        });

        function edit(index){
            var row = dataTable.row(index).data();

            $('#id').val(row.id);
            $('#role_id_form_grp').hide();
            $('#mode').val('update');
            $("#form-groups").find('input:checkbox').prop('checked',false);
            $("#form-groups").find('input:text,select,textarea').val(function(i,v){

                /*if(row.gender == 'M')
                {
                    $('input:radio[name=gender][id=radio_1]').prop('checked',true);
                }else{
                    $('input:radio[name=gender][id=radio_2]').prop('checked',true);
                }*/
                return row[this.name];
            });
            // $('select').selectpicker('render');
        }


        function save()
        {
            $.ajax({
                url: "<?php   echo site_url('admin/Groups/save')?>",
                data: $('#form-groups').serialize(),
                dataType: 'json',
                success: function(result){
                    if(result.success)
                    {
                        $('#role-modal').modal('hide');
                        $('#form-groups')[0].reset();
                        dataTable.ajax.reload( null, false );
                    }
                },
                type: 'POST'
            });
        }

         function removedemo(index)
        {
            if(confirm("Are you sure you want to delete?") == true){
                $.post("<?php   echo site_url('admin/Groups/delete_json')?>", {id:[index]}, function(){
                    dataTable.ajax.reload( null, false );
                });
            }
        }

    
</script>
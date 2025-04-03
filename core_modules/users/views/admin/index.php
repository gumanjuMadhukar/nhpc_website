<style>
.error
{
    color: red;
}
</style>
    <div class="page-header">
        <h1 class="page-title">Users</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Users</a></li>
        </ol>
        <div class="page-header-actions">
            
            <a href="javascript::void(0)" id="create-user-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="create">
                <i class="icon wb-plus" aria-hidden="true"></i>
                <span class="hidden-sm-down">Create</span>
            </a>

        </div>
    </div>
    <!-- Main content -->
    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table style="width: 100% !important" id="user-datatable" class="table table-hover dataTable table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th >Full Name</th>
                                <th >Username</th>
                                <th >Email</th>
                                <th >Is Banned</th>
                                <th >Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>

                    </table>
                </div>
                        <!-- /.box-body -->
            </div>
                    <!-- /.box -->
        </div>
    </div>

    <div id="user-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add/Edit Users</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open('', array('id' =>'form-users', 'onsubmit' => 'return false')); ?>
                        <input type = "hidden" name = "id" id = "id"/>
                        <div class='form-group'>
                            <label for='email'><?php echo lang('email')?></label>
                            <input id='email' class='form-control' name='email'>
                            <div class="error" id="msg2"></div>
                        </div>
                        <div class='form-group'>
                            <label for='username'><?php echo lang('username')?></label>
                            <input id='username' class='form-control' name='username'>
                            <div class="error" id="msg1"></div>
                        </div>
                        <div class='form-group'>
                            <label for='password'><?php echo lang('password')?></label>
                            <input id='password' type="password" class='form-control' name='password'>
                        </div>
                        <div class='form-group'>
                            <label for='fullname'><?php echo lang('fullname')?></label>
                            <input id='fullname' class='form-control' name='fullname'>
                        </div>
                        <?php if (count($groups) > 0) : ?>
                            <div class='form-group'>
                                <label for='groups'><?php echo lang('groups')?></label>
                                <?php foreach($groups as $group): ?>
                                    <input type="radio" name="groups[]" id="group_<?php echo $group->id;?>" value="<?php echo $group->id;?>">  <label for="group_<?php echo $group->id;?>"><?php echo $group->name;?></label> <br />
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-green waves-effect"><?php echo lang('general_save'); ?></button>           
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('click','#create-user-button', function () { 
            $('#form-users').trigger('reset');
            $('#id').val(0);
            $('#user-modal').modal('show');
            document.getElementById("msg1").style.display = "none"; 
            document.getElementById("msg2").style.display = "none"; 
            var validator = $("#form-users").validate();
            validator.resetForm();
        });

        var dataTable; 
        $(function(){
            dataTable = $('#user-datatable').DataTable({
                dom: 'Bfrtip',
                // scrollX: true,
                "serverSide": true,
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                'ajax' : { url: "<?php  echo site_url('admin/Users/json'); ?>",type: 'POST' },
                    columns: [
                        { data: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },name: "sn", searchable: false },
                        { data: "fullname",name: "fullname"},
                        { data: "username",name: "username"},
                        { data: "email",name: "email"},
                        { data: function (data, type, row, meta) {
                            a = '';
                            if(data.banned == 0){
                                a = '<input type="checkbox"  disabled>';
                            }else{
                                a = '<input type="checkbox" checked disabled>';
                            }
                            return a;
                        },name: "banned", searchable: false },
                        { data: "ip_address",name: "ip_address"},
                        
                        { data: function(data,b,c,table) { 
                            var buttons = '';
                            console.log(data.login_attempts);
                            if(data.id == 1 || data.id == 2){

                            }else{
                                buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#user-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

                                buttons += "<a onclick='removedemo("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>&nbsp;&nbsp";
                                
                                buttons += "<a target='_blank' href='<?php echo site_url('admin/Users/setPermission') ?>?user_id="+data.id+"'  class='btn btn-sm btn-warning btn-outline'  title='Assign User Permission' ><i class=' icon wb-link-intact' aria-hidden='true'></i></a>&nbsp;&nbsp";
                                // buttons += "<a target='_blank' href='<?php echo site_url('admin/Users/setPermission') ?>?user_id="+data.id+"'  class='btn btn-sm btn-warning btn-outline'  title='Assign User Permission' ><i class='icon wb-unlock' aria-hidden='true'></i></a>";

                                if (data.banned == true) {
                                    buttons += '<a href="javascript:void(0)" onclick="toggleUser(' + table.row + ', \'UNLOCK\'); return false;" title="Unban/Unlock User" class="btn btn-sm btn-default btn-outline"><i class="icon wb-unlock"></i></a>&nbsp;&nbsp';
                                } else {
                                     buttons += '<a href="javascript:void(0)" onclick="toggleUser(' + table.row + ',  \'LOCK\'); return false;" title="Ban/Lock User" class="btn btn-sm btn-default btn-outline"><i class="icon wb-lock"></i></a>&nbsp;&nbsp';
                                }

                                // if (data.login_attempts >= 4) {
                                //      resetLogin = '<a href="javascript:void(0)" onclick="resetLoginAttempts(' + table.row + '); return false;" title="Reset Login Attemps" class="btn btn-sm btn-default btn-outline"><i class="icon wb-loop"></i></a>';
                                //  }
                                                    
                            }


                            return buttons;
                        }, name:'action',searchable: false},    
                    ],
                });
        });

        function edit(index){
            var row = dataTable.row(index).data();
            console.log(row);
            $('#id').val(row.id);
            $('#pass').val(row.password);
            $("#form-users").find('input:checkbox').prop('checked',false);
            var validator = $("#form-users").validate();
            validator.resetForm();
            $('.error').removeClass("error");
            $("#form-users").find('input:text,select,textarea').val(function(i,v){

                /*if(row.gender == 'M')
                {
                    $('input:radio[name=gender][id=radio_1]').prop('checked',true);
                }else{
                    $('input:radio[name=gender][id=radio_2]').prop('checked',true);
                }*/
                return row[this.name];
            });
            // $('select').selectpicker('render');

            $.post('<?php echo site_url('admin/Users/get_user_permission') ?>',{user_id:row.id},function (data) {
                $.each(data.data,function (k,val) {
                    $('#group_'+val.group_id).prop('checked',true);
                });
            },'json');
        }


        function save()
        {
            $.ajax({
                url: "<?php   echo site_url('admin/Users/save')?>",
                data: $('#form-users').serialize(),
                dataType: 'json',
                success: function(result){
                    if(result.success)
                    {
                        $('#user-modal').modal('hide');
                        $('#form-users')[0].reset();
                        dataTable.ajax.reload( null, false );
                    }
                },
                type: 'POST'
            });
        }

        function toggleUser(index, toggle) {

            if( confirm("Are you sure to " + toggle + " this user ?") == true) {
                var row = dataTable.row(index).data();
                // var row =  $("#jqxGridUser").jqxGrid('getrowdata', index);

                if (row) {
                    $.ajax({
                       url: "<?php echo site_url('admin/Users/toggle_user'); ?>",
                       type: 'POST',
                       data: {id: row.id, toggle: toggle },
                        success: function (result) {
                            var result = eval('('+result+')');
                            if (result.success) {
                                dataTable.ajax.reload( null, false );

                            }
                        },
                        error: function(result) {
                            return commit(false);
                        }
                    });
               }
           }
        }

        function removedemo(index)
        {
            if(confirm("Are you sure you want to delete?") == true){
                $.post("<?php   echo site_url('admin/Users/delete_json')?>", {id:[index]}, function(){
                    dataTable.ajax.reload( null, false );
                });
            }
        }


    </script>

    <script type="text/javascript">
$(document).ready(function () {
    $("#form-users").validate({
        rules: {
            fullname: {
                required: true
            },
            username: {
                required: true
            },
            password: {
                minlength: 8,
                maxlength: 32
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            fullname: {
                required: "Fullname  is Required"
                
            },
            username: {
                required: "Username  is Required"
                
            },
            email: {
                required: "Email is Required",
                email: "Invalid email format"
            }
        },
        submitHandler: function (form) {
            $.post('<?php echo site_url('admin/Users/get_data')?>',{'username':  function() {
                                return $( "#username" ).val();
                            },'email':  function() {
                            return $( "#email" ).val();
                        },'id':  function() {
                            return $( "#id" ).val();
                        }},function(result){
                if ($.trim(result.success) == 'emailuser')
                {
                    $('#msg1').addClass("error");
                    $('#msg2').addClass("error");
                    $("#msg1").show();
                    document.getElementById("msg1").innerHTML = "Username already exists";
                    $("#msg2").show();
                    document.getElementById("msg2").innerHTML = "Email already exists";
                }
                else if ($.trim(result.success) == 'username')
                {
                    $('#msg1').addClass("error");
                    $("#msg1").show();
                    document.getElementById("msg1").innerHTML = "Username already exists";
                    document.getElementById("msg2").style.display = "none"; 
                }
                else if($.trim(result.success) == 'email')
                {
                    $('#msg2').addClass("error");
                    $("#msg2").show();
                    document.getElementById("msg2").innerHTML = "Email already exists";
                    document.getElementById("msg1").style.display = "none"; 
                }
                else
                {
                    document.getElementById("msg1").style.display = "none"; 
                    document.getElementById("msg2").style.display = "none"; 
                    save();
                }
            
        },'json');
        },
    });
});
</script>
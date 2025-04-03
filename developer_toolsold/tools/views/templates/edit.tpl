<div class="page-header">
    <h1 class="page-title">Edit {MODULE_NAME} </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.{MODULE}') }}">{TABLE_NAME}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="page-header-actions">
    </div>
</div>
<!-- Main content -->
<div class="page-content">
    <div class="panel">
        <header class="panel-heading">
        </header>
        <div class="panel-body">
            <form role="form" action="{{ route('admin.{MODULE}.update',{VIEWTABLE}->{PRIMARY_KEY}) }}"  method="post">
                <div class="box-body">    
                {{method_field('PATCH')}}            
                {EDITFIELDS}
                {{ csrf_field() }}
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-sm btn-primary btn-outline btn-round"><i class="icon wb-add-file" aria-hidden="true"></i>  Update</button>
                    <a href="{{ route('admin.{MODULE}') }}" class="btn btn-sm btn-danger btn-outline btn-round"><i class="icon wb-close-mini" aria-hidden="true"></i>  Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
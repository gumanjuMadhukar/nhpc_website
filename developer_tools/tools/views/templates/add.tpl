<div class="page-header">
    <h1 class="page-title">Add {MODULE_NAME}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.{MODULE}') }}">{TABLE_NAME}</a></li>
        <li class="breadcrumb-item active">Add</li>
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
            <form role="form" action="{{ route('admin.{MODULE}.store') }}"  method="post">
                <div class="box-body">                
                    {FORMFIELDS}
                </div>
                {{ csrf_field() }}
                <div class="box-footer">
                    <button type="submit" class="btn btn-sm btn-primary btn-outline btn-round"><i class="icon wb-add-file" aria-hidden="true"></i>  Save</button>
                    <a href="{{ route('admin.{MODULE}') }}" class="btn btn-sm btn-danger btn-outline btn-round"><i class="icon wb-close-mini" aria-hidden="true"></i>  Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
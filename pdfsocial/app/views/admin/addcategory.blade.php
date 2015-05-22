@extends('admin.index')

@section('content')
    <div class = "col-sm-6">
        <h4 class = "text-primary">Thêm chuyên mục mới</h4>

        <form class = "form-horizontal" method = "post" action = "/admin/add-category">
            <div class = "form-group">
                <div class="col-sm-12">
                    <h4 class="text-danger"><?php if(isset($error_message)) echo $error_message ?></h4>
                </div>
            </div>
            <div class = "form-group">
                <div class="col-sm-12">
                    <h4 class="text-success"><?php if(isset($success_message)) echo $success_message ?></h4>
                </div>
            </div>
            <div class = "form-group">
                <label for = "cat" class = "col-sm-4 control-label">Tên chuyên mục</label>

                <div class = "col-sm-8">
                    <input type = "text" class = "form-control" id = "cat" placeholder = "Tên chuyên mục" name = "category">
                </div>
            </div>
            <div class = "form-group">
                <div class = "col-sm-offset-4 col-sm-8">
                    <button type = "submit" class = "btn btn-primary">Thêm chuyên mục mới</button>
                </div>
            </div>
        </form>
    </div>


@stop
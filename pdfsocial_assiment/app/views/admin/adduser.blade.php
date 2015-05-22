@extends('admin.index')

@section('content')
    <div class = "col-sm-6">
        <h4 class = "text-primary">Thêm người dùng mới</h4>

        <form class = "form-horizontal" method = "post" action = "/admin/add-user">
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
                <label for = "email" class = "col-sm-4 control-label">Email</label>
                <div class = "col-sm-8">
                    <input type = "email" class = "form-control" id = "email" placeholder = "Email" name = "email">
                </div>
            </div>

            <div class = "form-group">
                <label for = "password" class = "col-sm-4 control-label">Mật khẩu</label>
                <div class = "col-sm-8">
                    <input type = "password" class = "form-control" id = "password" placeholder = "Mật khẩu" name = "password">
                </div>
            </div>

            <div class = "form-group">
                <label for = "repassword" class = "col-sm-4 control-label">Nhập lại mật khẩu</label>
                <div class = "col-sm-8">
                    <input type = "password" class = "form-control" id = "repassword" placeholder = "Nhập lại mật khẩu" name = "rePassword">
                </div>
            </div>

            <div class = "form-group">
                <label for = "repassword" class = "col-sm-4 control-label">Quyền</label>
                <div class = "col-sm-4">
                    <select name = "role" id = "" class="form-control">
                        <option value = "0" selected >User</option>
                        <option value = "1">Admin</option>
                    </select>
                </div>
            </div>

            <hr/>

            <div class = "form-group">
                <div class = "col-sm-offset-4 col-sm-8">
                    <button type = "submit" class = "btn btn-primary">Thêm người dùng mới</button>
                </div>
            </div>
        </form>
    </div>


@stop
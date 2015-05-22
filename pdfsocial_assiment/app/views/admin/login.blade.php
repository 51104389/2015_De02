@include('admin.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form class="form-horizontal" method="post" action="/admin/login">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-danger"><?php if(isset($error_message)) echo $error_message; ?></h4>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Mật khẩu</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.footer')
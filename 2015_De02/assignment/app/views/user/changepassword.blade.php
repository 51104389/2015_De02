@include('user.header')
@include('social.navbar')
<link rel = "stylesheet" href = "/css/creative.css"/>
<div class="container user-info-page">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form class="form-horizontal" method="post" action="/user/password">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-primary">Đổi mật khẩu</h4>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <h5 class="text-info"><?php if(isset($success_message)) echo $success_message ?></h5>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <h5 class="text-info"><?php if(isset($error_message)) echo $error_message ?></h5>
                    </div>
                </div>

                <div class="form-group">
                    <label for="oldpassword" class="col-sm-4 control-label">Mật khẩu cũ</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="oldpassword" placeholder="Mật khẩu cũ" name="old_password">
                    </div>
                </div>


                <div class="form-group">
                    <label for="newPassword" class="col-sm-4 control-label">Mật khẩu mới</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="newPassword" placeholder="Mật khẩu mới" name="new_password">
                    </div>
                </div>


                <div class="form-group">
                    <label for="reNewPassword" class="col-sm-4 control-label">Nhập lại mật khẩu mới</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="reNewPassword" placeholder="Re - Mật khẩu mới" name="re_new_password">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('user.footer')
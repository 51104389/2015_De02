@include('user.header')
@include('social.navbar')
<link rel = "stylesheet" href = "/css/creative.css"/>
<div class="container user-info-page">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form class="form-horizontal" method="post" action="/user/info">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-primary">Thông tin người dùng</h4>
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
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="Email"
                                name="email"
                                disabled
                                value="<?php if(isset($user)) echo $user->email; ?>"
                                />
                    </div>
                </div>



                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Tên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="Tên" name="name"
                               value="<?php if(isset($user)) echo $user->name; ?>">
                    </div>
                </div>
                


                <div class="form-group">
                    <label for="address" class="col-sm-4 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address" placeholder="Địa chỉ" name="address"
                               value="<?php if(isset($user)) echo $user->address; ?>"
                                >
                    </div>
                </div>


                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" name="phone"
                               value="<?php if(isset($user)) echo $user->phone; ?>"
                                >
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('user.footer')




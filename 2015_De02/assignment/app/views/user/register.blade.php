<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PDF - Social Network</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Patrick+Hand|Open+Sans+Condensed:300,300italic,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/creative.css" type="text/css">
    <link rel="stylesheet" href="/css/register-page.css" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <div class="container main-container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="text-info">Đăng nhập</h3>
                <hr/>
                <form class="form-horizontal" action="/user/login" method="post">
                    <div class="form-gourp">
                        <h6 class="col-sm-offset-2 text-danger">
                            <?php if (isset($loginMessage)) echo $loginMessage ?>
                        </h6>
                    </div>
                    <div class="form-group">
                        <label for="emailLogin" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input
                                    type="email"
                                    class="form-control"
                                    id="emailLogin"
                                    placeholder="Email"
                                    name="emailLogin"
                                    required="true"
                                    />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordLogin" class="col-sm-2 control-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <input
                                    type="password"
                                    class="form-control"
                                    id="passwordLogin"
                                    placeholder="Password"
                                    name="passwordLogin"
                                    required="true"
                                    />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <h3 class="text-info">Đăng kí</h3>
                <hr/>
                <form class="form-horizontal" action="/user/register" method="post">
                    <div class="form-gourp">
                        <h6 class="col-sm-offset-2 text-danger">
                            <?php if (isset($message)) echo $message ?>
                        </h6>
                        <h6 class="col-sm-offset-2 text-primary">
                            <?php if (isset($success_message)) echo $success_message ?>
                        </h6>
                    </div>
                    <div class="form-group">
                        <label for="emailRegister" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input
                                    type="email"
                                    class="form-control"
                                    id="emailRegister"
                                    name="email"
                                    placeholder="Email"
                                    required="true"
                                    value="<?php if (isset($oldEmail)) echo $oldEmail ?>"
                                    />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordRegister" class="col-sm-2 control-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <input
                                    type="password"
                                    class="form-control"
                                    id="passwordRegister"
                                    name="password"
                                    placeholder="Password"
                                    required="true"
                                    value="<?php if (isset($oldPassword)) echo $oldPassword ?>"
                                    />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rePasswordRegister" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="rePasswordRegister" name="repassword" placeholder="Re-Password" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-primary">Đăng kí</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/jquery.fittext.js"></script>
<script src="/js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/js/creative.js"></script>

</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <title>pdf - admin</title>
    <link rel = "stylesheet" href = "/css/bootstrap.css"/>
    <link rel = "stylesheet" href = "/font-awesome/css/font-awesome.css"/>
    <link rel = "stylesheet" href = "/css/admin.css"/>
</head>
<body>
<nav class = "navbar navbar-default">
    <div class = "container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse"
                    data-target = "#bs-example-navbar-collapse-1">
                <span class = "sr-only">Toggle navigation</span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href = "#">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">

                <ul class = "nav navbar-nav navbar-right">
                    @if(Session::get('Email') != null)
                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button"
                           aria-expanded = "false"> <span class="fa fa-user"></span> {{ Session::get('Email')  }} <span class = "caret"></span></a>
                        <ul class = "dropdown-menu" role = "menu">
                            <li><a href = "/admin/logout">Thoát</a></li>
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href = "/admin/login">Đăng nhập</a>
                    </li>
                    @endif
                </ul>
            




        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
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
            <a class = "navbar-brand" href = "/social">PDF</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav navbar-right">
                <li>
                    <a href = "/user/article" class="post-artical">Đăng bài</a>
                </li>
                <li>
                    <a href = "/social" class="post-artical">Mạng xã hội</a>
                </li>
                <li class = "dropdown">
                    <a href = "#" class = "dropdown-toggle user-email" data-toggle = "dropdown" role = "button"
                       aria-expanded = "false"><?php if (isset($email)) echo $email; ?> <span class = "caret"></span></a>
                    <ul class = "dropdown-menu" role = "menu">
                        <li><a href = "/user/info">Thông tin người dùng</a></li>
                        <li><a href = "/user/password">Đổi mật khẩu</a></li>
                        <li class = "divider"></li>
                        <li><a href = "/user/logout">Thoát</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
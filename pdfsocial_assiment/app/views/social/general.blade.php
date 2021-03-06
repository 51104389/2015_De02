<!DOCTYPE html>
<html lang = "en">

<head>

    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <meta name = "description" content = "">
    <meta name = "author" content = "">

    <title>PDF - Social Network</title>

    <!-- Bootstrap Core CSS -->
    <link rel = "stylesheet" href = "/css/bootstrap.min.css" type = "text/css">

    <!-- Custom Fonts -->
    <link href = 'http://fonts.googleapis.com/css?family=Patrick+Hand|Open+Sans+Condensed:300,300italic,700&subset=latin,vietnamese'
          rel = 'stylesheet' type = 'text/css'>
    <link rel = "stylesheet" href = "/font-awesome/css/font-awesome.min.css" type = "text/css">

    <!-- Plugin CSS -->
    <link rel = "stylesheet" href = "/css/social.css"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src = "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id = "page-top">
@include('social.navbar')
<div class="container-fluid">
    <div class="row">
        @include('social.sidebar')
        @yield('content')
    </div>
</div>

<!-- jQuery -->
<script src = "/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src = "/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src = "/js/jquery.easing.min.js"></script>
<script src = "/js/jquery.fittext.js"></script>
<script src = "/js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src = "/js/creative.js"></script>
<script src = "/js/social.js"></script>

</body>

</html>

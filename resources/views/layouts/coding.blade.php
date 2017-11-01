<!doctype html>
<html lang="zh-hans">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/')}}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('/')}}/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    {!! SEO::generate() !!}
    <meta name="author" content="王国营" />
    <link href="{{asset('/')}}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}/assets/css/material-kit.css" rel="stylesheet"/>
    <link href="{{asset('/')}}/assets/css/basic.css" rel="stylesheet" />
    @yield('css')
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{asset('/')}}/assets/img/logo.png" alt="Coding Man" data-html="true">
                    </div>
                    <div class="brand">
                        Coding Man
                    </div>
                </div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navigation-index">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('courses')}}" class="btn btn-white btn-simple btn-just-icon">
                        课程
                    </a>
                </li>
                <li>
                    <a href="{{url('posts')}}" class="btn btn-white btn-simple btn-just-icon">
                        博客
                    </a>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}" class="btn btn-white btn-simple btn-just-icon">登录</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-white btn-simple btn-just-icon">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-white btn-simple btn-just-icon" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="text-center">
                                    退出登录
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
@yield('header')
<!-- Begin Main Content -->
    <div class="main main-raised">
        @yield('content')
    </div>
    <!-- End Main Content -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <nav class="pull-left">
                    <ul style="padding-top: 16px;">
                        <li>易行动出品</li>
                        <li>Since 2017</li>
                    </ul>
                </nav>
                <div class="copyright pull-right"><strong>&copy;</strong> 版权所有，侵权者追究法律责任</div>
            </div>
        </div>
    </footer>
</div>
</body>
<script src="{{asset('/')}}/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}/assets/js/material.min.js"></script>
<script src="{{asset('/')}}/assets/js/material-kit.js" type="text/javascript"></script>
@yield('js')
</html>
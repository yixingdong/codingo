@extends('layouts.coding')

@section('css')
    <style>
        .index-page .wrapper > .header {
            height: 50vh;
        }
        #slogan {
            margin-top: 18vh;
            color: #FFFFFF;
            text-align: center;
        }
    </style>
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="section container">
        <div class="col-md-6 col-md-offset-3">
            <div class="card card-signup">
                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <h4>用户登录</h4>
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger text-center">
                            ~ 用户名和密码感情破裂了 ~
                        </div>
                    @endif
                    <div class="content">
                        <div class="input-group">
                            <span class="input-group-addon">邮箱</span>
                            <div class="form-group is-empty">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <span class="material-input"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">密码</span>
                            <div class="form-group is-empty">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="checkbox pull-left">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                                </label>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-link btn-simple" href="{{ route('password.request') }}" style="font-size: 14px">
                                    找回密码
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
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
                <form class="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <h4>注册会员</h4>
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger text-center">
                            ~ 此邮箱已被注册 ~
                        </div>
                    @endif
                    @if ($errors->has('name'))
                        <div class="alert alert-danger text-center">
                            ~ 好名字大家都抢 ~
                        </div>
                    @endif
                    @if ($errors->has('password'))
                        <div class="alert alert-danger text-center">
                            ~ 密码不一致 ~
                        </div>
                    @endif
                    <div class="content">
                        <div class="input-group">
                            <span class="input-group-addon">您的昵称</span>
                            <div class="form-group is-empty">
                                <input type="text" id="name" name="name"  value="{{ old('name') }}" class="form-control"  required autofocus>
                                <span class="material-input"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">您的邮箱</span>
                            <div class="form-group is-empty">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <span class="material-input"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">设置密码</span>
                            <div class="form-group is-empty">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">确认密码</span>
                            <div class="form-group is-empty">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-simple btn-primary btn-lg">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
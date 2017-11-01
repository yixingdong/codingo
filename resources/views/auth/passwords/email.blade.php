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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">找回密码</div>

                    <div class="panel-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success">
                                密码重置邮件发送成功，请登录您的邮箱重置您的密码
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">邮箱地址</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $errors->has('email')?'这个邮箱尚未被注册':old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        发送密码重置链接
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
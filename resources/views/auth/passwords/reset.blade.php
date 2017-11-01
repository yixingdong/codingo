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
                    <div class="panel-heading">重置密码</div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger text-center">
                            ~ 密码不一致 ~
                        </div>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">邮件地址</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">新的密码</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">确认密码</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        设置新密码
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
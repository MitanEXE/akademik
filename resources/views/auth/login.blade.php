@extends('layouts.head')
@section('title','Login Page')
<div class="auth-wrapper">
    <form action="{{ route('login') }}" autocomplete="on" method="post" role="form" id="form-signin">
        @csrf
        <div class="auth-header">
            <div class="auth-title">Academic</div>
            <div class="auth-subtitle">Simple and Clean Admin Template</div>
            <div class="auth-label">Login</div>
        </div>
        <div class="auth-body">
            <div class="auth-content">
                <div class="form-group">
                    <label for="">Username</label>
                    <input class="form-control" placeholder="Enter username" name="username" type="text" value="admin@lfyteam.com">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" placeholder="Enter password" name="password" type="password" value="admin@lfyteam.com">
                    <div class="validation-message" data-field="password"></div>
                </div>
            </div>
            <div class="auth-footer">
                <input type="submit" value="Log me in" id="sign-in" class="btn btn-primary" />
                <div class="pull-right auth-link">
                    <label class="check-label"><input type="checkbox" name="keep_login" value="true"> Remember
                        Me</label>
                    <div class="devider"></div>
                    <a href="">Forgot Password?</a>
                </div>
            </div>
        </div>
    </form>
</div>
@include('layouts.foot')

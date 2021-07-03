@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 4%;">
    <div class="row justify-content-center">
        <div class="col-md-6 usertypeCard">
            <div class="card" style="box-shadow: 1px 2px 10px #999;">
                <div class="card-header" style="text-align:center;background-color: #3490dc;color: white;">
                    <h4>Login as</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                <div class="text-center justify-content-center page-single-content">
                                    <img src="{{url('/')}}/images/login.png" alt="img" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12" style="margin-left: 30px;">
                                        <button type="button" class="btn btn-primary userType" data-id='1'>
                                            I am a Parent
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 130px; margin-left: 30px;">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary userType" data-id='2'>
                                            I am a Tutor
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 loginForm" style="display: none;">
            <div class="card" style="box-shadow: 1px 2px 10px #999;">
                <div class="card-header">
                    <img src="{{url('/')}}/images/logo.png" style="width: 108%;    margin: -12px -19px -12px;" class="header-brand-img desktop-lgo" alt="Admintro logo">                
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="userTypeVal" id="userTypeVal">

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a class="btn btn-primary float-right" href="">
                                    Choose UserType
                                </a>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    var errorMsg = $('.invalid-feedback').text();
    if (errorMsg != '') {
//        var userType = $(this).data("id");
        var getUserType = localStorage.getItem("userTypeVal");
        $('#userTypeVal').val(getUserType);
        $(".usertypeCard").css("display", 'none');
        $(".loginForm").css("display", 'block');
    }
    $(".userType").on("click", function () {
        var userType = $(this).data("id");
        $('#userTypeVal').val(userType);
        localStorage.setItem("userTypeVal", userType);
        $(".usertypeCard").css("display", 'none');
        $(".loginForm").css("display", 'block');
    });
});
</script>
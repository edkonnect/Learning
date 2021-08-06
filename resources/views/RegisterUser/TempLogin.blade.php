<!-- saved from url=(0035)http://smarteduplace.com/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title></title>
        <style>
            @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
            .login-block{
                background: #DE6262;  /* fallback for old browsers */

                background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                float:left;
                width:100%;
                padding : 50px 0;
            }
            /*background-size:cover;*/
            .banner-sec{background:url(<?php echo url('/') . '/uploads/login/pexels-photo.jpg'; ?>)  no-repeat center; margin-bottom:60px;  min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
            /*.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}*/
            .container{background:#fff; border-radius: 10px;}
            .carousel-inner{border-radius:0 10px 10px 0;}
            .carousel-caption{text-align:left; left:5%;}
            .login-sec{padding: 180px 30px; position:relative;}
            .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
            .login-sec .copy-text i{color:#FEB58A;}
            .login-sec .copy-text a{color:#E36262;}
            .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
            .login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
            .btn-login{background: #DE6262; color:#fff; font-weight:600;}
            .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
            .banner-text h2{color:#fff; font-weight:600;}
            .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
            .banner-text p{color:#fff;}
        </style>
    </head>
    <body>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet" />
        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 login-sec">

                        <form class="form" method="POST" action="{{url('temp-login/store')}}">

                                <img src="{{url('/')}}/images/logo/logo.png" alt="Edkonnect logo" class="header-brand-img desktop-lgo" style="margin-top:-40px !important;width: 100%;">
                                <div class="form-group" style="margin-top:35px !important;">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="radio" checked  name="userTypeVal" value="3">
                                        <label for="male">I am a Parent</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="userTypeVal" value="2">
                                        <label for="female">I am a Tutor</label>
                                    </div>
                                </div>
                                </div>
                                @csrf
                                <div class="form-group">
                                    <label class="text-uppercase" for="exampleInputEmail1">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                </div>

                                <div class="form-group">
                                    <label class="text-uppercase" for="exampleInputPassword1">Password</label>
                                    <input id="password" type="password" class="form-control " name="password"  autocomplete="current-password">


                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <small>{{ __('Remember Me') }}</small>
                                    </label>
                                    <button type="submit" class="btn btn-login float-right">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="text-decoration:none;" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                                </div>
                        </form>
                    </div>
                    <div class="col-md-8 banner-sec">
                        <div class="carousel-item">
                            <img alt="First slide" class="d-block img-fluid" src="{{url('/')}}/uploads/login/people-coffee-tea-meeting.jpg">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>This is Heaven</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

@extends('layouts.web_auth')
@section('title', 'Login')
@section('css')
<style>
    body {
        font-family: 'Montserrat', sans-serif !important;
        background-color: #fff;
        display: block;
        background-image: none;
        padding: 0;
    }

    .bgc-col {
        background: #000;
        height: 100vh;
        padding: 1.5rem;
    }

    .trickey-main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .reg-form input, select {
        background-color: transparent !important;
        padding: 10px !important;
    }

    .reg-term a {
        text-decoration: underline;
    }

    .reg-form .form-check label {
        font-size: 12px;
    }

    .form-main h3 {
        color: #000;
        font-weight: 600;
    }

    .reg-form button {
        background-image: linear-gradient(180deg, #E35F01 0%, #FD7E00 100%);
        color: white;
        padding: 10px;
        width: 200px;
        border-radius: 20px;
    }

    .reg-form button:hover{
        background: #8f01f9;
        color: white;
    }

    .already-txt a {
        text-decoration: underline;
        color: #000;
    }

    .line {
        width: 24%;
        border-top: 1px solid;
        color: #E35F01;
    }

    .division {
        display: flex;
        justify-content: space-between;
        height: 50px;
        align-items: center;
    }

    @media only screen and (min-width:280px) and (max-width:1023px) {

        body {
            overflow: visible;
        }

        .bgc-col {
            min-height: 100px;
        }

        .reg-logo {
            margin-bottom: 0;
            padding-bottom: 10px;
            padding-left: 0 !important;
            text-align: center;
        }



    }

    .eye-icon {
        position: absolute;
        margin-top: 40px;
        right: 20px;
        font-size: 20px;
        z-index: 1;
    }

    .login-right-col form.reg-form.text-dark {
        min-height: 85vh;
        display: flex;
        flex-flow: column;
        justify-content: center;
    }

    @media screen and (max-width:992px) and (min-width:768px) {
        .login-left-col .bgc-col {
            min-height: 0px !important;
            height: auto;
            padding: 15px 0px;
        }

        .trickey-main {
            display: none;
        }

    }


    @media screen and (max-width:767px) and (min-width:520px) {
        .login-left-col .bgc-col {
            min-height: 0px !important;
            height: auto;
            padding: 15px 0px;
        }

        .trickey-main {
            display: none;
        }

    }


    @media screen and (max-width:519px) and (min-width:320px) {
        .login-left-col .bgc-col {
            min-height: 0px !important;
            height: auto;
            padding: 15px 0px;
        }

        .trickey-main {
            display: none;
        }

    }
</style>
@endsection
@section('content')
<div class="row gx-0">
    <div class="col-sm-12 col-md-12 col-lg-4 pl-0 pr-0 login-left-col">
        <div class="bgc-col">
            <div class="reg-logo text-center">
                <img alt="Easy Seo Logo" src="{{asset('front')}}/images/logo.svg" width="100px">
            </div>
            <div class="trickey-main">
                <img src="{{asset('front/images/metrics-pana.svg')}}" width="65%" alt="metrics-pana.svg">
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 login-right-col">
        <div class="row gx-0">
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-4 p-3 justify-content-center">
                <div class="form-main mt-4">
                    <form method="POST" action="{{ route('auth.login.submit') }}" class="reg-form text-dark">
                        @csrf
                        <input type="hidden" name="time_zone" id="user_time_zone">
                        <h3>Sign in</h3>

                        <a href="{{ route('auth.social.redirect', 'google') }}"><button type="button"
                                class="btn mt-4 mr-2 w-100"><i class="lni lni-google mr-2 text-light"></i>
                                Sign in with google</button></a>

                        <div class="division mt-4 mb-5">
                            <div class="line line-left"></div>
                            <span>Or sign in with your email</span>
                            <div class="line line-right"></div>
                        </div>

                        <div class="form-group pb-1">
                            <label for="">Email</label>
                            <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="inputChoosePassword"
                                    value="" placeholder="Enter Password" name="password" required> <a
                                    href="javascript:;" class="input-group-text bg-transparent"><i
                                        class="bx bx-hide"></i></a>
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group pb-1">
                            <label for="remember">Remember me</label>
                            <input type="checkbox" name="remember" value="{{old('remember') ?? 1}}">
                        </div>

                        <div class="reg-btn d-flex justify-content-center mt-3">
                            <button type="submit" class="btn">Sign in</button>
                        </div>

                        <div class="forgot-pass text-center mt-3">
                            <a href="{{route('password.request')}}">Forgot Password?</a>
                        </div>

                        <div class="already-txt text-center mt-4">
                            <p>Don't have an account yet? <a href="{{route('register')}}">Sign up here</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
</div>
@endsection

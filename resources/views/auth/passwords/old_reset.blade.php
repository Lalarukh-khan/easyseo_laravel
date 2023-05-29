@extends('layouts.web_auth')
@section('title', 'Forget Password')
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


    .reg-form .form-check label {
        font-size: 12px;
    }

    .reg-form button {
        background-image: linear-gradient(180deg, #E35F01 0%, #FD7E00 100%);
        color: white;
        padding: 10px;
        width: auto;
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
                <img src="{{asset('front/images/Reset-password-amico.svg')}}" width="65%" alt="Reset-password-amico.svg">
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 login-right-col mt-5">
        <div class="row gx-0 mt-5">
            <div class="col-sm-12 col-md-3 col-lg-3 "></div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-4 p-3 justify-content-center mt-5">
                <div class="form-main mt-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}" class="reg-form">
                        @csrf
                         <input type="hidden" name="token" value="{{ $token }}">
                        <h3>{{ __('Reset Password') }}</h3>

                        <div class="form-group pb-1">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" @error('email') is-invalid @enderror"  name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group pb-1">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group pb-1">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="reg-btn d-flex justify-content-center mt-3">
                            <button type="submit" class="btn">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.web_auth')
@section('title', 'Register')
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

    .main-tick {
        background-color: #fff;
        box-shadow: 0 5px 14px 0 rgb(0 0 0 / 10%);
        padding: 43px 19px 38px;
        border-radius: 20px;
        max-width: 300px;
    }

    .top-heading-pra {
        margin-bottom: 20px;
    }

    .top-heading-pra p {
        margin-top: 20px;
        font-size: 18px;
    }

    .top-heading-pra h4 {
        margin-bottom: 20px;
        line-height: 1.5em;
        font-weight: 700;
        font-size: 20px;
    }

    .check-img-pra {
        display: grid;
        row-gap: 16px;
        margin-bottom: 23px;
    }

    .check-img-pra p {
        margin-bottom: 0;
        font-weight: 600;
        color: #000;
    }

    .check-img-pra img {
        border-radius: 5px;
        margin-right: 11px;
    }

    .reg-form input,
    select {
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
                    <div class="main-tick">
                        <div class="top-heading-pra">
                            <h4 class="text-center text-dark">Free Trial</h4>
                            <p class="text-center trick-p">Create an account and start a 7-day trial now.</p>
                        </div>
                        <div class="check-img-pra">
                            <p><i class="fa fa-check"> </i> Get 5000 free words</p>
                            <p><i class="fa fa-check"> </i> Access to 100+ templates</p>
                            <p><i class="fa fa-check"> </i> Write amazing content in seconds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8 login-right-col">
            <div class="row gx-0">
                <div class="col-sm-12 col-md-3 col-lg-3"></div>
                <div class="col-sm-12 col-md-6 col-lg-6 form-col pt-4 p-3 justify-content-center">
                    <div class="form-main mt-4">
                        <form method="POST" action="{{ route('auth.register.submit') }}" class="reg-form text-dark">
                            @csrf
                            <input type="hidden" name="time_zone" id="user_time_zone">
                            <h3>Create account</h3>

                            <a href="{{ route('auth.social.redirect', 'google') }}"><button type="button"
                                    class="btn btn-rounded mt-4 mr-2 w-100"><i class="lni lni-google mr-2 text-light"></i>
                                    Sign up with google</button></a>

                            <div class="division mt-4 mb-5">
                                <div class="line line-left"></div>
                                <span>Or sign up with your email</span>
                                <div class="line line-right"></div>
                            </div>

                            <div class="row gx-0">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 col-md-12" style=" padding: 0px 10px 5px 0px; ">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="first_name" @error('first_name') is-invalid @enderror"
                                        name="first_name" value="{{ old('first_name') }}" class="form-control"
                                        placeholder="First Name" required>
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 col-md-12" style=" padding: 0px 0px 5px 10px">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="last_name" @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" class="form-control" placeholder="Last Name"
                                        required>
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group pb-1">
                                <label for="">Email</label>
                                <input type="email" class="form-control" @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" class="form-control" placeholder="Email"
                                    required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="reg-btn d-flex justify-content-center mt-3">
                                <button type="submit" class="rounded-pill btn">Create Account</button>
                            </div>

                            <div class="already-txt text-center mt-4">
                                <p>Already have an account? <a href="{{route('login')}}">Sign in here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3"></div>
            </div>
        </div>
    </div>

@endsection

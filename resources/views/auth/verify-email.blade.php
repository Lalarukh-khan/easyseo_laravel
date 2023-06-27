@extends('layouts.web_auth')
@section('title', 'Verify Email')
@section('content')


<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo menu-text fw-bolder ms-2" style="margin-top: 5px;"><img alt="Easy Seo Logo" src="{{asset('front')}}/images/logodark.png" ></span>
                </a>
              </div>
              <h3 class="mb-2">Verify your email ✉️</h3> 
                <p class="text-start">
                Account activation link sent to your email address: {{auth('web')->user()->email}}  Please follow the link inside to
                continue.
                </p>
              <!-- /Logo -->
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif
                <!-- <br> -->
                <p class="text-center">
                    Didn't get the mail?
                </p>
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn nwwbauthbtn w-100 my-3">Resend Verification Link</button>
                </form>
                <br>
                <p style="text-align: right;"><a href="{{ route('auth.logout') }}" onclick="logout(event)"><u>Logout</u></a></p>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

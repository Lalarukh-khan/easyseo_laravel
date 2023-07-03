@extends('layouts.web_auth')
@section('title', 'Forgot Password')
@section('css')
@endsection
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
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              
                @if (session('status'))
                <div class="alert alert-success text-dark mt-2 mb-1" role="alert">
                    {{ session('status') }}
                </div>
                @endif

              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('forget.password.post') }}">
                @csrf

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    name="email" value="{{ old('email') }}"
                    id="email"
                    placeholder="Enter your email"
                    required
                    autofocus
                  />
                </div>
                @error('email')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                  <button class="btn nwwbauthbtn d-grid w-100" type="submit" >Send Reset Link</button>
                </div>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Back to login
                    </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

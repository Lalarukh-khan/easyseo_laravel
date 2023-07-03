@extends('layouts.web_auth')
@section('title', 'Reset Password')
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
              <h4 class="mb-2">Reset Password 🔒</h4>
              <p class="mb-4">for <span class="fw-bold">{{ $email }}</span></p>
              
              <!-- /Logo -->
              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('reset.password.post') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{$email}}">
                <div class="mb-3">
                  <label for="email" class="form-label">Password</label>
                  <input
                    class="form-control"
                    type="password" 
                    name="password"  
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required
                    id="email"
                    required
                    autofocus
                  />
                @error('password')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Confirm Password</label>
                  <input
                    class="form-control"
                    type="password" 
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required
                    id="email"
                    required
                    autofocus
                  />
                @error('password_confirmation')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                  <button class="btn nwwbauthbtn d-grid w-100" type="submit" >Reset Password</button>
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

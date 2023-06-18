@extends('layouts.web_auth')
@section('title', 'Login')
@section('css')
@endsection
@section('content')


<!-- Content -->

<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="{{Url('/')}}" class="app-brand-link gap-2">
                  <span class="app-brand-text demo menu-text fw-bolder ms-2" style="margin-top: 5px;"><img alt="Easy Seo Logo" src="{{asset('front')}}/images/logodark.png" ></span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome Back 👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('auth.login.submit') }}">
                @csrf

                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror 

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
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="{{ route('password.request') }}">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer bg-transparent" onclick="eyeiconpass()"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember_me"/>
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn nwwbauthbtn d-grid w-100" type="submit" >Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                  <span>Create an account</span>
                </a>
              </p>
              <p class="text-center">
                <span>By proceeding, you are agreeing to </span>
                <a href="{{ route('web.home') }}">
                  <span>easyseo.ai </span>
                </a>
                <a href="{{ route('web.terms') }}">
                  <span> Terms of Service </span>
                </a>and
                <a href="{{ route('web.privacy') }}">
                  <span> Privacy Policy </span>
                </a>
              </p>

              <div class="divider my-4">
                <div class="divider-text">or</div>
              </div>

              <a href="{{ route('auth.social.redirect', 'google') }}">
                <div class="row logingicn">
                  <div class="col-lg-2 col-md-2 col-sm-3 col-3 gglgimg">
                      <img src="{{asset('front')}}/assets/images/google.png" alt="" style="width: 100%; height: auto;padding-top: 5px;">
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-10 col-10" style="text-align: center;">
                    <p style="padding-top: 10px;">Sign in with Google</p>
                  </div>
                </div>
              </a>
              <!-- <div class="d-flex justify-content-center">
                <a href="{{ route('auth.social.redirect', 'facebook') }}" class="btn btn-icon btn-label-facebook me-3">
                  <i class="tf-icons bx bxl-facebook"></i>
                </a>

                <a href="{{ route('auth.social.redirect', 'google') }}" class="btn btn-icon btn-label-google-plus me-3">
                  <i class="tf-icons bx bxl-google-plus"></i>
                </a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
</div>

    <!-- / Content -->

@endsection

@extends('layouts.web_auth')
@section('title', 'Register')
@section('css')
@endsection
@section('content')


 <!-- Content -->

 <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="margin-top: 5px;"><img alt="Easy Seo Logo" src="{{asset('front')}}/images/logodark.png" ></span>
                </a>
              </div>
              <!-- /Logo -->
              <h5 class="mb-2">Get started with 5,000 free words 🚀</h5>
              <p class="mb-4">No credit card required!</p>

              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('auth.register.submit') }}">
                @csrf
                <input type="hidden" name="invitation_code" id="invitation_code" value="{{@$invitation_code}}">
                <input type="hidden" name="time_zone" id="user_time_zone">
                <input type="hidden" name="country" value="{{$currentUserInfo->countryName ?? 'Unknown'}}">
                <input type="hidden" name="city" value="{{$currentUserInfo->cityName ?? 'Unknown'}}">
                <div class="mb-3">
                  <label for="username" class="form-label">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="first_name" value="{{ old('first_name') }}" required
                    placeholder="Enter your First Name"
                    autofocus
                  />
                    @error('first_name')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="last_name" value="{{ old('last_name') }}" required
                    placeholder="Enter your Last Name"
                    autofocus
                  />
                    @error('last_name')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? @$invited_email}}" {{ isset($invited_email) && !empty($invited_email) ? 'readonly' : '' }}   required placeholder="Enter your email" />
                    @error('email')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password" required
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer bg-transparent" onclick="eyeiconpass()"><i class="bx bx-hide"></i></span>
                  </div>
                    @error('password')
                    <span class="text-danger mt-0 mb-1">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div> -->
                <button class="btn d-grid w-100 nwwbauthbtn" type="submit">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                  <span>Sign in instead</span>
                </a>
              </p>

              <p class="text-center">
                <span>I agree to the </span>
                <a href="{{ route('web.terms') }}">
                  <span> Terms of Service </span>
                </a>and 
                <a href="{{ route('web.privacy') }}">
                  <span> Privacy Policy </span>
                </a>of
                <a href="{{ route('web.home') }}">
                  <span>easyseo.ai </span>
                </a>to receive information about the product.
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
                    <p style="padding-top: 10px;">Sign up with Google</p>
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

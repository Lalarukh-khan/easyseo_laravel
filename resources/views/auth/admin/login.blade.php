@extends('layouts.admin_auth')
@section('title', 'Login')
@php
    $title = 'login';
@endphp
@section('content')
<div class="row g-0">
    <div class="col-xl-12">
        <div class="card-body p-5">
            <div class="text-center">
                {{-- <img src="{{asset('admin_assets')}}/assets/images/logo-icon.png" width="80" alt=""> --}}
                <h2 class="font-weight-bold">easyseo.ai</h2>
            </div>
            <div class="">
                <div class="form-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}" class="row g-3" novalidate>
                        @csrf
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputEmailAddress" placeholder="Enter your username" name="username" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

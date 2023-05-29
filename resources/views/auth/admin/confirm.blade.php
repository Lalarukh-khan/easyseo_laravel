@extends('layouts.auth_layout')
@section('title', 'Confirm Password')
@section('page-heading', 'Confirm Password')
@section('content')
<div class="title">{{ __('Confirm Password') }}</div>

<div class="form">
    {{ __('Please confirm your password before continuing.') }}

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>

            <div class="current_pass">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Confirm Password') }}
            </button>
        </div>
    </form>
</div>
@endsection

@section('after-page')
<div class="row mt-3">
    <div class="col-12 text-center">
        @if (Route::has('password.request'))
        <a class="text-white-50 ml-1" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div> <!-- end col -->
</div>
@endsection
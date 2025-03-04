@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto m-5 card">
            <div class="row">
                <div class="col-4 text-center" style="background-image: url('/img/food12.jpg');
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    opacity: 0.8;">
                    <img src="/img/tibetanbusiness.png" alt="" style="top:50%">
                </div>
                <div class="col-8">
                    <!-- Header -->
                    <div class="py-3 text-center">
                        <h6 class="text-secondary">Reset Your Password...</h6>
                        <div class="dropdown-divider"></div>
                    </div>
                    <!-- form -->
                    <div class="p-2">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input-group mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="row text-center">
                                <div class="col-12 py-2">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
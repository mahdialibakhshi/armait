@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex justify-content-center">
        <div class="form-access my-auto">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <span>Reset Password</span>
                <div class="form-group">
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email Address"
                        required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="Password"
                        required
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        id="password-confirm"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="{{ __('Confirm Password') }}"
                        required
                        autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>
@endsection

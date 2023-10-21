@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex justify-content-center">
        <div class="form-access my-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <span>Create Account</span>
                <div class="form-group">
                    <input
                        id="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        placeholder="Full Name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
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
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="form-checkbox">
                    <label class="custom-control-label" for="form-checkbox">I agree to the <a href="#!">Terms &
                            Conditions</a></label>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create Account') }}</button>
            </form>
            <h2>Already have an account? <a href='{{ route('login') }}'>Sign in here</a></h2>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex justify-content-center">
        <div class="form-access my-auto">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <span>Reset Password</span>
                <div class="form-group">
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ $email ?? old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="{{ __('Email Address') }}"
                        autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send Reset Link</button>
            </form>
            <h2>Remembered your password? <a href='{{ route('login') }}'>Sign in here</a></h2>
        </div>
    </div>
@endsection


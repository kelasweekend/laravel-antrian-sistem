@extends('layouts.auth')

@section('title')
    Login Account
@endsection

@section('content')
    <div class="col-md-4 col-11">
        <div class="card p-3 rounded shadow-sm">
            <img src="{{ asset('assets/logo.png') }}" width="200" class="mx-auto mt-4" alt="">
            <h3 class="text-center mt-4">Login Account</h3>
            <p class="fw-bold text-center">Enter Your Account</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl  @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email Address">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl  @error('password') is-invalid @enderror"
                        name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-sm mt-3">
                    Log in
                </button>
            </form>
        </div>
    </div>
@endsection

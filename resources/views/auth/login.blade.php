@extends('layouts.app')

@section('title', 'login')

@section('container')
<!-- Login Page -->
<div id="loginPage" class="login-container d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-card p-4 shadow rounded bg-white">
                    <div class="text-center mb-4">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
                        </a>
                        <h3 class="text-primary">Welcome to Career Training College</h3>
                        <p class="text-muted">Sign in to your account</p>
                    </div>
                    {{-- Session status --}}
                    @if (session('status'))
                        <div class="alert alert-success mt-2">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- Validation Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        {{-- <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-primary">Create an Account</a>
                            @endif
                        </div> --}}
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
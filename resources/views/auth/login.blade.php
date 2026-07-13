@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <span style="font-size: 3rem;">⚡</span>
                        </div>
                        <h2 class="fw-bold mb-2">Welcome Back</h2>
                        <p class="text-muted">Sign in to access your dashboard</p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            <strong>✓</strong> {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <strong>⚠</strong>
                            <ul class="mb-0 mt-2" style="list-style: none; padding-left: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="your@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me for 30 days
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Sign in</button>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--primary-color); font-weight: 500;">Forgot your password?</a>
                    </div>
                    <hr class="my-4">
                    <div class="text-center">
                        <span class="text-muted">New to NAIN Testing Lab?</span>
                        <a href="{{ route('register') }}" class="text-decoration-none ms-1" style="color: var(--primary-color); font-weight: 600;">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

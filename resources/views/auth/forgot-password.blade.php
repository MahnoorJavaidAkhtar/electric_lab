@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <span style="font-size: 3rem;">🔐</span>
                        </div>
                        <h2 class="fw-bold mb-2">Reset Your Password</h2>
                        <p class="text-muted">Enter your email to receive a password reset link</p>
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
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" required placeholder="your@email.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <span style="margin-right: 0.5rem;">📧</span> Send Reset Link
                        </button>
                    </form>
                    <hr class="my-4">
                    <div class="text-center">
                        <span class="text-muted">Remember your password?</span>
                        <a href="{{ route('login') }}" class="text-decoration-none ms-1" style="color: var(--primary-color); font-weight: 600;">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

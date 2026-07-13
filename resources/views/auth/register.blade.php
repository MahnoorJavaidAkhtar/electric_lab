@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <span style="font-size: 3rem;">⚡</span>
                        </div>
                        <h2 class="fw-bold mb-2">Create Your Account</h2>
                        <p class="text-muted">Join the NAIN Testing Lab team</p>
                    </div>
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="John Doe">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="your@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <small class="text-muted">Minimum 8 characters</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required placeholder="••••••••">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Create Account</button>
                    </form>
                    <hr class="my-4">
                    <div class="text-center">
                        <span class="text-muted">Already have an account?</span>
                        <a href="{{ route('login') }}" class="text-decoration-none ms-1" style="color: var(--primary-color); font-weight: 600;">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

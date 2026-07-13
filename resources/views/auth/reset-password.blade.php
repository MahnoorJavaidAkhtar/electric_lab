@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <span style="font-size: 3rem;">🔑</span>
                        </div>
                        <h2 class="fw-bold mb-2">Choose a New Password</h2>
                        <p class="text-muted">Create a strong password for your account</p>
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email }}" required placeholder="your@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <small class="text-muted">Minimum 8 characters</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required placeholder="••••••••">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <span style="margin-right: 0.5rem;">🔒</span> Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

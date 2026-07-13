@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h2 class="fw-bold mb-2">👤 Your Profile</h2>
                            <p class="text-muted mb-0">Manage your account details and security preferences</p>
                        </div>
                        <span class="badge bg-primary-subtle text-primary" style="font-size: 0.875rem; padding: 0.5rem 1rem;">{{ $user->role?->name ?? 'Team Member' }}</span>
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
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required placeholder="e.g. Ahmed Khan">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required placeholder="your@email.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}" placeholder="e.g. +92 300 1234567">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="employee_title" class="form-label">Job Title</label>
                                <input id="employee_title" name="employee_title" type="text" class="form-control @error('employee_title') is-invalid @enderror" value="{{ old('employee_title', $user->employee_title) }}" placeholder="e.g. Test Engineer">
                                @error('employee_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="Your full address...">{{ old('address', $user->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <hr class="my-2">
                                <h5 class="fw-bold mt-3 mb-3" style="color: var(--text-dark);">
                                    <span style="margin-right: 0.5rem;">🔒</span> Change Password
                                </h5>
                                <p class="text-muted small mb-3">Leave blank to keep your current password</p>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">New Password</label>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <small class="text-muted">Minimum 8 characters</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="••••••••">
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <span style="margin-right: 0.5rem;">💾</span> Save Profile
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

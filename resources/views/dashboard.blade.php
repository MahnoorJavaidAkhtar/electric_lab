@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); color: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h2 class="fw-bold mb-2" style="color: white;">Operations Dashboard</h2>
                            <p class="mb-0" style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem;">
                                Welcome back, <strong>{{ $user->name }}</strong> 👋
                            </p>
                        </div>
                        <a href="{{ route('profile') }}" class="btn btn-outline-light mt-3 mt-md-0">
                            <span style="margin-right: 0.5rem;">👤</span> View Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #EDE9FE, #DDD6FE); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                            👥
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted mb-0 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px; font-weight: 600;">Active Users</h6>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: var(--primary-color);">24</h2>
                    <p class="text-muted mb-0">Across engineering, testing, and QA teams</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #D1FAE5, #A7F3D0); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                            🔬
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted mb-0 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px; font-weight: 600;">Pending Tests</h6>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #10B981;">18</h2>
                    <p class="text-muted mb-0">Ready for engineer assignment</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #FEF3C7, #FDE68A); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                            📜
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted mb-0 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px; font-weight: 600;">Certificates</h6>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #F59E0B;">9</h2>
                    <p class="text-muted mb-0">Awaiting approval and release</p>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-4" style="color: var(--text-dark);">
                        <span style="margin-right: 0.5rem;">⚡</span> Quick Actions
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('products.index') }}" class="text-decoration-none">
                                <div class="p-4 text-center" style="background: linear-gradient(135deg, #EDE9FE, #DDD6FE); border-radius: 12px; transition: all 0.3s ease; cursor: pointer;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📦</div>
                                    <h6 class="fw-bold mb-0" style="color: var(--primary-color);">Manage Products</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('test-requests.index') }}" class="text-decoration-none">
                                <div class="p-4 text-center" style="background: linear-gradient(135deg, #D1FAE5, #A7F3D0); border-radius: 12px; transition: all 0.3s ease; cursor: pointer;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📋</div>
                                    <h6 class="fw-bold mb-0" style="color: #059669;">Test Requests</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('products.create') }}" class="text-decoration-none">
                                <div class="p-4 text-center" style="background: linear-gradient(135deg, #DBEAFE, #BFDBFE); border-radius: 12px; transition: all 0.3s ease; cursor: pointer;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">➕</div>
                                    <h6 class="fw-bold mb-0" style="color: #1E40AF;">Add Product</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="{{ route('test-requests.create') }}" class="text-decoration-none">
                                <div class="p-4 text-center" style="background: linear-gradient(135deg, #FEE2E2, #FECACA); border-radius: 12px; transition: all 0.3s ease; cursor: pointer;">
                                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🔬</div>
                                    <h6 class="fw-bold mb-0" style="color: #DC2626;">New Test Request</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover .p-4 {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
</style>
@endsection

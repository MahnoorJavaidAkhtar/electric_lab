@extends('layout')

@section('content')
<div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">📦 Products</h2>
            <p class="text-muted mb-0">Track and manage electrical products and their specifications</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <span style="margin-right: 0.5rem;">➕</span> Add Product
        </a>
    </div>

    @if (session('status'))
        <div class="alert alert-success mb-4">
            <strong>✓</strong> {{ session('status') }}
        </div>
    @endif

    <div class="card border-0 mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('products.index') }}" class="row g-3">
                <div class="col-md-9">
                    <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="🔍 Search by product code, name, or model number...">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Manufacturer</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="fw-semibold" style="color: var(--primary-color);">{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category->name ?? '—' }}</td>
                                <td>{{ $product->manufacturer->company_name ?? $product->manufacturer->name ?? '—' }}</td>
                                <td>
                                    <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $product->is_active ? '✓ Active' : '✕ Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div style="font-size: 3rem; margin-bottom: 1rem;">📦</div>
                                    <p class="text-muted mb-0">No products found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($products->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection

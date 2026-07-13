@extends('layout')

@section('content')
<div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">🔬 Test Requests</h2>
            <p class="text-muted mb-0">Track laboratory test requests and their status</p>
        </div>
        <a href="{{ route('test-requests.create') }}" class="btn btn-primary">
            <span style="margin-right: 0.5rem;">➕</span> Create Request
        </a>
    </div>

    @if (session('status'))
        <div class="alert alert-success mb-4">
            <strong>✓</strong> {{ session('status') }}
        </div>
    @endif

    <div class="card border-0 mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('test-requests.index') }}" class="row g-3">
                <div class="col-md-9">
                    <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="🔍 Search by request number, product, or client...">
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
                            <th>Request #</th>
                            <th>Product</th>
                            <th>Client</th>
                            <th>Laboratory</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                            <tr>
                                <td class="fw-semibold" style="color: var(--primary-color);">{{ $request->request_number }}</td>
                                <td>{{ $request->product->product_name ?? '—' }}</td>
                                <td>{{ $request->client->company_name ?? '—' }}</td>
                                <td>{{ $request->laboratory->name ?? '—' }}</td>
                                <td>
                                    <span class="badge bg-info-subtle text-info">
                                        {{ ucwords(str_replace('_', ' ', $request->status)) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔬</div>
                                    <p class="text-muted mb-0">No test requests found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($requests->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $requests->links() }}
        </div>
    @endif
</div>
@endsection

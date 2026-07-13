@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="mb-4">
                        <h2 class="fw-bold mb-2">🔬 Create Test Request</h2>
                        <p class="text-muted mb-0">Submit a new testing request with product details, client information, and test objectives</p>
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

                    <form method="POST" action="{{ route('test-requests.store') }}">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="client_id" class="form-label">Client</label>
                                <select id="client_id" name="client_id" class="form-select @error('client_id') is-invalid @enderror" required>
                                    <option value="">Select client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->company_name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="product_id" class="form-label">Product</label>
                                <select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                                    <option value="">Select product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->product_name }} ({{ $product->product_code }})</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="laboratory_id" class="form-label">Laboratory</label>
                                <select id="laboratory_id" name="laboratory_id" class="form-select @error('laboratory_id') is-invalid @enderror" required>
                                    <option value="">Select laboratory</option>
                                    @foreach ($laboratories as $laboratory)
                                        <option value="{{ $laboratory->id }}" {{ old('laboratory_id') == $laboratory->id ? 'selected' : '' }}>{{ $laboratory->name }}</option>
                                    @endforeach
                                </select>
                                @error('laboratory_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="priority" class="form-label">Priority Level</label>
                                <select id="priority" name="priority" class="form-select @error('priority') is-invalid @enderror" required>
                                    <option value="normal" selected>Normal</option>
                                    <option value="low">Low</option>
                                    <option value="high">High</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="request_date" class="form-label">Request Date</label>
                                <input id="request_date" name="request_date" type="date" class="form-control @error('request_date') is-invalid @enderror" value="{{ old('request_date', now()->toDateString()) }}" required>
                                @error('request_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="required_completion_date" class="form-label">Required Completion Date</label>
                                <input id="required_completion_date" name="required_completion_date" type="date" class="form-control @error('required_completion_date') is-invalid @enderror" value="{{ old('required_completion_date') }}">
                                @error('required_completion_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <small class="text-muted">Optional target completion date</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="number_of_samples" class="form-label">Number of Samples</label>
                                <input id="number_of_samples" name="number_of_samples" type="number" class="form-control @error('number_of_samples') is-invalid @enderror" min="1" value="{{ old('number_of_samples', 1) }}" placeholder="e.g. 3">
                                @error('number_of_samples')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="witness_testing_required" class="form-label">Witness Testing Required</label>
                                <select id="witness_testing_required" name="witness_testing_required" class="form-select @error('witness_testing_required') is-invalid @enderror">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('witness_testing_required')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="test_objectives" class="form-label">Testing Objectives</label>
                                <textarea id="test_objectives" name="test_objectives" class="form-control @error('test_objectives') is-invalid @enderror" rows="3" required placeholder="Describe the purpose and goals of this test...">{{ old('test_objectives') }}</textarea>
                                @error('test_objectives')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="special_requirements" class="form-label">Special Requirements & Remarks</label>
                                <textarea id="special_requirements" name="special_requirements" class="form-control @error('special_requirements') is-invalid @enderror" rows="3" placeholder="Any special handling, conditions, or client requirements...">{{ old('special_requirements') }}</textarea>
                                @error('special_requirements')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="internal_notes" class="form-label">Internal Notes</label>
                                <textarea id="internal_notes" name="internal_notes" class="form-control @error('internal_notes') is-invalid @enderror" rows="3" placeholder="Internal notes for lab staff (not visible to client)...">{{ old('internal_notes') }}</textarea>
                                @error('internal_notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="witness_name" class="form-label">Witness Name</label>
                                <input id="witness_name" name="witness_name" type="text" class="form-control @error('witness_name') is-invalid @enderror" value="{{ old('witness_name') }}" placeholder="e.g. John Doe">
                                @error('witness_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="witness_organization" class="form-label">Witness Organization</label>
                                <input id="witness_organization" name="witness_organization" type="text" class="form-control @error('witness_organization') is-invalid @enderror" value="{{ old('witness_organization') }}" placeholder="e.g. Quality Assurance Ltd.">
                                @error('witness_organization')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <span style="margin-right: 0.5rem;">📝</span> Create Request
                            </button>
                            <a href="{{ route('test-requests.index') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

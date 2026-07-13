@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="mb-4">
                        <h2 class="fw-bold mb-2">📦 Register a Product</h2>
                        <p class="text-muted mb-0">Create a product record with its unique code and specifications</p>
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

                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input id="product_name" name="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" required placeholder="e.g. LED Bulb 14W">
                                @error('product_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="product_code" class="form-label">Product Code</label>
                                <input id="product_code" name="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" value="{{ old('product_code') }}" placeholder="1234567890" required>
                                @error('product_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <small class="text-muted">10-digit unique code</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="manufacturer_id" class="form-label">Manufacturer</label>
                                <select id="manufacturer_id" name="manufacturer_id" class="form-select">
                                    <option value="">Select manufacturer</option>
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}" {{ old('manufacturer_id') == $manufacturer->id ? 'selected' : '' }}>{{ $manufacturer->company_name ?? $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="model_number" class="form-label">Model Number</label>
                                <input id="model_number" name="model_number" type="text" class="form-control" value="{{ old('model_number') }}" placeholder="e.g. XYZ-123">
                            </div>
                            <div class="col-md-6">
                                <label for="is_active" class="form-label">Status</label>
                                <select id="is_active" name="is_active" class="form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter product description...">{{ old('description') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="technical_specifications" class="form-label">Technical Specifications</label>
                                <textarea id="technical_specifications" name="technical_specifications" class="form-control" rows="3" placeholder="Enter technical specifications...">{{ old('technical_specifications') }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <span style="margin-right: 0.5rem;">💾</span> Save Product
                            </button>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

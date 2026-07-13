<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $products = Product::query()
            ->with(['category', 'manufacturer'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('product_code', 'like', "%{$search}%")
                        ->orWhere('product_name', 'like', "%{$search}%")
                        ->orWhere('model_number', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('products.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('products.create', [
            'categories' => ProductCategory::where('is_active', true)->get(),
            'manufacturers' => Manufacturer::where('is_active', true)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => ['required', 'string', 'max:200'],
            'product_code' => ['required', 'string', 'max:50', 'unique:products,product_code', 'regex:/^\d{10}$/'],
            'category_id' => ['required', 'exists:product_categories,id'],
            'manufacturer_id' => ['nullable', 'exists:manufacturers,id'],
            'model_number' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'technical_specifications' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        Product::create($data);

        return redirect()->route('products.index')->with('status', 'Product registered successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Laboratory;
use App\Models\Product;
use App\Models\TestRequest;
use Illuminate\Http\Request;

class TestRequestController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $requests = TestRequest::query()
            ->with(['client', 'product', 'laboratory'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('request_number', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhereHas('product', function ($productQuery) use ($search) {
                            $productQuery->where('product_name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('client', function ($clientQuery) use ($search) {
                            $clientQuery->where('company_name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('test-requests.index', compact('requests', 'search'));
    }

    public function create()
    {
        return view('test-requests.create', [
            'clients' => Client::where('is_active', true)->get(),
            'products' => Product::where('is_active', true)->get(),
            'laboratories' => Laboratory::where('is_active', true)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'product_id' => ['required', 'exists:products,id'],
            'laboratory_id' => ['required', 'exists:laboratories,id'],
            'request_date' => ['required', 'date'],
            'required_completion_date' => ['nullable', 'date'],
            'priority' => ['required', 'in:low,normal,high,urgent'],
            'status' => ['nullable', 'in:draft,pending_approval,approved,rejected,in_progress,testing,completed,cancelled'],
            'number_of_samples' => ['nullable', 'integer', 'min:1'],
            'test_objectives' => ['required', 'string'],
            'special_requirements' => ['nullable', 'string'],
            'internal_notes' => ['nullable', 'string'],
            'witness_name' => ['nullable', 'string', 'max:200'],
            'witness_organization' => ['nullable', 'string', 'max:200'],
            'witness_testing_required' => ['nullable', 'boolean'],
        ]);

        $data['request_number'] = $this->generateRequestNumber();
        $data['requested_by_user_id'] = auth()->id();
        $data['status'] = $data['status'] ?? 'pending_approval';
        $data['witness_testing_required'] = $request->boolean('witness_testing_required', false);
        $data['number_of_samples'] = (int) ($data['number_of_samples'] ?? 1);

        TestRequest::create($data);

        return redirect()->route('test-requests.index')->with('status', 'Test request created successfully.');
    }

    private function generateRequestNumber(): string
    {
        do {
            $number = str_pad((string) random_int(100000000000, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (TestRequest::where('request_number', $number)->exists());

        return $number;
    }
}

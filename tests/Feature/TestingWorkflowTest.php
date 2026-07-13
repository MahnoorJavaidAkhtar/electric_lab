<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Laboratory;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\TestRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestingWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_products_and_test_requests_with_search(): void
    {
        $user = User::factory()->create(['is_active' => true]);

        $category = ProductCategory::create([
            'name' => 'Switchgear',
            'code' => 'SWG',
            'description' => 'Switchgear products',
            'is_active' => true,
        ]);

        $manufacturer = Manufacturer::create([
            'company_name' => 'Electro Components Ltd',
            'manufacturer_code' => 'MFG-001',
            'address' => 'Industrial Area',
            'city' => 'Mumbai',
            'country' => 'India',
            'postal_code' => '400001',
            'phone' => '12345',
            'email' => 'sales@electro.example',
            'contact_person' => 'A. Khan',
            'is_active' => true,
        ]);

        $client = Client::create([
            'company_name' => 'PowerTech Industries',
            'client_code' => 'CL-001',
            'client_type' => 'corporate',
            'address' => 'Main Road',
            'city' => 'Delhi',
            'country' => 'India',
            'postal_code' => '110001',
            'phone' => '99999',
            'email' => 'contact@powertech.example',
            'contact_person' => 'R. Singh',
            'contact_phone' => '99999',
            'contact_email' => 'contact@powertech.example',
            'is_active' => true,
        ]);

        $laboratory = Laboratory::create([
            'name' => 'High Voltage Lab',
            'code' => 'HVL',
            'address' => 'Block A',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'country' => 'India',
            'postal_code' => '560001',
            'phone' => '11111',
            'email' => 'lab@example.com',
            'is_active' => true,
        ]);

        $createProductResponse = $this->actingAs($user)->post('/products', [
            'product_name' => 'Circuit Breaker',
            'product_code' => '1234567890',
            'category_id' => $category->id,
            'manufacturer_id' => $manufacturer->id,
            'description' => 'High capacity breaker',
        ]);

        $createProductResponse->assertRedirect('/products');
        $this->assertDatabaseHas('products', ['product_code' => '1234567890']);

        $product = Product::where('product_code', '1234567890')->first();

        $createRequestResponse = $this->actingAs($user)->post('/test-requests', [
            'client_id' => $client->id,
            'product_id' => $product->id,
            'laboratory_id' => $laboratory->id,
            'request_date' => now()->toDateString(),
            'required_completion_date' => now()->addDays(7)->toDateString(),
            'priority' => 'high',
            'number_of_samples' => 2,
            'test_objectives' => 'Verify insulation and temperature rise',
            'special_requirements' => 'Use calibrated equipment',
        ]);

        $createRequestResponse->assertRedirect('/test-requests');
        $this->assertDatabaseHas('test_requests', ['product_id' => $product->id]);

        $testRequest = TestRequest::latest()->first();
        $this->assertNotEmpty($testRequest->request_number);
        $this->assertSame(12, strlen($testRequest->request_number));

        $searchResponse = $this->actingAs($user)->get('/test-requests?search=' . $testRequest->request_number);
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee($testRequest->request_number);
    }
}

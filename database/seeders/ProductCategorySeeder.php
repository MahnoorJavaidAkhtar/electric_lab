<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Home Appliances',
                'code' => 'CAT-001',
                'parent_id' => null,
                'description' => 'Household electrical appliances and devices',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Refrigerators',
                'code' => 'CAT-001-001',
                'parent_id' => 1,
                'description' => 'Refrigerators and freezers',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Washing Machines',
                'code' => 'CAT-001-002',
                'parent_id' => 1,
                'description' => 'Automatic and semi-automatic washing machines',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Air Conditioners',
                'code' => 'CAT-001-003',
                'parent_id' => 1,
                'description' => 'Split and window air conditioning units',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Power Distribution',
                'code' => 'CAT-002',
                'parent_id' => null,
                'description' => 'Electrical power distribution equipment',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Circuit Breakers',
                'code' => 'CAT-002-001',
                'parent_id' => 5,
                'description' => 'MCBs, MCCBs, and other circuit protection devices',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Switchgear',
                'code' => 'CAT-002-002',
                'parent_id' => 5,
                'description' => 'High and low voltage switchgear equipment',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Lighting',
                'code' => 'CAT-003',
                'parent_id' => null,
                'description' => 'Lighting fixtures and systems',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'LED Lights',
                'code' => 'CAT-003-001',
                'parent_id' => 8,
                'description' => 'LED bulbs, tubes, and fixtures',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Industrial Equipment',
                'code' => 'CAT-004',
                'parent_id' => null,
                'description' => 'Industrial electrical equipment',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Motors',
                'code' => 'CAT-004-001',
                'parent_id' => 10,
                'description' => 'Electric motors and drives',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Transformers',
                'code' => 'CAT-004-002',
                'parent_id' => 10,
                'description' => 'Power and distribution transformers',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}


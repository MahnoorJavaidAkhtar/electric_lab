<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Refrigerators
            [
                'product_code' => '1000000001',
                'product_name' => 'Haier HRF-336 EBS Refrigerator',
                'category_id' => 2, // Refrigerators
                'manufacturer_id' => 5, // Haier
                'model_number' => 'HRF-336EBS',
                'description' => 'Double door refrigerator with inverter technology',
                'technical_specifications' => 'Capacity: 336L, Energy Rating: A+, Voltage: 220V',
                'voltage_rating' => '220V AC',
                'power_rating' => '150W',
                'frequency_rating' => '50Hz',
                'is_active' => true,
            ],
            [
                'product_code' => '1000000002',
                'product_name' => 'Dawlance DW-9178 Refrigerator',
                'category_id' => 2,
                'manufacturer_id' => 6, // Dawlance
                'model_number' => 'DW-9178',
                'description' => 'Energy efficient single door refrigerator',
                'technical_specifications' => 'Capacity: 178L, Energy Rating: A, Voltage: 220V',
                'voltage_rating' => '220V AC',
                'power_rating' => '120W',
                'frequency_rating' => '50Hz',
                'is_active' => true,
            ],

            // Washing Machines
            [
                'product_code' => '2000000001',
                'product_name' => 'Haier HWM-90-1789 Washing Machine',
                'category_id' => 3, // Washing Machines
                'manufacturer_id' => 5,
                'model_number' => 'HWM-90-1789',
                'description' => 'Fully automatic front load washing machine',
                'technical_specifications' => 'Capacity: 9KG, Spin Speed: 1400 RPM, Energy: A++',
                'voltage_rating' => '220V AC',
                'power_rating' => '2200W',
                'frequency_rating' => '50Hz',
                'is_active' => true,
            ],

            // Air Conditioners
            [
                'product_code' => '3000000001',
                'product_name' => 'Orient 1.5 Ton Split AC',
                'category_id' => 4, // Air Conditioners
                'manufacturer_id' => 7, // Orient
                'model_number' => 'OS-18MG12SS',
                'description' => 'Inverter split air conditioner with smart cooling',
                'technical_specifications' => 'Cooling: 18000 BTU, Energy Rating: A+, R410A Gas',
                'voltage_rating' => '220V AC',
                'power_rating' => '1800W',
                'frequency_rating' => '50Hz',
                'is_active' => true,
            ],

            // Circuit Breakers
            [
                'product_code' => '4000000001',
                'product_name' => 'Siemens 5SL MCB 32A',
                'category_id' => 6, // Circuit Breakers
                'manufacturer_id' => 1, // Siemens
                'model_number' => '5SL6132-7',
                'description' => 'Miniature Circuit Breaker, C-curve, single pole',
                'technical_specifications' => 'Breaking Capacity: 6kA, Rated Current: 32A, Poles: 1P',
                'voltage_rating' => '230V AC',
                'current_rating' => '32A',
                'frequency_rating' => '50-60Hz',
                'protection_class' => 'Class II',
                'applicable_standards' => 'IEC 60898-1',
                'is_active' => true,
            ],
            [
                'product_code' => '4000000002',
                'product_name' => 'ABB S200 MCB 63A',
                'category_id' => 6,
                'manufacturer_id' => 2, // ABB
                'model_number' => 'S203-C63',
                'description' => 'Miniature Circuit Breaker, 3-pole, C-characteristic',
                'technical_specifications' => 'Breaking Capacity: 6kA, Rated Current: 63A, Poles: 3P',
                'voltage_rating' => '400V AC',
                'current_rating' => '63A',
                'frequency_rating' => '50-60Hz',
                'protection_class' => 'Class II',
                'applicable_standards' => 'IEC 60898-1, CE',
                'is_active' => true,
            ],
            [
                'product_code' => '4000000003',
                'product_name' => 'Schneider Electric Easy9 MCCB',
                'category_id' => 6,
                'manufacturer_id' => 3, // Schneider
                'model_number' => 'EZC100F3100',
                'description' => 'Molded Case Circuit Breaker, thermal-magnetic',
                'technical_specifications' => 'Breaking Capacity: 25kA, Rated Current: 100A, Poles: 3P',
                'voltage_rating' => '415V AC',
                'current_rating' => '100A',
                'frequency_rating' => '50-60Hz',
                'protection_class' => 'Class II',
                'applicable_standards' => 'IEC 60947-2',
                'is_active' => true,
            ],

            // Switchgear
            [
                'product_code' => '5000000001',
                'product_name' => 'ABB MNS Low Voltage Switchboard',
                'category_id' => 7, // Switchgear
                'manufacturer_id' => 2,
                'model_number' => 'MNS-iS',
                'description' => 'Intelligent low voltage switchgear system',
                'technical_specifications' => 'Rated Voltage: 690V, Current: 6300A, IP Rating: IP54',
                'voltage_rating' => '690V AC',
                'current_rating' => '6300A',
                'ip_rating' => 'IP54',
                'applicable_standards' => 'IEC 61439-1, IEC 61439-2',
                'is_active' => true,
            ],

            // LED Lights
            [
                'product_code' => '6000000001',
                'product_name' => 'Philips Essential LED Bulb 14W',
                'category_id' => 9, // LED Lights
                'manufacturer_id' => 4, // Philips
                'model_number' => 'ESS-LED-14W-CDL',
                'description' => 'Energy efficient LED bulb, cool daylight',
                'technical_specifications' => 'Wattage: 14W, Lumens: 1400lm, Base: E27, Lifetime: 15000hrs',
                'voltage_rating' => '220-240V AC',
                'power_rating' => '14W',
                'frequency_rating' => '50-60Hz',
                'applicable_standards' => 'IEC 62560, Energy Star',
                'is_active' => true,
            ],
            [
                'product_code' => '6000000002',
                'product_name' => 'Philips T8 LED Tube 18W',
                'category_id' => 9,
                'manufacturer_id' => 4,
                'model_number' => 'MASTER-LEDtube-18W',
                'description' => 'LED tube light for commercial applications',
                'technical_specifications' => 'Wattage: 18W, Lumens: 1800lm, Length: 1200mm, Lifetime: 30000hrs',
                'voltage_rating' => '220-240V AC',
                'power_rating' => '18W',
                'frequency_rating' => '50-60Hz',
                'applicable_standards' => 'IEC 62776',
                'is_active' => true,
            ],

            // Motors
            [
                'product_code' => '7000000001',
                'product_name' => 'Siemens 1LA7 Induction Motor 5HP',
                'category_id' => 11, // Motors
                'manufacturer_id' => 1,
                'model_number' => '1LA7113-4AA60',
                'description' => 'Three-phase squirrel cage induction motor',
                'technical_specifications' => 'Power: 5HP (3.7kW), Speed: 1440 RPM, Frame: 112M',
                'voltage_rating' => '415V AC',
                'power_rating' => '3700W',
                'current_rating' => '7.5A',
                'frequency_rating' => '50Hz',
                'protection_class' => 'IP55',
                'applicable_standards' => 'IEC 60034-1',
                'is_active' => true,
            ],

            // Transformers
            [
                'product_code' => '8000000001',
                'product_name' => 'ABB Distribution Transformer 100kVA',
                'category_id' => 12, // Transformers
                'manufacturer_id' => 2,
                'model_number' => 'DT-100-11/0.4',
                'description' => 'Oil-filled distribution transformer',
                'technical_specifications' => 'Rating: 100kVA, Primary: 11kV, Secondary: 400V, Vector: Dyn11',
                'voltage_rating' => '11kV / 400V',
                'power_rating' => '100000VA',
                'frequency_rating' => '50Hz',
                'applicable_standards' => 'IEC 60076',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}


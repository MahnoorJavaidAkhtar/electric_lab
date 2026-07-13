<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    public function run(): void
    {
        $laboratories = [
            [
                'name' => 'NAIN Main Testing Laboratory',
                'code' => 'LAB-001',
                'address' => '123 Industrial Park, Building A',
                'city' => 'Karachi',
                'state' => 'Sindh',
                'country' => 'Pakistan',
                'postal_code' => '75500',
                'phone' => '+92-21-1234567',
                'email' => 'main.lab@nain.com',
                'website' => 'https://nain.com',
                'accreditation_number' => 'ISO-17025-2023-001',
                'accreditation_body' => 'Pakistan National Accreditation Council (PNAC)',
                'accreditation_valid_until' => now()->addYears(3)->toDateString(),
                'iso_certification' => 'ISO/IEC 17025:2017',
                'capacity_per_day' => 50,
                'scope_of_accreditation' => 'Electrical safety testing, EMC testing, Performance testing for electrical equipment',
                'is_active' => true,
            ],
            [
                'name' => 'NAIN High Voltage Laboratory',
                'code' => 'LAB-002',
                'address' => '456 Tech Valley, Zone B',
                'city' => 'Lahore',
                'state' => 'Punjab',
                'country' => 'Pakistan',
                'postal_code' => '54000',
                'phone' => '+92-42-9876543',
                'email' => 'hv.lab@nain.com',
                'website' => 'https://nain.com',
                'accreditation_number' => 'ISO-17025-2023-002',
                'accreditation_body' => 'Pakistan National Accreditation Council (PNAC)',
                'accreditation_valid_until' => now()->addYears(2)->toDateString(),
                'iso_certification' => 'ISO/IEC 17025:2017',
                'capacity_per_day' => 30,
                'scope_of_accreditation' => 'High voltage testing, Dielectric testing, Impulse testing',
                'is_active' => true,
            ],
            [
                'name' => 'NAIN EMC Testing Facility',
                'code' => 'LAB-003',
                'address' => '789 Research Avenue, Floor 3',
                'city' => 'Islamabad',
                'state' => 'Federal Capital',
                'country' => 'Pakistan',
                'postal_code' => '44000',
                'phone' => '+92-51-5554321',
                'email' => 'emc.lab@nain.com',
                'website' => 'https://nain.com',
                'accreditation_number' => 'ISO-17025-2023-003',
                'accreditation_body' => 'Pakistan National Accreditation Council (PNAC)',
                'accreditation_valid_until' => now()->addYears(3)->toDateString(),
                'iso_certification' => 'ISO/IEC 17025:2017',
                'capacity_per_day' => 25,
                'scope_of_accreditation' => 'EMC testing, RF testing, Immunity testing, Emissions testing',
                'is_active' => true,
            ],
            [
                'name' => 'NAIN Environmental Testing Lab',
                'code' => 'LAB-004',
                'address' => '321 Science Park Road',
                'city' => 'Faisalabad',
                'state' => 'Punjab',
                'country' => 'Pakistan',
                'postal_code' => '38000',
                'phone' => '+92-41-7778888',
                'email' => 'env.lab@nain.com',
                'website' => 'https://nain.com',
                'accreditation_number' => 'ISO-17025-2023-004',
                'accreditation_body' => 'Pakistan National Accreditation Council (PNAC)',
                'accreditation_valid_until' => now()->addYears(2)->toDateString(),
                'iso_certification' => 'ISO/IEC 17025:2017',
                'capacity_per_day' => 20,
                'scope_of_accreditation' => 'Temperature testing, Humidity testing, Vibration testing, IP rating tests',
                'is_active' => true,
            ],
            [
                'name' => 'NAIN Calibration Laboratory',
                'code' => 'LAB-005',
                'address' => '555 Metrology Center',
                'city' => 'Rawalpindi',
                'state' => 'Punjab',
                'country' => 'Pakistan',
                'postal_code' => '46000',
                'phone' => '+92-51-3334444',
                'email' => 'calibration@nain.com',
                'website' => 'https://nain.com',
                'accreditation_number' => 'ISO-17025-2023-005',
                'accreditation_body' => 'Pakistan National Accreditation Council (PNAC)',
                'accreditation_valid_until' => now()->addYears(4)->toDateString(),
                'iso_certification' => 'ISO/IEC 17025:2017',
                'capacity_per_day' => 40,
                'scope_of_accreditation' => 'Electrical calibration, Instrument calibration, Multimeter calibration',
                'is_active' => true,
            ],
        ];

        foreach ($laboratories as $lab) {
            Laboratory::create($lab);
        }
    }
}

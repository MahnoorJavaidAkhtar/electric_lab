<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'phone',
        'email',
        'website',
        'accreditation_number',
        'accreditation_body',
        'accreditation_valid_until',
        'iso_certification',
        'capacity_per_day',
        'scope_of_accreditation',
        'is_active',
    ];

    protected $casts = [
        'accreditation_valid_until' => 'date',
        'capacity_per_day' => 'integer',
        'is_active' => 'boolean',
    ];
}

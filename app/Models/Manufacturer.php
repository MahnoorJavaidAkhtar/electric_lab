<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'brand_name',
        'manufacturer_code',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'phone',
        'email',
        'website',
        'contact_person',
        'contact_phone',
        'contact_email',
        'tax_id',
        'certifications',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getNameAttribute(): string
    {
        return $this->attributes['company_name'] ?? $this->attributes['name'] ?? 'Manufacturer';
    }

    public function setNameAttribute($value): void
    {
        $this->attributes['company_name'] = $value;
    }
}

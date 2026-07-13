<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_code',
        'product_name',
        'category_id',
        'manufacturer_id',
        'model_number',
        'description',
        'technical_specifications',
        'voltage_rating',
        'current_rating',
        'power_rating',
        'frequency_rating',
        'protection_class',
        'ip_rating',
        'applicable_standards',
        'intended_use',
        'typical_test_cost',
        'typical_test_duration_hours',
        'special_handling_instructions',
        'safety_warnings',
        'requires_special_equipment',
        'is_active',
    ];

    protected $casts = [
        'typical_test_cost' => 'decimal:2',
        'typical_test_duration_hours' => 'integer',
        'requires_special_equipment' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function testRequests(): HasMany
    {
        return $this->hasMany(TestRequest::class);
    }

    public function samples(): HasMany
    {
        return $this->hasMany(Sample::class);
    }

    public function testProcedures(): HasMany
    {
        return $this->hasMany(TestProcedure::class);
    }
}

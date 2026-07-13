<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestParameter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'test_procedure_id',
        'parameter_name',
        'parameter_code',
        'parameter_description',
        'measurement_unit',
        'data_type',
        'min_value',
        'max_value',
        'target_value',
        'tolerance_plus',
        'tolerance_minus',
        'acceptance_criteria',
        'decimal_places',
        'is_required',
        'is_critical',
        'sort_order',
        'measurement_instructions',
    ];

    protected $casts = [
        'min_value' => 'decimal:4',
        'max_value' => 'decimal:4',
        'target_value' => 'decimal:4',
        'tolerance_plus' => 'decimal:4',
        'tolerance_minus' => 'decimal:4',
        'decimal_places' => 'integer',
        'is_required' => 'boolean',
        'is_critical' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function testProcedure(): BelongsTo
    {
        return $this->belongsTo(TestProcedure::class);
    }

    public function testResults(): HasMany
    {
        return $this->hasMany(TestResult::class);
    }
}

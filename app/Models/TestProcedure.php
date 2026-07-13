<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestProcedure extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'procedure_code',
        'procedure_name',
        'test_standard_id',
        'product_category_id',
        'test_type',
        'test_description',
        'test_objectives',
        'applicable_standards',
        'test_methodology',
        'test_setup_instructions',
        'safety_precautions',
        'environmental_conditions',
        'estimated_duration_hours',
        'required_equipment',
        'sample_preparation_requirements',
        'acceptance_criteria',
        'pass_fail_criteria',
        'revision_number',
        'effective_date',
        'approved_by_user_id',
        'approved_at',
        'revision_history',
        'is_active',
    ];

    protected $casts = [
        'estimated_duration_hours' => 'integer',
        'revision_number' => 'integer',
        'effective_date' => 'date',
        'approved_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function testStandard(): BelongsTo
    {
        return $this->belongsTo(TestStandard::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_user_id');
    }

    public function testExecutions(): HasMany
    {
        return $this->hasMany(TestExecution::class);
    }

    public function testParameters(): HasMany
    {
        return $this->hasMany(TestParameter::class);
    }
}

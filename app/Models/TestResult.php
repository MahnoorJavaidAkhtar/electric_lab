<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestResult extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'test_execution_id',
        'test_parameter_id',
        'parameter_name',
        'measurement_unit',
        'measured_value',
        'measured_value_text',
        'specification_min',
        'specification_max',
        'specification_target',
        'result_status',
        'deviation_from_target',
        'deviation_percentage',
        'measurement_uncertainty',
        'acceptance_criteria',
        'within_specification',
        'comments',
        'measurement_equipment_code',
        'measured_at',
        'measured_by_user_id',
        'measurement_sequence',
        'is_repeated_measurement',
        'file_attachment',
    ];

    protected $casts = [
        'measured_value' => 'decimal:4',
        'specification_min' => 'decimal:4',
        'specification_max' => 'decimal:4',
        'specification_target' => 'decimal:4',
        'deviation_from_target' => 'decimal:4',
        'deviation_percentage' => 'decimal:4',
        'measurement_uncertainty' => 'decimal:4',
        'within_specification' => 'boolean',
        'measured_at' => 'datetime',
        'measurement_sequence' => 'integer',
        'is_repeated_measurement' => 'boolean',
    ];

    public function testExecution(): BelongsTo
    {
        return $this->belongsTo(TestExecution::class);
    }

    public function testParameter(): BelongsTo
    {
        return $this->belongsTo(TestParameter::class);
    }

    public function measuredBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'measured_by_user_id');
    }
}

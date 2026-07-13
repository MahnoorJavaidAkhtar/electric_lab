<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TestExecution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'execution_number',
        'test_request_id',
        'sample_id',
        'test_procedure_id',
        'laboratory_id',
        'performed_by_user_id',
        'supervised_by_user_id',
        'witnessed_by_user_id',
        'test_start_datetime',
        'test_end_datetime',
        'actual_duration_minutes',
        'status',
        'ambient_temperature',
        'ambient_humidity',
        'atmospheric_pressure',
        'environmental_conditions',
        'test_setup_description',
        'equipment_used',
        'deviations_from_procedure',
        'observations',
        'anomalies_encountered',
        'overall_result',
        'failure_analysis',
        'recommendations',
        'retest_required',
        'retest_reason',
        'aborted_reason',
        'aborted_at',
    ];

    protected $casts = [
        'test_start_datetime' => 'datetime',
        'test_end_datetime' => 'datetime',
        'actual_duration_minutes' => 'integer',
        'ambient_temperature' => 'decimal:2',
        'ambient_humidity' => 'decimal:2',
        'atmospheric_pressure' => 'decimal:2',
        'retest_required' => 'boolean',
        'aborted_at' => 'datetime',
    ];

    public function testRequest(): BelongsTo
    {
        return $this->belongsTo(TestRequest::class);
    }

    public function sample(): BelongsTo
    {
        return $this->belongsTo(Sample::class);
    }

    public function testProcedure(): BelongsTo
    {
        return $this->belongsTo(TestProcedure::class);
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function performedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'performed_by_user_id');
    }

    public function supervisedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervised_by_user_id');
    }

    public function witnessedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'witnessed_by_user_id');
    }

    public function testResults(): HasMany
    {
        return $this->hasMany(TestResult::class);
    }

    public function equipment(): BelongsToMany
    {
        return $this->belongsToMany(TestingEquipment::class, 'test_execution_equipment');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestingEquipment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'equipment_code',
        'equipment_name',
        'equipment_type',
        'manufacturer_id',
        'model_number',
        'serial_number',
        'laboratory_id',
        'department_id',
        'purchase_date',
        'purchase_cost',
        'supplier',
        'warranty_expiry_date',
        'technical_specifications',
        'measurement_range',
        'accuracy_class',
        'calibration_frequency_days',
        'last_calibration_date',
        'next_calibration_due',
        'calibration_status',
        'calibration_certificate_number',
        'equipment_status',
        'location',
        'responsible_user_id',
        'usage_instructions',
        'maintenance_notes',
        'is_active',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'purchase_cost' => 'decimal:2',
        'warranty_expiry_date' => 'date',
        'calibration_frequency_days' => 'integer',
        'last_calibration_date' => 'date',
        'next_calibration_due' => 'date',
        'is_active' => 'boolean',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function responsibleUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_user_id');
    }

    public function calibrations(): HasMany
    {
        return $this->hasMany(EquipmentCalibration::class);
    }

    public function maintenanceRecords(): HasMany
    {
        return $this->hasMany(EquipmentMaintenance::class);
    }

    public function testExecutions(): HasMany
    {
        return $this->hasMany(TestExecution::class);
    }
}

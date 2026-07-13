<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'request_number',
        'client_id',
        'product_id',
        'laboratory_id',
        'requested_by_user_id',
        'assigned_to_user_id',
        'approved_by_user_id',
        'request_date',
        'required_completion_date',
        'actual_completion_date',
        'priority',
        'status',
        'number_of_samples',
        'test_objectives',
        'special_requirements',
        'safety_considerations',
        'witness_testing_required',
        'witness_name',
        'witness_organization',
        'rejection_reason',
        'approved_at',
        'rejected_at',
        'internal_notes',
        'client_notes',
    ];

    protected $casts = [
        'request_date' => 'date',
        'required_completion_date' => 'date',
        'actual_completion_date' => 'date',
        'number_of_samples' => 'integer',
        'witness_testing_required' => 'boolean',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by_user_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_user_id');
    }

    public function samples(): HasMany
    {
        return $this->hasMany(Sample::class);
    }

    public function testExecutions(): HasMany
    {
        return $this->hasMany(TestExecution::class);
    }

    public function quotation(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }
}

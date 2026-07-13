<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sample extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sample_code',
        'test_request_id',
        'product_id',
        'batch_number',
        'serial_number',
        'manufacturing_date',
        'sample_quantity',
        'sample_unit',
        'sample_description',
        'visual_condition',
        'packaging_condition',
        'received_date',
        'received_by_user_id',
        'sample_status',
        'storage_location',
        'storage_conditions',
        'requires_special_storage',
        'special_storage_requirements',
        'disposal_date',
        'disposal_method',
        'return_to_client',
        'returned_date',
        'returned_to',
        'sample_preparation_notes',
        'sample_handling_notes',
    ];

    protected $casts = [
        'manufacturing_date' => 'date',
        'sample_quantity' => 'integer',
        'received_date' => 'date',
        'requires_special_storage' => 'boolean',
        'disposal_date' => 'date',
        'return_to_client' => 'boolean',
        'returned_date' => 'date',
    ];

    public function testRequest(): BelongsTo
    {
        return $this->belongsTo(TestRequest::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by_user_id');
    }

    public function testExecutions(): HasMany
    {
        return $this->hasMany(TestExecution::class);
    }
}

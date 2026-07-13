<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestStandard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'standard_code',
        'standard_name',
        'issuing_organization',
        'version',
        'publication_date',
        'revision_date',
        'description',
        'scope',
        'geographic_region',
        'status',
        'superseded_by',
        'applicable_products',
        'testing_requirements',
        'is_mandatory',
        'is_active',
    ];

    protected $casts = [
        'publication_date' => 'date',
        'revision_date' => 'date',
        'is_mandatory' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function testProcedures(): HasMany
    {
        return $this->hasMany(TestProcedure::class);
    }
}

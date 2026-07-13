<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_standards', function (Blueprint $table) {
            $table->id();
            $table->string('standard_code', 50)->unique();
            $table->string('standard_name', 200);
            $table->string('issuing_organization', 100);
            $table->string('version', 20)->nullable();
            $table->date('publication_date')->nullable();
            $table->date('revision_date')->nullable();
            $table->text('description')->nullable();
            $table->text('scope')->nullable();
            $table->string('geographic_region', 50)->nullable();
            $table->enum('status', ['active', 'superseded', 'withdrawn', 'draft'])->default('active');
            $table->string('superseded_by', 50)->nullable();
            $table->text('applicable_products')->nullable();
            $table->text('testing_requirements')->nullable();
            $table->boolean('is_mandatory')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('standard_code');
            $table->index(['issuing_organization', 'status']);
            $table->index(['is_active', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_standards');
    }
};

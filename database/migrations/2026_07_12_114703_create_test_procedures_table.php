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
        Schema::create('test_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('procedure_code', 50)->unique();
            $table->string('procedure_name', 200);
            $table->foreignId('test_standard_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->onDelete('set null');
            $table->string('test_type', 100);
            $table->text('test_description');
            $table->text('test_objectives')->nullable();
            $table->text('applicable_standards')->nullable();
            $table->text('test_methodology')->nullable();
            $table->text('test_setup_instructions')->nullable();
            $table->text('safety_precautions')->nullable();
            $table->text('environmental_conditions')->nullable();
            $table->integer('estimated_duration_hours')->nullable();
            $table->text('required_equipment')->nullable();
            $table->text('sample_preparation_requirements')->nullable();
            $table->text('acceptance_criteria')->nullable();
            $table->text('pass_fail_criteria')->nullable();
            $table->integer('revision_number')->default(1);
            $table->date('effective_date')->nullable();
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->text('revision_history')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('procedure_code');
            $table->index(['test_standard_id', 'is_active']);
            $table->index(['test_type', 'is_active']);
            $table->index(['product_category_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_procedures');
    }
};

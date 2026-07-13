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
        Schema::create('test_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_procedure_id')->constrained()->onDelete('cascade');
            $table->string('parameter_name', 200);
            $table->string('parameter_code', 50);
            $table->text('parameter_description')->nullable();
            $table->string('measurement_unit', 50)->nullable();
            $table->enum('data_type', ['numeric', 'text', 'boolean', 'date', 'time', 'file'])->default('numeric');
            $table->decimal('min_value', 15, 4)->nullable();
            $table->decimal('max_value', 15, 4)->nullable();
            $table->decimal('target_value', 15, 4)->nullable();
            $table->decimal('tolerance_plus', 15, 4)->nullable();
            $table->decimal('tolerance_minus', 15, 4)->nullable();
            $table->text('acceptance_criteria')->nullable();
            $table->integer('decimal_places')->default(2);
            $table->boolean('is_required')->default(true);
            $table->boolean('is_critical')->default(false);
            $table->integer('sort_order')->default(0);
            $table->text('measurement_instructions')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['test_procedure_id', 'sort_order']);
            $table->index(['parameter_code', 'test_procedure_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_parameters');
    }
};

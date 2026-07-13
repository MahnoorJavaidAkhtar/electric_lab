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
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_execution_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_parameter_id')->constrained()->onDelete('restrict');
            $table->string('parameter_name', 200);
            $table->string('measurement_unit', 50)->nullable();
            $table->decimal('measured_value', 15, 4)->nullable();
            $table->text('measured_value_text')->nullable();
            $table->decimal('specification_min', 15, 4)->nullable();
            $table->decimal('specification_max', 15, 4)->nullable();
            $table->decimal('specification_target', 15, 4)->nullable();
            $table->enum('result_status', ['pass', 'fail', 'conditional', 'not_applicable', 'not_measured'])->default('not_measured');
            $table->decimal('deviation_from_target', 15, 4)->nullable();
            $table->decimal('deviation_percentage', 8, 4)->nullable();
            $table->decimal('measurement_uncertainty', 15, 4)->nullable();
            $table->text('acceptance_criteria')->nullable();
            $table->boolean('within_specification')->nullable();
            $table->text('comments')->nullable();
            $table->string('measurement_equipment_code', 50)->nullable();
            $table->dateTime('measured_at')->nullable();
            $table->foreignId('measured_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('measurement_sequence')->default(1);
            $table->boolean('is_repeated_measurement')->default(false);
            $table->string('file_attachment', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['test_execution_id', 'test_parameter_id']);
            $table->index(['test_execution_id', 'result_status']);
            $table->index('result_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};

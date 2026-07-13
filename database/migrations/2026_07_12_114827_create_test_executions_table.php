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
        Schema::create('test_executions', function (Blueprint $table) {
            $table->id();
            $table->string('execution_number', 50)->unique();
            $table->foreignId('test_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('sample_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_procedure_id')->constrained()->onDelete('restrict');
            $table->foreignId('laboratory_id')->constrained()->onDelete('restrict');
            $table->foreignId('performed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('supervised_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('witnessed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->dateTime('test_start_datetime');
            $table->dateTime('test_end_datetime')->nullable();
            $table->integer('actual_duration_minutes')->nullable();
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'failed', 'aborted', 'on_hold'])->default('scheduled');
            $table->decimal('ambient_temperature', 5, 2)->nullable();
            $table->decimal('ambient_humidity', 5, 2)->nullable();
            $table->decimal('atmospheric_pressure', 8, 2)->nullable();
            $table->text('environmental_conditions')->nullable();
            $table->text('test_setup_description')->nullable();
            $table->text('equipment_used')->nullable();
            $table->text('deviations_from_procedure')->nullable();
            $table->text('observations')->nullable();
            $table->text('anomalies_encountered')->nullable();
            $table->enum('overall_result', ['pass', 'fail', 'conditional', 'inconclusive', 'pending'])->nullable();
            $table->text('failure_analysis')->nullable();
            $table->text('recommendations')->nullable();
            $table->boolean('retest_required')->default(false);
            $table->text('retest_reason')->nullable();
            $table->text('aborted_reason')->nullable();
            $table->timestamp('aborted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('execution_number');
            $table->index(['test_request_id', 'status']);
            $table->index(['sample_id', 'status']);
            $table->index(['performed_by_user_id', 'status']);
            $table->index(['test_start_datetime', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_executions');
    }
};

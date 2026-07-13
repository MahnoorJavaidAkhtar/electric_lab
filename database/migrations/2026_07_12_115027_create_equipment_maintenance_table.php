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
        Schema::create('equipment_maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('maintenance_number', 50)->unique();
            $table->foreignId('equipment_id')->constrained('testing_equipment')->onDelete('cascade');
            $table->enum('maintenance_type', ['preventive', 'corrective', 'breakdown', 'upgrade', 'inspection'])->default('preventive');
            $table->date('maintenance_date');
            $table->date('next_maintenance_due')->nullable();
            $table->text('maintenance_description');
            $table->text('work_performed')->nullable();
            $table->text('parts_replaced')->nullable();
            $table->decimal('parts_cost', 10, 2)->nullable();
            $table->decimal('labor_cost', 10, 2)->nullable();
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->integer('downtime_hours')->nullable();
            $table->string('service_provider', 200)->nullable();
            $table->string('technician_name', 200)->nullable();
            $table->foreignId('reported_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('performed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
            $table->dateTime('scheduled_at')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->text('problem_description')->nullable();
            $table->text('root_cause_analysis')->nullable();
            $table->text('preventive_actions')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('maintenance_number');
            $table->index(['equipment_id', 'maintenance_type']);
            $table->index(['maintenance_date', 'status']);
            $table->index('next_maintenance_due');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_maintenance');
    }
};

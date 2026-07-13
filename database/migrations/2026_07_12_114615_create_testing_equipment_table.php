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
        Schema::create('testing_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_code', 50)->unique();
            $table->string('equipment_name', 200);
            $table->string('equipment_type', 100);
            $table->foreignId('manufacturer_id')->nullable()->constrained()->onDelete('set null');
            $table->string('model_number', 100)->nullable();
            $table->string('serial_number', 100)->unique();
            $table->foreignId('laboratory_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('set null');
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_cost', 12, 2)->nullable();
            $table->string('supplier', 200)->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->text('technical_specifications')->nullable();
            $table->text('measurement_range')->nullable();
            $table->string('accuracy_class', 50)->nullable();
            $table->integer('calibration_frequency_days')->default(365);
            $table->date('last_calibration_date')->nullable();
            $table->date('next_calibration_due')->nullable();
            $table->enum('calibration_status', ['calibrated', 'due', 'overdue', 'out_of_service'])->default('due');
            $table->string('calibration_certificate_number', 100)->nullable();
            $table->enum('equipment_status', ['operational', 'maintenance', 'repair', 'retired'])->default('operational');
            $table->string('location', 255)->nullable();
            $table->foreignId('responsible_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('usage_instructions')->nullable();
            $table->text('maintenance_notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('equipment_code');
            $table->index('serial_number');
            $table->index(['laboratory_id', 'equipment_status']);
            $table->index(['calibration_status', 'next_calibration_due']);
            $table->index(['equipment_type', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testing_equipment');
    }
};

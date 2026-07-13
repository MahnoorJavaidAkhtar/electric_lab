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
        Schema::create('equipment_calibrations', function (Blueprint $table) {
            $table->id();
            $table->string('calibration_number', 50)->unique();
            $table->foreignId('equipment_id')->constrained('testing_equipment')->onDelete('cascade');
            $table->date('calibration_date');
            $table->date('next_calibration_due');
            $table->string('calibration_laboratory', 200);
            $table->boolean('is_accredited_lab')->default(true);
            $table->string('accreditation_number', 100)->nullable();
            $table->string('calibration_certificate_number', 100);
            $table->string('calibration_standard_used', 255)->nullable();
            $table->text('calibration_points')->nullable();
            $table->text('calibration_results')->nullable();
            $table->enum('calibration_status', ['pass', 'pass_with_adjustment', 'fail', 'limited_use'])->default('pass');
            $table->text('adjustments_made')->nullable();
            $table->decimal('measurement_uncertainty', 15, 6)->nullable();
            $table->string('uncertainty_unit', 50)->nullable();
            $table->decimal('calibration_cost', 10, 2)->nullable();
            $table->foreignId('performed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->text('remarks')->nullable();
            $table->string('certificate_file_path', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('calibration_number');
            $table->index(['equipment_id', 'calibration_date']);
            $table->index(['next_calibration_due', 'calibration_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_calibrations');
    }
};

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
        Schema::create('non_conformances', function (Blueprint $table) {
            $table->id();
            $table->string('nc_number', 50)->unique();
            $table->enum('nc_type', ['test_procedure', 'equipment', 'personnel', 'sample', 'documentation', 'environmental', 'other'])->default('test_procedure');
            $table->foreignId('test_execution_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('test_request_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('equipment_id')->nullable()->constrained('testing_equipment')->onDelete('set null');
            $table->foreignId('laboratory_id')->constrained()->onDelete('restrict');
            $table->date('detection_date');
            $table->foreignId('detected_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('nc_description');
            $table->text('details')->nullable();
            $table->enum('severity', ['minor', 'major', 'critical'])->default('minor');
            $table->enum('status', ['open', 'investigating', 'action_planned', 'action_in_progress', 'resolved', 'verified', 'closed'])->default('open');
            $table->text('immediate_action_taken')->nullable();
            $table->text('potential_impact')->nullable();
            $table->text('affected_tests')->nullable();
            $table->boolean('client_notification_required')->default(false);
            $table->date('client_notified_date')->nullable();
            $table->text('investigation_findings')->nullable();
            $table->text('root_cause_analysis')->nullable();
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('target_resolution_date')->nullable();
            $table->date('actual_resolution_date')->nullable();
            $table->foreignId('verified_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('verification_date')->nullable();
            $table->text('verification_comments')->nullable();
            $table->foreignId('closed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('closure_date')->nullable();
            $table->text('closure_comments')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('nc_number');
            $table->index(['laboratory_id', 'status']);
            $table->index(['nc_type', 'severity']);
            $table->index(['detection_date', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_conformances');
    }
};

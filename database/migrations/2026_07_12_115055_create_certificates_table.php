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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number', 50)->unique();
            $table->foreignId('test_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_execution_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('client_id')->constrained()->onDelete('restrict');
            $table->foreignId('laboratory_id')->constrained()->onDelete('restrict');
            $table->date('issue_date');
            $table->date('valid_until')->nullable();
            $table->enum('certificate_type', ['test_report', 'conformity', 'calibration', 'inspection'])->default('test_report');
            $table->enum('status', ['draft', 'review', 'approved', 'issued', 'cancelled', 'superseded'])->default('draft');
            $table->text('test_summary')->nullable();
            $table->text('conclusion')->nullable();
            $table->enum('overall_result', ['pass', 'fail', 'conditional'])->nullable();
            $table->text('test_standards_applied')->nullable();
            $table->text('equipment_used')->nullable();
            $table->text('environmental_conditions')->nullable();
            $table->text('limitations')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('prepared_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('reviewed_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->string('superseded_by_certificate', 50)->nullable();
            $table->text('superseded_reason')->nullable();
            $table->string('digital_signature', 500)->nullable();
            $table->string('qr_code', 255)->nullable();
            $table->string('pdf_file_path', 255)->nullable();
            $table->integer('revision_number')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->index('certificate_number');
            $table->index(['client_id', 'status']);
            $table->index(['issue_date', 'status']);
            $table->index(['laboratory_id', 'certificate_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};

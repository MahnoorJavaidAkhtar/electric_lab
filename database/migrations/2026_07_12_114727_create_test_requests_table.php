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
        Schema::create('test_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_number', 50)->unique();
            $table->foreignId('client_id')->constrained()->onDelete('restrict');
            $table->foreignId('product_id')->constrained()->onDelete('restrict');
            $table->foreignId('laboratory_id')->constrained()->onDelete('restrict');
            $table->foreignId('requested_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('request_date');
            $table->date('required_completion_date')->nullable();
            $table->date('actual_completion_date')->nullable();
            $table->enum('priority', ['low', 'normal', 'high', 'urgent'])->default('normal');
            $table->enum('status', ['draft', 'pending_approval', 'approved', 'rejected', 'in_progress', 'testing', 'completed', 'cancelled'])->default('draft');
            $table->integer('number_of_samples')->default(1);
            $table->text('test_objectives')->nullable();
            $table->text('special_requirements')->nullable();
            $table->text('safety_considerations')->nullable();
            $table->boolean('witness_testing_required')->default(false);
            $table->string('witness_name', 200)->nullable();
            $table->string('witness_organization', 200)->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->text('internal_notes')->nullable();
            $table->text('client_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('request_number');
            $table->index(['client_id', 'status']);
            $table->index(['laboratory_id', 'status', 'priority']);
            $table->index(['assigned_to_user_id', 'status']);
            $table->index(['request_date', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_requests');
    }
};

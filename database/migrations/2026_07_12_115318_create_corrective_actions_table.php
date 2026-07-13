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
        Schema::create('corrective_actions', function (Blueprint $table) {
            $table->id();
            $table->string('action_number', 50)->unique();
            $table->foreignId('non_conformance_id')->constrained()->onDelete('cascade');
            $table->enum('action_type', ['immediate', 'corrective', 'preventive'])->default('corrective');
            $table->text('action_description');
            $table->text('root_cause')->nullable();
            $table->text('proposed_solution')->nullable();
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('responsible_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('target_completion_date')->nullable();
            $table->date('actual_completion_date')->nullable();
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->enum('status', ['open', 'in_progress', 'completed', 'verified', 'closed', 'cancelled'])->default('open');
            $table->text('implementation_details')->nullable();
            $table->text('verification_method')->nullable();
            $table->text('verification_results')->nullable();
            $table->foreignId('verified_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('verification_date')->nullable();
            $table->boolean('effectiveness_verified')->default(false);
            $table->text('effectiveness_review')->nullable();
            $table->date('effectiveness_review_date')->nullable();
            $table->decimal('estimated_cost', 10, 2)->nullable();
            $table->decimal('actual_cost', 10, 2)->nullable();
            $table->text('resources_required')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('action_number');
            $table->index(['non_conformance_id', 'status']);
            $table->index(['assigned_to_user_id', 'status']);
            $table->index(['target_completion_date', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corrective_actions');
    }
};

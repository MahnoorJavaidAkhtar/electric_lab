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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_number', 50)->unique();
            $table->foreignId('client_id')->constrained()->onDelete('restrict');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('prepared_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('quotation_date');
            $table->date('valid_until');
            $table->enum('status', ['draft', 'sent', 'accepted', 'rejected', 'expired', 'revised'])->default('draft');
            $table->text('scope_of_work')->nullable();
            $table->text('test_description')->nullable();
            $table->integer('number_of_samples')->default(1);
            $table->integer('estimated_duration_days')->nullable();
            $table->decimal('testing_fee', 12, 2)->default(0);
            $table->decimal('rush_charges', 12, 2)->default(0);
            $table->decimal('additional_services', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('discount_percentage', 5, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('tax_percentage', 5, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('currency', 10)->default('USD');
            $table->enum('payment_terms', ['immediate', 'net_7', 'net_15', 'net_30', 'net_45', 'net_60'])->default('net_30');
            $table->text('terms_and_conditions')->nullable();
            $table->text('exclusions')->nullable();
            $table->text('assumptions')->nullable();
            $table->text('client_notes')->nullable();
            $table->text('internal_notes')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->string('revised_from_quotation', 50)->nullable();
            $table->integer('revision_number')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->index('quotation_number');
            $table->index(['client_id', 'status']);
            $table->index(['quotation_date', 'status']);
            $table->index('valid_until');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};

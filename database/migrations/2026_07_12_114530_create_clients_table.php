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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 200)->unique();
            $table->string('client_code', 50)->unique();
            $table->enum('client_type', ['corporate', 'government', 'sme', 'individual'])->default('corporate');
            $table->text('address');
            $table->string('city', 100);
            $table->string('state', 100)->nullable();
            $table->string('country', 100);
            $table->string('postal_code', 20);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('website', 255)->nullable();
            $table->string('contact_person', 200);
            $table->string('contact_phone', 20);
            $table->string('contact_email', 100);
            $table->string('tax_id', 50)->nullable();
            $table->string('business_registration_number', 100)->nullable();
            $table->enum('payment_terms', ['immediate', 'net_7', 'net_15', 'net_30', 'net_45', 'net_60'])->default('net_30');
            $table->decimal('credit_limit', 12, 2)->default(0);
            $table->decimal('current_balance', 12, 2)->default(0);
            $table->enum('credit_status', ['good', 'warning', 'suspended'])->default('good');
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('client_code');
            $table->index(['client_type', 'is_active']);
            $table->index('credit_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

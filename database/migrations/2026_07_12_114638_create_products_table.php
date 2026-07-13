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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code', 50)->unique();
            $table->string('product_name', 200);
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('restrict');
            $table->foreignId('manufacturer_id')->nullable()->constrained()->onDelete('set null');
            $table->string('model_number', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('technical_specifications')->nullable();
            $table->string('voltage_rating', 50)->nullable();
            $table->string('current_rating', 50)->nullable();
            $table->string('power_rating', 50)->nullable();
            $table->string('frequency_rating', 50)->nullable();
            $table->string('protection_class', 50)->nullable();
            $table->string('ip_rating', 20)->nullable();
            $table->text('applicable_standards')->nullable();
            $table->text('intended_use')->nullable();
            $table->decimal('typical_test_cost', 10, 2)->nullable();
            $table->integer('typical_test_duration_hours')->nullable();
            $table->text('special_handling_instructions')->nullable();
            $table->text('safety_warnings')->nullable();
            $table->boolean('requires_special_equipment')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('product_code');
            $table->index(['category_id', 'is_active']);
            $table->index(['manufacturer_id', 'model_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

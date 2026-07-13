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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('sample_code', 50)->unique();
            $table->foreignId('test_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('restrict');
            $table->string('batch_number', 100)->nullable();
            $table->string('serial_number', 100)->nullable();
            $table->date('manufacturing_date')->nullable();
            $table->integer('sample_quantity')->default(1);
            $table->string('sample_unit', 20)->default('pcs');
            $table->text('sample_description')->nullable();
            $table->text('visual_condition')->nullable();
            $table->text('packaging_condition')->nullable();
            $table->date('received_date');
            $table->foreignId('received_by_user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('sample_status', ['received', 'in_storage', 'in_testing', 'tested', 'returned', 'disposed'])->default('received');
            $table->string('storage_location', 255)->nullable();
            $table->text('storage_conditions')->nullable();
            $table->boolean('requires_special_storage')->default(false);
            $table->text('special_storage_requirements')->nullable();
            $table->date('disposal_date')->nullable();
            $table->text('disposal_method')->nullable();
            $table->boolean('return_to_client')->default(true);
            $table->date('returned_date')->nullable();
            $table->string('returned_to', 200)->nullable();
            $table->text('sample_preparation_notes')->nullable();
            $table->text('sample_handling_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('sample_code');
            $table->index(['test_request_id', 'sample_status']);
            $table->index(['sample_status', 'received_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};

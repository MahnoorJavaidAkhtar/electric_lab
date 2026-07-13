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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
            $table->string('code', 20)->unique();
            $table->text('address');
            $table->string('city', 100);
            $table->string('state', 100)->nullable();
            $table->string('country', 100);
            $table->string('postal_code', 20);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('website', 255)->nullable();
            $table->string('accreditation_number', 100)->nullable();
            $table->string('accreditation_body', 100)->nullable();
            $table->date('accreditation_valid_until')->nullable();
            $table->string('iso_certification', 100)->nullable();
            $table->integer('capacity_per_day')->default(0);
            $table->text('scope_of_accreditation')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index(['country', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};

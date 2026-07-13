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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->after('id')->constrained()->onDelete('set null');
            $table->foreignId('department_id')->nullable()->after('role_id')->constrained()->onDelete('set null');
            $table->string('employee_id', 50)->nullable()->unique()->after('department_id');
            $table->string('phone', 20)->nullable()->after('email');
            $table->string('employee_title', 100)->nullable()->after('phone');
            $table->text('address')->nullable()->after('employee_title');
            $table->boolean('is_active')->default(true)->after('address');
            $table->timestamp('last_login_at')->nullable()->after('is_active');
            $table->softDeletes();

            $table->index('employee_id');
            $table->index(['role_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['department_id']);
            $table->dropColumn([
                'role_id', 'department_id', 'employee_id', 'phone',
                'employee_title', 'address', 'is_active', 'last_login_at', 'deleted_at'
            ]);
        });
    }
};

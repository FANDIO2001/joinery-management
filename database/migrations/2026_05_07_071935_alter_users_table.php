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
            $table->string('phone', 20)->nullable()->after('email');
            $table->enum('user_type', ['admin', 'manager', 'artisan', 'livreur', 'client'])->default('client')->after('password');
            $table->string('avatar', 255)->nullable()->after('user_type');
            $table->boolean('is_active')->default(true)->after('avatar');
            $table->text('two_factor_secret')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'user_type', 'avatar', 'is_active', 'two_factor_secret']);
        });
    }
};

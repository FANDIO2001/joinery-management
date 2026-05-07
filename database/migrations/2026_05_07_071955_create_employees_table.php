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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('employee_code', 20)->unique();
            $table->string('job_title', 100);
            $table->string('department', 100);
            $table->date('hire_date');
            $table->enum('contract_type', ['cdi', 'cdd', 'stage', 'freelance'])->default('cdi');
            $table->decimal('base_salary', 12, 2);
            $table->string('bank_account', 100)->nullable();
            $table->json('emergency_contact')->nullable();
            $table->json('skills')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

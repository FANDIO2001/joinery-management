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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('name', 150);
            $table->string('reference', 50)->unique();
            $table->enum('unit', ['m', 'm²', 'm³', 'kg', 'litre', 'pièce']);
            $table->decimal('unit_cost', 12, 2);
            $table->decimal('current_stock', 10, 3)->default(0);
            $table->decimal('minimum_stock', 10, 3);
            $table->decimal('reorder_quantity', 10, 3);
            $table->string('location', 100)->nullable();
            $table->enum('type', ['wood', 'hardware', 'finish', 'consumable', 'other'])->default('other');
            $table->timestamps();
            
                    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};

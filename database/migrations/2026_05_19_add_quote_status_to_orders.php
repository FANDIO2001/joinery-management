<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modifier l'enum status pour ajouter 'pending_quote'
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('pending_quote', 'pending', 'confirmed', 'in_production', 'ready', 'delivering', 'delivered', 'cancelled') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('pending', 'confirmed', 'in_production', 'ready', 'delivering', 'delivered', 'cancelled') DEFAULT 'pending'");
    }
};

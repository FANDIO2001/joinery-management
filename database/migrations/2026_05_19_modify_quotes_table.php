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
        // Vérifier et modifier la table quotes existante
        if (Schema::hasTable('quotes')) {
            Schema::table('quotes', function (Blueprint $table) {
                // Ajouter les colonnes manquantes si elles n'existent pas
                if (!Schema::hasColumn('quotes', 'order_id')) {
                    $table->unsignedBigInteger('order_id')->nullable();
                    $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
                }
                if (!Schema::hasColumn('quotes', 'pricing_notes')) {
                    $table->text('pricing_notes')->nullable();
                }
                if (!Schema::hasColumn('quotes', 'sent_at')) {
                    $table->timestamp('sent_at')->nullable();
                }
                if (!Schema::hasColumn('quotes', 'approved_at')) {
                    $table->timestamp('approved_at')->nullable();
                }
                if (!Schema::hasColumn('quotes', 'rejected_at')) {
                    $table->timestamp('rejected_at')->nullable();
                }
                if (!Schema::hasColumn('quotes', 'expires_at')) {
                    $table->timestamp('expires_at')->nullable();
                }
                if (!Schema::hasColumn('quotes', 'created_by')) {
                    $table->unsignedBigInteger('created_by')->nullable();
                    $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

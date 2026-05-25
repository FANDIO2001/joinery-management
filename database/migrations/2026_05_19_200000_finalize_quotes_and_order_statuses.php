<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM(
            'pending_quote',
            'quote_sent',
            'pending',
            'confirmed',
            'in_production',
            'ready',
            'delivering',
            'delivered',
            'cancelled'
        ) DEFAULT 'pending'");

        if (Schema::hasTable('quotes')) {
            Schema::table('quotes', function (Blueprint $table) {
                if (! Schema::hasColumn('quotes', 'quote_number')) {
                    $table->string('quote_number', 50)->nullable()->unique()->after('id');
                }
            });

            DB::statement("ALTER TABLE quotes MODIFY COLUMN status ENUM(
                'draft',
                'sent',
                'approved',
                'accepted',
                'rejected',
                'expired'
            ) DEFAULT 'draft'");

            if (Schema::hasColumn('quotes', 'reference')) {
                DB::statement('ALTER TABLE quotes MODIFY COLUMN reference VARCHAR(255) NULL');
            }
            if (Schema::hasColumn('quotes', 'client_id')) {
                DB::statement('ALTER TABLE quotes MODIFY COLUMN client_id BIGINT UNSIGNED NULL');
            }
            if (Schema::hasColumn('quotes', 'quote_date')) {
                DB::statement('ALTER TABLE quotes MODIFY COLUMN quote_date DATE NULL');
            }
            if (Schema::hasColumn('quotes', 'valid_until')) {
                DB::statement('ALTER TABLE quotes MODIFY COLUMN valid_until DATE NULL');
            }
        }
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM(
            'pending_quote',
            'pending',
            'confirmed',
            'in_production',
            'ready',
            'delivering',
            'delivered',
            'cancelled'
        ) DEFAULT 'pending'");
    }
};

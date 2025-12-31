<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_items', function (Blueprint $table) {
            // ملاحظة: لازم تكون جداول quote_requests و equipments موجودة قبل هذا التعديل

            if (! Schema::hasColumn('quote_items', 'quote_request_id')) {
                $table->foreignId('quote_request_id')
                    ->after('id')
                    ->constrained('quote_requests')
                    ->cascadeOnDelete();
            }

            if (! Schema::hasColumn('quote_items', 'equipment_id')) {
                $table->foreignId('equipment_id')
                    ->after('quote_request_id')
                    ->constrained('equipments')
                    ->cascadeOnDelete();
            }

            if (! Schema::hasColumn('quote_items', 'qty')) {
                $table->unsignedInteger('qty')->default(1)->after('equipment_id');
            }

            if (! Schema::hasColumn('quote_items', 'days')) {
                $table->unsignedInteger('days')->default(1)->after('qty');
            }
        });
    }

    public function down(): void
    {
        Schema::table('quote_items', function (Blueprint $table) {
            if (Schema::hasColumn('quote_items', 'equipment_id')) {
                $table->dropForeign(['equipment_id']);
                $table->dropColumn('equipment_id');
            }

            if (Schema::hasColumn('quote_items', 'quote_request_id')) {
                $table->dropForeign(['quote_request_id']);
                $table->dropColumn('quote_request_id');
            }

            if (Schema::hasColumn('quote_items', 'qty')) {
                $table->dropColumn('qty');
            }

            if (Schema::hasColumn('quote_items', 'days')) {
                $table->dropColumn('days');
            }
        });
    }
};

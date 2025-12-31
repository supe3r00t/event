<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('quote_requests', 'total_estimate')) {
                $table->unsignedBigInteger('total_estimate')->default(0)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            if (Schema::hasColumn('quote_requests', 'total_estimate')) {
                $table->dropColumn('total_estimate');
            }
        });
    }
};

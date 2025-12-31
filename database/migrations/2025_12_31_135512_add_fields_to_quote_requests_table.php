<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {

            // عندك مسبقاً: code, customer_name, customer_phone, customer_email, date_from, date_to, notes, status

            if (!Schema::hasColumn('quote_requests', 'city')) {
                $table->string('city')->nullable()->after('customer_email');
            }

            if (!Schema::hasColumn('quote_requests', 'address')) {
                $table->text('address')->nullable()->after('city');
            }

            if (!Schema::hasColumn('quote_requests', 'total_estimate')) {
                $table->unsignedBigInteger('total_estimate')->default(0)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $drops = [];

            if (Schema::hasColumn('quote_requests', 'city')) $drops[] = 'city';
            if (Schema::hasColumn('quote_requests', 'address')) $drops[] = 'address';
            if (Schema::hasColumn('quote_requests', 'total_estimate')) $drops[] = 'total_estimate';

            if (!empty($drops)) {
                $table->dropColumn($drops);
            }
        });
    }
};

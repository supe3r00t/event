<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {

            // guest_token
            if (!Schema::hasColumn('quote_requests', 'guest_token')) {
                $table->string('guest_token', 64)->nullable()->after('code');
                $table->index(['guest_token', 'status']);
            }

            // city, address
            if (!Schema::hasColumn('quote_requests', 'city')) {
                $table->string('city')->nullable()->after('customer_email');
            }

            if (!Schema::hasColumn('quote_requests', 'address')) {
                $table->text('address')->nullable()->after('city');
            }

            // event_days (اختياري)
            if (!Schema::hasColumn('quote_requests', 'event_days')) {
                $table->unsignedInteger('event_days')->default(1)->after('date_to');
            }
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $drops = [];
            foreach (['guest_token','city','address','event_days'] as $col) {
                if (Schema::hasColumn('quote_requests', $col)) $drops[] = $col;
            }
            if ($drops) $table->dropColumn($drops);
        });
    }
};

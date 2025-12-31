<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->string('customer_name')->nullable()->after('id');
            $table->string('customer_phone', 50)->nullable()->after('customer_name');
            $table->string('customer_email')->nullable()->after('customer_phone');

            $table->date('date_from')->nullable()->after('customer_email');
            $table->date('date_to')->nullable()->after('date_from');

            $table->text('notes')->nullable()->after('date_to');

            $table->string('status', 20)->default('new')->after('notes');
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->dropColumn([
                'customer_name','customer_phone','customer_email',
                'date_from','date_to','notes','status'
            ]);
        });
    }
};

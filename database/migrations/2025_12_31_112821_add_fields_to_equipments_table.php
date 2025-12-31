<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('summary')->nullable();
            $table->longText('description')->nullable();

            $table->unsignedInteger('stock')->default(1);
            $table->decimal('price_per_day', 10, 2)->nullable();

            $table->string('cover_image')->nullable();
            $table->json('gallery_images')->nullable();

            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');

            $table->dropColumn([
                'name','slug','summary','description','stock','price_per_day',
                'cover_image','gallery_images','is_published','sort_order'
            ]);
        });
    }
};

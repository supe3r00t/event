<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
    use Illuminate\Database\Eloquent\Builder;


class Equipment extends Model
{
    // خليها الافتراضي أو ثبتها صح:
    protected $table = 'equipments';

    protected $guarded = [];

    protected $casts = [
        'gallery_images' => 'array',
        'is_published' => 'boolean',
        'price_per_day' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (self $model) {
            if (blank($model->slug) && filled($model->name)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }


public function scopePublished(Builder $query): Builder
{
    return $query->where('is_published', true);
}

}

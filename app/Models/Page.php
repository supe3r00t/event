<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = ['title','slug','content','is_published'];

    protected $casts = ['is_published' => 'boolean'];

    protected static function booted(): void
    {
        static::saving(function ($model) {
            if (blank($model->slug) && filled($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }
}

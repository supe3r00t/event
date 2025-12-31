<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'sort', 'is_active'];

    public function equipment(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'category_equipment');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = ['name','phone','email','company_name','notes'];

    public function projects(): HasMany { return $this->hasMany(Project::class); }
    public function quotes(): HasMany { return $this->hasMany(Quote::class); }
}

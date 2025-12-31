<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteItem extends Model
{
    protected $fillable = ['quote_id','equipment_id','item_name','unit_price','qty','days','line_total'];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'line_total' => 'decimal:2',
    ];

    public function quote(): BelongsTo { return $this->belongsTo(Quote::class); }
    public function equipment(): BelongsTo { return $this->belongsTo(Equipment::class); }
}

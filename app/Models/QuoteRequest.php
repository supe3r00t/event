<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuoteRequest extends Model
{
    protected $fillable = [
        'code',
        'guest_token',
        'customer_name',
        'customer_phone',
        'customer_email',
        'city',
        'address',
        'date_from',
        'date_to',
        'event_days',
        'notes',
        'status',
        'total_estimate',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(QuoteItem::class);
    }

    public function recalcTotal(): void
    {
        $total = $this->items()
            ->with('equipment:id,price_per_day')
            ->get()
            ->sum(fn ($i) => (int)$i->qty * (int)$i->days * (int)($i->equipment->price_per_day ?? 0));

        $this->update(['total_estimate' => $total]);
    }
}

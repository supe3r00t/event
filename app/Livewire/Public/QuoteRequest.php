<?php

namespace App\Livewire\Public;

use App\Support\GuestCart;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.public')]
class QuoteRequest extends Component
{
    public $customer_name;
    public $customer_phone;
    public $customer_email;
    public $city;
    public $address;
    public $date_from;
    public $date_to;
    public $notes;

    public function mount(): void
    {
        $draft = GuestCart::draft();

        // عبّي الفورم إذا موجود سابقًا
        $this->customer_name  = $draft->customer_name;
        $this->customer_phone = $draft->customer_phone;
        $this->customer_email = $draft->customer_email;
        $this->city           = $draft->city;
        $this->address        = $draft->address;
        $this->date_from      = $draft->date_from;
        $this->date_to        = $draft->date_to;
        $this->notes          = $draft->notes;
    }

    public function inc(int $itemId): void
    {
        $draft = GuestCart::draft();
        $item = $draft->items()->findOrFail($itemId);
        $item->qty++;
        $item->save();
        $draft->recalcTotal();
    }

    public function dec(int $itemId): void
    {
        $draft = GuestCart::draft();
        $item = $draft->items()->findOrFail($itemId);
        $item->qty = max(1, $item->qty - 1);
        $item->save();
        $draft->recalcTotal();
    }

    public function remove(int $itemId): void
    {
        $draft = GuestCart::draft();
        $draft->items()->whereKey($itemId)->delete();
        $draft->recalcTotal();
    }

    public function submit(): void
    {
        $this->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:30',
            'date_from'      => 'nullable|date',
            'date_to'        => 'nullable|date|after_or_equal:date_from',
        ]);

        $draft = GuestCart::draft()->load('items');

        if ($draft->items->isEmpty()) {
            $this->addError('customer_name', 'السلة فاضية. أضف معدات أولاً.');
            return;
        }

        $draft->update([
            'customer_name'  => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_email' => $this->customer_email,
            'city'           => $this->city,
            'address'        => $this->address,
            'date_from'      => $this->date_from,
            'date_to'        => $this->date_to,
            'notes'          => $this->notes,
            'status'         => 'new',
        ]);

        $draft->recalcTotal();

        // بعد الإرسال: نبدأ Draft جديد بنفس guest_token تلقائياً (أول إضافة جاية)
        $this->redirectRoute('quote.request', navigate: true);
    }

    public function render()
    {
        $draft = GuestCart::draft()->load(['items.equipment:id,name,price_per_day']);
        return view('livewire.public.quote-request', compact('draft'));
    }
}

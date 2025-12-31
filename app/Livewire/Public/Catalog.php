<?php

namespace App\Livewire\Public;

use App\Models\Category;
use App\Models\Equipment;
use App\Support\GuestCart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('layouts.public')]
class Catalog extends Component
{
    #[Url]
    public ?string $category = null;

    public function addToQuote(int $equipmentId): void
    {
        $draft = GuestCart::draft();

        $item = $draft->items()->firstOrNew(['equipment_id' => $equipmentId]);
        $item->qty  = (int)($item->qty ?? 0) + 1;
        $item->days = (int)($item->days ?? 1);
        $item->save();

        $draft->recalcTotal();

        $this->dispatch('toast', message: 'تمت الإضافة للسلة');
    }

    public function render()
    {
        $cats = Category::query()->where('is_active', true)->orderBy('sort')->get();

        $q = Equipment::query()->where('is_published', true)->orderBy('sort_order');

        if ($this->category) {
            $q->whereHas('category', fn($qq) => $qq->where('slug', $this->category));
        }

        return view('livewire.public.catalog', [
            'categories' => $cats,
            'equipments' => $q->paginate(12),
            'draft'      => GuestCart::draft()->loadCount('items'),
        ]);
    }
}

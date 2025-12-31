<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Equipment;

#[Layout('layouts.public-flux')]
class Catalog extends Component
{
    public function render()
    {
        return view('livewire.public.catalog', [
            'items' => Equipment::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->paginate(12),
        ]);
    }
}
